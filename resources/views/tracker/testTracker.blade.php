@extends('tracker.main')
@section('content')
<div>

  <v-card class="mx-auto" id="left"
  tile :loading="loading" raised>
  <v-card-text>
    <v-row cols="12">
      <v-col md="8" sm="6" xs="6">
        <h3 style="font-size: 30px; font-weight: 100;" color="blue-grey darken-4">In Transit Orders</h3>
      </v-col>
      <v-col md="4" sm="6" xs="6">
        <v-btn outlined color="cyan" href="/orders">
          see All
        </v-btn>
      </v-col>
    </v-row>
    <v-text-field
      append-icon="mdi-magnify"
      color="#8F0236"
      label="Search By Destination"
      hide-details
      outlined
      dense
      v-model="search"
    ></v-text-field>
  </v-card-text>
  <v-divider></v-divider>
  <v-card-text style="padding: 0; margin: 0;">
    <v-list 
      style="max-height: 80vh"
       class="overflow-y-auto"
       elevation="8"
    >
      <v-list-item-group active-class="border" color="indigo">

        <template v-for="(item, index) in filteredOrders">
          <v-divider
            :key="item.order_id"
          ></v-divider>

          <v-list-item
            
            @click="select(item)"
            id="select_orders"
          >
          <v-row cols="12">
            <v-col md="12">
              <v-chip style="width: 100%;" text-color="#fff" color="#8F0236" block label>
                Order# Volant_Order_<span id="order_number" v-text="item.order_id"></span>
              </v-chip>
            </v-col>
            <v-col md="8" sm="6" xs="6">
              <template>
              <v-timeline dense>
                <v-timeline-item small color="red" icon="mdi-map-marker-check-outline">From: <span v-text="item.origin[0]"></span></v-timeline-item>
                <v-timeline-item class="mb-0 mr-5" hide-dot ><span v-text="item.recipient_name"></span></v-timeline-item>
                <v-timeline-item small color="blue" icon="mdi-map-marker-down">To: <span v-text="item.destination"></span></v-timeline-item>
              </v-timeline>
            </template>
            </v-col>
            <v-col md="4" sm="6" xs="6">
              <v-btn style="color: #fff; cursor: context-menu;" small color="amber darken-4" rounded v-if="item.order_status == 1">
                Accepted
              </v-btn>
              <v-btn style="color: #fff; cursor: context-menu;" small color="amber darken-4" rounded v-else-if="item.order_status == 2">
                Picked Up
              </v-btn>
              <v-btn style="color: #fff; cursor: context-menu;" small color="amber darken-4" rounded v-else-if="item.order_status == 3">
                In Transit
              </v-btn>
              <v-chip
                style="margin-top: 5em;"
                color="teal"
                text-color="white"
              >
                <v-avatar left>
                  <v-icon>mdi-alarm</v-icon>
                </v-avatar>
                <span v-text="item.pickup_datetime"></span>
              </v-chip>
            </v-col>
          </v-row>
          </v-list-item>
        </template>
      </v-list-item-group>
    </v-list>
  </v-card-text>

  <v-dialog v-model="dialog" max-width="500px" :fullscreen="$vuetify.breakpoint.mdOnly" hide-overlay transition="dialog-bottom-transition">
    {{-- <template v-slot:activator="{ on }">
      <v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
    </template> --}}
    <v-card>
      <v-toolbar dark color="primary">
        <v-btn icon dark @click="dialog = false">
          <v-icon>mdi-close</v-icon>
        </v-btn>
        <v-toolbar-title>Order Details #_<span v-text="order_id"></span></v-toolbar-title>
        <v-spacer></v-spacer>
      </v-toolbar>
      <v-list three-line subheader>
        <v-subheader>Order Details</v-subheader>
        <v-tabs grow v-model="tab">
          <v-tab>Details</v-tab>
          <v-tab>Customer</v-tab>
          <v-tab>History</v-tab>
        </v-tabs>
        <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-list>
          <v-list-item>
            Status:  <v-chip color="success" v-text="status"></v-chip>
          </v-list-item>
          <v-list-item>
            Order Description:  <v-chip label v-text="description"></v-chip>
          </v-list-item>
          <v-list-item>
            Distance:  <v-chip label v-text="distance"></v-chip>
          </v-list-item>
          <v-list-item>
            Order Amount:  <v-chip label v-text="order_amount"></v-chip>
          </v-list-item>
          <v-list-item>
            Order Package Type:  <v-chip label v-text="package_type"></v-chip>
          </v-list-item>
          <v-list-item>
            Order Category:  <v-chip label v-text="order_category"></v-chip>
          </v-list-item>
          <v-list-item>
            Number Of stops:  <v-chip label v-text="no_stops"></v-chip>
          </v-list-item>
        </v-list>
        </v-tab-item>
        <v-tab-item>
          <v-list-item>
            Customer Name:  <v-chip label v-text="customer_name"></v-chip>
          </v-list-item>
          <v-list-item>
            Customer Contact Number:  <v-chip label v-text="customer_phone"></v-chip>
          </v-list-item>
        </v-tab-item>
        <v-tab-item>
          <v-list-item>
            Order Created At:  <v-chip label v-text="created_at"></v-chip>
          </v-list-item>
          <v-list-item>
            Order Updated At:  <v-chip label v-text="updated_at"></v-chip>
          </v-list-item>
        </v-tab-item>
      </v-tabs-items>
      </v-list>
      <v-divider></v-divider>
    </v-card>
  </v-dialog>

</v-card>

  <v-card class="mx-auto" id="bottom"
  tile :loading="loader" raised>
  <v-card-text>
    <v-row cols="12">
      <v-col md="4">
        <v-chip
          color="indigo"
          text-color="white"
        >
        <v-avatar left color="indigo">
          <v-icon dark>mdi-account-circle</v-icon>
        </v-avatar>
        Associate Name:
        <span v-text="driver_name"></span>
      </v-chip>

      <v-chip
          class="mt-5"
          color="indigo"
          text-color="white"
        >
        <v-avatar left color="indigo">
          <v-icon dark>mdi-phone</v-icon>
        </v-avatar>
        Driver Phone:
        <span v-text="driver_phone"></span>
      </v-chip>

      </v-col>
      <v-col md="8">
        <v-chip
          style="position: absolute; left: 53em; top:1em;"
          color="green"
          text-color="white"
        >
        <v-avatar left color="green">
          <v-icon dark>mdi-star</v-icon>
        </v-avatar>
        Online
      </v-chip>

    <template id="countdown-template">
      <div class="countdown">
        <div class="block">
          <p class="digit" v-text="days"></p>
          <p class="text">Days</p>
        </div>
        <div class="block">
          <p class="digit" v-text="hours"></p>
          <p class="text">Hours</p>
        </div>
        <div class="block">
          <p class="digit" v-text="minutes"></p>
          <p class="text">Minutes</p>
        </div>
        <div class="block">
          <p class="digit" v-text="seconds"></p>
          <p class="text">Seconds</p>
        </div>
      </div>
    </template>

      </v-col>
    </v-row>
  </v-card-text>
</v-card>

<input type="hidden" name="locations" id="locations">
<input type="hidden" name="to" id="to">
<input type="hidden" name="from" id="from">

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

</v-content>
</v-app>
</v-app>
</div>
  <script>
    new Vue({
      el: '#app',
      vuetify: new Vuetify(),
      props: {
        source: String,
      },
      data: () => ({
         items: [
            {
              icon: 'mdi-wifi',
              text: 'Wifi',
            },
            {
              icon: 'mdi-bluetooth',
              text: 'Bluetooth',
            },
            {
              icon: 'mdi-chart-donut',
              text: 'Data Usage',
            },
          ],
          // model: 1,
          search: '',
          actualTime: moment().format('X'),
          years: 0,
          months: 0,
          days: 0,
          hours: 0,
          minutes: 0,
          seconds: 0,
          dialog: false,
          notifications: false,
          sound: true,
          widgets: false,
          tab: null,
          order_status: '',
          order_description: '',
          distance: '',
          order_amount: '',
          order_package_type: '',
          order_category:'',
          order_stops:'',
          customer_name:'',
          customer_phone:'',
          created_at:'',
          updated_at:'',
          orders: [],
          order_id: 0,
          destination:'',
          origin: '',
          status: '',
          description:'',
          distance:'',
          order_amount: '',
          package_type:'',
          order_category: '',
          no_stops: '',
          customer_name: '',
          customer_number: '',
          created_at: '',
          updated_at: '',
          dropoff_time:'',
          driver_name: '',
          driver_phone: '',
          loading: true,
          loader: false,
          isFullscreen: false,
      }),
      computed:
      {
          filteredOrders:function()
          {
              var self=this;
              return this.orders.filter(function(cust){return cust.destination.toLowerCase().indexOf(self.search.toLowerCase())>=0;});
          }
      },
      methods: {
        addOneSecondToActualTimeEverySecond () {
          var component = this
          component.actualTime = moment().format('X')
          setTimeout(function(){
            component.addOneSecondToActualTimeEverySecond()
          }, 1000);
        },
        getDiffInSeconds () {
          return moment(this.dropoff_time).format('X') - this.actualTime
        },
        compute () {
          var duration = moment.duration(this.getDiffInSeconds(), "seconds")
          this.years = duration.years() > 0 ? duration.years() : 0
          this.months = duration.months() > 0 ? duration.months() : 0
          this.days = duration.days() > 0 ? duration.days() : 0
          this.hours = duration.hours() > 0 ? duration.hours() : 0
          this.minutes = duration.minutes() > 0 ? duration.minutes() : 0
          this.seconds = duration.seconds() > 0 ? duration.seconds() : 0
        },

        getLocations(id){
          axios.post('/getStopoverLocations', {id: id}).then(response => {
            $('#locations').val(JSON.stringify(response.data))
            $("#locations").trigger('change');
          })
        },

        select: function(order){

          this.getLocations(order.order_id);
          this.order_id = order.order_id
          this.destination = order.destination
          this.origin = order.origin[0]
          switch(order.order_status){
            case 1:
              this.status = 'Accepted'
              break
            case 2:
              this.status = 'Picked Up'
              break
            case 3:
              this.status = 'In Transit'
              break
            default:
              this.status = 'In Transit'
          }
          this.description = order.description
          this.distance = order.distance
          this.order_amount = order.total
          this.package_type = order.name
          this.order_category = order.category
          this.no_stops = order.stops_count
          this.customer_name = order.recipient_name
          this.customer_phone = order.recipient_phone
          this.created_at = order.created_at
          this.updated_at = order.updated_at
          this.dropoff_time = order.pickup_datetime
          this.driver_name = order.DriverName
          this.driver_phone = order.DriverPhone
          $('#to').val(this.destination)
          $('#from').val(this.origin)
          this.dialog = true
          this.loader = true

          setTimeout(() => {
             this.loader = false;
          }, 2000)
          this.compute()
          this.addOneSecondToActualTimeEverySecond()
        },

        toggleFullscreen: function(event){
        var elem = document.documentElement;
        if (
          document.fullscreenEnabled || 
          document.webkitFullscreenEnabled || 
          document.mozFullScreenEnabled ||
          document.msFullscreenEnabled
        ) {
          if(!this.isFullscreen){
            if (elem.requestFullscreen) {
              elem.requestFullscreen();
              this.isFullscreen = true;
              return;
            } else if (elem.webkitRequestFullscreen) {
              elem.webkitRequestFullscreen();
              this.isFullscreen = true;
              return;
            } else if (elem.mozRequestFullScreen) {
              elem.mozRequestFullScreen();
              this.isFullscreen = true;
              return;
            } else if (elem.msRequestFullscreen) {
              elem.msRequestFullscreen();
              this.isFullscreen = true;
              return;
            }
          }else{
            if (document.exitFullscreen) {
              document.exitFullscreen();
              this.isFullscreen = false;
              return;
            } else if (document.webkitExitFullscreen) {
              document.webkitExitFullscreen();
              this.isFullscreen = false;
              return;
            } else if (document.mozCancelFullScreen) {
              document.mozCancelFullScreen();
              this.isFullscreen = false;
              return;
            } else if (document.msExitFullscreen) {
              document.msExitFullscreen();
              this.isFullscreen = false;
              return;
            }
          };

        }
      }
      },
      created () {
        this.$vuetify.theme.light = true
        let maps = document.createElement('script');
        maps.setAttribute('src',"/js/tracker2.js");
        document.head.appendChild(maps)

        let mapsApi = document.createElement('script');
        mapsApi.setAttribute('src',"https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=tracker");
        document.head.appendChild(mapsApi);

        axios.get('/getTrackOrders').then(response => {
          Object.values(response.data).forEach((value) => {
              this.orders.push(value);
            })
          this.loading = false
        })

      },
      watch: {
        actualTime (val,oldVal) {
          this.compute()
        }
      },
    });
  </script>
</body>
</html>
@endsection