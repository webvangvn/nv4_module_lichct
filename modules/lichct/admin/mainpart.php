<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Dark Emperor (contact@vgtmedia.com.vn)
** @Copyright: VGTMEDIA
** @Craetdate: 14.02.2011
*/
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$page_title = $lang_module['part01'];
$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part ORDER BY id ASC";
$result = $db->query( $sql );
$num = $result->rowcount();
if ( $num > 0 )
{
    $contents .= "<table class=\"tab1\">\n";
    $contents .= "<thead>\n";
    $contents .= "<tr>\n";
    $contents .= "<td align=\"center\">" . $lang_module['part02'] . "</td>\n";
	$contents .= "<td align=\"center\">" . $lang_module['part03'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['part04'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['notice05'] . "</td>\n";
    $contents .= "</tr>\n";
    $contents .= "</thead>\n";
    $a = 0;
    while ( $row =  $result->fetch()  )
    {
		$class = ( $a % 2 ) ? " class=\"second\"" : "";
       	$contents .= "<tbody" . $class . ">\n";
       	$contents .= "<tr>\n";
       	$contents .= "<td width=\"30%\" align=\"center\">" . $row['full_name'] . "</td>\n";
	   	$contents .= "<td width=\"20%\" align=\"center\">" . $row['phone'] . "</td>\n";
       	$contents .= "<td width=\"20%\" align=\"center\">" . $row['email'] . "</td>\n";
       	$contents .= "<td align=\"center\"><span class=\"edit_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=part&amp;id=" . $row['id'] . "\">" . $lang_global['edit'] . "</a></span>\n";
       	$contents .= "&nbsp;-&nbsp;<span class=\"delete_icon\"><a href=\"javascript:void(0);\" onclick=\"nv_del_part(" . $row['id'] . ", '" . md5( $row['id'] . session_id() ) . "')\">" . $lang_global['delete'] . "</a></span></td>\n";
       	$contents .= "</tr>\n";
       	$contents .= "</tbody>\n";
       	$a ++;
    }
	$contents .= "<thead>\n";
    $contents .= "<tr>\n";
    $contents .= "<td colspan=\"4\" align=\"center\"><span class=\"add_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=part\">" . $lang_module['part05'] . "</a></span></td>\n";
    $contents .= "</tr>\n";
    $contents .= "</thead>\n";

    $contents .= "</table>\n";
    include ( NV_ROOTDIR . "/includes/header.php" );
    echo nv_admin_theme( $contents );
    include ( NV_ROOTDIR . "/includes/footer.php" );
} else {
    Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=part" );
    die();
}
