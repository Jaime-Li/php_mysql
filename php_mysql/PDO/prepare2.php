<?php 

$dsn = "mysql:host=localhost;prot=3306;dbname=data;charset=utf8";
$pdo = new PDO($dsn,'root','root');


//创建预处理
$stmt = $pdo->prepare("insert into card values(:p1,:p2)");	//？是占位符

//执行预处理
$cards = [
	['p1'=>'1003','p2'=>'300'],
	['p1'=>'1004','p2'=>'3333']
];
foreach($cards as $card){
	//方法1：
	// $stmt->bindParam(':p1',$card['p1']);
	// $stmt->bindParam(':p2',$card['p2']);
	// $stmt->execute();


	//方法二：当数组的下标和参数名一致的时候，就可以直接传递关联数组
	$stmt->execute($card);
}

 ?>