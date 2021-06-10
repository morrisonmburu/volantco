@extends("dispatch.includes.main")

@section("content")

<!-- Main content -->
<!-- Content Header (Page header) -->
<section class="content-header">
	<div class="header-icon">
		<i class="pe-7s-box1"></i>
	</div>
	<div class="header-title">
		<form action="http://testlayout.net/admin/view_load.php#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>   

	</div>
</section>                    

@if (session('success'))
<div class="alert alert-success">
	{{ session('success') }}
</div>
@endif
@if(count($errors))
<div class="alert alert-danger">
	<strong>
		Whoops!
	</strong>
	There were some problems with your input.
	<br/>
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<style type="text/css">
	.space{
		padding-right:0;
    	padding-left:0;
    	-webkit-box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
		box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
	}

	.show_slide{
		-webkit-box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
		box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
	}

	.test_space{
		padding-right:0;
    	padding-left:0;
    	-webkit-box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
		-moz-box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
		box-shadow: -1px -2px 33px 0px rgba(0,0,0,0.75);
	}

	.top{
		padding-bottom:0;
    	padding-top:0;
    	margin-top: 0;
    	margin-bottom: 0
	}

	.form_client{
		padding-bottom: 5px;
	}

	.scrollbar
	{
		margin-left: 0;
		padding-left: 0;
		padding-right: 0;
		float: left;
		height: 80vh;
		background: #F5F5F5;
		overflow-y: scroll;
		margin-bottom: 25px;
		position:relative;
	}

	#style-3:-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}

	#style-3:-webkit-scrollbar
	{
		width: 6px;
		background-color: #F5F5F5;
	}

	#style-3:-webkit-scrollbar-thumb
	{
		background-color: #000000;
	}

	ul.timeline {
    list-style-type: none;
    position: relative;
	}
	ul.timeline:before {
	    display: none;
	}
	ul.timeline:after {
	    display: none;
	}
	ul.timeline > li {
	    margin: 20px 0;
	    padding-left: 20px;
	}
	ul.timeline > li:before {
	    content: ' ';
	    background: white;
	    display: inline-block;
	    position: absolute;
	    border-radius: 50%;
	    border: 3px solid #22c0e8;
	    left: 20px;
	    width: 20px;
	    height: 20px;
	    /*z-index: 400;*/
	}

	ul.timeline > span {
		position: absolute;
		top: 1.5em;
		left: 3.5em;
	}

	ul.timeline > .to{
		position: relative;
		top: 0;
		left: 1em;
		bottom:0;
		color: #B3B6B7;
	}

	ul.timeline > button{
		position: absolute;
		top: -1em;
		left: 13em;
	}

	ul.timeline > .dispatched{

	}

	.btn-circle {
	  width: 30px;
	  height: 30px;
	  text-align: center;
	  padding: 6px 0;
	  font-size: 12px;
	  line-height: 1.428571429;
	  border-radius: 15px;
	}
	.btn-circle.btn-lg {
	  width: 50px;
	  height: 50px;
	  padding: 10px 16px;
	  font-size: 18px;
	  line-height: 1.33;
	  border-radius: 25px;
	}

	.btn-circle.btn-sm {
	  width: 35px;
	  height: 35px;
	  padding: 0;
	  font-size: 18px;
	  line-height: 1.33;
	  border-radius: 25px;
	}

	.assign{
		margin-top: 35px;
		margin-left: 10px;
	}

	.slide{ 
		position:absolute;
		bottom:0;
		display:none;
		padding:0;
		margin:0;
		top: 0;
		height: 100%;
		width: 100%;
	}

	.slide2{ 
		position:absolute;
		bottom:0;
		display:none;
		padding:0;
		margin:0;
		top: 0;
		height: 100%;
		width: 100%;
	}

	.rider_space span{
		position: absolute;
		top: 0.8em;
		left: 1.7em;
		font-size: 15px;
		font-weight: bold;
		color: #000;
	}

	.rider_space p{
		position: absolute;
		top: 3em;
		left: 2em;
		color: #D7DBDD;
	}

	.rider_space button{
		position: absolute;
		top: 0;
		left: 13em;
	}
</style>

<div id="preloader">
  <div id="loader"></div>
  <p id="message">... Dispatching</p>
</div>

<!-- Vertical form modal -->
		<div id="modal_form_vertical" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Order ID : # <span id="id_order"></span></h5>
					</div>

				
						<div class="modal-body">
							<div id="preloader2" style="display: block;">
							  <div id="loader2"></div>
							</div>
							<div class="form-group" id="rider_account" style="display: none;">
								<div class="row">
									<div class="col-sm-12">
										<label for="driverEmail">Online And Available <span id="type_account" class="badge bg-success-400"></span> Riders</label>
										 <select placeholder="Active Drivers" class="form-control" id="driverEmail" onchange="fetchDriver()" name="driverEmail">
	    									 <option></option>
    									 </select>
										
										<p class="text-center driver_error" style="color: red;"></p>
									</div>

									<span>
										Rider Phone Number: <span id="phone_number" class="badge bg-danger-400"></span>
									</span>
									<span>
										Rider Name: <span id="rider_name" class="badge bg-danger-400"></span>
									</span>
									<span>
										Board Number: <span id="boardNo" class="badge bg-danger-400"></span>
									</span>
									<span>Type: <span id="v-type" class="badge bg-danger-400"></span> PlateNo: <span id="plateNo" class="badge bg-danger-400"></span></span>

									<input type="hidden" id="to_order">
									<input type="hidden" id="from_order">
									<input type="hidden" id="package_order">
									<input type="hidden" id="id_number_order">
									<input type="hidden" id="price_order">
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							<button onclick="dispatch()" class="btn btn-primary">Dispatch Order</button>
						</div>
				
				</div>
			</div>
		</div>
		<!-- /vertical form modal -->

<div class="row" id="main" style="position: fixed;" >
	<div class="col-md-4 test_space" style="width: 28%;">
		<!-- My messages -->
		<div class="panel panel-flat" style="height: 100vh;">
			<!-- Panel heading -->
			<div class="panel-heading">
				<h6 class="panel-title">Order Stats</h6>

				<div class="heading-elements">
					<a href="/orders" class="btn btn-info btn-sm">See all &rarr;</a>
				</div>
			</div>
			<!-- /panel heading -->
			<!-- /area chart -->
			<div class="panel-body" style="padding-right: 0;padding-right: 0;">
				<div class="tabbable">
				<ul class="nav nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
					<li class="active"><a href="#default-justified-tab1" data-toggle="tab"><span class="badge bg-danger-400 media-badge"> {{ $orderstats['unassigned'] }} </span> Unassigned</a></li>
					<li><a href="#default-justified-tab2" data-toggle="tab"><span class="badge bg-success-400 media-badge">{{ $orderstats['in_transit'] }}</span> In Transit</a></li>
					<li><a href="#default-justified-tab3" data-toggle="tab"><span class="badge bg-success-400 media-badge">{{ $orderstats['complete'] }}</span> Complete</a></li>
				</ul>

				<div class="tab-content scrollbar" id="style-3">
					<div style="margin-left: 7px;" class="tab-pane active" id="default-justified-tab1">
					<ul class="media-list">
						<div id="selectable" class="ui-selectable">
							
							@foreach($data as $order)
							@if($order->status == 0)
							<div class="panel panel-flat">
								<li class="media">
								<div class="media-left">
									<span id="order_id" class="badge bg-danger-400 media-badge">{{ $order->order_id }}</span>
								</div>

								<div class="media-body">
									<div class="row">
										<div class="col-md-2">
											<div class="assign">
												<button type="button" class="btn btn-info btn-circle btn-lg" onclick="assignRider('{{ $order->order_id }}', '{{ $order->destination }}', '{{ $order->origin[0] }}', '{{ $order->total }}', '{{ $order->name }}')"><i class="glyphicon glyphicon-plus"></i></button>
												<p>Assign Rider</p>
											</div>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-12">
													<ul class="timeline">
														<li>
															<?php $time = date('h:i a', strtotime($order->pickup_datetime)) ?>
															<p>{{ $time }}</p>
														</li>
														<button class="btn btn-info btn-sm">Unassigned</button>
														<span>{{ $order->recipient_name }}</span>
														<span class="to">To: {{ $order->destination }}</span>
														<li style="color: #B3B6B7;">
															<p>Unassigned</p>
														</li>
													</ul>
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

					<div style="margin-left: 7px;" class="tab-pane" id="default-justified-tab2">
						<ul class="media-list">
						<div id="selectable" class="ui-selectable">
							
							@foreach($data as $order)
							@if($order->status == 3 || $order->status == 2 || $order->status == 1)
							<div onclick="showOrder('{{ $order->order_id }}')" class="panel panel-flat" id="order{{ $order->order_id }}">
								<li class="media">
								<div class="media-left">
									<span id="order_id" class="badge bg-danger-400 media-badge">{{ $order->order_id }}</span>
								</div>

								<div class="media-body">
									<div class="row">
										<div class="col-md-2">
											<div class="assign">
												<button type="button" class="btn btn-info btn-circle btn-lg"><i class="glyphicon glyphicon-road"></i></button>
												<p>InTransit Order</p>
											</div>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-12">
													<ul class="timeline">
														<li>
															<?php $time = date('h:i a', strtotime($order->pickup_datetime)) ?>
															<p>{{ $time }}</p>
														</li>
														<button class="btn btn-primary btn-sm">In Transit</button>
														<span>{{ $order->recipient_name }}</span>
														<span class="to">To: {{ $order->destination }}</span>
														<li style="color: #B3B6B7;">
															<p>In Transit</p>
														</li>
													</ul>
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

					<div style="margin-left: 7px;" class="tab-pane" id="default-justified-tab3">
						<ul class="media-list">
						<div id="selectable" class="ui-selectable">
							
							@foreach($completeOrders as $order)
							@if($order->status == 4)
							<div onclick="showOrder('{{ $order->order_id }}')" class="panel panel-flat">
								<li class="media">
								<div class="media-left">
									<span id="order_id" class="badge bg-danger-400 media-badge">{{ $order->order_id }}</span>
								</div>

								<div class="media-body">
									<div class="row">
										<div class="col-md-2">
											<div class="assign">
												
											</div>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-12">
													<ul class="timeline">
														<li>
															<?php $time = date('h:i a', strtotime($order->pickup_datetime)) ?>
															<p>{{ $time }}</p>
														</li>
														<button class="btn btn-success btn-sm">Complete</button>
														<span>{{ $order->recipient_name }}</span>
														<span class="to">To: {{ $order->destination }}</span>
														<li style="color: #B3B6B7;">
															<p>Complete</p>
														</li>
													</ul>
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

			<div class="slide">
				<div class="panel panel-flat show_slide" style="height: 100%; width: inherit; color: #000; background-color: #D7DBDD;">
					<div class="panel-heading" style="color: #000; background-color: #D7DBDD;">
						<h6 class="panel-title">Order/ # <span id="order-id"></span></h6>
						<div class="heading-elements">
							<ul class="icons-list">
								<li>
									<button type="button" class="btn btn-info btn-circle btn-sm" onclick="slide()"><i class="glyphicon glyphicon-remove"></i></button>
								</li>
							</ul>
						</div>
					</div>

					<div class="panel-body" style="width: inherit;">
						<div class="tabbable">
							<ul class="nav nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
								<li class="active"><a href="#solid-rounded-justified-tab1" data-toggle="tab">Details</a></li>
								<li><a href="#solid-rounded-justified-tab2" data-toggle="tab">Customer</a></li>
								<li><a href="#solid-rounded-justified-tab3" data-toggle="tab">History</a></li>
							</ul>

							<div class="tab-content">
								<div class="tab-pane active" id="solid-rounded-justified-tab1">
									<table class="table table-user-information" style="align-items: center;">
										<tbody>
											<tr>
												<td>Status</td>
												<td><span id="order_status_show"></span></td>
											</tr>
											<tr>
												<td>Order Description</td>
												<td id="order_description"></td>
											</tr>
											<tr>
												<td>Distance</td>
												<td id="order_distance"></td>
											</tr>
											<tr>
												<td>Order Amount</td>
												<td id="order_amount"></td>
											</tr>
											<tr>
												<td>Order Package Type</td>
												<td id="order_package"></td>
											</tr>
											<tr>
												<td>Order Category</td>
												<td id="order_category"></td>
											</tr>
											<tr>
												<td>Number Of stops</td>
												<td id="order_stops"></td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="tab-pane" id="solid-rounded-justified-tab2">
									<table class="table table-user-information" style="align-items: center;">
										<tbody>
											<tr>
												<td>Customer Name</td>
												<td id="order_customer_name"></td>
											</tr>
											<tr>
												<td>Customer Contact Number</td>
												<td id="order_customer_phone"></td>
											</tr>
										</tbody>
									</table>
								</div>

								<div class="tab-pane" id="solid-rounded-justified-tab3">
									<table class="table table-user-information" style="align-items: center;">
										<tbody>
											<tr>
												<td>Order Created At</td>
												<td id="order_created_at"></td>
											</tr>
											<tr>
												<td>Order Updated At</td>
												<td id="order_updated_at"></td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
					<input type="hidden" id="from" name="from" placeholder="Pickup Address" class="form-control">
					<input type="hidden" id="to" name="to" placeholder="Dropoff Address" class="form-control">
					<input type="hidden" name="stopovers" id="stopovers">
					<span style="display: none;" id="orderid"></span>
				</div>
			</div>
		</div>
		<!-- /my messages -->
	</div>

	<div class="col-md-4" style="width: 46%; padding-right:0; padding-left:0;">

		<div id="googleMap" style="width:100%; height: 94vh;"></div>

	</div>
	@include('dispatch.rider')
</div>

</div>

<script type="text/javascript" src="{{url('js/dispatch.js')}}"></script>

<script type="text/javascript" src="{{url('https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=dispatch')}}"></script>

<script>
	$(function() {
		$( "#selectable" ).selectable();
	});

	$(function() {
		$( "#selectable2" ).selectable();
	});
</script>

<script type="text/javascript">

	// $.validator.addMethod("phoneNumValidation", function(value) {
	// 	return $("#phone").intlTelInput("isValidNumber")
	// }, 'Please enter a valid number');

	// var validate = function() {
	// 	$("#userPhoneForm").validate({
	// 		rules: {
	// 			phone: {
	// 				required: true,
	// 				phoneNumValidation: true
	// 			}
	// 		},
	// 		messages: {
	// 			phone: {
	// 				required: "Phone number is required field."
	// 			}
	// 		},
	// 		errorPlacement : function(error, element) {
	// 			error.insertAfter($("#userPhoneDiv"));
	// 		}
	// 	});

	// }

	$(document).ready(function(){
		setTimeout(function(){
            window.location.reload()
          }, 300000);
	});

	function fetchDriver(){
        var select = $("#driverEmail").val();

        $.ajax({
          url:"{{ route('fetchDriver') }}",
          method:"POST",
          data:{select:select, _token: '{{csrf_token()}}'},
          dataType: 'json',
          success:function(result)
          {
            $("#boardNo").text(result.boardNo)
            $("#phone_number").text(result.phoneNo)
            $("#rider_name").text(result.Name)
            $("#v-type").text(result.vehicle_type)
            $("#plateNo").text(result.vehicle_platenumber)
          }
        });
    };

    function assignRider(id, to, from, price, package){

    	$("#preloader2").css('display', 'block')
    	$("#rider_account").css('display', 'none')

    	$("#boardNo").empty();
        $("#phone_number").empty();
        $("#rider_name").empty();
        $("#v-type").empty();
        $("#plateNo").empty();

    	$("#to_order").val(to)
    	$("#from_order").val(from)
    	$("#price_order").val(package)
    	$("#package_order").val(price)
    	$("#id_number_order").val(id)
    	$('#modal_form_vertical').modal('show');

    	$('#driverEmail').empty();

    	$.ajax({
          url:"{{ route('getRiderAccount') }}",
          method:"POST",
          data:{package: package, _token: '{{csrf_token()}}'},
          dataType: 'json',
          success:function(result)
          {
          	console.log(result);
          	$('#preloader2').fadeOut()
            $('#rider_account').css('display', 'block');
            $("#type_account").text(package)

            for (var i = result.length - 1; i >= 0; i--) {
            	$("#driverEmail").append(
            			'<option value="'+result[i].id+'">'+result[i].Name+'</option>'
            		)
            }

            $('#driverEmail').change()
          }
        });
    }

	$(document).ready(function() {
		$("#phone").intlTelInput({
			onlyCountries: ["ke", "ug", "rw", "tz"],
			utilsScript: "/assets/intl-tel-input-9.0.0/build/js/utils.js?1585994360633",
			separateDialCode: true,
			formatOnDisplay:true
		});

		$("#phone2").intlTelInput({
			onlyCountries: ["ke", "ug", "rw", "tz"],
			utilsScript: "/assets/intl-tel-input-9.0.0/build/js/utils.js?1585994360633",
			separateDialCode: true,
			formatOnDisplay:true
		});

	});

	function dispatch(){
		var orderNo = $("#id_number_order").val()
		var driverNo = $("#driverEmail").val()
		var DriverPhone = $("#phone_number").text()
		var package = $("#package_order").val()
		var price = $("#price_order").val()
		var from = $("#from_order").val()
		var to = $("#to_order").val()
		var order_status = $('option:selected', '#order_status').val()
		var driverEmail = $('option:selected', '#driverEmail').val()
		if(driverEmail === ''){
			$error = 'You Must Pick A driver';
			$(".driver_error").text($error);
		}else if(order_status === ''){
			$error = 'You Must An Order Status';
			$(".status_error").text($error);
		}else{
			$('#preloader').css("display", "block");
			$('#main').css("display", "none");
			$('#modal_form_vertical').modal('hide');

			$.ajax({
	          url:"{{ route('/dispatch/store') }}",
	          method:"POST",
	          data:{orderNo: orderNo, driverNo: driverNo, DriverPhone: DriverPhone, from: from, to: to, package: package, price: price, order_status: order_status, _token: '{{csrf_token()}}'},
	          dataType: 'json',
	          success:function(result)
	          {
	          	$('#preloader').fadeOut();
	          	if(result[0] == 'error'){
	          		swal({
	          			icon: 'error',
	          			title: 'Oops...',
	          			text: ' '+result[1],
	          		}).then(function(){ 
	          			window.location.reload()
	          		})
	          	}else{
	          		swal('Dispatch'+result.id, "has been made successfully!", "success").then(function(){ 
						location.reload()
					});
	          	}
	          }
	        });
		}
	}

	function slide(){
		$(".slide").slideToggle("slow");
	}

	function slide2(){
		$(".slide2").slideToggle("slow");
	}

	function showOrder(id){
		jQuery.ajax({
			url:'{{ route('getOrder') }}',
			method:"POST",
			data:{id: id, _token: '{{csrf_token()}}'},
			dataType: 'json',
			success:function(result)
			{
				if(result.orders[1].status == 0){
					var status = 'Unassigned'
					$("#order_status_show").text(status)
				}else if(result.orders[1].status == 1){
					var status = 'Accepted'
					$("#order_status_show").text(status)
				}else if(result.orders[1].status == 2){
					var status = 'Picked Up'
					$("#order_status_show").text(status)
					console.log(status)
				}else if(result.orders[1].status == 3){
					var status = 'In Transit'
					$("#order_status_show").text(status)
				}else if(result.orders[1].status == 4){
					var status = 'Completed'
					$("#order_status_show").text(status)
				}else{
					var status = 'Cancelled'
					$("#order_status_show").text(status)
				}
				$("#order_description").text(result.orders[1].instructions)
				$("#order_distance").text(result.orders[1].distance)
				$("#order_amount").text('Ksh '+result.orders[1].total)
				$("#order_package").text(result.orders[1].name)
				$("#order_category").text(result.orders[1].category)
				$("#order_stops").text(result.orders[1].stops_count)
				$("#order_customer_name").text(result.orders[1].recipient_name)
				$("#order_customer_phone").text(result.orders[1].recipient_phone)
				$("#order_created_at").text(result.orders[1].order_created_at)
				$("#order_updated_at").text(result.orders[1].updated_at)
				$("#from").val(result.orders[1].origin[0])
				$("#stopovers").val(JSON.stringify(result.locations));

				$("#order"+result.orders[1].order_id).css('background', '#2E86C1', 'color', 'white')

				$(".slide").slideToggle("slow");
				function changeTextProgrammatically(value) {
					$("#to").val(value);
					      $("#to").trigger('change'); // Triggers the change event
					  }

					  changeTextProgrammatically(result.orders[1].destination);
					},
					error : function(){alert("Something Went Wrong.");},
				});
	}

	function changeIntransit(order_id){
		$.ajax({
          url:"{{ route('InTransit') }}",
          method:"POST",
          data:{order_id: order_id, _token: '{{csrf_token()}}'},
          dataType: 'json',
          success:function(result)
          {
            swal('Order'+result.id, "Order Is on the move (In Transit)!", "success").then(function(){ 
				location.reload()
			});
          }
        });
	}

</script>

</body>
</html>

@endsection