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
    <v-toolbar justify-center color="info">
          <v-toolbar-title sytle="color: #ffffff;">
            Volant Courier
          </v-toolbar-title>
        </v-toolbar>
      <v-spacer></v-spacer>
      <v-list dense>
          <v-list-item
            
            @click="dashboard" 
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
            @click="navigate('orders')" 
          >
            <v-list-item-action>
              <v-icon>store</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                Orders
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="blue darken-3"
      dark
    >
      <v-toolbar-title
        style="width: 300px"
        class="ml-0 pl-3"
      >
        <v-app-bar-nav-icon v-if="isLoggedIn" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
        <span class="hidden-sm-and-down">Customer Dashboard</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>
      
      
      <v-btn text style="color:#ffffff;" :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">  
        <v-icon>account_circle</v-icon>
        Signin
      </v-btn>
      
      <v-btn text style="color:#ffffff;" :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn">
        <v-icon>input</v-icon>
        Login
      </v-btn>
      <v-btn
      to="#"
      text
      style="color:#ffffff;"
      @click="logout"
      v-if="isLoggedIn"
      >
      <v-icon>exit_to_app</v-icon>
      </v-btn>
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
        dialog: false,
        drawer: false,
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
        this.name = user.name
        // console.log(this.name)
    },
    methods: {
      setDefaults(){
        if (this.isLoggedIn) {
          let user = JSON.parse(localStorage.getItem('volant.user'))
          this.name = user.name
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
        window.location.replace("http://127.0.0.1:8000/volantuser/login")
        // this.$router.push('/')
      },
      navigate(to){
        this.$router.push(to)
      },
      dashboard(){
        window.location.replace("http://127.0.0.1:8000/volantuser/home")
      }
    }
	}
	
</script>