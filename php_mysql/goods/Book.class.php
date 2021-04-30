
<?php 
//图书类
class Book extends Goods{
	public function getName(){
		echo "《{$this->name}》<br>";
	}
}

 ?>