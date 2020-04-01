<template>
	<v-container fluid fluid-height>
	<div class="row">
		<div class="col-md-12">
			<v-toolbar
			color="info"
			dark
			flat
			align-center
			>
			<v-toolbar-title class="text-center">Register Form</v-toolbar-title>
			<v-spacer></v-spacer>
			</v-toolbar>
			<v-card class="elevation-12 d-inline-block mx-sm-auto">
				<div class="col-md-12 ml-auto mr-auto">

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
					{{ error_message }}
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
				Your credentials are correct, loggin in now ...
			</v-alert>

			<card type="login" plain>
				<div slot="header" class="logo-container">
					<img v-lazy="'img/now-logo.png'" alt="" />
				</div>

				<v-form
				v-model="valid"
				ref="form"
				>

				<div class="row">
					<div class="col-md-6">
						<fg-input
							class="input-lg"
							addon-left-icon="now-ui-icons users_circle-08"
							placeholder="Enter Username ..."
							v-model="name"	
							name="name"					
							type="text"
							:rules="nameRules"
							required
							>
						</fg-input>

						<fg-input
							class="input-lg"
							addon-left-icon="now-ui-icons objects_globe"
							placeholder="Email ..."
							v-model="email"
							name="email"
							type="email"
							:rules="emailRules"
							required
							>
						</fg-input>

						<vue-tel-input
							v-model="phone"
							:rules="phoneRules"
							required
							label="Enter Phone Number"
							autofocus
						></vue-tel-input>
					</div>
					<div class="col-md-6">
						<fg-input
							class="input-lg"
							addon-left-icon="now-ui-icons objects_key-25"
							placeholder="Password ..."
							v-model="password"
							name="password"
							type="password"
							:rules="passwordRules"
							required
							>
						</fg-input>

						<fg-input
							class="input-lg"
							addon-left-icon="now-ui-icons objects_key-25"
							placeholder="Confirm Password ..."
							v-model="password_confirmation"
							type="password"
							:rules="passwordCRules"
							required
							autofocus
							>
						</fg-input>
					</div>
				</div>

		<button  
		@click="register"
		style="color:#fff;"
		class="btn btn-info btn-round btn-lg btn-block"
		>
		<div v-if="loading">
			<v-progress-circular
			:size="30"
			:width="5"
			color="teal lighten-3"
			indeterminate
			></v-progress-circular>
			Register
		</div>
		<div v-else>
			Register
		</div>

		</button>

		<div class="pull-left">
			<h6>
				<a href="#pablo" class="link footer-link">Create Account</a>
			</h6>
		</div>
		<div class="pull-right">
			<h6>
				<a href="#pablo" class="link footer-link">Need Help?</a>
			</h6>
		</div>


		</v-form>
		</card>
		</div>
		</v-card>	
		</div>
	</div>

	</v-container>
	
</template>

<script>
import { Card, Button, FormGroupInput } from '../assets/components';
	export default{
		name: "Signin",
		bodyClass: 'login-page',
		components: {
			Card,
			[Button.name]: Button,
			[FormGroupInput.name]: FormGroupInput
		},
		data:() => ({
			valid: false,
			name: "",
			email: "",
			password: "",
			password_confirmation: "",
			phone: "",
			loading: false,
			success: false,
			error: false,
			error_message: "",
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
				v => v.length <= 20 || "Your phone number is too long",
			]
		}),
		methods: {
			register(e) {
                e.preventDefault()
                if (this.password !== this.password_confirmation || this.password.length <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    this.error_message = "Passwords do not match"
                    this.error = true
                }else{
                	this.error = false
                	let name = this.name
	                let email = this.email
	                let password = this.password
	                let phone = this.phone
	                let c_password = this.password_confirmation
	                this.success = true
	                axios.post('/api/register', {name, email, phone, password, c_password}).then(response => {
	                    let data = response.data
	                    localStorage.setItem('volant.user', JSON.stringify(data.user))
	                    localStorage.setItem('volant.jwt', data.token)
	                    if (localStorage.getItem('volant.jwt') != null) {
	                        this.$emit('loggedIn')
	                        let nextUrl = this.$route.params.nextUrl
	                        window.location.replace("http://127.0.0.1:8000/volantuser/home")
	                        // this.$router.push((nextUrl != null ? nextUrl : '/volantuser/home'))
	                    }
	                })
                }
                
            },
            close (v) {
				this.alert = v
			}
		}
	}
</script>