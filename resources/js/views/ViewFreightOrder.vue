<template>
    <v-container fluid fluid-height>

        <v-row>
            <v-col cols="12" xs="12" sm="12" md="12">
                <v-toolbar
                color="#C0392B"
                dark
                flat
                align-center
                >
                <v-toolbar-title class="text-center">Volantco Order Number # {{ order_id }}</v-toolbar-title>
                <v-spacer></v-spacer>
                </v-toolbar>

                <v-card class="elevation-12 d-inline-block mx-sm-auto" max-width="700" min-width="350">


                    <v-row  style="margin:20px;">
                        <v-col cols="12" xs="12" sm="12" md="6">
                            <v-card class="elevation-12 d-inline-block mx-sm-auto">
                                <v-card-text>
                                    <h3 class="text-center">Package Locations</h3>
                                        <v-label> Pickup Location </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons location_pin"
                                        :value="pickup"
                                        required
                                        disabled
                                        >
                                        </fg-input>

                                        <v-label> Drop Off </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons location_pin"
                                        :value="dropoff"
                                        required
                                        disabled
                                        >
                                        </fg-input>
                                </v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="12" xs="12" sm="12" md="6" >
                            <v-card class="elevation-12 d-inline-block mx-sm-auto">
                                <v-card-text>
                                    <h3 class="text-center">Package Description</h3>
                                        <v-label> Package Name </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons design_app"
                                        :value="package"
                                        required
                                        disabled
                                        >
                                        </fg-input>

                                        <v-label> Truck Category </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons files_paper"
                                        :value="truck_category"
                                        required
                                        disabled
                                        >
                                        </fg-input>
                                </v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="12" xs="12" sm="12" md="6" >
                            <v-card class="elevation-12 d-inline-block mx-sm-auto">
                                <v-card-text>
                                    <h3 class="text-center">Package Price & Time</h3>
                                        <v-label> Price Charged </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons business_money-coins"
                                        :value="price"
                                        required
                                        disabled
                                        >
                                        </fg-input>

                                        <v-label> Time </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons tech_watch-time"
                                        :value="time"
                                        required
                                        disabled
                                        >
                                        </fg-input>
                                </v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="12" xs="12" sm="12" md="6" >
                            <v-card class="elevation-12 d-inline-block mx-sm-auto">
                                <v-card-text>
                                    <h3 class="text-center">Package Payment</h3>
                                        <v-label> Payment Type </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons business_money-coins"
                                        :value="payment_type"
                                        required
                                        disabled
                                        >
                                        </fg-input>

                                        <v-label> User Id </v-label>

                                        <fg-input
                                        class="input-lg"
                                        addon-left-icon="now-ui-icons users_circle-08"
                                        :value="user_id"
                                        required
                                        disabled
                                        >
                                        </fg-input>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>

                    <v-row style="margin:20px;">
                        <v-col cols="12" xs="12" sm="12" md="12" >
                            <v-card class="elevation-12 d-inline-block mx-sm-auto">
                                <v-card-text>
                                <h3 class="text-center">Extra Info</h3>
                                    <v-chip-group

                                        column
                                    >
                                        <v-chip v-if="mark == 1 && cancel == 0" style="color:#ffffff;" class="green">Confirmed</v-chip>

                                        <v-chip v-if="mark == 0 && cancel == 1" style="color:#ffffff;" class="red">Cancelled</v-chip>

                                        <v-chip v-if="mark == 0 && cancel == 0" style="color:#ffffff;" class="orange">In Transit</v-chip>

                                    </v-chip-group>

                                    <h4 class="text-center">Stopover Locations</h4>
                                    <v-chip-group
                                        v-for="(item, i) in stopover"
        					            :key="i"

                                        column
                                    >
                                        <v-chip style="color:#ffffff;" class="green">{{ item }}</v-chip>

                                    </v-chip-group>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>

            </v-card>
            </v-col>
        </v-row>

</v-container>
</template>
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
            pickup: '',
            dropoff: '',
            package: '',
            instructions: '',
            truck_category: '',
            price: '',
            time: '',
            payment_type: '',
            user_id:'',
            order_id: '',
            mark: '',
            cancel: '',
            stopover: [],
        }),
        beforeMount() {

			let order_id = this.$route.params.id

			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

	        axios.post(`/api/getfreightorders`, {order_id}).then(response => {
	        	let data = []

                this.pickup = response.data.to
                this.dropoff = response.data.from
                this.package = response.data.package
                this.truck_category = response.data.truck_category
                this.price = response.data.price
                this.time = response.data.time
                this.payment_type = response.data.payment_type
                this.user_id = response.data.user_id
                this.mark = response.data.mark
                this.cancel = response.data.cancel
                // this.stopover = response.data.stopoverlocation
                this.order_id = response.data.id

	        })
	    },
    }
</script>
