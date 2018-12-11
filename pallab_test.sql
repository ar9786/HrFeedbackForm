-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `wp_department`;
CREATE TABLE `wp_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart_name` varchar(25) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `wp_department` (`id`, `depart_name`, `status`) VALUES
(1,	'HR',	1),
(2,	'PHP',	1),
(3,	'.NET',	1),
(4,	'Sales',	1),
(5,	'Digital Marketing',	1),
(6,	'Data Mining',	1),
(7,	'Data Analytics',	1),
(8,	'QA Testing',	1),
(9,	'Admin',	1),
(10,	'UI/UX',	1),
(11,	'Mobile Application',	1),
(12,	'System Admin',	1),
(13,	'Accounts',	1);

DROP TABLE IF EXISTS `wp_enquiry_form`;
CREATE TABLE `wp_enquiry_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `department` int(11) NOT NULL,
  `recptnst` int(11) NOT NULL,
  `reqtr` int(11) NOT NULL,
  `comm_promt` int(11) NOT NULL,
  `overall_exp_process` int(11) NOT NULL,
  `is_intvw_on_tme` int(11) NOT NULL,
  `intrvwr_prpd` int(11) NOT NULL,
  `how_u_treted` int(11) NOT NULL,
  `job_expltn` int(11) NOT NULL,
  `recmd_friend` int(11) NOT NULL,
  `rec_process` int(11) NOT NULL,
  `crtsy_rsp_interviewr` int(11) NOT NULL,
  `expltn_feedbk` text NOT NULL,
  `mail_time` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `wp_hr_login`;
CREATE TABLE `wp_hr_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `wp_hr_login` (`id`, `username`, `password`, `status`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	1);

-- 2018-11-13 14:08:36
