window.onload = function(){
	var face_img = document.getElementById('face_img');
	face_img.onclick=function(){
		window.open('face.php','face','width=400,height=400,top=100,left=160,scrollbars=1');
	}
	code();
	//表单验证
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit = function(){
		//能用客户端验证的尽量用客户端
		//邮箱
		if(!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(this.email.value)&&this.email.value){
			alert('邮箱格式有误');
			this.email.value = '';
			this.email.focus();
			return false;
		}
		//qq
		if(!/^[1-9]{1}[0-9]{4,9}$/.test(this.qq.value)&&this.qq.value){
			alert('qq格式有误');
			this.qq.value = '';
			this.qq.focus();
			return false;
		}
		//主页地址
		if(!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(this.url.value)&&this.url.value!='http://'){
			alert('url格式有误');
			this.url.value = 'http://';
			this.url.focus();
			return false;
		}
		return true;
	}
}
