<?php
//生成一个连接
$dbhost='localhost';
$test = 't';
$db_connect=mysql_connect($dbhost,$username,$userpass) or die("Unable to connect to the MySQL!");

//选择一个需要操作的数据库
mysql_select_db($dbdatabase,$db_connect);

//执行MySQL语句
$result=mysql_query("SELECT id,name FROM student");

//提取数据
$row=mysql_fetch_row($result);
print_r($row);
//;
?>
