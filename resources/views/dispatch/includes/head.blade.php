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
	<link href="/assets/assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
	<link href="{{url('assets/css/loader.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{url('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="{{url('assets/js/plugins/loaders/pace.min.js')}}"></script>

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 
	  <style>
	  #selectable .ui-selecting { background: #2E86C1; }
	  #selectable .ui-selected { background: #2E86C1; color: white; }
	  #selectable li:hover{
	  	cursor: pointer;
	  }

	  #selectable2 .ui-selecting { background: #2E86C1; }
	  #selectable2 .ui-selected { background: #2E86C1; color: white; }
	  #selectable2 li:hover{
	  	cursor: pointer;
	  }
	  </style>

	  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	  <script type="text/javascript" src="{{url('assets/js/core/libraries/bootstrap.min.js')}}"></script>
		<!-- /core JS files -->
		<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>
		<!-- Theme JS files -->
		<script type="text/javascript" src="{{url('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
		<script type="text/javascript" src="{{url('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
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
		<script type="text/javascript" src="{{url('assets/js/pages/picker_date.js')}}"></script>
			<script type="text/javascript" src="{{url('assets/js/pages/datatables_basic.js')}}"></script>
		<script type="text/javascript" src="{{url('assets/js/pages/datatables_advanced.js')}}"></script>

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
						if(result.orders[1].status == 0){
							var status = 'Unassigned'
							$("#order_status_show").text(status)
						}else if(result.orders[1].status == 1){
							var status = 'Accepted'
							$("#order_status_show").text(status)
						}else if(result.orders[1].status == 2){
							var status = 'Picked Up'
							$("#order_status_show").text(status)
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
						$(".slide").slideToggle("slow");
						function changeTextProgrammatically(value) {
					      $("#to").val(value);
					      $("#to").trigger('change'); // Triggers the change event
					  }

					  changeTextProgrammatically(result.orders[1].destination);
					},
					error : function(){alert("Something Went Wrong.");},
				});
	        });
	      }
	    });

	  } );

	  $( function() {
	  $("#selectable2").selectable({
	    	stop: function() {
	        $( ".ui-selected", this ).each(function() {
	          var id = $(".ui-selected #rider_id").text()

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
						$(".slide2").slideToggle("slow");
					},
					error : function(){alert("Something Went Wrong.");},
				});
	      })
	  	}

	  })
	})
	  </script>

	  	<link rel="stylesheet" href="/assets/intl-tel-input-9.0.0/build/css/intlTelInput.css">
		<style>
		.iti-flag {background-image: url("/assets/intl-tel-input-9.0.0/build/img/flags.png");}
		</style>
		<script src="/assets/jquery.validate.min.js"></script>
		<script src="/assets/intl-tel-input-9.0.0/build/js/intlTelInput.js"></script>
		<script src="/assets/libphonenumber/utils.js"></script>

</head>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
<body>
