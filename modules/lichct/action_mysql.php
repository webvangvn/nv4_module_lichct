<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . ";";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config;";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_part;";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
  nid INT(4) NOT NULL auto_increment,
  idpart varchar(255) NOT NULL,
  week varchar(255) NOT NULL DEFAULT '',
  begtime INT(11) NOT NULL DEFAULT '0',
  endtime INT(11) NOT NULL DEFAULT '0',
  monam mediumtext NULL,
  monpm mediumtext NULL,
  tueam mediumtext NULL,
  tuepm mediumtext NULL,
  wedam mediumtext NULL,
  wedpm mediumtext NULL,
  thuam mediumtext NULL,
  thupm mediumtext NULL,
  friam mediumtext NULL,
  fripm mediumtext NULL,
  satam mediumtext NULL,
  satpm mediumtext NULL,  
  sunam mediumtext NULL,
  sunpm mediumtext NULL,
  PRIMARY KEY  (nid)
) ENGINE=MyISAM";
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_config (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(255) NOT NULL DEFAULT '',
  notice mediumtext NULL,
  active tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM";
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_part (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  full_name varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  email varchar(100) NOT NULL,
  note mediumtext NOT NULL,
  weight smallint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  UNIQUE KEY full_name (full_name)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . " (nid, idpart, week, begtime, endtime, monam, monpm, tueam, tuepm, wedam, wedpm, thuam, thupm, friam, fripm, satam, satpm, sunam, sunpm) VALUES 
(NULL, '1', '1', '1297011600', '1297616399', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Làm bình thường', 'Nghỉ', 'Nghỉ')";
 
$sql_create_module[] = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_part (id,full_name,phone,email,note, weight) VALUES 
(NULL, 'BGH','0363.840. 035', 'hoang.nguyen@webvang.vn','','1')";
$sql_create_module[] = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_config (id,title,notice,active) VALUES 
(1, '','', 0)";
