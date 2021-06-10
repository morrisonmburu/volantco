<template>
  <main>
	<v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
      temporary
      v-if="isLoggedIn"
    >
    <v-toolbar justify-center color="#9C0520">
          <v-toolbar-title sytle="color: #ffffff;">
            Volant Co
          </v-toolbar-title>
        </v-toolbar>
      <v-spacer></v-spacer>
      <v-list dense>
          <v-list-item

            @click="navigate('home')"
          >
            <v-list-item-action>
              <v-icon>dashboard</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                Dashboard
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

        <v-list-item

            @click="navigate('metro')"
          >
            <v-list-item-action>
              <v-icon>departure_board</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                Metro Deliveries
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item

              @click="navigate('freight')"
            >
              <v-list-item-action>
                <v-icon>flight_takeoff</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  Freight & Cargo
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item

              @click="navigate('packaging_moves')"
            >
              <v-list-item-action>
                <v-icon>next_week</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  Packaging & Moves
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

          <v-list-item
            @click="navigate('orders')"
          >
            <v-list-item-action>
              <v-icon>store</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                My Orders
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>

          <v-list-item
            @click="navigate('editProfile')"
          >
            <v-list-item-action>
              <v-icon>account_circle</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                User Profile
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="#9C0520"
      dark
    >

    <v-app-bar-nav-icon v-if="isLoggedIn" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

    <v-img
          class="mx-2"
          max-height="40"
          min-height="40"
          max-width="40"
          min-width="40"
          src="/images/logo.jpg"
          app
          contain
          v-if="isLoggedIn"
          >
      </v-img>

      <v-toolbar-title
        style="width: 300px"
        class="ml-0 pl-3"
        v-if="isLoggedIn"
      >
          <span v-if="isLoggedIn" class="hidden-sm-and-down">Volant Customer</span>
      </v-toolbar-title>

      <div v-if="!isLoggedIn" style="margin-left:45%;">
        <v-img
            class="mx-2"
            max-height="60"
            min-height="60"
            max-width="60"
            min-width="60"
            src="/images/logo.jpg"
            app
            contain
            v-if="!isLoggedIn"
            style="float:left;"
            >
        </v-img>

        <v-toolbar-title
          style="width: 300px; margin-top:2.5%;"
          v-if="!isLoggedIn"
        >
            <span style="font-size:25px;" class="hidden-sm-and-down">Volant Ltd</span>
        </v-toolbar-title>
      </div>

      <v-spacer></v-spacer>


      <!-- <v-btn text style="color:#ffffff;" :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">
        <v-icon>account_circle</v-icon>
        Signin
      </v-btn>

      <v-btn text style="color:#ffffff;" :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">
        <v-icon>input</v-icon>
        Login
      </v-btn> -->
      <p v-if="isLoggedIn" style="padding-top:15px;" class="pr-10"><span id="username">HelpLine +254 111 933 647</span></p>
      <p v-if="isLoggedIn && !loadingAccount" style="padding-top:15px;" class="pr-5">Hi <span id="username">{{ name }}({{ account }}, {{ status }})</span></p>
      <p v-if="isLoggedIn && loadingAccount" style="padding-top:15px;" class="pr-5">Hi <span id="username">{{ name }}(
        <v-progress-circular
            :size="30"
            color="white"
            indeterminate
            v-if="loadingAccount"
        >
        </v-progress-circular>
      , {{ status }})</span></p>

      <v-menu v-if="isLoggedIn" open-on-hover bottom left>
        <template v-slot:activator="{ on }">
            <v-btn 
            dark
            icon
            v-on="on"
            >
            <v-avatar color="indigo darken-4">
              <v-icon dark>mdi-account-circle</v-icon>
            </v-avatar>
          </v-btn>
        </template>

        <v-list dense>
          <v-list-item-group color="primary" style="padding-left: 5px; padding-right: 5px;">
            <v-list-item @click="changeAccount">
              <v-list-item-icon>
                <v-icon>track_changes</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>{{ changingAccount }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item @click="logout">
              <v-list-item-icon>
                <v-icon>exit_to_app</v-icon>
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>Logout</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>  
        </v-list>
      </v-menu>
    </v-app-bar>
    <v-content>
      <v-container
        fluid
        fill-height
      >
        <v-layout
          align-center
          justify-center
        >
        <v-snackbar
            v-model="snackbar"
            :color="color"
            :timeout="timeout"
            left
            bottom
            vertical
             v-if="isLoggedIn"
          >
            {{ text }}
            <v-btn
              dark
              text
              @click="snackbar = false"
            >
              Close
            </v-btn>
          </v-snackbar>

          <v-tooltip right>
            <template v-slot:activator="{ on }">
             <main class="py-4">
                <router-view></router-view>
            </main>
            </template>
          </v-tooltip>
        </v-layout>
      </v-container>
    </v-content>
  </v-app>
</main>
</template>

<style>
  *{ text-transform: none !important; }
</style>

<script>
	export default{
		  name: "App",
  		data: () => ({
        isLoggedIn: localStorage.getItem('volant.jwt') != null,
        name: "",
        user_id: "",
        dialog: false,
        drawer: false,
        account: '',
        color: 'cyan darken-2',
        mode: '',
        snackbar: true,
        text: 'Logged In',
        timeout: 3000,
        status: '',
        changingAccount: '',
        loadingAccount: false,
        items: [
          // { icon: 'account_circle', text: 'My profile' },
          // {
          //   icon: 'keyboard_arrow_up',
          //   'icon-alt': 'keyboard_arrow_down',
          //   text: 'Labels',
          //   model: true,
          //   children: [
          //     { icon: 'add', text: 'Create label' },
          //   ],
          // },
          // {
          //   icon: 'keyboard_arrow_up',
          //   'icon-alt': 'keyboard_arrow_down',
          //   text: 'More',
          //   model: false,
          //   children: [
          //     { text: 'Import' },
          //     { text: 'Export' },
          //     { text: 'Print' },
          //     { text: 'Undo changes' },
          //     { text: 'Other contacts' },
          //   ],
          // },
      ],
    }),
    beforeMount() {
        let user = JSON.parse(localStorage.getItem('volant.user'))
        this.name = user.f_name
        this.user_id = user.id

        axios.post(`/api/volantuser/getVolantUser`, {user_id:this.user_id}).then(response => {
          let user = response.data.user

          if(user.account_type == 1){
            this.account = 'Classic '+'Acc'
            this.changingAccount = 'Change To Business Account'
          }else if(user.account_type == 2){
            this.account = 'Business '+'Acc'
            this.changingAccount = 'Change To Classic Account'
          }else{
            this.account = 'Corporate '+'Acc'
            this.changingAccount = 'Change To Classic Account'
          }

          if(user.status == 1){
            this.status = 'Active'
          }else{
            this.status = 'InActive'
          }
        });
    },
    methods: {
      setDefaults(){
        if (this.isLoggedIn) {
          let user = JSON.parse(localStorage.getItem('volant.user'))
          this.name = user.f_name
          // this.user_type = user.is_admin
        }
      },
      change() {
                  this.isLoggedIn = localStorage.getItem('volant.jwt') != null
                  this.setDefaults()
              },
      logout(){
        localStorage.removeItem('volant.jwt')
        localStorage.removeItem('volant.user')
        this.change()
        window.location.replace("https://volantltd.com/volantuser/login")
        // this.$router.push('/')
      },
      navigate(to){
        let nextUrl = this.$route.params.nextUrl
        this.$router.push((nextUrl != null ? nextUrl : '/volantuser/'+to))
      },
      changeAccount(){
        let user_id = this.user_id;
        this.loadingAccount = true;
        axios.post(`/api/volantuser/changeAccount`, {user_id}).then(response => {
          this.loadingAccount = false;
          let user = response.data.user

          if(user.account_type == 1){
            this.account = 'Classic '+'Acc'
            this.changingAccount = 'Change To Business Account'
          }else if(user.account_type == 2){
            this.account = 'Business '+'Acc'
            this.changingAccount = 'Change To Classic Account'
          }else{
            this.account = 'Corporate '+'Acc'
            this.changingAccount = 'Change To Classic Account'
          }

          console.log(user.status);

          if(user.status == 1){
            this.status = 'Active'
          }else{
            this.status = 'InActive'
          }
        });
      }
    }
	}

</script>
