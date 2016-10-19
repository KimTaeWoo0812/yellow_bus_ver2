<?php

define('__XE__', true);
require_once('C:\inetpub\wwwroot\xe\config\config.inc.php');
$oContext = &Context::getInstance();
$oContext->init();

/* 	url 로 직접 불러오는것을 방지
// if(!strstr($_SERVER['HTTP_REFERER'],$_SERVER['SERVER_NAME'])&& !strstr($_SERVER['HTTP_REFERER'],'out_excel.php')) {
	// echo '경고! 당신은 정상적인 방법으로 접근하지 않았다. 메인 페이지로 돌아간 다음, 올바른 방법으로 다시 시도해라.';
	// exit;	
// } */

$logged_info = Context::get('logged_info'); 
if($logged_info)
{
	$my_member_srl = $logged_info->member_srl;
	echo $my_member_srl;
} else {
	//로그인이 되지 않았을때
	echo 로그인하셈;
}
/*		비정상적 쿼리문	
$info = array(
"host" => "localhost",
"user" => "root",
"pass" => "apmsetup",
"db" => "test",
"table" => "xe_stud_log",
"member_srl" => $my_member_srl,
);


$con = mysql_connect($info[host], $info[user], $info[pass]) || die(mysql_error());
mysql_query("set names utf8");
$con_db = mysql_select_db($info[db]) || die(mysql_error());
$get_group_srl = mysql_query("SELECT group_srl FROM xe_member_group_member WHERE xe_member_group_member.member_srl = '$my_member_srl'");
$result_get_group_srl = mysql_result($get_group_srl,0,0);  */
		//새로운 로직
	foreach($logged_info->group_list as $key_group=>$val_group){
		$result_get_group_srl = $key_group;
		$result_get_group_name = $val_group;
	}
$output_url = "location: http://52.38.137.183/?act=dispMemberAdminList&mid=t1&selected_group_srl=".$result_get_group_srl;
header($output_url);
//http://52.38.137.183/?act=dispMemberAdminList&mid=slaveadmin&selected_group_srl=318
?>