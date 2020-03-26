<template>
		<v-container fluid fluid-height>
			<v-alert
		      :value="error"
		      dismissible
		      transition="scale-transition"
		      text
		      prominent
		      type="error"
		      icon="mdi-cloud-alert"
		      width="350px"
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
		      width="350px"
		    >
		      Your credentials have been registered, loggin in now ...
		    </v-alert>
		<v-toolbar
				color="info"
				dark
				flat
				>
					<v-toolbar-title class="text-center">Register Form</v-toolbar-title>
					<v-spacer></v-spacer>
				</v-toolbar>
		<v-card width="350px" class="elevation-12 d-inline-block mx-lg-auto">
		<v-row justify="space-between">
			<v-col  cols="mx-auto">
				<v-card-text class="mx-auto">
					<v-form
						ref="form"
						v-model="valid"
						justify="space-around"
						>

						<v-text-field
						v-model="name"
						
						label="Enter Name"
						type="text"
						prepend-icon="person"
						:rules="nameRules"
						required
						autofocus
						
						>
							
						</v-text-field>

						<v-text-field
						v-model="email"
						
						label="Enter Email"
						type="email"
						prepend-icon="mail"
						:rules="emailRules"
						required
						autofocus
						
						>
							
						</v-text-field>

						<span style="padding-top: 10px;"></span>

						<vue-tel-input 
						v-model="phone"
						:rules="phoneRules"
						required
						label="Enter Phone Number"
						autofocus
						prepend-icon="settings_phone"
						></vue-tel-input>

						<span style="padding-bottom: 10px;"></span>

						<v-text-field
						v-model="password"
						
						label="Enter Password"
						type="password"
						prepend-icon="lock"
						:rules="passwordRules"
						required
						autofocus
						>
						</v-text-field>

						<v-text-field
						v-model="password_confirmation"
						
						label="Confirm Password"
						type="password"
						prepend-icon="lock"
						:rules="passwordCRules"
						required
						autofocus
						>
						</v-text-field>


						<v-card-actions>
							<v-spacer></v-spacer>
							<v-btn type="submit" @click="register" color="info">
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
							</v-btn>
						</v-card-actions>
							
				</v-form>
				</v-card-text>
			</v-col>
		</v-row>
	</v-card>

	</v-container>
	
</template>

<script>
import axios from 'axios'
	export default{
		name: "Signin",
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
                
            }
		}
	}
</script>