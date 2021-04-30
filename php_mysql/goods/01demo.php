<?php 
/*
自动加载类  php7.2以前
function __autoload($classname){
	require "./{$classname}.class.php";
}

 */

//自动加载类	php7.2以后
//注册加载类函数
spl_autoload_register('autoload');
//加载类函数，new类时，会自动把类名作为参数传到autoload
function autoload($classname){
	require "./{$classname}.class.php";
}

/*方法2：把函数作为参数：匿名函数
spl_autoload_register(function($classname){
	require "./{$classname}.class.php";
})
*/

$book = new Book();
$book->setName('对象');

$phone = new Phone();
$phone->setName('iphone');

$book->getName();
$phone->getName();

 ?>