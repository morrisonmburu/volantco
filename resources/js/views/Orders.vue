<template>
	<v-container>
		<v-card>
 		<v-card-title>
 					Order Details
 					<v-spacer></v-spacer>
 				</v-card-title>
 				<v-data-table
 				:headers="headers"
 				:items="orders"

 				>
 				<template v-slot:item="props">
 					<tr>
 						<td>{{ props.item.to }}</td>
 						<td>{{ props.item.from }}</td>
 						<td>{{ props.item.package }}</td>
 						<td>{{ props.item.time }}</td>
 						<td>{{ props.item.instructions }}</td>
 						<td>
 							<v-btn class="mx-2" fab dark small color="red" @click="">
 								<v-icon>delete</v-icon>
 							</v-btn>
 						</td>
 					</tr>
 				</template>
 			</v-data-table>
 		</v-card>
	</v-container>
</template>

<script>
	export default{
		name: "orders",
		data(){
			return{
				welcome: "Welcome to Your Orders",
				orders: [],
				headers: [
				{
					text: 'to',
					align: 'left',
					value: "to"
				},
				{text: 'from', value: "from"},
				{text: 'package', value: "package"},
				{text: 'Time of Delivery', value: "time"},
				{text: 'instructions', value: "instructions"},
				{text: 'action'},
				],
			}
		},
		beforeMount() {

			this.user = JSON.parse(localStorage.getItem('volant.user'))

			axios.defaults.headers.common['Content-Type'] = 'application/json'
			axios.defaults.headers.common['Authorization'] = 'Bearer ' + localStorage.getItem('volant.jwt')

	        axios.get(`/api/getorders`).then(response => this.orders = response.data)
	    },
	}
</script>
