<?php
defined('IN_MYWEB') or exit('No permission resources.');
base :: load_app_class('daili', 'daili', 0);

class userset extends daili {

	private $db, $aid, $uid, $username;

	public function __construct() {
		parent :: __construct();
		$this -> db = base :: load_model('user_model');
		$this -> aid = $this -> get_userinfo('aid');
		$this -> uid = intval($this -> get_userid());
		$this -> username = trim($this -> get_username());
	}

	public function init() {
		$user = $this -> db -> get_one(array('uid' => $this -> uid));
		// 获取代理配置
		$agent_config_db = base :: load_model('agent_config_model');
		$agent_config = $user['config_id'] ? $agent_config_db -> get_one(array('id' => $user['config_id'])) : array();
		include $this -> daili_tpl('userset');
	}

	public function pwset() {
		if (isset($_POST['dosubmit'])) {
			$oldpassword = trim($_POST['oldpassword']);
			$password = trim($_POST['password']);
			$repassword = trim($_POST['repassword']);
			if (empty($oldpassword) || empty($password) || empty($repassword)) {
				showmessage('请填写完整信息！', HTTP_REFERER);
			}
			if ($password != $repassword) {
				showmessage('两次输入密码不一致！', HTTP_REFERER);
			}
			if (strlen($password) > 20 || strlen($password) < 6) {
				showmessage('密码限制为6-20个字符！', HTTP_REFERER);
			}
			$user = $this -> db -> get_one(array('uid' => $this -> uid));
			if ($user['password'] != md5(md5($oldpassword).$user['encrypt'])) {
				showmessage('旧密码错误！', HTTP_REFERER);
			}
			list($newpassword, $encrypt) = creat_password($password);
			$update = array('password' => $newpassword, 'encrypt' => $encrypt);
			if ($this -> db -> update($update, array('uid' => $this -> uid))) {
				showmessage('密码修改成功，请重新登录！', DAILI_PATH.'&c=login&a=logout');
			} else {
				showmessage('密码修改失败！', HTTP_REFERER);
			}
		}
		include $this -> daili_tpl('userset');
	}

	public function agent() {
		if ($this -> aid > 1) {
			showmessage('无权限访问！', HTTP_REFERER);
		}
		$user = $this -> db -> get_one(array('uid' => $this -> uid));
		if (isset($_POST['dosubmit'])) {
			$config = array();
			$config['wxewm'] = safe_replace(trim($_POST['config']['wxewm']));
			$config['aliewm'] = safe_replace(trim($_POST['config']['aliewm']));
			$config['card'] = safe_replace(trim($_POST['config']['card']));
			$config['remark'] = safe_replace(trim($_POST['config']['remark']));
			$config['ann'] = trim($_POST['config']['ann']);
			$gamearr = $this -> gamelist();
			foreach ($gamearr as $v) {
				$config['game'.$v['id']] = intval($_POST['config']['game'.$v['id']]);
			}
			if ($_FILES['wxfile']['size']) {
				$up = base::load_sys_class('upimg');
				$up->datedir = false;
				$up->dir = 'ewm';
				$up->thumb = 0;
				$up->filename = 'wxfile';
				$wxreturn = $up->up();
				if ($wxreturn['state'] == 'success') {
					@unlink('./uppic/ewm/'.$config['wxewm']);
					$config['wxewm'] = $wxreturn['info'];
				}
			}
			if ($_FILES['alifile']['size']) {
				$up = base::load_sys_class('upimg');
				$up->datedir = false;
				$up->dir = 'ewm';
				$up->thumb = 0;
				$up->filename = 'alifile';
				$alireturn = $up->up();
				if ($alireturn['state'] == 'success') {
					@unlink('./uppic/ewm/'.$config['aliewm']);
					$config['aliewm'] = $alireturn['info'];
				}
			}
			$update = array('agentconfig' => serialize($config));
			if ($this -> db -> update($update, array('uid' => $this -> uid))) {
				showmessage('设置保存成功！', HTTP_REFERER);
			} else {
				showmessage('设置保存失败！', HTTP_REFERER);
			}
		}
		$agentconfig = $user['agentconfig'] ? unserialize($user['agentconfig']) : array();
		$gamearr = $this -> gamelist();
		include $this -> daili_tpl('userset');
	}
}
?>