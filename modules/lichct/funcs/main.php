<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/
if ( ! defined( 'NV_IS_MOD_NOTICE' ) ) die( 'Stop!!!' );

$page_title = $lang_module['notice_title'];
$key_words = $module_info['keywords'];

$sql = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_config";
$result = $db->query( $sql );
while ($row = $result->fetch()) 
{
	$title=$row['title'];
	$notice=$row['notice'];
	$active=$row['active'];
}

$sqla = "SELECT DISTINCT week, begtime,endtime FROM " . NV_PREFIXLANG . "_" . $module_data . " ORDER BY week ASC";
$resulta = $db->query( $sqla );
$list = array();
while ($rowa = $resulta->fetch())
{
    $list[]= $rowa;
}

$sqlb = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE begtime<=".NV_CURRENTTIME." AND endtime >= ".NV_CURRENTTIME." ORDER BY nid ASC LIMIT 0, 1";
$resultb = $db->query( $sqlb );
$datan = array();
while ($rowb = $resultb->fetch())
{
	$idpart=$rowb['idpart'];
	
	$sqlsb = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part WHERE id ='$idpart'";
    $resultsb = $db->query( $sqlsb );
	$rowsb = $resultsb->fetch();
	$part = $rowsb['full_name'];
    $datan[] =array(
	'week'=> $rowb['week'], 'part'=> $part, 'begtime'=> $rowb['begtime'], 'endtime'=> $rowb['endtime'], 'monam'=> $rowb['monam'], 'monpm'=> $rowb['monpm'], 'tueam'=> $rowb['tueam'], 'tuepm'=> $rowb['tuepm'], 'wedam'=> $rowb['wedam'], 'wedpm'=> $rowb['wedpm'], 'thuam'=> $rowb['thuam'], 'thupm'=> $rowb['thupm'], 'friam'=> $rowb['friam'], 'fripm'=> $rowb['fripm'], 'satam'=> $rowb['satam'], 'satpm'=> $rowb['satpm'], 'sunam'=> $rowb['sunam'], 'sunpm'=> $rowb['sunpm']
	);
}
$submit= $nv_Request->get_string( 'keywords', 'post' );
if($submit){
	$keywords=stripslashes(trim($submit));
	$sqlc = "SELECT DISTINCT * FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE (week LIKE '%$keywords') ORDER BY week asc";
	$resultc = $db->query( $sqlc );
	
	$content = array();
	while ($rowc = $resultc->fetch())
	{
		$idpartc=$rowc['idpart'];	
		$sqlsc = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part WHERE id ='$idpartc'";
    	$resultsc = $db->query( $sqlsc );
		$rowsc = $resultsc->fetch();
		$part = $rowsc['full_name'];
    	$content[]=array(
	'week'=> $rowc['week'], 'part'=> $part, 'begtime'=> $rowc['begtime'], 'endtime'=> $rowc['endtime'], 'monam'=> $rowc['monam'], 'monpm'=> $rowc['monpm'], 'tueam'=> $rowc['tueam'], 'tuepm'=> $rowc['tuepm'], 'wedam'=> $rowc['wedam'], 'wedpm'=> $rowc['wedpm'], 'thuam'=> $rowc['thuam'], 'thupm'=> $rowc['thupm'], 'friam'=> $rowc['friam'], 'fripm'=> $rowc['fripm'], 'satam'=> $rowc['satam'], 'satpm'=> $rowc['satpm'], 'sunam'=> $rowc['sunam'], 'sunpm'=> $rowc['sunpm']
	);		
	}
	$contents = viewmain( $list,$title,$active,$notice,$content,$submit);
} else {
	$contents = theme_main($list,$title,$active,$notice,$datan);
}
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
