<?php
// Agent commission system migration script
// Can be run via CLI or web (with token)

define('IN_MYWEB', true);
require_once dirname(__FILE__) . '/source/libs/classes/application.class.php';
base::load_sys_class('db_factory');

$db_config = base::load_config('database');
$db = db_factory::get_instance($db_config)->get_database('default');

echo "<pre>\n";
echo "=== Agent Commission System Migration ===\n\n";

// 1. Create bc_agent table
$sql1 = "CREATE TABLE IF NOT EXISTS `bc_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '代理ID',
  `name` varchar(50) NOT NULL COMMENT '代理名称',
  `rebate` decimal(5,2) NOT NULL DEFAULT '0.00' COMMENT '分成比例(%)',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态1启用0停用',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4";

$db->query($sql1);
echo "[OK] bc_agent table created\n";

// 2. Create bc_agent_rebate_log table
$sql2 = "CREATE TABLE IF NOT EXISTS `bc_agent_rebate_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) NOT NULL COMMENT '下注用户UID',
  `agent_id` int(11) NOT NULL COMMENT '代理ID',
  `agent_uid` int(11) NOT NULL COMMENT '代理用户UID',
  `order_id` int(11) NOT NULL DEFAULT '0' COMMENT '注单ID',
  `order_money` decimal(10,2) NOT NULL COMMENT '下注金额',
  `rebate` decimal(5,2) NOT NULL COMMENT '分成比例(%)',
  `rebate_money` decimal(10,2) NOT NULL COMMENT '分成金额',
  `addtime` int(11) NOT NULL COMMENT '时间',
  PRIMARY KEY (`id`),
  KEY `agent_uid` (`agent_uid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4";

$db->query($sql2);
echo "[OK] bc_agent_rebate_log table created\n";

// 3. Add agent_id column to bc_user if not exists
$tablepre = $db_config['default']['tablepre'];
$check_col = $db->query("SHOW COLUMNS FROM `{$tablepre}user` LIKE 'agent_id'");
$col_exists = $db->fetch_next();
if (!$col_exists) {
    $db->query("ALTER TABLE `{$tablepre}user` ADD COLUMN `agent_id` int(11) NOT NULL DEFAULT '0' COMMENT '代理配置ID' AFTER `agents`");
    echo "[OK] bc_user.agent_id column added\n";
} else {
    echo "[SKIP] bc_user.agent_id column already exists\n";
}

echo "\n=== Migration Complete! ===\n";
echo "</pre>";
?>
