<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"/www/wwwroot/kkk.wmkf.xyz/public/../application/service/view/setting/sentence_edit.html";i:1703693364;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/static/component/pear/css/pear.css"/>
</head>
<body>
<form class="layui-form" action="">
    <div class="mainBox">
        <div class="main-container">
            <div class="layui-form-item">
                <label class="layui-form-label">选择语言</label>
                <div class="layui-input-block">
                    <select name="lang" lay-verify="required">
                        <?php $_658c51212fd2c=config('lang'); if(is_array($_658c51212fd2c) || $_658c51212fd2c instanceof \think\Collection || $_658c51212fd2c instanceof \think\Paginator): if( count($_658c51212fd2c)==0 ) : echo "" ;else: foreach($_658c51212fd2c as $key=>$vo): ?>
                        <option value="<?php echo $key; ?>" <?php if($sentence['lang'] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">状态</label>
                <div class="layui-input-block">
                    <select name="state" lay-verify="required">
                        <option value="using" <?php if($sentence['state'] == 'using'): ?>selected<?php endif; ?>>启用</option>
                        <option value="unuse" <?php if($sentence['state'] == 'unuse'): ?>selected<?php endif; ?>>禁用</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">客服</label>
                <div class="layui-input-block">
                    <select name="service_id" lay-verify="required" plac>
                        <option value="" style="display: none">请选择客服</option>
                        <?php foreach($allService as $item): ?>
                        <option <?php if($sentence['service_id'] == $item['service_id']): ?>selected<?php endif; ?>  value="<?php echo $item['service_id']; ?>"><?php echo $item['nick_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
            <div class="layui-form-item">
                <label class="layui-form-label">问候语</label>
                <div class="layui-input-block">
                    <textarea class="editormd-markdown-textarea" name="content" id="a_editormd" style="height: 260px;" lay-verify="required"><?php echo $sentence['content']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="button-container">
            <button type="submit" class="layui-btn layui-btn-normal layui-btn-sm" lay-submit="" lay-filter="save">
                <i class="layui-icon layui-icon-ok"></i>
                提交
            </button>
            <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                <i class="layui-icon layui-icon-refresh"></i>
                重置
            </button>
        </div>
    </div>
</form>
<script src="/static/component/layui/layui.js"></script>
<script src="/static/component/pear/pear.js"></script>
<script type="text/javascript" src="/assets/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/assets/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
    var editorOption = {
        UEDITOR_HOME_URL: "/assets/ueditor/",
        UEDITOR_ROOT_URL: "/assets/ueditor/",
        serverUrl: "<?php echo url('/service/upload/ueditor',['action'=>'config','service_id'=>$_SESSION['Msg']['service_id'],'admin_id'=>0]); ?>",
        lang: "zh-cn",
        toolbars: [["source","undo", "redo", "|", "bold", "italic", "underline", "fontborder", "strikethrough", "superscript", "subscript", "removeformat", "formatmatch", "autotypeset", "blockquote", "pasteplain", "|", "forecolor", "backcolor",  "selectall", "cleardoc", "|","lineheight", "|", "customstyle", "paragraph", "fontfamily", "fontsize", "|",  "link", "unlink","|", "simpleupload", "insertimage", "emotion","insertvideo"]],
        initialContent: "",
        pageBreakTag: "_ueditor_page_break_tag_",
        initialFrameWidth: "100%",
        initialFrameHeight: "260",
        initialStyle: "body{font-size:14px}",
        autoFloatEnabled: false,
        allowDivTransToP: true,
        autoHeightEnabled: false,
        charset: "utf-8",
    };
    var DomUe=UE.getEditor("a_editormd",editorOption)
</script>
<script>
    layui.use(['form', 'jquery'], function () {
        let form = layui.form;
        let $ = layui.jquery;

        form.on('submit(save)', function (data) {
            $.ajax({
                data: JSON.stringify(data.field),
                dataType: 'json',
                contentType: 'application/json',
                type: 'post',
                success: function (res) {
                    if (res.code === 1) {
                        layer.msg(res.msg, {
                            icon: 1
                        });
                        setTimeout(function () {
                            var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                            parent.layer.close(index);
                            parent.layui.table.reload("dataTable");
                        }, 2000)
                    } else {
                        layer.msg(res.msg, {icon: 2, time: 1500})
                    }
                }
            });
            return false;
        });
    })
</script>
</body>
</html>