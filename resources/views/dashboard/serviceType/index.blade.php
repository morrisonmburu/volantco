@extends("dashboard.includes.main")

@section("content")

<!-- Main content -->
<!-- /page header -->
<!-- Content Header (Page header) -->
{{-- 	<section class="content-header">
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
	</section> --}}

	<style type="text/css">
		/*.selected {
			background-color: green;
			color: #FFF;
		}*/

		.stepwizard-step p {
			margin-top: 10px;
		}

		.stepwizard-row {
			display: table-row;
		}

		.stepwizard {
			display: table;
			width: 100%;
			position: relative;
		}

		.stepwizard-step button[disabled] {
			opacity: 1 !important;
			filter: alpha(opacity=100) !important;
		}

		.stepwizard-row:before {
			top: 35px;
			bottom: 0;
			position: relative;
			content: " ";
			width: 100%;
			height: 1px;
			background-color: #ccc;
			z-order: 0;

		}

		.stepwizard-step {
			display: table-cell;
			text-align: center;
			position: relative;
		}

		.btn-circle {
			width: 60px;
			height: 60px;
			text-align: center;
			padding: 12px 0;
			font-size: 12px;
			line-height: 1.428571429;
			border-radius: 30px;
		}

		.avatar-wrapper{
			position: relative;
			height: 200px;
			width: 200px;
			margin: 50px auto;
			border-radius: 50%;
			overflow: hidden;
			box-shadow: 1px 1px 15px -5px black;
			transition: all .3s ease;
		}
		.avatar-wrapper:hover{
			transform: scale(1.05);
			cursor: pointer;
		}
		.avatar-wrapper:hover .profile-pic{
			opacity: .5;
		}
		.profile-pic {
			height: 100%;
			width: 100%;
			transition: all .3s ease;
		}
		.profile-pic:after{
			font-family: FontAwesome;
			content: "\f007";
			top: 80px; left: 0;
			width: 100%;
			height: 100%;
			position: absolute;
			font-size: 190px;
			background: #ecf0f1;
			color: #34495e;
			text-align: center;
		}

		.upload-button {
			position: absolute;
			top: 0; left: 0;
			height: 100%;
			width: 100%;
		}
		.upload-button .fa-arrow-circle-up{
			position: absolute;
			font-size: 234px;
			top: -17px;
			left: -17px;
			text-align: center;
			opacity: 0;
			transition: all .3s ease;
			color: #34495e;
		}
		.upload-button:hover .fa-arrow-circle-up{
			opacity: .9;
		}

		#drivers2:hover{
			background-color: #D7DBDD;
		}

		.actions:hover{
			background-color: #D7DBDD;
		}
</style>

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
<!-- Main content --><br>
<section class="content">
	<div class="row">
		<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="cpa90TSeTV">
		<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="cpa90TSeTV" data-index="0">
			<div class="panel-heading ui-sortable-handle">
				<div class="btn-group"> 
					<button type="button" style="background-color:#26a69a; border-color: #26a69a"  class="btn btn-success" data-toggle="modal" data-target="#ModalServiceForm" > <i class="fa fa-plus"></i> Add Service Type</button> 
				</div>
			<div class="pull-right"><ul class="icons-list"><li><a title="Edit Title" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></li><li><a title="Reload" data-action="reload" data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title"></span></a></li><li><a title="Minimize" data-action="collapse" data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title"></span></a></li><li><a title="Close" data-action="close" data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title"></span></a></li></ul></div></div>

	<div class="panel-body">
		<div class="row">
			<div class="panel-header">
				<div class="col-sm-4 pull-right">
					<div class="dataTables_length">

					<a href="/csvcouriers" class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>

					<a href="/excelcouriers" class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>

					<a href="/pdfcouriers" class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>

					</div>
				</div>
			</div>
			</div>

		<div class="table-responsive">
			<table id="drivers" style="white-space: nowrap;" class="table datatable-basic text-center datatable-highlight table-hover">
			<thead >
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Vehicle Type</th>
					<th>Number of Drivers</th>
					<th>Status</th>
				<th style="padding: 44px;">Action</th>
				</tr>
			</thead>
			<tbody>
			@if($data)
			@foreach($data as $service)

			<tr onclick="getService({{ $service->id }})" id="drivers2" style="cursor: pointer;">
			<td>
				{{ $service->id }}
			</td>
			<td>
				{{ $service->name }}
			</td>
			<td>
				{{ $service->serviceType }}
			</td>
			<td>
				{{ $service->nop }}
			</td>
											
			<td>
				@if($service->status == 0)
				<span class="label label-danger">
					Disabled
				</span>
				@elseif($service->status == 2)
				<span class="label label-warning">
					Suspended
				</span>
				@else
				<span class="label-success label label-success">
					Enabled
				</span>
				@endif
				</td>
				<td>
					<div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="suspend({{ $service->id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-eye-slash"></i><span class="control-title">Suspend</span></a></li><li><a onclick="deleteService({{ $service->id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>
				</td>
				</tr>
				@endforeach
				@else
					<tr style="text-align: center;"></tr>
				@endif

				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

@include("dashboard.serviceType.create")
@include("dashboard.serviceType.edit")

	</div>
</section> <!-- /.content -->

</div>
<!-- /page container -->

</body>
</html>

<script type="text/javascript">

	function getService(id){   

		jQuery.ajax({
			url:'{{ route('getService') }}',
			method:"POST",
			data:{id: id, _token: '{{csrf_token()}}'},
			dataType: 'json',
			success:function(result)
		{
			$("#se-type").text(result.serviceType)
			$("#Name").val(result.name)
			$("#ra-type").text(result.rateType)
			$("#instant-book").text(result.instant_bookings)
			$('#pa-number').text(result.nop)
			$("#payment_method").text(result.payment_methods)
			$("#per-minute").val(result.per_minute)
			$("#per-kilometer").val(result.per_kilometer)
			$("#default-cost").val(result.default_cost)
			$("#id_number").val(result.id)

			$('#ModalServiceForm2').modal('show');
	
			},
			error : function(){alert("Something Went Wrong.");},
		});

	}

	$("#createService").click(function(){

		var s_type = $('option:selected', '#s-type').val();
		var name = $("#name").val();
		var r_type = $('option:selected', '#ra_type').val();
		var instant_book = $('option:selected', '#instant_book').val();
		var pa_number = $('option:selected', '#p_number').val();
		var payment_method = $('option:selected', '#payment-method').val();
		var per_minute = $("#per_minute").val();
		var per_kilometer = $("#per_kilometer").val();
		var default_cost = $("#default_cost").val();

		jQuery.ajax({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    },
			url:'{{ route("createService") }}',
			method:"POST",
			data:{s_type: s_type, name: name, r_type: r_type, instant_book: instant_book, pa_number: pa_number, payment_method: payment_method, per_minute: per_minute, per_kilometer: per_kilometer, default_cost: default_cost},
					success:function(result)
					{
						swal('Service'+result, "has been created successfully!", "success").then(function(){ 
							window.location.reload()
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});

			});

		function updateService(){

		var stype = $('option:selected', '#s-type2').val();
		if (stype != undefined) {
			var s_type = $('option:selected', '#s-type2').val();
		}else{
			var s_type = $("#se-type").text()
		}
		var name = $("#Name").val();
		
		var rtype = $('option:selected', '#r-type2').val();
		if (rtype != undefined) {
			var r_type = $('option:selected', '#r-type2').val();
		}else{
			var r_type = $("#ra-type").text()
		}
		
		var instantbook = $('option:selected', '#instant_book2').val();
		if (instantbook != undefined) {
			var instant_book = $('option:selected', '#instant_book2').val();
		}else{
			var instant_book = $("#instant-book").text()
		}

		var panumber = $('option:selected', '#p_number2').val();
		if (panumber != undefined) {
			var pa_number = $('option:selected', '#p_number2').val();
		}else{
			var pa_number = $('#pa-number').text()
		}
		
		var paymentmethod = $('option:selected', '#payment-method2').val();
		if (paymentmethod != undefined) {
			var payment_method = $('option:selected', '#payment-method2').val();
		}else{
			var payment_method = $("#payment_method").text()
		}
		var per_minute = $("#per-minute").val();
		var per_kilometer = $("#per-kilometer").val();
		var default_cost = $("#default-cost").val();
		var id_number = $("#id_number").val()			

		jQuery.ajax({
			url:'{{ route("edit.serviceType") }}',
			method:"POST",
			data:{ s_type: s_type, name: name, r_type: r_type, instant_book: instant_book, pa_number: pa_number, payment_method: payment_method, per_minute: per_minute, per_kilometer: per_kilometer, default_cost: default_cost, id_number: id_number, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						swal('Service'+result, "has been updated successfully!", "success").then(function(){ 
							window.location.reload()
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});

			}

			function suspend(id){
				jQuery.ajax({
					url:'{{ route('suspendDriver') }}',
					method:"POST",
					data:{id: id, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						swal('Driver'+result, "has been suspended!", "success").then(function(){ 
							window.location.reload()
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});
			}

			function deleteService(id){
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this driver!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						jQuery.ajax({
							url:'{{ route('deleteDriver') }}',
							method:"POST",
							data:{id: id, _token: '{{csrf_token()}}'},
							success:function(result)
							{
								swal('Driver'+result, "has been deleted!", {
									icon: "success",
								}).then(function(){ 
									window.location.reload()
								}
								);
							},
							error : function(){alert("Something Went Wrong.");},
						});
					} else {
						swal("Driver is safe!").then(function(){ 
							window.location.reload()
						}
						);
					}
				});
			}
		</script>

		@endsection