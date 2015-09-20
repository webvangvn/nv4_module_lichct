<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Dark Emperor (contact@vgtmedia.com.vn)
** @Copyright: VGTMEDIA
** @Craetdate: 14.02.2011
*/
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$nid = $nv_Request->get_int( 'nid', 'post,get', 0 );
if ( $nid )
{
    $query = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE nid=" . $nid;
    $result = $db->query( $query );
    $numrows = $result->rowcount();
    if ( empty( $numrows ) )
    {
        Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name );
        die();
    }
    $row = $result->fetch();
    define( 'IS_EDIT', true );
    $page_title = $lang_module ['notice08'];
    $action = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op . "&amp;nid=" . $nid;
}
else
{
    $page_title = $lang_module ['notice06'];
    $action = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op;
}

$error = "";
if ( defined( 'NV_EDITOR' ) )
{
    require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    $idpart = $nv_Request->get_string( 'idpart', 'post', '', 1 );
	$week = $nv_Request->get_string( 'week', 'post', '', 1 );
    $begtime = $nv_Request->get_string( 'begtime', 'post', '', 1 );
	unset($m);
	if (preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/",$begtime,$m))
	{
		$begtime = mktime( 0, 0, 0, $m[2], $m[1], $m[3]);
	} else {
		$begtime = "";
	}
    $endtime = $nv_Request->get_string( 'endtime', 'post', '', 1 );
	unset($m);
	if (preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/",$endtime,$m))
	{
		$endtime = mktime(23, 59, 59, $m[2], $m[1], $m[3]);
	} else {
		$endtime = "";
	}
    $monam = $nv_Request->get_string( 'monam', 'post', '' );
    $monam = defined( 'NV_EDITOR' ) ? nv_nl2br( $monam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $monam ) ), '<br />' );
    $monpm = $nv_Request->get_string( 'monpm', 'post', '' );
    $monpm = defined( 'NV_EDITOR' ) ? nv_nl2br( $monpm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $monpm ) ), '<br />' );
    $tueam = $nv_Request->get_string( 'tueam', 'post', '' );
    $tueam = defined( 'NV_EDITOR' ) ? nv_nl2br( $tueam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $tueam ) ), '<br />' );
    $tuepm = $nv_Request->get_string( 'tuepm', 'post', '' );
    $tuepm = defined( 'NV_EDITOR' ) ? nv_nl2br( $tuepm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $tuepm ) ), '<br />' );
    $wedam = $nv_Request->get_string( 'wedam', 'post', '' );
    $wedam = defined( 'NV_EDITOR' ) ? nv_nl2br( $wedam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $wedam ) ), '<br />' );
    $wedpm = $nv_Request->get_string( 'wedpm', 'post', '' );
    $wedpm = defined( 'NV_EDITOR' ) ? nv_nl2br( $wedpm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $wedpm ) ), '<br />' );
    $thuam = $nv_Request->get_string( 'thuam', 'post', '' );
    $thuam = defined( 'NV_EDITOR' ) ? nv_nl2br( $thuam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $thuam ) ), '<br />' );
    $thupm = $nv_Request->get_string( 'thupm', 'post', '' );
    $thupm = defined( 'NV_EDITOR' ) ? nv_nl2br( $thupm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $thupm ) ), '<br />' );
    $friam = $nv_Request->get_string( 'friam', 'post', '' );
    $friam = defined( 'NV_EDITOR' ) ? nv_nl2br( $friam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $friam ) ), '<br />' );
    $fripm = $nv_Request->get_string( 'fripm', 'post', '' );
    $fripm = defined( 'NV_EDITOR' ) ? nv_nl2br( $fripm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $fripm ) ), '<br />' );
    $satam = $nv_Request->get_string( 'satam', 'post', '' );
    $satam = defined( 'NV_EDITOR' ) ? nv_nl2br( $satam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $satam ) ), '<br />' );
    $satpm = $nv_Request->get_string( 'satpm', 'post', '' );
    $satpm = defined( 'NV_EDITOR' ) ? nv_nl2br( $satpm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $satpm ) ), '<br />' );
    $sunam = $nv_Request->get_string( 'sunam', 'post', '' );
    $sunam = defined( 'NV_EDITOR' ) ? nv_nl2br( $sunam, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $sunam ) ), '<br />' );
    $sunpm = $nv_Request->get_string( 'sunpm', 'post', '' );
    $sunpm = defined( 'NV_EDITOR' ) ? nv_nl2br( $sunpm, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $sunpm ) ), '<br />' );
    
    if ( empty( $week ) )
    {
        $error = $lang_module['error_week'];
    } else {
        if ( defined( 'IS_EDIT' ) )
        {
			$query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . " SET 
				idpart='" .  $idpart. "',
				week='" .  $week. "',
				begtime='" .  $begtime. "', 
                endtime='" .  $endtime. "', 
                monam='" .  $monam. "', 
                monpm='" .  $monpm. "', 
                tueam='" .  $tueam. "', 
                tuepm='" .  $tuepm. "', 
                wedam='" .  $wedam. "', 
                wedpm='" .  $wedpm. "', 
                thuam='" .  $thuam. "', 
                thupm='" .  $thupm. "', 
                friam='" .  $friam. "', 
                fripm='" .  $fripm. "', 
                satam='" .  $satam. "', 
                satpm='" .  $satpm. "', 
                sunam='" .  $sunam. "', 
                sunpm='" .  $sunpm. "' 
			WHERE nid ='" . $nid."'";
        } else {
            $query = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . " (nid, idpart, week,begtime, endtime, monam, monpm, tueam,tuepm, wedam,wedpm, thuam,thupm, friam,fripm, satam,satpm, sunam,sunpm) VALUES 
                (NULL,
				'" .  $idpart. "',
				'" .  $week. "',
                '" .  $begtime. "',
                '" .  $endtime. "',
                '" .  $monam. "',
                '" .  $monpm. "',
                '" .  $tueam. "',
                '" .  $tuepm. "',
                '" .  $wedam. "',
                '" .  $wedpm. "',
                '" .  $thuam. "',
                '" .  $thupm. "',
                '" .  $friam. "',
                '" .  $fripm. "',
                '" .  $satam. "',
                '" .  $satpm. "',
                '" .  $sunam. "',
                '" .  $sunpm. "')";
        }
		
		if ( $db->query( $query ) )
        {
            if ( defined( 'IS_EDIT' ) )
            {
                nv_insert_logs( NV_LANG_DATA, $module_name, $lang_module['log_edit_notice'], "noticeid " . $nid, $admin_info ['userid'] );
            }
            else
            {
                nv_insert_logs( NV_LANG_DATA, $module_name,  $lang_module['log_add_notice'], " ", $admin_info ['userid'] );
            }
            Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=main" );
            die();
        } else {
            $error = $lang_module ['error_sql'];
		}
    }
} else {
    if ( defined( 'IS_EDIT' ) )
    {
		$idpart = $row ['idpart'];
		$week = $row ['week'];
		$begtime = $row ['begtime'];
		$endtime = $row ['endtime'];
		$monam = $row ['monam'];
		$monpm = $row ['monpm'];
		$tueam = $row ['tueam'];
		$tuepm = $row ['tuepm'];
		$wedam = $row ['wedam'];
		$wedpm = $row ['wedpm'];
		$thuam = $row ['thuam'];
		$thupm = $row ['thupm'];
		$friam = $row ['friam'];
		$fripm = $row ['fripm'];
		$satam = $row ['satam'];
		$satpm = $row ['satpm'];
		$sunam = $row ['sunam'];
		$sunpm = $row ['sunpm'];
    } else {
		$week = $idpart = $begtime = $endtime = $monam  = $monpm = $tueam = $tuepm = $wedam = $wedpm = $thuam = $thupm = $friam = $fripm = $satam = $satpm = $sunam = $sunpm = "";
    }
}
$contents = "";
if ( $error != "" )
{
	
    $contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
    $contents .= "<blockquote class=\"error\"><span>" . $error . "</span></blockquote>\n";
    $contents .= "</div>\n";
    $contents .= "<div class=\"clear\"></div>\n";
}

$j=0;
$contents .= "<link type=\"text/css\" href=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.core.css\" rel=\"stylesheet\" />";
$contents .= "<link type=\"text/css\" href=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.theme.css\" rel=\"stylesheet\" />";
$contents .= "<link type=\"text/css\" href=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.menu.css\" rel=\"stylesheet\" />";
$contents .= "<link type=\"text/css\" href=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.autocomplete.css\" rel=\"stylesheet\" />";
$contents .= "<link type=\"text/css\" href=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.datepicker.css\" rel=\"stylesheet\" />";
$contents .= "<form action=\"" . $action . "\" enctype=\"multipart/form-data\" method=\"post\">";
$contents .= "<input type=\"hidden\" name =\"" . NV_NAME_VARIABLE . "\"value=\"" . $module_name . "\" />";
$contents .= "<input type=\"hidden\" name =\"" . NV_OP_VARIABLE . "\"value=\"" . $op . "\" />";
$contents .= "<input type=\"hidden\" value=\"1\" name=\"save\">\n";
$contents .= "<input type=\"hidden\" value=\"" . $nid . "\" name=\"nid\">\n";
$contents .= "<table class=\"tab1\" id=\"items\">\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td align=\"center\">" . $lang_module['notice02'] . "</td>\n";
$contents .= "<td><input type=\"text\" name=\"week\" size=\"40\" value=\"" . $week . "\"></td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['part02'] . "</td>\n";
$contents .= "<td>";
	$contents .= "<select name=\"idpart\">\n";
	$sqlnhom = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part";
	$resultnhom = $db->query( $sqlnhom );
	while ($rownhom = $resultnhom->fetch()){
			if($rownhom['id'] == $idpart){$checkselect = "selected";}else{$checkselect = "";}
	$contents .= "<option value=\"".$rownhom['id']."\" " . $checkselect . ">".$rownhom['full_name']."</option>";
	}
	$contents .= "</select>\n";
//$contents .= "<input name=\"begtime\" id=\"begtime\" value=\"" . nv_date("d.m.Y", $begtime) . "\" style=\"width: 90px;\" maxlength=\"10\" readonly=\"readonly\" type=\"text\">\n";
//$contents .= "<img src=\"" . NV_BASE_SITEURL . "images/calendar.jpg\" widht=\"18\" style=\"cursor: pointer; vertical-align: middle;\" onclick=\"popCalendar.show(this, 'begtime', 'dd.mm.yyyy', true);\" alt=\"\" height=\"17\">\n";
//$contents .= "" . $lang_module['notice04'] . "\n";
//$contents .= "<input name=\"endtime\" id=\"endtime\" value=\"" . nv_date("d.m.Y",$endtime) . "\" style=\"width: 90px;\" maxlength=\"10\" readonly=\"readonly\" type=\"text\">\n";
//$contents .= "<img src=\"" . NV_BASE_SITEURL . "images/calendar.jpg\" widht=\"18\" style=\"cursor: pointer; vertical-align: middle;\" onclick=\"popCalendar.show(this, 'endtime', 'dd.mm.yyyy', true);\" alt=\"\" height=\"17\">\n";
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice03'] . "</td>\n";
$contents .= "<td>";
$contents .= "<input name=\"begtime\" id=\"begtime\" value=\"" . nv_date("d/m/Y", $begtime) . "\" style=\"width: 90px;\" maxlength=\"10\" type=\"text\">\n";

$contents .= "" . $lang_module['notice04'] . "\n";
$contents .= "<input name=\"endtime\" id=\"endtime\" value=\"" . nv_date("d/m/Y",$endtime) . "\" style=\"width: 90px;\" maxlength=\"10\"  type=\"text\">\n";

$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice10'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'monam', '700px', '50px', $monam );
} else {
	$contents .= "<textarea style=\"width: 810px\" name=\"monam\" id=\"monam\" cols=\"20\" rows=\"5\">" . $monam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
    
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice11'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'monpm', '700px', '50px', $monpm );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"monpm\" id=\"monpm\" cols=\"20\" rows=\"5\">" . $monpm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice12'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'tueam', '700px', '50px', $tueam );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"tueam\" id=\"tueam\" cols=\"20\" rows=\"5\">" . $tueam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice13'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'tuepm', '700px', '50px', $tuepm );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"tuepm\" id=\"tuepm\" cols=\"20\" rows=\"5\">" . $tuepm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
 
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice14'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
    $contents .= nv_aleditor( 'wedam', '700px', '50px', $wedam );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"wedam\" id=\"wedam\" cols=\"20\" rows=\"5\">" . $wedam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
 
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice15'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'wedpm', '700px', '50px', $wedpm );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"wedpm\" id=\"wedpm\" cols=\"20\" rows=\"5\">" . $wedpm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice16'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'thuam', '700px', '50px', $thuam );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"thuam\" id=\"thuam\" cols=\"20\" rows=\"5\">" . $thuam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice17'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'thupm', '700px', '50px', $thupm );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"thupm\" id=\"thupm\" cols=\"20\" rows=\"5\">" . $thupm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
	
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice18'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'friam', '700px', '50px', $friam );
} else {
    $contents .= "<textarea style=\"width: 810px\" name=\"friam\" id=\"monam\" cols=\"20\" rows=\"5\">" . $friam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice19'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'fripm', '700px', '50px', $fripm );
}else{
   	$contents .= "<textarea style=\"width: 810px\" name=\"fripm\" id=\"fripm\" cols=\"20\" rows=\"5\">" . $fripm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice20'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'satam', '700px', '50px', $satam );
}else{
   	$contents .= "<textarea style=\"width: 810px\" name=\"satam\" id=\"satam\" cols=\"20\" rows=\"5\">" . $satam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice21'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'satpm', '700px', '50px', $satpm );
}else{
  	$contents .= "<textarea style=\"width: 810px\" name=\"satpm\" id=\"satpm\" cols=\"20\" rows=\"5\">" . $satpm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice22'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'sunam', '700px', '50px', $sunam );
}else{
   	$contents .= "<textarea style=\"width: 810px\" name=\"sunam\" id=\"sunam\" cols=\"20\" rows=\"5\">" . $sunam . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['notice23'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'sunpm', '700px', '50px', $sunpm );
}else{
   	$contents .= "<textarea style=\"width: 810px\" name=\"sunpm\" id=\"sunpm\" cols=\"20\" rows=\"5\">" . $sunpm . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$contents .= "</table>\n";
$contents .= "<br><div style=\"text-align:center\"><input type=\"submit\" name=\"submit\" value=\"" . $lang_module['notice_confirm'] . "\"></div>\n";
$contents .= "</form>\n";
$contents .= "<script type=\"text/javascript\" src=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.core.min.js\"></script>";
$contents .= "<script type=\"text/javascript\" src=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.menu.min.js\"></script>";
$contents .= "<script type=\"text/javascript\" src=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.autocomplete.min.js\"></script>";
$contents .= "<script type=\"text/javascript\" src=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/ui/jquery.ui.datepicker.min.js\"></script>";
$contents .= "<script type=\"text/javascript\" src=\"".NV_BASE_SITEURL."".NV_ASSETS_DIR."/js/language/jquery.ui.datepicker-".NV_LANG_INTERFACE.".js\"></script>";
$contents .= "<script type=\"text/javascript\" >
$(document).ready(function() {
	$(\"#begtime,#endtime\").datepicker({
		showOn : \"both\",
		dateFormat : \"dd/mm/yy\",
		changeMonth : true,
		changeYear : true,
		showOtherMonths : true,
		buttonImage : nv_siteroot + \"assets/images/calendar.gif\",
		buttonImageOnly : true
	});
});
</script>";
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
