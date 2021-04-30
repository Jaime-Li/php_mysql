<?php 
namespace Core;
//基础模型
class Model{
	protected $mypdo;
	private $table;		//表名
	private $pk;		//主键名
	public function __construct($table=''){
		$this->initMyPDO();
		$this->initTable($table);
		$this->getPrimaryKey();
	}
	//链接数据库
	private function initMyPDO(){
		//链接数据库
		// $param = array(
		// 		'user'=>'root'
		// 	);
		$this->$mypdo = MyPDO::getInstance();
	}
	//获取表名
	private function initTable($table){
		if($table != '')
			$this->table = $table;		//直接给基础模型传递表名
		else
			$this->table = substr(basename(get_class($this)),0,-5);			//实例化子类模型
	}
	//获取主键
	private function getPrimaryKey(){
		$rs = $this->$mypdo->fetchAll("desc `{$this->table}`");
		//循环判断主键
		foreach($rs as $rows){
			if($rows['Key'] == 'PRI'){
				$this->pk = $rows['Field'];
				break;
			}
		}
	}

	//插入
	public function insert($data){
		//第一步：获取字段名
		$keys = array_keys($data);		//获取键名
		$keys = array_map(function($key){
			return "`{$key}`";
		},$keys);						//将字段名加上单引号
		$keys = implode(',',$keys);		
		//第二步：获取值
		$values = array_values($data);		//获取所有值
		$values = array_map(function($value){
			return "'$value'";
		},$values);							//所有的值添加单引号

		$values = implode(',',$values);		
		
		//第三步：拼接值
		$sql = "insert into `{$this->table}`  ($keys) values ($values)";
		return $this->$mypdo->exec($sql);
	}

	//更新
	public function update($data){
		//第一步：获取非主键名
		$keys = array_keys($data);		//获取所有键
		
		$index = array_search($this->pk,$keys);	//返回主键在数组中的下标
		unset($keys[$index]);			//删除主键


		//第二步：拼接 键 = 值 的形式
		$keys = array_map(function($key) use($data){
			return "`{$key}` = '{$data[$key]}'";
		},$keys);
		$keys = implode(',',$keys);

		//第三步：拼接sql
		$sql = "update `{$this->table}` set $keys where $this->pk = '{$data[$this->pk]}'";
		return $this->$mypdo->exec($sql);
	}

	//删除
	public function del($pk){
		$sql = "delete from `{$this->table}` where `{$this->pk}` = '$pk'";
	
		return $this->$mypdo->exec($sql);
	}

	//查询	返回二维数组
	public function select($cond=array()){
		$sql = "select * from `{$this->table}` where 1";
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
		return $this->$mypdo->fetchAll($sql);
	}
	//查询。返回一维数组
	public function find($id){
		$sql = "select * from `{$this->table}` where `{$this->pk}` = '$id'";
		return $this->$mypdo->fetchRow($sql);
	}
}

 ?>