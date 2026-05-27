<?php
defined('IN_MYWEB') or exit('No permission resources.');
base :: load_app_class('admin', 'admin', 0);
class agent_rebate extends admin {
	private $db;

	public function __construct() {
		parent :: __construct(1);
		$this -> db = base :: load_model('agent_rebate_log_model');
	}

	// ★ 统一入口：默认显示所有代理分成日志，支持搜索筛选和分页
	public function init() {
		$where = "";
		// 搜索参数
		$uid = isset($_GET['search']['uid']) ? intval($_GET['search']['uid']) : '';
		$agent_id = isset($_GET['search']['agent_id']) ? intval($_GET['search']['agent_id']) : '';
		$start_time = isset($_GET['search']['start_time']) ? trim($_GET['search']['start_time']) : '';
		$end_time = isset($_GET['search']['end_time']) ? trim($_GET['search']['end_time']) : '';

		if ($uid) $where .= $where ? " AND uid='$uid'" : "uid='$uid'";
		if ($agent_id) $where .= $where ? " AND agent_id='$agent_id'" : "agent_id='$agent_id'";
		if ($start_time) {
			$time_start = strtotime($start_time);
			if ($time_start) $where .= $where ? " AND addtime >= '$time_start'" : "addtime >= '$time_start'";
		}
		if ($end_time) {
			$time_end = strtotime($end_time);
			if ($time_end) $where .= $where ? " AND addtime <= '$time_end'" : "addtime <= '$time_end'";
		}

		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$pagesize = 20;
		$list = $this -> db -> listinfo($where, 'id DESC', $page, $pagesize);
		$pages = $this -> db -> pages;
		$total = $this -> db -> number;

		// 统计信息（当前筛选条件下的总计）
		$total_order = 0;
		$total_rebate = 0;
		if ($list && is_array($list)) {
			foreach ($list as $v) {
				$total_order += $v['order_money'];
				$total_rebate += $v['rebate_money'];
			}
		}

		base :: load_sys_class('format', '', 0);
		base :: load_sys_class('form');

		// 获取代理列表用于搜索下拉和显示名称
		$agent_db = base :: load_model('agent_model');
		$agent_list = $agent_db -> select('', 'id,name,rebate', '', 'id ASC');
		$agent_names = array();
		if ($agent_list) {
			foreach ($agent_list as $ag) {
				$agent_names[$ag['id']] = $ag['name'];
			}
		}

		// 获取用户名映射（批量查询优化）
		$user_db = base :: load_model('user_model');
		$user_names = array();
		$need_uids = array();
		if ($list && is_array($list)) {
			foreach ($list as $v) {
				$need_uids[$v['uid']] = 1;
				$need_uids[$v['agent_uid']] = 1;
			}
		}
		if (!empty($need_uids)) {
			$uid_str = implode(',', array_keys($need_uids));
			$user_rows = $user_db -> select("uid IN ($uid_str)", 'uid,username', '', 'uid ASC');
			if ($user_rows) {
				foreach ($user_rows as $ur) {
					$user_names[$ur['uid']] = $ur['username'];
				}
			}
		}

		include $this -> admin_tpl('agent_rebate_list');
	}

	// ★ 保留search方法兼容旧链接，重定向到init
	public function search() {
		header('Location: ' . ADMIN_PATH . '&c=agent_rebate&a=init' . (strpos($_SERVER['QUERY_STRING'], 'search') !== false ? '&' . http_build_query($_GET['search'] ? $_GET : array()) : ''));
		exit;
	}

	public function del() {
		$id = intval($_GET['id']);
		if (!$id) {
			echo json_encode(array('run' => 'no', 'msg' => '参数错误！'));
			exit();
		}
		// 反向扣减代理余额和佣金
		$log = $this -> db -> get_one(array('id' => $id));
		if ($log && $log['rebate_money'] > 0 && $log['agent_uid'] > 0) {
			$user_db = base :: load_model('user_model');
			$user_db -> update(array('money' => '-='.$log['rebate_money'], 'commission' => '-='.$log['rebate_money']), array('uid' => $log['agent_uid']));
			// 通过account_id精确删除对应的流水记录
			$account_db = base :: load_model('account_model');
			if ($log['account_id'] > 0) {
				$account_db -> delete(array('id' => $log['account_id']));
			} else {
				$account_db -> delete("uid = '".$log['agent_uid']."' AND type = 6 AND money = '".$log['rebate_money']."' AND addtime = '".$log['addtime']."' LIMIT 1");
			}
		}
		if ($this -> db -> delete(array('id' => $id))) {
			echo json_encode(array('run' => 'yes', 'msg' => '删除成功！', 'id' => 'list_' . $id));
			exit();
		} else {
			echo json_encode(array('run' => 'no', 'msg' => '删除失败！'));
			exit();
		}
	}
}
?>