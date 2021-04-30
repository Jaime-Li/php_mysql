<?php 
$link = @mysqli_connect('localhost','root','root','data','3306') or die('错误信息：'.mysqli_connect_error());

mysqli_set_charset($link,'utf8');

$rs = mysqli_query($link,'select * from student');
$rows = mysqli_fetch_all($rs);

echo "<pre>";
var_dump($rows);

 ?>