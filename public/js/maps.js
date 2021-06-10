function myMap() {

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

  const NAIROBI_METROPOLITAN_BOUNDS = {
	  north: -0.9495592,
	  south: -1.5404732,
	  west: 36.530552,
	  east: 37.2369496
	};

  var mapProp= {
	center:new google.maps.LatLng(-1.2832207,36.8198298),
	disableDefaultUI: true,
	styles:mapStyle, 
	restriction: {
      latLngBounds: NAIROBI_METROPOLITAN_BOUNDS,
      strictBounds: true
    },
	zoom:12,
	mapTypeId: "roadmap"
  };

  infoWindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
  	navigator.geolocation.getCurrentPosition(function(position) {
		var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};

		infoWindow.setPosition(pos);
		infoWindow.setContent('Location found.');
		infoWindow.open(map);
		map.setCenter(pos);
	}, function() {
		handleLocationError(true, infoWindow, map.getCenter());
	});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}
			
	var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

	map.setTilt(180);

	var card = document.getElementById('pac-card');
	var input = document.getElementById('pac-input');
	var input2 = document.getElementById('pac-input2');
	// map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

	//bounds
	var boundlat1 = 0;
	var boundlong1 = 0;

	var boundlat2 = 0
	var boundlong2 = 0;

	var point = [];
	var namepoint = [];
	var locations = [];
	
	var origin = '';
	var destination = ''; 
	//Autocomplete

	var autocomplete = new google.maps.places.Autocomplete(input);
	var autocomplete2 = new google.maps.places.Autocomplete(input2);

	// Bind the map's bounds (viewport) property to the autocomplete object,
	// so that the autocomplete requests use the current map bounds for the
	// bounds option in the request.
	autocomplete.bindTo('bounds', map);
	autocomplete2.bindTo('bounds', map);

    autocomplete.setOptions({strictBounds: true});
    autocomplete2.setOptions({strictBounds: true});

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
			map.setZoom(12); 
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(12);  // Why 17? Because it looks good.
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

		origin = place.name

		locations.push({
			lat: place.geometry.location.lat(),
			lng: place.geometry.location.lng(),
			name: place.name+address,
			is_stopover: 0,
			is_destination: 0,
			place_id: place.place_id,
		});

		$('#origin').val(place.name+address);

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
			map.setZoom(12);
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(12);  // Why 17? Because it looks good.
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

		destination = place.name

		locations.push({
			lat: place.geometry.location.lat(),
			lng: place.geometry.location.lng(),
			name: place.name+address,
			is_stopover: 0,
			is_destination: 1,
			place_id: place.place_id,
		});

		$('#destination').val(place.name+address);
		$('#stopoverlocation').val(JSON.stringify(locations)); 
		
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
		calculateDistance(origin, destination);
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

		autocomplete3.setFields(['place_id', 'address_components', 'geometry', 'icon', 'name']);

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
		locations.push({
			lat: place.geometry.location.lat(),
			lng: place.geometry.location.lng(),
			name: place.name+address,
			is_stopover: 1,
			is_destination: 0,
			place_id: place.place_id,
		});

		// console.log(JSON.stringify(stopoverlocation));

		$('#stopoverlocation').val(JSON.stringify(locations)); 

		calculateRoute(point, namepoint);
		});

		//calculating Route

		var icon2 = {
		    url: "/images/placeholder.png", // url
		    scaledSize: new google.maps.Size(60, 60), // scaled size
		};

		function calculateRoute(){
				var waypts = [];
		        // var array = point;
		        var checkboxArray = point		        
		        // console.log(checkboxArray);
		        for (var i = 0; i < checkboxArray.length && namepoint.length; i++) {
		          if (checkboxArray[i] != "") {
		            waypts.push({
		              location: checkboxArray[i],
		              stopover: true
		            });
		            createMarker(checkboxArray[i], namepoint[i]);
		          }
		        }

		        // console.log(waypts);
			var request = {
				origin: marker.position,
				destination: marker2.position,
				waypoints: waypts,
		        optimizeWaypoints: true,
				travelMode: google.maps.TravelMode.DRIVING
			};

			// console.log(request);

			directionsService.route(request, function (response, status) {

				if (status == google.maps.DirectionsStatus.OK) {
					directionsRenderer.setDirections(response);
					directionsRenderer.setMap(map);
				} else {
					alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
				}
			});
		}

		function createMarker(latlng, name) {

		    var marker3 = new google.maps.Marker({
		        position: latlng,
		        map: map
		    });

		    var contentString = '<div id="infowindow-content-stop"><span id="place-name3">'+name+'</span><br></div>';
    		
    		var infowindow3 = new google.maps.InfoWindow({
	          content: contentString
	        });

		    marker3.addListener('click', function() {
	          infowindow3.open(map, marker3);
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

		function calculateDistance(origin, destination){
		var origin = origin
		var destination = destination
		var service = new google.maps.DistanceMatrixService();
		service.getDistanceMatrix(

			{
				origins: [origin],
				destinations: [destination],
				travelMode: 'DRIVING',
				unitSystem: google.maps.UnitSystem.IMPERIAL,
				avoidHighways: true,
				avoidTolls: true
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