<?php 
//商品类
abstract class Goods{
	protected $name;
	final public function setName($name){
		$this->name = $name;
	}
	public abstract function getName();
}
//图书类
class Book extends Goods{
	public function getName(){
		echo "《{$this->name}》<br>";
	}
}
//电话类
class Phone extends Goods{
	public function getName(){
		echo $this->name,"<br>";
	}
}

$book = new Book();
$book->setName('对象');
$phone = new Phone();
$phone->setName('iphone');
$book->getName();
$phone->getName();

 ?>