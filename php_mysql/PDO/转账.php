<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php 
		$dsn = "mysql:host=127.0.0.1;port=3306;dbname=data";
		$pdo = new PDO($dsn,'root','root');

		$out = $_POST['out'];
		$in = $_POST['in'];
		$money = $_POST['money'];


		$pdo->beginTransaction();		//开启事务

		//转账
		$trans1 = $pdo->exec("update card set balance = balance-'$money' where cardid = '$out'");
		$trans2 = $pdo->exec("update card set balance = balance+$money where cardid = $in");

		// 查看转账账号余额是否小于0
		$rest = $pdo->query("select balance from card where cardid='$out'");
		$trans3 = $rest->fetchColumn()>0?1:0;

		if($trans1 && $trans2 && $trans3){
			$pdo->commit();		//提交事务
			echo '转账成功';
		}else{
			$pdo->rollBack();		//回滚
			echo '转账失败';
		}


	 ?>

	<form action="" method="post">
		转账卡号：<input type="text" name="out"><br>
		收账卡号：<input type="text" name="in"><br>
		转账金额：<input type="text" name="money"><br>
		<input type="submit" value="转账">
	</form>
</body>
</html>