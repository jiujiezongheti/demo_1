window.onload = function(){
	var face_img = document.getElementById('face_img'),
		code = document.getElementById('code');
	face_img.onclick=function(){
		window.open('face.php','face','width=400,height=400,top=0,left=0,scrollbars=1');
	}
	code.onclick = function(){
		this.src = 'code.php?num='+Math.random();
	}


	//表单验证
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit = function(){
		console.log('hello');
		return false;
	}
}