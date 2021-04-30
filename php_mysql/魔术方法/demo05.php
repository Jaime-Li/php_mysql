<?php 
class Student{
	public $name;
	public $sex;
	public $add = 'china';
	public function __construct($name,$sex){
		$this->name = $name;
		$this->sex = $sex;
	}

	//序列化时自动调用
	//return array 序列化时的字段名
	public function __sleep(){
		return array('name','sex');
	}

	//反序列化时自动调用
	//反序列化时添加一个type字段
	public function __wakeup(){
		$this->type = 'student';
	}
}

$stu = new Student('tom','male');
$str = serialize($stu);		//序列化
echo $str."<br>";

$stu = unserialize($str);	//反序列化
print_r($stu);

 ?>