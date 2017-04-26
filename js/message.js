window.onload = function(){
	code();

	//表单验证
	var fm = document.getElementsByTagName('form')[0];
	fm.onsubmit = function(){
		if(this.content.value.length<10||this.content.value.length>200){
			alert('短信内容不得小于10位或者大于200位');
			this.content.focus();//将光标移动到用户名输入框
			return false;
		}
		return true;
	}
}