<?php 

class Framework{
	public static function run(){
		self::initConst();
		self::initConfig();
		self::initRoutes();
		self::initAutoLoad();
		self::initDispatch();
	}

	//定义路径常量
	private static function initConst(){
		//区分windows,linux		windows: / \;linux: /
		define('DS',DIRECTORY_SEPARATOR);	//定义目录分隔符
		//getcwd();		入口文件绝对路径
		define('ROOT_PATH',getcwd().DS);		//入口文件所在目录
		define('APP_PATH',ROOT_PATH.'Application'.DS);	//Application目录
		define('CONFIG_PATH',APP_PATH.'Config'.DS);//config目录
		define('CONTROLLER_PATH',APP_PATH.'Controller'.DS);//contorller目录
		define('MODElS_PATH',APP_PATH.'Models'.DS);
		define('VIEWS_PATH',APP_PATH.'Views'.DS);
		define('FRAMEWORK_PATH',ROOT_PATH.'Framework'.DS);
		define('CORE_PATH',FRAMEWORK_PATH.'Core'.DS);
		define('LIB_PATH',FRAMEWORK_PATH.'Lib'.DS);
		define('TRAIT_PATH',ROOT_PATH.'Trait'.DS);
	}

	//引入配置文件
	private static function initConfig(){
		//全局变量
		$GLOBALS['config'] = require CONFIG_PATH.'config.php';
	}
	private static function initRoutes(){
		//确定路由	??写法7.0版本以上
		$p = $_GET['p']??$GLOBALS['config']['app']['dp'];
		$c = $_GET['c']??$GLOBALS['config']['app']['dc'];
		$a = $_GET['a']??$GLOBALS['config']['app']['da'];
		$p = ucfirst(strtolower($p));
		$c = ucfirst(strtolower($c));		//首字母小写
		$a = strtolower($a);				//转成小写
		define('PLATFROM_NAME',$p);			//平台名常量
		define('CONTROLLER_NAME',$c);		//控制器名常量
		define('ACTION_NAME',$a);			//方法名常量
		define('__URL__',CONTROLLER_PATH.$p.DS);	//当前请求控制器的地址
		define('__VIEW__',VIEWS_PATH.$p.DS);		//当前视图的目录地址

	}

	private static function initAutoLoad(){
		//自动加载类
		spl_autoload_register(function($class_name){
			// echo $class_name;
			// dirname:取出目录
			// basename:取出文件名
			$namespace = dirname($class_name);		//命名空间
			$class_name = basename($class_name);	//类名
			// exit;
			if(in_array($namespace,array('Core','Lib')))	//命名空间在core和lib下
				$path = FRAMEWORK_PATH.$namespace.DS.$class_name.'.class.php';
			elseif($namespace == 'Model')	//文件在model下
				$path = MODElS_PATH.$class_name.'.class.php';
			elseif($namespace == 'Traits')
				$path = TRAIT_PATH.$class_name.'.class.php';
			else
				$path = CONTROLLER_PATH.PLATFROM_NAME.DS.$class_name.'.class.php';
			if(file_exists($path) && is_file($path))
				require $path;
		});
	}

	private static function initDispatch(){
		//请求分发	/ \转义
		$controller_name = '\Controller\\'.PLATFROM_NAME.'\\'.CONTROLLER_NAME.'Controller';		
		$action_name = ACTION_NAME.'Action';				//拼接方法名
		
		$model = new $controller_name();
		$model->$action_name();

	}
}


 ?>