<?php

namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller {

    protected $member;
    protected $config;
    private $rule_name;

    public function __construct() {
        parent::__construct();
        $this->rule_name = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME; // 获取当前访问的 模块/控制器/方法 的名称,例: Admin/Index/index

        $member = session('admin.member');
        if (empty($member['uid']) || empty($member['group_id'])) {
            session('admin', null);
            redirect(U('Login/index'));
            exit;
        }
        $members = $this->getMemberInfo($member['uid']);
        if ($member['token'] !== $members['token']) {
            session('admin', null);
            //$this->error('帐号已在别处登陆!',U('Login/index'));
            echo '<script type="text/javascript">alert("帐号已在别处登陆!");window.location.href="' . U('Login/index') . '"</script>';
            exit;
        }
        $this->assign('member', $members);
        $this->assign('config', $this->getConfigInfo());
        if (!auth($this->member, $this->rule_name)) {
            $this->error('权限不足!');
            exit;
        }
        $this->getMemberMenu();
    }

    // 获取当前用户相关信息
    private function getMemberInfo($uid) {
        $this->member = M('auth_member')
                ->field('member.*,groups.title as group_title,groups.rules as group_rules')
                ->alias('member')
                ->join('__AUTH_GROUP__ as groups on member.group_id = groups.id')
                ->where(array('member.uid' => $uid))
                ->find();
        return $this->member;
    }

    // 获取系统基本配置信息
    private function getConfigInfo() {
        $this->config = M('config')->find();
        return $this->config;
    }

    // 获取当前用户的可用导航列表
    private function getMemberMenu() {
        $where['is_show'] = 1;
        if ($this->member['group_id'] != 1) {
            $rules = empty($this->member['group_rules']) ? '0' : $this->member['group_rules'];
            $map['id'] = array('in', $rules);
            $map['check'] = 0;
            $map['_logic'] = 'or';
            $where['_complex'] = $map;
        }
        $menu = M('auth_menu')
                ->where($where)
                ->order(array('pid' => 'asc', 'order' => 'asc'))
                ->select();
        $path = $this->getPageNow();
        $path = explode(',', $path['path']);
        $this->assign('menu', get_nav_tree(getTree($menu, 0, '', $path)));
    }

    // 查询当前页面的信息,用于显示当前页面的标题及定位当前打开页面的节点，便于导航定位展开
    private function getPageNow() {
        $data = M('auth_menu')->where(array('name' => $this->rule_name))->find();
        $list = M('auth_menu')->where(array('id' => array('in', $data['path'])))->select();
        foreach ($list as $key => $val) {
            $temp[] = $val['title'];
        }
        $this->assign('menu_nav', implode(' / ', $temp));
        return $data;
    }

    // 单文件上传
    protected function upload_one($file, $type = array('jpg', 'jpeg'), $root_dir = '/Uploads', $savePath = '/', $size = 3145728) {
        $upload = new \Think\Upload(); // 实例化上传类    
        $upload->maxSize = $size; // 设置附件上传大小    
        $upload->exts = $type; // 设置附件上传类型    
        $upload->rootPath = '.' . $root_dir;
        $upload->savePath = $savePath; // 设置附件上传目录.
        $info = $upload->uploadOne($file);
        if (!$info) {// 上传错误提示错误信息
            $array = array(
                'code' => 0,
                'msg' => $upload->getError(),
                'url' => ''
            );
        } else {// 上传成功 获取上传文件信息
            $info['code'] = time() . getShuff(3, '0123456789');
            $info['savepath'] = '.' . $root_dir . $info['savepath'];
            $code = M('files')->add($info);
            if ($code) {
                $array = array(
                    'code' => $info['code'],
                    'msg' => '上传成功！',
                    //'url' => trim($info['savepath'] . $info['savename'], '.')
                    'url' => U('getFile', array('code' => $info['code']), '')
                );
            } else {
                $array = array(
                    'code' => $code,
                    'msg' => '文件上传失败!',
                    'url' => ''
                );
            }
        }
        return $array;
    }

    // 下载文件,主要是为了防止文件攻击
    public function getFile($code) {
        $file_data = M('files')->where(array('code' => $code))->find();
        $path = $file_data['savepath'] . $file_data['savename'];
        $name = $file_data['name'];
        $file = fopen($path, "rb");
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length: " . filesize($path));
        Header("Content-Disposition: attachment; filename=" . $name);
        echo fread($file, filesize($path));
        fclose($file);
        exit();
    }

}
