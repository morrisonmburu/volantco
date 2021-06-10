<style type="text/css">

#description {
	font-family: Roboto;
	font-size: 15px;
	font-weight: 300;
}

#infowindow-content .title {
	font-weight: bold;
}

#map #infowindow-content {
	display: inline;

}

#pac-container {
	padding-bottom: 12px;
	margin-right: 12px;
}

.pac-controls {
	display: inline-block;
	padding: 5px 11px;
}

.pac-controls label {
	font-family: Roboto;
	font-size: 13px;
	font-weight: 300;
}


#title {
	color: #fff;
	background-color: #4d90fe;
	font-size: 25px;
	font-weight: 500;
	padding: 6px 12px;
}

@media only screen and (max-width:800px) {
	/* For tablets: */
	.pac-card {
		width: 80%;
		padding: 0;
	}
}
@media only screen and (max-width:500px) {
	/* For mobile phones: */
	.pac-card {
		width: 100%;
	}

}

#googleMap{
	left:0;
	top:0;
	height:100%;
	width:100%;
	
}

.test{
	min-width: 0;
	display:flex;
}

  .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }


	.cards {
	  display: flex;
	  flex-direction: column;
	  transition-duration: 1s;
	  position: relative;
	  transform: translateZ(0px);
	  z-index: 10;
	  padding: 0;
	  float: left;
	  left: 0;

	}
	.card {
	  width: 600px;
	  background-color: #ffffff;
	  box-shadow: 0px 5px 10px #888888;
	  /*margin-top: 72px;
	  margin-left: 72px;*/
	}

.side {
  display: flex;
  flex-direction: column;
}

.header {
  height: 104px;
  position: relative;
}

.bus_logo {
  width: 64px;
  height: 64px;
  position: absolute;
  top: 24px;
  left: 16px;
}

.direction {
  font-size: 16px;
  position: relative;
  left: 96px;
  top: 19px;
}

.dark .direction {
  color: rgba(255, 255, 255, 0.7);
}

.light .direction {
  color: rgba(0, 0, 0, 0.5);
}

.headsign {
  font-size: 28px;
  font-weight: 500;
  position: absolute;
  left: 96px;
  top: 42px;
}

.dark .headsign {
  color: rgba(255, 255, 255, 0.97);
}

.light .headsign {
  color: rgba(0, 0, 0, 0.9);
}

.leaving-in-label {
  font-size: 16px;
  position: absolute;
  left: 384px;
  top: 19px;
}

.dark .leaving-in-label {
  color: rgba(255, 255, 255, 0.7);
}

.light .leaving-in-label {
  color: rgba(0, 0, 0, 0.5);
}

.leaving-in {
  font-size: 28px;
  font-weight: 500;
  position: absolute;
  left: 384px;
  top: 42px;
}

.dark .leaving-in {
  color: rgba(255, 255, 255, 0.97);
}

.light .leaving-in {
  color: rgba(0, 0, 0, 0.9);
}

.body .next-in-label {
  font-size: 16px;
  position: relative;
  left: 5px;
  bottom: 0;
  color: rgba(0, 0, 0, 0.5);
}

.body .next-in {
  font-size: 28px;
  font-weight: 400;
  position: relative;
  left: 0;
  bottom: 0;
  color: rgba(0, 0, 0, 0.6);
}

.stop-times {
  width: 80px;
  margin-right: 16px;
  margin-top: 24px;
  margin-bottom: 24px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
}

.stop-time {
  font-size: 18px;
  color: rgba(0, 0, 0, 0.6);
}

.stop-guide {
  width: 16px;
  margin-top: 24px;
  margin-bottom: 24px;
}

.stop-names {
  margin-left: 16px;
  margin-top: 24px;
  margin-bottom: 24px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-start;
}

.stop-name {
  font-size: 18px;
  color: rgba(0, 0, 0, 0.9);
}

</style>
<template>
	<div>

		<div class="cards" v-for="(item, i) in orders" id="track">
			<div 
	      class="card dark"
	      style="height: 200px"
	      >
	      <div class="header" style="background-color: #8F0236">
	        <div class="bus_logo">
	          <svg width="64px" height="64px" viewBox="0 0 64 64">
	            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	              <circle fill="#FFFFFF" cx="32" cy="32" r="32"></circle>
	              <path
	                d="M20.7894737,31.0526316 L43.5263158,31.0526316 L43.5263158,21.5789474 L20.7894737,21.5789474 L20.7894737,31.0526316 Z M40.6842105,42.4210526 C39.1115789,42.4210526 37.8421053,41.1515789 37.8421053,39.5789474 C37.8421053,38.0063158 39.1115789,36.7368421 40.6842105,36.7368421 C42.2568421,36.7368421 43.5263158,38.0063158 43.5263158,39.5789474 C43.5263158,41.1515789 42.2568421,42.4210526 40.6842105,42.4210526 L40.6842105,42.4210526 Z M23.6315789,42.4210526 C22.0589474,42.4210526 20.7894737,41.1515789 20.7894737,39.5789474 C20.7894737,38.0063158 22.0589474,36.7368421 23.6315789,36.7368421 C25.2042105,36.7368421 26.4736842,38.0063158 26.4736842,39.5789474 C26.4736842,41.1515789 25.2042105,42.4210526 23.6315789,42.4210526 L23.6315789,42.4210526 Z M17,40.5263158 C17,42.2025263 17.7389474,43.6905263 18.8947368,44.7326316 L18.8947368,48.1052632 C18.8947368,49.1473684 19.7473684,50 20.7894737,50 L22.6842105,50 C23.7364211,50 24.5789474,49.1473684 24.5789474,48.1052632 L24.5789474,46.2105263 L39.7368421,46.2105263 L39.7368421,48.1052632 C39.7368421,49.1473684 40.5793684,50 41.6315789,50 L43.5263158,50 C44.5684211,50 45.4210526,49.1473684 45.4210526,48.1052632 L45.4210526,44.7326316 C46.5768421,43.6905263 47.3157895,42.2025263 47.3157895,40.5263158 L47.3157895,21.5789474 C47.3157895,14.9473684 40.5326316,14 32.1578947,14 C23.7831579,14 17,14.9473684 17,21.5789474 L17,40.5263158 Z"
	                fill="#C0392B"></path>
	            </g>
	          </svg>
	        </div>
	        <div class="direction">To: <span class="label-success label label-success" id="showTo">{{ item.destination }}</span></div>
	        <div class="direction">From: <span class="label-warning label label-warning" id="showFrom">{{ item.origin }}</span></div>
	        <div class="direction">Due By: <span class="label-info label label-info">
	        	<span id="days"></span>
	        	<span id="hours"></span>
	        	<span id="mins"></span>
	        	<span id="secs"></span>
	        	<span>Left</span>
	        </span></div>
	      </div>
	      <div class="body">
	    
	          <div class="next-in-label">Amount Due: Ksh <span id="showAmount">{{ item.price }}</span></div>
	          <div class="next-in-label">Package: <span id="showPackage">{{ item.category }}</span></div>
	          <div class="next-in-label">Ordered By: <span id="showName">{{ item.recepient_name }}</span></div>
	       
	      </div>
	    </div>
		</div>

		<div id="googleMap"></div>

		<div id="infowindow-content-origin">
			<img src="" width="16" height="16" id="place-icon">
			<span id="place-name"  class="title"></span><br>
			<span id="place-address"></span>
		</div>

		<div id="infowindow-content-destination">
			<img src="" width="16" height="16" id="place-icon2">
			<span id="place-name2"  class="title"></span><br>
			<span id="place-address2"></span>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		data:() => ({
			welcome: 'Welcome to order tracking',
			orders: [],
		}),
		mounted(){
			let maps = document.createElement('script');
			maps.setAttribute('src',"/js/order_tracker.js");
			document.head.appendChild(maps)

			let mapsApi = document.createElement('script');
			mapsApi.setAttribute('src',"https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=orderTracker");
			document.head.appendChild(mapsApi);

			axios.defaults.headers.common['Content-Type'] = 'application/json'
		    axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

		    let user = JSON.parse(localStorage.getItem('volant.user'))
		    let user_id = user.id

		    axios.post(`/api/gettracking_order`, {user_id}).then(response => {

		        let options = {  
                    weekday: "long", year: "numeric", month: "short",  
                    day: "numeric", hour: "2-digit", minute: "2-digit"  
                }; 
		        
		        for (var i = response.data.length - 1; i >= 0; i--) {
		        	let time = new Date(response.data[i].time)
		        	let now = new Date()
		        	if(+time <= +now){
		        		
		        	}else{
		        		this.orders = response.data
		        	}
		        }

		    })
		},
	}
</script>