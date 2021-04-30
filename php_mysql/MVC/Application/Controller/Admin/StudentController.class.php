<?php
namespace Controller\Admin;

//学生模块控制器
class StudentController{
	use \Traits\Jump;
	protected $model;
	public function __construct(){
		$this->model = new \Model\StudentModel();
	}
	public function listAction(){
		$list = $this->model->select();

		//加载视图
		require __VIEW__.'list.html';
	}
	//添加
	public function addAction(){
		if(isset($_POST['submit'])){
			$stuname = $_POST['stuname'];
			$sex = $_POST['sex'];
			$add = $_POST['add'];
			if(!$stuname || !$sex){
				echo "<script>alert('姓名和性别不能为空');history.go(-1)</script>";
				exit;
			}

			$res = $this->model->insert(['stuname'=>$stuname,'sex'=>$sex,'add'=>$add]);
			if($res){
				echo "<script>alert('添加成功');location.href='index.php?c=student&a=list';</script>";
			}else{
				echo '添加失败';
				exit;
			}
		}else{
			require __VIEW__.'add.html';
		}
	}
	//修改
	public function editAction(){
		if(isset($_POST['submit'])){
			$id = (int)$_POST['id'];
			$stuname = $_POST['stuname'];
			$sex = $_POST['sex'];
			$add = $_POST['add'];
			if(!$stuname || !$sex){
				echo "<script>alert('姓名和性别不能为空');";
				exit;
			}
			
			$res = $this->model->update(['id'=>$id,'stuname'=>$stuname,'sex'=>$sex,'add'=>$add]);
			if($res){
				echo "<script>alert('修改成功');location.href='index.php?c=student&a=list';</script>";
			}else{
				echo "修改失败";
				exit;
			}

		}else{
			$id = (int)$_GET['id'];
			
			$row = $this->model->find($id);
			require __VIEW__.'edit.html';
		}
	}
	//删除
	public function delAction(){
		$id = (int)$_GET['id'];		//如果参数明确是整数，要强制转成整型
		
		if($this->model->del($id)){
			/*header('location:index.php?c=student&a=list');*/
			$this->success('index.php?p=admin&c=Student&a=list','删除成功');
		}
		else{
			$this->error('index.php?p=Admin&c=Student&a=list','删除失败');
		}
	}
}

 ?>