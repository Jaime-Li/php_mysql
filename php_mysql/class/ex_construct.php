<?php 
class Father{
	protected $name;
	protected $sex;
	public function __construct($name,$sex){
		$this->name = $name;
		$this->sex = $sex;
		echo 'this is father'.'<br>';
	}
}

class Son extends Father{
	private $score;
	public function __construct($name,$sex,$score){
		Father::__construct($name,$sex);		//通过父类名称调用父类的构造函数
		parent::__construct($name,$sex);		//parent直接调用父类
		$this->score = $score;
		echo 'this is son'.'<br>';
	}
	public function getInfo(){
		echo "姓名:{$this->name}<br>";
		echo "性别:{$this->sex}<br>";
		echo "分数:{$this->score}<br>";
	}
}

// 1:子类有构造函数就调子类，子类没有就调用父类，都有只调用子类

$stu = new son('tom','meal','87');
$stu->getInfo();

 ?>