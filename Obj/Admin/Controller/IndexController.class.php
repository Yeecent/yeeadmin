<?php

namespace Admin\Controller;

class IndexController extends AdminController {

    public function index() {
        //print_r(session('admin.member'));exit;
        $this->display();
    }

    public function login_out() {
        session(null);
        redirect(U('Login/index'));
    }

    // 查看个人资料
    public function getmember() {
        if (IS_POST) {
            $data = I('post.');
            if (M('auth_member')->where(array('uid' => $this->member['uid']))->save($data)) {
                $this->success('修改成功！');
            }
            $this->error('修改失败！');
            exit;
        }
        $this->display();
    }

    // 修改密码
    public function setpwd() {
        if (IS_POST) {
            $data = I('post.');
            if ($data['password'] !== $data['cpassword']) {
                $this->error('两次密码不一致！');
            }
            if (enty($data['opassword'], $this->member['shuff']) != $this->member['password']) {
                $this->error('旧密码错误！');
            }
            $shuff = getShuff();
            $array = array(
                'shuff' => $shuff,
                'password' => enty($data['password'], $shuff)
            );
            if (M('auth_member')->where(array('uid' => $this->member['uid']))->save($array)) {
                session(null);
                $this->success('密码修改成功,请重新登陆！');
            }
            $this->error('密码修改失败！');
            exit;
        }

        $this->display();
    }

    // 头像上传
    public function head_img_upload($token) {
        if ($token !== $this->member['token']) {
            $this->error('用户令牌错误!');
        }
        $this->ajaxReturn($this->upload_one($_FILES['file'], array('png', 'jpg', 'jpeg')));
    }

    public function clear() {
        /* 通过删除runtime 文件夹 */
        $rtim = del_dir(APP_PATH . 'Runtime');
        if ($rtim) {
            $this->success('清除成功');
        }
        $this->error('清除失败');
    }

}
