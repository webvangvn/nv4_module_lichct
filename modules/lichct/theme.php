<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/
if ( ! defined( 'NV_IS_MOD_NOTICE' ) ) die( 'Stop!!!' );

function theme_main( $list,$title,$active,$notice,$datan)
{
	global $global_config, $lang_module, $module_info, $module_name, $module_file, $lang_global;
    $xtpl = new XTemplate( "main_page.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/".$module_name."/" );
    $xtpl->assign( 'LANG', $lang_module );
	if ( ! empty( $list) )
    {
       foreach ( $list as $tuan){
		   $xtpl->assign( 'TUAN', $tuan['week']);
		   $xtpl->assign( 'BEGTIME', nv_date("d.m.Y",$tuan['begtime']));
		   $xtpl->assign( 'ENDTIME', nv_date("d.m.Y",$tuan['endtime']));
		   $xtpl->parse('main.block_table.loop_ds');
       }
    }
	if ( ! empty( $datan) )
	{
		foreach ( $datan as $rows)
		{
			$xtpl->assign('WEEK', $rows['week']);
			$xtpl->assign('PART', $rows['part']);
			//print_r($rows['part']); exit();
			$xtpl->assign( 'BEGTIME', nv_date("d.m.Y",$rows['begtime']));
			$xtpl->assign( 'ENDTIME', nv_date("d.m.Y",$rows['endtime']));
			$xtpl->assign('MONAM', $rows['monam']);
			$xtpl->assign('MONPM', $rows['monpm']);
			$xtpl->assign('TUEAM', $rows['tueam']);
			$xtpl->assign('TUEPM', $rows['tuepm']);
			$xtpl->assign('WEDAM', $rows['wedam']);
			$xtpl->assign('WEDPM', $rows['wedpm']);
			$xtpl->assign('THUAM', $rows['thuam']);
			$xtpl->assign('THUPM', $rows['thupm']);
			$xtpl->assign('FRIAM', $rows['friam']);
			$xtpl->assign('FRIPM', $rows['fripm']);
			$xtpl->assign('SATAM', $rows['satam']);
			$xtpl->assign('SATPM', $rows['satpm']);
			$xtpl->assign('SUNAM', $rows['sunam']);
			$xtpl->assign('SUNPM', $rows['sunpm']);
		}
		$xtpl->parse('main.block_table.begin');
	}
	$xtpl->parse('main.block_table');
	if ($active == '1') {
		$xtpl->assign( 'TITLE', $title );
		$xtpl->assign( 'NOTICE', $notice );
		$xtpl->parse('main.notice');
	}
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

function viewmain ( $list,$title,$active,$notice,$content,$submit)
{
	global $global_config, $lang_module, $module_info, $module_name, $publ_time, $exp_time;
    $xtpl = new XTemplate( "main_page.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/".$module_name."/" );
    $xtpl->assign( 'LANG', $lang_module );
	$xtpl->assign( 'WEEKS', $submit);
    if ( ! empty( $list) )
    {
		foreach ( $list as $tuan)
		{
			$xtpl->assign( 'TUAN', $tuan['week']);
	   		$xtpl->assign( 'BEGTIME', nv_date("d.m.Y",$tuan['begtime']));
	   		$xtpl->assign( 'ENDTIME', nv_date("d.m.Y",$tuan['endtime']));
       		$xtpl->parse('main.block_table.loop_ds');
		}
	}
    if ( ! empty( $content) )
	{
		foreach ( $content as $rows)
		{
			$xtpl->assign('WEEK', $rows['week']);
			$xtpl->assign('PART', $rows['part']);
			$xtpl->assign( 'BEGTIME', nv_date("d.m.Y",$rows['begtime']));
			$xtpl->assign( 'ENDTIME', nv_date("d.m.Y",$rows['endtime']));
			$xtpl->assign('MONAM', $rows['monam']);
			$xtpl->assign('MONPM', $rows['monpm']);
			$xtpl->assign('TUEAM', $rows['tueam']);
			$xtpl->assign('TUEPM', $rows['tuepm']);
			$xtpl->assign('WEDAM', $rows['wedam']);
			$xtpl->assign('WEDPM', $rows['wedpm']);
			$xtpl->assign('THUAM', $rows['thuam']);
			$xtpl->assign('THUPM', $rows['thupm']);
			$xtpl->assign('FRIAM', $rows['friam']);
			$xtpl->assign('FRIPM', $rows['fripm']);
			$xtpl->assign('SATAM', $rows['satam']);
			$xtpl->assign('SATPM', $rows['satpm']);
			$xtpl->assign('SUNAM', $rows['sunam']);
			$xtpl->assign('SUNPM', $rows['sunpm']);
			$xtpl->parse('main.block_table.begin');
		}
	}
	$xtpl->parse('main.block_table');
	if ($active == '1') {
		$xtpl->assign( 'TITLE', $title );
		$xtpl->assign( 'NOTICE', $notice );
		$xtpl->parse('main.notice');
	}
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}
