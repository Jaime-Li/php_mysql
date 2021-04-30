<?php 
$table = 'student';			//表名
$cond = array(
		'stuname' => '张大彪',
		'age' => array('lt',12)
	);


/*
$table 表名
$cond array 条件
 */
function select($table,$cond=array()){
	$sql = "select * from `{$table}` where 1";
	if(!empty($cond)){
		foreach($cond as $k=>$v){
			if(is_array($v)){
				switch($v[0]){
					case 'eq':			//eq:equal等于
						$op = '=';
						break;
					case 'gt':			//gt: great then 大于
						$op = '>';
						break;
					case 'lt':			//lt: less then  小于
						$op = '<';
						break;
					case 'gte':			
					case 'egt':			//	大于等于
						$op = '>=';
						break;
					case 'lte':			
					case 'elt':			// 小于等于
						$op = '<=';
						break;
					case 'neq':			//neq:不等于
						$op = '<>';
						break;
				}
				$sql .= " and `$k` $op '$v[1]'";
			}else{
				$sql .= " and `$k` = '$v'";
			}
		}
	}

	return $sql;
}

echo select($table,$cond);
echo '<br>';
echo select($table);