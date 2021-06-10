function tracker() {

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
	zoom:8,
  };

  infoWindow = new google.maps.InfoWindow;
			
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
  $("#track").hide();

  directionsRenderer.setMap(map);

  var to = document.getElementById('to').value
  var from = document.getElementById('from').value
  $("#to").change(function(){
     calculateAndDisplayRoute(directionsService, directionsRenderer, map); 
  });

}

function calculateAndDisplayRoute(directionsService, directionsRenderer, map) {
    $("#track").show()
    //calculate time left

    momentFunction();

    var to = document.getElementById('to').value;
    var from = document.getElementById('from').value;
    var amount = document.getElementById('amount').value;
    var package = document.getElementById('package').value;
    var name = document.getElementById("name").value;

    $("#showTo").text(to)
    $("#showFrom").text(from)
    $("#showAmount").text(amount)
    $("#showPackage").text(package)
    $("#showName").text(name)

    var stopovers = $("#stopovers").val();
    var points = JSON.parse(stopovers);

    var waypts = [];
      // var array = point;
      var checkboxArray = points           
      // console.log(checkboxArray);
      for (var i = 0; i < checkboxArray.length; i++) {
        if (checkboxArray[i] != "") {
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

function momentFunction(){
        // if time to countdown
        var a = setInterval(function(){

          var time = $("#time").val();

            var $clock = eventTime = moment(time).unix();
            var currentTime = moment().unix();
            var diffTime = eventTime - currentTime;
            var duration = moment.duration(diffTime * 1000, 'milliseconds');
            var interval = 1000;
            $("#days").empty();
            $("#hours").empty();
            $("#mins").empty();
            $("#secs").empty();
            var duration = moment.duration(duration.asMilliseconds() - interval, 'milliseconds');
            var d = moment.duration(duration).days(),
            h = moment.duration(duration).hours(),
            m = moment.duration(duration).minutes(),
            s = moment.duration(duration).seconds();

            d = $.trim(d).length === 1 ? '0' + d : d;
            h = $.trim(h).length === 1 ? '0' + h : h;
            m = $.trim(m).length === 1 ? '0' + m : m;
            s = $.trim(s).length === 1 ? '0' + s : s;

              // show how many hours, minutes and seconds are left
              $("#days").html(d+' '+'days');
              $("#hours").html(h+' '+'hours');
              $("#mins").html(m+' '+'mins');
              $("#secs").html(s+' '+'secs');
        
            }, 1000);
      }
