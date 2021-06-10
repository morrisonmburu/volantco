<template>
	<div class="row">
		<div class="col-md-12">
			<v-toolbar
			color="#8F0236"
			dark
			flat
			align-center
			>
			<v-toolbar-title class="text-center">Email Verification</v-toolbar-title>
			<v-spacer></v-spacer>
		</v-toolbar>
		<v-card class="elevation-12 d-inline-block mx-sm-auto">

		<v-container v-if="verified">
			<v-alert
				type="success"
				dark
				border="left"
				prominent
				>
				You have successfully verified your email, You can now login into your account.
			</v-alert>
			<v-btn block dark color="#8F0236" style="color:#fff;" @click="login">Continue To Login</v-btn>
		</v-container>

		</v-card>	
	</div>
</div>
</template>
<script type="text/javascript">
export default{
	data:() => ({
		verified: false,
	}),
	methods: {
		login: () => {
			window.location.replace("https://volantltd.com/volantuser/login")
		}
	},
	created() {
		let token = this.$route.params.token
		axios.get('/api/volantuser/auth/emailverification/'+token).then(response => {
			if(response.data['success']){
				this.verified = true
			}
		});
	}
}
</script>