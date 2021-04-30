<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		if(isset($_POST['button'])){
			try{
				$age = $_POST['age'];
				if($age == '')
					throw new Exception('年龄不能为空',1001);
				if(!is_numeric($age))
					throw new Exception('年龄必须是数字',1002);
				if(!($age >= 10 && $age <= 30))
					throw new Exception('年龄必须在10-30之间',1003);
				echo '您的年龄合适';
			}catch(Exception $ex){
				echo '错误信息：'.$ex->getMessage(),'<br>';
				echo '错误码：'.$ex->getCode(),'<br>';
				echo '文件地址：'.$ex->getFile(),'<br>';
				echo '错误行号：'.$ex->getLine(),'<br>';
			}finally{
				echo '关闭连接';
			}
		}

	 ?>

	<form action="" method="post">
		年龄：<input type="text" name="age"><br>
		<input type="submit" value="提交" name="button">
	</form>
</body>
</html>