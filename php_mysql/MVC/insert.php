<?php 
$table = 'student';			//表名
$data['id'] = 1;	
$data['stuname'] = '张大彪';
$data['sex'] = '男';
$data['add'] = '独立团一营';


//第一步：获取字段名
$keys = array_keys($data);		//获取键名
$keys = array_map(function($key){
	return "`{$key}`";
},$keys);						//将字段名加上单引号

$keys = implode(',',$keys);		
//第二步：获取值
$values = array_values($data);		//获取所有值
$values = array_map(function($value){
	return "`$value`";
},$values);							//所有的值添加单引号

$values = implode(',',$values);		

//第三步：拼接值


$sql = "insert into `{$table}` ($keys) values ($values)";
echo $sql;