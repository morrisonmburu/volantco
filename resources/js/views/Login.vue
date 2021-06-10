<style type="text/css">
#login{
	width: 550px;
}
@media only screen and (max-width: 640px) {
	#login{
		width: 100%;
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
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<v-toolbar
			color="#9C0520"
			dark
			flat
			align-center
			style="margin-top:-25%;"
			>
			<v-toolbar-title class="text-center" style="margin-left:30%;">Login To Volant</v-toolbar-title>
			<v-spacer></v-spacer>
			</v-toolbar>
			<v-card class="elevation-12 d-inline-block mx-sm-auto" id="login">
				<div class="col-md-12 ml-auto mr-auto">

					<v-alert
					:value="alert"
					dismissible
					transition="scale-transition"
					text
					prominent
					type="error"
					icon="mdi-cloud-alert"
					@input="close"
					class="mx-sm-auto"
					width="340px"
					align-center
					>
					Yikes, seems your email or password is wrong, please try again
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

		
				<div slot="header" class="logo-container">
					<img v-lazy="'img/now-logo.png'" alt="" />
				</div>

				<v-form
				v-model="valid"
				ref="form"
				>

				<v-text-field
					prepend-icon="email"
					v-model="email"
					label="Email Address"
					name="email"
					type="email"
					:rules="emailRules"
					required
					outlined
					dense
					color="#9C0520"
					>
				</v-text-field>

			<v-text-field
				prepend-icon="vpn_key"
				label="Password"
				v-model="password"
				name="password"
				:rules="passwordRules"
				required
				outlined
				dense
				color="#9C0520"
				:append-icon="show1 ? 'mdi-eye-off' : 'mdi-eye'"
				@click:append="show1 = !show1"
				:type="show1 ? 'text' : 'password'"
			>
			</v-text-field>

		<button
		@click="login"
		style="color:#fff; background-color:#9C0520;"
		color="#9C0520"
		class="btn btn-round btn-lg btn-block"
		>
		<div v-if="loading">
			<v-progress-circular
			:size="30"
			:width="5"
			color="white"
			indeterminate
			></v-progress-circular>
			Loging in ...
		</div>
		<div v-else>
			Login
		</div>

		</button>

		<div class="container" style="margin-left:25%;margin-top:1%;">
			<h6>
				<a href="/volantuser/reset-password" class="link footer-link" style="font-size:15px;">Forgot password?</a>
			</h6>
		</div>

		<div class="container" style="margin-left:15%;margin-top:0.5%;">
			<h6>
				<span style="color:grey;">Don't have an Account? </span><a href="/volantuser/register" class="link footer-link">Create An Account</a>
			</h6>
		</div>


		</v-form>

		</div>
		</v-card>
		</div>
	<div class="col-md-2"></div>
	</div>

</v-container>

</template>

<script>
import { Card, Button, FormGroupInput } from '../assets/components';
export default{
	name: "Login",
	bodyClass: 'login-page',
	components: {
		Card,
		[Button.name]: Button,
		[FormGroupInput.name]: FormGroupInput
	},
	data:() => ({
		valid: false,
		email: "",
		password: "",
		alert: false,
		success: false,
		loading: false,
		color: 'cyan darken-2',
        mode: '',
        snackbar: false,
        text: '',
        timeout: 6000,
        show1: false,
		emailRules: [
		v => !!v || 'Your Email is required',
		v => /.+@.+/.test(v) || 'E-mail must be valid',
		],
		passwordRules: [
		v => !!v || 'Your password is required',
		]
	}),
	methods: {
		login(e) {
			e.preventDefault()
			if(this.email == ''){
				this.alert = true
			}else{
				this.loading = true
				if (this.password.length > 0) {
					let email = this.email
					let password = this.password

					// this.success = true
					axios.post('/api/login', {email, password}).then(response => {

						if (response.data.error == "Unauthorized") {
							this.alert = true
							this.loading = false
						}else{
							this.snackbar = true
							this.text = "Your credentials are correct, loggin in now ..."
							let user = response.data.user
							let is_admin = user.is_admin

							localStorage.setItem('volant.user', JSON.stringify(user))
							localStorage.setItem('volant.jwt', response.data.token)

							if (localStorage.getItem('volant.jwt') != null) {
								this.$emit('loggedIn')
								let nextUrl = this.$route.params.nextUrl
								window.location.replace("http://volantltd.com/volantuser/home")
	                            // this.$router.push((nextUrl != null ? nextUrl : 'home'))
							}
						}
					});
				}
			}
		},
		close (v) {
			this.alert = v
		}
	}
}
</script>
