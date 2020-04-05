function dispatch() {
  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer();

  var mapProp= {
	center:new google.maps.LatLng(-1.28333,36.81667),
	// disableDefaultUI: true, 
	zoom:13,
  };

  infoWindow = new google.maps.InfoWindow;
			
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  directionsRenderer.setMap(map);

  calculateAndDisplayRoute(directionsService, directionsRenderer);

}

  function calculateAndDisplayRoute(directionsService, directionsRenderer) {
  	directionsService.route(
  	{
  		origin: {query: document.getElementById('to').value},
  		destination: {query: document.getElementById('from').value},
  		travelMode: 'DRIVING'
  	},
  	function(response, status) {
  		if (status === 'OK') {
  			directionsRenderer.setDirections(response);
  		} else {
  			window.alert('Directions request failed due to ' + status);
  		}
  	});
}
