<?php 
//传递不同的参数，调用不同的方法
class Walk{
	public function way(){
		echo "walk<br>";
	}
}
class Bus{
	public function way(){
		echo "bus<br>";
	}
}

class Student{
	public function play($obj){
		$obj->way();
	}
}

$stu = new Student();
$stu->play(new Walk());
$stu->play(new Bus());

 ?>