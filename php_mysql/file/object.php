<?php 
class Student{
	public $name;
	protected $sex;
	private $addr;
	public function __construct($name,$sex,$addr){
		$this->name = $name;
		$this->sex = $sex;
		$this->addr = $addr;
	}
}

$stu = new Student('tom','male','america');

//序列化
/*$str = serialize($stu);
file_put_contents('./stu2.txt',$str);
*/


//反序列化
$str = file_get_contents('./stu2.txt');
$stu = unserialize($str);
echo "<pre>";
var_dump($stu);

 ?>