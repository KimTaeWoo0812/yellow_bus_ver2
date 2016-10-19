<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ko"  xml:lang="ko">
	<head>
		<meta http-equiv="Content-Type" Content="text/html; charset=utf-8" />
	</head>

<?php
 define('__XE__', true);
 require_once('C:\inetpub\wwwroot\xe\config\config.inc.php');
 $oContext = &Context::getInstance();
 $oContext->init();


  
$logged_info = Context::get('logged_info'); 
if($logged_info)
{
	$my_email_address = $logged_info->email_address;
	echo $my_email_address;
} else {
	//로그인이 되지 않았을때
	echo 로그인하셈;
}
	
$info = array(
"host" => "localhost",
"user" => "root",
"pass" => "apmsetup",
"db" => "test",
"table" => "xe_stud_log",
"email_address" => $my_email_address,
);
$getFields = array("id","school","text","date","flag"); //출력원하는 칼럼을 배열로 입력
  
$con = mysql_connect($info[host], $info[user], $info[pass]) || die(mysql_error());
mysql_query("set names utf8");
$con_db = mysql_select_db($info[db]) || die(mysql_error());
 
?>
  


	<body>

		<table border=1>
			<tr align=center>
  
<?php
	//제목 불러오기
	$fields = mysql_list_fields("$info[db]", "$info[table]");
	$columns = mysql_num_fields($fields);
	//echo print_r($columns); 
 
	/*$oDocumentModel = getModel('document');
	$category_info = $oDocumentModel->getCategory($document->get('category_srl'));
	$mycategory = $category_info->title;*/

	
 
	
	/*for( $i=0 ; $i<$columns ; $i++ )
	{
		$field[$i]=mysql_field_name($fields, $i);
		if( in_array($field[$i], $getFields) ) echo "<th>".$field[$i]."</th>";
	}
	*/

	echo "<th>"."아이디"."</th>";
	echo "<th>"."학원"."</th>";
	echo "<th>"."내용"."</th>";
	echo "<th>"."작성일자"."</th>";
 
	//id값이 $info[email_address]인 id를 xe_stud_log에서 찾아서 $result에 넣는다.
	$result = mysql_query("SELECT * FROM xe_stud_log WHERE xe_stud_log.id = '$my_email_address'");
	while($output_row = mysql_fetch_array($result, MYSQL_BOTH)){
		echo"<tr>";
		echo "<th>".$output_row['id']."</th>";
		echo "<th>".$output_row['school']."</th>";
		echo "<th>".$output_row['text']."</th>";
		echo "<th>".$output_row['date']."</th>";
		echo"</tr>";   
	}  
  
	          
      
?>
		</table>
	</body>
</html>