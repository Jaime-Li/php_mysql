<?php 
	spl_autoload_register(function($class_name){
		require "./{$class_name}.class.php";
	});

	//确定路由
	$c = $_GET['c']??'Student';
	$a = $_GET['a']??'list';
	$c = ucfirst(strtolower($c));		//首字母大写
	$a = strtolower($a);				//方法名转小写
	$controller_name = $c.'Controller';	//拼接控制器类名
	$action_name = $a.'Action';			//方法名

	//请求分发
	$obj = new $controller_name();
	$obj->$action_name();	

	

 ?>


