<?php 
namespace China\Jiangxi\Nanchang;
function getInfo(){
	echo '南昌...<br>';
}

namespace China\Jiangxi;
function getInfo(){
	echo '江西...<br>';
}

getinfo();			//非限定名称访问
\China\Jiangxi\getInfo();		//完全限定名称访问
Nanchang\getInfo();				//限定名称访问

 ?>