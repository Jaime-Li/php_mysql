<?php 
class Student{
	//把对象当成字符串使用的时候自动执行
	public function __toString(){
		return '这是对象，不是字符串<br>';
	}
	//把对象当成函数时自动执行
	public function __invoke(){
		echo '这是对象，不是函数<br>';
	}
}

$stu = new Student;
echo $stu;
$stu();

 ?>