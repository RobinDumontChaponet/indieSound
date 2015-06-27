window.addEventListener('onload', function() {
	var subs = document.getElementsByClassName('sub');
	if(subs) {
		for(var i=0, l = subs.length; i<l; i++) {
			var sub = subs[i].getElementsByTagName('a')[0];
			sub.addEventListener('onmouseover', function(){
				
			}, false);
		}
	}		
},false);