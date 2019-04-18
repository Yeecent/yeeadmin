<?php if (!defined('THINK_PATH')) exit();?><div class="layui-col-xs11" style="margin-top:10px;">
    <form class="layui-form" action="<?php echo U('Index/setpwd');?>" lay-filter="example" id='setpwd_form'>
        <div class="layui-form-item">
            <label class="layui-form-label">旧的密码</label>
            <div class="layui-input-block">
                <input type="password" name="opassword" placeholder="请输入旧密码" class="layui-input" required>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新的密码</label>
            <div class="layui-input-block">
                <input type="password" name="password" placeholder="请输入新密码" class="layui-input" required>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="cpassword" placeholder="请输入确认密码" class="layui-input" required>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" type="submit">确认修改</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    layui.use(['form', 'layer'], function () {
        var form = layui.form, layer = layui.layer, $ = layui.jquery;
        $('#setpwd_form').submit(function () {
            $_this = $(this);
            $.post($_this.attr('action'), $_this.serialize(), function (data) {
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
            return false;
        });
    });
</script>