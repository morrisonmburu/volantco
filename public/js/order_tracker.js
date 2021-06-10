function orderTracker(){
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
	disableDefaultUI: true,
	styles: mapStyle, 
	zoom:8,
};

infoWindow = new google.maps.InfoWindow;

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

directionsRenderer.setMap(map);

var card = document.getElementById('track');
// map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

// var to = document.getElementById('to').value
// var from = document.getElementById('from').value
// $("#to").change(function(){
// 	calculateAndDisplayRoute(directionsService, directionsRenderer, map); 
// });

}