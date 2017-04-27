window.onload = function(){
	var _return = document.getElementById("return");
	var _delete = document.getElementById("delete");
	_return.onclick = function(){
		history.back();
	}
	_delete.onclick = function(){
		if(confirm('确定要删除么？')){
			location.href = '?action=delete&id='+this.name;
		}
	}
}