<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" type="image/gif/jpg" href="/images/logo.jpg">
	<title>Volant Co | Dashboard</title>

	<!-- Global stylesheets -->
	<link href="{{url('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<link href="{{url('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	{{-- <link href="/assets/assets/css/material-bootstrap-wizard.css" rel="stylesheet" /> --}}
	<link href="{{url('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="{{url('assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/core/libraries/jquery.min.js')}}"></script>
	{{-- <script src="/assets/assets/js/jquery.bootstrap.js" type="text/javascript"></script> --}}


	<script type="text/javascript" src="{{url('assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->
	<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{url('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/forms/selects/select2.min.js')}}"></script>

	<script type="text/javascript" src="{{url('assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/pickers/daterangepicker.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/pickers/anytime.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/plugins/pickers/pickadate/legacy.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js"></script>
	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="/assets/assets/js/form_validate.js"></script>

	<script type="text/javascript" src="{{url('assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/pages/picker_date.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/pages/datatables_basic.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/js/pages/datatables_advanced.js')}}"></script>

	<script type="text/javascript" src="{{url('assets/js/pages/dashboard.js')}}"></script>
	<!-- /theme JS files -->

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<style>
	#selectable .ui-selecting { background: #C0392B; }
	#selectable .ui-selected { background: #C0392B; color: white; }
	#selectable li:hover{
		cursor: pointer;
	}
	</style>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	<script>
	  $( function() {
	    $( "#selectable" ).selectable({
	      stop: function() {
	        var result = $( "#select-result" ).empty();
	        $( ".ui-selected", this ).each(function() {
	          var id = $(".ui-selected #order_id").text()

				jQuery.ajax({
					url:'{{ route('getOrder') }}',
					method:"POST",
					data:{id: id, _token: '{{csrf_token()}}'},
					dataType: 'json',
					success:function(result)
					{

						$("#name").val(result.orders[1].recipient_name)
						$("#from").val(result.orders[1].origin[0])
						$("#amount").val(result.orders[1].total)
						$("#package").val(result.orders[1].name)
						$("#time").val(result.orders[1].pickup_datetime)
						$("#stopovers").val(JSON.stringify(result.locations));
						function changeTextProgrammatically(value) {
					      $("#to").val(value);
					      $("#to").trigger('change'); // Triggers the change event
					  }

					  changeTextProgrammatically(result.orders[1].destination);
					  // console.log(result.orders);
					},
					error : function(){alert("Something Went Wrong.");},
				});
	        });
	      }
	    });
	  } );
	  </script>

</head>
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
<body>
