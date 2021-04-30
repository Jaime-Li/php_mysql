<?php
//cookie默认在当前目录或者子目录有效

$time = time() + 10;	//给cookie添加时间，就形成永久性cookie
setcookie('name','Jaime',0,'/','',false);		//	/表示根目录		true：只能https传输

?>

<a href="demo2.php">跳转</a>
