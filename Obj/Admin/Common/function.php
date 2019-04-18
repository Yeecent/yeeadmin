<?php

// *********应用公共文件*************
// 密码加密
function enty($password, $shuff) {
    return md5(md5($password) . $shuff);
}

// 获取随机字符串
function getShuff($len = 8, $str = '0123456789qwertyuiopasdfghjklzxcvbnmWERTYUIOPASDFGHJKLZXCVBNM') {
    return substr(str_shuffle($str), 0, $len);
}

// 权限检测
function auth($member, $rule_name) {
    if ($member['group_id'] == 1) {
        return true;
    }
    $menu = M('auth_menu')->where(array('name' => $rule_name))->find();
    if ($menu['check'] === '0') {
        return true;
    }
    $rules = explode(',', $member['group_rules']);
    if (in_array($menu['id'], $rules)) {
        return true;
    }
    return false;
}

// 递归二维数组转换成多维数组,用于角色管理的权限分配
function getTree($data, $pId, $rule = array(), $path = array()) {
    $tree = '';
    foreach ($data as $k => $v) {
        if ($v['pid'] == $pId) {
            $v['checked'] = in_array($v['id'], $rule) || $v['disabled'] ? true : false;
            $v['ck'] = in_array($v['id'], $path) ? 'layui-nav-itemed' : '';
            $v['this'] = in_array($v['id'], $path) ? 'class="layui-this"' : '';
            $v['disabled'] = $v['disabled'] ? true : false;
            $v['value'] = $v['id'];
            $v['spread'] = in_array($v['id'], $path) ? true : false;
            $v['href'] = U($v['name']);
            $v['data'] = getTree($data, $v['id'], $rule, $path);
            $v['children'] = $v['data'];
            $tree[] = $v;
        }
    }
    return $tree;
}

// 左侧导航菜单主菜单
function get_nav_tree($array) {
    $nav = '<ul class="layui-nav layui-nav-tree">';
    foreach ($array as $key => $val) {
        $nav .= '<li class="layui-nav-item ' . $val['ck'] . '">';
        if (empty($val['data'])) {
            $nav .= '<a href="' . $val['href'] . '">' . $val['title'] . '</a>';
        } else {
            $nav .= '<a href="javascript:;">' . $val['title'] . '</a>';
            $nav .= nav_tree($val['data']);
        }
        $nav .= '</li>';
    }
    $nav .= '</ul>';
    return $nav;
}

// 左侧导航菜单子菜单
function nav_tree($array) {
    $str .= '<dl class="layui-nav-child">';
    foreach ($array as $key => $val) {
        if (!empty($val['data'])) {
            $str .= '<dd class="' . $val['ck'] . '"><a href="javascript:;">' . str_repeat('&nbsp;&nbsp;&nbsp;', $val['level']) . '├&nbsp;' . $val['title'] . '</a>';
            $str .= nav_tree($val['data']);
            $str .= '</dd>';
        } else {
            $str .= '<dd ' . $val['this'] . '><a href="' . $val['href'] . '">' . str_repeat('&nbsp;&nbsp;&nbsp;', $val['level']) . '├&nbsp;' . $val['title'] . '</a></dd>';
        }
    }
    $str .= '</dl>';
    return $str;
}

/* 删除文件夹 */

function del_dir($dir) {
    $dh = opendir($dir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $dir . "/" . $file;
            if (!is_dir($fullpath)) {
                @unlink($fullpath);
            } else {
                del_dir($fullpath);
            }
        }
    }
    closedir($dh);
    return true;
}
