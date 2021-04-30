
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		#cl{
			width: 320px;
			background: #ccc;
			margin:30px auto;
		}
		button{
			width: 75px;
			height: 40px;
			background: #eee;
		}
		#sq div{
			width: 320px;
			height: 400px;
			background: gray;
			margin:0 auto;
		}
	</style>
</head>
<body>
	<div id="cl">
		<button style="color: red" index="0">aaaa</button>
		<button index="1">bbbb</button>
		<button index="2">cccc</button>
		<button index="3">dddd</button>
	</div>
	<div id="sq">
		<div class="a">aaaaaaaaaa</div>
		<div class="a">bbbbbbbbbb</div>
		<div class="a">vcccccccccccccc</div>
		<div class="a">dddddddd</div>
	</div>

	<script>
		window.onload = function(){
			var btns = document.getElementsByTagName("button");
			var divs = document.getElementsByClassName("a");
			for(var k=0;k<divs.length;k++){
				divs[k].style.display = 'none';
			}
			divs[0].style.display = 'block';
			
			for(var i=0;i<btns.length;i++){
				btns[i].index = i;
				btns[i].onclick = function(){
					for(var j=0;j<btns.length;j++){
						btns[j].style.color = 'black';
					}
					this.style.color = 'red';
					for(var k=0;k<divs.length;k++){
						divs[k].style.display = 'none';
					}
					divs[this.index].style.display = 'block';
				}
			}
			
		}

	</script>
</body>
</html>