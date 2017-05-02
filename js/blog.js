window.onload = function(){

	var message = document.getElementsByName('message');
	var friend = document.getElementsByName('friend');
	//console.log(message);
	for(var i = 0;i<message.length;i++){
		message[i].onclick = function(){
			centerWindow('message.php?id='+this.title,'message');
		}
	}

	for(var i = 0;i<friend.length;i++){
		friend[i].onclick = function(){
			centerWindow('friend.php?id='+this.title,'friend');
		}
	}
}


function centerWindow(url,name,height=280,width=400){
	var left = (screen.width-width)/2;
	var top = (screen.height-height)/2;
	window.open(url,name,'height='+height+',width='+width+',left='+left+',top='+top);
}