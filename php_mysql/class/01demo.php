<?php 
// 定义类
class Student{
	public $name;
	public $addr;
}

// 实例化对象
$stu1 = new student();
$stu2 = new student;	//括号可省略
// var_dump($stu1,$stu2);

//操作对象：给属性赋值
$stu1->name = 'tom';
$stu1->addr = '南昌';

//获取属性值
echo '姓名：'.$stu1->name,'<br>';
echo '地址：'.$stu1->addr,'<br>';
		
//添加属性
$stu1->age = 20;
print_r($stu1);

echo '<br>';
// 删除属性
unset($stu1->addr);
print_r($stu1);

 ?>