/**
** @Project: NUKEVIET NOTICE
** @Author: webvang (hoang.nguyen@webvang.vn)
** @Copyright: Webvang
** @Craetdate: 18.09.2015
*/
function nv_del_content(nid, checkss) {
	if (confirm(nv_is_del_confirm[0])) {
		$.post(script_name, nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=del&nid=' + nid + '&checkss=' + checkss, function(res) {
		nv_del_content_result(res);
	});
	}
	return false;
}
function nv_del_content_result(res) {
	var r_split = res.split("_");
	if (r_split[0] == 'OK') {
		window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=main';
	} else if (r_split[0] == 'ERR') {
		alert(r_split[1]);
	} else {
		alert(nv_is_del_confirm[2]);
	}
	return false;
}
function nv_del_part(id, checkss) {
	if (confirm(nv_is_del_confirm[0])) {
		$.post( script_name, nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=delpart&id=' + id + '&checkss=' + checkss, function(res) {
		nv_del_part_result(res);
	});
	}
	return false;
}
function nv_del_part_result(res) {
	var r_split = res.split("_");
	if (r_split[0] == 'OK') {
		window.location.href = script_name + '?' + nv_name_variable + '=' + nv_module_name + '&' + nv_fc_variable + '=mainpart';
	} else if (r_split[0] == 'ERR') {
		alert(r_split[1]);
	} else {
		alert(nv_is_del_confirm[2]);
	}
	return false;
}