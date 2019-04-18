<?php if (!defined('THINK_PATH')) exit();?><div class="layui-col-xs11" style="margin:10px;">
    <form class="layui-form" action="<?php echo U('adds',array('id'=>$data[id]),'');?>" id="form-data-sub">
        <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="pid" id='menu_select'>
                    <option value="0">顶级菜单</option>
                    <?php echo ($parent); ?>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块名称</label>
            <div class="layui-input-block">
                <input type="text" name="model" required placeholder="请输入模块名称" value='Admin' autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">应用名称</label>
            <div class="layui-input-block">
                <input type="text" name="contrl" required placeholder="请输入应用名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">方法名称</label>
            <div class="layui-input-block">
                <input type="text" name="action" required placeholder="请输入方法名称" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">排序</label>
            <div class="layui-input-inline">
                <input type="text" name="order" required placeholder="请输入排序号" value="0" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">纯数字，仅用于排序</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统菜单</label>
            <div class="layui-input-inline">
                <select name="is_sys">
                    <option value="0">否</option>
                    <option value="1">是</option>
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">系统菜单不可删除</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">默认权限</label>
            <div class="layui-input-inline">
                <select name="check">
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">是否需要认证的权限</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单状态</label>
            <div class="layui-input-inline">
                <select name="is_show">
                    <option value="1">显示</option>
                    <option value="0">隐藏</option>
                </select>
            </div>
            <div class="layui-form-mid layui-word-aux">是否在主导航显示</div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn">提交保存</button>
            </div>
        </div>
    </form>
</div>
<script>
    layui.use('form', function () {
        var form = layui.form;
        $('#form-data-sub').submit(function () {
            $_this = $(this);
            $.post($_this.attr('action'), $_this.serialize(), function (data) {
                layer.msg(data.msg, {
                    icon: data.code,
                    shade: [0.3, '#393D49'],
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
        $('#menu_select').find('option').each(function () {
            if ($(this).val() == $(this).attr('data')) {
                $(this).attr('selected', true);
            }
        });
        form.render();
    });
</script>