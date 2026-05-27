<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
?>
<div class="subnav">
	<h2 class="title-1">分成记录</h2>
	<div class="content-menu">
		<a href="<?php echo ADMIN_PATH?>&c=commission" class="on"><em>分成记录</em></a>
	</div>
</div>
<div class="content-t">
	<form action="<?php echo ADMIN_PATH?>&c=commission&a=search" method="get">
		<input type="hidden" name="m" value="admin" />
		<input type="hidden" name="c" value="commission" />
		<input type="hidden" name="a" value="search" />
		<table width="100%" cellspacing="0" class="table_form">
			<tr>
				<th>玩家UID：</th>
				<td><input class="input-text" type="text" name="search[uid]" value="" style="width: 80px;" /></td>
				<th>代理UID：</th>
				<td><input class="input-text" type="text" name="search[agent_uid]" value="" style="width: 80px;" /></td>
				<th>开始时间：</th>
				<td><input class="input-text" type="text" name="search[start_time]" value="" onclick="WdatePicker()" style="width: 120px;" /></td>
				<th>结束时间：</th>
				<td><input class="input-text" type="text" name="search[end_time]" value="" onclick="WdatePicker()" style="width: 120px;" /></td>
				<td><input type="submit" class="button" name="dosubmit" value=" 搜 索 " /></td>
			</tr>
		</table>
	</form>
	<table width="100%" cellspacing="0" class="table_list">
		<thead>
			<tr>
				<th>ID</th>
				<th>玩家UID</th>
				<th>代理UID</th>
				<th>注单ID</th>
				<th>下注金额(流水)</th>
				<th>分成比例</th>
				<th>分成金额</th>
				<th>时间</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (!empty($list)) {
				foreach ($list as $v) {
					$agent_info = $this -> db2 -> get_one(array('uid' => $v['agent_uid']));
			?>
			<tr>
				<td><?php echo $v['id'];?></td>
				<td><?php echo $v['uid'];?></td>
				<td><?php echo $v['agent_uid'];?><?php echo $agent_info ? ' ('.$agent_info['username'].')' : '';?></td>
				<td><?php echo $v['order_id'];?></td>
				<td><?php echo $v['order_money'];?></td>
				<td><?php echo $v['rebate'];?>%</td>
				<td><span style="color:#FF0000;font-weight:bold;"><?php echo $v['commission'];?></span></td>
				<td><?php echo date('Y-m-d H:i:s', $v['addtime']);?></td>
			</tr>
			<?php
				}
			} else {
			?>
			<tr><td colspan="8" style="text-align:center;">暂无分成记录</td></tr>
			<?php } ?>
		</tbody>
	</table>
	<div id="pages"><?php echo $pages;?></div>
</div>