<?php

namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller {

    public function __construct() {
        parent::__construct();
        //C('DEFAULT_THEME', 'default');  // 设置主题模板
        $this->assign('theme','/Public/'.C('DEFAULT_THEME'));
        $this->assign('config',$this->getConfigInfo());
    }
    
    // 获取系统基本信息
    public function getConfigInfo(){
        $data = M('config')->field('id,is_code,remark',true)->find();
        return $data;
    }

}
