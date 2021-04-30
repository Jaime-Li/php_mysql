<?php 
 	$link = mysqli_connect('47.111.7.136','jsks_gd','iROaTN4R','jsks_gd','3306');
 	var_dump($link);
 	if(mysqli_connect_error()){
 		echo '错误'.mysqli_connect_error();
 	}else{
 		echo '111';
 	}

 ?>