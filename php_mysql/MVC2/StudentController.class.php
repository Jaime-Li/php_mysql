<?php 
class StudentController{
	protected $model;
	public function __construct(){
		//实例化模型
		$this->$model = new StudentModel();
	}
	//获取列表
	public function listAction(){
		$list = $this->$model->getList();
		require './list.html';
	}

	public function addAction(){
		if($_POST['submit']){
			$stuname = $_POST['stuname'];
			$sex = $_POST['sex'];
			$add = $_POST['add'];
			if(!$stuname || !$sex){
				echo "<script>alert('姓名和性别不能为空');history.go(-1)</script>";
				exit;
			}
			$res = $this->$model->add($stuname,$sex,$add);
			if($res){
				echo "<script>alert('添加成功');location.href='index.php?c=student&a=list'</script>";
			}else{
				echo '添加失败';
				exit;
			}

		}else{
			require './add.html';
		}
	}

	public function editAction(){
		if($_POST['submit']){
			$id = $_POST['id'];
			$stuname = $_POST['stuname'];
			$sex = $_POST['sex'];
			$add = $_POST['add'];
			if(!$stuname || !$sex){
				echo "<script>alert('姓名和性别不能为空');history.go(-1)</script>";
				exit;
			}
			$res = $this->$model->edit($id,$stuname,$sex,$add);
			if($res){
				echo "<script>alert('修改成功');location.href='index.php?c=student&a=list'</script>";
			}else{
				echo "修改失败";
				exit;
			}
		}else{
			$id = $_GET['id'];
			$res = $this->$model->getOne($id);
			require './edit.html';
		}
	}

	public function delAction(){
		$id = (int)$_GET['id'];
		if($this->$model->del($id))
			echo "<script>alert('删除成功');location.href='index.php?c=Student&a=list'</script>";
		else
			echo '删除失败';
			exit;
	}
}

 ?>