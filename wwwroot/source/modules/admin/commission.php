<?php
defined('IN_MYWEB') or exit('No permission resources.');
base :: load_app_class('admin', 'admin', 0);

class commission extends admin {
	private $db, $db2;

	public function __construct() {
		parent :: __construct();
		$this -> db = base :: load_model('commission_model');
		$this -> db2 = base :: load_model('user_model');
	}

	public function init() {
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$list = $this -> db -> listinfo('', 'id DESC', $page, 20);
		$pages = $this -> db -> pages;
		base :: load_sys_class('format', '', 0);
		include $this -> admin_tpl('commission_list');
	}

	public function search() {
		$where = "";
		if (is_array($_GET['search'])) {
			$uid = isset($_GET['search']['uid']) ? $_GET['search']['uid'] : '';
			$agent_uid = isset($_GET['search']['agent_uid']) ? $_GET['search']['agent_uid'] : '';
			$start_time = isset($_GET['search']['start_time']) ? $_GET['search']['start_time'] : '';
			$end_time = isset($_GET['search']['end_time']) ? $_GET['search']['end_time'] : '';
		}
		$search_uid = intval($uid);
		$search_agent_uid = intval($agent_uid);
		if ($search_uid) $where .= $where ? " AND uid = '$search_uid'" : "uid = '$search_uid'";
		if ($search_agent_uid) $where .= $where ? " AND agent_uid = '$search_agent_uid'" : "agent_uid = '$search_agent_uid'";
		if ($start_time) {
			$time_start = strtotime($start_time);
			$where .= $where ? " AND addtime >= '$time_start'" : "addtime >= '$time_start'";
		}
		if ($end_time) {
			$time_end = strtotime($end_time);
			$where .= $where ? " AND addtime <= '$time_end'" : "addtime <= '$time_end'";
		}
		$page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
		$list = $this -> db -> listinfo($where, 'id DESC', $page, 20);
		$pages = $this -> db -> pages;
		base :: load_sys_class('format', '', 0);
		include $this -> admin_tpl('commission_list');
	}

}
?>