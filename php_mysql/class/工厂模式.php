<?php 
//传递同的参数，获取不同的对象
class productA{

}
class productB{

}
class ProductsFactory{
	public function create($num){
		switch($num){
			case 1:
				return new ProductA;
			case 2:
				return new ProductB;
			default:
				return null;
		}
	}
}

$factory = new ProductsFactory();
$obj1 = $factory->create(1);
$obj2 = $factory->create(2);
var_dump($obj1,$obj2);

 ?>