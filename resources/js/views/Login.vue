<template>
	<v-container fluid fluid-height>
		<v-alert
	      :value="alert"
	      dismissible
	      transition="scale-transition"
	      text
	      prominent
	      type="error"
	      icon="mdi-cloud-alert"
	      width="350px"
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
	      width="350px"
	    >
	      Your credentials are correct, loggin in now ...
	    </v-alert>
		<v-toolbar
		color="info"
		dark
		flat
		>
		<v-toolbar-title class="text-center">Login Form</v-toolbar-title>
		<v-spacer></v-spacer>
	</v-toolbar>
	<v-card width="350px" class="elevation-12 d-inline-block mx-lg-auto">
		<v-row justify="space-between">
			<v-col  cols="mx-auto">
				<v-card-text class="mx-auto">
					<v-form
					v-model="valid"
					ref="form"
					justify="space-around"
					>
					<v-text-field
					v-model="email"
					name="email"
					label="Enter Email"
					type="email"
					prepend-icon="mail"
					:rules="emailRules"
					required
					autofocus
					
					>
					
				</v-text-field>

				<v-text-field
				v-model="password"
				name="password"
				label="Enter Password"
				type="password"
				prepend-icon="lock"
				:rules="passwordRules"
				required
				autofocus
				>
			</v-text-field>

			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn type="submit" @click="login" color="info">
								<div v-if="loading">
								<v-progress-circular
										      :size="30"
										      :width="5"
										      color="teal lighten-3"
										      indeterminate
								></v-progress-circular>
								Login
								</div>
								<div v-else>
									Login
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
export default{
	name: "Login",
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
		}
	}
	</script>