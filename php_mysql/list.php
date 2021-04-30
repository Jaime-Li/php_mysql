<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table{
			width: 600px;
			margin: 0 auto;
			text-align: center;
			border:1px solid #ccc;
		}
		th,td{
			border:1px solid #eee;
		}
		a{
			display: block;
			width: 50px;
			height:35px;
			margin-left: 230px; 
			margin-top: 50px;
			border:1px solid #ccc;
			border-radius: 5px;
			background: #eee;
			text-decoration: none;
			text-align: center;
			line-height: 35px;
		}
	</style>
</head>
<body>
	<?php 
		// 1:链接数据库
		require './inc/conn.php';
		//2：获取数据
		$rs = mysqli_query($link,'select * from student order by id asc');	//返回结果集对象
		$list = mysqli_fetch_all($rs,MYSQLI_ASSOC);	//将结果匹配成关联数组
		// echo '<pre>';
		// print_r($list);
	 ?>
		<a href="./add.php">添加</a>

	 <table>
		<tr>
			<th>编号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>地址</th>
			<th>修改</th>
			<th>删除</th>
		</tr>
		<?php foreach($list as $rows): ?>
		<tr>
			<td><?php echo $rows['id'] ?></td>
			<td><?php echo $rows['stuname'] ?></td>
			<td><?php echo $rows['sex'] ?></td>
			<td><?php echo $rows['add'] ?></td>
			<td><input type="button" value="修改" onclick="location.href='./editor.php?id=<?php echo $rows['id'] ?>'"></td>
			<td><input type="button" value="删除" onclick="if(confirm('确定要删除吗'))location.href='./del.php?id=<?php echo $rows['id'] ?>'"></td>
		</tr>
		<?php endforeach; ?>
	 </table>
</body>
</html>