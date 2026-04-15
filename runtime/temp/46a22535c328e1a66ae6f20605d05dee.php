<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"/www/wwwroot/kf5.xywlgzs.vip/public/../application/backend/view/storage/index.html";i:1679718788;}*/ ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="/static/component/pear/css/pear.css" />
</head>
<script>
    let type = "<?php echo $type; ?>";
</script>
<body class="pear-container">
		
		<div class="layui-card">
			<div class="layui-card-body">
				<h2>阿里云存储设置</h2>
			</div>
		</div>

		<div class="layui-card">
			<div class="layui-card-body">
				<form class="layui-form" action="">
                    <div class="layui-form-item">
                        <label class="layui-form-label">存储引擎</label>
                        <div class="layui-input-block">
                          <input type="radio" name="type" value="1" title="本地存储" <?php if($type == '1'): ?>checked<?php endif; ?>>
                          <input type="radio" name="type" value="2" title="云存储" <?php if($type == '2'): ?>checked<?php endif; ?>>
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">access_key</label>
                        <div class="layui-input-block">
                          <input type="text" name="access_key" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $config['access_key']; ?>">
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">secret_key</label>
                        <div class="layui-input-block">
                          <input type="text" name="secret_key" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $config['secret_key']; ?>">
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">domain</label>
                        <div class="layui-input-block">
                          <input type="text" name="domain" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $config['domain']; ?>"> 
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <label class="layui-form-label">bucket</label>
                        <div class="layui-input-block">
                          <input type="text" name="bucket" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input" value="<?php echo $config['bucket']; ?>">
                        </div>
                      </div>
                      <div class="layui-form-item">
                        <div class="layui-input-block">
                          <button class="layui-btn layui-btn-success" lay-submit lay-filter="formDemo" style="height:40px;background-color: #5FB878!important;">立即提交</button>
                        </div>
                      </div>
                </form>
			</div>
		</div>

		

        <script src="/static/component/layui/layui.js"></script>
        <script src="/static/component/pear/pear.js"></script>
		<script src="/assets/js/platform/clipboard.min.js?v=AI_KF"></script>
        <script>
			layui.use(['table', 'form', 'jquery','common'], function() {
				let table = layui.table;
				let form = layui.form;
				let $ = layui.jquery;
				let common = layui.common;

				let MODULE_PATH = "/backend/";
               
                form.on('submit(formDemo)', function(data) {
                    let type =  $('input[name="type"]:checked').val();
                    let field = data.field;
                    field.type = type
                    console.log(field)
                    $.post("<?php echo url('save'); ?>",field,res=>{
                        layer.msg(res.msg)
                    },'json')
                    return false;
                });

                
			})
		</script>
</body>
</html>
