<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="shortcut icon" href="http://testlayout.net/admin/assets/dist/img/ico/favicon.png" type="image/x-icon"> --}}


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/gif/jpg" href="/images/logo.jpg">
	<title>Volant Co | Dashboard</title>

	<!-- Global stylesheets -->
	<!-- Global stylesheets -->
	<link href="{{url('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{ url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}" />
	<link rel="stylesheet" type="text/css" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/fontawesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css') }}">
	<link href="{{ url('assets/assets/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />
	<link href="{{ url('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ url('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	<script src="{{ url('global_assets/js/main/jquery.min.js') }}"></script>
	<!-- /global stylesheets -->

</head>
<body>

@include("dashboard.includes.nav")

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

<!-- Main content -->
<br>
<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Permissions Table</h5>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
					<a class="list-icons-item" data-action="reload"></a>
					<a class="list-icons-item" data-action="remove"></a>
				</div>
			</div>
		</div>

		<div class="card-body">
			<button type="button" style="background-color:#26a69a; border-color: #26a69a"  class="btn btn-success" data-toggle="modal" data-target="#ModalPermissionsForm" > <i class="fa fa-plus"></i> Add Permission</button>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<table class="table table-responsive datatable-column-search-selects">
						<thead >
							<tr>
								<th>#</th>
								<th>Permissions</th>
								<th style="padding: 44px;">Action</th>
							</tr>
						</thead>
						<tbody>
							@if($data)
							@foreach($data as $permission)

							<tr id="drivers2" style="cursor: pointer;">
								<td onclick="getPermission({{ $permission->id }})">
									{{ $permission->id }}
								</td>
								<td onclick="getPermission({{ $permission->id }})">
									{{ $permission->name }}
								</td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" onclick="deletePermission({{ $permission->id }})"><i class="fas fa-trash"></i> Delete </a>
											</div>
										</div>
									</div>
								</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforeach
							@else
							<tr style="text-align: center;"></tr>
							@endif

						</tbody>
						<tfoot>
							<th>#</th>
							<th>Permissions</th>
							<td></td>
						</tfoot>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>
			</div>
		</div>
	</div> <!-- /.content -->

	@include("dashboard.permissions.create")
	@include("dashboard.permissions.edit")

	<script type="text/javascript">

		function getPermission(id){
			jQuery.ajax({
				url:'{{ route('getPermission') }}',
				method:"POST",
				data:{id: id, _token: '{{csrf_token()}}'},
				dataType: 'json',
				success:function(result)
				{
					$('#Name').val(result.name);
					$("#idNumber").val(result.id);
					$('#ModalPermissionsForm2').modal('show');

				},
				error : function(){alert("Something Went Wrong.");},
			});
		}

		$("#createPermission").click(function(e){
			e.preventDefault()
			var name = $("#name").val()
			var roles = [];

			$.each($("input[name='roles[]']:checked"), function(){
				roles.push($(this).val());
			});

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:'{{ route("permissions.store") }}',
				method:"POST",
				data:{name: name, roles: roles},
				success:function(result)
				{
					swal('Permissions'+result.id, "has been created successfully!", "success").then(function(){ 
						window.location.reload()
					}
					);
				},
				error : function(){alert("Something Went Wrong.");},
			});

		});

		function deletePermission(id){
			swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this permission!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					jQuery.ajax({
						url:'{{ route('permissions.destroy') }}',
						method:"POST",
						data:{id: id, _token: '{{csrf_token()}}'},
						success:function(result)
						{
							swal('Permission'+result.id, "has been deleted!", {
								icon: "success",
							}).then(function(){ 
								window.location.reload()
							}
							);
						},
						error : function(){alert("Something Went Wrong.");},
					});
				} else {
					swal("Permission is safe!").then(function(){ 
						window.location.reload()
					}
					);
				}
			});
		}

		$("#editPermission").click(function(e){
			e.preventDefault()

			var name = $("#Name").val()
			var roles = [];
			$.each($("input[name='rolesEdit[]']:checked"), function(){
				roles.push($(this).val());
			});
			var id = $("#idNumber").val()

			jQuery.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:'{{ route("permissions.update") }}',
				method:"POST",
				data:{id: id, name:name, roles: roles},
				success:function(result)
				{
					swal('Permission'+result.id, "has been updated successfully!", "success").then(function(){ 
						window.location.reload()
					}
					);
				},
				error : function(){alert("Something Went Wrong.");},
			});		
		});
	</script>

	@include("dashboard.includes.footer")
