<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/
//////////////////////////////
if ( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );

global $global_config, $global_array_cat;
$module_data ='lichct';
$module_file ='lichct';

$limit = 1; //so ban tin 
$Scroll = 1;//Co cho noi dung cua block chay tu duoi len tren hay khong. 0 - khong, 1 - dong y 
$bgcolor1 = "red";//"#FFFFAA";
$bgcolor2 = "navy";//"#06FF83";
$bgcolor_2 = "#FFFFFF";//"#FFFFAA";
$bgcolor_1 = "#F2F2F2";//"#06FF83";

############### Het phan khai bao ########################## 
$array_block_news = array();
$result1 = "SELECT nid, idpart,week, begtime, endtime,monam,monpm,tueam,tuepm,wedam,wedpm,thuam,thupm,friam,fripm,satam,satpm,sunam,sunpm FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE idpart = 1 ORDER BY nid DESC LIMIT 0 , 1";
$numstories = $db->query( $result1 );

$a = 1; 
$content = ""; 
if($numstories > 0) { 
$row =  $numstories->fetch();
$tuan=$row['week'];

$content .= "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n<tr>\n<td align=\"center\"><strong>
<font color='#0000FF'>Tuần $tuan: Từ " . nv_date("d/m", $row['begtime']) . " đến " . nv_date("d/m/Y", $row['endtime']) . "</strong>"; 
//Neu cho chay ban tin
if ($Scroll) { 
$content .= "<marquee behavior= \"scroll\" align= \"center\" direction= \"up\" height=\"100\" scrollamount= \"1\" scrolldelay= \"10\" onmouseover='this.stop()' onmouseout='this.start()'>";
} 
//Bang chua tung ban tin
$content .= "<table width=\"100%\" border=\"0\" bordercolor=\"#000080\" cellpadding=\"0\" cellspacing=\"1\">\n"; 

while ($rowlast1 = $numstories->fetch()) {
$id = intval($rowlast1['nid']);
$catid = end( explode( ",", $rowlast1['idpart'] ) );
$monam = stripslashes($rowlast1['monam']);
$monpm = stripslashes($rowlast1['monpm']);
$tueam = stripslashes($rowlast1['tueam']);
$tuepm = stripslashes($rowlast1['tuepm']);
$wedam = stripslashes($rowlast1['wedam']);
$wedpm = stripslashes($rowlast1['wedpm']);
$thuam = stripslashes($rowlast1['thuam']);
$thupm = stripslashes($rowlast1['thupm']);
$friam = stripslashes($rowlast1['friam']);
$fripm = stripslashes($rowlast1['fripm']);
$satam = stripslashes($rowlast1['satam']);
$satpm = stripslashes($rowlast1['satpm']);
$sunam = stripslashes($rowlast1['sunam']);
$sunpm = stripslashes($rowlast1['sunpm']);

$bgcolor23 = $bgcolor1;
$bgcolor_23 = $bgcolor_1;

if ($a%2 == 1) { $bgcolor23 = $bgcolor2;$bgcolor_23 = $bgcolor_2; }
$content .= "<tr><td><table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" bgcolor=\"$bgcolor_23\"><tr>";
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Sáng thứ 2:</strong><br> $monam</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chiều thứ 2:</strong><br> $monpm</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Sáng thứ 3:</strong><br> $tueam</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chiều thứ 3:</strong><br> $tuepm</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Sáng thứ 4:</strong><br> $wedam</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chiều thứ 4:</strong><br> $wedpm</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Sáng thứ 5:</strong><br> $thuam</font></td></tr>";
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chiều thứ 5:</strong><br> $thupm</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Sáng thứ 6:</strong><br> $friam</font></td></tr>";
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chiều thứ 6:</strong><br> $fripm</font></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Sáng thứ 7:</strong><br> $satam</font></td></tr>";
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chiều thứ 7:</strong><br> $satpm</font></td></tr></table></td></tr>"; 
$content .= "<td width=\"1000%\" align=\"left\"><font size=\"2\" color=\"$bgcolor23\"><strong>Chủ nhật:</strong> $sunam</font></td></tr></table></td></tr>"; 

$a=$a+1; 
} 

$content .= "</table>"; 
if ($Scroll) { 
$content .= "</marquee>"; 
} 
$content .= "</td></tr></table>"; 
} 

