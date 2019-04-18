<?php

namespace Admin\Controller;

use Think\Controller;

class LoginController extends Controller {

    public function __construct() {
        parent::__construct();
        $member = session('admin.member');
        if (isset($member['uid']) && isset($member['group_id'])) {
            redirect(U('Index/index'));
            exit;
        }
        session('admin', null);
    }

    public function index() {
        $config = M('config')->find();

        $this->assign('config', $config);
        $this->display();
    }

    public function login() {
        if (IS_POST) {
            $data = I('post.');
            $config = M('config')->find();
            if ($config['is_code']) {
                $captcha = new \Think\Verify();
                if (!$captcha->check($data['code'])) {
                    $this->error('验证码错误!');
                }
            }
            if (empty($data['user']) || empty($data['password'])) {
                $this->error('请输入正确的用户帐号密码!');
            }
            $user = M('auth_member')->where(array('user' => $data['user']))->find();
            if (empty($user) || $user['password'] != enty($data['password'], $user['shuff'])) {
                $this->error('用户帐号或密码错误!');
            }
            if ($user['status'] != 1) {
                $this->error('用户已被禁用!');
            }
            $value = array(
                'last_time' => time(),
                'last_ip' => get_client_ip(),
                'login_count' => $user['login_count'] + 1,
                'token' => md5(getShuff())
            );
            M('auth_member')->where(array('uid' => $user['uid']))->save($value);
            $user['token'] = $value['token'];
            session('admin.member', $user);
            $this->success('登陆成功!', U('Index/index'));
        }
        $this->error('非法操作!');
    }

    public function verify() {
        $config = array(
            'fontSize' => 24, // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => false, // 关闭验证码杂点
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }

}
