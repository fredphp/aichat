<?php
defined('IN_MYWEB') or exit('No permission resources.');
base :: load_app_class('admin', 'admin', 0);

class commission extends admin {

	public function __construct() {
		parent :: __construct();
	}

	public function init() {
		// 重定向到更完整的代理分成记录页面
		header('Location: ' . ADMIN_PATH . '&c=agent_rebate&a=init');
		exit;
	}

	public function search() {
		header('Location: ' . ADMIN_PATH . '&c=agent_rebate&a=search');
		exit;
	}
}
?>