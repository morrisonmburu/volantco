function dispatch() {

  const mapStyle = [
  {
    elementType: 'geometry',
    stylers: [
      {
        color: '#eceff1'
      }
    ]
  },
  {
    elementType: 'labels',
    stylers: [
      {
        visibility: 'on'
      }
    ]
  },
  {
    featureType: 'administrative',
    elementType: 'labels',
    stylers: [
      {
        visibility: 'on'
      }
    ]
  },
  {
        "featureType": "administrative.country",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#839192"
            }
        ]
    },
  {
    featureType: 'road',
    elementType: 'geometry',
    stylers: [
      {
        color: '#cfd8dc'
      }
    ]
  },
  {
    featureType: 'road',
    elementType: 'geometry.stroke',
    stylers: [
      {
        visibility: 'on'
      }
    ]
  },
  {
    featureType: 'road.local',
    stylers: [
      {
        visibility: 'on'
      }
    ]
  },
  {
    featureType: 'water',
    stylers: [
      {
        color: '#46bcec'
      }
    ]
  }
];

  var directionsService = new google.maps.DirectionsService();
  var directionsRenderer = new google.maps.DirectionsRenderer();

  var mapProp= {
	center:new google.maps.LatLng(-1.28333,36.81667),
	// disableDefaultUI: true,
  styles: mapStyle, 
	zoom:13,
  };

  infoWindow = new google.maps.InfoWindow;
			
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

  directionsRenderer.setMap(map);

  var to = document.getElementById('to').value
  var from = document.getElementById('from').value
  $("#to").change(function(){
     calculateAndDisplayRoute(directionsService, directionsRenderer, map); 
  });

}

  function calculateAndDisplayRoute(directionsService, directionsRenderer, map) {

    var stopovers = $("#stopovers").val();
    var points = JSON.parse(stopovers);

    var waypts = [];
      // var array = point;
      var checkboxArray = points           
      // console.log(checkboxArray);
      for (var i = 0; i < checkboxArray.length; i++) {
        if (checkboxArray[i] != "" && checkboxArray[i].name != 'N/A') {
          waypts.push({
            location: checkboxArray[i].name,
            stopover: true
          });
        }
      }

    var request = {
        origin: document.getElementById('from').value,
        destination: document.getElementById('to').value,
        waypoints: waypts,
        optimizeWaypoints: true,
        travelMode: google.maps.TravelMode.DRIVING
      };

  	directionsService.route(request, function (response, status) {

        if (status == google.maps.DirectionsStatus.OK) {
          directionsRenderer.setDirections(response);
          directionsRenderer.setMap(map);
        } else {
          alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
        }
      });
}
