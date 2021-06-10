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
			<h5 class="card-title">Customers Table</h5>
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
						<th>#User Id</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Account Type</th>
						<th>Status</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody id="table">
					@if($data)
					@foreach($data as $customer)
					<tr>
						<td>
							<span class="badge badge-success">{{ $customer->id }}</span>
						</td>
						<td>
							<label>{{$customer->username}}</label>   
						</td>
						<td>
							{{$customer->email}}
						</td>
						<td>
							{{ $customer->phone }}
						</td>
						<td>
							@if($customer->account_type == 1)
							<span class="badge badge-warning">
								Classic
							</span>
							@elseif($customer->account_type == 2)
							<span class="badge badge-warning">
								Business
							</span>
							@else
							<span class="badge badge-warning">
								Corporate
							</span>
							@endif
						</td>
						<td>
							@if($customer->status == 1)
							<span class="badge badge-success">
								Active
							</span>
							@elseif($customer->status == 0)
							<span class="badge badge-danger">
								InActive
							</span>
							@endif
						</td>
						<td class="text-center">
							<div class="list-icons">
								<div class="dropdown">
									<a href="#" class="list-icons-item" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" onclick="activate({{ $customer->id }})"><i class="fas fa-link"></i> Activate </a>
										<a class="dropdown-item" onclick="deleteCustomer({{ $customer->id }})"><i class="fas fa-trash"></i> Delete </a>
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
						<th>#User Id</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Account Type</th>
						<th>Status</th>
						<td></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div> <!-- /.content -->

<script type="text/javascript">
	function activate(id){
    var id = id;

    jQuery.ajax({
      url:'{{ route('customer.activate') }}',
      method:"POST",
      data:{id: id, _token: '{{csrf_token()}}'},
      success:function(result)
      {
        swal('Customer'+result, "has been Activated successfully!", "success").then(function(){ 
          location.reload()
        }
        );
      },
      error : function(){alert("Something Went Wrong.");},
    });
  }
</script>

<script>
  function deleteCustomer(id){
    var id = id;

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this customer!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        jQuery.ajax({
          url:'{{ route('customer.delete') }}',
          method:"POST",
          data:{id: id, _token: '{{csrf_token()}}'},
          success:function(result)
          {
            swal('Customer'+result, "has been deleted!", {
              icon: "success",
            }).then(function(){ 
              location.reload()
            }
            );
          },
          error : function(){alert("Something Went Wrong.");},
        });
      } else {
        swal("Customer is safe!").then(function(){ 
          location.reload()
        }
        );
      }
    });
  }
</script>

@include("dashboard.includes.footer")
