<?php 
$link = @mysqli_connect('localhost','root','root','data') or die('错误信息：'.mysqli_connect_error());
mysqli_set_charset($link,'utf8');

 ?>