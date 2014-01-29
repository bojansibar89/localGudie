var currentLocation;
var latitude=46.905246;
var longitude=8.104477;
function watchLocation(successCallback, errorCallback) {
  successCallback = successCallback || function(){};
  errorCallback = errorCallback || function(){};

  // Try HTML5-spec geolocation.
  var geolocation = navigator.geolocation;

  if (geolocation) {
    // We have a real geolocation service.
    try {
      function handleSuccess(position) {
        successCallback(position.coords);
		var url="http://maps.googleapis.com/maps/api/geocode/json?latlng="+
        position.coords.latitude+","+position.coords.longitude+"&sensor=true";
		latitude=position.coords.latitude;
		longitude=position.coords.longitude;
		/* alert('url '+url); */
		
		var xhr = createCORSRequest('POST', url);
			   if (!xhr) {
				 alert('CORS not supported');
			   }
			 
			   xhr.onload = function() {
			
				var data = JSON.parse(xhr.responseText);
				
				if(data.results.length>0) {
				
					var locationDetails = data.results[0].formatted_address;
					var  value = locationDetails.split(",");
				
					/* count = value.length;
				
					country = value[count-1];
					state = value[count-2];
					city = value[count-3];
					pin = state.split(" ");
					pinCode = pin[pin.length-1];
					state = state.replace(pinCode,' ');    */   
					
					currentLocation = value[1]+', '+value[2];
					document.getElementById("input_search_bar_m").value = value[1]+', '+value[2];
					document.getElementById("search_desktop_d").value = value[1]+', '+value[2];
					document.getElementById("search_desktop_d").style.color = "Gray"; 
					
					/* alert(locationDetails); */
					
				} else {
					/* document.getElementById("messageBox").style.visibility="visible"; */
					document.getElementById("input_search_bar_m").value = 'No location available for provided details.';
					document.getElementById("search_desktop_d").value = 'No location available for provided details.';
				}
				
			   };

			   xhr.onerror = function() {
					alert('Location: there was an error making the request.');	   
			   };
			xhr.send();
      }

      geolocation.watchPosition(handleSuccess, errorCallback, {
        enableHighAccuracy: true,
        maximumAge: 5000 // 5 sec.
      });
    } catch (err) {
      errorCallback();
    }
  } else {
    errorCallback();
  }
  
  
}
function posOfFooter(){
	var hight_100 = window.innerHeight;
	//alert(hight_100);
	if(hight_100<1500)
	{
		document.getElementByid('footer').setAttribute("style", "top: 1550px;");
	}
}

function init() {
  watchLocation(function(coords) {
    /* document.getElementById('input_search_bar').value = 'coords: ' + coords.latitude + ',' + coords.longitude; */
  }, function() {
    /* document.getElementById('input_search_bar').value = 'error'; */
  });
  posOfFooter();
  
}

function createCORSRequest(method, url) {
	  var req = new XMLHttpRequest();

	  if ("withCredentials" in req) {
		// XHR for Chrome/Firefox/Opera/Safari.
		req.open(method, url, true);

	  } else if (typeof XDomainRequest != "undefined") {
		// XDomainRequest for IE.
		req = new XDomainRequest();
		req.open(method, url);

	  } else {
		// CORS not supported.
		req = null;
	  }
	  return req;
}
function refreshMap()
{
	
	initMap();
	/* setInterval("initMap()", 120000); */
	 if(latitude==46.905246){
		myTimer = setTimeout("refreshMap()", 10000);
	}
	else{
		
		setTimeout("initMap()", 100);
		//alert('asdasdasdas');
		
	}
}


function initMap()
{
	//alert('ponovo');
	var myLatlng = new google.maps.LatLng( latitude, longitude);
        var map_options = {
          zoom: 8,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
		
       map_container = document.getElementById('map_canvas_m');
       var map = new google.maps.Map(map_container, map_options);
	   if(latitude!=46.905246){
	   var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title:"You are here!"
		});
		}
}