window.onload = function(){
	code();
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
	}
}