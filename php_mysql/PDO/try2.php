<?php 
try{
	$dsn = 'mysql:dbname=data;charset=utf8';
	$pdo = new PDO($dsn,'root','root');

	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$pdo->query('select * from aaa');
}catch(PDOException $ex){
	echo '错误信息：'.$ex->getMessage(),'<br>';
	echo '错误文件：'.$ex->getFile(),'<br>';
	echo '错误行号：'.$ex->getLine();
}

 ?>