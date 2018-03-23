/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : paper_approving

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 03/23/2018 14:54:03 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `paper_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `paper_attachment`;
CREATE TABLE `paper_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `record_id` int(10) unsigned DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `savename` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `size` bigint(20) unsigned DEFAULT NULL,
  `savepath` varchar(255) DEFAULT NULL,
  `sha1` varchar(255) DEFAULT NULL,
  `md5` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_attachment`
-- ----------------------------
BEGIN;
INSERT INTO `paper_attachment` VALUES ('1', '0', '10080_郭XX_083003_201821803004_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('2', '1', '10080_郭XX_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('3', '1', '10080_郭XX_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('4', '1', '10080_郭XX_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('5', '1', '10080_郭某某_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('6', '1', '10080_郭某某_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('7', '1', '10080_郭某某_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf'), ('8', '1', '10080_郭某某_083003_201821803003_LW.pdf', '5ab374b0f1132.pdf', 'application/pdf', '229186', '/file/20180322/', 'dc0978d7d4fb9b84426286406091c973aa43bff9', 'bc1fdc7965138e76ccbbbebd6024ec23', 'pdf');
COMMIT;

-- ----------------------------
--  Table structure for `paper_cycle`
-- ----------------------------
DROP TABLE IF EXISTS `paper_cycle`;
CREATE TABLE `paper_cycle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT '' COMMENT '名称',
  `starttime` date DEFAULT '0000-00-00' COMMENT '开始时间',
  `endtime` date DEFAULT '0000-00-00' COMMENT '结束时间',
  `is_freezed` tinyint(3) unsigned DEFAULT 0 COMMENT '是否被冻结。1为被冻结。',
  `is_current` tinyint(3) unsigned DEFAULT NULL COMMENT '1:是当前统计周期.2否。',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `paper_cycle`
-- ----------------------------
BEGIN;
INSERT INTO `paper_cycle` VALUES ('1', '2015学年', '1900-12-30', '1900-12-01', '0', '0'), ('2', '2016学年', '2018-03-22', '2018-06-09', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `paper_expert`
-- ----------------------------
DROP TABLE IF EXISTS `paper_expert`;
CREATE TABLE `paper_expert` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(40) DEFAULT NULL,
  `userpassword` char(50) DEFAULT NULL,
  `cycle_id` char(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_title` char(6) DEFAULT NULL,
  `tutor_class` char(6) DEFAULT NULL,
  `is_normal` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `specialty` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `paper_id` int(11) unsigned DEFAULT 0,
  `student_id` int(11) unsigned DEFAULT 0,
  `is_reviewed` char(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_expert`
-- ----------------------------
BEGIN;
INSERT INTO `paper_expert` VALUES ('9', 'mbwxyc', '111111', '2', '123', '0', '0', '1', '123213@sdf.com', '13011111111', '', '', '222', '', '0', '24', '0'), ('10', 'oszyvf', '0a1j', '2', null, null, null, null, null, null, null, null, null, null, '0', '24', '0'), ('11', 'gufqhq', '3g86', '2', null, null, null, null, null, null, null, null, null, null, '0', '25', '0'), ('12', 'xwohvo', 'zehq', '2', null, null, null, null, null, null, null, null, null, null, '0', '25', '0'), ('13', 'hlxzyr', '111111', '2', '13123', '0', '0', '1', '123213@sdf.com', '', '', '', '11', '', '0', '26', '1'), ('14', 'poqtux', 'yk9y', '2', null, null, null, null, null, null, null, null, null, null, '0', '26', '0');
COMMIT;

-- ----------------------------
--  Table structure for `paper_menu`
-- ----------------------------
DROP TABLE IF EXISTS `paper_menu`;
CREATE TABLE `paper_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `title` varchar(40) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT '菜单标题名',
  `subhead` varchar(40) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT '菜单副标题名',
  `parent_id` int(10) DEFAULT 0 COMMENT '上级菜单id',
  `icon` varchar(40) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT '小图标',
  `module` varchar(40) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT '模块名',
  `controller` varchar(40) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT '控制层名',
  `action` varchar(40) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT '方法名',
  `parameter` varchar(60) DEFAULT '''''' COMMENT '参数',
  `url` varchar(200) CHARACTER SET utf8 DEFAULT 'NULL' COMMENT 'url',
  `order` int(10) DEFAULT 1 COMMENT '排序',
  `state` tinyint(10) DEFAULT 1 COMMENT '状态，0表示禁用，1表示启用',
  `show` tinyint(10) DEFAULT 1 COMMENT '是否显示，0表示隐藏，1表示显示 默认为1',
  `development` tinyint(10) DEFAULT 0 COMMENT '是否开放模式，1代表开放模式 默认为0',
  `remarks` varchar(40) CHARACTER SET utf8 DEFAULT '''无''' COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `paper_menu`
-- ----------------------------
BEGIN;
INSERT INTO `paper_menu` VALUES ('164', '首页', '', '0', 'fa fa-dashboard ', 'Admin', 'Index', 'home', '', 'Admin/Index/index', '101', '1', '1', '0', ''), ('267', '添加', '', '272', '', 'Admin', 'Menu', 'add', '\'\'', 'Admin/Menu/add', '1', '1', '0', '1', ''), ('268', '保存', '', '272', 'NULL', 'Admin', 'Menu', 'save', '\'\'', 'Admin/Menu/save', '1', '1', '0', '1', ''), ('272', '菜单管理', '', '0', '', 'Admin', 'Menu', 'index', '', 'Admin/Menu/index', '0', '1', '1', '1', ''), ('273', '编辑', '', '272', '', 'Admin', 'Menu', 'edit', '', 'Admin/Menu/edit', '0', '1', '0', '1', ''), ('274', '周期管理', '', '0', 'glyphicon glyphicon-refresh', 'Admin', 'Cycle', 'index', '', 'Admin/Cycle/index', '30', '1', '1', '0', ''), ('275', '编辑', '', '274', '', 'Admin', 'Cycle', 'edit', '', 'Admin/Cycle/edit', '0', '1', '0', '0', ''), ('276', '保存', '', '274', '', 'Admin', 'Cycle', 'save', '', 'Admin/Cycle/save', '0', '1', '0', '0', ''), ('277', '学生管理', '', '0', 'glyphicon glyphicon-education', 'Admin', 'Student', 'index', '', 'Admin/Student/index', '90', '1', '1', '0', ''), ('278', '编辑', '', '277', '', 'Admin', 'Student', 'edit', '', 'Admin/Student/edit', '0', '1', '0', '0', ''), ('279', '保存', '', '277', '', 'Admin', 'Student', 'save', '', 'Admin/Student/save', '0', '1', '0', '0', ''), ('280', '论文管理', '', '0', 'glyphicon glyphicon-list-alt', 'Admin', 'Paper', 'index', '', 'Admin/Paper/index', '100', '1', '1', '0', ''), ('281', '下载', '', '280', '', 'Admin', 'Review', 'downLoadTable', '', 'Admin/Review/downLoadTable', '0', '1', '0', '0', ''), ('282', '生成用户名', '', '280', '', 'Admin', 'Paper', 'createUserName', '', 'Admin/Paper/createUserName', '0', '1', '0', '0', ''), ('283', '用户管理', '', '0', 'fa fa-group', 'Admin', 'User', 'index', '', 'Admin/User/index', '20', '1', '1', '0', ''), ('284', '编辑', '', '283', '', 'Admin', 'User', 'edit', '', 'Admin/User/edit', '0', '1', '0', '0', ''), ('285', '保存', '', '283', '', 'Admin', 'User', 'save', '', 'Admin/User/save', '0', '1', '0', '0', ''), ('286', '批量下载评阅表', '', '280', '', 'Admin', 'Review', 'downLoadZip', '', 'Admin/Review/downLoadZip', '0', '1', '0', '0', ''), ('287', '下载评阅统计表', '', '280', '', 'Admin', 'Review', 'downloadExcel', '', 'Admin/Review/downloadExcel', '0', '1', '0', '0', ''), ('288', '导出用户名', '', '280', '', 'Admin', 'Paper', 'exportUserName', '', 'Admin/Paper/exportUserName', '0', '1', '0', '0', ''), ('290', '个人中心', '', '0', 'glyphicon glyphicon-user', 'Admin', 'PersonalCenter', 'edit', '', 'Admin/PersonalCenter/edit', '0', '1', '1', '0', ''), ('291', '删除', '', '272', '', 'Admin', 'Menu', 'delete', '', 'Admin/Menu/delete', '0', '1', '0', '0', ''), ('292', '保存', '', '290', '', 'Admin', 'PersonalCenter', 'save', '', 'Admin/PersonalCenter/save', '0', '1', '0', '0', ''), ('293', '删除', '', '277', '', 'Admin', 'Student', 'delete', '', 'Admin/Student/delete', '0', '1', '0', '0', ''), ('294', '评阅设置', '', '0', '', 'Admin', 'Review', 'index', '', 'Admin/Review/index', '0', '1', '1', '0', ''), ('295', '上传学生信息', '', '277', '', 'Admin', 'Student', 'uploadStudents', '', 'Admin/Student/uploadStudents', '0', '1', '0', '0', ''), ('296', '详情', '', '280', '', 'Admin', 'Paper', 'detail', '', 'Admin/Paper/detail', '0', '1', '0', '0', ''), ('297', '自动匹配', '', '280', '', 'Admin', 'Paper', 'matchAjax', '', 'Admin/Paper/matchAjax', '0', '1', '0', '0', '');
COMMIT;

-- ----------------------------
--  Table structure for `paper_review`
-- ----------------------------
DROP TABLE IF EXISTS `paper_review`;
CREATE TABLE `paper_review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `factor` varchar(255) DEFAULT NULL,
  `proportion` tinyint(4) DEFAULT 0,
  `detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_review`
-- ----------------------------
BEGIN;
INSERT INTO `paper_review` VALUES ('1', '论文选题', '与本学科背景联系程度，选题的前沿性、实用价值或学术价值；理论\n深度或技术难度。 ', '12', 'xx'), ('2', '文献综述', '综述全面性；对本论文研究领域国内外学术动态的掌握；研究方向和\n研究问题的明确性；总结归纳是否客观、准确。 ', '13', 'xx'), ('3', '理论基础', '掌握本学科领域理论基础和专业知识的程度，理论分析和运用能力。 ', '14', 'x'), ('4', '科研能力', '研究方法、实验或项目设计水平；技术手段或理念的新颖性和先进性\n，逻辑严密性；独自从事科学研究的能力。 ', '15', 'x'), ('5', '创新性', '是否在所研究的问题上有新的见解、改进或创新；', '14', 'x'), ('6', '研究成果', '成果的理论意义或对解决自然科学、人文、经济、社会科学中存在问\n题的应用价值或推动作用；论文工作量。 ', '15', 'x'), ('7', '写作能力', '条理性，层次性，表述准确性，文风文笔，写作规范。', '16', 'x');
COMMIT;

-- ----------------------------
--  Table structure for `paper_review_detail`
-- ----------------------------
DROP TABLE IF EXISTS `paper_review_detail`;
CREATE TABLE `paper_review_detail` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `expert_id` int(11) unsigned DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `score` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_review_detail`
-- ----------------------------
BEGIN;
INSERT INTO `paper_review_detail` VALUES ('1', '1', '1', '0'), ('2', '1', '2', '0'), ('3', '1', '3', '0'), ('4', '1', '4', '0'), ('5', '1', '5', '0'), ('6', '1', '6', '0'), ('7', '1', '7', '0'), ('64', '13', '1', '100'), ('65', '13', '2', '12'), ('66', '13', '3', '12'), ('67', '13', '4', '32'), ('68', '13', '5', '23'), ('69', '13', '6', '90'), ('70', '13', '7', '80');
COMMIT;

-- ----------------------------
--  Table structure for `paper_review_detail_other`
-- ----------------------------
DROP TABLE IF EXISTS `paper_review_detail_other`;
CREATE TABLE `paper_review_detail_other` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `expert_id` int(10) unsigned DEFAULT 0,
  `excellent` char(10) DEFAULT NULL,
  `defense` char(10) DEFAULT NULL,
  `familiar` char(10) DEFAULT NULL,
  `suggestion` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_review_detail_other`
-- ----------------------------
BEGIN;
INSERT INTO `paper_review_detail_other` VALUES ('1', '0', null, null, null, null), ('2', '13', '0', '0', '0', '13123123');
COMMIT;

-- ----------------------------
--  Table structure for `paper_student`
-- ----------------------------
DROP TABLE IF EXISTS `paper_student`;
CREATE TABLE `paper_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_no` char(40) DEFAULT '',
  `name` varchar(255) DEFAULT NULL,
  `admission_date` varchar(255) DEFAULT NULL,
  `subject_major` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `research_direction` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `innovation_point` text DEFAULT NULL,
  `cycle_id` int(10) unsigned DEFAULT NULL,
  `attachment_id` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_student`
-- ----------------------------
BEGIN;
INSERT INTO `paper_student` VALUES ('24', '083001', '张三', '2014年2月', '高分子材料', '专硕', '公开', '高分子材料研究方向', 'Inconel601H镍基合金焊缝化学法晶粒细化的研究', '这里写创新点', '2', '0'), ('25', '083002', '李四', '2014年3月', '高分子材料', '学硕', '内部保存', 'PHP框架', '基本PHP的微型框架研究', '将微型框架应用于教学当中', '2', '0'), ('26', '201821803003', '王五', '2014年4月', '高分子材料', '博士', '内部保存', '权限控制', '基于角色的权限控制模块研究与实现', '将角色控制与THINKPHP，BOOTSTRPE完全融合', '2', '8');
COMMIT;

-- ----------------------------
--  Table structure for `paper_user`
-- ----------------------------
DROP TABLE IF EXISTS `paper_user`;
CREATE TABLE `paper_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL DEFAULT 'NULL',
  `name` varchar(100) NOT NULL DEFAULT '',
  `phonenumber` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_user`
-- ----------------------------
BEGIN;
INSERT INTO `paper_user` VALUES ('1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '123123', '123123', '123@123.com');
COMMIT;

-- ----------------------------
--  View structure for `paper_expert_view`
-- ----------------------------
DROP VIEW IF EXISTS `paper_expert_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paper_expert_view` AS select `paper_expert`.`id` AS `id`,`paper_expert`.`username` AS `username`,`paper_expert`.`userpassword` AS `userpassword`,`paper_expert`.`cycle_id` AS `cycle_id`,`paper_expert`.`name` AS `name`,`paper_expert`.`job_title` AS `job_title`,`paper_expert`.`tutor_class` AS `tutor_class`,`paper_expert`.`is_normal` AS `is_normal`,`paper_expert`.`email` AS `email`,`paper_expert`.`phone` AS `phone`,`paper_expert`.`specialty` AS `specialty`,`paper_expert`.`subject` AS `subject`,`paper_expert`.`school` AS `school`,`paper_expert`.`address` AS `address`,`paper_expert`.`student_id` AS `student_id`,`paper_student`.`type` AS `type`,`paper_student`.`title` AS `title`,`paper_student`.`innovation_point` AS `innovation_point`,`paper_student`.`attachment_id` AS `attachment_id`,`paper_attachment`.`savepath` AS `attachment__savepath`,`paper_attachment`.`savename` AS `attachment__savename`,`paper_student`.`name` AS `student__name`,`paper_student`.`student_no` AS `student_no`,`paper_student`.`admission_date` AS `admission_date`,`paper_student`.`subject_major` AS `subject_major`,`paper_student`.`research_direction` AS `research_direction`,`paper_student`.`secret` AS `secret` from ((`paper_expert` left join `paper_student` on(`paper_expert`.`student_id` = `paper_student`.`id`)) left join `paper_attachment` on(`paper_student`.`attachment_id` = `paper_attachment`.`id`));

-- ----------------------------
--  View structure for `paper_review_detail_view`
-- ----------------------------
DROP VIEW IF EXISTS `paper_review_detail_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paper_review_detail_view` AS select `paper_review_detail`.`id` AS `id`,`paper_review_detail`.`expert_id` AS `expert_id`,`paper_review_detail`.`review_id` AS `review_id`,`paper_review_detail`.`score` AS `score`,`paper_review`.`title` AS `title`,`paper_review`.`factor` AS `factor`,`paper_review`.`proportion` AS `proportion`,`paper_review`.`detail` AS `detail`,`paper_review`.`id` AS `review__id` from (`paper_review_detail` left join `paper_review` on(`paper_review_detail`.`review_id` = `paper_review`.`id`));

-- ----------------------------
--  View structure for `paper_student_view`
-- ----------------------------
DROP VIEW IF EXISTS `paper_student_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paper_student_view` AS select `paper_student`.`id` AS `id`,`paper_student`.`name` AS `name`,`paper_student`.`student_no` AS `student_no`,`paper_student`.`admission_date` AS `admission_date`,`paper_student`.`subject_major` AS `subject_major`,`paper_student`.`type` AS `type`,`paper_student`.`secret` AS `secret`,`paper_student`.`research_direction` AS `research_direction`,`paper_student`.`title` AS `title`,`paper_student`.`innovation_point` AS `innovation_point`,`paper_student`.`cycle_id` AS `cycle_id`,`paper_student`.`attachment_id` AS `attachment_id`,`paper_attachment`.`savename` AS `savename`,`paper_attachment`.`savepath` AS `savepath` from (`paper_student` left join `paper_attachment` on(`paper_student`.`attachment_id` = `paper_attachment`.`id`));

SET FOREIGN_KEY_CHECKS = 1;
