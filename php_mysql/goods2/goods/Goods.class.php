<?php 

//商品类
abstract class Goods{
	protected $name;
	final public function setName($name){
		$this->name = $name;
	}
	public abstract function getName();
}

 ?>