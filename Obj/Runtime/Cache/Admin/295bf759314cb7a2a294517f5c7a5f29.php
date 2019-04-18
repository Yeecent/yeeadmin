<?php if (!defined('THINK_PATH')) exit();?><div class="layui-col-xs11" style="margin-top:10px;">
    <form action="<?php echo U('edits',array('id'=>$groups[id]),'');?>" class="layui-form" id="rules_form">
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input class="layui-input layui-disabled" value="<?php echo ($groups["title"]); ?>" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">角色权限</label>
            <div class="layui-input-block" style="border:1px solid #E6E6E6;padding-bottom:10px;">
                <div id="xtree1" class="xtree_contianer"></div>
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注信息</label>
            <div class="layui-input-block">
                <textarea name="remark" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo ($groups["id"]); ?>">
        <input type="hidden" name="rules" id='form-rules-data' value="">
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn layui-btn-fluid">提交保存</button>
            </div>
        </div>
    </form>
</div>
<script src="<?php echo (ADMIN); ?>/js/layui-xtree.js"></script>
<script type="text/javascript">
    layui.use(['form'], function () {
        var vdata = '';
        var form = layui.form, $ = layui.jquery, layer = layui.layer;
        var xtree1 = new layuiXtree({
            elem: 'xtree1'
            , form: form
            , data: <?php echo ($json); ?>
            , icon: {open: "&#xe625", close: "&#xe623", end: ""}
        });
        $('#rules_form').submit(function () {
            var oCks = xtree1.GetChecked(); //这是方法
            for (var i = 0; i < oCks.length; i++) {
                vdata += oCks[i].value + ',';
            }
            $('#form-rules-data').val(vdata);
            $.post($(this).attr('action'), $(this).serialize(), function (data) {
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