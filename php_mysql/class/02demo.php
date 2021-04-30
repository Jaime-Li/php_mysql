<?php

//变量，在class外叫变量，在class里面叫属性
// $name = 1;
class Student{

	//属性。前面的public不能省略
	public $name = 2;

	//私有变量，只能在类内部访问
	private $sex = '变态';

	//定义方法，在class里面叫方法
	public function show(){
		echo 'jijijiji';
	}

	//public可以省略，默认为public
	function test($test){
		echo $test;
	}
}

//在class外面叫函数
function show(){

}

$stu = new student;
$stu->show();
$stu->test('dadadaad');

echo $stu->name.'<br>';

echo $stu->sex;
