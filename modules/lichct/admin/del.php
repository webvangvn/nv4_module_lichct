<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$nid = $nv_Request->get_int( 'nid', 'post', 0 );

if ( empty( $nid ) ) die( 'NO_' . $nid );

$query = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE nid=" . $nid;
$result = $db->query( $query );
$numrows = $result->rowcount();
if ( $numrows != 1 ) die( 'NO_' . $nid );
nv_insert_logs( NV_LANG_DATA, $module_name, $lang_module['log_del_notice'], "noticeid  " . $nid, $admin_info['userid'] );
$query = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE nid = " . $nid;
$db->query( $query );
if ( $db->query( $query ) )
{
    nv_del_moduleCache( $module_name );
}
else
{
    die( 'NO_' . $nid );
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo 'OK_' . $nid;
include ( NV_ROOTDIR . "/includes/footer.php" );

