<?php
$dsn = 'mysql:host=127.0.0.1;port=3306;dbname=data;charset=utf8';
$pdo = new PDO($dsn,'root','root');
// var_dump($pdo);

//插入数据
/*echo $pdo->exec("insert into student values(null,'张大彪','男','独立团一营')");*/


/*if($pdo->exec("insert into student values(null,'李云龙','猛男','独立团')"))
	echo '自动增长的编号是：'.$pdo->lastInsertId().'<br>';*/
 


//修改
/*echo $pdo->exec("update student set stuname = '李鸡毛' where id in(13,14)");*/

//删除
// echo $pdo->exec("delete from student where id = 3");


$sql = "delete from student where idss = 3";
$rs = $pdo->exec($sql);
if($rs){
	echo 'SQL语句执行成功<br>';
	if(substr($sql,0,6) == 'insert'){
		echo '自动增长的编号是：'.$pdo->lastInsertId().'<br>';
	}else{
		echo '受影响的记录条数是：'.$rs.'<br>';
	}
}elseif($rs === 0){				//注意是全等于	===
	echo '数据没有变化<br>';
}elseif($rs === false){
	echo 'SQL语句执行失败<br>';
	echo '错误码：'.$pdo->errorCode().'<br>';
	echo '错误信息：'.$pdo->errorInfo()[2];
	// var_dump($pdo->errorInfo());
}

