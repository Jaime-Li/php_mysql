<?php 
$lang = 'ch';

class Student{

}
//匿名函数	函数作为参数
if($lang == 'ch'){
	$fun = function(){
		echo 'English';
	};
}else{
	$fun = function(){
		echo 'Chinese';
	};
}

//绑定  每次加载一个方法
$stu = new Student;
$fun->call($stu);

 ?>