<?php 
//跳转插件
namespace Traits;
trait Jump{
	//封装成功跳转
	public function success($url,$info='',$time=3){
		$this->redirect($url,$info,$time,'success');
	}
	//封装失败跳转
	public function error($url,$info='',$time=3){
		$this->redirect($url,$info,$time,'error');
	}

	/*
		作用：跳转的方法
		@param $url string 跳转的地址
		@param $info string 显示信息
		@param $time int 跳转的时间
		@param $flag string  显示模式  success/error
	 */
	private function redirect($url,$info,$time,$flag){
		if($info == '')
			header("location:{$url}");
		else{
			require ROOT_PATH."del.html";
		}
	}
}

