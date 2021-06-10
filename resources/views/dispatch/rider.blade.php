<div class="col-md-4 space" style="width: 25.5%;">
	<div class="panel panel-flat" style="height: 100vh;">

		<!-- Panel heading -->
		<div class="panel-heading">
			<h6 class="panel-title">Associate Stats</h6>

			<div class="heading-elements">
				<a href="/courier" class="btn btn-info btn-sm">See all &rarr;</a>
			</div>
		</div>
		<!-- /panel heading -->
		<!-- /area chart -->
		<div class="panel-body" style="padding-right: 0;padding-right: 0;">
			<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
					<li class="active"><a href="#default-tab1" data-toggle="tab"><span class="badge bg-danger-400 media-badge"> {{ $riderstats['online'] }} </span> Online</a></li>
					<li><a href="#default-tab2" data-toggle="tab"><span class="badge bg-success-400 media-badge"> {{ $riderstats['offline'] }} </span> Offline </a></li>
					<li><a href="#default-tab3" data-toggle="tab"><span class="badge bg-success-400 media-badge"> {{ $riderstats['inactive'] }} </span> Inactive </a></li>
				</ul>

				<div class="tab-content scrollbar" id="style-3">
					<div style="margin-left: 7px;" class="tab-pane active" id="default-tab1">
						<ul class="media-list">
							<div id="selectable2" class="ui-selectable">
								@foreach($drivers as $rider)
								@if($rider->is_online == 1)
								<div class="panel panel-flat">
									<li class="media">
										<div class="media-left">
											<span id="rider_id" class="badge bg-success-400 media-badge">{{ $rider->id }}</span>
										</div>

										<div class="media-body">
											<div class="row">
												<div class="col-md-2">
													<div class="btn btn-info btn-circle btn-lg">
														@if($rider->Name == 'N/A')
														 <span class="text-center">V</span>
														@else
														<?php $name = ucfirst($rider->Name) ?>
														 <span class="text-center">{{ $name[0] }}</span>
														@endif
													</div>
												</div>
												<div class="col-md-8">
													<div class="row">
														<div class="col-md-12">
															<div class="rider_space">
																@if($rider->Name == 'N/A')
																<span>{{ $rider->email }}</span>
																@else
																<span>{{ $rider->Name }}</span>
																@endif
																<p>{{ $rider->phoneNo }}</p>
																
																@if($rider->on_the_move == 0)
																<button class="btn btn-success btn-sm">Available</button>
																@else
																<button class="btn btn-info btn-sm">Busy</button>
																@endif
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</div>
								@endif
								@endforeach
							</div>
						</ul>
					</div>

					<div style="margin-left: 7px;" class="tab-pane" id="default-tab2">
						<ul class="media-list">
							<div id="selectable2" class="ui-selectable">
								@foreach($drivers as $rider)
								@if($rider->is_online == 0)
								<div onclick="showRider('{{ $rider->id }}')" id="rider{{ $rider->id }}" class="panel panel-flat">
									<li class="media">
										<div class="media-left">
											<span id="rider_id" class="badge bg-success-400 media-badge">{{ $rider->id }}</span>
										</div>

										<div class="media-body">
											<div class="row">
												<div class="col-md-2">
													<div class="btn btn-info btn-circle btn-lg">
														@if($rider->Name == 'N/A')
														 <span class="text-center">V</span>
														@else
														<?php $name = ucfirst($rider->Name) ?>
														 <span class="text-center">{{ $name[0] }}</span>
														@endif
													</div>
												</div>
												<div class="col-md-8">
													<div class="row">
														<div class="col-md-12">
															<div class="rider_space">
																@if($rider->Name == 'N/A')
																<span>{{ $rider->email }}</span>
																@else
																<span>{{ $rider->Name }}</span>
																@endif
																<p>{{ $rider->phoneNo }}</p>
																<button class="btn btn-warning btn-sm">Offline</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</div>
								@endif
								@endforeach
							</div>
						</ul>
					</div>
					
					<div style="margin-left: 7px;" class="tab-pane" id="default-tab3">
						<ul class="media-list">
							<div id="selectable2" class="ui-selectable">
								@foreach($drivers as $rider)
								@if($rider->status == 0)
								<div onclick="showRider('{{ $rider->id }}')" id="rider{{ $rider->id }}" class="panel panel-flat">
									<li class="media">
										<div class="media-left">
											<span id="rider_id" class="badge bg-success-400 media-badge">{{ $rider->id }}</span>
										</div>

										<div class="media-body">
											<div class="row">
												<div class="col-md-2">
													<div class="btn btn-info btn-circle btn-lg">
														@if($rider->Name == 'N/A')
														 <span class="text-center">V</span>
														@else
														<?php $name = ucfirst($rider->Name) ?>
														 <span class="text-center">{{ $name[0] }}</span>
														@endif
													</div>
												</div>
												<div class="col-md-8">
													<div class="row">
														<div class="col-md-12">
															<div class="rider_space">
																@if($rider->Name == 'N/A')
																<span>{{ $rider->email }}</span>
																@else
																<span>{{ $rider->Name }}</span>
																@endif
																<p>{{ $rider->phoneNo }}</p>
																<button class="btn btn-danger btn-sm">Inactive</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>
								</div>
								@endif
								@endforeach
							</div>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="slide2">
			<div class="panel panel-flat" style="height: 100%; color: #000; background-color: #D7DBDD;">
				<div class="panel-heading" style="color: #000; background-color: #D7DBDD;">
					<h6 class="panel-title">Order/ # <span id="order-id"></span></h6>
					<div class="heading-elements">
						<ul class="icons-list">
							<li>
								<button type="button" class="btn btn-info btn-circle btn-sm" onclick="slide2()"><i class="glyphicon glyphicon-remove"></i></button>
							</li>
						</ul>
					</div>
				</div>

				<div class="panel-body">
					<div class="tabbable">
						<ul class="nav nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
							<li class="active"><a href="#solid-rounded-tab1" data-toggle="tab">Details</a></li>
							<li><a href="#solid-rounded-tab2" data-toggle="tab">History</a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="solid-rounded-tab1">
								<table class="table table-user-information" style="align-items: center;">
									<tbody>
										<tr>
											<td>Associate Name</td>
											<td id="rider_name"></td>
										</tr>
										<tr>
											<td>Associate Contact</td>
											<td id="rider_phone"></td>
										</tr>
										<tr>
											<td>Associate Status</td>
											<td id="rider_status"></td>
										</tr>
										<tr>
											<td>Vehicle Type</td>
											<td id="rider_type"></td>
										</tr>
										<tr>
											<td>Vehicle Plate Number</td>
											<td id="rider_plate_number"></td>
										</tr>
										<tr>
											<td>Vehicler Model</td>
											<td id="rider_model"></td>
										</tr>
										<tr>
											<td>Number Of Passengers</td>
											<td id="rider_passanger"></td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="tab-pane" id="solid-rounded-tab2">
								<table class="table table-user-information" style="align-items: center;">
									<tbody>
										<tr>
											<td>Associate Created At</td>
											<td id="rider_created_at"></td>
										</tr>
										<tr>
											<td>Associate Updated At</td>
											<td id="rider_updated_at"></td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function showRider(id){
		jQuery.ajax({
			url:'{{ route('getRider') }}',
			method:"POST",
			data:{id: id, _token: '{{csrf_token()}}'},
			dataType: 'json',
			success:function(result)
			{
				$("#rider_name").text(result.Name);
				$("#rider_phone").text(result.phoneNo);
				if(result.status == 0){
					var status = 'Active'
					$("#rider_status").text(status)
				}else{
					var status = 'Inactive'
					$("#rider_status").text(status)
				}
				$("#rider_type").text(result.vehicle_type)
				$("#rider_plate_number").text(result.vehicle_platenumber)
				$("#rider_model").text(result.vehicle_model)
				$("#rider_passanger").text(result.number_of_passangers)
				$("#rider_created_at").text(result.created_at)
				$("#rider_updated_at").text(result.updated_at)
				$("#rider"+result.id).css('background', '#2E86C1', 'color', 'white')
				$(".slide2").slideToggle("slow");
			},
			error : function(){alert("Something Went Wrong.");},
		});
	}
</script>