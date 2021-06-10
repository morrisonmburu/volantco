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
	position:absolute;
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

  #moves_card{
  	display: flex;
	flex-direction: column;
	transition-duration: 1s;
	position: absolute;
	transform: translateZ(0px);
	z-index: 10;
	width: 50%;
	left: 200px;
	right: 200px;
	top:5px;
	bottom: 5px;
	height: 98%;

  }

  #moves{
  	display: flex;
	flex-direction: column;
	transition-duration: 1s;
	position: absolute;
	transform: translateZ(0px);
	z-index: 10;
	padding-left: 40vh;
	padding-top: 0;
	top:0;
	/*right: 0;*/
  }

  .extra_items{
  	border: 1px solid #000;
  	float: left;
  	margin: 10px;
  }

</style>
<template>
	<div>
		<v-row v-if="movesForm && !movesForm2 && !showExtra" id="moves" style="margin-right:200px; margin-left:0;">
                <v-col cols="12" xs="12" sm="6" md="6" >
        			<v-card class="elevation-12 d-inline-block mx-sm-auto" id="pac-cardMoves" max-width="400" min-width="350"
                    >

        			<v-alert
						:value="alert"
						:dismissible="alert ? true : false"
						transition="scale-transition"
						text
						prominent
						type="error"
						icon="mdi-cloud-alert"
						width="350px"
						class="container"
						align-center
						justify-center
						@input="close"
						>
						{{ alertMessage }}
					</v-alert>
					<v-alert
						:value="success"
						dismissible
						transition="scale-transition"
						text
						prominent
						outlined
						type="success"
						width="350px"
						@input="closeSuccess"
						class="container"
						align-center
						justify-center
						>
						{{ successMessage }}
					</v-alert>
					<v-form v-model="valid">
						<v-container>
							<v-row>
								<v-col xs="12" sm="12" md="12">
									<h4 class="text-center">Pick Your Locations</h4>
									<label style="font-size: 15px;">Pickup Location:</label>

			        					<fg-input
			        						style="font-size: 15px"
											class="input-lg"
											addon-left-icon="now-ui-icons location_pin"
											placeholder="Enter a location"
											id="pac-input"
											type="text"
											required
											>
										</fg-input>

			        					<input type="hidden" v-model="to" id="origin" name="origin" required>

			        					<label style="font-size: 15px;">Destination:</label>

			        					<fg-input
			        						style="font-size: 15px"
											class="input-lg"
											addon-left-icon="now-ui-icons location_pin"
											placeholder="Enter a location"
											id="pac-input2"
											type="text"
											required
											>
										</fg-input>

										<input type="hidden" v-model="from" id="destination" name="destination" required>

										<v-btn
											color="#9C0520"
											class="ma-2 white--text "
											v-on:click="showMovesForm"
											block
											>
											Continue
											<v-icon right dark>keyboard_arrow_down</v-icon>
										</v-btn>

								</v-col>
							</v-row>
						</v-container>
					</v-form>
			</v-card>
		</v-col>
	</v-row>

	<v-card class="elevation-12 d-inline-block mx-lg-auto" id="moves_card" v-if="!movesForm">
	<v-progress-circular
	      :size="50"
	      color="indigo darken-4"
	      indeterminate
	      style="margin-left:50%; margin-top:250px;"
	      v-if="loading"
	      >
	 </v-progress-circular>
       
	 <v-alert
		:value="error"
		:dismissible="error ? true : false"
		transition="scale-transition"
		text
		prominent
		type="error"
		icon="mdi-cloud-alert"
		width="350px"
		class="container"
		align-center
		justify-center
		@input="close">
		{{ errorMessage }}
	</v-alert>

	<v-alert
		:value="success"
		dismissible
		transition="scale-transition"
		text
		prominent
		outlined
		type="success"
		width="350px"
		@input="closeSuccess"
		class="container"
		align-center
		justify-center>
		{{ successMessage }}
	</v-alert>
	  
	<v-row v-if="!loading">
	<v-col cols="12" xs="12" sm="12" md="12">
			<v-timeline align-top dense>
			<v-timeline-item
              v-for="(item, i) in items"
              :key="i"
              :color="item.color"
              :icon="item.icon"
              fill-dot
            >
              <v-card
                :color="item.color"
                dark
                max-width="530px"
                min-width="530px"
              >
                <v-card-title style="padding-top:0;padding-bottom:0;" class="title">{{ item.text }}</v-card-title>
                <v-card-text class="white text--primary">
                  <p>{{ item.location }}</p>
                </v-card-text>
              </v-card>
            </v-timeline-item>
          </v-timeline>
	</v-col>
	 <v-col xs="12" sm="12" md="12">
	   <v-tooltip top>
		<template v-slot:activator="{ on }">
		<div style="padding:10px;">
			<v-btn
			outlined
			height="100px"
			block
			v-on="on"
			class="text-transform-lowercase"
			:color="domestic ? 'white' : '#9C0520'"
			@click="moving('domestic'), domestic = !domestic"
			:style="{
			backgroundColor :domestic ? '#9C0520 !important' : 'white',
			color: domestic ? 'white' : '#9C0520'
			}"

		>
		<div style="position:absolute; left:0;">
			<v-img
			:src="`/images/location.png`"
			style="width: 50px; height:50px;"
			></v-img>
		</div>
		<div style="position: absolute; left:10em; bottom:2px;" class="text-center">
			<p>Domestic Moving & relocation</p>
		</div>
		<div style="position: absolute;">
			Move or relocate everything from your house to a different place
		</div>
	</v-btn>
	</div>
	</template>
	<span>Domestic Moving & relocation</span>
	</v-tooltip>
	</v-col>
	<v-col xs="12" sm="12" md="12">
		<v-tooltip top>
			<template v-slot:activator="{ on }">
				<div style="padding:10px;">
					<v-btn
					outlined
					height="100px"
					block
					max-width="350"
					min-width="350"
					v-on="on"
					disabled
					class="text-transform-lowercase"
					:color="office ? 'white' : '#9C0520'"
					@click="moving('office'), office = !office"
					:style="{
					backgroundColor :office ? '#9C0520 !important' : 'white',
					color: office ? 'white' : '#9C0520'
				}"
				>
				<div style="margin-right:20px;">
					<v-img
					:src="`/images/comfortable.png`"
					style="width: 50px; height:50px;"
					></v-img>
				</div>
				<div style="position:relative; margin-bottom:50px; left:15em;" class="text-center">
					<p>Office Moving</p>
				</div>
				<div style="position:relative; left:-10em;">
					Move or relocate everything from your Office to a different place
				</div>
			</v-btn>
		</div>
	</template>
	<span>Office Moving</span>
	</v-tooltip>
	</v-col>
	</v-row> 
	</v-card>

	<v-card class="elevation-12 d-inline-block mx-lg-auto"  id="moves_card" v-if="movesForm2 && !movesForm && !showExtra" style="top: 5em; left: 2.5em; right: 5em; bottom:2.5em; height:89%; width:95%; position:fixed;">
	<!-- <v-progress-circular
	      :size="50"
	      color="indigo darken-4"
	      indeterminate
	      style="margin-left:50%; margin-top:250px;"
	      v-if="moves_loader"
	      >
	 </v-progress-circular> -->
	 <v-alert
	 :value="alert"
	 :dismissible="alert ? true : false"
	 transition="scale-transition"
	 text
	 prominent
	 type="error"
	 icon="mdi-cloud-alert"
	 width="350px"
	 class="container"
	 align-center
	 justify-center
	 @input="close"
	 >
	 {{ alertMessage }}
	</v-alert>

	 <v-card class="mx-auto" style="margin-top:2%; height:100px; width:50%; margin-left:20%;" outlined>
	 	<v-img
	 	:src="`/images/truck.png`"
	 	style="width: 50px; height:50px; position:relative; left:20px; top:20px;"
	 	></v-img>
	 	<div class="text-xl-h4" style="position:absolute; left:8em; bottom:3em; font-weight:bold; font-size:20px;">
	 		Dimestic Moving & Relocation
	 	</div>
	 	<div class="text-xl-h4" style="position:absolute; left:8em; bottom:2em; font-weight:bold; font-size:20px; color:grey;">
	 		Ksh. {{ movesPrice+packagingPrice+roomsPricing }}
	 	</div>
	 	<div class="text-xl-h4" style="position:absolute; left:8em; bottom:1em; font-weight:bold; top:3em; font-size:20px; color:grey;">
	 		From {{ to }} to {{ from }}
	 	</div>
	 	<div style="position:absolute; left:32em; bottom:2.7em;">
	 		<v-tooltip right>
	 			<template v-slot:activator="{ on, attrs }">
	 				<v-btn icon v-bind="attrs" v-on="on">
	 					<v-icon color="grey lighten-1">info</v-icon>
	 				</v-btn>
	 			</template>
	 			<p>Domestic Moving and relocation</p>
	 			<p>Base Price Ksh. 7499</p>
	 		</v-tooltip>
	 	</div>
	 </v-card>
	 <v-row cols="12" style="margin-left:5%;">
	 	<v-col xs="6" sm="6" md="6">
		 		<div>
		 			<p>What is the type of your house?</p>
		 		</div>
		 		<v-select
			 		:items="house_types"
			 		label="selected House Type"
			 		v-model="selectedHouse"
			 		outlined
			 		dense
			 		item-text="house"
			 		item-value="house"
			 		>
			 		<template v-slot:selection="{ item, index }">
			 			{{ item.house }}
			 		</template>
			 	</v-select>

		 	<div>
		 		<p>How Many rooms in Your House?</p>
		 	</div>

		 	<v-text-field
		 	label="Number of rooms"
		 	outlined
		 	dense
		 	type="number"
		 	v-model="n_rooms"
		 	></v-text-field>

		 	<div>
		 		<p>Do you need Padding & Packaging?</p>
		 	</div>

		 	<v-select
			 	label="Padding Crafting & Packaging"
			 	:items="padding_items"
			 	chips
			 	multiple
			 	outlined
			 	v-model="selectedPack"
			 	>
			 </v-select>
	 	</v-col>
	 	<v-col xs="12" md="6" sm="6">
	 		<div v-if="showRooms">Select The type of rooms in your house</div>
	 		<v-list v-if="showRooms" two-line>
		      <v-list-item-group
		        v-model="selected"
		        multiple
		        active-class="pink darken-4--text"
		      >
		        <template v-for="(item, index) in items2">
		        	<div class="extra_items">
		        		<v-list-item :disabled="item.disabled" :key="item.title">
				            <template v-slot:default="{ active, toggle }">
				              <v-list-item-action>
				                <v-icon
				                  v-if="!active"
				                  color="grey lighten-1"
				                >
				                  {{ item.icon }}
				                </v-icon>

				                <v-icon
				                  v-else
				                  color="white"
				                >
				                  {{ item.icon }}
				                </v-icon>
				              </v-list-item-action>
				              <v-list-item-content>
				                <v-list-item-title v-if="!active" style="color:#9C0520;" v-text="item.title"></v-list-item-title>
				                <v-list-item-title v-if="active" style="color:white;" v-text="item.title"></v-list-item-title>
				              </v-list-item-content>
				            </template>
				          </v-list-item>
		        	</div>
		        </template>
		      </v-list-item-group>
		    </v-list>
	 	</v-col>
	 </v-row>
	 <v-row cols="12" style="margin-left:5%;">
	 	<v-col xs="12" md="3" sm="3"></v-col>
	 	<v-col xs="12" md="3" sm="3">
	 		<v-btn color="#9C0520" style="color:#fff;" block dense @click="back1">Back</v-btn>
	 	</v-col>
	 	<v-col xs="12" md="3" sm="3">
	 		<v-btn color="#9C0520" style="color:#fff;" block dense @click="showExtraForm">Continue</v-btn>
	 	</v-col>
	 	<v-col xs="12" md="3" sm="3"></v-col>
	 </v-row>
	</v-card>

	<v-card class="elevation-12 d-inline-block mx-lg-auto"  id="moves_card" v-if="!movesForm2 && !movesForm && showExtra" style="top: 5em; left: 2.5em; right: 5em; bottom:2.5em; height:89%; width:95%; position:fixed;">
	 <v-alert
	 :value="alert"
	 :dismissible="alert ? true : false"
	 transition="scale-transition"
	 text
	 prominent
	 type="error"
	 icon="mdi-cloud-alert"
	 width="350px"
	 class="container"
	 align-center
	 justify-center
	 @input="close"
	 >
	 {{ alertMessage }}
	</v-alert>
	<v-progress-circular
	      :size="50"
	      color="indigo darken-4"
	      indeterminate
	      style="margin-left:50%; margin-top:250px;"
	      v-if="finalLoader"
	      >
	 </v-progress-circular>
	 <div v-if="!finalLoader">
	 <v-card class="mx-auto" style="margin-top:2%; height:100px; width:50%; margin-left:20%;" outlined>
	 	<v-img
	 	:src="`/images/truck.png`"
	 	style="width: 50px; height:50px; position:relative; left:20px; top:20px;"
	 	></v-img>
	 	<div class="text-xl-h4" style="position:absolute; left:8em; bottom:3em; font-weight:bold; font-size:20px;">
	 		Dimestic Moving & Relocation
	 	</div>
	 	<div class="text-xl-h4" style="position:absolute; left:8em; bottom:2em; font-weight:bold; font-size:20px; color:grey;">
	 		Ksh. {{ movesPrice+packagingPrice+roomsPricing }}
	 	</div>
	 	<div class="text-xl-h4" style="position:absolute; left:8em; bottom:1em; font-weight:bold; top:3em; font-size:20px; color:grey;">
	 		From {{ to }} to {{ from }}
	 	</div>
	 	<div style="position:absolute; left:32em; bottom:2.7em;">
	 		<v-tooltip right>
	 			<template v-slot:activator="{ on, attrs }">
	 				<v-btn icon v-bind="attrs" v-on="on">
	 					<v-icon color="grey lighten-1">info</v-icon>
	 				</v-btn>
	 			</template>
	 			<p>Domestic Moving and relocation</p>
	 			<p>Base Price Ksh. 7499</p>
	 		</v-tooltip>
	 	</div>
	 </v-card>
	 <v-row cols="12">
	 		<v-col xs="12" sm="6" md="6">
	 			<v-container>
	 		<div>Other Services (Free, Optional)</div>
	 		<v-list two-line>
		      <v-list-item-group
		        v-model="selectedService"
		        multiple
		        active-class="pink darken-4--text"
		      >
		        <template v-for="(item, index) in extraItems">
		        	<div class="extra_items">
		        		<v-list-item :key="item.title">
				            <template v-slot:default="{ active, toggle }">
				              <v-list-item-action>
				                <v-icon
				                  v-if="!active"
				                  color="grey lighten-1"
				                >
				                  {{ item.icon }}
				                </v-icon>

				                <v-icon
				                  v-else
				                  color="white"
				                >
				                  {{ item.icon }}
				                </v-icon>
				              </v-list-item-action>
				              <v-list-item-content >
				                <v-list-item-title v-if="!active" style="color:#9C0520;" v-text="item.title"></v-list-item-title>
				                <v-list-item-title v-if="active" style="color:white;" v-text="item.title"></v-list-item-title>
				              </v-list-item-content>
				            </template>
				          </v-list-item>
		        	</div>
		        </template>
		      </v-list-item-group>
		    </v-list>
		    </v-container>
	 		</v-col>
	 		
		    <v-col xs="12" md="6" sm="6">
		    	<v-container>
			    	<v-switch
						v-model="contact_info"
						:label="`I am ${quiz} the person to contact`"
					></v-switch>
					<v-text-field
			            label="Recipient Name"
			            placeholder="Recipient Name e.g Mr James"
			            outlined
			            required
			            v-model="r_name"
			            dense
			            v-if="!contact_info"
			        ></v-text-field>
			        <vue-tel-input
						v-model="r_phone"
						required
						label="Enter Phone Number"
						autofocus
						:inputOptions="options"
						v-if="!contact_info"
					></vue-tel-input>
					<v-datetime-picker
						label="Select Pickup Time"
						v-model="pickup_time"
						outlined
						dense
						>
					</v-datetime-picker>
			        <v-text-field
			            label="Instructions"
			            placeholder="e.g Do Not Tilt"
			            outlined
			            required
			            v-model="instructions"
			            dense
			        ></v-text-field>
			        <v-radio-group v-model="payment" style="padding-bottom:0; padding-top:0; margin-bottom:0; margin-top:0;">
						<div class="row">
							<div class="col-md-6">
								<v-radio
								label="Pay With Mpesa"
								color="green"
								value="Mpesa"
								></v-radio>
							</div>
							<div class="col-md-6">
								<v-radio
								label="Pay On Delivery"
								color="blue"
								value="Cash"
								></v-radio>
							</div>
						</div>
					</v-radio-group>
			    </v-container>
		    </v-col>
		</v-row>

		<v-row cols="12" style="margin-left:5%;">
			<v-col xs="12" md="3" sm="3"></v-col>
			<v-col xs="12" md="3" sm="3">
				<v-btn color="#9C0520" style="color:#fff;" block dense @click="back2">Back</v-btn>
			</v-col>
			<v-col xs="12" md="3" sm="3">
				<v-btn color="#9C0520" style="color:#fff;" block dense @click="onComplete">Finish</v-btn>
			</v-col>
			<v-col xs="12" md="3" sm="3"></v-col>
		</v-row>
	</div>
	</v-card>

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

	<input type="hidden" name="locations" id="locations"/>
	<input type="hidden" id="distance">

	</div>
</template>
<script type="text/javascript">
	import Vue from 'vue'
	import { Card, Button, FormGroupInput } from '../assets/components';
	export default{
		name: "Moves",
		bodyClass: 'page',
		components: {
			Card,
			[Button.name]: Button,
			[FormGroupInput.name]: FormGroupInput,
		},
		data:() => ({
			success: false,
			alert: false,
			alertMessage: '',
			successMessage: '',
			valid: false,
			loader: null,
			loading4: false,
			to: '',
			from: '',
			title: "Volant Packaging & Moves Order Form",
			subtitle: "please fill in all fields",
			dialog: false,
			selectedHouse: '',
			service: '',
			error:false,
			errorMessage: '',
			selectedPack: [],
			selectedAdd: [],
			to: '',
			from: '',
			loading: false,
			movesForm: true,
			distance: 0,
			domestic: false,
			office: false,
			items: [
            {
              color: '#9C0520',
              icon: 'place',
              text: 'Pickup Location',
              location: ''
            },
            {
              color: 'indigo darken-4',
              icon: 'pin_drop',
              text: 'Destination',
              location: ''
            },
          ],
          movesForm2: false,
          moves_loader: true,
          house_types: [
          	{
          		house: 'Bedsitter',
          		price: 1499,
          	},
          	{
          		house: 'Studio Apartment',
          		price: 1499,
          	},
          	{
          		house: 'One Bedroom House',
          		price: 7501,
          	},
          	{
          		house: 'Two Bedroom House',
          		price: 10251,
          	},
          	{
          		house: 'Three Bedroom House',
          		price: 11451,
          	},
          	{
          		house: 'Four or More Bedroom House',
          		price: 12801,
          	}
          ],
          padding_items: ['Padding', 'Crafting', 'Packaging'],
          houseType: [],
          movesPrice: 7499,
          defaultPrice: 7499,
          packagingPrice: 0,
          test: 0,
          selected: [],
          showRooms: false,
	      showExtra: false,
	      quiz: '',
	      r_phone: '',
	      r_name: '',
	      contact_info: true,
	      selectedService: [],
	      pickup_time: '',
	      instructions: '',
	      payment: '',
	      n_rooms: 0,
	      options: {
	      	showDialCode: true,
	      	tabindex: 0
	      },
	      roomsPricing: 0,
	      finalLoader: false,
	      diningPricing: 0,
	      items2: [
	      	{
	          title: 'Living Room',
	          icon: 'weekend',
	          disabled: true,
	        },
	        {
	          title: 'Kitchen',
	          icon: 'outdoor_grill',
	          disabled: true,
	        },
	        {
	          title: 'Dining Room',
	          icon: 'restaurant',
	          disabled: false
	        },
	        {
	          title: 'Balcony',
	          icon: 'deck',
	          disabled: false
	        },
	        {
	          title: 'Kitchen Pantry',
	          icon: 'kitchen',
	          disabled: false
	        },
	        {
	          title: 'Laundry',
	          icon: 'local_laundry_service',
	          disabled: false
	        },
	      ],
	      extraItems: [
	      	{
	      		title: 'Dstv or zuku installation',
	      		icon: 'router'
	      	},
	      	{
	      		title: 'Basic HouseKeeping',
	      		icon: 'house'
	      	},
	      	{
	      		title: 'Mounting Tvs',
	      		icon: 'tv'
	      	},
	      	{
	      		title: 'Labelling',
	      		icon: 'history_edu'
	      	},
	      	{
	      		title: 'Mounting',
	      		icon: 'satellite'
	      	},
	      	{
	      		title: 'Furniture Protection',
	      		icon: 'weekend'
	      	}
	      ]
		}),
		watch: {
			loader () {
				const l = this.loader
				this[l] = !this[l]
				setTimeout(() => (this[l] = false), 3000)
				this.loader = null
			},
			contact_info () {
				if(this.contact_info == true){
					this.quiz = ''
				}else{
					this.quiz = 'not'
				}
			},
			selectedHouse (value) {
				for (var i = this.house_types.length - 1; i >= 0; i--) {
					if(this.house_types[i].house === value){
						if(value == 'Bedsitter' || value == 'Studio Apartment'){
							this.houseType = this.house_types[i]
							this.movesPrice = this.defaultPrice - this.houseType.price
						}else{
							this.houseType = this.house_types[i]
							this.movesPrice = this.defaultPrice + this.houseType.price
						}
						this.roomsPricing = 0
					}
					if(value === 'Bedsitter' || value === 'Studio Apartment'){
						this.showRooms = false
					}else if(value === 'One Bedroom House'){
						this.showRooms = true
						this.items2[6] = {
							title: 'Bedroom1',
							icon: 'king_bed',
							disabled: true
						}
						this.items2.length = 7
						this.selected = [0, 1, 6]
					}else if(value === 'Two Bedroom House'){
						this.showRooms = true
						this.items2[6] = {
							title: 'Bedroom1',
							icon: 'king_bed',
							disabled: true
						}
						this.items2[7] = {
							title: 'Bedroom2',
							icon: 'king_bed',
							disabled: true	
						}
						this.items2.length = 8
						this.selected = [0, 1, 6, 7]
					}else if(value === 'Three Bedroom House'){
						this.showRooms = true
						this.items2[6] = {
							title: 'Bedroom1',
							icon: 'king_bed',
							disabled: true
						}
						this.items2[7] = {
							title: 'Bedroom2',
							icon: 'king_bed',
							disabled: true	
						}
						this.items2[8] = {
							title: 'Bedroom3',
							icon: 'king_bed',
							disabled: true	
						}
						this.items2.length = 9
						this.selected = [0, 1, 6, 7, 8]
					}else if(value === 'Four or More Bedroom House'){
						this.showRooms = true
						this.items2[6] = {
							title: 'Bedroom1',
							icon: 'king_bed',
							disabled: true
						}
						this.items2[7] = {
							title: 'Bedroom2',
							icon: 'king_bed',
							disabled: true	
						}
						this.items2[8] = {
							title: 'Bedroom3',
							icon: 'king_bed',
							disabled: true	
						}
						this.items2[9] = {
							title: 'Bedroom4',
							icon: 'king_bed',
							disabled: true	
						}
						this.items2.length = 10
						this.selected = [0, 1, 6, 7, 8, 9]
					}
				}
			},
			selected (value) {
				let count = 0;
				for (var i = value.length - 1; i >= 0; i--) {
					if(this.items2[value[i]].title == 'Balcony' || this.items2[value[i]].title == 'Kitchen Pantry' || this.items2[value[i]].title == 'Laundry'){
							count+=1
					}
				}

				let diningPricing = 0

				for (var i = value.length - 1; i >= 0; i--) {
					if(this.items2[value[i]].title == 'Dining Room'){
						diningPricing = 3500
					}
				}

				this.roomsPricing = 1500*count+diningPricing
			},
			selectedPack (value) {
				let count = value.length
				this.packagingPrice = count*2000
			}
		},
		mounted(){
			let maps = document.createElement('script');
			maps.setAttribute('src',"/js/moves.js");
			document.head.appendChild(maps)

			let mapsApi = document.createElement('script');
			mapsApi.setAttribute('src',"https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=moves");
			document.head.appendChild(mapsApi);
		},
		methods:{
			onComplete: function(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

				let to = this.to
				let from = this.from
				let service = this.service
				let selectedHouse = this.selectedHouse
				let selectedPack = this.selectedPack
				
				let selected = this.selected
				let selectedService = this.selectedService

				let sendData = []
				let sendData2 = []

				for (var i = selected.length - 1; i >= 0; i--) {
					sendData.push(this.items2[selected[i]].title)
				}

				for (var i = selectedService.length - 1; i >= 0; i--) {
					sendData2.push(this.extraItems[selectedService[i]].title)
				}

				let n_rooms = this.n_rooms

				let user = JSON.parse(localStorage.getItem('volant.user'))

				let email = '';
				let sender_phone = '';
				let sender_name = '';
				let user_id = '';
				let recipient_phone = '';
				let recipient_name = '';

				if(this.contact_info == true){
					email = user.email
					sender_phone = user.phone
					sender_name = user.username
					user_id = user.id
					recipient_phone = user.phone
					recipient_name = user.username
				}else{
					email = user.email
					sender_phone = user.phone
					sender_name = user.username
					user_id = user.id
					recipient_phone = this.r_phone
					recipient_name = this.r_name
				}

				let distance = $("#distance").val()
				let locations = $('#locations').val()
				this.finalLoader = true
				locations = JSON.parse(locations)
				let price = this.movesPrice+this.packagingPrice+this.roomsPricing

				let payment = this.payment
				let pickup_time = this.pickup_time
				let instructions = this.instructions

				axios.post('/api/storemovesorder', {to, from, email, user_id, sender_name, sender_phone, recipient_name, recipient_phone, to, from, service, selectedHouse, selectedPack, sendData, sendData2, distance, locations, price, payment, pickup_time, instructions}).then(response => {
					let data = response.data
					this.finalLoader = false
					this.$swal('Volant Moves Order','You successfully made an order', 'success').then((result) => {
						let nextUrl = this.$route.params.nextUrl
						this.$router.push((nextUrl != null ? nextUrl : 'view_order/'+response.data.order.ord_no))
			    })
				}
				)
			},
			moving: function(service){
				this.service = service
				this.movesForm = false
				this.movesForm2 = true
				setTimeout(() => (this.moves_loader = false), 3000)
			},
			showMovesForm: function(){

				this.to = $("#origin").val()
				this.from = $("#destination").val()

				if(this.to == '' || this.from == ''){
					this.alert = true
					this.alertMessage = 'You must enter all Locations'
				}else{
					this.loading = true
					this.items[0].location = this.to
					this.items[1].location = this.from
					setTimeout(() => (this.loading = false), 3000)
					this.movesForm = false
				}
			},
			showExtraForm: function() {
				if(this.selectedHouse == ''){
					this.alert = true
					this.alertMessage = 'You must enter all Fields'
				}else{
					this.showExtra = true
					this.movesForm = false
					this.movesForm2 = false
				}
			},
			back1: function() {
				this.showExtra = false
				this.movesForm = false
				this.movesForm2 = false
			},
			back2: function() {
				this.showExtra = false
				this.movesForm = false
				this.movesForm2 = true
			},
			close (v) {
				this.alert = v
				this.error = v
			},
			closeSuccess(v){
				this.success = v
			},
		}
	}
</script>