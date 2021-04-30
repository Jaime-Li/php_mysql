<?php
namespace Controller\Admin;
use Core\Controller;
class LoginController extends Controller{
	//登录
	public function loginAction(){
		require __VIEW__.'login.html';
	}
}