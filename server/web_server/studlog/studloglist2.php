<?php
 define('__XE__', true);
 require_once('C:\inetpub\wwwroot\xe\config\config.inc.php');
 $oContext = &Context::getInstance();
 $oContext->init();

 
$info = array(
"host" => "localhost",
"user" => "root",
"pass" => "apmsetup",
"db" => "test",
"table" => "xe_documents",
"module_srl" => "163",
);
$getFields = array("category_srl","title","regdate","content","member_srl"); //출력원하는 칼럼을 배열로 입력
  
header( "Content-type: application/vnd.ms-excel; charset=utf-8" ); 
header("Content-Disposition: attachment; filename=doc_".date('Ymd').".xls");
//print("<meta http-equiv=\"Content-Type\" content=\"application/vnd.ms-excel; charset=euc-kr\">");
 
$con = mysql_connect($info[host], $info[user], $info[pass]) || die(mysql_error());
mysql_query("set names utf8");
$con_db = mysql_select_db($info[db]) || die(mysql_error());
 
?>
  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=Content-Type content=text/html; charset="utf-8">
</head>
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
echo "<th>"."기능"."</th>";
echo "<th>"."제목"."</th>";
echo "<th>"."내용"."</th>";
echo "<th>"."작성자"."</th>";
echo "<th>"."작성일자"."</th>";
 
 
//확장변수의 타이틀은 값이므로       
$result = mysql_query("select  var_name from xe_document_extra_keys where module_srl = $info[module_srl]");                  
//$aaa = mysql_fetch_array($result);
//print_r($aaa);  //$result print_r 결과 = Resource id #4
while( $data = mysql_fetch_array($result) )
{                          
    echo "<th>".htmlspecialchars($data[var_name])."</th>";
}  
  
echo"</tr>";             
  
  
//데이터 불러오기
$result = mysql_query("select * from $info[table] where module_srl = $info[module_srl]");
while( $data = mysql_fetch_assoc($result) )
{
    echo"<tr>";
    foreach( $data as $key => $val )
    {
        if( in_array($key, $getFields) ) 
        {
            if ($key ==  'regdate') { 
$str_date = htmlspecialchars($val);
$date = date("Y-m-d", strtotime( $str_date ) );
                //echo "<td   style='mso-number-format:\"0_ \";' >".htmlspecialchars($val)."</td>";               
//echo "<td   style='mso-number-format:yyyy-mm-dd' >".htmlspecialchars(substr($val,0,7))."</td>";
echo "<td>".$date."</td>";
            }elseif ($key ==  'content'){       //내용 출력할경우 태그가 그대로 출력됨         
                //echo "<td>".$val."</td>";     //셀이 두칸이상으로 늘어남
                echo "<td >".htmlspecialchars(strip_tags(str_replace(" ","",$val)))."</td>";
            }elseif ($key ==  'member_srl'){    //내용 출력할경우 태그가 그대로 출력됨         
 
//$member = htmlspecialchars($val);
//$oMemberModel = getModel('member');
//$member_info = $oMemberModel->getMemberInfoByMemberSrl($member);
//$username = $member_info->user_id;
echo "<td>"."멤버".htmlspecialchars($val)."</td>";
}else {
                echo "<td>".htmlspecialchars($val)."</td>";
            }  
        }
 
        if ($key ==  'document_srl'){           //확장변수 불러올때 사용
            $d_srl=$val;
        }
  
    }
                //확장변수 출력 ////////////////////////////////////////////
                //eid리스트를 불러온다
                $query=mysql_query("select eid from xe_document_extra_keys where module_srl = $info[module_srl]");      
while($extra_title=mysql_fetch_array($query))
                {      
                    echo"<td>";
  
                    $egetFields = array("value","eid");  
                    //확장변수 값을 불러와 eid값이 같은곳에 출력
                    $extra_result = mysql_query("select * from xe_document_extra_vars where document_srl = $d_srl");  
                    while( $edata = mysql_fetch_assoc($extra_result) )
                    {
                        $extra_str="";
                        foreach( $edata as $key => $val ){
                            if( in_array($key, $egetFields) ){                          
                                $extra_str = $val.",".$extra_str;
                            }
                        }
  
                        $extra_arr=explode(",",$extra_str);                                
                        if ($extra_title[eid]==$extra_arr[0]){
  
                            //전화번호값은 "|@|" 를 "-" 로 변경
                            if($extra_title[eid]=="mb_phone_Number"){
                                echo str_replace("|@|","-",htmlspecialchars($extra_arr[1]));
  
                            //기타 배열값들은 ',' 로 변경
                            }elseif($extra_title[eid]=="mb_incomplete"||$extra_title[eid]=="mb_cs"){
                                echo str_replace("|@|",",",htmlspecialchars($extra_arr[1]));
                            }else{
                                echo htmlspecialchars($extra_arr[1]);                     
                            }
                        }
                    }
  
                    echo"</td>";   //eid값이 없으면 빈칸입력
                }              
                /////////////////////////////////////////////////////////////////////
  
    echo"</tr>";
}
  
  
?>
</table>
</body>
</html>