<?php 
class Person{
	public static $add = '致远星';
	public static function show(){
		echo 'this is a static';
	}
}

echo Person::$add;			//调用静态属性
Person::show();	
echo "<hr>";

class Student{
	private $num = 0;
	public function __construct(){
		$this->num++;
	}
	public function show(){
		echo "总人数：{$this->num}";
	}
}

$stu1 = new Student();
$stu2 = new Student();
$stu3 = new Student();
$stu2->show();



echo "<hr>";

class Student2{
	private static $num = 0;
	public function __construct(){
		self::$num++;				//静态调用的写法
	}
	public function __destruct(){
		self::$num--;
	}
	public static function show(){
		echo "总人数：".self::$num;
	}
}

$stu1 = new Student2();
$stu2 = new Student2();
$stu3 = new Student2();
$stu2::show();
Student2::show();		//静态方法不需要实例化就可以调用

unset($stu2);
$stu3::show();			//静态方法调用

 ?>