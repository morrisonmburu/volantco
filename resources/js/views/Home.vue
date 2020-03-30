<template>
	<v-container fluid fluid-height>
			<!-- <v-spacer></v-spacer> -->
	<div class="row">
		<div class="col-md-5">
			 <form-wizard 
			 @on-complete="onComplete"
			 v-bind:title="title"
       v-bind:subtitle="subtitle"
       color="blue"
       error-color="#a94442">
            <tab-content icon="ti-location-pin" title="Enter Locations">
            	<label>To *</label>
            	<gmap-autocomplete
										@place_changed="setPlace"
										autofocus
										absolute
										class="form-control"
										required
										>
							</gmap-autocomplete>

							<label>From *</label>
            	<gmap-autocomplete 
										@place_changed="setPlace"
										autofocus
										absolute
										required="true"
										class="form-control"
										>
							</gmap-autocomplete>
            </tab-content>
            <tab-content icon="ti-package" title="Select Package">
               <v-tabs
						      v-model="tab"
						      background-color="transparent"
						      color="blue"
						      grow
						    >
						      <v-tab
						        v-for="item in items"
						        :key="item"
						      >
						      	<v-img
	                		:src="item.img"
	                		height="30px"
											width="20px"
		              	></v-img>
						        {{ item.text }}
						      </v-tab>
						    </v-tabs>

						    <v-tabs-items v-model="tab">
						      <v-tab-item
						      >
						        <v-card
						          color="basil"
						          flat
						        >
						        <v-list>
						        	 <v-list-item-group v-model="model" active-class="border" color="indigo">
						        	 	 <v-list-item
									          
									        >
									          <v-list-item-icon>
									            <v-icon>input</v-icon>
									          </v-list-item-icon>

									          <v-list-item-content>
									            <v-list-item-title>small</v-list-item-title>
									          </v-list-item-content>
									          <v-radio value="small"></v-radio>
									        </v-list-item>
						        	 </v-list-item-group>
						        </v-list>
						        </v-card>
						      </v-tab-item>
						      <v-tab-item
						      >
						        <v-card
						          color="basil"
						          flat
						        >
						        <v-list>
						        	 <v-list-item-group v-model="model1" active-class="border" color="indigo">
						        	 	 <v-list-item
									          
									        >
									          <v-list-item-icon>
									            <v-icon>input</v-icon>
									          </v-list-item-icon>

									          <v-list-item-content>
									            <v-list-item-title>medium</v-list-item-title>
									          </v-list-item-content>
									          <v-radio value="medium"></v-radio>
									        </v-list-item>
						        	 </v-list-item-group>
						        </v-list>
						        </v-card>
						      </v-tab-item>
						      <v-tab-item
						      >
						        <v-card
						          color="basil"
						          flat
						        >
						        <v-list>
						        	 <v-list-item-group v-model="model2" active-class="border" color="indigo">
						        	 	 <v-list-item
									          
									        >
									          <v-list-item-icon>
									            <v-icon>input</v-icon>
									          </v-list-item-icon>

									          <v-list-item-content>
									            <v-list-item-title>large</v-list-item-title>
									          </v-list-item-content>
									        </v-list-item>
						        	 </v-list-item-group>
						        </v-list>
						        </v-card>
						      </v-tab-item>
						    </v-tabs-items>
            </tab-content>
            <tab-content icon="ti-info-alt" title="Additional Information" :before-change="validateLastTab">

            </tab-content>
        </form-wizard>
		</div>
		<div class="col-md-7">
				<v-card class="elevation-12 d-inline-block mx-lg-auto">
			<gmap-map
				:center="center"
				:zoom="14"
				style="width:580px;  height: 520px;"
				>
				<gmap-marker
				:key="index"
				v-for="(m, index) in markers"
				:position="m.position"
				@click="center=m.position"
				></gmap-marker>
		</gmap-map>
	</v-card>
		</div>
	</div>

	</v-container>
</template>

<style type="text/css">
	pre {
		overflow: auto;
	}
		pre .string { color: #885800; }
		pre .number { color: blue; }
		pre .boolean { color: magenta; }
		pre .null { color: red; }
		pre .key { color: green; }
		.basil {
  background-color: #FFFBE6 !important;
}
.basil--text {
  color: #356859 !important;
}  
</style>

<script>
import Vue from 'vue'
import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'

Vue.use(VueFormGenerator)
	export default{
		name: "Home",
		data: () => ({
			welcome: "Welcome to Home",
			title: "Volant Order Form",
			subtitle: "please fill in all fields",
			center: { lat: 45.508, lng: -73.587 },
	    markers: [],
	    places: [],
	    currentPlace: null,
	    to: '',
	    tab: null,
      items: [
          {text: 'Small', img: '/images/gift.png'},
          {text: 'Medium', img: '/images/logistics.png'},
          {text: 'Large', img: '/images/cart.png'}
        ],
      packages: [
          {text: 'Small', icon: 'input'},
          {text: 'Medium', icon: 'input'},
          {text: 'Large', icon: 'input'}
       ],
      text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	    model:{
	    	to: "",
	    	from: ""
	   },
	   formOptions: {
	    validationErrorClass: "has-error",
	    validationSuccessClass: "has-success",
	    validateAfterChanged: true
	   },
	  	lastTabSchema:{
	     
	   }
		}),

		mounted(){
			this.geolocate();
		},

		methods: {
			// receives a place object via the autocomplete component
		    setPlace(place) {
		      this.currentPlace = place;

		      const marker = {
		          lat: this.currentPlace.geometry.location.lat(),
		          lng: this.currentPlace.geometry.location.lng()
		        };
		        this.markers.push({ position: marker });
		        this.places.push(this.currentPlace);
		        this.center = marker;
		        this.currentPlace = null;
		    },

		    addMarker() {
		      if (this.currentPlace) {
		        const marker = {
		          lat: this.currentPlace.geometry.location.lat(),
		          lng: this.currentPlace.geometry.location.lng()
		        };
		        this.markers.push({ position: marker });
		        this.places.push(this.currentPlace);
		        this.center = marker;
		        this.currentPlace = null;
		      }
		    },

		    geolocate: function() {
		      navigator.geolocation.getCurrentPosition(position => {
		        this.center = {
		          lat: position.coords.latitude,
		          lng: position.coords.longitude
		        };
		      });
		    },

		    onComplete: function(){
		      alert('Yay. Done!');
		   },

		   validateLastTab: function(){
		     return this.$refs.lastTabForm.validate();
		   },

		}
	}
</script>