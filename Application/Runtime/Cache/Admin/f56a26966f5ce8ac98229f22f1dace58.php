<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php echo ($config["company"]); ?></title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="shortcut icon" href="<?php echo ($config["favicon"]); ?>">
<link rel="stylesheet" href="<?php echo (ADMIN); ?>/layui/css/layui.css"  media="all">
<script src="<?php echo (ADMIN); ?>/js/jquery.v1.12.4.js" charset="utf-8"></script>
<script src="<?php echo (ADMIN); ?>/layui/layui.js" charset="utf-8"></script>
</head>
<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
    <div class="layui-logo"><?php echo C('WEB_NAME');?></div>
    <ul class="layui-nav layui-layout-left" style='padding:0;'>
        <li class="layui-nav-item layui-bg-green"><a href="/" target="_blank"><span class='layui-icon'>&#xe68e;</span> 站点首页</a></li>
        <li class="layui-nav-item layui-bg-orange"><a href="<?php echo U('Index/clear');?>"><span class='layui-icon'>&#xe9aa;</span> 清除缓存</a></li>
        <?php if(auth($member,'Admin/Index/retdata')): ?><li class="layui-nav-item layui-bg-red"><a href="<?php echo U('Index/retdata');?>">重置数据</a></li><?php endif; ?>
    </ul>
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="<?php echo U('Index/getFile',array('code'=>$member[headimg]),'');?>" class="layui-nav-img">
                <?php echo ($member["user"]); ?>
            </a>
            <dl class="layui-nav-child">
                <dd><a href="<?php echo U('Index/getmember');?>" id='set_member_btn'>基本资料</a></dd>
                <dd><a href="<?php echo U('Index/setpwd');?>" id='set_password_btn'>修改密码</a></dd>
                <dd><a href="<?php echo U('Index/login_out');?>">退出登陆</a></dd>
            </dl>
        </li>
    </ul>
</div>
<script type="text/javascript">
    layui.use('form', function () {
        var layer = layui.layer, form = layui.form, $ = layui.jquery;
        $('#set_member_btn').click(function () {
            $_this = $(this);
            $.get($_this.attr('href'), function (data) {
                if (data.status === 0) {
                    layer.msg(data.info, {shade: [0.8, '#393D49'], shadeClose: true});
                } else {
                    layer.open({
                        title: '基本资料',
                        type: 1,
                        shade: [0.8, '#393D49'],
                        area: ['500px', '500px'],
                        content: data
                    });
                }
            });
            return false;
        });
        $('#set_password_btn').click(function () {
            $_this = $(this);
            $.get($_this.attr('href'), function (data) {
                layer.open({
                    title: '修改密码',
                    type: 1,
                    shade: [0.8, '#393D49'],
                    area: ['400px', '300px'],
                    content: data
                });
            });
            return false;
        });
    });
</script>
        <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <?php echo ($menu); ?>
    </div>
</div>
<script>
    layui.use('element', function () {
        var element = layui.element;
    });
</script>
        <div class="layui-body">
            <div class="layui-card">
                <div class="layui-card-header layui-bg-gray"><?php echo ($menu_nav); ?></div>
                <div class="layui-card-body">
                    <div class="layui-tab" lay-filter="test">
                        <ul class="layui-tab-title">
                            <li class="layui-this" lay-id="11">系统设置</li>
<!--                            <li lay-id="22">库存设置</li>
                            <li lay-id="33">其它设置</li>-->
                        </ul>
                        <div class="layui-tab-content">
                            <div class="layui-tab-item layui-show">
                                <form class="layui-form conf-form" action="<?php echo U('Config/index');?>">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">系统名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="title" value='<?php echo ($config["title"]); ?>' required  lay-verify="required" placeholder="请输入系统名称" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">公司名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="company" value='<?php echo ($config["company"]); ?>' required  lay-verify="required" placeholder="请输入公司名称" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">公司网址</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="url" value='<?php echo ($config["url"]); ?>' required  lay-verify="required" placeholder="请输入公司网址,例: http://www.baidu.com" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">网站关键字</label>
                                        <div class="layui-input-block">
                                            <textarea name="keywords" placeholder="用于搜索引擎识别的站点关键字,有利于SEO优化,每个关键字需以英文半角逗号隔开,长度限制256个字符" class="layui-textarea"><?php echo ($config["keywords"]); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">网站描述</label>
                                        <div class="layui-input-block">
                                            <textarea name="description" placeholder="用于描述站点的简要信息,内容长度限制256个字符" class="layui-textarea"><?php echo ($config["description"]); ?></textarea>
                                        </div>
                                    </div>                                    
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">公司电话</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="tel" value='<?php echo ($config["tel"]); ?>' required  lay-verify="required" placeholder="请输入公司电话号码" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">公司邮箱</label>
                                        <div class="layui-input-block">
                                            <input type="text" name="email" value='<?php echo ($config["email"]); ?>' placeholder="请输入公司电子邮箱" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">验证码开关</label>
                                        <div class="layui-input-inline">
                                            <input type="checkbox" name="is_code" lay-skin="switch"  lay-text="ON|OFF" <?php if(($config[is_code]) == "1"): ?>checked<?php endif; ?>>
                                        </div>
                                        <div class="layui-form-mid layui-word-aux">登陆界面验证码开关</div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">JS脚本</label>
                                        <div class="layui-input-block">
                                            <textarea name="foot" placeholder="用于放置百度搜索脚本或其它相关的JS脚本" class="layui-textarea"><?php echo ($config["foot"]); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item layui-form-text">
                                        <label class="layui-form-label">备注信息</label>
                                        <div class="layui-input-block">
                                            <textarea name="remark" placeholder="请输入内容" class="layui-textarea"><?php echo ($config["remark"]); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" type='submit'>提交保存</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
<!--                            <div class="layui-tab-item">
                                <form class="layui-form conf-form" action="<?php echo U('System/index');?>">
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">库存报警值</label>
                                        <div class="layui-input-inline">
                                            <input type="number" name="stock" value='<?php echo ($config["stock"]); ?>' required  lay-verify="required" placeholder="请输入库存报警值" class="layui-input">
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <label class="layui-form-label">减库存设置</label>
                                        <div class="layui-input-inline">
                                            <select name='stock_switch'>
                                                <option value='0'>创建订单时</option>
                                                <option value='1' <?php if(($conf[stock_switch]) == "1"): ?>selected<?php endif; ?>>处理订单时</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="layui-form-item">
                                        <div class="layui-input-block">
                                            <button class="layui-btn" type='submit'>提交保存</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="layui-tab-item">其它设置</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-footer">
    © <?php echo ($config["url"]); ?> - <?php echo ($config["company"]); ?>
</div>
    </div>
    <script>
        layui.use('form', function () {
            var form = layui.form, $ = layui.jquery, element = layui.element;
            var layid = location.hash.replace(/^#vid=/, '');
            element.tabChange('test', layid);
            $('.conf-form').submit(function () {
                $_this = $(this);
                $.post($_this.attr('action'), $_this.serialize(), function (data) {
                    layer.msg(data.msg, {
                        shade: [0.8, '#393D49'],
                        shadeClose: true
                    });
                });
                return false;
            });
        });
    </script>
</body>
</html>