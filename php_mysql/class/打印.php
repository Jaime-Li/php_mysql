<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		body{
			text-align: center;
		}
		span{
			display: inline-block;
			width: 30px;
			height: 30px;
		}
	</style>
</head>
<body>
	
	<?php 
		for($i=1;$i<=9;$i++){
			$n = $i>5?(10-$i):$i;
			$k = 2*$n - 1;
			for($j=1;$j<=$k;$j++){
				echo "<span>*</span>";
			}
			echo "<br>";
		}
	 ?>

	 <hr>

	 <?php 
	 	for($i=1;$i<=10;$i++){
	 		for($j=1;$j<=10;$j++){
	 			if($i>2 && $i<9 && $j>2 && $j<9)
	 				echo "<span> </span>";
	 			else
	 				echo "<span>*</span>";
	 		}
	 		echo "<br>";
	 	}

	  ?>
</body>
</html>