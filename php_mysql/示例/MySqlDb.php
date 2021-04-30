<?php 
//封装Mysql单例
//三私一公
class MySqlDb{
	private $host;		//主机地址
	private $port;		//端口号
	private $user;		//用户名
	private $pwd;		//密码
	private $dbname;	//数据库名
	private $charset;	//字符集
	private $link;		//链接对象

	private static $instance;	//私有的静态变量用来保存当前单例

	//构造函数调用初始化方法，阻止在外部实例化
	private function __construct($param){
		$this->initParam($param);
		$this->initConnect();
		
	}
	//私有克隆，阻止外部克隆
	private function __clone(){

	}

	//获取单例
	public static function getInstance($param=array()){
		if(!self::$instance instanceof self)
			self::$instance = new self($param);	
		return self::$instance;		//用调用本身的构造函数
	}

	//初始化参数
	private function initParam($param){
		$this->host = $param['host']??'127.0.0.1';	//如果不传参数，默认为127.0.0.1
		$this->port = $param['port']??'3306';
		$this->user = $param['user']??'';
		$this->pwd = $param['pwd']??'';
		$this->dbname = $param['dbname']??'';
		$this->charset = $param['charset']??'utf8';
	}
	//链接数据库
	private function initConnect(){
		$this->link = @mysqli_connect($this->host,$this->user,$this->pwd,$this->dbname);
		if(mysqli_connect_error()){
			echo '数据库链接失败：'.mysqli_connect_error(),'<br>';
			echo '错误码：'.mysqli_connect_errno(),'<br>';
			exit;
		}
		mysqli_set_charset($this->link,$this->charset);
	}
	//执行数据库的增，删，改，查
	private function execute($sql){
		$rs = mysqli_query($this->link,$sql);
		if(!$rs){
			echo "sql语句执行失败<br>";
			echo "错误信息：".mysqli_error($this->link),'<br>';
			echo "错误码：".mysqli_errno($this->link),'<br>';
			echo "错误的sql语句：".$sql,'<br>';
			
		}
		return $rs;
	}
	//执行增，删，改
	public function exec($sql){
		$key = substr($sql,0,6);
		if(in_array($key,array('insert','update','delete')))
			return $this->execute($sql);
		else
			echo "非法访问<br>";
			exit;
	}
	//获取自动增长的编号
	public function getLastInsertId(){
		return mysqli_insert_id($this->link);
	}
	//查询语句
	private function query($sql){
		if(substr($sql,0,6) == 'select' || substr($sql,0,4) == 'show' || substr($sql,0,4) == 'desc'){
			return $this->execute($sql);
		}else{
			echo "非法访问<br>";
			exit;
		}
	}
	//执行查询语句，返回二维数组
	public function fetchAll($sql,$type='assoc'){
		$rs = $this->query($sql);
		$type = $this->getType($type);
		return mysqli_fetch_all($rs,$type);
	}
	//查询一条数据，返回一维数组
	public function fetchRow($sql,$type='assoc'){
		$rs = $this->query($sql);
		$type = $this->getType($type);
		return mysqli_fetch_row($rs);
		/*$list = $this->fetchAll($sql,$type);
		if(!empty($list))
			return $list[0];
		else
			return array();*/
	}
	//匹配一行一列
	public function fetchColumn($sql){
		$list = $this->fetchRow($sql,'num');
		if(!empty($list))
			return $list[0];
		return null;
	}

	//返回的数据类型	assoc num both
	private function getType($type){
		switch($type){
			case 'num':
				return MYSQLI_NUM;
			case 'both':
				return MYSQLI_BOTH;
			default:
				return MYSQLI_ASSOC;
		}
	}
}

//配置参数
/*$param = array(
		'host' => '127.0.0.1',
		'user' => 'root',
		'pwd' => 'root',
		'dbname' => 'data'
	);*/
//获取单例
// $db = MySqlDb::getInstance($param);
// var_dump($db);

//更新数据
/*$db->exec("update student set stuname = 'Jaime' where id = 12");*/


//插入数据
/*$db->exec("insert into student values(null,'大威天龙','男','金山寺')");*/


//插入，显示插入编号
 /*if($db->exec("insert into student values(null,'大威天龙','男','金山寺')"))
echo '编号是：'.$db->getLastInsertId();*/


//查询所有数据，返回二维数组
/*$list = $db->fetchAll('select * from student','both');
echo '<pre>';
var_dump($list);*/


//查询一条数据。返回一维数组
// $list = $db->fetchRow('select * from student where id = 6','assoc');
// echo '<pre>';
// var_dump($list);

//查询列数
/*$list = $db->fetchColumn('select count(*) from student');
echo '<pre>';
var_dump($list);*/

 ?>