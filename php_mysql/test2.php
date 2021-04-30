<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<htmllang="en"class="no-ie"style="overflow:hidden;">
    <script src="./jquery-3.5.1.min.js"></script>
	<style>
		.test{color:red;}
		.size{font-size: 30px;}
	</style>
</head>
<body>
	<?php 
		$arr = [1,2,3,4];
	
	 ?>
	 <ul>
	 <?php foreach($arr as $k): ?>
	 	<?php if($arr[0] == $k){ ?>
			<li>aaaaaaaa</li>
	 	<?php }else{ ?>
			<li>aa</li>
		<?php } ?>
	<?php endforeach; ?>
	 </ul>
	 <a href="" class="test" class="size">bbbbbb</a>
	
	 <?php 
	 	$a = '我是(大)毛鸡';
	 	echo str_replace('(大)','小',$a);
	
	  ?>
<hr>

<style>
    ul{
        width: 300px;
        height: 38px;
        border-bottom: 1px solid #ccc;
        overflow:hidden;
    }
    li{
        list-style: none;
        display: inline-block;
        width: 50px;
        height: 35px;
        line-height: 35px;
        text-align: center;
    }
    ul:hover{
        height: auto;

    }
</style>
<ul>
    <li>aaaa</li>
    <li>aaaa</li>
    <li>aaaa</li>
    <li>aaaa</li>
    <li>aaaa</li>
    <li>aaaa</li>
    <li>aaaa</li>
</ul>

<hr>

<?php 
	$arr = ['id'=>'11','name'=>'李大毛','sex'=>'男'];

	$key = array_keys($arr);		//获取所有键名
	$values = array_values($arr);	//获取所有键值
	print_r($key);

	/*foreach($key as $k){
		$k = "`$k`";
		$res[] = $k;
	}*/

	$res = array_map(function($key){
		return "`{$key}`";
	},$key);						//给所有字段名加上引号

	$value = array_map(function($values){
		return "`{$values}`";
	},$values);						//给所有值加上引号

	
	echo '<br>';
	$res = implode(',',$res);
	$value = implode(',',$value);
	
	$sql = "insert into tables ($res) values ($value)";
	echo $sql;
	
?>

<hr>
<br>

<?php 
	function test(){
		$a = '111';
		return $a;
	}

	$rs = test();
	echo $rs;
 ?>

</body>
</html>