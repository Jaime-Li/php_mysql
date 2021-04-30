<?php 
class StudentModel extends Model{
	//student模型，用来操作studet表
	public function getList(){
		
		return $this->mypdo->fetchAll("select * from student order by id asc");
	}
	//添加
	public function add($stuname,$sex,$add){
		return $this->mypdo->exec("insert into student values(null,'$stuname','$sex','$add')");
	}
	//获取一条数据
	public function getOne($id){
		return $this->mypdo->fetchRow("select * from student where id = '$id'");
	}
	//修改
	public function edit($id,$stuname,$sex,$add){
		return $this->mypdo->exec("update student set stuname = '$stuname',sex='$sex',`add` = '$add' where id = '$id'");
	}
	//删除
	public function del($id){
		return $this->mypdo->exec("delete from student where id = $id");
	}
}


 ?>