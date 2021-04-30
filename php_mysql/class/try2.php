<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		class MyNullException extends Exception{

		}
		class MyTypeException extends Exception{

		}
		class MyRangeException extends Exception{

		}

		if(isset($_POST['button'])){
			try{
				$name = $_POST['name'];
				$age = $_POST['age'];
				if($name == ''){
					throw new MyNullException('姓名不能为空');
				}
				if($age == ''){
					throw new MyNullException('年龄不能为空');
				}
				if(!is_numeric($age)){
					throw new MyTypeException('年龄不是数字');
				}
				if($age<10 || $age>30){
					throw new MyRangeException('年龄必须在10-30之间');
				}
			}catch(MyNullException $ex){
				echo $ex->getMessage(),'<br>';
				echo '错误记录在日志中';
			}catch(MyTypeException $ex){
				echo $ex->getMessage(),'<br>';
				echo '发送电子邮件';
			}catch(MyRangeException $ex){
				echo $ex->getMessage(),'<br>';
				echo 'call me','<br>';
			}
		}

	 ?>
	<form action="" method="post">
		姓名：<input type="text" name="name"><br>
		年龄：<input type="text" name="age"><br>
		<input type="submit" value="提交" name="button">
	</form>
</body>
</html>