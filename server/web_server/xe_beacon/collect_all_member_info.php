<?php

define('__XE__', true);
require_once('C:\inetpub\wwwroot\xe\config\config.inc.php');
$oContext = &Context::getInstance();
$oContext->init();

$logged_info = Context::get('logged_info'); 
if($logged_info)
{
$info = array(
"host" => "localhost",
"user" => "root",
"pass" => "apmsetup",
"db" => "test",
"table" => "xe_beacon",
"member_srl" => $my_member_srl,
);

	$con = mysql_connect($info[host], $info[user], $info[pass]) || die(mysql_error());
	mysql_query("set names utf8");
	$con_db = mysql_select_db($info[db]) || die(mysql_error());
	
	$my_member_srl = $logged_info->member_srl;
	
	
	$my_member_mail_address = $logged_info->email_address;
	
	
	$my_member_name = $logged_info->nick_name;
	
	
	/* 	GroupSRL을 하나밖에 출력못하며 쿼리를 요청하는 비효율적 소스코드
	$get_group_srl = mysql_query("SELECT group_srl FROM xe_member_group_member WHERE xe_member_group_member.member_srl = '$my_member_srl'");
	$result_get_group_srl = mysql_result($get_group_srl,0,0); 
	$my_group_srl =$result_get_group_srl; 
	$my_group_name =$logged_info->group_list[1];
	*/
	
	//전체 출력
	foreach($logged_info->group_list as $key_group=>$val_group){
		$my_group_srl = $key_group;
		$my_group_name = $val_group;
	}
	//echo $my_group_srl;
	//echo $my_group_name;
	
	$result = mysql_query("select * from xe_member where member_srl = '$my_member_srl' ");//현재접속자와 일치여부쿼리
	$row = mysql_fetch_array($result); //결과값을 가져오고
	$data1 = unserialize($row[extra_vars]); // 확장변수 정보 출력 extra_vars는 DB쪽 컬럼명
	$array = array();
	if (is_object($data1)){
	  $array = get_object_vars($data1);
	  //echo print_r($array,true);
	}
	 
	//확장변수의 비콘정보가져오기
	$beacon1 = trim($array[beacon1], "\"");
	$beacon1type = trim($array[beacon1type], "\"");
	if ($beacon1type == '종일반') { 
		$beacon1type = '2'; 
	}
	if ($beacon1type == '반일반') { 
		$beacon1type = '1'; 
	}
	$beacon2 = trim($array[beacon2], "\"");
	$beacon2type = trim($array[beacon2type], "\"");
	if ($beacon2type == '종일반') { 
		$beacon2type = '2'; 
	}
	if ($beacon2type == '반일반') { 
		$beacon2type = '1'; 
	}
	$beacon3 = trim($array[beacon3], "\"");
	$beacon3type = trim($array[beacon3type], "\"");
	if ($beacon3type == '종일반') { 
		$beacon3type = '2'; 
	}
	if ($beacon3type == '반일반') { 
		$beacon3type = '1'; 
	}
	$role = trim($array[mypermission], "\"");
	if ($role == '학부모(원생)') { 
		$role = '1'; 
	}
	if ($role == '선생님(관리자)') { 
		$role = '2'; 
	}
	if ($role == '원장님(최고관리자)') { 
		$role = '3'; 
	}
	
 	echo $beacon1;
	echo $beacon1type;
	echo $beacon2;
	echo $beacon2type;
	echo $beacon3;
	echo $beacon3type;
	echo $role;
	
	$get_gcm_id = mysql_query("SELECT reg_id FROM xe_androidpushapp_gcmregid WHERE xe_androidpushapp_gcmregid.member_srl = '$my_member_srl'");
	$result_get_gcm_id = mysql_result($get_gcm_id,0,0); 
	$my_gcm_id =$result_get_gcm_id;
	
	$get_member_secret = mysql_query("SELECT password FROM xe_member WHERE xe_member.member_srl = '$my_member_srl'");
	$result_get_member_secret = mysql_result($get_member_secret,0,0); 
	$my_member_secret =$result_get_member_secret;
	
	$get_school_location = mysql_query("SELECT description FROM xe_member_group WHERE xe_member_group.group_srl = '$my_group_srl'");
	$result_get_school_location = mysql_result($get_school_location,0,0); 
	$my_school_location =$result_get_school_location;
	
} else {
	//로그인이 되지 않았을때
	echo 로그인하셈;
}
	
//INSERT INTO `xe_beacon` (`member_srl`, `member_mail_address`, `member_name`, `group_srl`, `group_name`, `gcm_reg_id`, `first_beacon_serial`, `first_beacon_type`, `second_beacon_serial`, `second_beacon_type`, `third_beacon_serial`, `third_beacon_type`) VALUES ('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12')
//"INSERT INTO xe_beacon FROM xe_member_group_member WHERE xe_member_group_member.member_srl = '$my_member_srl'"
$add_xe_beacon_data = mysql_query("INSERT INTO `xe_beacon` (`member_srl`, `member_mail_address`, `member_name`, `group_srl`, `group_name`, `gcm_reg_id`, `first_beacon_serial`, `first_beacon_type`, `second_beacon_serial`, `second_beacon_type`, `third_beacon_serial`, `third_beacon_type`, `role`, `member_secret`, `school_location`) VALUES ('$my_member_srl', '$my_member_mail_address', '$my_member_name', '$my_group_srl', '$my_group_name', '$my_gcm_id', '$beacon1', '$beacon1type', '$beacon2', '$beacon2type', '$beacon3', '$beacon3type', '$role', '$my_member_secret', '$my_school_location') ON DUPLICATE KEY UPDATE  member_mail_address='$my_member_mail_address', member_name='$my_member_name', group_srl='$my_group_srl', group_name='$my_group_name', gcm_reg_id='$my_gcm_id',first_beacon_serial='$beacon1', first_beacon_type='$beacon1type',second_beacon_serial='$beacon2', second_beacon_type='$beacon2type',third_beacon_serial='$beacon3', third_beacon_type='$beacon3type', role='$role', member_secret='$my_member_secret', school_location='$my_school_location'");
$result_add_xe_beacon_data = mysql_result($add_xe_beacon_data,0,0); 


//$output_url = "location: http://52.38.137.183/?act=dispMemberAdminList&mid=slaveadmin&selected_group_srl=".$result_get_group_srl;

if($my_group_srl == ''){
$output_url = "location: http://52.38.137.183/";	
header($output_url);
}else{
$output_url = "location: http://52.38.137.183/index.php?mid=t".$my_group_srl;
header($output_url);		
}




//http://52.38.137.183/?act=dispMemberAdminList&mid=slaveadmin&selected_group_srl=318
?>