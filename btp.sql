/*
Navicat MySQL Data Transfer

Source Server         : chenheng
Source Server Version : 50557
Source Host           : localhost:3306
Source Database       : btp

Target Server Type    : MYSQL
Target Server Version : 50557
File Encoding         : 65001

Date: 2017-12-20 17:50:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aname` varchar(100) NOT NULL,
  `apwd` varchar(64) NOT NULL,
  `asex` varchar(7) DEFAULT NULL,
  `abirthday` date DEFAULT NULL,
  `amobile` varchar(30) DEFAULT NULL,
  `aemail` varchar(200) DEFAULT NULL,
  `aqq` varchar(20) DEFAULT NULL,
  `aregtime` datetime NOT NULL,
  `alastupdatetime` datetime DEFAULT NULL,
  `aisvalid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '小陈', '$2y$10$ZBGxTCyqBNYaw18O5N4f9O4HbEz3AfHQunZFXJ7BJobIArRSuJSVK', '男', '1996-05-13', '15183869323', '676622818@qq.com', '6722839122', '2017-12-01 00:00:00', '2017-12-20 15:51:49', '1');
INSERT INTO `admin` VALUES ('2', '小刘', '$2y$10$ZBGxTCyqBNYaw18O5N4f9O4HbEz3AfHQunZFXJ7BJobIArRSuJSVK', '女', '1998-01-03', '16172837482', '868822936@qq.com', '878629371', '2017-12-01 00:00:00', '2017-12-14 00:00:00', '1');
INSERT INTO `admin` VALUES ('3', '张飞', '$2y$10$ZBGxTCyqBNYaw18O5N4f9O4HbEz3AfHQunZFXJ7BJobIArRSuJSVK', '男', '1997-12-25', '15183829371', '729911738@qq.com', '767722839', '2017-12-01 00:00:00', '2017-12-01 00:00:00', '1');
INSERT INTO `admin` VALUES ('4', '美女', '$2y$10$H4x.B19hwzuTU1mCQzLXWOWHmO.bsGcgmCqMMMroTLp0kPRMPmVV.', '女', '2017-12-15', '18228924365', '252525@qq.com', '252525', '2017-12-20 17:05:54', '2017-12-20 17:05:54', '1');

-- ----------------------------
-- Table structure for bclass
-- ----------------------------
DROP TABLE IF EXISTS `bclass`;
CREATE TABLE `bclass` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bclass
-- ----------------------------
INSERT INTO `bclass` VALUES ('1', 'BootStrap');
INSERT INTO `bclass` VALUES ('2', 'Thinkphp');
INSERT INTO `bclass` VALUES ('3', 'HTML/CSS');
INSERT INTO `bclass` VALUES ('4', 'JavaScript');
INSERT INTO `bclass` VALUES ('5', 'ASP.NET');
INSERT INTO `bclass` VALUES ('6', 'WEB services');
INSERT INTO `bclass` VALUES ('7', 'XML教程');
INSERT INTO `bclass` VALUES ('8', '开发工具');
INSERT INTO `bclass` VALUES ('9', '网站建设');

-- ----------------------------
-- Table structure for biji
-- ----------------------------
DROP TABLE IF EXISTS `biji`;
CREATE TABLE `biji` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `zid` int(11) DEFAULT NULL,
  `bcontent` text NOT NULL,
  `btime` datetime NOT NULL,
  `blastupdatetime` datetime DEFAULT NULL,
  `bisvalid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`bid`),
  KEY `FK_Reference_1` (`uid`),
  KEY `FK_Reference_2` (`zid`),
  CONSTRAINT `biji_ibfk_1` FOREIGN KEY (`zid`) REFERENCES `zhishi` (`zid`),
  CONSTRAINT `FK_Reference_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biji
-- ----------------------------
INSERT INTO `biji` VALUES ('1', '2', '3', '我不知道写了什么trf滚滚滚', '2017-12-02 00:00:00', '2017-12-04 16:53:47', '1');
INSERT INTO `biji` VALUES ('2', '3', '4', '在使用中常常遇到 utf-8 和 utf8，现在终于弄明白他们的使用不同之处了，现在来和大家分享一下，下面我们看一下 utf-8 和 utf8 有什么区别。', '2017-12-01 00:00:00', '2017-12-03 16:53:52', '1');
INSERT INTO `biji` VALUES ('3', '1', '5', '标签是form', '2017-12-02 00:00:00', '2017-12-02 16:53:56', '1');
INSERT INTO `biji` VALUES ('5', '1', '1', '啊实打实的', '2017-12-18 14:38:21', '2017-12-18 16:27:09', '1');
INSERT INTO `biji` VALUES ('6', '4', '1', '这个系统，分为几种格式', '2017-12-18 16:06:27', '2017-12-18 16:27:12', '1');
INSERT INTO `biji` VALUES ('7', '4', '34', '这个，基础。了解一下就好了，正解', '2017-12-18 16:28:43', '2017-12-12 16:30:49', '1');
INSERT INTO `biji` VALUES ('8', '6', '4', '表格这个东西呢，得好好看看', '2017-12-20 15:02:36', '2017-12-20 16:43:07', '1');
INSERT INTO `biji` VALUES ('9', '1', '4', '&lt;p&gt;我不会&lt;/p&gt;', '2017-12-20 16:43:57', '2017-12-20 16:43:57', '1');

-- ----------------------------
-- Table structure for lianxiti
-- ----------------------------
DROP TABLE IF EXISTS `lianxiti`;
CREATE TABLE `lianxiti` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `wenti` varchar(200) NOT NULL,
  `tone` varchar(200) NOT NULL,
  `ttwo` varchar(200) NOT NULL,
  `tthree` varchar(200) NOT NULL,
  `tfour` varchar(200) NOT NULL,
  `tdaan` varchar(255) NOT NULL,
  `tregtime` datetime NOT NULL,
  `tlastupdatetime` datetime DEFAULT NULL,
  `tisvalid` tinyint(4) NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `FK_Reference_5` (`bid`),
  CONSTRAINT `lianxiti_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bclass` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lianxiti
-- ----------------------------
INSERT INTO `lianxiti` VALUES ('1', '2', 'mysql_data_seek( resource result_identifier, int row_number)函数中的introw_number的值是从以下哪个数值开始？ ', 'A. 3', ' B. 2', 'C.1', 'D.0', 'D', '2017-12-13 17:36:37', '2017-12-20 14:17:10', '1');
INSERT INTO `lianxiti` VALUES ('2', '2', '在使用ThinkPHP开发时，css和js文件的最佳存放位置：', 'A.index目录 ', 'B. 应用根目录', 'C. Public目录 ', 'D. ThinkPHP目录', 'C', '2017-12-13 17:36:41', '2017-12-20 15:50:56', '1');
INSERT INTO `lianxiti` VALUES ('3', '2', 'TP中，如何生成自己的Action类？', 'A.继承Action类', ' B.实现Action接口', 'C.自行定义任意类', 'D. 以上答案都不对', 'A', '2017-12-13 17:36:45', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('4', '2', '(NULL)如果需要在TP中使用Smarty模板，需要修改哪个配置文件？', 'A.index.php ', ' B. conf.xml', 'C. config.php ', ' D. Runtime.php', 'C', '2017-12-13 17:36:50', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('5', '2', '在TP中实现统一的身份认证，较佳的方法有哪些？', 'A．RBAC', 'B.继承Action类，在该继承类中实现身份认证', 'C．通过修改config.php配置文件实现', 'D。以上都不对', 'A', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('6', '2', '下列数组中不属于处理结果集的函数为（  ）', 'A. mysql_fetch_row ', 'B. mysql_fetch_object', 'C. mysql_query', 'D. mysql_num_rows', 'D', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('7', '2', '下面不属于MVC框架是（  ）', 'A、yii ', ' B、thinkphp', 'C、smarty ', 'D、cakephp ', 'A', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('8', '2', '在Thinkphp为框架目录时，其不属于该结构的是（）', 'A.index.php', 'B.Public', 'c.composer.json', 'D.Think', 'D', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('9', '2', '怎么了解您在当前目录下还有多大空间？', 'A． Use df ', 'B． Use du / ', 'C． Use du.', 'D． Use df. ', 'A', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('10', '2', ' 使用命令可以查看Linux的启动信息？', 'A．mesg –d', 'B．demesg', 'C．cat /etc/mesg', 'D．cat /var/mesg', 'B', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('11', '2', ' 在vi中退出不保存的命令？', 'A．:qt ', 'B．:r', 'C．:wq', 'D．:q! ', 'C', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('12', '2', 'TP框架的核心目录是哪一个？', 'A.Application', 'B.Public', 'C.ThinkPHP', 'D.都不熟', 'C', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('13', '2', '入口文件必须完成下列哪一项？', 'A.定义框架路径、项目路径', 'B.定义调试模式和应用模式', 'C.定义系统相关常量', 'D.定义系统相关常量', 'D', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('14', '2', '下列哪一个单字母函数是用来用于实例化模型类', 'A.D', 'B.M', 'C.I', 'D.R', 'A', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('15', '2', '下列哪个单字母是用于实例化一个没有模型文件的Model？', 'A.D', 'B.M', 'C,I', 'D.R', 'B', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('16', '2', 'TP框架中MVC中的V表示？', 'A.模型', 'B.视图', 'C.控制器', 'D.以上都不对', 'B', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('17', '2', 'TP框架的命名规范，下列说法错误的是', 'A.类文件都是以.class.php为后缀（这里是指的ThinkPHP内部使用的类库文件，不代表外部加载的类\r\n库文件），使用驼峰法命名，并且首字母大写，例如 DbMysql.class.php', 'B.类的命名空间地址和所在的路径地址可以不一致', 'C.确保文件的命名和调用大小写一致，是由于在类Unix系统上面，对大小写是敏感的', 'D.函数的命名使用小写字母和下划线的方式', 'B', '2017-12-13 17:36:54', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('18', '2', 'ThinkPHP框架中默认所有配置文件的定义格式均采用返回什么样的方式？', 'A.字符串', 'B.ture或false', 'C.数组', 'D.布尔值', 'C', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('19', '2', '下列哪个不是TP框架中生成验证码的参数？', 'A.expire', 'B.useImgBg', 'C.fontSize', 'D.useCurue', 'D', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('20', '2', '下列关于TP框架中URL伪静态描述有误的是', 'A.URL伪静态通常是为了满足更好的SEO效果', '\r\nB.默认情况下，伪静态的设置为 html', 'C.如果我们设置伪静态后缀为空，则可以支持所有的静态后缀访问', 'D.以上都不对', 'D', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('21', '1', '如果让一个元素在pc端显示而在手机端隐藏，下列选项正确的是', 'A、 visible-xs-8  hidden-md', 'B、 visible-md-8 hidden-xs', 'C、 visible-md-8 hidden-sm', 'D、 visible-sm-8 hidden-md', 'B', '2017-12-13 17:37:34', '2017-12-20 15:51:02', '1');
INSERT INTO `lianxiti` VALUES ('22', '1', '在bootstrap中，下列的类可以使一个元素在打印使隐藏。', 'A、visible-print-block', 'B、 visible-print-inline', 'C、 hidden-print', 'D、   print-hidden', 'C', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('23', '1', '在bootstrap中，栅格系统的标准用法有哪些', 'A、.col-md-1', 'B、.col-md-4', 'C、 .col-md-6', 'D、   以上都对', 'D', '2017-12-13 17:37:34', '2017-12-20 15:51:13', '1');
INSERT INTO `lianxiti` VALUES ('24', '1', '下列不是正确的辅助类。', 'A、.text-muted。', 'B、 .text-danger。', 'C、 .tex-success。', 'D、   .text-title。', 'D', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('25', '1', '在bootstrap中，关于弹性布局的属性错误的是', 'A、flex', 'B、 flex-direction', 'C、 justify-content', 'D、   flex-container', 'D', '2017-12-13 17:38:06', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('26', '1', '在bootstrap中，设置按钮禁用的属性是？', 'A、btn-primary', 'B、disabled', 'C、btn-lg', 'D、button', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('27', '1', '在bootstrap中，关于flex-wrap属性值错误的是', 'A、nowrap', 'B、colwrap', 'C、wrap', 'D、wrap-reverse', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('28', '1', '在bootstrap中，关于justify-content属性值错误的是', 'A、flex-start', 'B、flex-end', 'C、middle', 'D、space-between', 'C', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('29', '1', '在bootstrap中，关于align-items属性值错误的是', 'A、flex-start', 'B、flex-end', 'C、center', 'D、underline', 'D', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('30', '1', '在bootstrap中,不是媒体查询类型的值。', 'A、all', 'B、speed', 'C、handheld', 'D、print', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('31', '1', '在bootstrap中,不是媒体特性的属性。', 'A、device-width', 'B、width', 'C、background', 'D、orientation', 'C', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('32', '1', '在bootstrap中,是错误的媒体查询的写法。', 'A、@media all and (min-width:1024px) { };', 'B、@media all and (min-width:640px) and (max-width:1023px) { };', 'C、@media all and (min-width:320px) or (max-width:639px) { };', 'D、@media screen and (min-width:320px) and (max-width:639px) { };', 'C', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('33', '1', '在bootstrap中,不属于栅格系统的实现原理。', 'A、自定义容器的大小。平均分为12份', 'B、基于JavaScript开发的组件', 'C、结合媒体查询', 'D、调整内外边距', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('34', '1', ' 在bootstrap中,关于响应式栅格系统的描述是错误的。', 'A、.col-sx-：超小屏幕（<768px）', 'B、.col-sm-：小屏幕、平板（>=768px）', 'C、.col-md-：中等屏幕（>=992px）', 'D、.col-lg-：大屏幕（>=1200px）', 'A', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('35', '1', '在bootstrap中，以下的不是文本对其的方式。', 'A、.text-left', 'B、.text-middle', 'C、.text-right', 'D、text-justify', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('36', '1', '在bootstrap中，下列不属于验证提示状态的类。', 'A、.has-warning', 'B、.has-erro', 'C、.has-danger', 'D、.has-success', 'C', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('37', '1', '在bootstrap中,不属于媒体查询的关键词。', 'A、and', 'B、not', 'C、only', 'D、or', 'D', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('38', '1', ' 在bootstrap中，下列不属于按钮尺寸。', 'A、.btn-lg', 'B、.btn- md', 'C、.btn-sm', 'D、.btn-xs', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');
INSERT INTO `lianxiti` VALUES ('39', '1', ' 在bootstrap中，下列类不属于button的预定义样式。', 'A、.btn-success', 'B、.btn-warp', 'C、.btn-info', 'D、.btn-link', 'B', '2017-12-13 17:37:34', '2017-12-14 17:39:09', '1');

-- ----------------------------
-- Table structure for sclass
-- ----------------------------
DROP TABLE IF EXISTS `sclass`;
CREATE TABLE `sclass` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `sname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `FK_Reference_4` (`bid`),
  CONSTRAINT `sclass_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bclass` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sclass
-- ----------------------------
INSERT INTO `sclass` VALUES ('1', '2', '基础');
INSERT INTO `sclass` VALUES ('2', '2', '配置');
INSERT INTO `sclass` VALUES ('3', '2', '架构');
INSERT INTO `sclass` VALUES ('4', '2', '路由');
INSERT INTO `sclass` VALUES ('5', '2', '控制器');
INSERT INTO `sclass` VALUES ('6', '2', '模型');
INSERT INTO `sclass` VALUES ('7', '2', '视图');
INSERT INTO `sclass` VALUES ('8', '2', '模板');
INSERT INTO `sclass` VALUES ('9', '2', '调试');
INSERT INTO `sclass` VALUES ('10', '2', '缓存');
INSERT INTO `sclass` VALUES ('11', '2', '安全');
INSERT INTO `sclass` VALUES ('12', '2', '扩展');
INSERT INTO `sclass` VALUES ('13', '2', '部署');
INSERT INTO `sclass` VALUES ('14', '2', '专题');
INSERT INTO `sclass` VALUES ('15', '2', '附录');
INSERT INTO `sclass` VALUES ('16', '1', 'CSS');
INSERT INTO `sclass` VALUES ('17', '1', '组件');
INSERT INTO `sclass` VALUES ('18', '1', 'JS插件');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `upwd` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usex` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ubirthday` date DEFAULT NULL,
  `umobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `uemail` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `uqq` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `uregtime` datetime NOT NULL,
  `ulastupdatetime` datetime DEFAULT NULL,
  `uisvalid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`,`usex`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '小雪', '$2y$10$ZBGxTCyqBNYaw18O5N4f9O4HbEz3AfHQunZFXJ7BJobIArRSuJSVK', '女', '2017-12-07', '15183861927', '676622949@qq.com', '6766229391', '2017-12-01 00:00:00', '2017-12-19 19:55:39', '1');
INSERT INTO `user` VALUES ('2', '老刘', '$2y$10$ZBGxTCyqBNYaw18O5N4f9O4HbEz3AfHQunZFXJ7BJobIArRSuJSVK', '男', '1997-11-23', '15182839271', '1862936976@qq.com', '182839245', '2017-12-12 00:59:09', '2017-12-15 00:00:00', '1');
INSERT INTO `user` VALUES ('3', '陈横', '$2y$10$ZBGxTCyqBNYaw18O5N4f9O4HbEz3AfHQunZFXJ7BJobIArRSuJSVK', '男', '1997-01-27', '15183849281', '18872937698@qq.com', '676622839', '2017-12-01 00:00:00', '2017-12-14 00:00:00', '1');
INSERT INTO `user` VALUES ('4', '陈恒', '$2y$10$amLjwXdcuL7tiALWBo6g1.gjMVnLWEH8GwwxC2LisRfVzogWUiO4G', '男', '2017-12-06', '18228924307', '123456@qq.com', '123456', '2017-12-13 16:09:09', '2017-12-19 19:55:23', '1');
INSERT INTO `user` VALUES ('5', 'chenping', '$2y$10$uQhW8zHqTkLTBkha6DNDweyxGOObHKsr3cdstTv0sQcKgaxbmCTwW', '男', '2017-12-08', '18228924309', '12345@qq.com', '123456', '2017-12-14 16:16:46', '2017-12-14 16:16:46', '1');
INSERT INTO `user` VALUES ('6', '负数', '$2y$10$yQ3h4rV6X8DhmPmUpiDKUO08Gb7algGEMuWP1TeF1J0BmlN6i9ZrC', '女', '2017-12-02', '18228924355', '121212@qq.com', '121212', '2017-12-20 15:01:34', '2017-12-20 15:02:04', '1');

-- ----------------------------
-- Table structure for zhishi
-- ----------------------------
DROP TABLE IF EXISTS `zhishi`;
CREATE TABLE `zhishi` (
  `zid` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `zbiaoti` varchar(100) NOT NULL,
  `zcontent` text NOT NULL,
  `zregtime` datetime NOT NULL,
  `zlastupdatetime` datetime DEFAULT NULL,
  `zisvalid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`zid`),
  KEY `FK_Reference_3` (`sid`),
  CONSTRAINT `FK_Reference_3` FOREIGN KEY (`sid`) REFERENCES `sclass` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zhishi
-- ----------------------------
INSERT INTO `zhishi` VALUES ('1', '16', '移动设备优先', '在Bootstrap 2中，我们对框架中的某些关键部分增加了对移动设备友好的样式。而在Bootstrap 3中，我们重写了整个框架，使其一开始就是对移动设备友好的。这次不是简单的增加一些可选的针对移动设备的样式，而是直接融合进了框架的内核中。也就是说，Bootstrap是移动设备优先的。针对移动设备的样式融合进了框架的每个角落，而不是一个单一的文件。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('2', '16', '响应式图片', '通过添加.img-responsive class可以让Bootstrap 3中的图片对响应式布局的支持更友好。其实质是为图片赋予了max-width: 100%; 和height: auto;属性，可以让图片按比例缩放，不超过其父元素的尺寸。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('3', '16', '排版和链接', 'Bootstrap设置了全局样式，包括显示、排版和链接。尤其是，我们还：通过添加.img-responsive class可以让Bootstrap 3中的图片对响应式布局的支持更友好。其实质是为图片赋予了max-width: 100%; 和height: auto;属性，可以让图片按比例缩放，不超过其父元素的尺寸。。。通过添加.img-responsive class可以让Bootstrap 3中的图片对响应式布局的支持更友好。其实质是为图片赋予了max-width: 100%; 和height: aut', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('4', '16', '表格', '为任意<>标签添加可以为其赋予基本的样式—少量的内补和水平方向的分隔线。这种方式看起来很多余！？但是我们觉得，表格元素使用的很广泛，如果我们为其赋予默认样式可能会影响例如日历和日期选择之类的插件，所以我们选择将其样式独立出来。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('5', '16', '表单', '单独的表单控件会被自动赋予一些全局样式。所有设置了的和元素都将被默认设置为将label和前面提到的这些控件包裹在.中可以获得最好的排列。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('6', '16', '按钮', '当按钮处于活动状态时，其表现为被按压下（底色更深，边框夜色更深，内置阴影）。对于元素，是通过:实现的。对于元素，是通过.active实现的。然而，你还可以联合使用并通过编程的方式使其处于活动状态。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('7', '17', '下拉菜单', '用于显示链接列表的可切换、有上下文的菜单。JavaScript 下拉菜单插件让它有交互性。本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('8', '17', '按钮组', '用按钮组把一组按钮放在同一行里。通过使用我们的按钮插件，可以设置为单选框或多选框样式及行为。本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('9', '17', '按钮式下拉菜单', '把任何按钮放入.btn-group然后加入正确的菜单标记，就可以做成下拉菜单触发器。本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('10', '17', '输入框组', '通过在基于文本的输入框前面，后面或是两边加上文字或按钮，可以扩展对表单的控制。用带有.input-group-addon的.input-group，可以给.form-control前面或后面追加元素。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('11', '17', '导航条', 'Bootstrap中可用的导航有相似的标记，用基类.nav开头，这是相似的部分。改变修饰类可以改变样式。本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('12', '17', '分页', '为您的网站或应用提供多页的分页组件，或是用更简单的翻页代替。本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('13', '17', '标签', '可用的变体，此元素可告知浏览器其自身是一个 HTML 文档。 与 标签限定了文档的开始点和结束点，在它们之间是文档的头部和主体。正如您所了解的那样，文档的头部由 <head> 标签定义，而主体由 <body> 标签定义。，xmlns 属性在 XHTML 中是必需的，但在 HTML 中不是。不过，即使 XHTML 文档中的 <html> 没有使用此属性，W3C 的验证器也不会报错。这是因为 \"xmlns=http://www.w3.org/1999/xhtml\" 是一个固定值，即', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('14', '17', '微章', '给链接，Bootstrap导航等等加入可以容易地高亮新的或未读的条目。本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('15', '17', '页面标题', '简单的h1样式，可以适当地分出空间且分开页面中的章节。像其它组件一样，它可以使用h1的默认small元素（添加了一些额外的样式）。受到Jason Frame开发的jQuery.tipsy插件的启发，我们才把这个工具提示插件做的更好，而且此插件不依赖图片，只是使用CSS3来实现动画效果，并使用data属性存储标题。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('16', '17', '缩略图', '用缩略图组件扩展Bootstrap的栅格系统，可以简单地显示栅格样式的图像，视频，文本，等等。受到Jason Frame开发的jQuery.tipsy插件的启发，我们才把这个工具提示插件做的更好，而且此插件不依赖图片，只是使用CSS3来实现动画效果，并使用data属性存储标题。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('17', '17', '警告框', '为典型的用户动作提供少数可用且灵活的反馈消息。要用关闭功能，请使用jQuery警告框插件.受到Jason Frame开发的jQuery.tipsy插件的启发，我们才把这个工具提示插件做的更好，而且此插件不依赖图片，只是使用CSS3来实现动画效果，并使用data属性存储标题。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('18', '17', '进度条', '提供工作或动作的实时反馈，只用简单且灵活的进度条。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。。通过此插件', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('19', '17', '进度条', '列表组是灵活又强大的组件，不仅仅用于显示简单的成列表的元素，还用于复杂的定制的内容。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('20', '17', '面板', '虽然不总是必须，但是某些时候你可能需要将某些内容放到一个盒子里。对于这种情况，可以试试面板组件。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('21', '17', 'well', '把Well用在元素上，能有嵌入(inset)的的简单效果。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。。通', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('22', '18', '过渡效果', '对于简单的过渡效果，只需将transition.js和其它JS文件一起引入即可。如果你使用的是编译（或压缩）好的bootstrap.js文件，就无需再单独将其引入了。受到Jason Frame开发的jQuery.tipsy插件的启发，我们才把这个工具提示插件做的更好，而且此插件不依赖图片，只是使用CSS3来实现动画效果，并使用data属性存储标题。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('23', '18', '模态框', '模态框经过了优化，更加灵活，以弹出对话框的形式出现，具有最小和最实用的功能集。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('24', '18', '下拉菜单', '通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页、胶囊式按钮。。。通过此插件可以为几乎所有东西添加下拉菜单，包括导航条、标签页', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('25', '18', '滚动监听', '滚动监听插件可以根据滚动条的位置自动更新所对应的导航标记。你可以试试滚动这个页面，看看左侧导航的变化。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('26', '18', '标签页', '通过添加标签页功能，可以让多个内容区域快速、动态切换。下拉菜单也可以使用。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('27', '18', '工具提示', '受到Jason Frame开发的jQuery.tipsy插件的启发，我们才把这个工具提示插件做的更好，而且此插件不依赖图片，只是使用CSS3来实现动画效果，并使用data属性存储标题。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('28', '18', '弹出框', '为页面内容添加一个小的覆盖层，就像iPad上的效果一样，为页面元素增加额外的信息。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('29', '18', '警告框', '通过这个插件可以为所有警告框增加关闭功能。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('30', '18', '按钮', '按钮可以完成很多工作。控制按钮状态或创建按钮组可以产生类似工具条之类的复杂组件。按钮可以完成很多工作。控制按钮状态或创建按钮组可以产生类似工具条之类的复杂组件。按钮可以完成很多工作。控制按钮状态或创建按钮组可以产生类似工具条之类的复杂组件。按钮可以完成很多工作。控制按钮状态或创建按钮组可以产生类似工具条之类的复杂组件。按钮可以完成很多工作。控制按钮状态或创建按钮组可以产生类似工具条之类的复杂组件。按钮可以完成很多工作。控制按钮状态或创建按钮组可以产生类似工具条之类的复杂组件。按钮可以完成很多工作。控制按钮', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('31', '18', '折叠', '对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。对为支持折叠功能的组件，例如accordions和导航，赋予基本样式和灵活的支持。。。对为支持折叠功', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('32', '18', '轮播', 'nternet Explorer 8 & 9不支持过渡动画效果,Bootstrap基于CSS3实现动画效果，但是Internet Explorer 8 & 9不支持这些必要的CSS属性。因此，使用这两种浏览器时将会丢失过渡动画效果。而且，我们并不打算使用基于jQuery实现替代功能。在任何.item中均可以通过添加.carousel-caption从而为每帧幻灯片添加说明文字。也可以添加任何HTML代码，这些HTML代码将会被自动排列和格式化。在任何.item中均可以通过添加.carousel-capti', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('33', '18', 'Affix', '本页面左侧的导航就是affix插件的完整实例。ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单的基于MVC和面向对象的轻量级PHP开发框架，遵循Apache2开源协议发，ThinkPHP是一个快速、简单', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('34', '1', '基础', 'sssss', '2017-12-04 00:00:00', '2017-12-20 17:04:44', '1');
INSERT INTO `zhishi` VALUES ('35', '2', '配置', 'ThinkPHP提供了灵活的全局配置功能，采用最有效率的PHP返回数组方式定义，支持惯例配置、公共配，ThinkPHP提供了灵活的全局配置功能，采用最有效率的PHP返回数组方式定义，支持惯例配置、公共配，ThinkPHP提供了灵活的全局配置功能，采用最有效率的PHP返回数组方式定义，支持惯例配置、公共配ThinkPHP提供了灵活的全局配置功能，采用最有效率的PHP返回数组方式定义，支持惯例配置、公共配，ThinkPHP提供了灵活的全局配置功能，采用最有效率的PHP返回数组方式定义，支持惯例配置、公共配，，', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('36', '3', '架构', '一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('37', '4', '路由', '利用路由功能，可以让你的URL地址更加简洁和优雅。ThinkPHP支持对模块的URL地址进行路由操作（路，，利用路由功能，可以让你的URL地址更加简洁和优雅。ThinkPHP支持对模块的URL地址进行路由操作（路，利用路由功能，可以让你的URL地址更加简洁和优雅。ThinkPHP支持对模块的URL地址进行路由操作（路，利用路由功能，可以让你的URL地址更加简洁和优雅。ThinkPHP支持对模块的URL地址进行路由操作（路利用路由功能，可以让你的URL地址更加简洁和优雅。ThinkPHP支持对模块的URL地', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('38', '5', '控制器', '一般来说，ThinkPHP的控制器是一个类，而操作则是控制器类的一个公共方法。，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的ThinkPHP应用基于模块/控制器/操作设计，并且，如果有需要的话，可以支持多入口文件和多，一个完整的Th', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('39', '6', '模型', '在ThinkPHP中基础的模型类就是 Think\\Model 类，该类完成了基本的CURD、ActiveRecord模式、连贯，在ThinkPHP中基础的模型类就是 Think\\Model 类，该类完成了基本的CURD、ActiveRecord模式、连贯，在ThinkPHP中基础的模型类就是 Think\\Model 类，该类完成了基本的CURD、ActiveRecord模式、连贯，在ThinkPHP中基础的模型类就是 Think\\Model 类，该类完成了基本的CURD、ActiveRecord模式、连贯', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('40', '7', '视图', '每个模块的模板文件是独立的，为了对模板文件更加有效的管理，ThinkPHP对模板文件进行目录划分，默，每个模块的模板文件是独立的，为了对模板文件更加有效的管理，ThinkPHP对模板文件进行目录划分，默，每个模块的模板文件是独立的，为了对模板文件更加有效的管理，ThinkPHP对模板文件进行目录划分，默，每个模块的模板文件是独立的，为了对模板文件更加有效的管理，ThinkPHP对模板文件进行目录划分，默，每个模块的模板文件是独立的，为了对模板文件更加有效的管理，ThinkPHP对模板文件进行目录划分，默，', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('41', '8', '模板', 'ThinkPHP内置了一个基于XML的性能卓越的模板引擎 ThinkTemplate，这是一个专门为ThinkPHP服务，，ThinkPHP内置了一个基于XML的性能卓越的模板引擎 ThinkTemplate，这是一个专门为ThinkPHP服务，，ThinkPHP内置了一个基于XML的性能卓越的模板引擎 ThinkTemplate，这是一个专门为ThinkPHP服务，，ThinkPHP内置了一个基于XML的性能卓越的模板引擎 ThinkTemplate，这是一个专门为ThinkPHP服务，，ThinkPH', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('42', '9', '调试', 'ThinkPHP有专门为开发过程而设置的调试模式，开启调试模式后，会牺牲一定的执行效率，但带来的方便，，ThinkPHP有专门为开发过程而设置的调试模式，开启调试模式后，会牺牲一定的执行效率，但带来的方便，，ThinkPHP有专门为开发过程而设置的调试模式，开启调试模式后，会牺牲一定的执行效率，但带来的方便，，ThinkPHP有专门为开发过程而设置的调试模式，开启调试模式后，会牺牲一定的执行效率，但带来的方便，，ThinkPHP有专门为开发过程而设置的调试模式，开启调试模式后，会牺牲一定的执行效率，但带来', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('43', '10', '缓存', '在项目中，合理的使用缓存对性能有较大的帮助。ThinkPHP提供了方便的缓存方式，包括数据缓存、静态，，在项目中，合理的使用缓存对性能有较大的帮助。ThinkPHP提供了方便的缓存方式，包括数据缓存、静态，，在项目中，合理的使用缓存对性能有较大的帮助。ThinkPHP提供了方便的缓存方式，包括数据缓存、静态，，在项目中，合理的使用缓存对性能有较大的帮助。ThinkPHP提供了方便的缓存方式，包括数据缓存、静态，，在项目中，合理的使用缓存对性能有较大的帮助。ThinkPHP提供了方便的缓存方式，包括数据缓存', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('45', '11', '安全', '项目开发完成准备部署之前，应该检查下是否存在安全隐患，这一部分内容帮助你一起来加强项目的安，项目开发完成准备部署之前，应该检查下是否存在安全隐患，这一部分内容帮助你一起来加强项目的安，项目开发完成准备部署之前，应该检查下是否存在安全隐患，这一部分内容帮助你一起来加强项目的安，项目开发完成准备部署之前，应该检查下是否存在安全隐患，这一部分内容帮助你一起来加强项目的安项目开发完成准备部署之前，应该检查下是否存在安全隐患，这一部分内容帮助你一起来加强项目的安，项目开发完成准备部署之前，应该检查下是否存在安全隐患', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('46', '12', '扩展', 'hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定，hinkPH', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('47', '13', '部署', '系统内置btpbtp提供了对PATH_INFO的兼容判断处理，但是不能确保在所有的环境下面都可以支持。如果你确认，，系统内置btpbtp提供了对PATH_INFO的兼容判断处理，但是不能确保在所有的环境下面都可以支持。如果你确认hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('48', '14', '专题', '系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成，该函数可以系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成，该函数可以系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成，该函数可以系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session函数完成，该函数可以系统提供了Session管理和操作的完善支持，全部操作可以通过一个内置的session', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('49', '15', '附录', '预定义常量是指系统内置定义好的常量，不会随着环境的变化而变化，系统和应用的路径常量用于系统默认的目录规范，可以通过重新定义改变，如果不希望定制目录，这些常', '2017-12-04 00:00:00', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('50', '2', '在线答题', 'hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定，hinkPH', '2017-12-14 17:21:26', '2017-12-20 17:04:56', '1');
INSERT INTO `zhishi` VALUES ('51', '4', '在线答题', 'hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定，hinkPH', '2017-12-14 17:37:03', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('52', '7', '在线答题', '&lt;p&gt;&amp;nbsp; &amp;nbsp;hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定，hinkPH &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;&lt;/p&gt;', '2017-12-14 17:45:22', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('53', '1', '登录页面', 'hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定。。hinkPHP的类库主要包括公共类库和应用类库，都是基于命名空间进行定义和扩展的。只要按照规范定，hinkPH', '2017-12-15 14:23:43', '2017-12-20 16:00:07', '1');
INSERT INTO `zhishi` VALUES ('54', '1', '登录页面', '123', '2017-12-15 14:34:31', '2017-12-20 16:00:07', '1');
