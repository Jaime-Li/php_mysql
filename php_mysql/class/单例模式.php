<?php 
//三私一公
class DB{
	private static $instance;
	//私有构造方法阻止在类的外部实例化
	private function __construct(){

	}
	//私有的__clone()阻止在外部克隆对象
	private function __clone(){

	}
	public static function getInstance(){
		//保存的值不属于db类的类型就实例化
		if(!self::$instance instanceof self)
			self::$instance = new self();
		return self::$instance;
	}
}
//是同一个对象
$db1 = DB::getInstance();
$db2 = DB::getInstance();

//克隆报错
// $db3 = clone $db1;

var_dump($db1,$db2,$db3);

 ?>