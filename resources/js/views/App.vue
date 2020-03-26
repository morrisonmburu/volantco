<template>
  <main>
	<v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
      v-if="isLoggedIn"
    >
    <v-toolbar justify-center color="info">
          <v-toolbar-title sytle="color: #ffffff;">
            Volant Courier
          </v-toolbar-title>
        </v-toolbar>
      <v-spacer></v-spacer>
      <v-list dense>
        <template v-for="item in items">
          <v-layout
            v-if="item.heading"
            :key="item.heading"
            row
            align-center
          >
            <v-flex xs6>
              <v-subheader v-if="item.heading">
                {{ item.heading }}
              </v-subheader>
            </v-flex>
            <v-flex
              xs6
              class="text-xs-center"
            >
              <a
                href="#!"
                class="body-2 black--text"
              >EDIT</a>
            </v-flex>
          </v-layout>
          <v-list-group
            v-else-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon=""
          >
            <template v-slot:activator>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title>
                    {{ item.text }}
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>
            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              @click=""
            >
              <v-list-item-action v-if="child.icon">
                <v-icon>{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title>
                  {{ child.text }}
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item
            v-else
            :key="item.text"
            @click=""
          >
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
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

<script>
	export default{
		  name: "App",
  		data: () => ({
        isLoggedIn: localStorage.getItem('volant.jwt') != null,
        name: "",
        dialog: false,
        drawer: null,
        items: [
          { icon: 'dashboard', text: 'Dashboard' },
          { icon: 'store', text: 'Products' },
          { icon: 'account_circle', text: 'My profile' },
          {
            icon: 'keyboard_arrow_up',
            'icon-alt': 'keyboard_arrow_down',
            text: 'Labels',
            model: true,
            children: [
              { icon: 'add', text: 'Create label' },
            ],
          },
          {
            icon: 'keyboard_arrow_up',
            'icon-alt': 'keyboard_arrow_down',
            text: 'More',
            model: false,
            children: [
              { text: 'Import' },
              { text: 'Export' },
              { text: 'Print' },
              { text: 'Undo changes' },
              { text: 'Other contacts' },
            ],
          },
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
      }
    }
	}
	
</script>