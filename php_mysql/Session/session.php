<?php
//打开会话
function open(){
	global $link;
	$link = mysqli_connect('localhost','root','root','data');
	mysqli_set_charset($link,'utf8');
	return true;
}
//关闭会话
function close(){
	global $link;
	return true;
}
//读取会话
function read($sess_id){
	global $link;
	$sql = "select sess_value from sess where sess_id = '$sess_id'";
	$rs = mysqli_query($link,$sql);
	$rows = mysqli_fetch_row($rs);
	return (string)$row[0];
}
//写入会话
function write($sess_id,$sess_value){
	global $link;
	$sql = "insert into sess values ('$sess_id','$sess_value',unix_timestamp()) on duplicate key update sess_value = '$sess_value',sess_time=unix_timestamp()";
	return mysqli_query($link,$sql);
}
//销毁会话
function destroy($sess_id){
	global $link;
	$sql = "delete from sess where sess_id = '$sess_id'";
	return mysqli_query($link,$sql);
}
//垃圾回收
function gc($gctime){
	global $link;
	$expires = time() - $gctime;		//过期时间点
	$sql = "delete from sess where sess_time < $expires";
	return mysqli_query($link,$sql);
}	

//更改会话存储
session_set_save_handler('open','close','read','write','destroy','gc');

session_start();

// session_destroy();