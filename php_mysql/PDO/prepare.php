<?php

$dsn = "mysql:host=localhost;prot=3306;dbname=data;charset=utf8";
$pdo = new PDO($dsn,'root','root');


//创建预处理
$stmt = $pdo->prepare("insert into card values(?,?)");	//？是占位符

$a = $pdo->query('select * from card');


//执行预处理
$cards = [
	['1003',500],
	['1004',2001]
];
foreach($cards as $card){
	//方法1：
	//绑定参数		占位符从0开始
	// $stmt->bindParam(1,$card[0]);
	// $stmt->bindParam(2,$card[1]);
	// $stmt->execute();		//	执行预处理


	//方法二
	// $stmt->bindValue(1,$card[0]);
	// $stmt->bindValue(2,$card[1]);		//bindValue可以直接放值，bindParam只能放变量
	// $stmt->execute();

	//方法3：
	$stmt->execute($card);

}