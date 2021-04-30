<?php 
namespace China;		//定义命名空间
function getInfo(){
	echo 'China';
}

namespace USA;			//定义命名空间
function getInfo(){
	echo 'America';
}

getInfo();

\China\getInfo();		//绝对路径

 ?>