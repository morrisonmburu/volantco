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

      /*.pac-card {
      	padding-top: 100px;
        margin: 10px 750px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
        }*/

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

        /*#pac-input {
        	background-color: #fff;
        	font-family: Roboto;
        	font-size: 15px;
        	font-weight: 300;
        	margin-left: 12px;
        	padding: 0 11px 0 13px;
        	text-overflow: ellipsis;
        	width: 400px;
        }

        #pac-input:focus {
        	border-color: #4d90fe;
        }

        #pac-input2 {
        	background-color: #fff;
        	font-family: Roboto;
        	font-size: 15px;
        	font-weight: 300;
        	margin-left: 12px;
        	padding: 0 11px 0 13px;
        	text-overflow: ellipsis;
        	width: 400px;
        }

        #pac-input2:focus {
        	border-color: #4d90fe;
        }*/


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

        </style>

        <template>
        	<div>

        		<div class="row" style="margin-right:200px; margin-left:0;">
        			<v-card class="col-md-5 elevation-12 d-inline-block mx-sm-auto" id="pac-card">

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
		
					<v-progress-circular
				      :size="50"
				      color="primary"
				      indeterminate
				      style="margin-left:200px; margin-top:100px; margin-bottom:100px;"
				      v-if="loader"
				    >
				    <p style="padding-top:100px;">Saving Order ...</p>
				    </v-progress-circular>     

        			<form-wizard 
        				@on-complete="onComplete"
        				v-bind:title="title"
        				v-bind:subtitle="subtitle"
        				color="blue"
        				error-color="#a94442"
        				class="mx-sm-auto"
        				v-if="!loader"
        				>
        				<tab-content icon="ti-location-pin" title="Enter Locations" :before-change="validateLocation">

        					<label style="font-size: 15px;">Your Location:</label>

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

        					<input id="duration_text" type="hidden" v-model="duration" required></input>

        				</tab-content>
        				<tab-content icon="ti-package" :before-change="validatePackage" title="Select Package">
        					<v-tabs
        					v-model="tab"
        					background-color="transparent"
        					color="blue"
        					grow
        					>
        					<v-tab
        					v-for="(item, i) in items"
        					:key="i"
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
        				<v-btn
        				outlined
        				height="50px"
        				block
        				class="ma-0 test"
        				:color="express ? 'white' : 'info'"
        				@click="select('Bike', 'KES 348'), express = !express"
        				:style="{
        				backgroundColor : express ? 'blue !important' : 'white',
        				color: express ? 'white' : 'secondary'
        				}"
        			>
        			<div style="margin-left: 0;">
        				<v-img
        					:src="`/images/motorcycle.png`"
        					style="width: 30px; height:30px;"
        				></v-img>
        			</div>
        			<p style="padding-right:10px;">Bike</p>
        			<div style="padding-left:20px;" class="pull-right">
        				KES 348
        				pickup by {{ dtime }}
        			</div>
        		</v-btn>
        	</v-card>
        </v-tab-item>
        <v-tab-item
        >
        <v-card
        color="basil"
        flat
        >

        <div style="padding:10px;">
        	<v-btn
        	outlined
        	height="50px"
        	block
        	class="text-transform-lowercase"
        	:color="pickup ? 'white' : 'info'"
        	@click="select('Pickup', 'KES 500'), pickup = !pickup"
        	:style="{
        	backgroundColor :pickup ? 'blue !important' : 'white',
        	color: pickup ? 'white' : 'secondary'
        }"
        >
        <div style="margin-right: 0px;">
        		<v-img
        		:src="`/images/pickup.png`"
        		style="width: 30px; height:30px;"
        		></v-img>
        </div>
        <p style="padding-right:10px;">Pickup</p>
        <div style="padding-left:20px;" class="pull-right">
        	KES 500
        	pickup by {{ dtime }}
        </div>
    </v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	class="text-transform-lowercase"
	:color="van ? 'white' : 'info'"
	@click="select('Van', 'KES 1000'), van = !van"
	:style="{
	backgroundColor : van ? 'blue !important' : 'white',
	color: van ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
		<v-img
		:src="`/images/delivery.png`"
		style="width: 30px; height:30px;"
		></v-img>
</div>
<p style="padding-right:10px;">Van</p>
<div style="padding-left:20px;" class="pull-right">
	KES 1000
	pickup by {{ dtime }}
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	class="text-transform-lowercase"
	:color="truck ? 'white' : 'info'"
	@click="select('Truck', 'KES 1914'), truck = !truck"
	:style="{
	backgroundColor : truck ? 'blue !important' : 'white',
	color: truck ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
		<v-img
		:src="`/images/truck.png`"
		style="width: 30px; height:30px;"
		></v-img>
</div>
<p style="padding-right:10px;">Truck</p>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by {{ dtime }}
</div>
</v-btn>
</div>

</v-card>
</v-tab-item>
<v-tab-item
>
<v-card
color="basil"
flat
>

<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	class="text-transform-lowercase"
	:color="ton1 ? 'white' : 'info'"
	@click="select('5 Tonn Truck', 'KES 2000'), ton1 = !ton1"
	:style="{
	backgroundColor :ton1 ? 'blue !important' : 'white',
	color: ton1 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">

		<v-img
		:src="`/images/truck2.png`"
		style="width: 30px; height:30px;"
		></v-img>

</div>
<p style="padding-right:10px;">5 Tonn Truck</p>
<div style="padding-left:20px;" class="pull-right">
	KES 2000
	pickup by {{ dtime }}
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	class="text-transform-lowercase"
	:color="ton2 ? 'white' : 'info'"
	@click="select('10 Ton Truck', 'KES 2500'), ton2 = !ton2"
	:style="{
	backgroundColor : ton2 ? 'blue !important' : 'white',
	color: ton2 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
		<v-img
		:src="`/images/delivery.png`"
		style="width: 30px; height:30px;"
		></v-img>
</div>
<p style="padding-right:10px;">10 Ton Truck</p>
<div style="padding-left:20px;" class="pull-right">
	KES 2500
	pickup by {{ dtime }}
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	class="text-transform-lowercase"
	:color="ton3 ? 'white' : 'info'"
	@click="select('28 Ton Truck', 'KES 3000'), ton3 = !ton3"
	:style="{
	backgroundColor : ton3 ? 'blue !important' : 'white',
	color: ton3 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
		<v-img
		:src="`/images/truck.png`"
		style="width: 30px; height:30px;"
		></v-img>
</div>
<p style="padding-right:10px;">28 Ton Truck</p>
<div style="padding-left:20px;" class="pull-right">
	KES 3000
	pickup by {{ dtime }}
</div>
</v-btn>
</div>

</v-card>
</v-tab-item>
</v-tabs-items>
</tab-content>
<tab-content icon="ti-info-alt" :before-change="validateInfo" title="Additional Information">
	<v-form v-model="valid">

		<fg-input
			style="font-size: 15px"
			class="input-lg"
			addon-left-icon="now-ui-icons travel_info"
			placeholder="Additional Information"
			type="text"
			v-model="info"
			:rules="infoRules"
			required
			>
		</fg-input>

		<v-datetime-picker 
			label="Select Delivery Time" 
			v-model="datetime"
			:rules='datetimeRules'
			prepend-icon="calendar_today"
			> 
		</v-datetime-picker>

		<v-radio-group v-model="payment">
	       <v-radio
              label="Pay With Mpesa"
              color="green"
              value="mpesa"
            ></v-radio>
            <v-radio
              label="Pay On Delivery"
              color="blue"
              value="delivery"
            ></v-radio>
	    </v-radio-group>

</v-form>
</tab-content>
</form-wizard>

</v-card>
</div>

<div id="googleMap"></div>

<div id="infowindow-content">
	<img src="" width="16" height="16" id="place-icon">
	<span id="place-name"  class="title"></span><br>
	<span id="place-address"></span>
</div>

</div>

</template>

<script>
import Vue from 'vue'
import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'
import { Card, Button, FormGroupInput } from '../assets/components';
Vue.use(VueFormGenerator)
export default{
	name: "Home",
	bodyClass: 'page',
	components: {
		Card,
		[Button.name]: Button,
		[FormGroupInput.name]: FormGroupInput
	},
	data: () => ({
		valid: null,
		title: "Volant Order Form",
		subtitle: "please fill in all fields",
		toPlace: null,
		fromPlace: null,
		to: '',
		from: '',
		duration: '',
		dtime: '',
		tab: null,
		express: false,
		pickup: false,
		van: false,
		truck: false,
		value: '',
		price: '',
		payment: '',
		ton1: false,
		ton2: false,
		ton3: false,
		info: '',
		datetime: '',
		alert: false,
		alertMessage: '',
		success: false,
		successMessage: '',
		loader: false,
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
		infoRules: [
		v => !!v || 'Information is required',
		],
		datetimeRules: [
		v => !!v || 'Information is required',
		],
	}),

	mounted() {

		let maps = document.createElement('script');    
		maps.setAttribute('src',"/js/maps.js");
		document.head.appendChild(maps)

		let mapsApi = document.createElement('script');    
		mapsApi.setAttribute('src',"https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=myMap");
		document.head.appendChild(mapsApi);
	},

	methods: {
			// receives a place object via the autocomplete component
			select(value, price){
				this.value = value
				this.price = price
			},

			validateInfo: function(){
				
				if (this.info == '' && this.datetime == '') {
					this.alert = true
					this.alertMessage = 'You must Enter the required Fields'
					return Promise.resolve(false)
				}else{
					return Promise.resolve(true)
				}
			},

			validateLocation: function(){

				this.to = $("#origin").val()
				this.from = $("#destination").val()
				this.duration = $("#duration_text").val()

				let time = new Date();
				time.setMinutes(time.getMinutes() + Math.round(this.duration));
				this.dtime = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3")

				if (this.to == '' && this.from == '') {
					this.alert = true
					this.alertMessage = 'You must select the to and from locations'
					return Promise.resolve(false)
				}else{
					return Promise.resolve(true)
				}
			},
			validatePackage: function(){
				if (this.value == '') {
					this.alert = true
					this.alertMessage = 'You must select A Package'
					return Promise.resolve(false)
				}else{
					return Promise.resolve(true)
				}
			},
			onComplete: function(){

				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

				let to = this.to
				let from = this.from
				let packages = this.value
				let price = this.price
				let instructions = this.info
				let datetime = this.datetime
				let user = JSON.parse(localStorage.getItem('volant.user'))
				let email = user.email
				let phone = user.phone
				let payment = this.payment
				let user_id = user.id

				this.successMessage = 'You have successfully made an order'

				this.loader = true

				axios.post('/api/storeorders', {user_id, to, from, packages, price, datetime, email, phone, instructions, payment}).then(response => {
					let data = response.data

					this.loader = false

					this.$swal('Volant Order','You successfully made an order', 'success').then((result) => {
			          	this.$router.push('orders')
			          })

				}
				)
			},
			close (v) {
				this.alert = v
			},
			closeSuccess(v){
				this.success = v
			}

		}
	}
	</script>