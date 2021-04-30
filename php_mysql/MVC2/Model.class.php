<?php
//基础模型
class Model{
	protected $mypdo;
	public function __construct(){
		$this->initMyPdo();
		
	}
	//链接数据库
	private function initMyPdo(){
		//链接数据库
		$param = array(
				'user' => 'root',
				'pwd' => 'root'
			);

		return $this->mypdo = MyPDO::getInstance($param);
	}

}