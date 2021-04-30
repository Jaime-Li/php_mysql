<?php 
echo '11111';

echo $_POST['name'];


 ?>

 $('.but').click(function(){
				$.ajax({
					type:'POST',
					url:'./ajax.php',
					dataType:'JSON',
					data:{name:name},
					success:function(res){
						alert('发射成功');
					},
					error:function(err){
						alert('发射失败');
					}

				})

			})