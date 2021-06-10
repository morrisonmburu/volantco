<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
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

#pac-card{
	display: flex;
	flex-direction: column;
	transition-duration: 1s;
	position: absolute;
	transform: translateZ(0px);
	z-index: 10;
	width: 50%;
	right: -14%;
	top:-1.5%;
	bottom: 5px;
	height: 100%;
}

@media only screen and (max-width: 640px) {
	#pac-card{
		display: flex;
		flex-direction: column;
		transition-duration: 1s;
		position: absolute;
		transform: translateZ(0px);
		z-index: 10;
		width: 20%;
		right: 90%;
		top:-1.5%;
		bottom: 5px;
		height: 100%;
	}
}

@media only screen and (max-width: 940px) {
	#pac-card{
		display: flex;
		flex-direction: column;
		transition-duration: 1s;
		position: absolute;
		transform: translateZ(0px);
		z-index: 10;
		width: 50%;
		right: 1%;
		top:0;
		bottom: 5px;
		height: 100%;
	}
}

@media only screen and (max-width: 1200px) {
	#pac-card{
		display: flex;
		flex-direction: column;
		transition-duration: 1s;
		position: absolute;
		transform: translateZ(0px);
		z-index: 10;
		width: 50%;
		right: 1%;
		top:0;
		bottom: 5px;
		height: 100%;
	}
}

.last{
	overflow-y: scroll;
	height: 300px;
}

.item{
	width: 90%;
}

</style>

<template>
	<div>

		<v-row id="pac-card">
			<v-col cols="12" xs="12" sm="6" md="6" >
				<v-card class="elevation-12 d-inline-block mx-sm-auto" max-width="450" min-width="450"
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
		<v-snackbar
		v-model="snackbar2"
		color="blue-grey darken-4"
		style="color:#8F0236;"
		:timeout="timeout"
		left
		bottom
		vertical
		>
		{{ text }}
		<v-btn
		dark
		text
		@click="snackbar2 = false"
		color="primary"
		>
		Close
	</v-btn>
</v-snackbar>

<v-progress-circular
:size="50"
color="indigo darken-4"
indeterminate
style="margin-left:200px; margin-top:100px; margin-bottom:100px;"
v-if="loader"
>
<p style="padding-top:150px;">Saving Order ...</p>
</v-progress-circular>

<form-wizard
@on-complete="onComplete"
v-bind:title="title"
v-bind:subtitle="subtitle"
color="#8F0236"
error-color="red"
class="mx-sm-auto"
v-if="!loader"
>
<tab-content icon="ti-location-pin" title="Enter Locations" :before-change="validateLocation">

	<label style="font-size: 15px;">Pickup Location <span style="color:red;">*</span></label>

	<v-text-field
		prepend-icon="place"
		placeholder="Enter a location"
		id="pac-input"
		type="text"
		required
		outlined
		dense
		color="#8F0236"
		>
	</v-text-field>

<input type="hidden" v-model="to" id="origin" name="origin" required>

<label style="font-size: 15px;">Destination <span style="color:red;">*</span></label>

<v-text-field
	prepend-icon="pin_drop"
	placeholder="Enter a location"
	id="pac-input2"
	type="text"
	required
	outlined
	dense
	color="#8F0236"
>
</v-text-field>

<label style="font-size: 15px;">Stopovers (optional, you can pick multiple locations):</label>

<v-text-field
	prepend-icon="add_location_alt"
	placeholder="Enter a stopover"
	id="stopover"
	type="text"
	required
	outlined
	dense
	color="#8F0236"
>
</v-text-field>

<input type="hidden" v-model="from" id="destination" name="destination" required>

<input id="duration_text" type="hidden" v-model="duration" required></input>

<input id="distance" type="hidden" v-model="distance" required>

<input type="hidden" name="stopoverlocation" id="stopoverlocation"/>

<p id="stopover1"></p>

</tab-content>

<tab-content icon="ti-package" :before-change="validatePackage" title="Select Package">

<v-progress-circular
	:size="50"
	color="indigo darken-4"
	indeterminate
	style="margin-left:200px; margin-top:100px; margin-bottom:100px;"
	v-if="getprice"
>
</v-progress-circular>

	<v-tabs
	v-model="tab"
	background-color="transparent"
	color="#8F0236"
	grow
	v-if="!getprice"
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

<v-tabs-items v-model="tab" v-if="!getprice">

	<v-tab-item>
		<v-card color="basil" flat>
			<div style="padding:10px;">
				<v-btn
				outlined
				height="50px"
				block
				class="ma-0 test"
				:color="message ? 'white' : 'info'"
				@click="select('Messager', messager_price), message = !message"
				:style="{
				backgroundColor : message ? 'blue !important' : 'white',
				color: message ? 'white' : 'secondary'
			}"
			>
			<div style="margin-left: 0;">
				<v-img
				:src="`/images/courier.png`"
				style="width: 30px; height:30px;"
				></v-img>
			</div>
			<p style="padding-right:10px;">Messanger</p>
			<div style="padding-left:5px;" class="pull-right">
				KSH {{ messager_price }}
				pickup by {{ dtime }}
			</div>
			<v-tooltip top>
				<template v-slot:activator="{ on, attrs }">
					<v-btn icon v-bind="attrs" v-on="on">
						<v-icon color="pink darken-4">info</v-icon>
					</v-btn>
				</template>
				<ul v-for="(item, i) in messenger_pricings">
					<li>{{ item }}</li>
				</ul>
			</v-tooltip>
		</v-btn>
	</div>

	<div style="padding:10px;">
		<v-btn
		outlined
		height="50px"
		block
		class="ma-0 test"
		:color="express ? 'white' : 'info'"
		@click="select('Express Bike', bike_price), express = !express"
		:style="{
		backgroundColor : express ? 'blue !important' : 'white',
		color: express ? 'white' : 'secondary'
	}"
	>
	<div style="margin-left: 0;">
		<v-img
		:src="`/images/bycicle.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</div>
	<p style="padding-right:10px;">Bike</p>
	<div style="padding-left:5px;" class="pull-right">
		KSH {{ bike_price }}
		pickup by {{ dtime }}
	</div>
	<v-tooltip top>
		<template v-slot:activator="{ on, attrs }">
			<v-btn icon v-bind="attrs" v-on="on">
				<v-icon color="pink darken-4">info</v-icon>
			</v-btn>
		</template>
		<ul v-for="(item, i) in bike_pricings">
			<li>{{ item }}</li>
		</ul>
	</v-tooltip>
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
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="pickup ? 'white' : 'info'"
	@click="select('Pickup', pickup_price), pickup = !pickup"
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
<p style="padding-right:5px;">Pickup</p>
<div style="padding-left:5px;" class="pull-right">
	KSH {{ pickup_price }}
	pickup by {{ dtime }}
</div>
<v-tooltip top>
	<template v-slot:activator="{ on, attrs }">
		<v-btn icon v-bind="attrs" v-on="on">
			<v-icon color="pink darken-4">info</v-icon>
		</v-btn>
	</template>
	<ul v-for="(item, i) in van_pricings">
		<li>{{ item }}</li>
	</ul>
</v-tooltip>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="van ? 'white' : 'info'"
	@click="select('Van', van_price), van = !van"
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
<p style="padding-right:5px;">Van</p>
<div style="padding-left:5px;" class="pull-right">
	KSH {{ van_price }}
	pickup by {{ dtime }}
</div>
<v-tooltip top>
	<template v-slot:activator="{ on, attrs }">
		<v-btn icon v-bind="attrs" v-on="on">
			<v-icon color="pink darken-4">info</v-icon>
		</v-btn>
	</template>
	<ul v-for="(item, i) in van_pricings">
		<li>{{ item }}</li>
	</ul>
</v-tooltip>
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
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="tonn1 ? 'white' : 'info'"
	@click="select('3-Tonne Truck', three_ton_price), tonn1 = !tonn1"
	:style="{
	backgroundColor :tonn1 ? 'blue !important' : 'white',
	color: tonn1 ? 'white' : 'secondary'
	}"
	>
	<div style="margin-right: 0px;">

		<v-img
		:src="`/images/truck.png`"
		style="width: 30px; height:30px;"
		></v-img>

	</div>
	<p style="padding-right:5px;">3T Lorry</p>
	<div style="padding-left:5px;" class="pull-right">
		KSH {{ three_ton_price }}
		pickup by {{ dtime }}
	</div>
	<v-tooltip top>
		<template v-slot:activator="{ on, attrs }">
			<v-btn icon v-bind="attrs" v-on="on">
				<v-icon color="pink darken-4">info</v-icon>
			</v-btn>
		</template>
		<ul v-for="(item, i) in three_ton_pricings">
			<li>{{ item }}</li>
		</ul>
	</v-tooltip>
	</v-btn>
</div>

<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="ton1 ? 'white' : 'info'"
	@click="select('5-Tonne Truck', five_ton_price), ton1 = !ton1"
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
<p style="padding-right:5px;">5T Lorry</p>
<div style="padding-left:5px;" class="pull-right">
	KSH {{ five_ton_price }}
	pickup by {{ dtime }}
</div>
<v-tooltip top>
	<template v-slot:activator="{ on, attrs }">
		<v-btn icon v-bind="attrs" v-on="on">
			<v-icon color="pink darken-4">info</v-icon>
		</v-btn>
	</template>
	<ul v-for="(item, i) in five_ton_pricings">
		<li>{{ item }}</li>
	</ul>
</v-tooltip>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="ton2 ? 'white' : 'info'"
	@click="select('10-Tonne Truck', ten_ton_price), ton2 = !ton2"
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
<p style="padding-right:5px;">10T Lorry</p>
<div style="padding-left:5px;" class="pull-right">
	KSH {{ ten_ton_price }}
	pickup by {{ dtime }}
</div>
<v-tooltip top>
	<template v-slot:activator="{ on, attrs }">
		<v-btn icon v-bind="attrs" v-on="on">
			<v-icon color="pink darken-4">info</v-icon>
		</v-btn>
	</template>
	<ul v-for="(item, i) in ten_ton_pricings">
		<li>{{ item }}</li>
	</ul>
</v-tooltip>
</v-btn>
</div>

<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="ton2 ? 'white' : 'info'"
	@click="select('14-Tonne Truck', fourteen_ton_price), ton2 = !ton2"
	:style="{
	backgroundColor : ton2 ? 'blue !important' : 'white',
	color: ton2 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<v-img
	:src="`/images/trailer.png`"
	style="width: 30px; height:30px;"
	></v-img>
</div>
<p style="padding-right:5px;">14T Lorry</p>
<div style="padding-left:5px;" class="pull-right">
	KSH {{ fourteen_ton_price }}
	pickup by {{ dtime }}
</div>
<v-tooltip top>
	<template v-slot:activator="{ on, attrs }">
		<v-btn icon v-bind="attrs" v-on="on">
			<v-icon color="pink darken-4">info</v-icon>
		</v-btn>
	</template>
	<ul v-for="(item, i) in ten_ton_pricings">
		<li>{{ item }}</li>
	</ul>
</v-tooltip>
</v-btn>
</div>

<div style="padding:10px;">
	<v-btn
	outlined
	height="50px"
	block
	max-width="350"
	min-width="350"
	class="text-transform-lowercase"
	:color="ton3 ? 'white' : 'info'"
	@click="select('28-Tonne Truck', 0), ton3 = !ton3"
	:style="{
	backgroundColor : ton3 ? 'blue !important' : 'white',
	color: ton3 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<v-img
	:src="`/images/trailer4.png`"
	style="width: 30px; height:30px;"
	></v-img>
</div>
<p style="padding-right:5px;">28T Truck</p>
<div style="padding-left:5px;" class="pull-right">
	Special Package
</div>
<v-tooltip top>
	<template v-slot:activator="{ on, attrs }">
		<v-btn icon v-bind="attrs" v-on="on">
			<v-icon color="pink darken-4">info</v-icon>
		</v-btn>
	</template>
	<ul v-for="(item, i) in twentyeight_ton_pricings">
		<li>{{ item }}</li>
	</ul>
</v-tooltip>
</v-btn>
</div>

</v-card>
</v-tab-item>
</v-tabs-items>
</tab-content>
<tab-content icon="ti-info-alt" :before-change="validateInfo" title="Additional Information">
	<v-form  v-model="valid" class="last">

	<v-switch
          v-model="recipient"
          dense
          :label="`I am ${quiz} the recipient`"
          class="item"
          style="margin-top:20px;"
      ></v-switch>
      <v-text-field
          prepend-icon="person"
          label="Recipient Name"
          placeholder="Recipient Name e.g Mr James"
          outlined
          required
          v-model="r_name"
          dense
          color="#8F0236"
          v-if="!recipient"
      ></v-text-field>
      <vue-tel-input
          v-model="r_phone"
          required
          label="Enter Phone Number"
          autofocus
          :inputOptions="options"
          v-if="!recipient"
          color="#8F0236"
          style="margin-bottom:25px; width:360px; margin-left:30px;"
      ></vue-tel-input>

      <v-switch
          v-model="sender"
          dense
          :label="`I am ${quiz2} the sender`"
          class="item"
      ></v-switch>
      <v-text-field
          prepend-icon="person"
          label="Sender Name"
          placeholder="Sender Name e.g Mr James"
          outlined
          required
          v-model="s_name"
          dense
          color="#8F0236"
          v-if="!sender"
      ></v-text-field>
      <vue-tel-input
          v-model="s_phone"
          required
          label="Enter Phone Number"
          autofocus
          :inputOptions="options"
          v-if="!sender"
          color="#8F0236"
          style="margin-bottom:25px; width:360px; margin-left:30px;"
      ></vue-tel-input>

	<v-dialog
        ref="dialog"
        v-model="modal2"
        :return-value.sync="time"
        persistent
        width="290px"
      >
    <template v-slot:activator="{ on, attrs }">
      <v-text-field
      	style="margin-top:20px;"
        v-model="time"
        label="Select Pickup Date and time"
        prepend-icon="access_time"
        ampm-in-title
        readonly
        v-bind="attrs"
        dense
        outlined
        min="9:30"
      	max="12:00"
        :rules='datetimeRules'
        color="#8F0236"
        v-on="on">	
     </v-text-field>
    </template>
    <v-time-picker
      v-if="modal2"
      v-model="time"
      color="#8F0236"
      ampm-in-title
      :format="format"
      full-width>
      <v-spacer></v-spacer>
      <v-btn text color="#8F0236" @click="modal2 = false">Cancel</v-btn>
      <v-btn text color="#8F0236" @click="$refs.dialog.save(time)">OK</v-btn>
    </v-time-picker>
  </v-dialog>

  <v-text-field
	prepend-icon="info"
	placeholder="Additional Information"
	type="text"
	v-model="info"
	:rules="infoRules"
	required
	dense
	outlined
	color="#8F0236"
	>
  </v-text-field>

<v-switch
	v-model="loading_service"
	label="Add Loading Services ?"
	dense
	class="item"
></v-switch>

<v-radio-group class="item" v-model="payment">
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
</v-form>
</tab-content>
</form-wizard>

</v-card>
</v-col>
</v-row>

<v-dialog v-model="dialog" persistent max-width="290">
	<v-card>
		<v-card-title class="headline">Confirm Transaction</v-card-title>
		<v-card-text> {{ confirm_message }} </v-card-text>
		<v-card-actions>
			<v-spacer></v-spacer>
			<div class="text-center">
				<v-btn class="ma-8" color="red darken-4" rounded dark @click="dialog = false, dismiss()">Dismiss</v-btn>
				<v-btn class="ma-4" color="pink darken-4" rounded dark @click="dialog = false, confirm()">Order</v-btn>
			</div>
		</v-card-actions>
	</v-card>
</v-dialog>

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
<style type="text/css">
	.v-input--switch{
		padding-top: 0;
		padding-bottom: 0;
		margin-top: 0;
		margin-bottom: 0;
	}
</style>

<script>
import Vue from 'vue'
import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'
import { Card, Button, FormGroupInput } from '../assets/components';
Vue.use(VueFormGenerator)
export default{
	name: "Metro",
	bodyClass: 'page',
	components: {
		Card,
		[Button.name]: Button,
		[FormGroupInput.name]: FormGroupInput,
	},
	data: () => ({
		valid: null,
		title: "Volant Metro Order Form",
		subtitle: "please fill in all fields",
		toPlace: null,
		fromPlace: null,
		to: '',
		from: '',
		duration: '',
		dtime: '',
		dprice: '',
		distance: 0,
		tab: null,
		express: false,
		message: false,
		motorcycle: false,
		pickup: false,
		van: false,
		truck: false,
		value: '',
		price: '',
		payment: '',
		ton1: false,
		ton2: false,
		ton3: false,
		tonn1: false,
		tonn14: false,
		info: '',
		datetime: '',
		pick_time: '',
		alert: false,
		alertMessage: '',
		success: false,
		successMessage: '',
		loader: false,
		messager_price: 0,
		bike_price: 0,
		pickup_price: 0,
		van_price: 0,
		three_ton_price: 0,
		five_ton_price: 0,
		ten_ton_price: 0,
		fourteen_ton_price: 0,
		twentyeight_ton_price: 0,
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
		v => !!v || 'Date time is required',
		],
		locations: [],
		selectLocation: [],
		sendLocation: [],
		autoUpdate: true,
		isUpdating: false,
		description: '',
		stopoverlocation: [],
		dialog: false,
		snackbar2: false,
		text: 'Order dismissed',
		timeout: 3000,
		confirm_message: '',
		getprice: false,
		messenger_pricings: [],
		bike_pricings: [],
		van_pricings: [],
		three_ton_pricings: [],
		five_ton_pricings: [],
		ten_ton_pricings: [],
		twentyeight_ton_pricings: [],
		fourteen_ton_pricings: [],
		loading_service: false,
		loading_value: 0,
		time: null,
        modal2: false,
        format: 'ampm',
	    contact_info: true,
	    quiz: '',
        r_phone: '',
        r_name: '',
        recipient: true,
        quiz2: '',
        s_phone: '',
        s_name: '',
        sender: true,
        options: {
            showDialCode: true,
            tabindex: 0
        },
	}),

	watch: {
		isUpdating (val) {
			if (val) {
				setTimeout(() => (this.isUpdating = false), 3000)
			}
		},
		recipient () {
            if(this.recipient == true){
                this.quiz = ''
                let user = JSON.parse(localStorage.getItem('volant.user'))
                this.r_name = user.username
				this.r_phone = user.phone
            }else{
                this.quiz = 'not'
                this.r_name = ''
		        this.r_phone = ''
            }
        },
        sender () {
            if(this.sender == true){
                this.quiz2 = ''
                let user = JSON.parse(localStorage.getItem('volant.user'))
                this.s_name = user.username
				this.s_phone = user.phone
            }else{
                this.quiz2 = 'not'
                this.s_name = ''
				this.s_phone = ''
            }
        },
	},

	mounted() {

		axios.defaults.headers.common['Content-Type'] = 'application/json'
		axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

		let maps = document.createElement('script');
		maps.setAttribute('src',"/js/maps.js");
		document.head.appendChild(maps)

		let mapsApi = document.createElement('script');
		mapsApi.setAttribute('src',"https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=myMap");
		document.head.appendChild(mapsApi);

		let user = JSON.parse(localStorage.getItem('volant.user'))
		this.s_name = user.username
		this.s_phone = user.phone
		this.r_name = user.username
		this.r_phone = user.phone
	},

	methods: {

		remove (item) {
			const index = this.selectLocation.indexOf(item.name)
			if (index >= 0) this.selectLocation.splice(index, 1)
		},
			// receives a place object via the autocomplete component
			select(value, price){
				this.value = value
				this.price = price
				if(this.value == 'Messager' || this.value == 'Express Bike'){
					this.loading_value = 0
				}else{
					this.loading_value = 500
				}
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

				this.getprice = true;

				this.to = $("#origin").val()
				this.from = $("#destination").val()
				this.duration = $("#duration_text").val()
				this.distance = $("#distance").val()
				let time = new Date()
				time.setMinutes(time.getMinutes() + Math.round(this.duration));
				this.dtime = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3")

				//calculate price
				axios.post(`/api/pricing/volant_pricings`, {}).then(response => {

					let locations = $('#stopoverlocation').val();
                	locations = JSON.parse(locations);

                	console.log(this.distance);

					if(response.data[0].truck_type_id === 1){
						
						if(locations.length <= 2){
                			if (this.distance > response.data[0].light_unit_distance) {
							this.messager_price = Math.round(response.data[0].light_price+(this.distance-response.data[0].light_unit_distance)*response.data[0].light_unit_additional_price+response.data[0].insurance)
							}else{
								this.messager_price = Math.round(response.data[0].light_price+response.data[0].insurance);
							}
                		}else{
                			if (this.distance > response.data[0].light_unit_distance) {
							this.messager_price = Math.round(response.data[0].light_price+(this.distance-response.data[0].light_unit_distance)*response.data[0].light_unit_additional_price+response.data[0].additional_location+response.data[0].insurance)
							}else{
								this.messager_price = Math.round(response.data[0].light_price+response.data[0].additional_location+response.data[0].insurance);
							}
                		}
						this.messenger_pricings = [
							'-> Base Price for Messenger/Skater (CBD) Ksh 150',
							'-> Additional Price Ksh 20/km for distance past 2km',
							'-> Additional location Ksh 50 per location',
							'-> Insurance Ksh 10',
							'-> Waiting Fee 100(1/2)',
							'-> Loading Price __',
							'-> distance covered '+this.distance+' Km',
						];
					}
					if(response.data[1].truck_type_id === 2){
						if(locations.length <= 2){
							if (this.distance > response.data[1].light_unit_distance) {
								this.bike_price = Math.round(response.data[1].light_price+(this.distance-response.data[1].light_unit_distance)*response.data[1].light_unit_additional_price+response.data[1].insurance)
							}else{
								this.bike_price = response.data[1].light_price+response.data[1].insurance
							}
						}else{
							if (this.distance > response.data[1].light_unit_distance) {
								this.bike_price = Math.round(response.data[1].light_price+(this.distance-response.data[1].light_unit_distance)*response.data[1].light_unit_additional_price+response.data[1].insurance+response.data[1].additional_location)
							}else{
								this.bike_price = response.data[1].light_price+response.data[1].additional_location+response.data[1].insurance
							}
						}
						this.bike_pricings = [
							'-> Base Price for Motor Cycle (CBD) Ksh 222',
							'-> Additional Price Ksh 20/km for distance past 5km',
							'-> Additional location Ksh 50 per location',
							'-> Insurance Ksh 10',
							'-> Waiting Fee 50(1/2)',
							'-> Loading Price __',
							'-> distance covered '+this.distance+' Km',
						];
					}
					if(response.data[2].truck_type_id === 3){
						if(locations.length <= 2){
							if (this.distance > response.data[2].medium_unit_distance) {
								this.pickup_price = Math.round(response.data[2].medium_price+(this.distance-response.data[2].medium_unit_distance)*response.data[2].medium_unit_additional_price+response.data[2].insurance)
							}else{
								this.pickup_price = response.data[2].medium_price+response.data[2].insurance
							}
						}else{
							if (this.distance > response.data[2].medium_unit_distance) {
								this.pickup_price = Math.round(response.data[2].medium_price+(this.distance-response.data[2].medium_unit_distance)*response.data[2].medium_unit_additional_price+response.data[2].additional_location+response.data[2].insurance+response.data[2].waiting_time)
							}else{
								this.pickup_price = response.data[2].medium_price+response.data[2].additional_location+response.data[2].insurance
							}
						}
						this.van_pricings = [
							'-> Base Price for Pickup (CBD) Ksh 1,750',
							'-> Additional Price Ksh 50/km for distance past 5km',
							'-> Additional location Ksh 200 per location',
							'-> Insurance Ksh 200',
							'-> Waiting Fee 150(/HR)',
							'-> Loading Price Ksh 500',
							'-> distance covered '+this.distance+' Km',
						];
					}
					if(response.data[3].truck_type_id === 4){
						if(locations.length <= 2){
							if (this.distance > response.data[3].medium_unit_distance) {
							this.van_price = Math.round(response.data[3].medium_price+(this.distance-response.data[3].medium_unit_distance)*response.data[3].medium_unit_additional_price+response.data[3].insurance
								)
							}else{
								this.van_price = response.data[3].medium_price+response.data[3].insurance

							}	
						}else{
							if (this.distance > response.data[3].medium_unit_distance) {
							this.van_price = Math.round(response.data[3].medium_price+(this.distance-response.data[3].medium_unit_distance)*response.data[3].medium_unit_additional_price+response.data[3].additional_location+response.data[3].insurance
								)
							}else{
								this.van_price = response.data[3].medium_price+response.data[3].additional_location+response.data[3].insurance

							}
						}
						
						this.van_pricings = [
							'-> Base Price for Van (CBD) Ksh 1,750',
							'-> Additional Price Ksh 50/km for distance past 5km',
							'-> Additional location Ksh 200 per location',
							'-> Insurance Ksh 200',
							'-> Waiting Fee 150(/HR)',
							'-> Loading Price Ksh 500',
							'-> distance covered '+this.distance+' Km',
						];
					}
					if(response.data[4].truck_type_id === 5){
						if(locations.length <= 2){
							if (this.distance > response.data[4].heavy_unit_distance) {
							this.three_ton_price = Math.round(response.data[4].heavy_price+(this.distance-response.data[4].heavy_unit_distance)*response.data[4].heavy_unit_additional_price+response.data[4].insurance)
							}else{
								this.three_ton_price = response.data[4].heavy_price+response.data[4].insurance
							}	
						}else{
							if (this.distance > response.data[4].heavy_unit_distance) {
							this.three_ton_price = Math.round(response.data[4].heavy_price+(this.distance-response.data[4].heavy_unit_distance)*response.data[4].heavy_unit_additional_price+response.data[4].insurance)
							}else{
								this.three_ton_price = response.data[4].heavy_price+response.data[4].additional_location+response.data[4].insurance
							}
						}
						
						this.three_ton_pricings = [
							'-> Base Price for 3 Tonne Truck (CBD) Ksh 4,000',
							'-> Additional Price Ksh 60/km for distance past 10km',
							'-> Additional location Ksh 250 per location',
							'-> Insurance Ksh 500',
							'-> Waiting Fee 150(/HR)',
							'-> Loading Price Ksh 500',
							'-> distance covered '+this.distance+' Km',
						];
					}
					if(response.data[5].truck_type_id === 6){
						if(locations.length <= 2){
							if (this.distance > response.data[5].heavy_unit_distance) {
							this.five_ton_price = Math.round(response.data[5].heavy_price+(this.distance-response.data[5].heavy_unit_distance)*response.data[5].heavy_unit_additional_price+response.data[5].insurance)
							}else{
								this.five_ton_price = response.data[5].heavy_price+response.data[5].insurance
							}
						}else{
							if (this.distance > response.data[5].heavy_unit_distance) {
							this.five_ton_price = Math.round(response.data[5].heavy_price+(this.distance-response.data[5].heavy_unit_distance)*response.data[5].heavy_unit_additional_price+response.data[5].additional_location+response.data[5].insurance)
							}else{
								this.five_ton_price = response.data[5].heavy_price+response.data[5].additional_location+response.data[5].insurance
							}
						}
						this.five_ton_pricings = [
							'-> Base Price for 5 Tonne Truck (CBD) Ksh 6,000',
							'-> Additional Price Ksh 60/km for distance past 10km',
							'-> Additional location Ksh 250 per location',
							'-> Insurance Ksh 500',
							'-> Waiting Fee 150(/HR)',
							'-> Loading Price Ksh 500',
							'-> distance covered '+this.distance+' Km',
						];
					}
					if(response.data[6].truck_type_id === 7){
						if(locations.length <= 2){
							if (this.distance > response.data[6].heavy_unit_distance) {
							this.ten_ton_price = Math.round(response.data[6].heavy_price+(this.distance-response.data[6].heavy_unit_distance)*response.data[6].heavy_unit_additional_price+response.data[6].insurance)
							}else{
								this.ten_ton_price = response.data[6].heavy_price+response.data[6].insurance
							}
						}else{
							if (this.distance > response.data[6].heavy_unit_distance) {
							this.ten_ton_price = Math.round(response.data[6].heavy_price+(this.distance-response.data[6].heavy_unit_distance)*response.data[6].heavy_unit_additional_price+response.data[6].additional_location+response.data[6].insurance)
							}else{
								this.ten_ton_price = response.data[6].heavy_price+response.data[6].additional_location+response.data[6].insurance
							}
						}
						
						this.ten_ton_pricings = [
							'-> Base Price for 10 Tonne Truck (CBD) Ksh 7,500',
							'-> Additional Price Ksh 70/km for distance past 20km',
							'-> Additional location Ksh 500 per location',
							'-> Insurance Ksh 500',
							'-> Waiting Fee 250(/HR)',
							'-> Loading Price Ksh 500',
							'-> distance covered '+this.distance+' Km',
						];
					}

					// if(response.data[14].truck_type_id === 9){
					// 	if(locations.length <= 2){
					// 		if (this.distance > response.data[14].heavy_unit_distance) {
					// 		this.fourteen_ton_price = Math.round(response.data[14].heavy_price+(this.distance-response.data[14].heavy_unit_distance)*response.data[14].heavy_unit_additional_price+response.data[14].insurance)
					// 		}else{
					// 			this.fourteen_ton_price = response.data[14].heavy_price+response.data[14].insurance
					// 		}
					// 	}else{
					// 		if (this.distance > response.data[14].heavy_unit_distance) {
					// 		this.fourteen_ton_price = Math.round(response.data[14].heavy_price+(this.distance-response.data[14].heavy_unit_distance)*response.data[14].heavy_unit_additional_price+response.data[14].additional_location+response.data[14].insurance)
					// 		}else{
					// 			this.fourteen_ton_price = response.data[14].heavy_price+response.data[14].additional_location+response.data[14].insurance
					// 		}
					// 	}
						
					// 	this.fourteen_ton_pricings = [
					// 		'-> Base Price for 14 Tonne Truck (CBD) Ksh 11,500',
					// 		'-> Additional Price Ksh 70/km for distance past 20km',
					// 		'-> Additional location Ksh 500 per location',
					// 		'-> Insurance Ksh 500',
					// 		'-> Waiting Fee 500(/HR)',
					// 		'-> Loading Price Ksh 500',
					// 		'-> distance covered '+this.distance+' Km',
					// 	];
					// }

					this.twentyeight_ton_pricings = [
							'-> Base Price for 28 Tonne Truck (CBD) __ Special Package',
							'-> Additional Price Ksh 90/km for distance past 20km',
							'-> Additional location Ksh 1,000 per location',
							'-> Insurance Ksh 1,000',
							'-> Waiting Fee 500(/HR)',
							'-> Loading Price Ksh 500',
							'-> distance covered '+this.distance+' Km',
						];

					setTimeout(() => (this.getprice = false), 3000)
				});

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

				if (this.time === '' || this.payment === '' || this.info === '') {
					this.alert = true
					this.alertMessage = 'You Must enter all fields'
				}else{
					this.confirm_message = 'You are about to complete your order and pay ksh '+this.price+' to volant'
					this.dialog = true
				}
			},
			confirm: function(){
				axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

				let price = 0;

				if(this.loading_service === true){
					if(this.packages == 'Messager' || this.packages == 'Express Bike'){
						let loading_price = 0
						price = this.price + 0
					}else{
						let loading_price = 0
						price = this.price + 500
					}
				}else{
					price = this.price
				}

				let to = this.to
				let from = this.from
				let packages = this.value
				let instructions = this.info
				let datetime = this.time
				let user = JSON.parse(localStorage.getItem('volant.user'))
				let payment = this.payment
				let locations = $('#stopoverlocation').val();
				let distance = this.distance;

				let email = user.email;
				let sender_phone = this.s_phone;
				let sender_name = this.s_name;
				let user_id = user.id;
				let recipient_phone = this.r_phone;
				let recipient_name = this.r_name;

				this.successMessage = 'You have successfully made an order'

				this.loader = true

				locations = JSON.parse(locations);

				axios.post('/api/storeorders', {to, from, email, user_id, sender_name, sender_phone, recipient_name, recipient_phone, packages, price, datetime, instructions, payment, locations, distance,}).then(response => {
					let data = response.data

					this.loader = false

					this.$swal('Volant Order','You successfully made an order', 'success').then((result) => {
						let nextUrl = this.$route.params.nextUrl
						this.$router.push((nextUrl != null ? nextUrl : 'view_order/'+response.data.order.id))
					})

				}
				)
			},
			dismiss: function(){
				this.snackbar2 = true
				var location = this.$route.fullPath
				this.$router.replace('/')
				this.$nextTick(() => this.$router.replace(location))
			},
			close (v) {
				this.alert = v
			},
			closeSuccess(v){
				this.success = v
			},
			onChange(){
				$("#sendLocation").text(this.selectLocation)
				this.dialog = true
			}

		}
	}
	</script>
