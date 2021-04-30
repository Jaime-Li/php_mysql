<?php

class Student{
	//私有属性
	private $name;
	private $sex;

	//通过公有方法对私有属性赋值
	public function setInfo($name,$sex){
		$this->name = $name;		//$this表示当前对象
		$this->sex = $sex;
	}

	public function getInfo(){
		echo '姓名：'.$this->name,'<br>';
		echo '性别：'.$this->sex,'<br>';
	}
}

//实例化
$stu = new Student;
$stu->setInfo('李大毛','男');
$stu->getInfo();

$stu2 = new Student;
$stu2->setInfo('鸡掰','女');
$stu2->getInfo();