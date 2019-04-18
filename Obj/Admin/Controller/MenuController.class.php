<?php

// 菜单控制器,完成

namespace Admin\Controller;

class MenuController extends AdminController {

    private $arr = array();
    private $icon = array('│', '├', '└');
    private $nbsp = "&nbsp;";
    private $pid = 'parentid';
    private $ret = '';

    public function index() {
        $data = M('auth_menu')->order(array('order' => 'asc'))->select();
        foreach ($data as $key => $val) {
            $data[$key]['show'] = $val['is_show'] ? '显示' : '隐藏';
        }

        // 设置格式
        $button = "<div class='layui-btn-group'>";
        $button .= "<a class='layui-btn layui-btn-xs layui-btn-normal adds' href='\".U('adds',array('pid'=>\$id)).\"'>添加</a>";
        $button .= "<a class='layui-btn layui-btn-xs layui-btn-warm edits'  href='\".U('edits',array('id'=>\$id)).\"'>编辑</a>";
        $button .= "<a class='layui-btn layui-btn-xs layui-btn-danger dels' href='\".U('dels',array('id'=>\$id)).\"'>删除</a>";
        $button .= "</div>";
        $str = "<tr data-tt-id='\$id' data-tt-parent-id='\$pid'>";  // ID号,父级ID
        $str .= "<td>\$spacer\$title</td>";  // 标题 
        $str .= "<td>\$name</td>";  // 应用路径
        $str .= "<td>\$show</td>";  // 菜单是否显示
        $str .= "<td><input type='text' class='input-text' name='order[\$id]' value='\$order'></td>"; // 排序
        $str .= "<td>$button</td>";
        $str .= "</tr>";

        $categorys = $this->getTree($data, 0, $str);
        $this->assign('categorys', $categorys);
        $this->display();
    }

    // 删除菜单
    public function dels($id) {
        $data = M('auth_menu')->where(array('id' => $id, 'is_sys' => 1))->count();
        if ($data) {
            $this->error('不可删除系统菜单！');
        }
        $row = M('auth_menu')->where(array('id' => $id))->delete();
        $row ? $this->success('操作成功！') : $this->error('操作失败！');
    }

    public function edits($id) {
        if (IS_POST) {
            $data = I('post.');
            $data['model'] = $data['model'];
            $data['contrl'] = $data['contrl'];
            $data['action'] = $data['action'];
            $data['name'] = $data['model'] . '/' . $data['contrl'] . '/' . $data['action'];
            $where['name'] = $data['name'];
            $where['id'] = array('neq', $id);
            $count = M('auth_menu')->where($where)->count();
            if (!empty($count)) {
                $this->error('应用已存在！');
            }
            $parent = M('auth_menu')->where(array('id' => $data['pid']))->find();  // 查询上级菜单信息
            $data['path'] = empty($parent['path']) ? '0,' . $id : $parent['path'] . ',' . $id;
            $data['level'] = $parent['level'] + 1;
            $this->setFindMenu($id, $data['path'], $data['level']);
            $id = M('auth_menu')->where(array('id' => $id))->save($data);
            $this->success('修改成功！');
            exit;
        }
        $this->icon = array('&nbsp;&nbsp;&nbsp;| ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $this->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->pid = 'pid';
        $data = M('auth_menu')->where(array('id' => $id))->find();
        $menus = M('auth_menu')->where(array('is_show' => 1))->order(array('order' => 'asc'))->select();
        $this->assign('parent', $this->getTree($menus, 0, $this->getAddsStr($data['pid'])));
        $this->assign('data', $data);
        $this->success($this->fetch());
    }

    private function setFindMenu($id, $path = '0', $level = 1) {
        $row = M('auth_menu')->where(array('pid' => $id))->select();
        foreach ($row as $key => $val) {
            if (!empty($val)) {
                $paths = $path . ',' . $val['id'];
                M('auth_menu')->where(array('id' => $val['id']))->save(array('path' => $paths, 'level' => $level + 1));
                $this->setFindMenu($val['id'], $paths, $level + 1);
            }
        }
        return false;
    }

    // 添加菜单
    public function adds($pid) {
        if (IS_POST) {
            $data = I('post.');
            $data['model'] = $data['model'];
            $data['contrl'] = $data['contrl'];
            $data['action'] = $data['action'];
            $data['name'] = $data['model'] . '/' . $data['contrl'] . '/' . $data['action'];

            $count = M('auth_menu')->where(array('name' => $data['name']))->count();
            if (!empty($count)) {
                $this->error('应用已存在！');
            }
            $parent = M('auth_menu')->where(array('id' => $data['pid']))->find();  // 查询上级菜单信息
            $path = empty($parent['path']) ? '0,' : $parent['path'] . ',';
            $level = $parent['level'] + 1;

            $id = M('auth_menu')->add($data);
            M('auth_menu')->where(array('id' => $id))->save(array('path' => $path . $id, 'level' => $level));
            $this->success('添加成功！');
            exit;
        }
        $this->icon = array('&nbsp;&nbsp;&nbsp;| ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $this->nbsp = '&nbsp;&nbsp;&nbsp;';
        $this->pid = 'pid';
        $menus = M('auth_menu')->where(array('is_show' => 1))->order(array('order' => 'asc'))->select();
        $this->assign('parent', $this->getTree($menus, 0, $this->getAddsStr($pid)));
        $this->success($this->fetch());
    }

    // 菜单排序
    public function orders() {
        $orders = I('post.order');
        foreach ($orders as $key => $val) {
            M('auth_menu')->where(array('id' => $key))->save(array('order' => $val));
        }
        $this->success('操作成功！');
    }

    private function getAddsStr($pid) {  // 获取添加菜单时下拉菜单
        $str = "<option value='\$id' data='$pid'>\$spacer\$title</option>";
        return $str;
    }

    private function init($arr = array()) {
        $this->arr = $arr;
        $this->ret = '';
        return is_array($arr);
    }

    private function getTree($data, $pid, $str = '') {
        $this->pid = 'pid';
        $this->init($data);
        return $this->get_tree($pid, $str);
    }

    private function get_tree($myid, $str, $sid = 0, $adds = '', $str_group = '') {
        $number = 1;
        $child = $this->get_child($myid);
        if (is_array($child)) {
            $total = count($child);
            foreach ($child as $id => $value) {
                $j = $k = '';
                if ($number == $total) {
                    $j .= $this->icon[2];
                } else {
                    $j .= $this->icon[1];
                    $k = $adds ? $this->icon[0] : '';
                }
                $spacer = $adds ? $adds . $j : '';
                $selected = $id == $sid ? 'selected' : '';
                @extract($value);
                $parentid == 0 && $str_group ? eval("\$nstr = \"$str_group\";") : eval("\$nstr = \"$str\";");
                $this->ret .= $nstr;
                $nbsp = $this->nbsp;
                $this->get_tree($id, $str, $sid, $adds . $k . $nbsp, $str_group);
                $number++;
            }
        }
        return $this->ret;
    }

    private function get_child($myid) {
        $a = $newarr = array();
        if (is_array($this->arr)) {
            foreach ($this->arr as $id => $a) {
                if ($a[$this->pid] == $myid)
                    $newarr[$id] = $a;
            }
        }
        return $newarr ? $newarr : false;
    }

}
