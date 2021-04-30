<?php 
class Student{
	/*
	调用无法访问的方法时自动调用
	$fn_name: string 	方法名
	$fn_args: array 	参数数组

	 */
	public function __call($fn_name,$fb_args){
		echo "{$fn_name}不存在<br>";
	}

	//调用不存在的静态方法时自动执行
	public static function __callStatic($fn_name,$fn_args){
		echo "{$fn_name}静态方法不存在<br>";
	}
}

$stu = new Student;
$stu->show();

Student::show();

 ?>