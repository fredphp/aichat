<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
?>
<div class="subnav">
	<h2 class="title-1">代理分成记录</h2>
	<a href="javascript:location.reload();" class="reload">刷新</a>
	<a href="javascript:;" onclick="searchshow(1)" class="searchshow">展开/收起搜索栏</a>
	<div class="content-menu">
		<a href="<?php echo ADMIN_PATH?>&c=agent_rebate&a=init" class="on"><em>分成记录</em></a>
	</div>
</div>
<div class="content-t">
	<div id="searchshow">
		<form name="searchform" action="<?php echo ADMIN_PATH?>&c=agent_rebate&a=init" method="get">
			<input type="hidden" name="m" value="admin">
			<input type="hidden" name="c" value="agent_rebate">
			<input type="hidden" name="a" value="init">
			<table width="100%" cellspacing="0" class="search-form">
				<tbody>
					<tr>
						<td>
							<div class="explain-col">
								用户UID <input class="input-text" type="text" name="search[uid]" style="width:60px;" value="<?php echo $uid ? $uid : ''?>">
								代理
								<select name="search[agent_id]" class="input-text">
									<option value="0">全部代理</option>
									<?php if(isset($agent_list) && is_array($agent_list)) { foreach($agent_list as $ag) { ?>
									<option value="<?php echo $ag['id']?>" <?php if($agent_id == $ag['id']) echo 'selected';?>><?php echo htmlspecialchars($ag['name'])?></option>
									<?php }} ?>
								</select>
								时间 <?php echo form::date('search[start_time]', $start_time ? $start_time : '','1')?>
								到 <?php echo form::date('search[end_time]', $end_time ? $end_time : '','1')?>
								<input type="submit" value="搜索" class="button" name="dosubmit">
								<?php if ($uid || $agent_id || $start_time || $end_time) { ?>
								<a href="<?php echo ADMIN_PATH?>&c=agent_rebate&a=init" style="color:#F00; margin-left:10px;">清除搜索</a>
								<?php } ?>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
	<div class="table-list">
		<table width="100%" cellspacing="0">
			<thead>
				<tr>
					<th align="center" width="60">ID</th>
					<th align="center" width="80">用户(UID)</th>
					<th align="center" width="100">代理名称</th>
					<th align="center" width="80">代理(UID)</th>
					<th align="center" width="80">下注金额</th>
					<th align="center" width="80">分成比例</th>
					<th align="center" width="80">分成金额</th>
					<th align="center" width="140">时间</th>
					<th align="center" width="60">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if (isset($list) && is_array($list) && count($list) > 0) {
			foreach ($list as $v) {
				$user_display = $v['uid'];
				$agent_user_display = $v['agent_uid'];
				if (isset($user_names[$v['uid']])) {
					$user_display = $user_names[$v['uid']] . '(' . $v['uid'] . ')';
				}
				if (isset($user_names[$v['agent_uid']])) {
					$agent_user_display = $user_names[$v['agent_uid']] . '(' . $v['agent_uid'] . ')';
				}
				$agent_name = isset($agent_names[$v['agent_id']]) ? $agent_names[$v['agent_id']] : '已删除';
			?>
				<tr id="list_<?php echo $v['id']?>">
					<td align="center"><?php echo $v['id']?></td>
					<td align="center"><?php echo $user_display?></td>
					<td align="center"><?php echo htmlspecialchars($agent_name)?></td>
					<td align="center"><?php echo $agent_user_display?></td>
					<td align="center"><?php echo $v['order_money']?></td>
					<td align="center"><?php echo $v['rebate']?>%</td>
					<td align="center" style="color:#F00;"><?php echo $v['rebate_money']?></td>
					<td align="center"><?php echo format::date($v['addtime'], 1)?></td>
					<td align="center">
						<a href="javascript:;" onclick="showwindow('<?php echo ADMIN_PATH?>&c=agent_rebate&a=del&id=<?php echo $v['id']?>', '确定删除这条分成记录吗？删除后将反向扣减代理余额！');">[删除]</a>
					</td>
				</tr>
			<?php }} else { ?>
				<tr>
					<td colspan="9" align="center" style="padding:30px; color:#999;">
						暂无分成记录<br/>
						<span style="font-size:12px;">分成记录在下注结算时自动生成，请确保：1）代理已启用且设置了分成比例；2）玩家已关联到代理</span>
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<?php if (isset($list) && is_array($list) && count($list) > 0) { ?>
			<tfoot>
				<tr>
					<td colspan="4" align="right"><strong>本页合计：</strong></td>
					<td align="center"><strong><?php echo round($total_order, 2)?></strong></td>
					<td align="center">--</td>
					<td align="center" style="color:#F00;"><strong><?php echo round($total_rebate, 2)?></strong></td>
					<td colspan="2"></td>
				</tr>
			</tfoot>
			<?php } ?>
		</table>
		<div id="pages"><?php echo $pages?></div>
	</div>
</div>
</body>
</html>