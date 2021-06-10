<style type="text/css">
#register{
	width: 400px;
}
.image1{
	width: 100%;
	height: 60%;
}

.hide2{
	display: block;
}

.phone{
	margin-bottom: 20px;
}

@media only screen and (max-width: 640px) {
	.hide{
		display: none;
	}
	#register{
		width: 100%;
	}
	.hide2{
		display: none;
	}
	.phone{
		margin-bottom: 20px;
	}
}
</style>
<template>
	<v-container fluid fluid-height>
	<v-snackbar
      v-model="snackbar"
      :color="color"
      multi-line
      :timeout="timeout"
      left
      top
      vertical
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
	<v-row class="cols">
		<v-col xs="12" sm="12" md="7" class="hide">
			<v-img
	          class="mx-2 image1"
	          src="/images/bike-delivery.gif"
	          >
	      	</v-img>
	      	<v-row>
	      		<v-col xs="12" sm="12" md="3">
	      			<v-img
			          class="mx-2"
			          src="/images/part1.jpg"
			          >
			      	</v-img>
	      		</v-col>
	      		<v-col xs="12" sm="12" md="3">
	      			<v-img
			          class="mx-2"
			          src="/images/part2.jpg"
			          style="margin-top:30px;"
			          >
			      	</v-img>
	      		</v-col>
	      		<v-col xs="12" sm="12" md="3">
	      			<v-img
			          class="mx-2"
			          src="/images/part3.jpg"
			          >
			      	</v-img>
	      		</v-col>
	      		<v-col xs="12" sm="12" md="3">
	      			<v-img
			          class="mx-2"
			          style="margin-top:40px;"
			          src="/images/part4.jpg"
			          >
			      	</v-img>
	      		</v-col>
	      	</v-row>
		</v-col>
		<v-col xs="12" sm="12" md="5">
		<v-card class="elevation-12 d-inline-block mx-sm-auto" id="register">
			<v-toolbar
				color="#9C0520"
				dark
				flat
			>
			<v-toolbar-title class="text-center" style="margin-left:25%;">Sign Up For Volant </v-toolbar-title>
			<template v-slot:extension>
				<v-tabs
			      v-model="tab"
			      centered
			      icons-and-text
			      align-with-title
			    >
			      <v-tabs-slider></v-tabs-slider>

			      <v-tab href="#tab-1">
			        Business
			        <v-icon>business</v-icon>
			      </v-tab>

			      <v-tab href="#tab-2">
			        Classic
			        <v-icon>account_circle</v-icon>
			      </v-tab>

			      <v-tab href="#tab-3">
			        Corporate
			        <v-icon>corporate_fare</v-icon>
			      </v-tab>
			    </v-tabs>
			</template>
			<v-spacer></v-spacer>
			</v-toolbar>
			<div class="container ml-auto mr-auto">

			<v-alert
				:value="error"
				dismissible
				transition="scale-transition"
				text
				prominent
				type="error"
				icon="mdi-cloud-alert"
				@input="close"
				class="mx-sm-auto"
				width="330px"
				align-center
				>
				<v-list-item v-for="(item, index) in error_message" v-bind:key="item.length">
					<span style="color:red;">{{ item }}</span>
				</v-list-item>
			</v-alert>
				<v-alert
				:value="success"
				dismissible
				transition="scale-transition"
				text
				prominent
				outlined
				type="success"
				class="mx-sm-auto"
				width="330px"
				align-center
				>
				{{ text }}
			</v-alert>

			<div slot="header" class="logo-container">
				<img v-lazy="'img/now-logo.png'" alt="" />
			</div>

			<v-tabs-items v-model="tab">
		      <v-tab-item
		        value="tab-1"
		      >
		      	<v-form
				v-model="valid"
				ref="form"
				>

				<v-text-field
					prepend-icon="account_circle"
					label="Your Name"
					v-model="f_name"
					name="f_name"
					type="text"
					:rules="nameRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-text-field
					prepend-icon="account_circle"
					label="Business Name"
					v-model="l_name"
					name="l_name"
					type="text"
					:rules="nameRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-text-field
					prepend-icon="email"
					label="Email Address"
					v-model="email"
					name="email"
					type="email"
					:rules="emailRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-row>
					<v-col xs="12" sm="12" md="1" class="hide2">
						<v-icon>phone</v-icon>
					</v-col>
					<v-col xs="12" sm="12" md="11">
						<vue-tel-input
							v-model="phone"
							:rules="phoneRules"
							required
							label="Enter Phone Number"
							autofocus
							class="phone"
						></vue-tel-input>
					</v-col>
				</v-row>

				<v-text-field
					prepend-icon="vpn_key"
					label="Password"
					v-model="password"
					name="password"
					:rules="passwordRules"
					required
					outlined
					dense
					style="margin-bottom:0;padding-bottom:0;"
					:append-icon="show1 ? 'mdi-eye-off' : 'mdi-eye'"
					@click:append="show1 = !show1"
					:type="show1 ? 'text' : 'password'"
					class="mb-0"
					>
				</v-text-field>

				<password v-model="password" :strength-meter-only="true" style="margin-left:40px; margin-top:0;" class="mt-0" />

				<v-text-field
					prepend-icon="vpn_key"
					label="Confirm Password"
					v-model="password_confirmation"
					:rules="passwordCRules"
					required
					autofocus
					outlined
					dense
					
					:append-icon="show2 ? 'mdi-eye-off' : 'mdi-eye'"
					@click:append="show2 = !show2"
					:type="show2 ? 'text' : 'password'"
					>
				</v-text-field>

				<v-checkbox
		          v-model="terms"
		          label="By creating a Volant account you’re agreeing to the terms and conditions"
		          dense
		          style="margin-top:0; padding-top:0;margin-bottom:0; padding-bottom:0;"
		        ></v-checkbox>

				<button
				@click="register"
				style="color:#fff; background-color:#9C0520;"
				class="btn btn-round btn-lg btn-block"
				>
				<div v-if="loading">
					<v-progress-circular
					:size="30"
					:width="5"
					color="white"
					indeterminate
					></v-progress-circular>
					registering ...
				</div>
				<div v-else>
					Register
				</div>

				</button>

				<div class="container">
					<h5>
						Do you already have an account?
						<a href="/volantuser/login" class="link footer-link">Login</a>
					</h5>
				</div>

				</v-form>
		      </v-tab-item>
		    
		      <v-tab-item
		        value="tab-2"
		      >
		      	<v-form
				v-model="valid"
				ref="form"
				>

				<v-text-field
					prepend-icon="account_circle"
					label="First Name"
					v-model="f_name"
					name="f_name"
					type="text"
					:rules="nameRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-text-field
					prepend-icon="account_circle"
					label="Last Name"
					v-model="l_name"
					name="l_name"
					type="text"
					:rules="nameRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-text-field
					prepend-icon="email"
					label="Email Address"
					v-model="email"
					name="email"
					type="email"
					:rules="emailRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-row>
					<v-col xs="12" sm="12" md="1" class="hide2">
						<v-icon>phone</v-icon>
					</v-col>
					<v-col xs="12" sm="12" md="11">
						<vue-tel-input
							v-model="phone"
							:rules="phoneRules"
							required
							label="Enter Phone Number"
							autofocus
							class="phone"
						></vue-tel-input>
					</v-col>
				</v-row>

				<v-text-field
					prepend-icon="vpn_key"
					label="Password"
					v-model="password"
					name="password"
					:rules="passwordRules"
					required
					outlined
					dense
					
					:append-icon="show1 ? 'mdi-eye-off' : 'mdi-eye'"
					@click:append="show1 = !show1"
					:type="show1 ? 'text' : 'password'"
					>
				</v-text-field>

				<password v-model="password" :strength-meter-only="true" style="margin-left:40px; margin-top:0;" class="mt-0" />

				<v-text-field
					prepend-icon="vpn_key"
					label="Confirm Password"
					v-model="password_confirmation"
					:rules="passwordCRules"
					required
					autofocus
					outlined
					dense
					
					:append-icon="show2 ? 'mdi-eye-off' : 'mdi-eye'"
					@click:append="show2 = !show2"
					:type="show2 ? 'text' : 'password'"
					>
				</v-text-field>

				<v-checkbox
		          v-model="terms"
		          label="By creating a Volant account you’re agreeing to the terms and conditions"
		          dense
		          style="margin-top:0; padding-top:0;margin-bottom:0; padding-bottom:0;"
		        ></v-checkbox>

				<button
				@click="register"
				style="color:#fff; background-color:#9C0520;"
				class="btn btn-round btn-lg btn-block"
				>
				<div v-if="loading">
					<v-progress-circular
					:size="30"
					:width="5"
					color="white"
					indeterminate
					></v-progress-circular>
					registering ...
				</div>
				<div v-else>
					Register
				</div>

				</button>

				<div class="container">
					<h5>
						Do you already have an account?
						<a href="/volantuser/login" class="link footer-link">Login</a>
					</h5>
				</div>

				</v-form>
		      </v-tab-item>

		      <v-tab-item
		        value="tab-3"
		      >
		      	<v-form
				v-model="valid"
				ref="form"
				>

				<v-text-field
					prepend-icon="account_circle"
					label="Your Name"
					v-model="f_name"
					name="f_name"
					type="text"
					:rules="nameRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-text-field
					prepend-icon="account_circle"
					label="Corporate Name"
					v-model="l_name"
					name="l_name"
					type="text"
					:rules="nameRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-text-field
					prepend-icon="email"
					label="Email Address"
					v-model="email"
					name="email"
					type="email"
					:rules="emailRules"
					required
					outlined
					dense
					
					>
				</v-text-field>

				<v-row>
					<v-col xs="12" sm="12" md="1" class="hide2">
						<v-icon>phone</v-icon>
					</v-col>
					<v-col xs="12" sm="12" md="11">
						<vue-tel-input
							v-model="phone"
							:rules="phoneRules"
							required
							label="Enter Phone Number"
							autofocus
							class="phone"
						></vue-tel-input>
					</v-col>
				</v-row>

				<v-text-field
					prepend-icon="vpn_key"
					label="Password"
					v-model="password"
					name="password"
					:rules="passwordRules"
					required
					outlined
					dense
					
					:append-icon="show1 ? 'mdi-eye-off' : 'mdi-eye'"
					@click:append="show1 = !show1"
					:type="show1 ? 'text' : 'password'"
					>
				</v-text-field>

				<password v-model="password" :strength-meter-only="true" style="margin-left:40px; margin-top:0;" class="mt-0" />

				<v-text-field
					prepend-icon="vpn_key"
					label="Confirm Password"
					v-model="password_confirmation"
					:rules="passwordCRules"
					required
					autofocus
					outlined
					dense
					
					:append-icon="show2 ? 'mdi-eye-off' : 'mdi-eye'"
					@click:append="show2 = !show2"
					:type="show2 ? 'text' : 'password'"
					>
				</v-text-field>

				<v-checkbox
		          v-model="terms"
		          label="By creating a Volant account you’re agreeing to the terms and conditions"
		          dense
		          style="margin-top:0; padding-top:0;margin-bottom:0; padding-bottom:0;"
		        ></v-checkbox>

				<button
				@click="register"
				style="color:#fff; background-color:#9C0520;"
				class="btn btn-round btn-lg btn-block"
				>
				<div v-if="loading">
					<v-progress-circular
					:size="30"
					:width="5"
					color="white"
					indeterminate
					></v-progress-circular>
					registering ...
				</div>
				<div v-else>
					Register
				</div>

				</button>

				<div class="container">
					<h5>
						Do you already have an account?
						<a href="/volantuser/login" class="link footer-link">Login</a>
					</h5>
				</div>

				</v-form>
		      </v-tab-item>
		    </v-tabs-items>
		</div>
		</v-card>
		</v-col>
	</v-row>

	</v-container>

</template>

<script>
import { Card, Button, FormGroupInput } from '../assets/components';
import Password from 'vue-password-strength-meter'
	export default{
		name: "Signin",
		bodyClass: 'login-page',
		components: {
			Card,
			[Button.name]: Button,
			[FormGroupInput.name]: FormGroupInput,
			Password,
		},
		data:() => ({
			valid: false,
			l_name: "",
			f_name: "",
			email: "",
			password: "",
			password_confirmation: "",
			phone: "",
			loading: false,
			success: false,
			error: false,
			error_message: [],
			services: [],
			serviceType: "",
			color: 'cyan darken-2',
	        mode: '',
	        snackbar: false,
	        text: '',
	        timeout: 6000,
	        show1: false,
	        show2: false,
	        tab: null,
	        terms: false,
        	text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
			nameRules: [
				v => !!v || 'Name is required',
				v => v.length <= 50 || 'Name should be less than 50 letters',
			],
			emailRules: [
				v => !!v || 'Email is required',
				v => /.+@.+/.test(v) || 'E-mail must be valid',
			],
			passwordRules: [
				v => !!v || 'Password is required',
				v => v.length > 8 || 'Your password is too short',
			],
			passwordCRules: [
				v => !!v || 'password confirmation is required',

			],
			phoneRules: [
				v => !!v || 'Phone Number is required',
				v => v.length <= 13 || "Your phone number is too long",
				v => v.length > 9 || "Your phone number is too short",
			]
		}),
		watch:{
			tab(val){
				if(val == 'tab-1'){
					this.serviceType = 'Business'
				}else if(val == 'tab-2'){
					this.serviceType = 'Classic'
				}else if(val == 'tab-3'){
					this.serviceType = 'Corporate'
				}
				console.log(this.serviceType)
			}
		},
		mounted(){
			axios.get(`/api/getServiceCustomer`).then(response => {
		        let data = []
		        if(response.data.length != 0){
		        this.services = response.data
		       }
		     })
		},
		methods: {
			register(e) {
                e.preventDefault()
                this.loading = true
                if (this.password !== this.password_confirmation || this.password.length <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    this.error_message.push("Passwords do not match")
                    this.error = true
                    this.loading = false
                }else{
                	this.error = false
                	let f_name = this.f_name
                	let l_name = this.l_name
	                let email = this.email
	                let password = this.password
	                let phone = this.phone
	                let c_password = this.password_confirmation
	                let account_type = this.serviceType
	                // this.success = true
	                axios.post('/api/register', {f_name, l_name, email, phone, password, c_password, account_type}).then(response => {

	                	// console.log(response.data.error);

	                	if (response.data.error) {
							this.error = true
							let message = response.data.error
							let error_message = this.error_message
							$.each(message, function(key, value){ 
								error_message.push(value[0])
							})
							this.loading = false
						}else{
							let data = response.data
		                    localStorage.setItem('volant.user', JSON.stringify(data.user))
		                    localStorage.setItem('volant.jwt', data.token)
		                    this.success = true
		                    this.text = 'Thanks for signing Up! You can Now Login!'
		                    this.snackbar = true
		                    this.loading = false
		                    if (localStorage.getItem('volant.jwt') != null) {
		                        this.$emit('loggedIn')
		                        let nextUrl = this.$route.params.nextUrl
		                        window.location.replace("http://volantco.net/volantuser/home")
		                        // this.$router.push((nextUrl != null ? nextUrl : 'home'))
		                    }
						}
	                })
                }

            },
            close (v) {
				this.error = v
				this.error_message.splice(0)
			},
		}
	}
</script>
