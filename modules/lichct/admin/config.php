<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
if ( defined( 'NV_EDITOR' ) )
{
	require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}

$page_title = $lang_module['notice07'];
$error = "";

$row = $db->query( "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_config " )->fetch();
$save = $nv_Request->get_int( 'save', 'post', 0 );
if ( ! empty( $save) )
{
	$row['title'] = $nv_Request->get_string( 'title', 'post', '', 1 );
	$notice = $nv_Request->get_string( 'notice', 'post', '' );
	$row['notice'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $notice, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $notice ) ), '<br />' );
	$row['active'] = $nv_Request->get_string( 'active', 'post', '', 1 );
	$query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_config SET
		title='" . $row['title']  . "', 
        notice='" .  $row['notice']  . "',
		active='" .  $row['active']  . "' WHERE id='1'";
    $db->query( $query );
	Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "" );
	die();
}
$contents = "";
if ( $error != "" )
{
    $contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
    $contents .= "<blockquote class=\"error\"><span>" . $error . "</span></blockquote>\n";
    $contents .= "</div>\n";
    $contents .= "<div class=\"clear\"></div>\n";
}
$contents .= "<form action=\"\" enctype=\"multipart/form-data\" method=\"post\">";
$contents .= "<input type=\"hidden\" name =\"" . NV_NAME_VARIABLE . "\"value=\"" . $module_name . "\" />";
$contents .= "<input type=\"hidden\" name =\"" . NV_OP_VARIABLE . "\"value=\"" . $op . "\" />";
$contents .= "<input type=\"hidden\" value=\"1\" name=\"save\">\n";
$contents .= "<table class=\"tab1\" id=\"items\">\n";
$contents .= "<tbody>\n";
$contents .= "<tr>\n";
$contents .= "<td >" . $lang_module['notice24'] . "</td>\n";
$contents .= "<td><input type=\"text\" name=\"title\" size=\"105\" value=\"" . $row['title'] . "\"></td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$contents .= "<tbody>\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice25'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
    $contents .= nv_aleditor( 'notice', '740px', '100px', $row['notice'] );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"notice\" id=\"notice\" cols=\"20\" rows=\"5\">" . $row['notice'] . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$contents .= "<tbody>\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice26'] . "</td>\n";
$contents .= "<td>\n";
$contents .= "<select name=\"active\">\n";
$array = array(
	$lang_module ['noactive'], $lang_module ['active'] 
);
foreach ( $array as $key => $val )
{
	$contents .= "<option value=\"" . $key . "\"" . ( $key == $row ['active'] ? " selected=\"selected\"" : "" ) . ">" . $val . "</option>\n";
}
$contents .= "</select>\n";
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$contents .= "</table>\n";
$contents .= "<br><div style=\"text-align:center\"><input type=\"submit\" name=\"submit\" value=\"" . $lang_module['notice_confirm'] . "\"></div>\n";
$contents .= "</form>\n";

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
