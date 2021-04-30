<?php 
//父类
class Person{
	public function father(){
		echo 'father<br>';
	}

	public $name = 'motherfucker';
}

//子类
class Student extends Person{
	public function show(){
		echo 'son<br>'.$name;
	}

	public function test(){
		//方法1：
		// $person = new Person();
		// $person->father();

		//方法2：
		$this->father();
	}
}

$stu = new Student;
$stu->father();
$stu->show();

$stu->test();

 ?>