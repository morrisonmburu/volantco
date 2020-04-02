	<script src="{{ mix('js/bootstrap.js') }}"></script>
        <script src="{{ mix('js/app.js') }}"></script>

		<script>
          function myMap() {
                var directionsService = new google.maps.DirectionsService();
                var directionsRenderer = new google.maps.DirectionsRenderer();

                var mapProp= {
                  center:new google.maps.LatLng(-1.28333,36.81667),
                  disableDefaultUI: true, 
                  zoom:12,
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

                directionsRenderer.setMap(mapProp);

                // var onChangeHandler = function() {
                // calculateAndDisplayRoute(directionsService, directionsRenderer);
                //   };
                // document.getElementById('pac-input').addEventListener('change', onChangeHandler);
                // document.getElementById('pac-input2').addEventListener('change', onChangeHandler);
                //   }

                //   function calculateAndDisplayRoute(directionsService, directionsRenderer) {
                //     directionsService.route(
                //       {
                //         origin: {query: document.getElementById('pac-input').value},
                //         destination: {query: document.getElementById('pac-input2').value},
                //         travelMode: 'DRIVING'
                //       },
                //       function(response, status) {
                //         if (status === 'OK') {
                //           directionsRenderer.setDirections(response);
                //         } else {
                //           window.alert('Directions request failed due to ' + status);
                //         }
                //       });

                //   }

                var card = document.getElementById('pac-card');
                var input = document.getElementById('pac-input');
                var input2 = document.getElementById('pac-input2');

                var types = document.getElementById('type-selector');
                var strictBounds = document.getElementById('strict-bounds-selector');

                map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

                var autocomplete = new google.maps.places.Autocomplete(input);
                var autocomplete2 = new google.maps.places.Autocomplete(input2);
                      // console.log(autocomplete2);

                      // Bind the map's bounds (viewport) property to the autocomplete object,
                      // so that the autocomplete requests use the current map bounds for the
                      // bounds option in the request.
                      autocomplete.bindTo('bounds', map);
                      autocomplete2.bindTo('bounds', map);

                      // Set the data fields to return when the user selects a place.
                      autocomplete.setFields(
                        ['address_components', 'geometry', 'icon', 'name']);
                      autocomplete2.setFields(
                        ['address_components', 'geometry', 'icon', 'name']);

                      var infowindow = new google.maps.InfoWindow();
                      var infowindowContent = document.getElementById('infowindow-content');
                      infowindow.setContent(infowindowContent);
                      var marker = new google.maps.Marker({
                        map: map,
                        anchorPoint: new google.maps.Point(0, -29)
                      });

                      var marker2 = new google.maps.Marker({
                        map: map,
                        anchorPoint: new google.maps.Point(0, -29),
                        icon: {
					      url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
					    }
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

                        $('#origin').val(address);

                        infowindowContent.children['place-icon'].src = place.icon;
                        infowindowContent.children['place-name'].textContent = place.name;
                        infowindowContent.children['place-address'].textContent = address;
                        infowindow.open(map, marker);
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

                        $('#destination').val(address);

                        infowindowContent.children['place-icon'].src = place.icon;
                        infowindowContent.children['place-name'].textContent = place.name;
                        infowindowContent.children['place-address'].textContent = address;
                        infowindow.open(map, marker2);

                        calculateRoute();
                        calculateDistance();
                      });

                      // map.fitBounds(bounds);

                      function calculateRoute(){

                        var request = {
                        origin: marker.position,
                        destination: marker2.position,
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

                      // Sets a listener on a radio button to change the filter type on Places
                      // Autocomplete.
                      // function setupClickListener(id, types) {
                      //   var radioButton = document.getElementById(id);
                      //   radioButton.addEventListener('click', function() {
                      //     autocomplete.setTypes(types);
                      //     autocomplete2.setTypes(types);
                      //   });
                      // }

                      // setupClickListener('changetype-all', []);
                      // setupClickListener('changetype-address', ['address']);
                      // setupClickListener('changetype-establishment', ['establishment']);
                      // setupClickListener('changetype-geocode', ['geocode']);

                      // document.getElementById('use-strict-bounds')
                      // .addEventListener('click', function() {
                      //   console.log('Checkbox clicked! New state=' + this.checked);
                      //   autocomplete.setOptions({strictBounds: this.checked});
                      //   autocomplete2.setOptions({strictBounds: this.checked});
                      // });

                    }

                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                    	infoWindow.setPosition(pos);
                    	infoWindow.setContent(browserHasGeolocation ?
                    		'Error: The Geolocation service failed.' :
                    		'Error: Your browser doesn\'t support geolocation.');
                    	infoWindow.open(map);
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
                          // console.log(response.rows[0].elements[0].distance);
                          var distance_in_kilo = distance.value / 1000;
                          var distance_in_mile = distance.value / 1609.34;
                          var duration_text = duration.text;
                          var duration_value = duration.value;
                          // console.log(distance_in_mile.toFixed(2))
                          // $('#in_mile').text(distance_in_mile.toFixed(2));
                          // $('#in_kilo').text(distance_in_kilo.toFixed(2));
                          $('#duration_text').val(duration_value/60);
                          $('#duration_value').text(duration_value);
                          // $('#from').text(origin);
                          // $('#to').text(destination);
                      }
                  }
              }
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=myMap"></script>

		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PGP55HF');</script>
    </body>
 </html>