<template>
	<v-container
	fluid
	fill-height
	>
	<v-tabs
		v-model="tab"
		background-color="transparent"
      	color="basil"
      	grow
		>
			<v-tab>
		       Personal Information
		     </v-tab>

		     <v-tab>
		       Change Password
		     </v-tab>

		</v-tabs>

		<v-tabs-items v-model="tab">
			<v-tab-item>
				<div class="row">
					<div class="col-md-12">
						<v-toolbar
						color="#8F0236"
						dark
						flat
						align-center
						>
						<v-toolbar-title class="text-center">Personal Information</v-toolbar-title>
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
							@input="closeSuccess"
							width="330px"
							align-center
							>
							Successfully edited Your Profile
						</v-alert>

						
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
										addon-left-icon="now-ui-icons users_circle-08"
										placeholder="Enter First Name ..."
										v-model="f_name"
										name="f_name"
										type="text"
										:rules="nameRules"
										required
										>
									</fg-input>

									<fg-input
										class="input-lg"
										addon-left-icon="now-ui-icons users_circle-08"
										placeholder="Enter Last Name ..."
										v-model="l_name"
										name="l_name"
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

									<v-select
									  class="pt-5"
									  v-model="serviceType"
							          :items="services"
							          item-text="name"
			          				  item-value="name"
							          label="Select Account Type"
							          dense
							          outlined
							        >
							        	<template v-slot:selection="{ item, index }">
									        {{ item.name }}
									     </template>
							        </v-select>
								</div>
							</div>

					<button  
					@click="edit"
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
						Editing Profile
					</div>
					<div v-else>
						Edit Profile
					</div>

					</button>


					</v-form>
					
					</div>
					</v-card>	
					</div>
				</div>
			</v-tab-item>
			<v-tab-item>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
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
										placeholder="Old Password ..."
										v-model="oldpassword"
										name="oldpassword"
										type="password"
										:rules="passwordRules"
										required
										>
									</fg-input>

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
						Changing Password
					</div>
					<div v-else>
						Change Password
					</div>

					</button>


					</v-form>
	
					</div>
					</v-card>	
					</div>
					<div class="col-md-3"></div>
				</div>
			</v-tab-item>
		</v-tabs-items>
	</v-container>
</template>
<script>
	import { Card, Button, FormGroupInput } from '../assets/components';
	export default{
		name: "EditProfile",
		bodyClass: 'login-page',
		components: {
			Card,
			[Button.name]: Button,
			[FormGroupInput.name]: FormGroupInput
		},
		data: () => ({
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
			error_message: "",
			tab: null,
			oldpassword: '',
			successMessage: '',
			services: [],
			serviceType: '',
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
		mounted(){
			this.user = JSON.parse(localStorage.getItem('volant.user'))
			let user_id = this.user.id

			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

	        axios.post(`/api/getuser`, {user_id}).then(response => {
			
			let data = response.data
			this.f_name = data.f_name
			this.l_name = data.l_name
			this.email = data.email
			this.phone = data.phone
			if(data.account_type === 1){
	          this.serviceType = 'Individual'
	        }else{
	          this.serviceType = 'Corporate'
	        }

	        })

	        axios.get(`/api/getServiceCustomer`).then(response => {
		        let data = []
		        if(response.data.length != 0){
		        this.services = response.data
		       }
		     })
		},
		methods: {
			edit(e) {
                e.preventDefault()

                this.user = JSON.parse(localStorage.getItem('volant.user'))
				let user_id = this.user.id

                axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

                if (this.name === '' || this.email === '' || this.phone === '') {
                    this.error_message = "You must enter all credentials"
                    this.error = true
                }else{
                	this.error = false
                	let f_name = this.f_name
                	let l_name = this.l_name
	                let email = this.email
	                let phone = this.phone
	                let serviceType = this.serviceType

	                axios.post('/api/editInfo', {f_name, l_name, user_id, name, email, phone, serviceType}).then(response => {
	                    let data = response.data
	                    this.success = true
	                    this.successMessage = "Personal Information Successfully Edited"

	                    let user = data.user
	                    this.f_name = data.f_name
	                    this.l_name = data.l_name
	                    this.email = user.email
	                    this.phone = user.phone

	                })
                }
                
            },
            changePassword(e){
            	 e.preventDefault()
            	this.user = JSON.parse(localStorage.getItem('volant.user'))
				let user_id = this.user.id
				let getpassword = this.user.password

                axios.defaults.headers.common['Content-Type'] = 'application/json'
				axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

            	if (this.password !== this.password_confirmation || this.password <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    this.error_message = "Passwords do not match"
                    this.error = true
                }else{
                	this.error = false
                	let oldpassword = this.oldpassword
	                let password = this.password
	                let c_password = this.password_confirmation
	                axios.post('/api/changePassword', { user_id, oldpassword, password, c_password}).then(response => {

	                    let data = response.data
	                    if(data === "error"){
	                    	this.error_message = "The Old Password Does not Match our records"
                    		this.error = true
                    		this.password = ""
                    		this.password_confirmation = ""
                    		this.oldpassword = ""
	                    }else{
	                    	this.success = true
	                    	this.successMessage = "Password Edited Successfully"
	                    	this.password = ""
                    		this.password_confirmation = ""
                    		this.oldpassword = ""
	                    }
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