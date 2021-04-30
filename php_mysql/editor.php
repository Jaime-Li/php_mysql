<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		require './inc/conn.php';
		$id = $_GET['id'];
		$sql = "select * from student where id = $id";
		$rs = mysqli_query($link,$sql);
		$row = mysqli_fetch_assoc($rs);
		// print_r($row);
		// 
		// 提交到当前页面，id在页面url通过get取到（既有get，又有post）
		if(!empty($_POST)){
			$id = $_GET['id'];
			$stuname = $_POST['stuname'];
			$sex = $_POST['sex'];
			$add = $_POST['add'];

			$sql = "update student set stuname = '$stuname',sex = '$sex',`add` = '$add' where id = $id";
			if(mysqli_query($link,$sql)){
				header('location:list.php');
			}else{
				echo '错误'.mysqli_error($link);
				exit;
			}
		}

	 ?>
	<form action="" method="post">
		姓名：<input type="text" name="stuname" value="<?php echo $row['stuname'] ?>"><br>
		性别：<input type="text" name="sex" value="<?php echo $row['sex'] ?>"><br>
		地址：<textarea name="add" id="" cols="30" rows="10" ><?php echo $row['add'] ?></textarea>
		<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
		<input type="submit" value="提交">
		<input type="button" value="返回" onclick="location.href='list.php'">
	</form>
</body>
</html>