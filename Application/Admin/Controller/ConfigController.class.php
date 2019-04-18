<?php

// 系统设置

namespace Admin\Controller;

class ConfigController extends AdminController {

    public function index() {
        if (IS_POST) {
            $data = I('post.');
            $data['is_code'] = empty($data['is_code']) ? 0 : 1;
            $data['id'] = 1;
            if (M('Config')->where(array('id'=> $data['id']))->save($data)) {
                $this->success('更新成功！');
            } else {
                $this->error('更新失败！');
            }
            exit;
        }
        $this->display();
    }

}
