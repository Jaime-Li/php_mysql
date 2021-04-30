<?php 
	class Student{
		public function __construct(){
			echo '构造方法<br>';
		}
		public function __destruct(){
			echo '销毁<br>';
		}
	}
	
	new Student();
	new Student();


 ?>