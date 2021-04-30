<?php 
trait A{
	public function getInfo(){
		echo '这是trait原型';
	}
}
class Person{
	public function getInfo(){
		echo '这是Person类';
	}
}
//继承类，同时代码复用
class Student extends Person{
	use A;			//继承的getInfo，被A中的getInfo覆盖
}

$stu = new Student;
$stu->getinfo();

 ?>
