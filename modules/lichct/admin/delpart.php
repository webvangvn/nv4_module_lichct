<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id = $nv_Request->get_int( 'id', 'post,get', 0 );

if ( empty( $id ) ) die( 'NO_' . $id );

$query = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part WHERE id=" . $id;
$result = $db->query( $query );
$numrows = $result->rowcount();
if ( $numrows != 1 ) die( 'NO_' . $id );
nv_insert_logs( NV_LANG_DATA, $module_name, $lang_module['log_del_notice'], "noticeid  " . $id, $admin_info['userid'] );
$query = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "_part WHERE id = " . $id;
$querys = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE idpart = " . $id;
if ( $db->query( $query ) )
{
    nv_del_moduleCache( $module_name );
}
else
{
    die( 'NO_' . $id );
}

include ( NV_ROOTDIR . "/includes/header.php" );
echo 'OK_' . $id;
include ( NV_ROOTDIR . "/includes/footer.php" );
