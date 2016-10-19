<?php 
$db_host = "localhost";
$db_user = "root";
$db_passwd = "apmsetup";
$db_name = "test";
  
mysql_connect($db_host,$db_user,$db_passwd);
mysql_select_db($db_name);
mysql_query('set session character_set_connection=utf8;'); 
mysql_query('set session character_set_results=utf8;'); 
mysql_query('set session character_set_client=utf8;'); 
 
$result = mysql_query("SELECT * FROM xe_documents");
$rows = array();
while ($row = mysql_fetch_assoc($result))
    {
        $JSONres = array
        (   
            "title"     =--> urlencode($row['title']),
            "content"   => urlencode($row['content'])
        ); 
        array_push($rows, $JSONres);
    }
     
echo (strip_tags(urldecode(json_encode($rows))));
?>