<?php 
class A{
	public $name = 'tom';
	private $num = 111;
	//在继承链中使用
	protected $arr = ['s','b','d'];
}

class B extends A{
	public function getName(){
		echo $this->name."<br>";
		echo $this->num."<br>";
		print_r($this->arr);

	}
}

$obj = new B();
$obj->getname();


 ?>