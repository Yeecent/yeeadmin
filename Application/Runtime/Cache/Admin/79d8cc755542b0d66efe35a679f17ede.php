<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo ($config["title"]); ?>-<?php echo ($config["company"]); ?></title>
        <link rel="shortcut icon" href="<?php echo ($config["favicon"]); ?>">
        <link rel="stylesheet" href="<?php echo (ADMIN); ?>/layui/css/layui.css">
        <link rel="stylesheet" href="<?php echo (ADMIN); ?>/css/admin.css">
        <link rel="stylesheet" href="<?php echo (ADMIN); ?>/css/login.css">
        <script src="<?php echo (ADMIN); ?>/js/jquery.v1.12.4.js"></script>
        <script src="<?php echo (ADMIN); ?>/layui/layui.js"></script>
    </head>
    <body>
        <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login">
            <div class="layadmin-user-login-main">
                <div class="layadmin-user-login-box layadmin-user-login-header">
                    <h2><?php echo C('WEB_NAME');?></h2>
                </div>
                <form action="<?php echo U('login');?>" method="post" id='login_form'>
                    <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                        <div class="layui-form-item">
                            <label class="layadmin-user-login-icon layui-icon layui-icon-username"></label>
                            <input type="text" name="user" placeholder="用户名" class="layui-input" autocomplete="off" required>
                        </div>
                        <div class="layui-form-item">
                            <label class="layadmin-user-login-icon layui-icon layui-icon-password"></label>
                            <input type="password" name="password" placeholder="密码" autocomplete="off" class="layui-input" required>
                        </div>
                        <?php if(($config[is_code]) == "1"): ?><div class="layui-form-item">
                            <div class="layui-row">
                                <div class="layui-col-xs7">
                                    <label class="layadmin-user-login-icon layui-icon layui-icon-vercode"></label>
                                    <input type="text" name="code" placeholder="图形验证码" autocomplete="off" class="layui-input" required>
                                </div>
                                <div class="layui-col-xs5">
                                    <div style="margin-left: 10px;">
                                        <img src="<?php echo U('verify');?>" class="layadmin-user-login-codeimg" onclick="this.src = '<?php echo U('verify');?>?' + Math.random();">
                                    </div>
                                </div>
                            </div>
                        </div><?php endif; ?>
                        <div class="layui-form-item">
                            <button type='submit' class="layui-btn layui-btn-fluid">登 入</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="layui-trans layadmin-user-login-footer">
                <p>© 2018 <a href="<?php echo ($config["url"]); ?>" target="_blank"><?php echo ($config["company"]); ?></a></p>
            </div>
        </div>
        <script type='text/javascript'>
            $(function () {
                layui.use('layer', function () {
                    $('#login_form').submit(function () {
                        $.post($(this).attr('action'), $(this).serialize(), function (data) {
                            var layers = layui.layer;
                            layers.msg(data.msg, {
                                shade: [0.8, '#393D49'],
                                shadeClose: true,
                                end: function () {
                                    if (data.code == 1) {
                                        window.location.href = data.url;
                                    }
                                }
                            });
                        });
                        return false;
                    });
                });
            });
        </script>
    </body>
</html>