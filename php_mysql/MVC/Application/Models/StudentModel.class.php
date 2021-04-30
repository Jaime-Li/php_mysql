<?php 
namespace Model;

//student模型用来操作student表
class StudentModel extends \Core\Model{
	//获取studnet 表的数据
	/*public function getList(){
		//获取数据
		return $this->$mypdo->fetchAll('select * from student order by id asc');
	}
	//获取一条数据，主要用于修改
	public function getOne($id){
		return $this->$mypdo->fetchRow("select * from student where id = '$id'");
	}

	//添加\
	public function add($stuname,$sex,$add){
		return $this->$mypdo->exec("insert into student values(null,'$stuname','$sex','$add')");
	}

	//修改
	public function edit($id,$stuname,$sex,$add){
		return $this->$mypdo->exec("update student set stuname='$stuname',sex='$sex',`add`='$add' where id = $id");
	}

	//删除
	public function del($id){
		return $this->$mypdo->exec("delete from student where id = $id");
	}*/
}

 ?>