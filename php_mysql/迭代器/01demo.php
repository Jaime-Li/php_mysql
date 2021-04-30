<?php 
$stu = ['Tom','Berry','Jack','Rose'];

reset($stu);		//复位指针
while(key($stu) !== null){		//键合法
	echo key($stu),'-',current($stu),'<br>';	//获取键，值
	next($stu);		//指针下移
}

 ?>