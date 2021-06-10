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
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
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

<!-- Main content -->
<br>
<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Account Types Table</h5>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
					<a class="list-icons-item" data-action="reload"></a>
					<a class="list-icons-item" data-action="remove"></a>
				</div>
			</div>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<table class="table table-responsive datatable-column-search-selects">
						<thead>
							<tr>
								<th>#Category Id</th>
								<th>Category Name</th>
							</tr>
						</thead>
						<tbody id="table">
							@if($data)
							@foreach($data as $cat)
							<tr>
								<td>
									<span class="badge badge-success">{{ $cat->id }}</span>
								</td>
								<td>
									<span class="badge badge-warning">
										{{ $cat->name }}
									</span>  
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforeach
							@else
							<tr style="text-align: center;">

							</tr>
							@endif                 
						</tbody>
						<tfoot>
							<th>#Category Id</th>
							<th>Category Name</th>
						</tfoot>
					</table>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div> <!-- /.content -->

@include("dashboard.includes.footer")
