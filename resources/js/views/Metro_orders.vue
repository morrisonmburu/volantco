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


  <v-toolbar dark color="#C0392B" max-width="1100" min-width="1100">
    <v-row>
      <v-col cols="12" xs="12" sm="12" md="6">
        <v-toolbar-title class="white--text"> All Orders</v-toolbar-title>
        <v-spacer></v-spacer>
      </v-col>
        <v-col cols="12" xs="12" sm="12" md="6">
        <v-text-field v-model="search" append-icon="search" label="Search" single-line hide-details></v-text-field>
        <v-menu offset-y :nudge-left="170" :close-on-content-click="false">
            <v-btn icon>
                <v-icon>more_vert</v-icon>
              </v-btn>
            <v-list>
              <v-list-tile  v-for="(item, index) in headers"  :key="item.value"   @click="changeSort(item.value)">
                <v-list-tile-title>Text<v-icon v-if="pagination.sortBy === item.value">{{pagination.descending ? 'arrow_downward':'arrow_upward'}}</v-icon></v-list-tile-title>
              </v-list-tile>
            </v-list>
          </v-menu>
      </v-col>
    </v-row>
    <v-spacer></v-spacer>
    <template v-slot:extension>
    <v-row>
      <v-col cols="12" xs="12" sm="12" md="12">
        <v-tabs
            v-model="tab"
            background-color="transparent"
            color="basil"
            grow
            centered
            icons-and-text
        >
          <v-tab>
               In Transit
               <v-icon color="orange">adjust</v-icon>
             </v-tab>

             <v-tab>
               Completed
               <v-icon color="green">adjust</v-icon>
             </v-tab>

             <v-tab>
               Cancelled
               <v-icon color="red">adjust</v-icon>
             </v-tab>

        </v-tabs>
      </v-col>
    </v-row>
  </template>
      </v-toolbar>

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

        <v-tabs-items v-model="tab">
            <v-tab-item>
              <v-data-table :headers="headers" :items="orders" :search="search" :hide-default-header="isMobile" :class="{mobile: isMobile}">
                  <template v-slot:item="props">
                    <tr v-if="!isMobile && props.item.mark === 0 && props.item.cancel === 0">
                      <td class="text-xs-right">{{ props.item.to }}</td>
                      <td class="text-xs-right">{{ props.item.from }}</td>
                      <td class="text-xs-right">{{ props.item.package }}</td>
                      <td class="text-xs-right">{{ props.item.time }}</td>
                      <td class="text-xs-right">{{ props.item.price }}</td>
                      <td>
                        <v-row>
                          <v-col cols="12" xs="12" sm="12" md="6">
                            <v-btn class="mx-2" fab dark small color="red" @click="remove(props.item.id, index)">
                              <v-icon>delete</v-icon>
                            </v-btn>
                          </v-col>
                          <v-col cols="12" xs="12" sm="12" md="6">
                            <v-btn class="mx-2" fab dark small color="info" @click="vieworder(props.item.id, index)">
                              <v-icon>visibility</v-icon>
                            </v-btn>
                          </v-col>
                      </v-row>
                      </td>
                    </tr>
                    <tr v-else-if="isMobile && props.item.mark === 0 && props.item.cancel === 0">
                      <td>
                        <ul class="flex-content">
                          <li class="flex-item" data-label="to">{{ props.item.to }}</li>
                          <li class="flex-item" data-label="from">{{ props.item.from }}</li>
                          <li class="flex-item" data-label="package">{{ props.item.package }}</li>
                          <li class="flex-item" data-label="time">{{ props.item.time }}</li>
                          <li class="flex-item" data-label="price">{{ props.item.price }}</li>
                          <li class="flex-item" data-label="id">
                            <v-row>
                              <v-col cols="12" xs="12" sm="12" md="6">
                                <v-btn class="mx-2" fab dark small color="red" @click="remove(props.item.id, index)">
                                  <v-icon>delete</v-icon>
                                </v-btn>
                              </v-col>
                              <v-col cols="12" xs="12" sm="12" md="6">
                                <v-btn class="mx-2" fab dark small color="info" @click="vieworder(props.item.id, index)">
                                  <v-icon>visibility</v-icon>
                                </v-btn>
                              </v-col>
                          </v-row>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  </template>
                  <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Your search for {{ search }} found no results.
                  </v-alert>
                </v-data-table>
            </v-tab-item>
            <v-tab-item>
              <v-data-table :headers="headers" :items="orders" :search="search" :hide-default-header="isMobile" :class="{mobile: isMobile}">
                  <template v-slot:item="props">
                    <tr v-if="!isMobile && props.item.mark === 1 && props.item.cancel === 0">
                      <td class="text-xs-right">{{ props.item.to }}</td>
                      <td class="text-xs-right">{{ props.item.from }}</td>
                      <td class="text-xs-right">{{ props.item.package }}</td>
                      <td class="text-xs-right">{{ props.item.time }}</td>
                      <td class="text-xs-right">{{ props.item.price }}</td>
                      <td>
                        <v-row>
                          <v-col cols="12" xs="12" sm="12" md="6">
                            <v-btn class="mx-2" fab dark small color="red" @click="remove(props.item.id, index)">
                              <v-icon>delete</v-icon>
                            </v-btn>
                          </v-col>
                          <v-col cols="12" xs="12" sm="12" md="6">
                            <v-btn class="mx-2" fab dark small color="info" @click="vieworder(props.item.id, index)">
                              <v-icon>visibility</v-icon>
                            </v-btn>
                          </v-col>
                      </v-row>
                      </td>
                    </tr>
                    <tr v-else-if="isMobile && props.item.mark === 1 && props.item.cancel === 0">
                      <td>
                        <ul class="flex-content">
                          <li class="flex-item" data-label="to">{{ props.item.to }}</li>
                          <li class="flex-item" data-label="from">{{ props.item.from }}</li>
                          <li class="flex-item" data-label="package">{{ props.item.package }}</li>
                          <li class="flex-item" data-label="time">{{ props.item.time }}</li>
                          <li class="flex-item" data-label="price">{{ props.item.price }}</li>
                          <li class="flex-item" data-label="id">
                            <v-row>
                              <v-col cols="12" xs="12" sm="12" md="6">
                                <v-btn class="mx-2" fab dark small color="red" @click="remove(props.item.id, index)">
                                  <v-icon>delete</v-icon>
                                </v-btn>
                              </v-col>
                              <v-col cols="12" xs="12" sm="12" md="6">
                                <v-btn class="mx-2" fab dark small color="info" @click="vieworder(props.item.id, index)">
                                  <v-icon>visibility</v-icon>
                                </v-btn>
                              </v-col>
                          </v-row>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  </template>
                  <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Your search for {{ search }} found no results.
                  </v-alert>
                </v-data-table>
            </v-tab-item>
            <v-tab-item>
              <v-data-table :headers="headers" :items="orders" :search="search" :hide-default-header="isMobile" :class="{mobile: isMobile}">
                  <template v-slot:item="props">
                    <tr v-if="!isMobile && props.item.mark === 0 && props.item.cancel === 1">
                      <td class="text-xs-right">{{ props.item.to }}</td>
                      <td class="text-xs-right">{{ props.item.from }}</td>
                      <td class="text-xs-right">{{ props.item.package }}</td>
                      <td class="text-xs-right">{{ props.item.time }}</td>
                      <td class="text-xs-right">{{ props.item.price }}</td>
                      <td>
                        <v-row>
                          <v-col cols="12" xs="12" sm="12" md="6">
                            <v-btn class="mx-2" fab dark small color="red" @click="remove(props.item.id, index)">
                              <v-icon>delete</v-icon>
                            </v-btn>
                          </v-col>
                          <v-col cols="12" xs="12" sm="12" md="6">
                            <v-btn class="mx-2" fab dark small color="info" @click="vieworder(props.item.id, index)">
                              <v-icon>visibility</v-icon>
                            </v-btn>
                          </v-col>
                      </v-row>
                      </td>
                    </tr>
                    <tr v-else-if="isMobile && props.item.mark === 0 && props.item.cancel === 1">
                      <td>
                        <ul class="flex-content">
                          <li class="flex-item" data-label="to">{{ props.item.to }}</li>
                          <li class="flex-item" data-label="from">{{ props.item.from }}</li>
                          <li class="flex-item" data-label="package">{{ props.item.package }}</li>
                          <li class="flex-item" data-label="time">{{ props.item.time }}</li>
                          <li class="flex-item" data-label="price">{{ props.item.price }}</li>
                          <li class="flex-item" data-label="id">
                            <v-row>
                              <v-col cols="12" xs="12" sm="12" md="6">
                                <v-btn class="mx-2" fab dark small color="red" @click="remove(props.item.id, index)">
                                  <v-icon>delete</v-icon>
                                </v-btn>
                              </v-col>
                              <v-col cols="12" xs="12" sm="12" md="6">
                                <v-btn class="mx-2" fab dark small color="info" @click="vieworder(props.item.id, index)">
                                  <v-icon>visibility</v-icon>
                                </v-btn>
                              </v-col>
                          </v-row>
                          </li>
                        </ul>
                      </td>
                    </tr>
                  </template>
                  <v-alert slot="no-results" :value="true" color="error" icon="warning">
                    Your search for {{ search }} found no results.
                  </v-alert>
                </v-data-table>
            </v-tab-item>
          </v-tabs-items>
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
        orders: [],
        headers: [
        {
          text: 'to',
          align: 'left',
          value: "to"
        },
        {text: 'from', value: "from"},
        {text: 'package', value: "package"},
        {text: 'Time of Delivery', value: "time"},
        {text: 'Price', value: "price"},
        {text: 'action'},
        ],
        pagination: {
              sortBy: 'name'
            },
            selected: [],
            search: '',
            isMobile: false,
            successMessage: '',
            success: false,
            tab: null,
      }
    },
    beforeMount() {

      this.user = JSON.parse(localStorage.getItem('volant.user'))
      let user_id = this.user.id

      axios.defaults.headers.common['Content-Type'] = 'application/json'
      axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

          axios.post(`/api/getmetroorders`, {user_id}).then(response => {
            let data = []
            if(response.data.length != 0){
              this.orders = response.data
            }

          })
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
          this.$router.push((nextUrl != null ? nextUrl : 'view_metro_order/'+id))
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
          changeSort(column) {
            console.log(column);
            if (this.pagination.sortBy === column) {
              this.pagination.descending = !this.pagination.descending
            } else {
              this.pagination.sortBy = column
              this.pagination.descending = false
            }
          },
          close (v) {
        this.alert = v
      }
      }
  }
</script>
