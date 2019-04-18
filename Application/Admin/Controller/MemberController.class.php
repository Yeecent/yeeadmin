<?php

// 用户管理

namespace Admin\Controller;

class MemberController extends AdminController {

    public function index() {
        $data = M('auth_member')
                ->alias('member')
                ->join("__AUTH_GROUP__ as groups on groups.id = member.group_id", "left")
                ->where(array('member.group_id' => array('neq', 1)))
                ->select();

        $this->assign('data', $data);
        $this->display();
    }

    public function adds() {
        if (IS_POST) {
            $data = I('post.');
            if ($data['password'] !== $data['cpassword']) {
                $this->error('两次密码不一致！');
            }
            if (!empty(M('auth_member')->where(array('user' => $data['user']))->count())) {
                $this->error('用户已存在！');
            }
            
            $data['shuff'] = getShuff();
            $data['password'] = enty($data['password'], $data['shuff']);
            //print_r($data);exit;
            if (M('auth_member')->add($data)) {
                $this->success('用户添加成功！');
            } else {
                $this->error('系统错误，请稍候再试！');
            }
            exit;
        }

        $where['id'] = array('neq', 1);
        $group_list = M('auth_group')->where($where)->select();

        $this->assign('group_list', $group_list);
        $this->display();
    }

    public function edits($id) {
        if (IS_POST) {
            $data = I('post.');
            $data['uid'] = $id;
            if (!empty($data['password']) || !empty($data['cpassword'])) {
                if ($data['password'] !== $data['cpassword']) {
                    $this->error('两次密码不一致！');
                } else {
                    $data['shuff'] = getShuff();
                    $data['password'] = enty($data['password'], $data['shuff']);
                }
            } else {
                unset($data['password']);
            }

            if (!empty(M('auth_member')->where(array('user' => $data['user'], 'uid' => array('neq', $data['uid'])))->count())) {
                $this->error('用户已存在！');
            }

            if (M('auth_member')->where(array('uid' => $data['uid']))->save($data)) {
                $this->success('用户修改成功！');
            } else {
                $this->error('系统错误，请稍候再试！');
            }
            exit;
        }
        $where['id'] = array('neq', 1);
        $group_list = M('auth_group')->where($where)->select();
        $data = M('auth_member')->where(array('uid' => $id))->find();

        $this->assign('group_list', $group_list);
        $this->assign('data', $data);
        $this->display();
    }

//
    public function dels($id) {
        $data = M('auth_member')->where(array('uid' => $id))->find();
        if (empty($data)) {
            $this->error('删除用户失败！');
        }
        if (M('auth_member')->where(array('uid' => $id))->delete()) {
            if ($data['status'] != 1) {
                $row = M('files')->where(array('code' => $data['headimg']))->find();
                @unlink($row['savepath'] . $row['savename']);
                M('files')->where(array('code' => $data['headimg']))->delete();
            }
            $this->success('删除用户成功！');
        } else {
            $this->error('删除用户失败！');
        }
    }

}
