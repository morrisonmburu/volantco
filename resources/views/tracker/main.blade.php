<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/gif/jpg" href="/images/logo.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-vue/2.15.0/bootstrap-vue.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
</head>
<style type="text/css">
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

#left{
  position: fixed;
  left:0.1em;
  top:3em;
  height: 100%;
  width: 60vh;
  z-index: 400;
}

#bottom{
  position: fixed;
  left:28em;
  top:75%;
  height: 20%;
  width: 65%;
  z-index: 400;
}

.border {
  border: 2px dashed #8F0236;
}

#select_orders{
  padding: 10px;
}

.countdown {
  display: flex;
}

.block {
    display: flex;
    flex-direction: column;
    margin: 20px;
}

.text {
    color: #1A2370;
    font-size: 15px;
    font-family: 'Roboto Condensed', serif;
    font-weight: 40;
    margin-top:10px;
    margin-bottom: 10px;
    text-align: center;
}

.digit {
    color: #1A2370;
    font-size: 50px;
    font-weight: 100;
    font-family: 'Roboto', serif;
    margin: 10px;
    text-align: center;
}
</style>
<body>
  <div id="app">
    <v-app>
      <v-app id="inspire">
      <v-app-bar
        app
        :clipped-left="$vuetify.breakpoint.lgAndUp"
        color="#37474F"
        dark
        dense
      >
        <v-btn icon class="hidden-xs-only" href="/dashboard">
          <v-icon style="font-size: 30px;">mdi-arrow-left-bold-circle-outline</v-icon>
        </v-btn>
        <v-img
          class="mx-2"
          max-height="40"
          min-height="40"
          max-width="40"
          min-width="40"
          src="/images/logo.jpg"
          app
          contain
          >
        </v-img>
        <v-toolbar-title class="mr-12 align-center">
          <span class="title" color="#fff">Volant Co Tracker</span>
          <v-chip class="ml-10" color="success" text-color="#fff" label>Online</v-chip>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-row
          align="center"
          style="max-width: 650px"
          color="white"
        >
          <v-spacer></v-spacer>
          <v-btn class="mr-7" icon @click="toggleFullscreen">
            <v-icon style="font-size: 50px;" v-text="isFullscreen ? 'mdi-fullscreen-exit' : 'mdi-fullscreen'"></v-icon>
          </v-btn>
          <v-menu bottom>
            <template v-slot:activator="{ on }">
              <v-btn
                dark
                icon
                v-on="on"
              >
          
                <v-avatar>
                  <v-img
                    class="mx-2"
                    max-height="40"
                    min-height="40"
                    max-width="40"
                    min-width="40"
                    src="/images/logo.jpg"
                    app
                    contain
                    >
                  </v-img>
                </v-avatar>
               
              </v-btn>
            </template>

            <v-list>
              <v-list-item>
                <v-icon>mdi-logout</v-icon>
                <a class="btn btn-default" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Logout</a>                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </v-list-item>
            </v-list>
          </v-menu>
        </v-row>
      </v-app-bar>
      @yield('content')