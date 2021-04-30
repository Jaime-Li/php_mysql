<?php

session_start();		//开启会话
$_SESSION['name'] = 'tom';		//保存会话
$_SESSION['age'] = '20';

echo $_SESSION['name'],'<br>';
echo $_SESSION['age'],'<br>';

echo '会话编号:'.session_id();			//会话id

?>
<br>
<a href="./demo2.php">跳转</a>
