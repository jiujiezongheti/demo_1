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
		//能用客户端验证的尽量用客户端
		if(this.uname.value.length<2||this.uname.value.length>20){
			alert('用户名不得小于2位或者大于20位');
			this.uname.value = '';
			this.uname.focus();//将光标移动到用户名输入框
			return false;
		}
		if(/[<>\'\"\ \ ]/.test(this.uname.value)){
			alert('用户名不得包含敏感字符<>\'"以及空格');
			this.uname.value = '';
			this.uname.focus();
			return false;
		}

		//验证密码
		if(this.pwd.value.length<6){
			alert('密码不得小于6位');
			this.pwd.value = '';
			this.pwd.focus();//将光标移动到用户名输入框
			return false;
		}
		if(this.pwds.value != this.pwd.value){
			alert('2次输入密码得一致');
			this.pwds.value = '';
			this.pwds.focus();
			return false;
		}
		//密码提示于回答
		if(this.pwdt.value.length<2||this.pwdt.value.length>20){
			alert('密码提示不得小于2位或者大于20位');
			this.pwdt.value = '';
			this.pwdt.focus();
			return false;
		}
		if(this.pwdh.value.length<2||this.pwdh.value.length>20){
			alert('密码回答不得小于2位或者大于20位');
			this.pwdh.value = '';
			this.pwdh.focus();
			return false;
		}
		if(this.pwdt.value == this.pwdh.value){
			alert('密码提示和回答不能一样');
			this.pwdh.value = '';
			this.pwdh.focus();
			return false;
		}
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
		console.log('success');
		return true;
	}
}