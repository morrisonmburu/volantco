<template>
	<v-container fluid fluid-height>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<v-toolbar
			color="info"
			dark
			flat
			align-center
			>
			<v-toolbar-title class="text-center">Login Form</v-toolbar-title>
			<v-spacer></v-spacer>
			</v-toolbar>
			<v-card class="elevation-12 d-inline-block mx-sm-auto">
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
					width="330px"
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

			<card type="login" plain>
				<div slot="header" class="logo-container">
					<img v-lazy="'img/now-logo.png'" alt="" />
				</div>

				<v-form
				v-model="valid"
				ref="form"
				>

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

		<button  
		@click="login"
		style="color:#fff;"
		class="btn btn-info btn-round btn-lg btn-block"
		>
		<div v-if="loading">
			<v-progress-circular
			:size="30"
			:width="5"
			color="white"
			indeterminate
			></v-progress-circular>
			Login
		</div>
		<div v-else>
			Login
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
		emailRules: [
		v => !!v || 'Your Email is required',
		v => /.+@.+/.test(v) || 'E-mail must be valid',
		],
		passwordRules: [
		v => !!v || 'Your password is required',
		v => v.length >= 8 || 'Your password is too short',
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

					this.success = true
					axios.post('/api/login', {email, password}).then(response => {
						let user = response.data.user
						let is_admin = user.is_admin

						localStorage.setItem('volant.user', JSON.stringify(user))
						localStorage.setItem('volant.jwt', response.data.token)

						if (localStorage.getItem('volant.jwt') != null) {
							this.$emit('loggedIn')
							let nextUrl = this.$route.params.nextUrl
							window.location.replace("http://127.0.0.1:8000/volantuser/home")
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