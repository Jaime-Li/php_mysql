<?php 
class Student{
	private $name;
	private $sex;
	//给无法访问的属性赋值的时候自动执行
	public function __set($k,$v){
		$this->$k=$v;
	}

	//获取无法访问的属性值的时候自动调用
	public function __get($k){
		return $this->$k;
	}

	//判断无法访问的属性是否存在时自动调用
	public function __isset($k){
		return isset($this->$k);
	}

	//销毁无法访问的属性时自动调用
	public function __unset($k){
		unset($this->$k);
	}
}

$stu = new Student;
$stu->name = 'tom';
$stu->sex = 'male';
print_r($stu);
echo "<br>";

echo $stu->name;
echo "<br>";

var_dump(isset($stu->name));
echo "<br>";

unset($stu->sex);
print_r($stu);
 ?>