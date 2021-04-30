<?php 
class Student{
	private $name;		//读写属性
	private $addr = '南昌';		//只读属性
	private $age;		//只写属性

	public function __set($k,$v){
		if(in_array($k,array('name','age')))
			$this->$k= $v;
		else
			echo "{$k}只能读取<br>";
	}
	public function __get($k){
		if(in_array($k,array('name','addr')))
			return $this->$k;
		else
			echo "{$k}是只写属性<br>";
	}

}

$stu = new Student;
$stu->name='李大毛';
$stu->addr = '北京';		//无法重新赋值:addr只能读取
$stu->age = '33';
$stu->age="22";

echo '姓名：'.$stu->name,'<br>';
echo '地址：'.$stu->addr,'<br>';
echo $stu->age,'<br>';


 ?>