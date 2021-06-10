<template>
	<v-container fluid fluid-height>
		<!-- <v-spacer></v-spacer> -->
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
<div class="row">
	<div class="col-md-5">
		<form-wizard
		@on-complete="onComplete"
		v-bind:title="title"
		v-bind:subtitle="subtitle"
		color="blue"
		error-color="#a94442"
		class="mx-sm-auto"
		>
		<tab-content icon="ti-location-pin" title="Enter Locations" :before-change="validateLocation">
			<label>To *</label>
			<gmap-autocomplete
			@place_changed="setTo"
			autofocus
			absolute
			class="form-control"
			required
			>
		</gmap-autocomplete>

		<label>From *</label>
		<gmap-autocomplete
		@place_changed="setFrom"
		autofocus
		absolute
		required="true"
		class="form-control"
		>
	</gmap-autocomplete>
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
	height="80px"
	block
	class="text-transform-lowercase"
	:color="express ? 'white' : 'info'"
	@click="select('express'), express = !express"
	:style="{
	backgroundColor : express ? 'blue !important' : 'white',
	color: express ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">express<span>
		<v-img
		:src="`/images/motorcycle.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 348
	pickup by 3:48pm
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
	height="80px"
	block
	class="text-transform-lowercase"
	:color="pickup ? 'white' : 'info'"
	@click="select('pickup'), pickup = !pickup"
	:style="{
	backgroundColor :pickup ? 'blue !important' : 'white',
	color: pickup ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">Pickup<span>
		<v-img
		:src="`/images/pickup.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by 3:48pm
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="80px"
	block
	class="text-transform-lowercase"
	:color="van ? 'white' : 'info'"
	@click="select('Van'), van = !van"
	:style="{
	backgroundColor : van ? 'blue !important' : 'white',
	color: van ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">Van<span>
		<v-img
		:src="`/images/delivery.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by 3:48pm
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="80px"
	block
	class="text-transform-lowercase"
	:color="truck ? 'white' : 'info'"
	@click="select('Truck'), truck = !truck"
	:style="{
	backgroundColor : truck ? 'blue !important' : 'white',
	color: truck ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">Truck<span>
		<v-img
		:src="`/images/truck.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by 3:48pm
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
	height="80px"
	block
	class="text-transform-lowercase"
	:color="ton1 ? 'white' : 'info'"
	@click="select('5 Tonn Truck'), ton1 = !ton1"
	:style="{
	backgroundColor :ton1 ? 'blue !important' : 'white',
	color: ton1 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">5 Tonn Truck<span>
		<v-img
		:src="`/images/truck2.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by 3:48pm
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="80px"
	block
	class="text-transform-lowercase"
	:color="ton2 ? 'white' : 'info'"
	@click="select('10 Ton Truck'), ton2 = !ton2"
	:style="{
	backgroundColor : ton2 ? 'blue !important' : 'white',
	color: ton2 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">10 Ton Truck<span>
		<v-img
		:src="`/images/delivery.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by 3:48pm
</div>
</v-btn>
</div>
<div style="padding:10px;">
	<v-btn
	outlined
	height="80px"
	block
	class="text-transform-lowercase"
	:color="ton3 ? 'white' : 'info'"
	@click="select('28 Ton Truck'), ton3 = !ton3"
	:style="{
	backgroundColor : ton3 ? 'blue !important' : 'white',
	color: ton3 ? 'white' : 'secondary'
}"
>
<div style="margin-right: 0px;">
	<p style="pull-right">28 Ton Truck<span>
		<v-img
		:src="`/images/truck.png`"
		style="width: 30px; height:30px;"
		></v-img>
	</span></p>
</div>
<div style="padding-left:20px;" class="pull-right">
	KES 1914
	pickup by 3:48pm
</div>
</v-btn>
</div>

</v-card>
</v-tab-item>
</v-tabs-items>
</tab-content>
<tab-content icon="ti-info-alt" :before-change="validateInfo" title="Additional Information">
	<v-form v-model="valid">
		<v-text-field
		v-model="info"
		:rules="infoRules"
		label="Additional Information"
		required
		></v-text-field>
		<v-datetime-picker
		label="Select Delivery Time"
		v-model="datetime"
		:rules='datetimeRules'
		>
	</v-datetime-picker>
</v-form>
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

.v-btn::before {
	border-color: grey !important;
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
		valid: null,
		title: "Volant Order Form",
		subtitle: "please fill in all fields",
		center: { lat: 45.508, lng: -73.587 },
		markers: [],
		places: [],
		toPlace: null,
		fromPlace: null,
		to: '',
		from: '',
		tab: null,
		express: false,
		pickup: false,
		van: false,
		truck: false,
		value: '',
		ton1: false,
		ton2: false,
		ton3: false,
		info: '',
		datetime: '',
		alert: false,
		alertMessage: '',
		success: false,
		successMessage: '',
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

	mounted(){
		this.geolocate();
	},

	methods: {
			// receives a place object via the autocomplete component
			select(value){
				this.value = value
			},
			setTo(place) {
				this.toPlace = place;

				console.log(place)

				this.to = this.toPlace.name+','+this.toPlace.formatted_address

				const marker = {
					lat: this.toPlace.geometry.location.lat(),
					lng: this.toPlace.geometry.location.lng()
				};
				this.markers.push({ position: marker });
				this.places.push(this.toPlace);
				this.center = marker;
				this.toPlace = null;
			},

			setFrom(place) {
				this.fromPlace = place;

				this.from = this.fromPlace.name+','+this.fromPlace.formatted_address

				const marker = {
					lat: this.fromPlace.geometry.location.lat(),
					lng: this.fromPlace.geometry.location.lng()
				};
				this.markers.push({ position: marker });
				this.places.push(this.fromPlace);
				this.center = marker;
				this.fromPlace = null;
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

				let to = this.to
				let from = this.from
				let packages = this.value
				let info = this.info
				let datetime = this.datetime
				let user = JSON.parse(localStorage.getItem('volant.user'))
				let email = user.email
				let phone = user.phone

				this.successMessage = 'You have successfully made an order'

				axios.post('/api/storeorders', {to, from, packages, info, datetime, email, phone}).then(response => {
					let data = response.data

					this.success = true
					this.$router.push('orders')
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

	<div class="card-body">
                 <div id="title">
                  Enter your location
                </div>

                <div id="type-selector" class="pac-controls">
                  <input type="radio" name="type" id="changetype-all" checked="checked">
                  <label for="changetype-all">All</label>

                  <input type="radio" name="type" id="changetype-establishment">
                  <label for="changetype-establishment">Establishments</label>

                  <input type="radio" name="type" id="changetype-address">
                  <label for="changetype-address">Addresses</label>

                  <input type="radio" name="type" id="changetype-geocode">
                  <label for="changetype-geocode">Geocodes</label>
                </div>
                <div id="strict-bounds-selector" class="pac-controls">
                  <input type="checkbox" id="use-strict-bounds" value="">
                  <label for="use-strict-bounds">Strict Bounds</label>
                </div>

                <form id="distance_form">
                  <div id="pac-container" class="form-group">
                    <label style="font-size: 15px;">Your Location:</label>
                    <input id="pac-input" style="width: 70%" class="form-control" type="text"
                    placeholder="Enter a location">
                    <input type="hiden" id="origin" name="origin" required>
                  </div>

                  <div id="pac-container" class="form-group">
                    <label style="font-size: 15px;">Destination:</label>
                    <input id="pac-input2" style="width: 70%" class="form-control" type="text"
                    placeholder="Enter a location">
                    <input type="hidden" id="destination" name="destination" required>
                  </div>

                  <input type="submit" id="proceed" value="continue" class="btn btn-info">
                </form>

              </div>

              <div id="result" class="card">
              <ul class="list-group d-flex justify-content-between card-body">
               {{--  <li class="list-group-item">
                  Distance In Mile :
                  <span id="in_mile" style="color: #fff" class="badge badge-success badge-pill"></span>
                </li> --}}
                <li class="list-group-item d-flex justify-content-between">
                  Distance In Kilo :
                  <span id="in_kilo" style="color: #fff" class="badge badge-success badge-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  Time:
                  <span id="duration_text" style="color: #fff" class="badge badge-success badge-pill"></span>
                </li>
                  <span id="time2" style="color: #fff; display: none;" class="badge badge-success badge-pill"></span>

                <li class="list-group-item d-flex justify-content-between">
                  From :
                  <span id="from" style="color: #fff" class="badge badge-success badge-pill"></span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  To :
                  <span id="to" style="color: #fff" class="badge badge-success badge-pill"></span>
                </li>
              </ul>
            </div>


            //testing

            <style type="text/css">
  .mobile {
      color: #333;
    }

    @media screen and (max-width: 768px) {
      .mobile table.v-table tr {
        max-width: 100%;
        position: relative;
        display: block;
      }

      .mobile table.v-table tr:nth-child(odd) {
        border-left: 6px solid deeppink;
      }

      .mobile table.v-table tr:nth-child(even) {
        border-left: 6px solid cyan;
      }

      .mobile table.v-table tr td {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #f5f5f5;
        height: auto;
        padding: 10px;
      }

      .mobile table.v-table tr td ul li:before {
        content: attr(data-label);
        padding-right: .5em;
        text-align: left;
        display: block;
        color: #999;

      }
      .v-datatable__actions__select
      {
        width: 50%;
        margin: 0px;
        justify-content: flex-start;
      }
      .mobile .theme--light.v-table tbody tr:hover:not(.v-datatable__expand-row) {
        background: transparent;
      }

    }
    .flex-content {
      padding: 0;
      margin: 0;
      list-style: none;
      display: flex;
      flex-wrap: wrap;
      width: 100%;
    }

    .flex-item {
      padding: 5px;
      width: 50%;
      height: 80px;
      font-weight: bold;
    }
</style>
<template>
  <v-container fluid fill-height>

  <template>
          <v-layout v-resize="onResize" column style="padding-top:56px">

              <v-alert
                :value="success"
                dismissible
                transition="scale-transition"
                text
                prominent
                outlined
                type="success"
                class="mx-sm-auto"
                width="350px"
                @input="close"
                align-center
                style="margin-bottom:"
                justfy-center
                >
                {{ successMessage }}
              </v-alert>
        <v-spacer></v-spacer>

              <v-data-table 
              :headers="headers" 
              :items="orders" 
              :search="search"
              :single-expand="singleExpand"
              :expanded.sync="expanded" 
              :loading="loading" 
              loading-text="Loading... Please wait"
              class="elevation-1"
              item-key="name"
              show-expand
              @click:row="clicked"
              >
                  <template v-slot:top>
                    <v-toolbar dark color="#8F0236">
                      <v-row class="pt-10">
                        <v-col cols="12" xs="12" sm="12" md="6">
                          <v-toolbar-title class="white--text"> All Orders</v-toolbar-title>
                          <v-spacer></v-spacer>
                        </v-col>
                          <v-col cols="12" xs="12" sm="12" md="6">
                          <v-text-field v-model="search" append-icon="search" label="Search By Origin Or Destination"></v-text-field>
                          <v-menu offset-y :nudge-left="170" :close-on-content-click="false">
                              <v-btn icon>
                                  <v-icon>more_vert</v-icon>
                                </v-btn>
                              <v-list>
                                <v-list-tile  v-for="(item, index) in headers"  :key="item.value"   @click="changeSort(item.value)">
                                  <!-- <v-list-tile-title>Text<v-icon v-if="pagination.sortBy === item.value">{{pagination.descending ? 'arrow_downward':'arrow_upward'}}</v-icon></v-list-tile-title> -->
                                </v-list-tile>
                              </v-list>
                            </v-menu>
                        </v-col>
                      </v-row>
                    </v-toolbar>
                  </template>
                  <template v-slot:item="props">
                    <tr style="cursor: pointer;">
                      <td>{{ props.item.origin[0] }}</td>
                      <td>{{ props.item.destination }}</td>
                      <td><v-chip color="#8F0236" style="color:#ffffff;">{{ props.item.category }} </v-chip></td>
                      <td>{{ props.item.name }}</td>
                      <td>{{ props.item.pickup_datetime }}</td>
                      <td>{{ props.item.distance }} Km</td>
                      <td>{{ props.item.stops_count }}</td>
                      <td>Ksh {{ props.item.total }}</td>
                      <td>
                        <v-menu>
                          <template v-slot:activator="{ on }">
                            <v-btn
                              dark
                              icon
                              v-on="on"
                              color="#000"
                            >
                              <v-icon>mdi-dots-vertical</v-icon>
                            </v-btn>
                          </template>
                        </v-menu>
                      </td>
                    </tr>
                    <!-- <td>More info about</td> -->
                  </template>
                  <template v-slot:expanded-item="props">
                        <td>Testing this</td>
                  </template>
                  <v-alert style="padding-top:20px;" slot="no-results" :value="true" color="error" icon="warning">
                    Your search for {{ search }} found no results.
                  </v-alert>
                </v-data-table>
        </v-layout>
      </template>
  </v-container>
</template>

<script>
  export default{
    name: "orders",
    data(){
      return{
        welcome: "Welcome to Your Orders",
        expanded: [],
        singleExpand: false,
        orders: [],
        totalOrders: 0,
        loading: true,
        pagination: {},
        orders_length: 0,
        headers: [
        {text: 'from', value: "origin", align: 'left'},
        {text: 'to', value: "destination"},
        {text: 'category', value: "category"},
        {text: 'package', value: "name"},
        {text: 'Time of Delivery', value: "pickup_datetime"},
        {text: 'Distance', value: "distance"},
        {text: 'No. of Stops', value: "stops_count"},
        {text: 'Price', value: "total"},
        {text: 'action'},
        {text: '', value: 'data-table-expand'},
        ],
            selected: [],
            search: '',
            isMobile: false,
            successMessage: '',
            success: false,
            tab: null,
      }
    },
    watch: {
      pagination: {
        handler () {
          this.getData()
            .then(data => {
              this.orders = data.items
              this.totalOrders
            })
        },
        deep: true
      }
    },
    beforeMount() {

      this.user = JSON.parse(localStorage.getItem('volant.user'))
      let user_id = this.user.id

      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')
          this.loading = true
          axios.post(`/api/getorders`, {user_id: user_id}).then(response => {
            let data = []
            Object.values(response.data).forEach((value) => {
              this.orders.push(value);
              this.loading = false
            })
          })
          // setTimeout(() => {
            
          // }, 2000)
      },
      methods: {
        remove(id, index) {
          axios.defaults.headers.common['Content-Type'] = 'application/json'
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

        axios.post(`/api/deleteOrder`,{id}).then(
          response => {
            let data = response.data.order
            this.orders.splice(index, 1)
            this.success = true
            this.successMessage = 'Order'+data.id+' Has been successfully deleted'
            // this.$router.push('orders')
          })
        },
        vieworder(id, index){
          let nextUrl = this.$route.params.nextUrl
          this.$router.push((nextUrl != null ? nextUrl : 'view_order/'+id))
        },
        onResize() {
            if (window.innerWidth < 769)
              this.isMobile = true;
            else
              this.isMobile = false;
          },
          toggleAll() {
            if (this.selected.length) this.selected = []
            else this.selected = this.orders.slice()
          },
          close (v) {
            this.alert = v
          },
          clicked(v){
            console.log(v)
            // this.expanded.push(v)
          }
      }
  }
</script>

