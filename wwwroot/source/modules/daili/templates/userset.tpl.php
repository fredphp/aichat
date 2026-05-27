<?php
defined('IN_DAILI') or exit('No permission resources.');
include $this->daili_tpl('header');
?>
<div class="subnav">
	<h2 class="title-1">资料设置</h2>
	<div class="content-menu">
		<a id="menu-1" href="javascript:;" onclick="menuswitch('1');" class="on"><em>账户信息</em></a><span>|</span>
		<a id="menu-2" href="javascript:;" onclick="menuswitch('2');"><em>修改密码</em></a>
		<?php if($this -> aid < 2){ ?>
		<span>|</span>
		<a id="menu-3" href="javascript:;" onclick="menuswitch('3');"><em>代理设置</em></a>
		<?php } ?>
	</div>
</div>
<div class="content-t">
	<div id="content-1">
		<table width="100%" cellspacing="0" class="table_form">
			<tr>
				<th>UID：</th>
				<td><?php echo $user['uid'];?></td>
			</tr>
			<tr>
				<th>用户名：</th>
				<td><?php echo $user['username'];?></td>
			</tr>
			<tr>
				<th>代理类型：</th>
				<td><?php echo $agent_config ? '<span style="color:#FF0000;font-weight:bold;">'.$agent_config['name'].'</span> (分成比例:'.$agent_config['rebate'].'%)' : '未设置';?></td>
			</tr>
			<tr>
				<th>累计佣金：</th>
				<td><span style="color:#FF0000;font-size:16px;font-weight:bold;"><?php echo $user['commission'];?></span></td>
			</tr>
			<tr>
				<th>账户余额：</th>
				<td><span style="color:#0066FF;font-size:16px;font-weight:bold;"><?php echo $user['money'];?></span></td>
			</tr>
			<tr>
				<th>信用额度：</th>
				<td><?php echo $user['credit'];?></td>
			</tr>
			<tr>
				<th>上次登录：</th>
				<td><?php echo $user['logintime'] ? date('Y-m-d H:i:s', $user['logintime']) : '首次登录';?></td>
			</tr>
		</table>
	</div>
	<div id="content-2" style="display:none;">
		<form action="<?php echo DAILI_PATH?>&c=userset&a=pwset" method="post" id="myform">
			<table width="100%" cellspacing="0" class="table_form">
				<tr>
					<th>旧密码：</th>
					<td><input class="input-text" type="password" name="oldpassword" value="" id="oldpassword" /></td>
				</tr>
				<tr>
					<th>新密码：</th>
					<td><input class="input-text" type="password" name="password" value="" id="password" /></td>
				</tr>
				<tr>
					<th>确认密码：</th>
					<td><input class="input-text" type="password" name="repassword" value="" id="repassword" /></td>
				</tr>
			</table>
			<div class="mt20"></div>
			<input type="submit" class="button" name="dosubmit" value=" 提 交 " />
		</form>
	</div>
	<?php if($this -> aid < 2){ ?>
	<div id="content-3" style="display:none;">
		<form enctype="multipart/form-data" action="<?php echo DAILI_PATH?>&c=userset&a=agent" method="post" id="myform3">
			<table width="100%" cellspacing="0" class="table_form">
				<tr>
					<th width="100"></th>
					<td><?php echo isset($agentconfig['wxewm']) && $agentconfig['wxewm'] ? '<img src="uppic/ewm/'.$agentconfig['wxewm'].'" width="200" height="200" />' : ''?></td>
				</tr>
				<tr>
					<th width="100">微信收款二维码：</th>
					<td>
						<input type="file" id="wxfile" name="wxfile" accept="image/*" />
						<input type="hidden" name="config[wxewm]" value="<?php echo isset($agentconfig['wxewm']) ? $agentconfig['wxewm'] : '';?>" />
						<span>建议二维码图片尺寸：200PX * 200PX</span>
					</td>
				</tr>
				<tr>
					<th width="100"></th>
					<td><?php echo isset($agentconfig['aliewm']) && $agentconfig['aliewm'] ? '<img src="uppic/ewm/'.$agentconfig['aliewm'].'" width="200" height="200" />' : ''?></td>
				</tr>
				<tr>
					<th width="100">支付宝收款二维码：</th>
					<td>
						<input type="file" id="alifile" name="alifile" accept="image/*" />
						<input type="hidden" name="config[aliewm]" value="<?php echo isset($agentconfig['aliewm']) ? $agentconfig['aliewm'] : '';?>" />
						<span>建议二维码图片尺寸：200PX * 200PX</span>
					</td>
				</tr>
				<tr>
					<th>收款银行：</th>
					<td>
						<textarea class="input-text" name="config[card]" style="width: 300px;height: 60px;"><?php echo isset($agentconfig['card']) ? $agentconfig['card'] : '';?></textarea>
						<p>请完整填写银行名称、卡号和姓名信息</p>
					</td>
				</tr>
				<tr>
					<th>支付备注：</th>
					<td>
						<input class="input-text" type="text" name="config[remark]" value="<?php echo isset($agentconfig['remark']) ? $agentconfig['remark'] : '';?>" style="width: 200px;" />
					</td>
				</tr>
				<tr>
					<th>代理公告：</th>
					<td>
						<input class="input-text" type="text" name="config[ann]" value="<?php echo isset($agentconfig['ann']) ? htmlspecialchars($agentconfig['ann']) : '';?>" style="width: 500px;" />
						<span>该信息将展示在直属会员页面</span>
					</td>
				</tr>
				<?php
				if (!empty($gamearr)) {
					foreach ($gamearr as $v) {
				?>
				<tr>
					<th><?php echo $v['name']?>：</th>
					<td>
						<label><input type="radio" name="config[game<?php echo $v['id']?>]" value="1" <?php if(!isset($agentconfig['game'.$v['id']]) || $agentconfig['game'.$v['id']]) echo 'checked="checked"';?> />开启</label>
						<label><input type="radio" name="config[game<?php echo $v['id']?>]" value="0" <?php if(isset($agentconfig['game'.$v['id']]) && !$agentconfig['game'.$v['id']]) echo 'checked="checked"';?> />关闭</label>
					</td>
				</tr>
				<?php
					}
				}
				?>
			</table>
			<div class="mt20"></div>
			<input type="submit" class="button" name="dosubmit" value=" 提 交 " />
		</form>
	</div>
	<?php } ?>
</div>
<script type="text/javascript">
<!--
$(function(){
	var Vform = $("#myform").Validform();
	Vform.config({tiptype:3});
	Vform.addRule([
		{
			ele:'#oldpassword',
			datatype:'*',
			nullmsg:'请输入旧密码',
			errormsg:'请输入旧密码'
		},
		{
			ele:'#password',
			datatype:'s6-20',
			nullmsg:'请输入新密码',
			errormsg:'密码限制为6-20个字符'
		},
		{
			ele:'#repassword',
			datatype:'s6-20',
			nullmsg:'请确认密码',
			errormsg:'密码限制为6-20个字符'
		}
	]);
})
//-->
</script>
</body>
</html>