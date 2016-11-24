var Coments = {
		
	start: function() {
		document.getElementById('send_coment').onclick = function(e) {
			e.preventDefault();
			Coments.createComents();
		}
		
		var i;
		
		for(i = 0; i < document.getElementsByClassName('delete_coment').length; i++ ) {
			document.getElementsByClassName('delete_coment')[i].onclick = function(e) {
				e.preventDefault();
				Coments.deleteComents(e);
			}
		}
		
		for(i = 0; i < document.getElementsByClassName('coment_rating').length; i++ ) {
			document.getElementsByClassName('coment_rating')[i].onclick = function(e) {
				e.preventDefault();
				Coments.addRating(e);
			}
		}
	},
	
	url: '',
		
	createComents: function() {
		
		if(document.getElementById('coment').value == '') {
			alert('empty coment');
		} else {
			Coments.axaj('create', 'text=' + document.getElementById('coment').value, Coments.changeComents);
		}
	},
	
	deleteComents: function(e) {
		Coments.axaj('delete', 'id=' + e.path[0].getAttribute('data-delete'), Coments.changeComents);
	},
	
	addRating: function(e) {
		Coments.axaj('add', 'data=' + e.path[0].innerHTML + ',' + e.path[0].getAttribute('data-id'), Coments.changeComents);
	},
	
	changeComents: function(responce) {
		if(responce == 'error') {
			alert('error');
		} else if(responce != '') {
			document.getElementById('url').innerHTML = responce;
			Coments.start();
		}
	},
	
	axaj: function(action, data, callback){
		
		var xmlhttp;

	    xmlhttp = new XMLHttpRequest();

	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

	        	callback(xmlhttp.responseText);
	        }
	    }
	    
		xmlhttp.open("POST", "/coments/" + action + '/' + Coments.url, true);
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xmlhttp.send(data);
	}
}

window.onload = function() {
	Coments.url = document.getElementById('url').getAttribute('data-url');
	Coments.start();
}