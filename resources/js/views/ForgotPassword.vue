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
		<!-- <div class="col-md-2"></div> -->
		<div class="col-md-12">
			<v-toolbar
			color="#8F0236"
			dark
			flat
			align-center
			xs="12" sm="12" md="12"
			>
			<v-toolbar-title class="text-center">Password reset form</v-toolbar-title>
			<v-spacer></v-spacer>
			</v-toolbar>
			<v-card xs="12" sm="12" md="12" class="elevation-12 d-inline-block mx-sm-auto">
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
					Yikes, seems your email is wrong, please try again
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
				Your Password Reset Link Has been sent to your email
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

		<button
		@click="requestResetPassword"
		style="color:#fff; background-color:#8F0236;"
		color="#8F0236"
		class="btn btn-round btn-lg btn-block"
		>
		<div v-if="loading">
			<v-progress-circular
			:size="30"
			:width="5"
			color="white"
			indeterminate
			></v-progress-circular>
			sending ...
		</div>
		<div v-else>
			Send Password Reset Link
		</div>

		</button>

		</v-form>
		</card>
		</div>
		</v-card>
		</div>
	<!-- <div class="col-md-2"></div> -->
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
		alert: false,
		success: false,
		loading: false,
		color: 'cyan darken-2',
        mode: '',
        snackbar: false,
        text: '',
        timeout: 6000,
		emailRules: [
		v => !!v || 'Your Email is required',
		v => /.+@.+/.test(v) || 'E-mail must be valid',
		],
	}),
	methods: {
		requestResetPassword(e) {
			e.preventDefault()
			if(this.email == ''){
				this.alert = true
			}else{
				this.loading = true
				axios.post("/api/reset-password", {email: this.email}).then(result => {
		            this.$swal('Password Reset','Password reset link sent successfully', 'success').then((result) => {
			                this.response = result.data;
							let nextUrl = this.$route.params.nextUrl
				            this.$router.push((nextUrl != null ? nextUrl : '/volantuser/login'))
						    })
				}, error => {
					this.alert = true
					console.error(error);
				});
			}
		},
		close (v) {
			this.alert = v
		}
	}
}
</script>
