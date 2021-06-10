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

      <v-row style="margin-right:200px; margin-left:0;">
        <v-col cols="12" xs="12" sm="6" md="6" >
         <v-card class="elevation-12 d-inline-block mx-sm-auto" id="pac-cardtest" max-width="450" min-width="450"
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

 <v-progress-circular
 :size="50"
 color="indigo darken-4"
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
color="#8F0236"
error-color="red"
class="mx-sm-auto"
v-if="!loader"
>
<tab-content icon="ti-location-pin" title="Enter Locations" :before-change="validateLocation">

   <label style="font-size: 15px;">Pickup Location:</label>

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

<label style="font-size: 15px;">Drop Off:</label>

<v-text-field
    prepend-icon="pin_drop"
    placeholder="Enter a location"
    id="pac-input2"
    type="text"
    required
    outlined
    dense
    >
</v-text-field>

<label style="font-size: 15px;">Stopovers (optional, you can pick multiple locations):</label>

<v-text-field
    prepend-icon="add_location_alt"
    placeholder="Enter a location"
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

    <v-tab-item
    >
    <v-card
    color="basil"
    flat
    >
    <div style="padding: 10px;">
        <v-btn
        outlined
        height="50px"
        block
        max-width="350"
        min-width="350"
        class="text-transform-lowercase"
        :color="tonn3 ? 'white' : 'info'"
        @click="select('3-Tonne Truck', three_ton_price), tonn3 = !tonn3"
        :style="{
        backgroundColor :tonn3 ? 'blue !important' : 'white',
        color: tonn3 ? 'white' : 'secondary'
    }"
    >
    <div style="margin-right: 0px;">

        <v-img
        :src="`/images/truck.png`"
        style="width: 30px; height:30px;"
        ></v-img>

    </div>
    <p style="padding-right:5px;">3T Canter</p>
    <div style="padding-left:5px;" class="pull-right">
        KES {{ three_ton_price }}
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
    :color="tonn1 ? 'white' : 'info'"
    @click="select('5-Tonne Truck', five_ton_price), tonn1 = !tonn1"
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
<p style="padding-right:5px;">5T Lorry</p>
<div style="padding-left:5px;" class="pull-right">
    KES {{ five_ton_price }}
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
    KES {{ ten_ton_price }}
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
    :color="ton1 ? 'white' : 'info'"
    @click="select('14-Tonne Truck', fourteen_ton_price), ton1 = !ton1"
    :style="{
    backgroundColor :ton1 ? 'blue !important' : 'white',
    color: ton1 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">

    <v-img
    :src="`/images/trailer.png`"
    style="width: 30px; height:30px;"
    ></v-img>

</div>
<p style="padding-right:5px;">14T Truck</p>
<div style="padding-left:5px;" class="pull-right">
    KES {{ fourteen_ton_price }}
    pickup by {{ dtime }}
</div>
<v-tooltip top>
    <template v-slot:activator="{ on, attrs }">
        <v-btn icon v-bind="attrs" v-on="on">
            <v-icon color="pink darken-4">info</v-icon>
        </v-btn>
    </template>
    <ul v-for="(item, i) in fourteen_ton_pricings">
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
    @click="select('28-Tonne Truck', twentyeight_ton_price), ton3 = !ton3"
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
    KES {{ twentyeight_ton_price }}
    pickup by {{ dtime }}
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
    <v-form v-model="valid" class="last">

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

    <v-select
        :items="truck_categories"
        label="Truck Category:*"
        outlined
        dense
        class="d-flex "
        v-model="truck_category"
        style="padding:0; margin:0;"
        prepend-icon="category"
    ></v-select>


    <v-text-field
        prepend-icon="info"
        placeholder="Enter a location"
        type="text"
        v-model="info"
        :rules="infoRules"
        required
        outlined
        dense
        color="#8F0236"
        >
    </v-text-field>

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

<v-radio-group class="item" v-model="payment">
    <v-label>Payment Type:*</v-label>
    <div class="row">
        <div class="col-md-6">
            <v-radio
            label="Pay With Mpesa"
            color="green"
            value="mpesa"
            ></v-radio>
        </div>
        <div class="col-md-6">
            <v-radio
            label="Pay On Delivery"
            color="blue"
            value="delivery"
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

<script>
import Vue from 'vue'
import VueFormGenerator from 'vue-form-generator'
import 'vue-form-generator/dist/vfg.css'
import { Card, Button, FormGroupInput } from '../assets/components';
Vue.use(VueFormGenerator)
export default{
	name: "Freight",
	bodyClass: 'page',
	components: {
		Card,
		[Button.name]: Button,
		[FormGroupInput.name]: FormGroupInput,
	},
	data: () => ({
		valid: null,
		title: "Volant Freight Order Form",
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
		pickup: false,
		van: false,
		truck: false,
		value: '',
		price: '',
		payment: '',
        truck_category: '',
		ton1: false,
		ton2: false,
		ton3: false,
        tonn1: false,
        tonn2: false,
        tonn3: false,
		info: '',
		datetime: '',
        pick_time: '',
		alert: false,
		alertMessage: '',
		success: false,
		successMessage: '',
		loader: false,
        three_ton_price: 0,
        five_ton_price: 0,
        ten_ton_price: 0,
        fourteen_ton_price: 0,
        twentyeight_ton_price: 0,
		items: [
		{text: 'Medium', img: '/images/logistics.png'},
		{text: 'Large', img: '/images/cart.png'}
		],
		packages: [
		{text: 'Small', icon: 'input'},
		{text: 'Medium', icon: 'input'},
		{text: 'Large', icon: 'input'}
		],
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
		locations: [],
		selectLocation: [],
		sendLocation: [],
		autoUpdate: true,
		isUpdating: false,
		description: '',
		stopoverlocation: [],
        truck_categories: ['Closed', 'Open', 'Flatbed', 'High sided', 'Low Sided'],
        dialog: false,
        confirm_message: '',
        getprice: false,
        three_ton_pricings: [],
        five_ton_pricings: [],
        ten_ton_pricings: [],
        fourteen_ton_pricings: [],
        twentyeight_ton_pricings: [],
        time: null,
        modal2: false,
        format: 'ampm',
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
		maps.setAttribute('src',"/js/freight.js");
		document.head.appendChild(maps)

		let mapsApi = document.createElement('script');
		mapsApi.setAttribute('src',"https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=freight");
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
			},

			validateInfo: function(){

				if (this.payment == '' && this.truck_category == '') {
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

				let time = new Date();
				time.setMinutes(time.getMinutes() + Math.round(this.duration));
				this.dtime = time.toLocaleTimeString().replace(/([\d]+:[\d]{2})(:[\d]{2})(.*)/, "$1$3")
                //calculate price
                axios.post(`/api/pricing/volant_pricings`, {}).then(response => {

                    let locations = $('#stopoverlocation').val();
                    locations = JSON.parse(locations);
                    let stops_price = 0;
                    if(locations.length > 2){
                        var stops = locations.length - 2
                        stops_price = 100*stops
                    }

                    if(response.data[7].truck_type_id === 5){
                        if(locations.length <= 2){
                            if (this.distance > response.data[7].cargo_unit_distance) {
                            this.three_ton_price = Math.round(response.data[7].cargo_price+(this.distance-response.data[7].cargo_unit_distance)*response.data[7].cargo_unit_additional_price+response.data[7].insurance+response.data[7].loading)
                            }else{
                                this.three_ton_price = response.data[7].cargo_price+response.data[7].insurance+response.data[7].loading
                            }
                        }else{
                            if (this.distance > response.data[7].cargo_unit_distance) {
                            this.three_ton_price = Math.round(response.data[7].cargo_price+(this.distance-response.data[7].cargo_unit_distance)*response.data[7].cargo_unit_additional_price+response.data[7].additional_location+response.data[7].insurance+response.data[7].loading)
                            }else{
                                this.three_ton_price = response.data[7].cargo_price+response.data[7].additional_location+response.data[7].insurance+response.data[7].loading
                            }
                        }
                        this.three_ton_pricings = [
                            '-> Base Price for 3 Tonne Truck (CBD) Ksh 5,999',
                            '-> Additional Price Ksh 70/km for distance past 50km',
                            '-> Additional location Ksh 250 per location',
                            '-> Insurance Ksh 500',
                            '-> Loading Price Ksh 500',
                            '-> Waiting Fee __',
                            '-> distance covered '+this.distance+' Km',
                        ];
                    }

                    if(response.data[8].truck_type_id === 6){
                        if(locations.length <= 2){
                            if (this.distance > response.data[8].cargo_unit_distance) {
                            this.five_ton_price = Math.round(response.data[8].cargo_price+(this.distance-response.data[8].cargo_unit_distance)*response.data[8].cargo_unit_additional_price+response.data[8].insurance+response.data[8].loading)
                            }else{
                                this.five_ton_price = response.data[8].cargo_price+response.data[8].insurance+response.data[8].loading
                            }
                        }else{
                            if (this.distance > response.data[8].cargo_unit_distance) {
                            this.five_ton_price = Math.round(response.data[8].cargo_price+(this.distance-response.data[8].cargo_unit_distance)*response.data[8].cargo_unit_additional_price+response.data[8].additional_location+response.data[8].insurance+response.data[8].loading)
                            }else{
                                this.five_ton_price = response.data[8].cargo_price+response.data[8].insurance+response.data[8].loading+response.data[8].additional_location
                            }
                        }
                        this.five_ton_pricings = [
                            '-> Base Price for 5 Tonne Truck (CBD) Ksh 7,499',
                            '-> Additional Price Ksh 70/km for distance past 50km',
                            '-> Additional location Ksh 250 per location',
                            '-> Insurance Ksh 500',
                            '-> Loading Price Ksh 500',
                            '-> Waiting Fee __',
                            '-> distance covered '+this.distance+' Km',
                        ];
                    }

                    if(response.data[9].truck_type_id === 7){
                        if(locations.length <= 2){
                            if (this.distance > response.data[9].cargo_unit_distance) {
                            this.ten_ton_price = Math.round(response.data[9].cargo_price+(this.distance-response.data[9].cargo_unit_distance)*response.data[9].cargo_unit_additional_price+response.data[9].insurance+response.data[9].loading)
                            }else{
                                this.ten_ton_price = response.data[9].cargo_price+response.data[9].insurance+response.data[9].loading
                            }
                        }else{
                            if (this.distance > response.data[9].cargo_unit_distance) {
                            this.ten_ton_price = Math.round(response.data[9].cargo_price+(this.distance-response.data[9].cargo_unit_distance)*response.data[9].cargo_unit_additional_price+response.data[9].additional_location+response.data[9].insurance+response.data[9].loading)
                            }else{
                                this.ten_ton_price = response.data[9].cargo_price+response.data[9].insurance+response.data[9].loading+response.data[9].additional_location
                            }
                        }
                        
                        this.ten_ton_pricings = [
                            '-> Base Price for 10 Tonne Truck (CBD) Ksh 9,999',
                            '-> Additional Price Ksh 90/km for distance past 50km',
                            '-> Additional location Ksh 500 per location',
                            '-> Insurance Ksh 500',
                            '-> Loading Price Ksh 500',
                            '-> Waiting Fee __',
                            '-> distance covered '+this.distance+' Km',
                        ];
                    }

                    if(response.data[10].truck_type_id === 9){
                        if(locations.length <= 2){
                            if (this.distance > response.data[10].cargo_unit_distance) {
                            this.fourteen_ton_price = Math.round(response.data[10].cargo_price+(this.distance-response.data[10].cargo_unit_distance)*response.data[10].cargo_unit_additional_price+response.data[10].insurance+response.data[10].loading)
                            }else{
                                this.fourteen_ton_price = response.data[10].cargo_price+response.data[10].insurance+response.data[10].loading
                            }
                        }else{
                            if (this.distance > response.data[10].cargo_unit_distance) {
                            this.fourteen_ton_price = Math.round(response.data[10].cargo_price+(this.distance-response.data[10].cargo_unit_distance)*response.data[10].cargo_unit_additional_price+response.data[10].additional_location+response.data[10].insurance+response.data[10].loading)
                            }else{
                                this.fourteen_ton_price = response.data[10].cargo_price+response.data[10].additional_location+response.data[10].insurance+response.data[10].loading
                            }
                        }
                        
                        this.fourteen_ton_pricings = [
                            '-> Base Price for 14 Tonne Truck (CBD) Ksh 12,499',
                            '-> Additional Price Ksh 90/km for distance past 50km',
                            '-> Additional location Ksh 500 per location',
                            '-> Insurance Ksh 1000',
                            '-> Loading Price Ksh 500',
                            '-> Waiting Fee __',
                            '-> distance covered '+this.distance+' Km',
                        ];
                    }

                    if(response.data[11].truck_type_id === 8){
                        if(locations.length <= 2){
                            if (this.distance > response.data[11].cargo_unit_distance) {
                            this.twentyeight_ton_price = Math.round(response.data[11].cargo_price+(this.distance-response.data[11].cargo_unit_distance)*response.data[11].cargo_unit_additional_price+response.data[11].insurance+response.data[11].loading)
                            }else{
                                this.twentyeight_ton_price = response.data[11].cargo_price+response.data[11].insurance+response.data[11].loading
                            }
                        }else{
                            if (this.distance > response.data[11].cargo_unit_distance) {
                            this.twentyeight_ton_price = Math.round(response.data[11].cargo_price+(this.distance-response.data[11].cargo_unit_distance)*response.data[11].cargo_unit_additional_price+response.data[11].additional_location+response.data[11].insurance+response.data[11].loading)
                            }else{
                                this.twentyeight_ton_price = response.data[11].cargo_price+response.data[11].insurance+response.data[11].loading+response.data[11].additional_location
                            }
                        }

                        this.twentyeight_ton_pricings = [
                            '-> Base Price for 28 Tonne Truck (CBD) Ksh 17,499',
                            '-> Additional Price Ksh 100/km for distance past 50km',
                            '-> Additional location Ksh 1000 per location',
                            '-> Insurance Ksh 1000',
                            '-> Loading Price Ksh 500',
                            '-> Waiting Fee __',
                            '-> distance covered '+this.distance+' Km',
                        ];
                    }
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
				if (this.datetime === '' || this.pick_time === '' || this.payment === '' || this.info === '' || this.truck_category === '') {
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

                let to = this.to
                let from = this.from
                let packages = this.value
                let price = this.price
                let truck_category = this.truck_category
                let user = JSON.parse(localStorage.getItem('volant.user'))
                let payment = this.payment
                let locations = $('#stopoverlocation').val();
                let datetime = this.time
                let distance = this.distance
                let pick_time = this.pick_time
                let instructions = this.info

                let email = user.email;
                let sender_phone = this.s_phone;
                let sender_name = this.s_name;
                let user_id = user.id;
                let recipient_phone = this.r_phone;
                let recipient_name = this.r_name;

                locations = JSON.parse(locations);

                this.successMessage = 'You have successfully made an order'

                this.loader = true

                axios.post('/api/storefreightorders', {to, from, email, user_id, sender_name, sender_phone, recipient_name, recipient_phone, packages, price, datetime, truck_category, payment, locations, distance, instructions}).then(response => {
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
