<?php if (!defined('THINK_PATH')) exit();?><div class="layui-col-xs11" style="margin-top:10px;">
    <form class="layui-form" action="<?php echo U('edits',array('id'=>$data[uid]),'');?>" lay-filter="example" id='member-form'>
        <table>
            <tr>
                <td>
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户帐号</label>
                        <div class="layui-input-block">
                            <input class="layui-input" placeholder="请输入用户帐号" value="<?php echo ($data["user"]); ?>" disabled="">
                        </div>
                    </div>
                </td>
                <td rowspan="2" style="padding:0;">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <a href="javascript:;">
                                <img src="<?php echo U('Index/getFile',array('code'=>$data[headimg]),'');?>" style="width:90px;height:90px;" id="user-headimg-up-btn">
                            </a>
                            <input type="hidden" name="headimg" value="<?php echo ($data["headimg"]); ?>" id="user-headimg-input">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="layui-form-item">
                        <label class="layui-form-label">所属角色</label>
                        <div class="layui-input-block">
                            <select name="group_id" lay-filter="aihao">
                                <?php if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($vo[id]) == $data[group_id]): ?>selected<?php endif; ?>><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="password" placeholder="不修改请留空" class="layui-input">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="layui-form-item">
                        <label class="layui-form-label">确认密码</label>
                        <div class="layui-input-block">
                            <input type="password" name="cpassword" placeholder="不修改请留空" class="layui-input">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户姓名</label>
                        <div class="layui-input-block">
                            <input type="text" name="nick_name" placeholder="请输入用户姓名" value="<?php echo ($data["nick_name"]); ?>" class="layui-input" required>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户性别</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="男" title="男" <?php if(($data[sex]) == "男"): ?>checked<?php endif; ?>>
                            <input type="radio" name="sex" value="女" title="女" <?php if(($data[sex]) == "女"): ?>checked<?php endif; ?>>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户电话</label>
                        <div class="layui-input-block">
                            <input type="text" name="tel" placeholder="请输入用户电话" value="<?php echo ($data["tel"]); ?>" class="layui-input" required>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户邮箱</label>
                        <div class="layui-input-block">
                            <input type="text" name="email" placeholder="请输入用户邮箱" value="<?php echo ($data["email"]); ?>" class="layui-input">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="layui-form-item">
                        <label class="layui-form-label">备注信息</label>
                        <div class="layui-input-block">
                            <textarea name="remark" placeholder="请输入内容" class="layui-textarea"><?php echo ($data["remark"]); ?></textarea>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" type='submit'>提交保存</button>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    layui.use(['form', 'layer', 'upload'], function () {
        var form = layui.form, layer = layui.layer, $ = layui.jquery, upload = layui.upload;
        form.render();
        upload.render({
            elem: '#user-headimg-up-btn' //绑定元素
            , url: '<?php echo U("Index/head_img_upload",array("token"=>$member[token]),"");?>' //上传接口
            , done: function (res) {
                if (res.code) {
                    $('#user-headimg-input').val(res.code);
                    $('#user-headimg-up-btn').attr('src', res.url);
                } else {
                    layer.msg(res.msg, {shade: [0.8, '#393D49'], shadeCole: true});
                }
            }
            , error: function () {
                layer.msg('网络错误，请稍候再试！', {shade: [0.8, '#393D49'], shadeCole: true});
            }
        });
        $('#member-form').submit(function () {
            var $_this = $(this);
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