<?php 
//定义类实现迭代器接口
//迭代器直接遍历对象里面的数据
class MyClass implements Iterator{
	//$list属性用来保存学生数组
	private $list = array();
	//添加学生
	public function addStu($name){
		$this->list[] = $name;
	}
	//实现接口中的复位方法
	public function rewind(){
		reset($this->list);
	}
	//验证当前指针是否合法
	public function valid(){
		return key($this->list) !== null;
	}
	//获取值
	public function current(){
		return current($this->list);
	}
	//获取键
	public function key(){
		return key($this->list);
	}
	//指针下移
	public function next(){
		next($this->list);
	}

}

$class = new MyClass();
//添加学生
$class->addStu('Jack');
$class->addStu('Rose');
$class->addStu('Tom');
// print_r($class);

//遍历班级
foreach($class as $k=>$v){
	echo "{$k}-{$v}<br>";
}


 ?>