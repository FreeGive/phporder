DROP TABLE IF EXISTS `wfadmin`;
CREATE TABLE `wfadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wfadmin` varchar(16) NOT NULL,
  `wfpassword` varchar(32) NOT NULL,
  `wfadminname` varchar(32) NOT NULL,
  `wfadmingroup` int(3) NOT NULL DEFAULT '1',
  `wfaddtime` datetime NOT NULL,
  `wflogintime` varchar(32) NOT NULL,
  `wflogincount` int(11) NOT NULL DEFAULT '0',
  `wfloginip` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `wfadmin` VALUES('1','admin','02be149924f074fb2eeb','系统管理员','1','2017-02-28 08:08:08','2017-02-28 08:08:08','1','127.0.0.1');

DROP TABLE IF EXISTS `wfadmingroup`;
CREATE TABLE `wfadmingroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wfgroupname` varchar(32) NOT NULL,
  `wfgrouppower` text,
  `wflicensepro` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `wfadmingroup` VALUES('1','系统管理员','all','all');

DROP TABLE IF EXISTS `wfadminlogs`;
CREATE TABLE `wfadminlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wfadmin` varchar(16) NOT NULL,
  `wflogintime` datetime NOT NULL,
  `wfloginip` varchar(64) NOT NULL,
  `wfoperatelog` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wffalseip`;
CREATE TABLE `wffalseip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wfpostdate` datetime NOT NULL,
  `wfpostip` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wforderlist`;
CREATE TABLE `wforderlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单ID',
  `wfddno` varchar(32) NOT NULL DEFAULT '' COMMENT '订单号',
  `wfbuydate` datetime NOT NULL COMMENT '订购日期',
  `wfproname` varchar(64) NOT NULL DEFAULT '' COMMENT '产品名称',
  `wfpid` int(3) NOT NULL DEFAULT '0',
  `wfproduct` varchar(256) NOT NULL DEFAULT '' COMMENT '订购产品',
  `wfprosize` varchar(128) NOT NULL DEFAULT '' COMMENT '产品尺码',
  `wfprocolour` varchar(128) NOT NULL DEFAULT '' COMMENT '产品颜色',
  `wfgiftname` varchar(256) NOT NULL DEFAULT '' COMMENT '赠送产品',
  `wfgiftsize` varchar(128) NOT NULL DEFAULT '' COMMENT '赠送产品尺码',
  `wfgiftcolour` varchar(128) NOT NULL DEFAULT '' COMMENT '赠送产品颜色',
  `wfnums` int(11) NOT NULL DEFAULT '1' COMMENT '产品数量',
  `wfprice` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '产品价格',
  `wfname` varchar(32) NOT NULL DEFAULT '' COMMENT '姓名',
  `wfsex` varchar(8) NOT NULL DEFAULT '' COMMENT '性别',
  `wfage` varchar(8) NOT NULL DEFAULT '' COMMENT '年龄',
  `wfheight` varchar(8) NOT NULL DEFAULT '' COMMENT '身高',
  `wfweight` varchar(8) NOT NULL DEFAULT '' COMMENT '体重',
  `wfidcard` varchar(32) NOT NULL DEFAULT '' COMMENT '身份证号',
  `wfmob` varchar(32) NOT NULL DEFAULT '' COMMENT '手机号码',
  `wftel` varchar(32) NOT NULL DEFAULT '' COMMENT '电话号码',
  `wfprovince` varchar(64) NOT NULL DEFAULT '' COMMENT '省份',
  `wfcity` varchar(64) NOT NULL DEFAULT '' COMMENT '城市',
  `wfarea` varchar(64) NOT NULL DEFAULT '' COMMENT '地区',
  `wfaddress` varchar(64) NOT NULL DEFAULT '' COMMENT '详细地址',
  `wfpost` varchar(8) NOT NULL DEFAULT '' COMMENT '邮编',
  `wfqq` varchar(16) NOT NULL DEFAULT '' COMMENT 'QQ号',
  `wfweixin` varchar(32) NOT NULL DEFAULT '' COMMENT '微信号',
  `wfemail` varchar(128) NOT NULL DEFAULT '' COMMENT '邮箱',
  `wfinvcode` varchar(16) NOT NULL DEFAULT '' COMMENT '邀请码',
  `wfdatetime` varchar(32) NOT NULL DEFAULT '' COMMENT '日期时间',
  `wfdaterange` varchar(64) NOT NULL DEFAULT '' COMMENT '日期范围',
  `wfpayment` varchar(8) NOT NULL DEFAULT '' COMMENT '付款方式',
  `wfpaystatus` varchar(3) NOT NULL DEFAULT '' COMMENT '付款状态',
  `wfpaybank` varchar(16) NOT NULL DEFAULT '' COMMENT '付款银行',
  `wfguest` text COMMENT '留言',
  `wfddsource` varchar(32) NOT NULL DEFAULT '' COMMENT '推广渠道',
  `WFLLURL` text COMMENT '订单来路',
  `WFDDURL` text COMMENT '下单页面',
  `wfkeyword` varchar(256) NOT NULL DEFAULT '' COMMENT '搜索关键词',
  `wfipadd` varchar(64) NOT NULL DEFAULT '' COMMENT 'IP地址',
  `wfadminps` varchar(256) NOT NULL DEFAULT '' COMMENT '管理员备注',
  `wfddstatus` varchar(32) NOT NULL DEFAULT '' COMMENT '订单状态',
  `wfkuaidi` varchar(32) NOT NULL DEFAULT '' COMMENT '快递公司',
  `wfkdno` varchar(32) NOT NULL DEFAULT '' COMMENT '快递单号',
  `wfismob` varchar(3) NOT NULL DEFAULT '',
  `wfisdel` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `wfproduct`;
CREATE TABLE `wfproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wfproname` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfproductimg` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfproduct` text CHARACTER SET utf8,
  `wfdefonpro` tinyint(1) NOT NULL DEFAULT '0',
  `wfprosize` text CHARACTER SET utf8,
  `wfprocolour` text CHARACTER SET utf8,
  `wfgifton` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfgiftname` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfgiftsize` text CHARACTER SET utf8,
  `wfgiftcolour` text CHARACTER SET utf8,
  `wfautofhon` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfautofhcont` text CHARACTER SET utf8,
  `wfaddtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `wfproduct` VALUES('1','演示产品','','[["Apple+iPhone+7+%28A1660%29+32G","5199"],["Apple+iPhone+7+Plus+%28A1661%29+32G","6399"]]','2','','','','','','','','','2017-02-28 08:08:08');

DROP TABLE IF EXISTS `wftemplate`;
CREATE TABLE `wftemplate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wftempname` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wftemptype` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wftemptitle` varchar(32) CHARACTER SET utf8 DEFAULT '',
  `wftemptitimg` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfproshow` varchar(8) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfsizeshow` varchar(8) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfcolourshow` varchar(8) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfformopt` text CHARACTER SET utf8,
  `wfpay` text CHARACTER SET utf8,
  `wfvcodeon` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfvcodetype` tinyint(1) NOT NULL DEFAULT '1',
  `wfsmsvcodeon` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wffahuoon` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wftempfahuo` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wftempfhimg` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfdiyfhcont` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfguest` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfpostoktype` tinyint(1) NOT NULL DEFAULT '1',
  `wfpostokurl` varchar(256) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wfpostokmsg` varchar(128) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `wftempstyle` text CHARACTER SET utf8,
  `wfaddtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
INSERT INTO `wftemplate` VALUES('1','演示模板','default','在线快速订购','','down','auto','frame','{"wfnums":"on","wfname":"on","wfmob":"on","wfprovince":"on","wfaddress":"on"}','{"cod":{"o":"on","n":"%E8%B4%A7%E5%88%B0%E4%BB%98%E6%AC%BE","z":"1","x":"1","p":"%E6%B8%A9%E9%A6%A8%E6%8F%90%E7%A4%BA%EF%BC%9A%E9%80%89%E6%8B%A9%E8%B4%A7%E5%88%B0%E4%BB%98%E6%AC%BE%E5%9C%A8%E5%AE%B6%E7%AD%89%E5%BF%AB%E9%80%92%E5%85%AC%E5%8F%B8%E9%80%81%E8%B4%A7%E4%B8%8A%E9%97%A8%EF%BC%8C%E5%85%88%E9%AA%8C%E8%B4%A7%E5%90%8E%E4%BB%98%E6%AC%BE%EF%BC%81"},"alipay":{"n":"%E6%94%AF%E4%BB%98%E5%AE%9D%E4%BB%98%E6%AC%BE","z":"1","x":"2","p":"%E6%B8%A9%E9%A6%A8%E6%8F%90%E7%A4%BA%EF%BC%9A%E5%85%A8%E7%90%83%E9%A2%86%E5%85%88%E7%9A%84%E7%AC%AC%E4%B8%89%E6%96%B9%E6%94%AF%E4%BB%98%E5%B9%B3%E5%8F%B0%EF%BC%8C%E5%9C%A8%E7%BA%BF%E6%94%AF%E4%BB%98%EF%BC%8C%E5%AE%89%E5%85%A8%E5%8F%AF%E9%9D%A0%EF%BC%81"},"weixin":{"o":"on","n":"%E5%BE%AE%E4%BF%A1%E4%BB%98%E6%AC%BE","z":"1","x":"3","p":"%E6%B8%A9%E9%A6%A8%E6%8F%90%E7%A4%BA%EF%BC%9A%E5%85%A8%E7%90%83%E9%A2%86%E5%85%88%E7%9A%84%E7%AC%AC%E4%B8%89%E6%96%B9%E6%94%AF%E4%BB%98%E5%B9%B3%E5%8F%B0%EF%BC%8C%E5%9C%A8%E7%BA%BF%E6%94%AF%E4%BB%98%EF%BC%8C%E5%AE%89%E5%85%A8%E5%8F%AF%E9%9D%A0%EF%BC%81"},"ebank":{"n":"%E7%BD%91%E9%93%B6%E4%BB%98%E6%AC%BE","z":"1","x":"4","p":"%E6%B8%A9%E9%A6%A8%E6%8F%90%E7%A4%BA%EF%BC%9A%E8%AF%B7%E9%80%89%E6%8B%A9%E6%82%A8%E8%A6%81%E5%9C%A8%E7%BA%BF%E4%BB%98%E6%AC%BE%E7%9A%84%E9%93%B6%E8%A1%8C%EF%BC%8C%E5%9C%A8%E7%BA%BF%E6%94%AF%E4%BB%98%EF%BC%8C%E5%AE%89%E5%85%A8%E5%8F%AF%E9%9D%A0%EF%BC%81"},"scan":{"o":"on","n":"%E6%89%AB%E7%A0%81%E8%BD%AC%E8%B4%A6%E4%BB%98%E6%AC%BE","z":"1","x":"5","p":"%E6%B8%A9%E9%A6%A8%E6%8F%90%E7%A4%BA%EF%BC%9A%E6%8F%90%E4%BA%A4%E5%90%8E%E8%AF%B7%E7%94%A8%E4%BD%A0%E7%9A%84%E6%89%8B%E6%9C%BA%E7%99%BB%E9%99%86%E6%94%AF%E4%BB%98%E5%AE%9D%E6%88%96%E5%BE%AE%E4%BF%A1%E6%89%AB%E6%8F%8F%E4%BA%8C%E7%BB%B4%E7%A0%81%E5%AE%8C%E6%88%90%E4%BB%98%E6%AC%BE%EF%BC%81"},"bank":{"n":"%E9%93%B6%E8%A1%8C%E6%B1%87%E6%AC%BE","z":"1","x":"6","p":"%E6%B8%A9%E9%A6%A8%E6%8F%90%E7%A4%BA%EF%BC%9A%E8%AF%B7%E6%8B%A8%E6%89%93%E6%88%91%E4%BB%AC%E7%BD%91%E7%AB%99%E4%B8%8A%E7%9A%84%E5%85%8D%E8%B4%B9%E5%AE%A2%E6%9C%8D%E7%94%B5%E8%AF%9D%EF%BC%8C%E7%B4%A2%E8%A6%81%E9%93%B6%E8%A1%8C%E6%B1%87%E6%AC%BE%E5%B8%90%E5%8F%B7%E3%80%82"}}','','1','','wffahuodiv','发货通知','','{wfbuydate1} {wfprovince}的{wfname} {wfmob} 您订购的{wfproduct}已发货！','请尽快安排发货，送货之前手机联系，谢谢！','1','','恭喜您{wfname}，您已成功订购{wfproduct}！','{"fw":"950px","bw":"5px","bc":"%235FB878","bgc":"%23FFFFFF","titbg":"%23FF9900","btn":"g","btnv":"%E7%AB%8B%E5%8D%B3%E6%8F%90%E4%BA%A4%E8%AE%A2%E5%8D%95"}','2017-02-28 08:08:08')