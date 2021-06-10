<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/gif/jpg" href="/images/logo.jpg">
	<title>Volant Co | Dashboard</title>
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
</head>
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<body>

	<style type="text/css">
		.space_top{
			margin-top:40px;
		}

		@media only screen and (max-width: 640px) {
			.space_top{
				margin-top: 0;
			}
		}
	</style>

	@include("dashboard.includes.nav")

	<!-- Content area -->
	<div class="content">

		<!-- Quick stats boxes -->
		<div class="row">
			<div class="col-lg-4">

				<!-- Members online -->
				<div class="card bg-teal-400">
					<div class="card-body">
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ count($stats['orders']) }}</h3>
							<div class="list-icons ml-auto">
								<a class="list-icons-item" data-action="reload"></a>
							</div>
						</div>

						<div>
							<i style="font-size: 30px; padding-left: 4px; padding-right: 5px;" class="fas fa-shuttle-van"></i> Orders Made
						</div>
					</div>

					<div class="container-fluid">
						@include("dashboard.includes.svg1")
					</div>
				</div>
				<!-- /members online -->

			</div>

			<div class="col-lg-4">

				<!-- Members online -->
				<div class="card bg-pink-400">
					<div class="card-body">
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ count($stats['customers']) }}</h3>
							<div class="list-icons ml-auto">
								<a class="list-icons-item" data-action="reload"></a>
							</div>
						</div>

						<div>
							<i style="font-size: 30px; padding-left: 4px; padding-right: 5px;" class="fas fa-user"></i> Customers Available
						</div>
					</div>

					<div class="container-fluid">
						<div id="server-load"></div>
					</div>
				</div>
				<!-- /members online -->

			</div>

			<div class="col-lg-4">

				<!-- Members online -->
				<div class="card bg-blue-400">
					<div class="card-body">
						<div class="d-flex">
							<h3 class="font-weight-semibold mb-0">{{ count($stats['drivers']) }}</h3>
							<div class="list-icons ml-auto">
								<a class="list-icons-item" data-action="reload"></a>
							</div>
						</div>

						<div>
							<i style="font-size: 30px; padding-left: 4px; padding-right: 5px;" class="fas fa-truck-moving"></i> Associates Available
						</div>
					</div>

					<div class="container-fluid">
						@include("dashboard.includes.svg3")
					</div>
				</div>
				<!-- /members online -->

			</div>
		</div>
		<!-- /quick stats boxes -->

		<!-- Columns timeline -->
		<div class="card card-flat">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Orders Price Stats</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<div class="chart-container">
					<div class="chart has-fixed-height" id="columns_timeline"></div>
				</div>
			</div>
		</div>
		<!-- /columns timeline -->

		<div class="row">
			<!-- Individual column searching (selects) -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Dispatched Orders Table</h5>
					<div class="header-elements">
						<div class="list-icons">
							<a class="list-icons-item" data-action="collapse"></a>
							<a class="list-icons-item" data-action="reload"></a>
							<a class="list-icons-item" data-action="remove"></a>
						</div>
					</div>
				</div>

				<div class="card-body">
					<table class="table table-responsive datatable-column-search-selects">
						<thead>
							<tr>
								<th>#Dispatch Id</th>
								<th>To</th>
								<th>From</th>
								<th>Customer Name</th>
								<th>Driver Name</th>
								<th>Driver Phone</th>
								<th>Truck Plate Number</th>
								<th>Package</th>
								<th>Amount</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody id="table">
							@if($data)
							@foreach($data as $dispatch)
							<tr>
								<td>
									<span class="badge badge-success">{{ $dispatch->id }}</span>
								</td>

								<td>
									<label>{{$dispatch->to}}</label>   
								</td>
								<td>
									{{$dispatch->from}}
								</td>
								<td>
									{{ $dispatch->customerName }}
								</td>
								<td id="package">
									{{$dispatch->DriverName}}
								</td>
								<td>
									{{$dispatch->DriverPhone}}
								</td>
								<td>
									{{$dispatch->plateNumber}}
								</td>
								<td>
									{{$dispatch->package}}
								</td>
								<td>
									{{$dispatch->amount}}
								</td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" onclick="deleteDispatch({{ $dispatch->id }})"><i class="fas fa-trash"></i> Delete </a>
											</div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
							@else
							<tr style="text-align: center;">

							</tr>
							@endif                 
						</tbody>
						<tfoot>
							<tr>
								<th>#Dispatch Id</th>
								<th>To</th>
								<th>From</th>
								<th>Customer Name</th>
								<th>Driver Name</th>
								<th>Driver Phone</th>
								<th>Truck Plate Number</th>
								<th>Package</th>
								<th>Amount</th>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
</div>

<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
			<i class="icon-unfold mr-2"></i>
			Footer
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-footer">
		<span class="navbar-text">
			&copy; 2020<a href="#">Volant Ltd</a> by <a href="https://volantltd.com" target="_blank">Volant Ltd</a>
		</span>
	</div>
</div>
<!-- /footer -->
<!-- /main content -->
</div>

<!-- Core JS files -->
<script src="{{ url('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->
<!-- Theme JS files -->
<script type="text/javascript" src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/effects.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/touch.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/sliders/slider_pips.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{ url('global_assets/js/demo_pages/datatables_api.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/media/fancybox.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/trees/fancytree_all.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/ui/prism.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/pickers/color/spectrum.js') }}"></script>


<script type="text/javascript" src="{{url('assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>

@include("dashboard.includes.charts")

<script src="{{ url('global_assets/js/plugins/ui/perfect_scrollbar.min.js') }}"></script>
<script src="{{ url('assets/js/app.js') }}"></script>
<script src="{{ url('global_assets/js/demo_pages/sidebar_components.js') }}"></script>
<script src="{{ url('global_assets/js/demo_pages/dashboard.js') }}"></script>
</body>
</html>
