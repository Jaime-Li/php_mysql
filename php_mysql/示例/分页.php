<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		a{
			display: inline-block;
			padding:4px 3px;
		}
		td{
			width: 150px;height: 30px;
			line-height: 30px;
			border:1px solid #ccc;
		}
	</style>
</head>
<body>
	<?php 
	//自动加载类
		spl_autoload_register(function($class_name){
			require "{$class_name}.php";
		});

		//获取单例
		$param = array(
			'user' => 'root',
			'pwd'  => 'root',
			'dbname' => 'data'
		);
		$db = MySqlDb::getInstance($param);

		// var_dump($db);

	 ?>


	 <?php 
	 //页面大小
	 $pagesize = 2;

	 //	第一步：获取总记录数
	 $rowcount = $db->fetchColumn('select count(*) from student');

	 //第二部：求出总页数
	 $pages = ceil($rowcount / $pagesize);
	 // echo $pages;
	  
	 // 第四步：通过当前页面，求处起始位置
	 $pageno = isset($_GET['pageno'])?$_GET['pageno']:1;
	 $pageno = $pageno<1?1:$pageno;			//页码小于1就用1
	 $pageno = $pageno>$pages?$pages:$pageno;	//页码大于页数，就用最大页码

	 $start = ($pageno-1)*$pagesize;

	 //第五步：获取当前页面数据，并遍历显示
	 $sql = "select * from student order by id asc limit $start,$pagesize";
	 $rs = $db->fetchAll($sql);
	 // print_r($rs);
	 

	  ?>

	<table>
	<tr>
		<td>序号</td>
		<td>姓名</td>
		<td>性别</td>
		<td>地址</td>
	</tr>
	<?php foreach($rs as $row): ?>
	
		<tr>
			<td><?=$row['id']?></td>
			<td><?=$row['stuname']?></td>
			<td><?=$row['sex']?></td>
			<td><?=$row['add']?></td>
		</tr>
	<?php endforeach; ?>
		
	</table>
	<!-- 第三步：循环显示页码 -->
		一共<?=$rowcount?>条记录,每页<?=$pagesize?>条，当前是第<?=$pageno?>页<br>
		<a href="?pageno=1">首页</a>
		<a href="?pageno=<?=$pageno-1?>">上一页</a>
		<?php for($i=1;$i<=$pages;$i++):?>

			<a href="?pageno=<?=$i?>"><?=$i?></a>
		 <?php endfor;?>
		 <a href="?pageno=<?=$pageno+1?>">下一页</a>
		 <a href="?pageno=<?=$pages?>">尾页</a>

</body>
</html>