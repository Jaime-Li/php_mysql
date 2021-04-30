<?php
$dsn = "mysql:host=localhost;prot=3306;dbname=data;charset=utf8";
$pdo = new PDO($dsn,'root','root');

// var_dump($pdo);

//执行查询语句
$stu = $pdo->query('select * from student');
var_dump($stu);

//获取数据
	//	获取二维数组
	/*$rs = $stu->fetchall(PDO::FETCH_ASSOC);		//默认返回关联索引	
	echo '<pre>';
	var_dump($rs);*/

	//	获取一维数组
	/*$rs = $stu->fetch();		//同上
	echo '<pre>';
	var_dump($rs);*/

	//	通过while循环获取二维数组
	/*while($row = $stu->fetch()){	
		$rs[] = $row;
	}
	echo '<pre>';
	var_dump($rs);*/

	//	匹配列	默认从0开始，匹配完后指针下移一行
	/*echo $stu->fetchColumn(1);		
	echo $stu->fetchColumn();
	echo $stu->fetchColumn();*/

	//	总行数，总列数
	/*echo '总行数：'.$stu->rowCount().'<br>';
	echo '总列数：'.$stu->columnCount().'<br>';*/

	//	遍历PDOStament对象（PDOStament对象是有迭代器的）
	foreach($stu as $row){
		echo $row['stuname'],'-',$row['add'],'<br>';
	}
	