<?php 
interface IPic1{
	function fun1();
}

interface IPic2{
	function fun2();
}

//接口允许多重实现
class Student implements IPic1,IPic2{
	public function fun1(){

	}
	public function fun2(){
		
	}
}

 ?>