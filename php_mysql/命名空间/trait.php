<?php 
//原型
trait A{
	public function getInfo(){
		echo '大威天龙<br>';
	}
}
trait B{
	public function getInfo(){
		echo '世尊地藏<br>';
	}
}

//使用原型
class Student{
	//代码复用,引入多个trait,同时解决名称冲突
	use A,B{
		//方法1：A中的getinfo替换B中的getinfo
		A::getInfo insteadof B;

		//方法2：改名,改名有两步
		//A::getInfo insteadof B;  先覆盖同名，再改名
		B::getInfo as show;
	}		
}

$stu = new Student();
$stu->getInfo();
$stu->show();



 ?>