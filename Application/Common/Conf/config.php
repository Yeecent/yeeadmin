<?php

$file = './Config/conf.php';
$data = array(
    'LOAD_EXT_CONFIG'        => 'database',
    'URL_MODEL' => 2, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'DEFAULT_THEME' => 'default', // 设置主题模板
);
return array_merge($data, require_once $file);
