<?php 
namespace China\Jiangxi\Nanchang;
class Student{

}

namespace USA\Washington;
class Student{

}

$stu1 = new Student();		//相对路径
$stu2 = new \China\Jiangxi\Nanchang\Student();	//绝对路径
$stu3 = new \USA\Washington\Student();	//绝对路径
var_dump($stu1,$stu2,$stu3);

 ?>