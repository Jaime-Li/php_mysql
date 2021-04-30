<?php 
return array(
	//数据库配置
	'database' => array(
		'type' => 'mysql',
		'host' => '127.0.0.1',
		'port' => '3306',
		'dbname' => 'data',
		'charset' => 'utf8',
		'user' => 'root',
		'pwd' => 'root'
		),
	//应用程序配置
	'app' => array(
		'dp' => 'Admin',	//默认平台
		'dc' => 'student',	//默认控制器
		'da' => 'list' 		//默认方法
	)
)
 ?>