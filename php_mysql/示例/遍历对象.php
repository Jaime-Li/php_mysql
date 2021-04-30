<?php 
class Student{
	public $name = 'sbd';
	protected $sex = 'male';
	private $add = 'america';
	public function show(){
		foreach($this as $k => $v){
			echo "{$k}-{$v}<br>";
		}
	}
}

$stu = new Student();
$stu->show();

//遍历到当前位置所能访问到的属性

 ?>