<?php

return array(
    /* 数据库设置 */
    'DB_TYPE' => 'mysqli', // 数据库类型
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_NAME' => 'yeeadmin', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => '08194437', // 密码
    'DB_PORT' => '3306', // 端口
    'DB_PREFIX' => 'ym_', // 数据库表前缀
    'DB_PARAMS' => array(), // 数据库连接参数
    'URL_MODEL' => 2, // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
    'DEFAULT_THEME' => 'default', // 设置主题模板
);
