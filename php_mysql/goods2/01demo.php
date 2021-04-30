<?php 
/*
自动加载类  php7.2以前
function __autoload($classname){
	require "./{$classname}.class.php";
}

 */

/*自动加载类	php7.2以后
注册加载类函数
spl_autoload_register('autoload');
加载类函数
function autoload($classname){
	require "./{$classname}.class.php";
}
*/

//方法2：把函数作为参数：匿名函数
spl_autoload_register(function($classname){
	//类名和文件地址映射成一个关联数组
	$map = array(
			'Goods'=>'./goods/Goods.class.php',
			'Book'=>'./book/Book.class.php',
			'Phone'=>'./phone/Phone.class.php'
		);
	//在映射数组中找到就包含
	if(isset($map[$classname]))
		require $map[$classname];
});


$book = new Book();
$book->setName('对象');

$phone = new Phone();
$phone->setName('iphone');

$book->getName();
$phone->getName();

 ?>