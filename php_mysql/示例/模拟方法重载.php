<?php 
class Math{
	//调用无法访问的方法时自动调用
	public function __call($fn_name,$fn_args){
		$sum = 0;
		foreach($fn_args as $v){
			$sum += $v;
		}
		echo implode(',', $fn_args).'的和是：'.$sum,'<br>';
	}
 }

 $math = new Math();
 $math->a(12,23);
 $math->b(32,43,76);
 $math->c(43,54,65,76);
