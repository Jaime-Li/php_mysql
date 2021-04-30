<?php
namespace Core;
class Model{
	/*
	get_class:获取对象的类（包括命名空间）
	
	 */
	private $table;
	public function __construct($table=''){
		if($table != '')
			$this->table = $table;		//直接给基础模型传递表名
		else
			$this->table = substr(basename(get_class($this)),0,-5);			//实例化子类模型

		echo $this->table,'<br>';
	}
}

namespace Model;
class StudentModel extends \Core\Model{

}

namespace Controller\Admin;


new \Core\Model('news');		//news
new \Model\StudentModel();		//student
