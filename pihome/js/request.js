

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
			url += (url.indexOf("?") == -1 ? "?" : "&") + _data;
		_data = "";
		//alert(url);
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

	

function ac(letter){
	var currentid = letter.split("_")[0];
	var currentstatus = letter.split("_")[1];
	var lamp = "lamp_" + currentid;
	var btn1 = "btn1_" + currentid;
	var btn2 = "btn2_" + currentid;		
		if(currentstatus == "off"){  
			document.getElementById(lamp).src="images/lamp_off.png";
			document.getElementById(btn1).src="images/on_off.png";
			document.getElementById(btn2).src="images/off_on.png";
			var http = request('request.php', 'GET', {s: letter}, function(){ });
		}else{
			document.getElementById(lamp).src="images/lamp_on.png";
			document.getElementById(btn1).src="images/on_on.png";
			document.getElementById(btn2).src="images/off_off.png";
			var http = request('request.php', 'GET', {s: letter}, function(){ });   			
		}
}
	


function refresh(){
 	$('#lights').load('lights.php');
 }	 
 
 
 
function alloff(){
 	if(confirm('All Devices off?')){
		request('alloff.php', 'GET', {s: ""}, function(){ $('#lights').load('lights.php'); } );
	}
}


	
	
