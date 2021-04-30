<?php 
	require './inc/conn.php';

	$id = $_GET['id'];
	// echo $id;

	$sql = "delete from student where id = $id";
	if(mysqli_query($link,$sql)){
	
		header('location:./list.php');
	}else{
		echo '删除失败<br>';
		echo mysql_error($link);
	}


 ?>