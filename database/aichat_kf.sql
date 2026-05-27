mysqldump: [Warning] Using a password on the command line interface can be insecure.
-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: aichat_kf
-- ------------------------------------------------------
-- Server version	8.0.46

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
mysqldump: Error: 'Access denied; you need (at least one of) the PROCESS privilege(s) for this operation' when trying to dump tablespaces

--
-- Table structure for table `phone_msg`
--

DROP TABLE IF EXISTS `phone_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phone_msg` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(128) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `services` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_msg`
--

LOCK TABLES `phone_msg` WRITE;
/*!40000 ALTER TABLE `phone_msg` DISABLE KEYS */;
INSERT INTO `phone_msg` VALUES (1,'15588861327','119.162.200.183','手机端','2024-04-02 02:47:50','1'),(2,'12345678910','119.162.200.183','手机端','2024-04-02 02:50:50','1');
/*!40000 ALTER TABLE `phone_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_admin`
--

DROP TABLE IF EXISTS `wolive_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addtime` int NOT NULL DEFAULT '0',
  `is_delete` smallint NOT NULL DEFAULT '0',
  `app_max_count` int NOT NULL DEFAULT '0',
  `permission` longtext,
  `remark` varchar(255) NOT NULL DEFAULT '',
  `expire_time` int NOT NULL DEFAULT '0' COMMENT '账户有效期至，0表示永久',
  `mobile` varchar(255) NOT NULL DEFAULT '' COMMENT '手机号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_admin`
--

LOCK TABLES `wolive_admin` WRITE;
/*!40000 ALTER TABLE `wolive_admin` DISABLE KEYS */;
INSERT INTO `wolive_admin` VALUES (1,'admin','c7122a1349c22cb3c009da3613d242ab',0,0,0,NULL,'',0,'');
/*!40000 ALTER TABLE `wolive_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_admin_log`
--

DROP TABLE IF EXISTS `wolive_admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_admin_log` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int DEFAULT NULL COMMENT '管理员ID',
  `info` text COMMENT '操作结果',
  `ip` varchar(20) NOT NULL DEFAULT '' COMMENT '操作IP',
  `user_agent` text NOT NULL COMMENT 'User-Agent',
  `create_time` int DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=642 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC COMMENT='管理员登录日志';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_admin_log`
--

LOCK TABLES `wolive_admin_log` WRITE;
/*!40000 ALTER TABLE `wolive_admin_log` DISABLE KEYS */;
INSERT INTO `wolive_admin_log` VALUES (635,1,'登录成功','223.160.235.33','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0',1740554754),(636,1,'登录成功','136.158.56.8','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36',1779785321),(637,1,'登录成功','47.57.232.232','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) HeadlessChrome/149.0.0.0 Safari/537.36',1779790699),(638,1,'登录成功','203.160.72.84','Mozilla/5.0 (iPhone; CPU iPhone OS 16_7_11 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6.1 Mobile/15E148 Safari/604.1',1779800276),(639,13,'登录成功','146.70.113.119','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0',1779816691),(640,1,'登录成功','136.158.56.8','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36',1779885113),(641,1,'登录成功','103.185.222.38','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0',1779887593);
/*!40000 ALTER TABLE `wolive_admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_admin_menu`
--

DROP TABLE IF EXISTS `wolive_admin_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_admin_menu` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int NOT NULL DEFAULT '0' COMMENT '父级ID',
  `title` varchar(50) DEFAULT NULL COMMENT '名称',
  `href` varchar(50) NOT NULL COMMENT '地址',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `sort` tinyint NOT NULL DEFAULT '99' COMMENT '排序',
  `type` tinyint(1) DEFAULT '1' COMMENT '菜单',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COMMENT='权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_admin_menu`
--

LOCK TABLES `wolive_admin_menu` WRITE;
/*!40000 ALTER TABLE `wolive_admin_menu` DISABLE KEYS */;
INSERT INTO `wolive_admin_menu` VALUES (1,0,'主页','/backend/index/home','layui-icon layui-icon-home',1,1,1),(2,0,'登录日志','/backend/log/index','layui-icon layui-icon-layouts',3,1,1),(3,0,'商户管理','','layui-icon layui-icon-username',1,0,1),(4,3,'商户列表','/backend/busines/index','',99,1,1),(5,3,'客服列表','/backend/services/index',NULL,99,1,1),(6,0,'存储设置','/backend/storage/index','layui-icon layui-icon-set-fill',2,1,1);
/*!40000 ALTER TABLE `wolive_admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_admin_permission`
--

DROP TABLE IF EXISTS `wolive_admin_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_admin_permission` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `pid` int NOT NULL DEFAULT '0' COMMENT '父级ID',
  `title` varchar(50) DEFAULT NULL COMMENT '名称',
  `href` varchar(50) NOT NULL COMMENT '地址',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `sort` tinyint NOT NULL DEFAULT '99' COMMENT '排序',
  `type` tinyint(1) DEFAULT '1' COMMENT '菜单',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `is_admin` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否管理员',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC COMMENT='权限表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_admin_permission`
--

LOCK TABLES `wolive_admin_permission` WRITE;
/*!40000 ALTER TABLE `wolive_admin_permission` DISABLE KEYS */;
INSERT INTO `wolive_admin_permission` VALUES (1,0,'统计主页','/service/index/home','layui-icon layui-icon-home',1,1,1,0),(2,0,'客服管理','','layui-icon layui-icon-username',2,0,1,1),(3,2,'客服列表','/service/services/index',NULL,98,1,1,1),(4,2,'客服分组','/service/groups/index',NULL,99,1,1,1),(5,35,'客户评价','/service/comments/index','layui-icon layui-icon-praise',27,1,1,1),(6,35,'评价设置','/service/comments/setting','layui-icon layui-icon-tabs',28,1,1,1),(7,28,'常见问题设置','/service/questions/index','layui-icon layui-icon-survey',4,1,1,1),(8,0,'客户管理','','layui-icon layui-icon-user',3,0,1,1),(9,8,'客户列表','/service/visitors/index',NULL,99,1,1,1),(10,8,'客户分组','/service/vgroups/index',NULL,99,1,1,1),(11,28,'问候语设置','/service/setting/sentence','layui-icon layui-icon-release',6,1,1,0),(12,0,'消息搜索','/service/history/index','layui-icon layui-icon-form',30,1,1,1),(13,0,'客服接待中心','/service/chat/index','layui-icon layui-icon-service',1,1,1,0),(14,28,'AI客服配置','/service/robots/index','layui-icon layui-icon-service',4,1,1,1),(15,0,'对接配置','','layui-icon layui-icon-unlink',8,0,1,1),(16,15,'接入配置','/service/setting/access',NULL,99,1,1,1),(17,15,'接入方式','/service/setting/course',NULL,99,1,1,1),(18,0,'系统设置','','layui-icon layui-icon-set',1,0,1,1),(23,26,'登录日志','/service/log/index','layui-icon layui-icon-layouts',8,1,1,1),(24,26,'数据统计','/service/log/data','layui-icon layui-icon-senior',8,1,1,1),(25,28,'违禁词设置','/service/banwords/index','layui-icon layui-icon-face-cry',4,1,1,1),(26,0,'统计管理','','layui-icon layui-icon-senior',9,0,1,1),(27,0,'留言管理','/service/vgroups/msglist','layui-icon layui-icon-release',11,1,1,1),(28,0,'常用管理','','layui-icon layui-icon-survey',4,0,1,1),(29,0,'电话回访','/service/vgroups/phonelist','layui-icon layui-icon-cellphone',10,1,1,1),(30,18,'广告设置','/service/settingnow/index','layui-icon layui-icon-face-cry',99,1,1,1),(31,0,'实名认证','/service/certification/index.html','layui-icon layui-icon-auz',12,1,1,1),(32,0,'使用教程','/index/jc.html','layui-icon layui-icon-file-b',99,1,1,1),(33,18,'常用设置','/service/setting/index','layui-icon layui-icon-set',1,1,1,1),(34,18,'开关设置','/service/setting/button','layui-icon layui-icon-set',1,1,1,1),(35,0,'评价管理','/service/comments/index','layui-icon layui-icon-praise',9,0,1,1);
/*!40000 ALTER TABLE `wolive_admin_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_admin_token`
--

DROP TABLE IF EXISTS `wolive_admin_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_admin_token` (
  `token` varchar(50) NOT NULL COMMENT 'Token',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `createtime` int unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `expiretime` int unsigned NOT NULL DEFAULT '0' COMMENT '过期时间',
  PRIMARY KEY (`token`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT COMMENT='Token表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_admin_token`
--

LOCK TABLES `wolive_admin_token` WRITE;
/*!40000 ALTER TABLE `wolive_admin_token` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_admin_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_attachment_data`
--

DROP TABLE IF EXISTS `wolive_attachment_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_attachment_data` (
  `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '附件id',
  `service_id` int unsigned NOT NULL DEFAULT '0',
  `admin_id` int unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '' COMMENT '原文件名',
  `fileext` varchar(20) NOT NULL COMMENT '文件扩展名',
  `filesize` int unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `url` varchar(600) NOT NULL DEFAULT '',
  `filemd5` varchar(64) NOT NULL DEFAULT '',
  `inputtime` int unsigned NOT NULL COMMENT '入库时间',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `inputtime` (`inputtime`) USING BTREE,
  KEY `fileext` (`fileext`) USING BTREE,
  KEY `uid` (`service_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC COMMENT='附件归档表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_attachment_data`
--

LOCK TABLES `wolive_attachment_data` WRITE;
/*!40000 ALTER TABLE `wolive_attachment_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_attachment_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_banword`
--

DROP TABLE IF EXISTS `wolive_banword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_banword` (
  `id` int NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键词',
  `lang` char(50) NOT NULL DEFAULT 'cn',
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '1显示 0不显示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_banword`
--

LOCK TABLES `wolive_banword` WRITE;
/*!40000 ALTER TABLE `wolive_banword` DISABLE KEYS */;
INSERT INTO `wolive_banword` VALUES (3,1,'&lt;script&gt;','cn',1),(4,1,'&lt;a&gt;','cn',1),(5,1,'&lt;','cn',1);
/*!40000 ALTER TABLE `wolive_banword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_business`
--

DROP TABLE IF EXISTS `wolive_business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_business` (
  `id` int NOT NULL AUTO_INCREMENT,
  `business_name` varchar(100) NOT NULL COMMENT '商家标识符',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `pctab` int NOT NULL DEFAULT '0' COMMENT 'tab标签',
  `copyright` varchar(255) NOT NULL DEFAULT '' COMMENT '底部版权信息',
  `admin_id` int NOT NULL DEFAULT '0',
  `video_state` enum('close','open') NOT NULL DEFAULT 'close' COMMENT '是否开启视频',
  `voice_state` enum('close','open') NOT NULL DEFAULT 'open' COMMENT '是否开启提示音',
  `audio_state` enum('close','open') NOT NULL DEFAULT 'close' COMMENT '是否开启音频',
  `template_state` enum('close','open') NOT NULL DEFAULT 'close' COMMENT '是否开启模板消息',
  `distribution_rule` enum('auto','claim') DEFAULT 'auto' COMMENT 'claim:认领，auto:自动分配',
  `voice_address` varchar(255) NOT NULL DEFAULT '/upload/voice/default.mp3' COMMENT '提示音文件地址',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `expire_time` int NOT NULL DEFAULT '0',
  `max_count` int NOT NULL DEFAULT '0',
  `push_url` varchar(255) NOT NULL DEFAULT '' COMMENT '推送url',
  `state` enum('close','open') NOT NULL DEFAULT 'open' COMMENT '''open'': 打开该商户 ，‘close’：禁止该商户',
  `is_recycle` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `lang` char(50) DEFAULT 'cn',
  `bd_trans_appid` varchar(255) DEFAULT NULL COMMENT '百度翻译APPID',
  `bd_trans_secret` varchar(255) DEFAULT NULL COMMENT '百度翻译密钥',
  `google_trans_key` varchar(255) DEFAULT NULL COMMENT '谷歌翻译KEY',
  `auto_trans` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发送客服是否自动翻译',
  `auto_ip` tinyint(1) NOT NULL DEFAULT '0' COMMENT '根据IP自动设置客户语言',
  `trans_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '翻译接口：百度0；谷歌1',
  `theme` char(50) NOT NULL DEFAULT '13c9cb' COMMENT '主题颜色',
  `header` char(50) NOT NULL DEFAULT '13c9cb' COMMENT '悬浮条背景色',
  `aboutus` longtext,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `img5` varchar(255) DEFAULT NULL,
  `img6` varchar(255) DEFAULT NULL,
  `img7` varchar(255) DEFAULT NULL,
  `img8` varchar(255) DEFAULT NULL,
  `certificationleft` varchar(255) NOT NULL COMMENT '身份证正面',
  `certificationright` varchar(255) NOT NULL COMMENT '身份证反面',
  `businesslicence` varchar(255) NOT NULL COMMENT '营业执照',
  `bussage` varchar(255) NOT NULL,
  `bussname` varchar(255) NOT NULL,
  `bussphone` varchar(255) NOT NULL,
  `busszfb` varchar(255) NOT NULL,
  `bussmaill` varchar(255) NOT NULL,
  `busszfbimg` varchar(255) NOT NULL,
  `is_shenhe` int NOT NULL DEFAULT '0',
  `is_qiangzhi` int NOT NULL DEFAULT '0',
  `shenhetime` date NOT NULL,
  `imgurl2` varchar(255) DEFAULT NULL,
  `imgurl3` varchar(255) DEFAULT NULL,
  `imgurl4` varchar(255) DEFAULT NULL,
  `imgurl5` varchar(255) DEFAULT NULL,
  `imgurl6` varchar(255) DEFAULT NULL,
  `ts1` varchar(255) NOT NULL,
  `ts2` varchar(255) NOT NULL,
  `ts3` varchar(255) NOT NULL,
  `baidu_map_key` varchar(200) NOT NULL COMMENT '百度地图秘钥',
  `kefu_select_state` enum('close','open') NOT NULL DEFAULT 'open' COMMENT '是否开启定位',
  `api_model` varchar(255) DEFAULT NULL COMMENT 'AI模型选择，例如gpt-4, deepseek-chat',
  `api_url` varchar(500) DEFAULT NULL COMMENT 'AI接口请求地址',
  `api_key` varchar(500) DEFAULT NULL COMMENT 'AI API密钥',
  `api_system_prompt` text COMMENT 'AI系统指令',
  `ai_switch` tinyint(1) DEFAULT '0' COMMENT 'AI开关：1 开启，0 关闭',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `bussiness` (`business_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC COMMENT='商家表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_business`
--

LOCK TABLES `wolive_business` WRITE;
/*!40000 ALTER TABLE `wolive_business` DISABLE KEYS */;
INSERT INTO `wolive_business` VALUES (1,'admin','',0,'',0,'open','open','close','close','auto','/upload/voice/default.mp3','',0,0,'','open',0,0,'cn','','','',0,0,0,'1696f5','1696f5','&lt;p&gt;&lt;span style=&quot;color:#4f81bd&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;在线客服系统&lt;/strong&gt;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;-------&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;&lt;strong&gt;支持：文字 / 表情 / 语音 / 文件 / 位置等富媒体聊天方式。&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;支持：多国语言翻译，机器人术语，欢迎语回复，语音消息提醒，0延迟消息即时接收&lt;/span&gt;&lt;/strong&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(192, 0, 0);&quot;&gt;，微信&amp;nbsp; 消息模板对接，手机PC端同步聊天，广告位自定义，历史消息下载，在线留言功能等出色功&amp;nbsp; &amp;nbsp; 能。&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0);&quot;&gt;--------&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','/upload/images/656351ede171e3661.png','/upload/images/656351f3552d17884.png','/upload/images/6403ef74e46255522.png','/upload/images/6403ef8008c3f7898.png','/upload/images/6403ef860abd14018.png','/upload/images/6403ef21e956b4223.png','','','/upload/images/640a77ddc7cce179.png','/upload/images/640a77eb5c2cb5679.jpeg','/upload/images/640a77f24483a4148.jpeg','22','122','153199984','4@@qqq.com','55663@163.com','/upload/images/640a77f7b9b2b1452.jpeg',0,0,'2023-03-15','https://www.baidu.com','https://www.baidu.com','https://www.baidu.com','https://www.baidu.com','https://www.baidu.com','您好！当前客服在线，有什么问题可以随时咨询','您好！当前客服目前离线，您可以留言，我们将在客服上线后尽快回复您','hi，欢迎访问演示站','7BTnGhlneYhsMyRwnLfiw0n7qvMwkblm','open',NULL,NULL,NULL,NULL,0),(3,'wm8888','',0,'',0,'close','open','close','close','auto','/upload/voice/default.mp3','',1780075881,3,'','open',0,0,'cn',NULL,NULL,NULL,0,0,0,'13c9cb','13c9cb',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','',0,0,'0000-00-00',NULL,NULL,NULL,NULL,NULL,'','','','','open',NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `wolive_business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_button_switch`
--

DROP TABLE IF EXISTS `wolive_button_switch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_button_switch` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `phone_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `voice_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `photo_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `file_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `translators_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'close',
  `link_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `link_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `business_id` int DEFAULT NULL,
  `top_text_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `top_text` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bottom_text_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `bottom_text` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tel_text` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `location_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `qq_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `wx_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `labour_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `leave_message_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `message_log_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `tel_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `kefu_select_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'open',
  `qq_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `wx_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `link_text` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '自定义链接',
  `mp4_state` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'open',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_button_switch`
--

LOCK TABLES `wolive_button_switch` WRITE;
/*!40000 ALTER TABLE `wolive_button_switch` DISABLE KEYS */;
INSERT INTO `wolive_button_switch` VALUES (5,'open','open','open','open','open','open','https://www.baidu.com/',1,'open','ေရွ့ဆက်ဆံေရးဝန်ဆောင်မှု','open','နည်းပညာအထောက်အပံ့','123456789','open','open','open','open','open','open','open','open','https://aiyuankfcc.oss-cn-beijing.aliyuncs.com/upload/images/1/ecedcf5bf107c2c9ff227c7a6110419e1447e70f.png','https://aiyuankfcc.oss-cn-beijing.aliyuncs.com/upload/images/1/cc60d0a15c768be50a17661819c7ba2b9a97084c.png','百度','open'),(6,'open','open','open','open','open','open',NULL,13,'open',NULL,'open',NULL,NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(7,'open','open','open','open','open','open','222',14,'open','222','open','222',NULL,'open','open','open','open','open','open','open','open','/upload/images/14/656476e259fd91701082850.png','/upload/images/14/656476e25c99d1701082850.png','','open'),(8,'open','open','open','open','close','open',NULL,15,'open',NULL,'open',NULL,NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(9,'open','open','open','open','open','open','',16,'open','','open','',NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(10,'open','open','open','open','close','open',NULL,17,'open',NULL,'open',NULL,NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(11,'open','open','open','open','close','open','',18,'open','','open','',NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(12,'open','open','open','open','open','open','',19,'open','','open','',NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(13,'open','open','open','open','close','open',NULL,20,'open',NULL,'open',NULL,NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(14,'open','open','open','open','open','open','',21,'open','','open','',NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'','open'),(15,'open','open','open','open','open','open','http://www.qq.com',22,'open','111','open','2222',NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'腾讯网','open'),(16,'open','open','open','open','close','open',NULL,NULL,'open',NULL,'open',NULL,NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'自定义链接','open'),(17,'open','open','open','open','close','open','',2,'open','','open','',NULL,'open','open','open','open','open','open','open','open',NULL,NULL,'自定义链接','open');
/*!40000 ALTER TABLE `wolive_button_switch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_chats`
--

DROP TABLE IF EXISTS `wolive_chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_chats` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `visiter_id` varchar(200) NOT NULL COMMENT '访客id',
  `service_id` int NOT NULL COMMENT '客服id',
  `business_id` int NOT NULL DEFAULT '0' COMMENT '商家id',
  `content` mediumtext NOT NULL COMMENT '内容',
  `timestamp` int NOT NULL,
  `state` enum('readed','unread') NOT NULL DEFAULT 'unread' COMMENT 'unread 未读；readed 已读',
  `direction` enum('to_visiter','to_service') DEFAULT NULL,
  `unstr` varchar(50) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `content_trans` mediumtext,
  `is_read` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否已读',
  PRIMARY KEY (`cid`) USING BTREE,
  KEY `visiter_id` (`visiter_id`) USING BTREE,
  KEY `service_id` (`service_id`) USING BTREE,
  KEY `business_id` (`business_id`) USING BTREE,
  KEY `unstr` (`unstr`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=32226 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC COMMENT='消息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_chats`
--

LOCK TABLES `wolive_chats` WRITE;
/*!40000 ALTER TABLE `wolive_chats` DISABLE KEYS */;
INSERT INTO `wolive_chats` VALUES (32189,'6a155e87t3i5ow0use1',1,1,'我不理解您的意思，请您在描述一下',1779787761,'readed','to_visiter','53ad7927eb07785291c2f2b56f11cc4c',2,'',0),(32190,'test',1,1,'您问的太快了，访问歇一会再问吧',1779787940,'unread','to_visiter','1a7d5a95cb122244dfbcaed75358c0e2',2,'',0),(32191,'6a155e87t3i5ow0use1',11,1,'22',1779788003,'readed','to_service','',1,'22',1),(32192,'test',1,1,'您的问题我已经拿着小本本记下了',1779788445,'unread','to_visiter','3a4fdae37425312c685f0a2b6159a328',2,'',0),(32193,'testuser',1,1,'您的问题我已经拿着小本本记下了',1779789414,'unread','to_visiter','60a32b2e12949ac0dd0a2cd805608625',2,'',0),(32194,'testuser',1,1,'不太明白您的问题，不过我正在努力的学习中',1779789419,'unread','to_visiter','13f031effc8f9f0cfbc90e05eafea48c',2,'',0),(32195,'6a155e87t3i5ow0use1',11,1,'22122',1779789530,'readed','to_service','',1,'22122',1),(32196,'testws123',1,1,'测试消息 - hello from test client',1779790806,'readed','to_service','',1,'测试消息 - hello from test client',1),(32197,'testws123',1,1,'第二条测试消息 - WebSocket test',1779790929,'readed','to_service','',1,'第二条测试消息 - WebSocket test',1),(32198,'6a155e87t3i5ow0use1',11,1,'？？？？',1779792090,'readed','to_service','',1,'？？？？',1),(32199,'6a155e87t3i5ow0use1',11,1,'？？？',1779792095,'readed','to_service','',1,'？？？',1),(32200,'6a155e87t3i5ow0use1',11,1,'你好',1779793533,'readed','to_service','',1,'你好',1),(32201,'testws123',1,1,'你好吗\n',1779793556,'readed','to_visiter','1779793556251mM9Hptestws123',1,'',0),(32202,'testws123',1,1,'debug test message',1779794330,'readed','to_service','',1,'debug test message',1),(32203,'testws123',1,1,'test after fix',1779794495,'readed','to_service','',1,'test after fix',1),(32204,'6a155e87t3i5ow0use1',11,1,'test from visitor 11',1779794508,'readed','to_service','',1,'test from visitor 11',1),(32205,'6a155e87t3i5ow0use1',11,1,'hello from mobile test',1779794739,'readed','to_service','',1,'hello from mobile test',1),(32206,'6a155e87t3i5ow0use1',11,1,'？？？？',1779795012,'readed','to_service','',1,'？？？？',1),(32207,'6a155e87t3i5ow0use1',11,1,'DEBUG_TEST_MESSAGE',1779795780,'readed','to_service','',1,'DEBUG_TEST_MESSAGE',1),(32208,'6a155e87t3i5ow0use1',11,1,'DEBUG_TEST_MESSAGE_2',1779795795,'readed','to_service','',1,'DEBUG_TEST_MESSAGE_2',1),(32209,'6a155e87t3i5ow0use1',11,1,'SYSTEM_TEST_MESSAGE',1779796254,'readed','to_service','',1,'SYSTEM_TEST_MESSAGE',1),(32210,'testws123',1,1,'DEBUG TEST MESSAGE',1779797062,'readed','to_service','',1,'DEBUG TEST MESSAGE',1),(32211,'testws123',1,1,'Hello from debug',1779797719,'readed','to_service','',1,'Hello from debug',1),(32212,'6a155e87t3i5ow0use1',11,1,'？？',1779798185,'readed','to_service','',1,'？？',1),(32213,'6a155e87t3i5ow0use1',11,1,'你好，请问有什么可以帮助你',1779798211,'readed','to_visiter','1779798211371SMBNX6a155e87t3i5ow0use1',1,'',1),(32214,'6a155e87t3i5ow0use1',11,1,'nono',1779798218,'readed','to_service','',1,'nono',1),(32215,'6a16ef9502kyzanqkf1',11,1,'您的问题我已经拿着小本本记下了',1779888045,'readed','to_visiter','ef683e7b41a7e07ada75a9cf1fc3dfad',2,'',0),(32216,'6a16efbbvp0dx5viyf9',11,1,'您的问题我已经拿着小本本记下了',1779888118,'unread','to_visiter','f49c46a53a89e3e616cbe678f64d8d75',2,'',0),(32217,'6a16efbbvp0dx5viyf9',11,1,'不太明白您的问题，不过我正在努力的学习中',1779888125,'unread','to_visiter','c4ceb4070287c3660f076df326528e60',2,'',0),(32218,'6a155e87t3i5ow0use1',11,1,'你好',1779888260,'readed','to_service','',1,'你好',1),(32219,'6a155e87t3i5ow0use1',11,1,'hello',1779888288,'readed','to_service','',1,'hello',1),(32220,'6a16efbbvp0dx5viyf9',11,1,'您问的太快了，访问歇一会再问吧',1779888385,'unread','to_visiter','9f5cb1b5641c9f304036c597b43fb86f',2,'',0),(32221,'6a16efbbvp0dx5viyf9',11,1,'不太明白您的问题，不过我正在努力的学习中',1779888398,'unread','to_visiter','8f1554c650f5ea5b45a02f9e4a9fc934',2,'',0),(32222,'6a155e87t3i5ow0use1',11,1,'2211',1779889723,'readed','to_service','',1,'2211',1),(32223,'6a155e87t3i5ow0use1',11,1,'hello',1779889926,'readed','to_visiter','',1,NULL,1),(32224,'6a155e87t3i5ow0use1',11,1,'2221',1779889987,'readed','to_visiter','1779889987172k8Yjh6a155e87t3i5ow0use1',1,NULL,1),(32225,'6a155e87t3i5ow0use1',11,1,'可以了',1779889991,'readed','to_service','',1,'可以了',1);
/*!40000 ALTER TABLE `wolive_chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_comment`
--

DROP TABLE IF EXISTS `wolive_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_comment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `service_id` int NOT NULL DEFAULT '0',
  `group_id` int NOT NULL DEFAULT '0',
  `visiter_id` varchar(200) NOT NULL DEFAULT '',
  `visiter_name` varchar(255) NOT NULL DEFAULT '',
  `word_comment` text NOT NULL COMMENT '文字评价',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_comment`
--

LOCK TABLES `wolive_comment` WRITE;
/*!40000 ALTER TABLE `wolive_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_comment_detail`
--

DROP TABLE IF EXISTS `wolive_comment_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_comment_detail` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` int unsigned NOT NULL,
  `title` varchar(32) NOT NULL DEFAULT '',
  `score` tinyint NOT NULL DEFAULT '1' COMMENT '分数',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_comment_detail`
--

LOCK TABLES `wolive_comment_detail` WRITE;
/*!40000 ALTER TABLE `wolive_comment_detail` DISABLE KEYS */;
INSERT INTO `wolive_comment_detail` VALUES (1,1,'请打分',1),(2,1,'好评',5),(3,1,'中评',1),(4,1,'差评',1),(5,2,'111',5),(6,3,'111',2),(7,4,'111',5),(8,5,'111',5),(9,6,'111',4),(10,7,'111',5),(11,8,'111',3),(12,9,'111',3),(13,10,'请打分',5),(14,10,'好评',5),(15,10,'中评',5),(16,10,'差评',5),(17,11,'请打分',5),(18,11,'好评',5),(19,11,'中评',5),(20,11,'差评',5),(21,12,'请打分',2),(22,12,'好评',2),(23,12,'中评',2),(24,12,'差评',2),(25,1,'请打分',5),(26,1,'好评',5),(27,1,'中评',5),(28,1,'差评',5);
/*!40000 ALTER TABLE `wolive_comment_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_comment_setting`
--

DROP TABLE IF EXISTS `wolive_comment_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_comment_setting` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '评价说明',
  `comments` text NOT NULL COMMENT '评价条目',
  `word_switch` enum('close','open') NOT NULL DEFAULT 'close',
  `word_title` varchar(32) NOT NULL DEFAULT '',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_comment_setting`
--

LOCK TABLES `wolive_comment_setting` WRITE;
/*!40000 ALTER TABLE `wolive_comment_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_comment_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_group`
--

DROP TABLE IF EXISTS `wolive_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `groupname` varchar(255) DEFAULT NULL,
  `business_id` int unsigned NOT NULL DEFAULT '0',
  `sort` int unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_group`
--

LOCK TABLES `wolive_group` WRITE;
/*!40000 ALTER TABLE `wolive_group` DISABLE KEYS */;
INSERT INTO `wolive_group` VALUES (1,'售前1号',1,0,1652615329),(2,'售后2号',1,1,1652615341),(3,'技术3号',1,0,1652615350),(4,'投诉4号',1,0,1652615360);
/*!40000 ALTER TABLE `wolive_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_message`
--

DROP TABLE IF EXISTS `wolive_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_message` (
  `mid` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '留言内容',
  `name` varchar(255) NOT NULL COMMENT '留言人姓名',
  `moblie` varchar(255) NOT NULL COMMENT '留言人电话',
  `email` varchar(255) NOT NULL COMMENT '留言人邮箱',
  `business_id` int DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`) USING BTREE,
  KEY `timestamp` (`timestamp`) USING BTREE,
  KEY `web` (`business_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_message`
--

LOCK TABLES `wolive_message` WRITE;
/*!40000 ALTER TABLE `wolive_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_msg`
--

DROP TABLE IF EXISTS `wolive_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_msg` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `truename` varchar(50) NOT NULL DEFAULT '0',
  `contact` varchar(128) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_msg`
--

LOCK TABLES `wolive_msg` WRITE;
/*!40000 ALTER TABLE `wolive_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_option`
--

DROP TABLE IF EXISTS `wolive_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_option` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `group` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL,
  `value` longtext NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `business_id` (`business_id`) USING BTREE,
  KEY `group` (`group`) USING BTREE,
  KEY `name` (`title`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_option`
--

LOCK TABLES `wolive_option` WRITE;
/*!40000 ALTER TABLE `wolive_option` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_question`
--

DROP TABLE IF EXISTS `wolive_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_question` (
  `qid` int NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `question` longtext NOT NULL,
  `keyword` varchar(12) NOT NULL DEFAULT '' COMMENT '关键词',
  `sort` int NOT NULL DEFAULT '0',
  `answer` longtext NOT NULL,
  `answer_read` longtext NOT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '1显示 0不显示',
  `lang` char(50) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`qid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT COMMENT='常见问题表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_question`
--

LOCK TABLES `wolive_question` WRITE;
/*!40000 ALTER TABLE `wolive_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_queue`
--

DROP TABLE IF EXISTS `wolive_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_queue` (
  `qid` int NOT NULL AUTO_INCREMENT,
  `visiter_id` varchar(200) NOT NULL COMMENT '访客id',
  `service_id` int NOT NULL COMMENT '客服id',
  `groupid` int DEFAULT '0' COMMENT '客服分类id',
  `business_id` int NOT NULL DEFAULT '0',
  `state` enum('normal','complete','in_black_list') NOT NULL DEFAULT 'normal' COMMENT 'normal：正常接入,‘complete’:已经解决，‘in_black_list’:黑名单',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remind_tpl` tinyint NOT NULL DEFAULT '0' COMMENT '是否已发送模板消息',
  `remind_comment` tinyint NOT NULL DEFAULT '0' COMMENT '是否已推送评价',
  PRIMARY KEY (`qid`) USING BTREE,
  KEY `se` (`service_id`) USING BTREE,
  KEY `vi` (`visiter_id`) USING BTREE,
  KEY `business` (`business_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4119 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT COMMENT='会话表(排队表)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_queue`
--

LOCK TABLES `wolive_queue` WRITE;
/*!40000 ALTER TABLE `wolive_queue` DISABLE KEYS */;
INSERT INTO `wolive_queue` VALUES (4110,'67bec4afy4m3gw09bj9',1,0,1,'normal','2025-02-26 07:37:21',0,0),(4111,'6a155e87t3i5ow0use1',11,2,1,'normal','2026-05-26 08:58:44',0,0),(4112,'testws123',1,0,1,'normal','2026-05-26 10:19:44',0,0),(4113,'6a16ecdd3hedilr27m5',11,2,1,'normal','2026-05-27 13:08:45',0,0),(4114,'6a16ef9502kyzanqkf1',11,2,1,'normal','2026-05-27 13:39:21',0,0),(4115,'test123',11,2,1,'normal','2026-05-27 13:40:41',0,0),(4116,'testcheck123',11,2,1,'normal','2026-05-27 13:42:41',0,0),(4117,'verifytest',11,2,1,'normal','2026-05-27 13:43:20',0,0),(4118,'finaltest',11,2,1,'normal','2026-05-27 13:44:36',0,0);
/*!40000 ALTER TABLE `wolive_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_reply`
--

DROP TABLE IF EXISTS `wolive_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_reply` (
  `id` int NOT NULL AUTO_INCREMENT,
  `word` varchar(255) DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_reply`
--

LOCK TABLES `wolive_reply` WRITE;
/*!40000 ALTER TABLE `wolive_reply` DISABLE KEYS */;
INSERT INTO `wolive_reply` VALUES (1,'&lt;p&gt;&lt;video style=&quot;video&quot; class=&quot;edui-upload-video  vjs-default-skin video-js video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; poster=&quot;undefined&quot; width=&quot;420&quot; height=&quot;280&quot; src=&quot;https://a',1,'6666');
/*!40000 ALTER TABLE `wolive_reply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_rest_setting`
--

DROP TABLE IF EXISTS `wolive_rest_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_rest_setting` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `state` enum('open','close') NOT NULL DEFAULT 'open',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `week` varchar(32) NOT NULL DEFAULT '',
  `reply` varchar(255) NOT NULL DEFAULT '',
  `name_state` enum('open','close') NOT NULL DEFAULT 'open',
  `tel_state` enum('open','close') NOT NULL DEFAULT 'open',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_rest_setting`
--

LOCK TABLES `wolive_rest_setting` WRITE;
/*!40000 ALTER TABLE `wolive_rest_setting` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_rest_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_robot`
--

DROP TABLE IF EXISTS `wolive_robot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_robot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `keyword` varchar(12) NOT NULL DEFAULT '' COMMENT '关键词',
  `sort` int NOT NULL DEFAULT '0',
  `reply` longtext NOT NULL,
  `status` tinyint unsigned NOT NULL DEFAULT '1' COMMENT '1显示 0不显示',
  `lang` char(50) NOT NULL DEFAULT 'cn',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT COMMENT='常见问题表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_robot`
--

LOCK TABLES `wolive_robot` WRITE;
/*!40000 ALTER TABLE `wolive_robot` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_robot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_sentence`
--

DROP TABLE IF EXISTS `wolive_sentence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_sentence` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL COMMENT '内容',
  `service_id` int NOT NULL COMMENT '所属客服id',
  `state` enum('using','unuse') NOT NULL DEFAULT 'using' COMMENT 'unuse: 未使用 ，using：使用中',
  `lang` char(50) NOT NULL DEFAULT 'cn',
  `business_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`) USING BTREE,
  KEY `se` (`service_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_sentence`
--

LOCK TABLES `wolive_sentence` WRITE;
/*!40000 ALTER TABLE `wolive_sentence` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_sentence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_service`
--

DROP TABLE IF EXISTS `wolive_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_service` (
  `service_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `nick_name` varchar(255) NOT NULL COMMENT '昵称',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `groupid` varchar(225) DEFAULT '0' COMMENT '客服分类id',
  `phone` varchar(255) DEFAULT '' COMMENT '手机',
  `open_id` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) DEFAULT '' COMMENT '邮箱',
  `business_id` int NOT NULL DEFAULT '0',
  `avatar` varchar(1024) NOT NULL DEFAULT '/assets/images/admin/avatar-admin2.png' COMMENT '头像',
  `level` enum('super_manager','manager','service') NOT NULL DEFAULT 'service' COMMENT 'super_manager: 超级管理员，manager：商家管理员 ，service：普通客服',
  `parent_id` int NOT NULL DEFAULT '0' COMMENT '所属商家管理员id',
  `offline_first` tinyint NOT NULL DEFAULT '0',
  `state` enum('online','offline') NOT NULL DEFAULT 'offline' COMMENT 'online：在线，offline：离线',
  PRIMARY KEY (`service_id`) USING BTREE,
  UNIQUE KEY `user_name` (`user_name`) USING BTREE,
  KEY `pid` (`parent_id`) USING BTREE,
  KEY `web` (`business_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT COMMENT='后台客服表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_service`
--

LOCK TABLES `wolive_service` WRITE;
/*!40000 ALTER TABLE `wolive_service` DISABLE KEYS */;
INSERT INTO `wolive_service` VALUES (1,'admin','客服小宇','d8f7c2d2775869fb69b8757edcf6ae4f','1','','ozs4F6uPcpJjDh2LoLJUBvU0P6mE','',1,'/upload/images/1/1701418586.png','super_manager',0,0,'online'),(11,'ceshi','客服小美','489536d7c643d67993bff029d9620f02','2','312312','ozs4F6oK3J6507rhy-qmyFIt_AiU','111@qq.com',1,'/assets/images/admin/avatar-admin2.png','service',1,1,'online'),(13,'wm8888','wm8888','2796930d1013309262e7eee828784373','0','','','',3,'/assets/images/admin/avatar-admin2.png','super_manager',0,0,'offline');
/*!40000 ALTER TABLE `wolive_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_storage`
--

DROP TABLE IF EXISTS `wolive_storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_storage` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '存储类型：1=本地，2=阿里云，3=腾讯云，4=七牛',
  `config` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_storage`
--

LOCK TABLES `wolive_storage` WRITE;
/*!40000 ALTER TABLE `wolive_storage` DISABLE KEYS */;
INSERT INTO `wolive_storage` VALUES (1,1,1,'{\"access_key\":\"LTAI5tEi5XTpC5C6THfV\",\"secret_key\":\"uDcQjrvenaXDgpmS2lV69Cp\",\"domain\":\"oss-cn-beijing.aliyuncs.com\",\"bucket\":\"867097\"}',1);
/*!40000 ALTER TABLE `wolive_storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_tablist`
--

DROP TABLE IF EXISTS `wolive_tablist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_tablist` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'tab的名称',
  `content_read` text,
  `content` text NOT NULL,
  `business_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_tablist`
--

LOCK TABLES `wolive_tablist` WRITE;
/*!40000 ALTER TABLE `wolive_tablist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_tablist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_vgroup`
--

DROP TABLE IF EXISTS `wolive_vgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_vgroup` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0',
  `service_id` int NOT NULL DEFAULT '0',
  `group_name` varchar(128) NOT NULL DEFAULT '',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint NOT NULL DEFAULT '1',
  `bgcolor` char(7) NOT NULL DEFAULT '#707070',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_vgroup`
--

LOCK TABLES `wolive_vgroup` WRITE;
/*!40000 ALTER TABLE `wolive_vgroup` DISABLE KEYS */;
INSERT INTO `wolive_vgroup` VALUES (1,1,1,'最近联系','2023-03-28 14:00:31',1,'#707070'),(2,1,1,'老用户','2023-03-28 14:00:41',1,'#707070'),(3,1,1,'未下单','2023-03-28 14:01:01',1,'#707070');
/*!40000 ALTER TABLE `wolive_vgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_visiter`
--

DROP TABLE IF EXISTS `wolive_visiter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_visiter` (
  `vid` int NOT NULL AUTO_INCREMENT,
  `visiter_id` varchar(200) NOT NULL COMMENT '访客id',
  `visiter_name` varchar(255) NOT NULL COMMENT '访客名称',
  `channel` varchar(255) NOT NULL COMMENT '用户游客频道',
  `avatar` varchar(1024) NOT NULL COMMENT '头像',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '用户自己填写的姓名',
  `tel` varchar(32) NOT NULL DEFAULT '' COMMENT '用户自己填写的电话',
  `login_times` int NOT NULL DEFAULT '1' COMMENT '登录次数',
  `connect` text COMMENT '联系方式',
  `comment` text COMMENT '备注',
  `extends` text COMMENT '浏览器扩展',
  `ip` varchar(255) NOT NULL COMMENT '访客ip',
  `from_url` varchar(255) NOT NULL COMMENT '访客浏览地址',
  `msg_time` timestamp NULL DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '访问时间',
  `business_id` int NOT NULL DEFAULT '0',
  `state` enum('online','offline') NOT NULL DEFAULT 'offline' COMMENT 'offline：离线，online：在线',
  `istop` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '1置顶展示0未置顶',
  `lang` char(255) NOT NULL DEFAULT 'cn',
  `location` varchar(255) NOT NULL COMMENT 'ip地理位置',
  PRIMARY KEY (`vid`) USING BTREE,
  UNIQUE KEY `id` (`visiter_id`,`business_id`) USING BTREE,
  KEY `visiter` (`visiter_id`) USING BTREE,
  KEY `time` (`timestamp`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3755 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_visiter`
--

LOCK TABLES `wolive_visiter` WRITE;
/*!40000 ALTER TABLE `wolive_visiter` DISABLE KEYS */;
INSERT INTO `wolive_visiter` VALUES (3746,'67bec4afy4m3gw09bj9','游客67bec4afy4m3gw09bj9','363762656334616679346d3367773039626a392f31','/assets/images/index/avatar-red2s.png','','',1,NULL,NULL,'{\"browserName\":\"\\u8c37\\u6b4c\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"133.0\",\"os\":\"\\u5fae\\u8f6fWindows\\u7cfb\\u7edf\",\"engine\":\"webkit\"}','223.160.235.33','https://kf5.xywlgzs.vip/service/setting/access',NULL,'2025-02-26 07:37:21',1,'offline',0,'cn',''),(3747,'6a155e87t3i5ow0use1','Visitor6a155e87t3i5ow0use1','3661313535653837743369356f7730757365312f31','/assets/images/index/avatar-red2s.png','','',42,NULL,NULL,'{\"browserName\":\"\\u8c37\\u6b4c\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"145.0\",\"os\":\"MAC\\u7cfb\\u7edf\",\"engine\":\"webkit\"}','136.158.56.8','',NULL,'2026-05-27 14:03:42',1,'online',0,'my-mm','挪威'),(3748,'testws123','TestWS','7465737477733132332f31','/assets/images/index/avatar-red2s.png','','',1,NULL,NULL,'{\"browserName\":\"\\u8c37\\u6b4c\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"149.0\",\"os\":\"Linux\\u7cfb\\u7edf\",\"engine\":\"webkit\"}','47.57.242.119','',NULL,'2026-05-26 10:27:23',1,'offline',0,'cn','香港'),(3749,'6a16ecdd3hedilr27m5','Visitor6a16ecdd3hedilr27m5','366131366563646433686564696c7232376d352f31','/assets/images/index/avatar-red2s.png','','',4,NULL,NULL,'{\"browserName\":\"Safari\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"16.6\",\"os\":\"\\u82f9\\u679c\\u624b\\u673a\\u7cfb\\u7edf\",\"engine\":\"webkit\"}','203.160.72.168','https://www.hjdsaf.com/',NULL,'2026-05-27 13:14:22',1,'offline',0,'my-mm','香港'),(3750,'6a16ef9502kyzanqkf1','Visitor6a16ef9502kyzanqkf1','366131366566393530326b797a616e716b66312f31','/assets/images/index/avatar-red2s.png','','',2,NULL,NULL,'{\"browserName\":\"\\u8c37\\u6b4c\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"114.0.5735.196\",\"os\":\"\\u5b89\\u5353\",\"engine\":\"WebKit\"}','202.191.105.218','https://www.hjdsaf.com/',NULL,'2026-05-27 13:39:39',1,'online',0,'cn','澳大利亚'),(3751,'test123','TestVisitor','746573743132332f31','/assets/images/index/avatar-red2s.png','','',1,NULL,NULL,'{\"browserName\":\"\\u672a\\u77e5\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"\",\"os\":\"\\u672a\\u77e5\\u7cfb\\u7edf\",\"engine\":\"Unknown\"}','103.156.25.231','',NULL,'2026-05-27 13:40:41',1,'offline',0,'cn','亚太地区'),(3752,'testcheck123','TestVisitor','74657374636865636b3132332f31','/assets/images/index/avatar-red2s.png','','',1,NULL,NULL,'{\"browserName\":\"\\u672a\\u77e5\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"\",\"os\":\"\\u672a\\u77e5\\u7cfb\\u7edf\",\"engine\":\"Unknown\"}','103.156.25.231','',NULL,'2026-05-27 13:42:41',1,'offline',0,'cn','亚太地区'),(3753,'verifytest','VerifyTest','766572696679746573742f31','/assets/images/index/avatar-red2s.png','','',1,NULL,NULL,'{\"browserName\":\"\\u672a\\u77e5\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"\",\"os\":\"\\u672a\\u77e5\\u7cfb\\u7edf\",\"engine\":\"Unknown\"}','103.156.25.231','',NULL,'2026-05-27 13:43:20',1,'offline',0,'cn','亚太地区'),(3754,'finaltest','FinalTest','66696e616c746573742f31','/assets/images/index/avatar-red2s.png','','',1,NULL,NULL,'{\"browserName\":\"\\u672a\\u77e5\\u6d4f\\u89c8\\u5668\",\"browserVersion\":\"\",\"os\":\"\\u672a\\u77e5\\u7cfb\\u7edf\",\"engine\":\"Unknown\"}','103.156.25.231','',NULL,'2026-05-27 13:44:36',1,'offline',0,'cn','亚太地区');
/*!40000 ALTER TABLE `wolive_visiter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_visiter_vgroup`
--

DROP TABLE IF EXISTS `wolive_visiter_vgroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_visiter_vgroup` (
  `vid` int NOT NULL,
  `business_id` int NOT NULL DEFAULT '0',
  `service_id` int NOT NULL DEFAULT '0',
  `group_id` int NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vid`,`group_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_visiter_vgroup`
--

LOCK TABLES `wolive_visiter_vgroup` WRITE;
/*!40000 ALTER TABLE `wolive_visiter_vgroup` DISABLE KEYS */;
INSERT INTO `wolive_visiter_vgroup` VALUES (220,1,1,1,'2022-06-02 09:41:03'),(3320,1,1,1,'2023-03-26 16:31:52'),(3324,1,1,1,'2023-03-26 16:31:25'),(3324,1,1,3,'2023-03-26 16:31:25');
/*!40000 ALTER TABLE `wolive_visiter_vgroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_wechat_platform`
--

DROP TABLE IF EXISTS `wolive_wechat_platform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_wechat_platform` (
  `id` int NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL DEFAULT '0' COMMENT '客服系统id',
  `wx_id` varchar(60) NOT NULL DEFAULT '' COMMENT '公众号原始id',
  `app_id` varchar(255) NOT NULL DEFAULT '' COMMENT '公众号appid',
  `app_secret` varchar(255) NOT NULL DEFAULT '' COMMENT '公众号appsecret',
  `wx_token` varchar(120) NOT NULL DEFAULT '' COMMENT '公众号token',
  `wx_aeskey` varchar(120) NOT NULL DEFAULT '' COMMENT '消息加解密密钥(EncodingAESKey)',
  `visitor_tpl` varchar(255) NOT NULL DEFAULT '' COMMENT '新访客模板消息',
  `msg_tpl` varchar(255) NOT NULL DEFAULT '' COMMENT '新消息提示模板消息',
  `customer_tpl` varchar(255) NOT NULL DEFAULT '' COMMENT '访客模板消息',
  `isscribe` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否开启引导关注1开启0关闭',
  `desc` varchar(255) NOT NULL COMMENT '公共号说明、备注',
  `addtime` int NOT NULL DEFAULT '0',
  `is_delete` smallint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `business_id` (`business_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT COMMENT='微信公众号';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_wechat_platform`
--

LOCK TABLES `wolive_wechat_platform` WRITE;
/*!40000 ALTER TABLE `wolive_wechat_platform` DISABLE KEYS */;
INSERT INTO `wolive_wechat_platform` VALUES (20,1,'','','','','','','','',0,'无',1740555301,0);
/*!40000 ALTER TABLE `wolive_wechat_platform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wolive_weixin`
--

DROP TABLE IF EXISTS `wolive_weixin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wolive_weixin` (
  `wid` int NOT NULL AUTO_INCREMENT,
  `business_id` int NOT NULL COMMENT '商户ID',
  `app_id` varchar(64) NOT NULL DEFAULT '' COMMENT '公众号appid',
  `open_id` varchar(255) NOT NULL COMMENT '微信用户id',
  `subscribe` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否关注微信0未关注1已关注',
  `subscribe_time` int NOT NULL DEFAULT '0' COMMENT '关注时间',
  PRIMARY KEY (`wid`) USING BTREE,
  KEY `business_id` (`business_id`) USING BTREE,
  KEY `app_id` (`app_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wolive_weixin`
--

LOCK TABLES `wolive_weixin` WRITE;
/*!40000 ALTER TABLE `wolive_weixin` DISABLE KEYS */;
/*!40000 ALTER TABLE `wolive_weixin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-27 22:04:36
