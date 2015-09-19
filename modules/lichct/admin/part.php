<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$id = $nv_Request->get_int( 'id', 'post,get', 0 );
if ( $id )
{
    $query = "SELECT * FROM " . NV_PREFIXLANG . "_" . $module_data . "_part WHERE id=" . $id;
    $result = $db->query( $query );
    $numrows = $result->rowcount();
    if ( empty( $numrows ) )
    {
        Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name );
        die();
    }
    $row = $result->fetch();
    define( 'IS_EDIT', true );
    $page_title = $lang_module ['part06'];
    $action = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op . "&amp;id=" . $id;
}
else
{
    $page_title = $lang_module ['part05'];
    $action = NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $op;
}

$error = "";
if ( defined( 'NV_EDITOR' ) )
{
    require_once ( NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php' );
}

if ( $nv_Request->get_int( 'save', 'post' ) == 1 )
{
    $full_name = $nv_Request->get_string( 'full_name', 'post', '', 1 );
    $phone = $nv_Request->get_string( 'phone', 'post', '', 1 );
    $email = $nv_Request->get_string( 'email', 'post', '', 1 );
    $note = $nv_Request->get_string( 'note', 'post', '' );
    $note = defined( 'NV_EDITOR' ) ? nv_nl2br( $note, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $note ) ), '<br />' );
	$check_valid_email = nv_check_valid_email($email);    
    if ( empty( $full_name ) )
    {
        $error = $lang_module['error_full_name'];
    } elseif(!empty($check_valid_email)) {
		$error = $check_valid_email;
	} else {
        if ( defined( 'IS_EDIT' ) )
        {
			$query = "UPDATE " . NV_PREFIXLANG . "_" . $module_data . "_part SET 
				full_name='" .  $full_name  . "',
				phone='" .  $phone  . "', 
                email='" .  $email  . "', 
                note='" .  $note  . "'
			WHERE id ='" . $id."'";
        } else {
            $query = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . "_part (id, full_name,phone, email, note) VALUES 
                (NULL,'" .  $full_name  . "',
                '" .  $phone  . "',
                '" .  $email  . "',
                '" .  $note  . "')";
        }
		//die ($query);
		if ( $db->query( $query ) )
        {
            if ( defined( 'IS_EDIT' ) )
            {
                nv_insert_logs( NV_LANG_DATA, $module_name, $lang_module['log_edit_part'], "partid " . $id, $admin_info ['userid'] );
            }
            else
            {
                nv_insert_logs( NV_LANG_DATA, $module_name,  $lang_module['log_add_part'], " ", $admin_info ['userid'] );
            }
            Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=mainpart" );
            die();
        } else {
            $error = $lang_module ['error_sql'];
		}
    }
} else {
    if ( defined( 'IS_EDIT' ) )
    {
		$full_name = $row ['full_name'];
		$phone = $row ['phone'];
		$email = $row ['email'];
		$note = $row ['note'];
    } else {
		$full_name = $phone = $email = $note  = "";
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
$my_head = "<script type=\"text/javascript\" src=\"" . NV_BASE_SITEURL . "js/popcalendar/popcalendar.js\"></script>\n";
$j=0;
$contents .= "<form action=\"" . $action . "\" enctype=\"multipart/form-data\" method=\"post\">";
$contents .= "<input type=\"hidden\" name =\"" . NV_NAME_VARIABLE . "\"value=\"" . $module_name . "\" />";
$contents .= "<input type=\"hidden\" name =\"" . NV_OP_VARIABLE . "\"value=\"" . $op . "\" />";
$contents .= "<input type=\"hidden\" value=\"1\" name=\"save\">\n";
$contents .= "<input type=\"hidden\" value=\"" . $id . "\" name=\"id\">\n";
$contents .= "<table class=\"tab1\" id=\"items\">\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td align=\"center\">" . $lang_module['part02'] . "</td>\n";
$contents .= "<td><input type=\"text\" name=\"full_name\" size=\"40\" value=\"" . $full_name . "\"></td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";
$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['part03'] . "</td>\n";
$contents .= "<td>";
$contents .= "<input type=\"text\" name=\"phone\" size=\"40\" value=\"" . $phone . "\">";
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td align=\"center\">" . $lang_module['part04'] . "</td>\n";
$contents .= "<td><input type=\"text\" name=\"email\" size=\"40\" value=\"" . $email . "\"></td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$j ++;
$class = ( $j % 2 == 0 ) ? " class=\"second\"" : "";
$contents .= "<tbody" . $class . ">\n";
$contents .= "<tr>\n";
$contents .= "<td>" . $lang_module['part07'] . "</td>\n";
$contents .= "<td>\n";
if ( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) )
{
   	$contents .= nv_aleditor( 'note', '700px', '50px', $note );
} else {
	$contents .= "<textarea style=\"width: 810px\" name=\"note\" id=\"note\" cols=\"20\" rows=\"5\">" . $note . "</textarea>";
}
$contents .= "</td>\n";
$contents .= "</tr>\n";
$contents .= "</tbody>\n";

$contents .= "</table>\n";
$contents .= "<br><div style=\"text-align:center\"><input type=\"submit\" name=\"submit\" value=\"" . $lang_module['notice_confirm'] . "\"></div>\n";
$contents .= "</form>\n";

include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_admin_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
