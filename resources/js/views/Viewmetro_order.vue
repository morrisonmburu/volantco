<style type="text/css">
  #back {
    top: 0;
    left: 0;
    height:100%;
    width:100%;
    position: absolute;
    background: url('/images/map2.png') no-repeat center center;
    background-size: cover;
    /*transform: scale(1.1);*/
  }
</style>
<template>
  <div>
    <span id="back"></span>
    <v-card v-if="loader" class="mx-auto" style="top: 5em; left: 2.5em; right: 5em; bottom:2.5em; height:89%; width:95%; position:fixed;">
      <v-progress-circular
      :size="50"
      color="indigo darken-4"
      indeterminate
      style="margin-left:50%; margin-top:250px;"
      v-if="loader"
      >
    </v-progress-circular>
    </v-card>
    <v-card v-if="!loader" class="mx-auto" style="top: 5em; left: 2.5em; right: 5em; bottom:2.5em; height:89%; width:95%; position:fixed;">
      <v-list-item>
        <v-list-item-content class="d-flex pr-10 pl-10">
          <v-list-item-title class="pt-3" ><v-icon class="pr-3" color="indigo darken-4">check_box</v-icon>Order Number: #vlt<span>{{ order_id }}</span></v-list-item-title>
        </v-list-item-content>
        <v-list-item-content class="d-flex pr-10 pl-10">
          <v-list-item-title class="pt-3"><v-icon class="pr-3" color="indigo darken-4">local_activity</v-icon>Status: <v-chip :color="status_color" style="color:#fff;">{{ status }}</v-chip></v-list-item-title>
        </v-list-item-content>
        <v-list-item-content class="d-flex pr-10 pl-10">
          <v-list-item-title class="pt-3"><v-icon class="pr-3" color="indigo darken-4">credit_card</v-icon>Cost: <span>{{ cost }}</span></v-list-item-title>
        </v-list-item-content>
        <v-list-item-content class="d-flex pr-10 pl-10">
          <v-list-item-title class="pt-3"><v-icon class="pr-3" color="indigo darken-4">timeline</v-icon>Order Timeline</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>
      <v-row>
        <v-col xs="6" sm="6" md="3">
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
              >
                <v-card-title style="padding-top:0;padding-bottom:0;" class="title">{{ item.text }}</v-card-title>
                <v-card-text class="white text--primary">
                  <p>{{ item.location }}</p>
                </v-card-text>
              </v-card>
            </v-timeline-item>
          </v-timeline>
        </v-col>
        <v-col xs="6" sm="6" md="3">
          <v-list-item>
            <v-list-item-content class="d-flex pr-10 pl-10">
              <v-list-item-title class="pb-5" ><v-icon class="pr-3">check_box</v-icon> Type Of Order</v-list-item-title>
              <v-list-item-title ><v-icon class="pr-3">{{ category_icon }}</v-icon>{{ category }}</v-list-item-title>
              <v-list-item-title class="pb-5">Type Of Package</v-list-item-title>
              <v-list-item-title >{{ package }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-col>
        <v-col xs="6" sm="3" md="2">
          <v-list-item-content class="d-flex pr-5 pl-5">
            <v-list-item-title class="pb-5" ><v-icon class="pr-3">speaker_notes</v-icon> Notes</v-list-item-title>
            <v-list-item>
              <p>{{ instructions }}</p>
            </v-list-item>
            <v-list-item>
              <p v-if="truck_category != ''">{{ truck_category }}</p>
            </v-list-item>
          </v-list-item-content>
        </v-col>
        <v-col xs="6" sm="3" md="4">
          <v-timeline align-top dense clipped v-if="!showMoves">
            <v-timeline-item
              v-for="(item, i) in timeline"
              :key="i"
              :color="item.color"
              :icon="item.icon"
              dense
              fill-dot
              style="height:80px;"
            >
              
              <p>{{ item.text }}</p>
              <span style="color:#8F0236;">{{ item.time }}</span>
              <v-progress-linear
                  v-if="item.load"
                  indeterminate
                  color="#8F0236"
                  style="width:300px;"
              ></v-progress-linear>
            </v-timeline-item>
          </v-timeline>

          <v-timeline align-top dense clipped v-if="showMoves">
            <v-timeline-item
              v-for="(item, i) in timelineMoves"
              :key="i"
              :color="item.color"
              :icon="item.icon"
              dense
              fill-dot
              style="height:65px;"
            >
              
              <p>{{ item.text }}</p>
              <span style="color:#8F0236;">{{ item.time }}</span>
              <v-progress-linear
                  v-if="item.load"
                  indeterminate
                  color="#8F0236"
                  style="width:300px;"
              ></v-progress-linear>
            </v-timeline-item>
          </v-timeline>
        </v-col>
      </v-row>
      <v-divider style="margin:0;"></v-divider>
      <v-row justify="space-around" class="pb-5 pl-10">
        <v-col xs="4" sm="4" md="1">
          <v-avatar color="indigo darken-4">
            <v-icon color="white">account_circle</v-icon>
          </v-avatar>
        </v-col>
        <v-col xs="4" sm="4" md="1">
          <v-list-item>{{ name }}</v-list-item>
        </v-col>
        <v-col xs="4" sm="4" md="1">
          <v-list-item>{{ phone }}</v-list-item>
        </v-col>
        <v-col class="pl-10" xs="8" sm="8" md="4">
          <v-list-item>Payment Type: <v-chip :color="type_color" style="color:#fff;">{{ payment_type }}</v-chip></v-list-item>
        </v-col>
      </v-row>
    </v-card>
  </div>
    
</template>
<style type="text/css">
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
</style>
<script>
import { Card, Button, FormGroupInput } from '../assets/components';
    export default{
        name: "Login",
        name: "ViewFreightOrder",
        bodyClass: 'login-page',
        components: {
            Card,
            [Button.name]: Button,
            [FormGroupInput.name]: FormGroupInput
        },
        data:() => ({
            welcome: "Welcome to View Order",
            order_id: 0,
            origin: '',
            destination: '',
            category: '',
            package: '',
            category_icon: '',
            instructions: '',
            truck_category: '',
            status: '',
            status_color: '',
            cost: '',
            name: '',
            phone: '',
            type_color: '',
            payment_type: '',
            loader: true,
            loader2: null,
            items: [
            {
              color: '#8F0236',
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
          showMoves: false,
          timeline: [
              {
                color: '#8F0236',
                icon: '',
                text: 'Your Order Has been received',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: '',
                text: 'You are being Matched With driver',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: 'done',
                text: 'Your Dirver Is Arriving to your Pickup Location',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: '',
                text: 'Your Package has been picked and is in-transit',
                time: '',
                load: null,
              },
              {
                color: 'indigo darken-4',
                icon: '',
                text: 'Delivery Completed',
                time: '',
                load: null,
              },
          ],

          timelineMoves: [
              {
                color: '#8F0236',
                icon: '',
                text: 'Your Order Has been received',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: '',
                text: 'Waiting For a Confirmation Call',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: 'done',
                text: 'Scheduled',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: '',
                text: 'Mover Is On the Way',
                time: '',
                load: null,
              },
              {
                color: '#8F0236',
                icon: '',
                text: 'Your Package has been picked and is in Transit',
                time: '',
                load: null,
              },
              {
                color: 'indigo darken-4',
                icon: '',
                text: 'Move Completed',
                time: '',
                load: null,
              },
          ],
        }),
        beforeMount() {

          let user = JSON.parse(localStorage.getItem('volant.user'))
          this.name = user.username
          let phone = user.phone
          this.phone = '+254'+phone.replace(/^0+/, '')

          let order_id = this.$route.params.id

          axios.defaults.headers.common['Content-Type'] = 'application/json'
          axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

          if(typeof(EventSource) !== "undefined") {
            var source = new EventSource("/api/notif_data/"+order_id);
            source.addEventListener('message', event => {
              let data = JSON.parse(event.data);
                    // console.log(data.length);
                    
                    console.log(data)
                  }, false);
            source.addEventListener('error', event => {
              if (event.readyState == EventSource.CLOSED) {
                console.log('Event was closed');
                console.log(EventSource);
              }
            }, false);
          } else {
            console.log("Sorry, your browser does not support server-sent events...");
          }

          axios.post(`/api/getorder`, {order_id}).then(response => {
            let data = []

                this.items[0].location = response.data[1].origin[0]
                this.items[1].location = response.data[1].destination
                this.category = response.data[1].category
                this.package = response.data[1].name

                if (this.category == 'Metro Deliveries') {
                  this.category_icon = 'two_wheeler'
                  this.instructions = response.data[1].instructions
                }else if(this.category == 'Cargo & Freight'){
                  this.category_icon = 'local_shipping'
                  this.truck_category = 'Truck category:'+' '+response.data[1].description
                  this.instructions = 'instructions:'+' '+response.data[1].instructions
                }else if(this.category == 'Packaging & Moves'){
                  this.category_icon = 'local_mall'
                  this.showMoves = true
                }else if(this.category == 'Construction Logistics'){
                  this.category_icon = 'house'
                }

                let options = {  
                    weekday: "long", year: "numeric", month: "short",  
                    day: "numeric", hour: "2-digit", minute: "2-digit"  
                }; 

                let time = new Date(response.data[1].created_at)
                console.log(response.data[1].created_at);
                this.timeline[0].time = time.toLocaleTimeString("en-us", options)
                this.timelineMoves[0].time = time.toLocaleTimeString("en-us", options)
                let time1 = new Date(response.data[1].created_at)
                this.timeline[1].time = time1.toLocaleTimeString()
                this.timelineMoves[1].time = time1.toLocaleTimeString()

                if(response.data[1].status == 1){
                  let time2 = new Date(response.data[1].updated_at)
                  this.timeline[2].time = time1.toLocaleTimeString("en-us", options)
                  this.timelineMoves[2].time = time1.toLocaleTimeString("en-us", options)
                }

                if (response.data[1].status == 0) {
                  this.status = 'Unassigned'
                  this.status_color = 'red darken-4'
                  this.timeline[0].load = false
                  this.timeline[0].icon = 'done'
                  this.timeline[1].load = true
                  this.timeline[1].icon = ''
                  this.timeline[2].load = false
                  this.timeline[2].icon = ''
                  this.timeline[3].load = false
                  this.timeline[3].icon = ''
                  this.timeline[4].load = false
                  this.timeline[4].icon = ''
                }else if(response.data[1].status == 1){
                  this.status = 'Accepted'
                  this.status_color = 'indigo'
                  this.timeline[0].load = false
                  this.timeline[0].icon = 'done'
                  this.timeline[1].load = false
                  this.timeline[1].icon = 'done'
                  this.timeline[2].load = true
                  this.timeline[2].icon = ''
                  this.timeline[3].load = false
                  this.timeline[3].icon = ''
                  this.timeline[4].load = false
                  this.timeline[4].icon = ''
                  this.timeline[2].time = ''
                }else if(response.data[1].status == 2){
                  this.status = 'Picked Up'
                  this.status_color = 'teal'
                  this.timeline[0].load = false
                  this.timeline[0].icon = 'done'
                  this.timeline[1].load = false
                  this.timeline[1].icon = 'done'
                  this.timeline[2].load = false
                  this.timeline[2].icon = 'done'
                  this.timeline[3].load = true
                  this.timeline[3].icon = ''
                  this.timeline[4].load = false
                  this.timeline[4].icon = ''
                  this.timeline[2].time = ''
                }else if(response.data[1].status == 3){
                  this.status = 'In Transit'
                  this.status_color = 'cyan'
                  this.timeline[0].load = false
                  this.timeline[0].icon = 'done'
                  this.timeline[1].load = false
                  this.timeline[1].icon = 'done'
                  this.timeline[2].load = false
                  this.timeline[2].icon = 'done'
                  this.timeline[3].load = false
                  this.timeline[3].icon = 'done'
                  this.timeline[4].load = true
                  this.timeline[4].icon = ''
                  this.timeline[3].time = ''
                }else if(response.data[1].status == 4){
                  this.status = 'Completed'
                  this.status_color = 'green'
                  this.timeline[0].load = false
                  this.timeline[0].icon = 'done'
                  this.timeline[1].load = false
                  this.timeline[1].icon = 'done'
                  this.timeline[2].load = false
                  this.timeline[2].icon = 'done'
                  this.timeline[3].load = false
                  this.timeline[3].icon = 'done'
                  this.timeline[4].load = false
                  this.timeline[4].icon = 'done'
                  this.timeline[4].time = ''
                }else{
                  this.status = 'Cancelled'
                  this.status_color = 'red'
                }

                if(this.showMoves === true){
                  if (response.data[1].status == 0) {
                  this.status = 'Unassigned'
                  this.status_color = 'red darken-4'
                  this.timelineMoves[0].load = false
                  this.timelineMoves[0].icon = 'done'
                  this.timelineMoves[1].load = true
                  this.timelineMoves[1].icon = ''
                  this.timelineMoves[2].load = false
                  this.timelineMoves[2].icon = ''
                  this.timelineMoves[3].load = false
                  this.timelineMoves[3].icon = ''
                  this.timelineMoves[4].load = false
                  this.timelineMoves[4].icon = ''
                  this.timelineMoves[5].load = false
                  this.timelineMoves[5].icon = ''
                }else if(response.data[1].status == 1){
                  this.status = 'Accepted'
                  this.status_color = 'indigo'
                  this.timelineMoves[0].load = false
                  this.timelineMoves[0].icon = 'done'
                  this.timelineMoves[1].load = false
                  this.timelineMoves[1].icon = 'done'
                  this.timelineMoves[2].load = true
                  this.timelineMoves[2].icon = ''
                  this.timelineMoves[3].load = false
                  this.timelineMoves[3].icon = ''
                  this.timelineMoves[4].load = false
                  this.timelineMoves[4].icon = ''
                  this.timelineMoves[5].load = false
                  this.timelineMoves[5].icon = ''
                  this.timelineMoves[2].time = ''
                }else if(response.data[1].status == 2){
                  this.status = 'Picked Up'
                  this.status_color = 'teal'
                  this.timelineMoves[0].load = false
                  this.timelineMoves[0].icon = 'done'
                  this.timelineMoves[1].load = false
                  this.timelineMoves[1].icon = 'done'
                  this.timelineMoves[2].load = false
                  this.timelineMoves[2].icon = 'done'
                  this.timelineMoves[3].load = true
                  this.timelineMoves[3].icon = ''
                  this.timelineMoves[4].load = false
                  this.timelineMoves[4].icon = ''
                  this.timelineMoves[5].load = false
                  this.timelineMoves[5].icon = ''
                  this.timelineMoves[2].time = ''
                }else if(response.data[1].status == 3){
                  this.status = 'In Transit'
                  this.status_color = 'cyan'
                  this.timelineMoves[0].load = false
                  this.timelineMoves[0].icon = 'done'
                  this.timelineMoves[1].load = false
                  this.timelineMoves[1].icon = 'done'
                  this.timelineMoves[2].load = false
                  this.timelineMoves[2].icon = 'done'
                  this.timelineMoves[3].load = false
                  this.timelineMoves[3].icon = 'done'
                  this.timelineMoves[4].load = true
                  this.timelineMoves[4].icon = ''
                  this.timelineMoves[5].load = false
                  this.timelineMoves[5].icon = ''
                  this.timelineMoves[3].time = ''
                }else if(response.data[1].status == 4){
                  this.status = 'Completed'
                  this.status_color = 'green'
                  this.timelineMoves[0].load = false
                  this.timelineMoves[0].icon = 'done'
                  this.timelineMoves[1].load = false
                  this.timelineMoves[1].icon = 'done'
                  this.timelineMoves[2].load = false
                  this.timelineMoves[2].icon = 'done'
                  this.timelineMoves[3].load = false
                  this.timelineMoves[3].icon = 'done'
                  this.timelineMoves[4].load = false
                  this.timelineMoves[4].icon = 'done'
                  this.timelineMoves[4].time = ''
                  this.timelineMoves[5].load = true
                  this.timelineMoves[5].icon = ''
                }else{
                  this.status = 'Cancelled'
                  this.status_color = 'red'
                }
                }

                this.cost = 'Ksh '+response.data[1].total
                let payment_type = response.data[1].payment_type
                if (payment_type == 'mpesa') {
                  this.payment_type = response.data[1].payment_type
                  this.type_color = 'green accent-4'
                }else{
                  this.payment_type = response.data[1].payment_type
                  this.type_color = '#8F0236'
                }
                this.order_id = response.data[1].order_id
                
                this.loader = false

          })
      },

      watch: {
        loader () {
          const l = this.loader2
          this[l] = !this[l]

          setTimeout(() => (this[l] = false), 3000)

          this.loader2 = null
        },
      },

      methods: {
        reserve () {
        this.loading = true

        setTimeout(() => (this.loading = false), 2000)
      },
      }
    }
</script>
