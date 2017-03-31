window.onload = function(){
	var face_img = opener.document.getElementById('face_img'),
		head_img = opener.document.getElementById('head_img');
	var img = document.getElementsByTagName('img');
	for(var i = 0;i<img.length;i++){
		img[i].onclick = function(){
			face_img.src = this.src;
			head_img.value = this.src;
		}
	}
}