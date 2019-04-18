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
        <li class="layui-nav-item layui-bg-green"><a href="/" target="_blank">站点首页</a></li>
        <li class="layui-nav-item layui-bg-orange"><a href="<?php echo U('Index/clear');?>">清除缓存</a></li>
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
                <div class="layui-card-header layui-bg-gray">
                    <?php echo ($menu_nav); ?>
                    <button id="layui-add" class="layui-btn layui-btn-normal layui-btn-sm" style="float:right;margin:5px;" data='<?php echo U("adds");?>'> 添加用户 </button>
                </div>
                <div class="layui-card-body">
                    <table class="layui-table" lay-size="sm">
                        <colgroup>
                            <col width="50">
                            <col width="100">
                            <col width="100">
                            <col width="50">
                            <col width="100">
                            <col>
                            <col>
                            <col width="160">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>帐号</th>
                                <th>角色</th>
                                <th>头像</th>
                                <th>姓名</th>
                                <th>手机</th>
                                <th>邮箱</th>
                                <th>操作</th>
                            </tr> 
                        </thead>
                        <tbody>
                        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($vo["uid"]); ?></td>
                                <td><?php echo ($vo["user"]); ?></td>
                                <td><?php echo ($vo["title"]); ?></td>
                                <td><img src="<?php echo U('Index/getFile',array('code'=>$vo[headimg]),'');?>" style="width:100%;height:auto;"></td>
                                <td><?php echo ($vo["nick_name"]); ?></td>
                                <td><?php echo ($vo["tel"]); ?></td>
                                <td><?php echo ($vo["email"]); ?></td>
                                <td>
                                    <?php if(($vo[id]) == "1"): ?><div class="layui-btn-group">
                                        <button class="layui-btn layui-btn layui-btn-disabled layui-btn-sm">编辑用户</button>
                                        <button class="layui-btn layui-btn layui-btn-disabled layui-btn-sm">删除用户</button>
                                    </div>
                            <?php else: ?>
                            <div class="layui-btn-group">
                                <button class="layui-btn layui-btn-sm layui-edit" data='<?php echo U("edits",array("id"=>$vo[uid]),"");?>'>编辑用户</button>
                                <button class="layui-btn layui-btn-danger layui-btn-sm layui-del" data='<?php echo U("dels",array("id"=>$vo[uid]),"");?>'>删除用户</button>
                            </div><?php endif; ?>
                            </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="layui-footer">
    © <?php echo ($config["url"]); ?> - <?php echo ($config["company"]); ?>
</div>
    </div>
    <script>
        layui.use('layer', function () {
            var $ = layui.jquery, layer = layui.layer;
            $('#layui-add').on('click', function () {
                $.get($(this).attr('data'), function (data) {
                    layer.open({
                        type: 1
                        , title: '添加用户'
                        , area: ['500px', '700px']
                        , shade: [0.8, '#393D49']
                        , content: data
                    });
                });
            });
            $('.layui-del').on('click', function () {
                var $_that = $(this);
                layer.confirm('一旦删除将不可恢复，确认删除?', {icon: 3, title: '警告信息'}, function (index) {
                    $.get($_that.attr('data'), function (data) {
                        layer.msg(data.msg, {
                            shade: [0.8, '#393D49'],
                            shadeClose: true,
                            end: function () {
                                if (data.code == 1) {
                                    window.location.reload();
                                }
                            }
                        });
                    });
                });
            });
            $('.layui-edit').on('click', function () {
                var $_that = $(this);
                $.get($_that.attr('data'), function (data) {
                    if (data.code != 0) {
                        layer.open({
                            type: 1
                            , title: '修改用户'
                            , area: ['500px', '700px']
                            , shade: [0.8, '#393D49']
                            , content: data
                        });
                    } else {
                        layer.msg(data.msg, {
                            shade: [0.8, '#393D49'],
                            shadeClose: true
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>