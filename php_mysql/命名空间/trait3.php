<?php 
trait A{
	private function show(){
		echo '雕虫小技<br>';
	}
}

class Student{
	use A{
		show as public show2;	//将方法更改为public，并改名为show2
	}
}

$stu = new Student();
$stu->show2();

 ?>