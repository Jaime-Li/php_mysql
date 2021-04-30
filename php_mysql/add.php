<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
	if(!empty($_POST)){
		require './inc/conn.php';

		$sql = "insert into student values(null,'{$_POST['stuname']}','{$_POST['sex']}','{$_POST['add']}')";
		
		if(mysqli_query($link,$sql)){
			header('location:./list.php');
		}else{
			echo '插入失败<br>';
			echo mysql_error($link);
		}
	}

	 ?>

	<form action="" method="post">
		姓名：<input type="text" name="stuname"><br>
		性别：<input type="text" name="sex"><br>
		地址：<textarea name="add" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="提交">
	</form>
</body>
</html>