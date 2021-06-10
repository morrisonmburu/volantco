function moves() {

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
  var directionsRenderer = new google.maps.DirectionsRenderer({suppressMarkers: true});
  var pos = []
// Try HTML5 geolocation.
  if (navigator.geolocation) {
  	navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};

		var icon4 = {
	    url: "/images/signs.png", // url
	    scaledSize: new google.maps.Size(60, 60), // scaled size
		};

		var marker4 = new google.maps.Marker({
			position: pos,
			map: map,
			anchorPoint: new google.maps.Point(0, -29),
			icon: icon4
		});

		marker4.addListener('click', function() {
          	infoWindow.setPosition(pos);
			infoWindow.setContent('Location found.');
			infoWindow.open(map, marker4);
        });

		map.setCenter(pos);
	}, function() {
		handleLocationError(true, infoWindow, map.getCenter());
	});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}

	var mapProp= {
		center:new google.maps.LatLng(pos),
		disableDefaultUI: true,
		styles:mapStyle, 
		zoom:15,
	  };

	  infoWindow = new google.maps.InfoWindow;
				
		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

	// var card = document.getElementById('pac-card');
	// var card2 = document.getElementById('moves_card');
	var input = document.getElementById('pac-input');
	var input2 = document.getElementById('pac-input2');
	var types = document.getElementById('type-selector');
	// map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
	// map.controls[google.maps.ControlPosition.CENTER].push(card2);

	//bounds
	var boundlat1 = 0;
	var boundlong1 = 0;

	var boundlat2 = 0
	var boundlong2 = 0;

	var point = [];
	var namepoint = [];
	var locations = [];
	
	//Autocomplete

	var autocomplete = new google.maps.places.Autocomplete(input);
	var autocomplete2 = new google.maps.places.Autocomplete(input2);

	// Bind the map's bounds (viewport) property to the autocomplete object,
	// so that the autocomplete requests use the current map bounds for the
	// bounds option in the request.
	autocomplete.bindTo('bounds', map);
	autocomplete2.bindTo('bounds', map);

	// Set the data fields to return when the user selects a place.
	autocomplete.setFields(['place_id', 'address_components', 'geometry', 'icon', 'name']);
	autocomplete2.setFields(['place_id', 'address_components', 'geometry', 'icon', 'name']);

	var infowindow = new google.maps.InfoWindow();
	var infowindow2 = new google.maps.InfoWindow();
	var infowindowContentOrigin = document.getElementById('infowindow-content-origin');
	var infowindowContentDestination = document.getElementById('infowindow-content-destination');
	infowindow.setContent(infowindowContentOrigin);
	infowindow2.setContent(infowindowContentDestination);

	//origin marker

	var icon = {
	    url: "/images/signs.png", // url
	    scaledSize: new google.maps.Size(60, 60), // scaled size
	};

	var marker = new google.maps.Marker({
		map: map,
		anchorPoint: new google.maps.Point(0, -29),
		icon: icon
	});

	//Destination Marker


	var icon2 = {
	    url: "/images/placeholder.png", // url
	    scaledSize: new google.maps.Size(60, 60), // scaled size
	};

	var marker2 = new google.maps.Marker({
		map: map,
		anchorPoint: new google.maps.Point(0, -29),
		icon: icon2
	});

	autocomplete.addListener('place_changed', function() {
		infowindow.close();
		marker.setVisible(false);
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			// User entered the name of a Place that was not suggested and
			// pressed the Enter key, or the Place Details request failed.
			window.alert("No details available for input: '" + place.name + "'");
			return;
		}

		// If the place has a geometry, then present it on a map.
		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
			map.setZoom(15); 
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(15);  // Why 17? Because it looks good.
		}

		marker.setPosition(place.geometry.location);
		marker.setVisible(true);

		var address = '';
		if (place.address_components) {
			address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
		}

		locations.push({
			lat: place.geometry.location.lat(),
			lng: place.geometry.location.lng(),
			name: place.name,
			is_stopover: 0,
			is_destination: 0,
			place_id: place.place_id,
		});

		$('#origin').val(place.name);

		boundlat1 = place.geometry.location.lat()
		boundlong1 = place.geometry.location.lng()

		infowindowContentOrigin.children['place-icon'].src = place.icon;
		infowindowContentOrigin.children['place-name'].textContent = place.name;
		infowindowContentOrigin.children['place-address'].textContent = address;
		infowindow.open(map, marker);

		marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
		});

		autocomplete2.addListener('place_changed', function() {
		infowindow.close();
		marker2.setVisible(false);
		var place = autocomplete2.getPlace();

		if (!place.geometry) {
			// User entered the name of a Place that was not suggested and
			// pressed the Enter key, or the Place Details request failed.
			window.alert("No details available for input: '" + place.name + "'");
			return;
		}

		// If the place has a geometry, then present it on a map.
		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
			map.setZoom(15);
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(15);  // Why 17? Because it looks good.
		}
		marker2.setPosition(place.geometry.location);
		marker2.setVisible(true);

		var address = '';
		if (place.address_components) {
			address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
 
			}

		locations.push({
			lat: place.geometry.location.lat(),
			lng: place.geometry.location.lng(),
			name: place.name,
			is_stopover: 0,
			is_destination: 1,
			place_id: place.place_id,
		});

		$('#destination').val(place.name);
		$('#locations').val(JSON.stringify(locations));

		boundlat2 = place.geometry.location.lat()
		boundlong2 = place.geometry.location.lng()

		infowindowContentDestination.children['place-icon2'].src = place.icon;
		infowindowContentDestination.children['place-name2'].textContent = place.name;
		infowindowContentDestination.children['place-address2'].textContent = address;
		infowindow2.open(map, marker2);

		marker2.addListener('click', function() {
          infowindow2.open(map, marker2);
        });

		calculateRoute();
		calculateDistance();
		});

		var defaultBounds = new google.maps.LatLngBounds(
		  new google.maps.LatLng(boundlat1, boundlat2),
		  new google.maps.LatLng(boundlong1, boundlong2));

		var input = document.getElementById('stopover');

		var options = {
		  bounds: defaultBounds,
		  types: ['establishment']
		};

		autocomplete3 = new google.maps.places.Autocomplete(input);
		autocomplete3.bindTo('bounds', map);

		autocomplete3.addListener('place_changed', function() {
		var place = autocomplete3.getPlace();

		if (!place.geometry) {
			// User entered the name of a Place that was not suggested and
			// pressed the Enter key, or the Place Details request failed.
			window.alert("No details available for input: '" + place.name + "'");
			return;
		}

		var geometrylocation = '';
		var address = '';
		var loc = '';
		if (place.address_components) {
			geometrylocation = place.geometry.location;
			address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');

            loc = 'lat:'+place.geometry.location.lat()+' ,'+'lng:'+place.geometry.location.lng()+' ,'+'name:'+place.name+address;
            point.push(geometrylocation);
			namepoint.push(address) 
		}
		stopoverlocation.push({
			lat: place.geometry.location.lat(),
			lng: place.geometry.location.lng(),
			name: place.name+address,
		});

		// console.log(JSON.stringify(stopoverlocation));

		$('#stopoverlocation').val(JSON.stringify(stopoverlocation)); 

		calculateRoute(point, namepoint);
		});

		//calculating Route

		var icon2 = {
		    url: "/images/placeholder.png", // url
		    scaledSize: new google.maps.Size(60, 60), // scaled size
		};

		function calculateRoute(){
			var request = {
				origin: marker.position,
				destination: marker2.position,
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


		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
				'Error: The Geolocation service failed.' :
				'Error: Your browser doesn\'t support geolocation.');
			alert("Error: The Geolocation service failed., Error: Your browser doesn\'t support geolocation.");
			}

		function calculateDistance(){
		var origin = $('#origin').val();
		console.log(origin);
		var destination = $('#destination').val();
		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix(

			{
				origins: [origin],
				destinations: [destination],
				travelMode: google.maps.TravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.metric,
				avoidHighways: false,
				avoidTolls: false
			}, callback);
		}

		function callback(response, status){
			if (status != google.maps.DistanceMatrixStatus.OK) {
				$('#result').html(err);
			}else{
				var origin = response.originAddresses[0];
				var destination = response.destinationAddresses[0];

				if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
					$('#result').html("Better get on a plane. There are no roads between "+origin+"and" +destination);

				}else{
					var distance = response.rows[0].elements[0].distance;
					var duration = response.rows[0].elements[0].duration;
					var distance_in_kilo = distance.value / 1000;
					var distance_in_mile = distance.value / 1609.34;
					var duration_text = duration.text;
					var duration_value = duration.value;
					// $('#in_mile').text(distance_in_mile.toFixed(2));
					$('#distance').val(distance_in_kilo.toFixed(2));
					$('#duration_text').val(duration_value/60);
					$('#duration_value').text(duration_value);
					// $('#from').text(origin);
					// $('#to').text(destination);
				}
			}
		}