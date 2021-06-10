function estimate() {

    var input = document.getElementById('pickup');
	var input2 = document.getElementById('destination');

    var autocomplete = new google.maps.places.Autocomplete(input);
    var autocomplete2 = new google.maps.places.Autocomplete(input2);

    autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);
	autocomplete2.setFields(['address_components', 'geometry', 'icon', 'name']);

    // console.log(autocomplete);

    autocomplete.addListener('place_changed', function() {
		var place = autocomplete.getPlace();
		if (!place.geometry) {
			// User entered the name of a Place that was not suggested and
			// pressed the Enter key, or the Place Details request failed.
			window.alert("No details available for input: '" + place.name + "'");
			return;
		}

		var address = '';
		if (place.address_components) {
			address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
		}

        $('#origin').val(place.name+address);
        });

        autocomplete2.addListener('place_changed', function() {
            var place = autocomplete2.getPlace();

            if (!place.geometry) {
                // User entered the name of a Place that was not suggested and
                // pressed the Enter key, or the Place Details request failed.
                window.alert("No details available for input: '" + place.name + "'");
                return;
            }

            var address = '';
            if (place.address_components) {
                address = [
                  (place.address_components[0] && place.address_components[0].short_name || ''),
                  (place.address_components[1] && place.address_components[1].short_name || ''),
                  (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');

                }

            $('#destination').val(place.name+address);

            // calculateRoute();
            calculateDistance();
        });

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
                        $('#time').val(duration_value/60);
                        $('#duration_vlue').text(duration_value);
                        // $('#from').text(origin);
                        // $('#to').text(destination);
                    }
                }
            }

}
