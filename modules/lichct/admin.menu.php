<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) die('Stop!!!');
$submenu['mainpart'] = $lang_module['part01'];
$submenu['config'] = $lang_module['notice07'];

$allow_func = array('main', 'notice', 'del','config','part','mainpart','delpart');