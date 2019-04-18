-- MySQL dump 10.13  Distrib 5.6.43, for Linux (x86_64)
--
-- Host: localhost    Database: www_gdymdz_com
-- ------------------------------------------------------
-- Server version	5.6.43-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ym_auth_group`
--

DROP TABLE IF EXISTS `ym_auth_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `rules` text,
  `remark` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_auth_group`
--

LOCK TABLES `ym_auth_group` WRITE;
/*!40000 ALTER TABLE `ym_auth_group` DISABLE KEYS */;
INSERT INTO `ym_auth_group` VALUES (1,'开发组','','神一般的存在,没人可以阻挡!'),(15,'超级管理员','12,13,18,17,16,14,21,22,23,26,28,27,30,29,6,9,8,10,7,','');
/*!40000 ALTER TABLE `ym_auth_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ym_auth_member`
--

DROP TABLE IF EXISTS `ym_auth_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_auth_member` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `user` varchar(32) NOT NULL COMMENT '用户帐号',
  `password` varchar(64) NOT NULL COMMENT '用户密码',
  `shuff` varchar(8) NOT NULL COMMENT '加密字符串',
  `nick_name` varchar(64) NOT NULL DEFAULT '匿名用户' COMMENT '用户姓名',
  `sex` varchar(16) NOT NULL DEFAULT '男' COMMENT '性别',
  `headimg` varchar(15) NOT NULL DEFAULT '1554096280058' COMMENT '用户头像',
  `tel` varchar(32) NOT NULL COMMENT '用户手机号',
  `email` varchar(64) NOT NULL COMMENT '用户邮箱',
  `remark` text NOT NULL COMMENT '备注',
  `last_time` int(11) NOT NULL DEFAULT '0' COMMENT '上次登陆时间',
  `last_ip` varchar(15) NOT NULL DEFAULT '000.000.000.000' COMMENT '上次登陆IP地址',
  `login_count` int(11) NOT NULL DEFAULT '1' COMMENT '登陆次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态,1为正常,其它均为禁用',
  `token` varchar(32) NOT NULL COMMENT '用户校验令牌',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE,
  KEY `group_id` (`group_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_auth_member`
--

LOCK TABLES `ym_auth_member` WRITE;
/*!40000 ALTER TABLE `ym_auth_member` DISABLE KEYS */;
INSERT INTO `ym_auth_member` VALUES (6,1,'root','b96d319302b87de0f7d1da3ab21235cf','81zDP4bo','小明','男','1554342292960','123121','123@qq.com','',1555476920,'59.41.4.72',53,1,'70922489db3f5f5861a61dc5e5b1ed54'),(18,15,'admin','61d6c5ad0f61888a232180b68c1f53ec','ECAJGiWw','上帝视角','男','1554342292960','123456478979','','',1554686234,'59.41.4.16',5,1,'0b02ad5a19a9beede8b4db2f51a45a58');
/*!40000 ALTER TABLE `ym_auth_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ym_auth_menu`
--

DROP TABLE IF EXISTS `ym_auth_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_auth_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `is_sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统菜单,系统菜单不可删除',
  `check` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否需要验证权限,1为是,0为否',
  `path` varchar(64) NOT NULL DEFAULT '0' COMMENT '菜单路径,例: 0,1,2,3',
  `icon` varchar(32) NOT NULL DEFAULT '&#xe63f' COMMENT '图标',
  `model` varchar(32) NOT NULL DEFAULT 'Admin',
  `contrl` varchar(32) NOT NULL,
  `action` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '菜单层级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_auth_menu`
--

LOCK TABLES `ym_auth_menu` WRITE;
/*!40000 ALTER TABLE `ym_auth_menu` DISABLE KEYS */;
INSERT INTO `ym_auth_menu` VALUES (1,0,'Admin/Index/index','后台首页',0,1,1,0,'0,1','&#xe68e','Admin','Index','index',1),(2,1,'Admin/Index/login_out','退出登陆',100,0,1,0,'0,1,2','&#xe63f','Admin','Index','login_out',2),(3,1,'Admin/Index/clear','清除缓存',0,0,1,0,'0,1,3','&#xe63f','Admin','Index','clear',2),(4,1,'Admin/Index/retdata','重置数据',0,0,1,1,'0,1,4','&#xe63f','Admin','Index','retdata',2),(5,1,'Admin/Index/getmember','基本资料',50,0,1,0,'0,1,5','&#xe63f','Admin','Index','getmember',2),(6,30,'Admin/Menu/index','后台菜单',500,1,1,1,'0,30,6','&#xe653','Admin','Menu','index',2),(7,0,'Admin/Config/index','系统设置',501,1,1,1,'0,7','&#xe63f','Admin','Index','index',1),(8,6,'Admin/Menu/adds','添加菜单',0,0,1,1,'0,30,6,8','&#xe63f','Admin','Menu','adds',3),(9,6,'Admin/Menu/edits','编辑菜单',0,0,1,1,'0,30,6,9','&#xe63f','Admin','Menu','edits',3),(10,6,'Admin/Menu/dels','删除菜单',0,0,1,1,'0,30,6,10','&#xe63f','Admin','Menu','dels',3),(11,6,'Admin/Menu/orders','一键排序',0,0,1,0,'0,30,6,11','&#xe63f','Admin','Menu','orders',3),(12,0,'Admin/Member/default','用户管理',2,1,1,1,'0,12','&#xe63f','Admin','Member','default',1),(13,12,'Admin/Groups/index','角色管理',0,1,1,1,'0,12,13','&#xe63f','Admin','Groups','index',2),(14,12,'Admin/Member/index','用户列表',0,1,1,1,'0,12,14','&#xe63f','Admin','Member','index',2),(15,1,'Admin/Index/setpwd','修改密码',0,0,1,0,'0,1,15','&#xe63f','Admin','Index','setpwd',2),(16,13,'Admin/Groups/adds','添加角色',0,0,1,1,'0,12,13,16','&#xe63f','Admin','Groups','adds',3),(17,13,'Admin/Groups/edits','编辑角色',0,0,1,1,'0,12,13,17','&#xe63f','Admin','Groups','edits',3),(18,13,'Admin/Groups/dels','删除角色',0,0,1,1,'0,12,13,18','&#xe63f','Admin','Groups','dels',3),(21,14,'Admin/Member/adds','添加用户',0,0,1,1,'0,12,14,21','&#xe63f','Admin','Member','adds',3),(22,14,'Admin/Member/edits','编辑用户',0,0,1,1,'0,12,14,22','&#xe63f','Admin','Member','edits',3),(23,14,'Admin/Member/dels','删除用户',0,0,1,1,'0,12,14,23','&#xe63f','Admin','Member','dels',3),(24,1,'Admin/Index/head_img_upload','头像上传',0,0,1,0,'0,1,24','&#xe63f','Admin','Index','head_img_upload',2),(25,1,'Admin/Index/getFile','获取文件',0,0,1,0,'0,1,25','&#xe63f','Admin','Index','getFile',2),(26,0,'Admin/Goods/default','产品管理',200,1,0,1,'0,26','&#xe63f','Admin','Goods','default',1),(27,26,'Admin/Goods/index','产品列表',2,1,0,1,'0,26,27','&#xe63f','Admin','Goods','index',2),(28,26,'Admin/Goodstype/index','分类管理',0,1,0,1,'0,26,28','&#xe63f','Admin','Goodstype','index',2),(29,30,'Admin/Navs/index','前台菜单',0,1,0,1,'0,30,29','&#xe63f','Admin','Navs','index',2),(30,0,'Admin/Vmenu/default','菜单管理',500,1,1,1,'0,30','&#xe63f','Admin','Vmenu','default',1),(31,0,'Admin/News/default','新闻资讯',0,1,0,1,'0,31','&#xe63f','Admin','News','default',1),(32,31,'Admin/Placard/index','宇脉公告',0,1,0,1,'0,31,32','&#xe63f','Admin','Placard','index',2);
/*!40000 ALTER TABLE `ym_auth_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ym_auth_menu_copy`
--

DROP TABLE IF EXISTS `ym_auth_menu_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_auth_menu_copy` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  `is_sys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否系统菜单,系统菜单不可删除',
  `check` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否需要验证权限,1为是,0为否',
  `path` varchar(64) NOT NULL DEFAULT '0' COMMENT '菜单路径,例: 0,1,2,3',
  `icon` varchar(32) NOT NULL DEFAULT '&#xe63f' COMMENT '图标',
  `model` varchar(32) NOT NULL DEFAULT 'Admin',
  `contrl` varchar(32) NOT NULL,
  `action` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1' COMMENT '菜单层级',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_auth_menu_copy`
--

LOCK TABLES `ym_auth_menu_copy` WRITE;
/*!40000 ALTER TABLE `ym_auth_menu_copy` DISABLE KEYS */;
INSERT INTO `ym_auth_menu_copy` VALUES (1,0,'Admin/Index/index','后台首页',0,1,1,0,'0,1','&#xe68e','Admin','Index','index',1),(2,1,'Admin/Index/login_out','退出登陆',100,0,1,0,'0,1,2','&#xe63f','Admin','Index','login_out',2),(3,1,'Admin/Index/clear','清除缓存',0,0,1,1,'0,1,3','&#xe63f','Admin','Index','clear',2),(4,1,'Admin/Index/retdata','重置数据',0,0,1,1,'0,1,4','&#xe63f','Admin','Index','retdata',2),(5,1,'Admin/Index/getmember','基本资料',50,0,1,0,'0,1,5','&#xe63f','Admin','Index','getmember',2),(1000,0,'Admin/Menu/index','菜单管理',500,1,1,1,'0,1000','&#xe653','Admin','Menu','index',1),(1001,0,'Admin/Config/index','系统设置',501,1,1,1,'0,1001','&#xe63f','Admin','Index','index',1),(1002,1000,'Admin/Menu/adds','添加菜单',0,0,1,1,'0,1000,1002','&#xe63f','Admin','Menu','adds',2),(1003,1000,'Admin/Menu/edits','编辑菜单',0,0,1,1,'0,1000,1003','&#xe63f','Admin','Menu','edits',2),(1004,1000,'Admin/Menu/dels','删除菜单',0,0,1,1,'0,1000,1004','&#xe63f','Admin','Menu','dels',2),(1005,1000,'Admin/Menu/orders','一键排序',0,0,1,0,'0,1000,1005','&#xe63f','Admin','Menu','orders',2),(1006,0,'Admin/Member/default','用户管理',2,1,1,1,'0,1006','&#xe63f','Admin','Member','default',1),(1007,1006,'Admin/Groups/index','角色管理',0,1,1,1,'0,1006,1007','&#xe63f','Admin','Groups','index',2),(1008,1006,'Admin/Member/index','用户列表',0,1,1,1,'0,1006,1008','&#xe63f','Admin','Member','index',2),(1009,1,'Admin/Index/setpwd','修改密码',0,0,1,0,'0,1,1009','&#xe63f','Admin','Index','setpwd',2),(1010,1007,'Admin/Groups/adds','添加角色',0,0,1,1,'0,1006,1007,1010','&#xe63f','Admin','Groups','adds',3),(1011,1007,'Admin/Groups/edits','编辑角色',0,0,1,1,'0,1006,1007,1011','&#xe63f','Admin','Groups','edits',3);
/*!40000 ALTER TABLE `ym_auth_menu_copy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ym_config`
--

DROP TABLE IF EXISTS `ym_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_config` (
  `id` tinyint(4) NOT NULL,
  `company` varchar(128) NOT NULL COMMENT '公司名称',
  `title` varchar(64) NOT NULL COMMENT '系统名称',
  `url` varchar(128) NOT NULL COMMENT '公司链接',
  `tel` varchar(32) NOT NULL COMMENT '电话',
  `email` varchar(32) NOT NULL COMMENT '邮箱',
  `is_code` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否开启登陆验证码,0为关,1为开',
  `remark` text NOT NULL COMMENT '备注',
  `favicon` varchar(64) NOT NULL DEFAULT '/favicon.png' COMMENT '网站图标',
  `logo` varchar(64) NOT NULL DEFAULT '/logo.png' COMMENT '网站LOGO',
  `description` varchar(512) NOT NULL COMMENT '描述内容',
  `keywords` varchar(512) NOT NULL COMMENT '关键字',
  `foot` text NOT NULL COMMENT '站点底部其它js脚本内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_config`
--

LOCK TABLES `ym_config` WRITE;
/*!40000 ALTER TABLE `ym_config` DISABLE KEYS */;
INSERT INTO `ym_config` VALUES (1,'广州宇脉电子科技有限公司','广州宇脉电子科技有限公司','http://www.gdymdz.com','123456','123123',1,'','/favicon.png','/logo.png','广州宇脉电子科技有限公司始于2003，是一家专业的单片机开发、电子产品定制开发及生产的企业，本公司单片机产品被认定为广东省高薪技术产品，并拥有多项发明专利、实用新型专利、外观专利、软件著作权。是广东省守合同重信用企业，有着16年深厚的技术沉淀。本公司自主品牌为：宇脉、宇脉单片机。自主研发的产品涉及智能自助产品系列控制系统、汽车维修设备系列控制系统、智能家居系列控制系统、数据采集系列控制系统','宇脉,广东宇脉,广州宇脉,宇脉电子,宇脉科技,单片机,单片机开发,单片机定制,智能系统,单片机工作定,单片机公司,单片机订购,智能自助产品,汽车控制系统,智能家居系统,数据采集控制系统,控制系统','&lt;script&gt;\r\n/*\r\nvar _hmt = _hmt || [];(function() {var hm = document.createElement(&quot;script&quot;);hm.src = &quot;https://hm.baidu.com/hm.js?a135f5436b510ec1e443a26eb8f2a68a&quot;;var s = document.getElementsByTagName(&quot;script&quot;)[0]; s.parentNode.insertBefore(hm, s);})();\r\n*/\r\n&lt;/script&gt;\r\n');
/*!40000 ALTER TABLE `ym_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ym_files`
--

DROP TABLE IF EXISTS `ym_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_files` (
  `code` bigint(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件编号',
  `name` varchar(128) NOT NULL DEFAULT '' COMMENT '文件原名,带后缀',
  `type` varchar(15) NOT NULL DEFAULT 'image/png' COMMENT 'IMEI类型',
  `size` int(11) NOT NULL DEFAULT '0' COMMENT '文件大小,单位字节',
  `ext` char(5) NOT NULL DEFAULT 'png' COMMENT '文件后缀',
  `md5` varchar(32) NOT NULL DEFAULT '' COMMENT '文件MD5',
  `sha1` varchar(48) NOT NULL DEFAULT '' COMMENT '文件hash',
  `savename` varchar(32) NOT NULL DEFAULT '' COMMENT '保存的文件名',
  `savepath` varchar(64) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0为可删除,1为不可删除',
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_files`
--

LOCK TABLES `ym_files` WRITE;
/*!40000 ALTER TABLE `ym_files` DISABLE KEYS */;
INSERT INTO `ym_files` VALUES (1554342292960,'headimg.jpg','image/jpeg',4834,'jpg','4e229d0d27f4956dd6537c4df2359f68','3afc5774f62f416682961887a58fe90c1be00dc8','5ca561944d15f.jpg','./Uploads/2019-04-04/',1);
/*!40000 ALTER TABLE `ym_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ym_nav`
--

DROP TABLE IF EXISTS `ym_nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ym_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '上级ID',
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '导航名称',
  `url` varchar(128) NOT NULL DEFAULT '' COMMENT '链接地址',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '导航类型,0为站内导航,1为站外导航',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '导航状态,0为正常,1为禁用',
  `remark` varchar(64) NOT NULL DEFAULT '' COMMENT '备注信息',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='前台主导航';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ym_nav`
--

LOCK TABLES `ym_nav` WRITE;
/*!40000 ALTER TABLE `ym_nav` DISABLE KEYS */;
INSERT INTO `ym_nav` VALUES (1,0,'官网首页','/',0,0,'',0);
/*!40000 ALTER TABLE `ym_nav` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-17 12:56:26
