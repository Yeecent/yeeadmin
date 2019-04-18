<?php

// 角色管理

namespace Admin\Controller;

class GroupsController extends AdminController {

    public function index() {
        $data = M('auth_group')->where(array('id' => array('neq', 1)))->select();
        $this->assign('data', $data);
        $this->display();
    }

    public function adds() {
        if (IS_POST) {
            $data = I('post.');
            $data['rules'] = trim($data['rules'], ',');
            $data = M('auth_group')->add($data);
            if ($data) {
                $this->success('添加成功!');
            }
            $this->error('添加失败!');
            exit;
        }
        $this->assign('json', json_encode($this->getMenuList()));
        $this->display();
    }

    public function dels($id) {
        if (M('auth_member')->where(array('group_id' => $id))->count()) {
            $this->error('该角色存在用户!');
        }
        $data = M('auth_group')->where(array('id' => $id))->delete();
        if ($data) {
            $this->success('删除成功!');
        }
        $this->error('删除失败!');
    }

    public function edits($id) {
        if (IS_POST) {
            $data = I('post.');
            if (M('auth_group')->where(array('id' => $id))->save($data)) {
                $this->success('编辑成功!');
            }
            $this->error('编辑失败!');
            exit;
        }
        $data = M('auth_group')->where(array('id' => $id))->find();
        $this->assign('json', json_encode($this->getMenuList(explode(',', $data['rules']))));
        $this->assign('groups', $data);
        $this->display();
    }

    private function getMenuList($rule = array()) {
        $where['check'] = 1;
        if ($this->member['group_id'] != 1) {
            $rules = empty($this->member['group_rules']) ? '0' : $this->member['group_rules'];
            $where['id'] = array('in', $rules);
            //$where['_logic'] = 'or';
        }
        $data = M('auth_menu')
                ->where($where)
                ->order(array('pid' => 'asc', 'order' => 'asc'))
                //->fetchSql(true)
                ->select();
        //print_r($data);exit;
        $data = getTree($data, 0, $rule);
        return $data;
    }

}
