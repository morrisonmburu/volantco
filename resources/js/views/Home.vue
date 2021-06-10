<style>
    .v-card--reveal {
        align-items: center;
        bottom: 0;
        justify-content: center;
        opacity: .5;
        position: absolute;
        width: 100%;
    }
</style>
<template>
    <v-container fluid fluid-height>
    <v-row dense>
        <v-col cols="12" xs="12" sm="12" md="6" fluid="true">
            <v-skeleton-loader
                class="mx-auto"
                max-width="350"
                min-width="350"
                type="card"
                v-if="loading == true"
                :loading="loading"
                transition="fade-transition"
            >
            </v-skeleton-loader>
              <v-hover v-slot:default="{ hover }">
                <v-card
                class="mx-auto"
                max-width="350"
                min-width="350"
                v-show="loaded"
                >
                    <v-img
                        class="white--text align-end"
                        max-height="250"
                        min-height="250"
                        src="/images/metro.png"
                        :aspect-ratio="16/9"
                        >

                        <v-expand-transition>
                        <div
                            v-if="hover"
                            class="d-flex transition-fast-in-fast-out red darken-1 darken-2 v-card--reveal display-3 white--text"
                            style="height: 100%;"
                        >
                            <p style="font-size:30px;">Metro Deliveries</p>
                        </div>
                        </v-expand-transition>

                    </v-img>
                    <v-tooltip top>
                        <template v-slot:activator="{ on }">
                         <v-card-text
                            @click="package('metro')"
                            style="position: relative; background-color:#9C0520; padding-top:5px; padding-bottom:5px; cursor:pointer;"
                            v-on="on"
                        >
                            <v-btn
                            absolute
                            color="#9C0520"
                            class="white--text"
                            fab
                            small
                            right
                            top
                            @click="package('metro')"
                            v-on="on"
                            >
                            <v-icon v-on="on">visibility</v-icon>
                            </v-btn>
                            <p style="font-size:20px; color:#ffffff;">Metro Deliveries</p>
                        </v-card-text>
                    </template>
                    <span>Metro Deliveries</span>
                </v-tooltip>
                </v-card>
                </v-hover>
        </v-col>
        <v-col cols="12" xs="12" sm="12" md="6" fluid="true">
            <v-skeleton-loader
                class="mx-auto"
                max-width="350"
                min-width="350"
                type="card"
                v-if="loading == true"
                :loading="loading"
                transition="fade-transition"
            >
            </v-skeleton-loader>
             <v-hover v-slot:default="{ hover }">
                <v-card
                class="mx-auto"
                max-width="350"
                min-width="350"
                v-show="loaded"
                >
                    <v-img
                        class="white--text align-end"
                        max-height="250"
                        min-height="250"
                        src="/images/freight.png"
                        >

                        <v-expand-transition>
                        <div
                            v-if="hover"
                            class="d-flex transition-fast-in-fast-out red darken-1 darken-2 v-card--reveal display-3 white--text"
                            style="height: 100%;"
                        >
                            <p style="font-size:30px;">Cargo & Freight</p>
                        </div>
                        </v-expand-transition>

                    </v-img>
                    <v-tooltip top>
                        <template v-slot:activator="{ on }">
                            <v-card-text
                                style="position: relative; background-color:#9C0520; padding-top:5px; padding-bottom:5px; cursor:pointer;"
                                @click="package('freight')"
                            >
                                <v-btn
                                absolute
                                color="#9C0520"
                                class="white--text"
                                fab
                                small
                                right
                                top
                                @click="package('freight')"
                                v-on="on"
                                >
                                <v-icon>visibility</v-icon>
                                </v-btn>
                                <p style="font-size:20px; color:#ffffff;">Cargo & Freight</p>
                            </v-card-text>
                            </template>
                            <span>Cargo & Freight</span>
                </v-tooltip>
                </v-card>
                </v-hover>
        </v-col>
    </v-row>

    <v-spacer></v-spacer>

    <v-row dense>
        <v-col cols="12" xs="12" sm="12" md="6" fluid="true">
            <v-skeleton-loader
                class="mx-auto"
                max-width="350"
                min-width="350"
                type="card"
                v-if="loading == true"
                :loading="loading"
                transition="fade-transition"
            >
            </v-skeleton-loader>
            <v-hover v-slot:default="{ hover }">
                <v-card
                class="mx-auto"
                max-width="350"
                min-width="350"
                v-show="loaded"
                >
                    <v-img
                        class="white--text align-end"
                        max-height="250"
                        min-height="250"
                        src="/images/moves.png"
                        >

                        <v-expand-transition>
                        <div
                            v-if="hover"
                            class="d-flex transition-fast-in-fast-out red darken-1 darken-2 v-card--reveal display-3 white--text"
                            style="height: 100%;"
                        >
                            <p style="font-size:30px;">Packaging & Moves</p>
                        </div>
                        </v-expand-transition>

                    </v-img>
                    <v-tooltip top>
                        <template v-slot:activator="{ on }">
                            <v-card-text
                                style="position: relative; background-color:#9C0520;padding-top:5px; padding-bottom:5px; cursor:pointer;"
                                @click="package('packaging_moves')"
                            >
                                <v-btn
                                absolute
                                color="#9C0520"
                                class="white--text"
                                fab
                                small
                                right
                                top
                                @click="package('packaging_moves')"
                                v-on="on"
                                >
                                <v-icon>visibility</v-icon>
                                </v-btn>
                                <p style="font-size:20px; color:#ffffff;">Packaging & Moves</p>
                            </v-card-text>
                    </template>
                    <span>Packaging & Moves</span>
                </v-tooltip>
                </v-card>
            </v-hover>
        </v-col>
        <v-col cols="12" xs="12" sm="12" md="6" fluid="true">
            <v-skeleton-loader
                class="mx-auto"
                max-width="350"
                min-width="350"
                type="card"
                v-if="loading == true"
                :loading="loading"
                transition="fade-transition"
            >
            </v-skeleton-loader>
            <v-hover v-slot:default="{ hover }">
                <v-card
                class="mx-auto"
                max-width="350"
                min-width="350"
                v-show="loaded"
                disabled
                >
                    <v-img
                        class="white--text align-end"
                        max-height="250"
                        min-height="250"
                        src="/images/package4.png"
                        >

                        <v-expand-transition>
                        <div
                            v-if="hover"
                            class="d-flex transition-fast-in-fast-out red darken-1 darken-2 v-card--reveal display-3 white--text"
                            style="height: 100%;"
                        >
                            <p style="font-size:30px;">Construction Logistics</p>
                        </div>
                        </v-expand-transition>

                    </v-img>
                    <v-tooltip top>
                        <template v-slot:activator="{ on }">
                        <v-card-text
                            style="position: relative; background-color:#9C0520;padding-top:5px; padding-bottom:5px; cursor:pointer;"
                        >
                            <v-btn
                            absolute
                            color="#9C0520"
                            class="white--text"
                            fab
                            small
                            right
                            top
                            v-on="on"
                            >
                            <v-icon>visibility</v-icon>
                            </v-btn>
                            <p style="font-size:20px; color:#ffffff;">Construction Logistics</p>
                        </v-card-text>
                        </template>
                        <span>Comming Soon</span>
                </v-tooltip>
                </v-card>
                </v-hover>
        </v-col>
    </v-row>
    </v-container>
</template>
<script>
    export default{
        name: "Home",
        data:() => ({
            loading: true,
            loaded: false,
        }),
        created(){
            const readyHandler = () => {
            if (document.readyState == 'complete') {
                    this.loading = false;
                    this.loaded = true;
                    document.removeEventListener('readystatechange', readyHandler);
                }
            };

            document.addEventListener('readystatechange', readyHandler);

            readyHandler(); // in case the component has been instantiated lately after loading
        },
        methods:{
            package(name){
                let nextUrl = this.$route.params.nextUrl
                this.$router.push((nextUrl != null ? nextUrl : name))
            }
        }
    }
</script>
