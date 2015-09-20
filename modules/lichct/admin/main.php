<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/

if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$page_title = $lang_module['notice01'];
$page = $nv_Request->get_int( 'page', 'get', 0 );
$per_page = 5;
$base_url = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main";
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM " . NV_PREFIXLANG . "_" . $module_data . " ORDER BY nid DESC LIMIT ".$page.", ". $per_page ."";
$result = $db->query( $sql );

$numf = $db->query( "SELECT count(*) FROM "  . NV_PREFIXLANG . "_" . $module_data . " ORDER BY nid DESC" )->fetchColumn();
//$numf  =  $result_all->rowcount();
$all_page = ( $numf ) ? $numf : 1;
$num = $result->rowcount();

if ( $num > 0 )
{
    $contents .= "<table class=\"tab1\">\n";
    $contents .= "<thead>\n";
    $contents .= "<tr>\n";
    $contents .= "<td align=\"center\">" . $lang_module['notice02'] . "</td>\n";
	$contents .= "<td align=\"center\">" . $lang_module['part01'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['notice03'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['notice04'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['notice05'] . "</td>\n";
    $contents .= "</tr>\n";
    $contents .= "</thead>\n";
    $a = 0;
    while ( $row =  $result->fetch() )
    {
		$class = ( $a % 2 ) ? " class=\"second\"" : "";
       	$contents .= "<tbody" . $class . ">\n";
       	$contents .= "<tr>\n";
       	$contents .= "<td width=\"10%\" align=\"center\">" . $row['week'] . "</td>\n";
	   	$idpart=$row['idpart'];
		$sqls = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part WHERE id ='$idpart'";
    	$results = $db->query( $sqls );
		while ($rows =  $results->fetch())
		{
			$contents .= "<td width=\"30%\" align=\"center\">" . $rows['full_name'] . "</td>\n";		
		}
	   	
       	$contents .= "<td width=\"20%\" align=\"center\">" . nv_date("d/m/Y", $row['begtime']) . "</td>\n";
       	$contents .= "<td width=\"20%\" align=\"center\">" . nv_date("d/m/Y",$row['endtime']) . "</td>\n";
       	$contents .= "<td align=\"center\"><span class=\"edit_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=notice&amp;nid=" . $row['nid'] . "\">" . $lang_global['edit'] . "</a></span>\n";
       	$contents .= "&nbsp;-&nbsp;<span class=\"delete_icon\"><a href=\"javascript:void(0);\" onclick=\"nv_del_content(" . $row['nid'] . ", '" . md5( $row['nid'] . session_id() ) . "')\">" . $lang_global['delete'] . "</a></span></td>\n";
       	$contents .= "</tr>\n";
       	$contents .= "</tbody>\n";
       	$a ++;
    }
	
	$generate_page = nv_generate_page( $base_url, $all_page, $per_page, $page );
	$contents .= "<thead>\n";
    $contents .= "<tr class=\"tfoot_box\">\n";
    $contents .= "<td colspan=\"2\" align=\"center\">" . $generate_page . "</td>\n";
    $contents .= "<td colspan=\"3\" align=\"center\"><span class=\"add_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=notice\">" . $lang_module['notice06'] . "</a></span></td>\n";
    $contents .= "</tr>\n";
    $contents .= "</thead>\n";
    $contents .= "</table>\n";
    include ( NV_ROOTDIR . "/includes/header.php" );
    echo nv_admin_theme( $contents );
    include ( NV_ROOTDIR . "/includes/footer.php" );
} else {
    Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=notice" );
    die();
}
