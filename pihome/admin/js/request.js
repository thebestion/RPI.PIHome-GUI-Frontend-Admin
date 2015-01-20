

function request(url, method, data, callback) {
	var http = new XMLHttpRequest;
	if (!http)
		return false;
	var _data;
	if (data != null && typeof data == "object") {
		_data = [];
		for (var i in data)
			_data.push(i + "=" + data[i]);
		_data = _data.join("&");
	} else {
		_data = data;
	}
	method = method.toUpperCase();
	if (method == "POST") {
		http.open(method, url, true);
		http.setRequestHeader("Method", "POST "+url+" HTTP/1.1");
		http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	} else {
		if (_data)
			url += _data;
		_data = "";
		http.open(method, url, true);
	}
	if (callback)
		http.onreadystatechange = function() {
			if (http.readyState == 4) {
				http.onreadystatechange = function(){};
				callback(http, data);
			}
		};
	http.send(_data);
	return http;
}

	
function toggle_add_device(){
	var img_device = document.getElementById("add_image_device");
	if(img_device.name=="0"){
		$("#add_device").slideToggle("fast"); 
		img_device.name = "1";
		img_device.src = "images/add_off.png";				
	}else if(img_device.name=="1"){
		$("#add_device").slideToggle("fast"); 
		img_device.name = "0";
		img_device.src = "images/add.png";				
	}		
}


function toggle_add_rooms(){
	var img_device = document.getElementById("add_image_room");
	if(img_device.name=="0"){
		$("#add_room").slideToggle("fast"); 		
		img_device.name = "1";
		img_device.src = "images/add_off.png";				
	}else if(img_device.name=="1"){
		$("#add_room").slideToggle("fast"); 
		img_device.name = "0";
		img_device.src = "images/add.png";				
	}
}


function del_device(wid){
	if(confirm('Delete Device?')){
		var quest = "?w=device&o=delete&wid=" + wid;
		request('request.php', 'GET', quest, function(){ $('#lights').load('lights.php'); } );
	}
}


function del_room(wid){
	if(confirm('Delete Room?')){
		var quest = "?w=room&o=delete&wid=" + wid;
		request('request.php', 'GET', quest, function(){ $('#homerooms').load('rooms.php'); } );
	}
}


function aktiv_device(wid){
	var quest = "?w=device&o=aktiv&wid=" + wid;
	request('request.php', 'GET', quest, function(){ $('#lights').load('lights.php'); } );
}




function add_device(){
	var device_aktiv = document.getElementsByName("aktiv")[0].value;
	var device_name  = document.getElementsByName("device_name")[0].value;
	var room_id      = document.getElementsByName("room_id")[0].value;
	var letter       = document.getElementsByName("letter")[0].value;
	var c1  		 = document.getElementsByName("c1")[0].value;
	var c2		     = document.getElementsByName("c2")[0].value;
	var c3		     = document.getElementsByName("c3")[0].value;
	var c4	    	 = document.getElementsByName("c4")[0].value;
	var c5   		 = document.getElementsByName("c5")[0].value;
	var device_sort	 = document.getElementsByName("sort")[0].value;				
	var params = "?w=device&o=insert&aktiv=" + device_aktiv + "&device_name=" + device_name + "&room=" + room_id + "&letter=" + letter + "&code=" + c1 + c2 + c3 + c4 + c5 + "&sort=" + device_sort;
	if(device_name!=""){
		request('request.php', 'GET', params, function(){ window.location.reload(); } );
	}
}


function add_room(){
	var room_name   = document.getElementsByName("room")[0].value;
	var params 		= "?w=room&o=insert&room_name=" + room_name;
	if(room_name!=""){
		request('request.php', 'GET', params, function(){ window.location.reload(); } );
	}
}





function update_device(id){		
	document.getElementById('work_device').style.display = "block";			
	document.getElementById('add_device_btn').style.display = "none";
	document.getElementById('work_device_btn').style.display = "block";
	document.getElementById('add_device').style.display = "none";
	$('#work_device').load('work.php?w=' + id + '&o=device');				
}

function update_device_send(id){
	document.getElementById('work_device').style.display = "none";
	document.getElementById('work_device_btn').style.display = "none";
	document.getElementById('add_device_btn').style.display = "block";
	document.getElementById('add_device').style.display = "none";
	var img_device = document.getElementById("add_image_device");
	img_device.name = "0";
	img_device.src = "images/add.png";		
	var device_aktiv = document.getElementsByName("waktiv")[0].value;
	var device_name  = document.getElementsByName("wdevice_name")[0].value;
	var room_id      = document.getElementsByName("wroom_id")[0].value;
	var letter       = document.getElementsByName("wletter")[0].value;
	var c1  		 = document.getElementsByName("wc1")[0].value;
	var c2		     = document.getElementsByName("wc2")[0].value;
	var c3		     = document.getElementsByName("wc3")[0].value;
	var c4	    	 = document.getElementsByName("wc4")[0].value;
	var c5   		 = document.getElementsByName("wc5")[0].value;
	var device_sort	 = document.getElementsByName("wsort")[0].value;				
	var params = "?wid=" + id + "&w=device&o=update&aktiv=" + device_aktiv + "&device_name=" + device_name + "&room=" + room_id + "&letter=" + letter + "&code=" + c1 + c2 + c3 + c4 + c5 + "&sort=" + device_sort;
	if(device_name!=""){
		request('request.php', 'GET', params, function(){ window.location.reload(); } );
	}
}

function close_work_device(){
	document.getElementById('work_device').style.display = "none";
	document.getElementById('work_device_btn').style.display = "none";
	document.getElementById('add_device_btn').style.display = "block";		
	document.getElementById('add_device').style.display = "none";
	var img_device = document.getElementById("add_image_device");
	img_device.name = "0";
	img_device.src = "images/add.png";
}







function update_room(id){
	document.getElementById('work_room').style.display = "block";			
	document.getElementById('add_room_btn').style.display = "none";
	document.getElementById('work_room_btn').style.display = "block";
	document.getElementById('add_room').style.display = "none";
	$('#work_room').load('work.php?w=' + id + '&o=room');	
}

function update_room_send(id){
	document.getElementById('work_room').style.display = "none";
	document.getElementById('work_room_btn').style.display = "none";
	document.getElementById('add_room_btn').style.display = "block";
	document.getElementById('add_room').style.display = "none";
	var img_room = document.getElementById("add_image_room");
	img_room.name = "0";
	img_room.src = "images/add.png";
	var room_name = document.getElementsByName("wroom")[0].value;
	var params = "?wid=" + id + "&w=room&o=update&room_name=" + room_name;
	if(room_name!=""){
		request('request.php', 'GET', params, function(){ window.location.reload(); } );
	}
}

function close_work_room(){
	document.getElementById('work_room').style.display = "none";
	document.getElementById('work_room_btn').style.display = "none";
	document.getElementById('add_room_btn').style.display = "block";		
	document.getElementById('add_room').style.display = "none";
	var img_room = document.getElementById("add_image_room");
	img_room.name = "0";
	img_room.src = "images/add.png";
}
	
	