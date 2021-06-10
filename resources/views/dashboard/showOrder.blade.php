@extends("dashboard.includes.main")

@section("content")


@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-success">
	{{ session('error') }}
</div>
@endif
<!-- Main content --> 
<br>

<div class="content">
	<!-- Tasks -->
	<div class="timeline-row">
		<div class="timeline-icon">
			<img alt="">
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="card border-left-3 border-left-primary rounded-left-0">
					<div class="card-body">
						<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
							<div>
								<h6><a href="#">#{{ $data[1]->order_id }}. Origin: {{ $data[1]->origin[0] }}</a></h6>
								<a href="#" class="text-default">&nbsp;</a>
							</div>

							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Order Made At: {{ $data[1]->created_at }}</span></li>
								<li><span class="text-muted">Order Made By: {{ $data[1]->order_created_at }}</span></li>
								<li class="dropdown">
									Order Status: &nbsp; 
									<a href="#" class="badge badge-primary align-top">
										@if($data[1]->status == 0)
											Unassigned
										@elseif($data[1]->status == 1)
											Accepted
										@elseif($data[1]->status == 2)
											Picked Up
										@elseif($data[1]->status == 3)
											In Transit
										@elseif($data[1]->status == 4)
											Complete
										@elseif($data[1]->status == 5)
											Cancelled
										@endif
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="card border-left-3 border-left-danger rounded-left-0">
					<div class="card-body">
						<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
							<div>
								<h6 class=""><a href="#">#{{ $data[1]->order_id }}. Destinaiton: {{ $data[1]->destination }}</a></h6>
								<a href="#" class="text-default">&nbsp;</a>
							</div>

							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Order Made At: {{ $data[1]->order_created_at }}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="card border-left-3 border-left-primary rounded-left-0">
					<div class="card-body">
						<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
							<div>
								<h6><a href="#">Sender Name: {{ $data[1]->sender_name }}</a></h6>
								<a href="#" class="text-default">&nbsp;</a>
							</div>

							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Sender Phone Number: {{ $data[1]->sender_phone }} </span></li>
							</ul>
							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Description: {{ $data[1]->description }}</span></li>
							</ul>
							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Instructions: {{ $data[1]->instructions }}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="card border-left-3 border-left-danger rounded-left-0">
					<div class="card-body">
						<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
							<div>
								<h6 class=""><a href="#">Recipient Name: {{ $data[1]->recipient_name }}</a></h6>
								<a href="#" class="text-default">&nbsp;</a>
							</div>

							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Recipient Phone Number: {{ $data[1]->recipient_phone }} </span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card border-left-3 border-left-primary rounded-left-0">
					<div class="card-body">
						<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
							<div>
								<h6><a href="#">Package Name: {{ $data[1]->name }}</a></h6>
								<a href="#" class="text-default">&nbsp;</a>
							</div>

							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Order Amount: Ksh {{ $data[1]->total }}</span></li>
							</ul>
							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Number Of Stops:{{ $data[1]->stops_count }} </span></li>
							</ul>
							<ul class="list list-unstyled mb-0 mt-3 mt-sm-0 ml-auto">
								<li><span class="text-muted">Distance Covered: {{ $data[1]->distance }}</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /tasks -->
</div>

<script type="text/javascript">
	function complete(id){
		var id = id;

		jQuery.ajax({
			url:'{{ route('orders.complete') }}',
			method:"POST",
			data:{id: id, _token: '{{csrf_token()}}'},
			success:function(result)
			{
				swal('Order'+result, "has been completed successfully!", "success").then(function(){ 
					window.location = "http://127.0.0.1:8000/orders"
				}
				);
			},
			error : function(){alert("Something Went Wrong.");},
		});
	}
</script>

<script>
	function cancel(id){
		var id = id;

		swal({
			title: "Are you sure?",
			text: "Once canceled, you will not be able to uncancel this order!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				jQuery.ajax({
					url:'{{ route('orders.cancel') }}',
					method:"POST",
					data:{id: id, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						swal('Order'+result, "has been canceled!", {
							icon: "success",
						}).then(function(){ 
							window.location = "http://127.0.0.1:8000/orders"
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});
			} else {
				swal("Order is safe!").then(function(){ 
					window.location = "http://127.0.0.1:8000/orders"
				}
				);
			}
		});
	}
</script>




@endsection