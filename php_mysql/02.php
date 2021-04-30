<?php 
$link = mysqli_connect('localhost','root','root','data','3306');

mysqli_set_charset($link,'utf8');


/* 增
$res = mysqli_query($link,"insert into student values(null,'李大帅','男','阿富汗')");
if($res){
	echo 'id为：'.mysqli_insert_id($link);
} */

/* 改
$res = mysqli_query($link,"update student set stuname = '鸡毛' where id = 4");
if($res){
	echo '受影响的记录条数：'.mysqli_affected_rows($link);
}else{
	echo "错误码：".mysqli_errno($link).'<br>';
	echo "错误信息：".mysqli_error($link);

} */

$res = mysqli_query($link,"delete from student where id = 5");



 ?>