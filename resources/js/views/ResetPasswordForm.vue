<template>
	<div class="row">
		<div class="col-md-12">
			<v-toolbar
			color="#8F0236"
			dark
			flat
			align-center
			>
			<v-toolbar-title class="text-center">Change Password</v-toolbar-title>
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
			{{ successMessage }}
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
				<div class="col-md-12">

				<fg-input
				class="input-lg"
				addon-left-icon="now-ui-icons objects_key-25"
				placeholder="New Password ..."
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
@click="changePassword"
style="color:#fff; background-color: #8F0236;"
class="btn btn-round btn-lg btn-block"
>
<div v-if="loading">
	<v-progress-circular
	:size="30"
	:width="5"
	color="teal lighten-3"
	indeterminate
	></v-progress-circular>
	Changing Password ...
</div>
<div v-else>
	Change Password
</div>

</button>


</v-form>
</card>
</div>
</v-card>	
</div>
</div>
</template>
<script type="text/javascript">
import { Card, Button, FormGroupInput } from '../assets/components';
	export default{
		name: "EditProfile",
		bodyClass: 'login-page',
		components: {
			Card,
			[Button.name]: Button,
			[FormGroupInput.name]: FormGroupInput
		},
		data:() => ({
			valid: false,
			password: "",
			password_confirmation: "",
			loading: false,
			success: false,
			error: false,
			error_message: "",
			successMessage: '',
			services: [],
			serviceType: '',
			nameRules: [
				v => !!v || 'Name is required',
				v => v.length <= 50 || 'Name should be less than 50 letters',
			],
			passwordRules: [
				v => !!v || 'Password is required',
				v => v.length > 8 || 'Your password is too short',
			],
			passwordCRules: [
				v => !!v || 'password confirmation is required',
				
			],
		}),
		methods: {
			changePassword(e){
            	 e.preventDefault()

            	 let token = this.$route.params.token

            	if (this.password !== this.password_confirmation || this.password <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    this.error_message = "Passwords do not match"
                    this.error = true
                }else{
                	this.error = false
	                let password = this.password
	                let c_password = this.password_confirmation
	                this.loading = true
	                axios.post('/api/reset/password', { token, password, c_password}).then(response => {

	                    let data = response.data
	                    
	                    	this.$swal('Password Reset','Password Edited Successfully', 'success').then((result) => {
			                    	this.password = ""
		                    		this.password_confirmation = ""
									let nextUrl = this.$route.params.nextUrl
									this.$router.push((nextUrl != null ? nextUrl : '/volantuser/login'))
						    })
	                })
                }
            },
            close (v) {
				this.error = v
			},
			closeSuccess(v){
				this.success = v
			}
		}
	}
</script>