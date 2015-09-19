<?php
/**
** @Project: NUKEVIET NOTICE
** @Author: Webvang (hoang.nguyen@webvang.vn)
** @Copyright: webvang
** @Craetdate: 18.09.2015
*/

if ( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );

if ( ! in_array( $op, array( 
    'detail', 'result' 
) ) )
{
    define( 'NV_IS_MOD_NOTICE', true );
}

if ( ! empty( $array_op ) )
{
    if ( substr( $array_op[0], 0, 7 ) == "result-" )
    {
        $array_page = explode( "-", $array_op[0] );
        $id = intval( end( $array_page ) );
        $op = "result";
    }
}

