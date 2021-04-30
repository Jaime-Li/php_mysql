<?php 
$arr = ['aa','','bb','','cc'];


$len = count($arr);
for($i=0;$i<=$len;$i++){
	if($arr[$i] != ''){
		$res[] = $arr[$i];
	}
}
var_dump($res);

 ?>

