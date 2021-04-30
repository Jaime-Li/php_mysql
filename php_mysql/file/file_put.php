<?php 
//数组的序列化:用于保存数组数据类型
/*$stu = ['name','sex','age'];
序列化
$str = serialize($stu);
file_put_contents('./stu.txt', $str);
*/

//数组的反序列化
$str = file_get_contents('./stu.txt');
$stu = unserialize($str);
print_r($stu);

 ?>