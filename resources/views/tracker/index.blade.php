@extends("tracker.includes.main")

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
		padding-right: 0;
		float: left;
		height: 100%;
		background: #F5F5F5;
		overflow-y: scroll;
		margin-bottom: 25px;
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
		/*
	 * Card definitions
	 */

	.cards {
	  display: flex;
	  flex-direction: column;
	  transition-duration: 1s;
	  position: absolute;
	  transform: translateZ(0px);
	  z-index: 10;
	  padding-left: 58vh;
	  padding-top: 9vh;

	}
	.card {
	  width: 500px;
	  background-color: #ffffff;
	  box-shadow: 0px 5px 10px #888888;
	  /*margin-top: 72px;
	  margin-left: 72px;*/
	}

.side {
  display: flex;
  flex-direction: column;
}

.header {
  height: 104px;
  position: relative;
}

.bus_logo {
  width: 64px;
  height: 64px;
  position: absolute;
  top: 24px;
  left: 16px;
}

.direction {
  font-size: 16px;
  position: relative;
  left: 96px;
  top: 19px;
}

.dark .direction {
  color: rgba(255, 255, 255, 0.7);
}

.light .direction {
  color: rgba(0, 0, 0, 0.5);
}

.headsign {
  font-size: 28px;
  font-weight: 500;
  position: absolute;
  left: 96px;
  top: 42px;
}

.dark .headsign {
  color: rgba(255, 255, 255, 0.97);
}

.light .headsign {
  color: rgba(0, 0, 0, 0.9);
}

.leaving-in-label {
  font-size: 16px;
  position: absolute;
  left: 384px;
  top: 19px;
}

.dark .leaving-in-label {
  color: rgba(255, 255, 255, 0.7);
}

.light .leaving-in-label {
  color: rgba(0, 0, 0, 0.5);
}

.leaving-in {
  font-size: 28px;
  font-weight: 500;
  position: absolute;
  left: 384px;
  top: 42px;
}

.dark .leaving-in {
  color: rgba(255, 255, 255, 0.97);
}

.light .leaving-in {
  color: rgba(0, 0, 0, 0.9);
}

.body .next-in-label {
  font-size: 16px;
  position: relative;
  left: 5px;
  bottom: 0;
  color: rgba(0, 0, 0, 0.5);
}

.body .next-in {
  font-size: 28px;
  font-weight: 400;
  position: relative;
  left: 0;
  bottom: 0;
  color: rgba(0, 0, 0, 0.6);
}

.stop-times {
  width: 80px;
  margin-right: 16px;
  margin-top: 24px;
  margin-bottom: 24px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-end;
}

.stop-time {
  font-size: 18px;
  color: rgba(0, 0, 0, 0.6);
}

.stop-guide {
  width: 16px;
  margin-top: 24px;
  margin-bottom: 24px;
}

.stop-names {
  margin-left: 16px;
  margin-top: 24px;
  margin-bottom: 24px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-start;
}

.stop-name {
  font-size: 18px;
  color: rgba(0, 0, 0, 0.9);
}
</style>


<div class="row" style="position: fixed;" >
	<div class="col-md-4 space">
		<!-- My messages -->
		<div class="panel panel-flat" style="height: 100vh;">

			<!-- Panel heading -->
			<div class="panel-heading">
				<h6 class="panel-title">Order Stats</h6>

				<div class="heading-elements">
					<a href="/orders" class="heading-text">See all &rarr;</a>
				</div>
			</div>
			<!-- /panel heading -->


			<!-- Area chart -->
			<div id="messages-stats"></div>
			<!-- /area chart -->

			<!-- Tabs content -->
			<div class="tab-content panel-body scrollbar" id="style-3">
				<div class="tab-pane active fade in" style="margin: 0; padding: 0;" id="unassigned">
					<ul class="media-list">
						<div id="selectable" class="ui-selectable">
							@foreach($data as $order)
							@if($order->status == 3)
							<div class="panel panel-flat">
								<li class="media">
								<div class="media-left">
									<span id="order_id" class="badge bg-danger-400 media-badge">{{ $order->order_id }}</span>
								</div>

								<div class="media-body">
									<a href="#">
										To: {{ $order->origin[0] }}
										<?php $time = date('h:i:s', strtotime($order->pickup_datetime)) ?>
										<span class="media-annotation pull-right">{{ $time }}</span>
									</a>

									<span class="display-block text-muted">{{ $order->recipient_name }}</span>
								</div>
							</li>
							</div>
							@endif
							@endforeach
						</div>
					</ul>
				</div>
			</div>
			<!-- /tabs content -->

		</div>
		<!-- /my messages -->
	</div>

	<input type="hidden" id="from" name="from">
	<input type="hidden" id="to" name="to">
	<input type="hidden" name="stopovers" id="stopovers">
	<input type="hidden" name="amount" id="amount">
	<input type="hidden" name="package" id="package">
	<input type="hidden" name="time" id="time">
	<input type="hidden" name="name" id="name">

	<div class="col-md-8 space" id="maps">
		<div class="cards" id="track">
			<div 
	      class="card dark"
	      style="height: 200px"
	      >
	      <div class="header" style="background-color: #C0392B">
	        <div class="bus_logo">
	          <svg width="64px" height="64px" viewBox="0 0 64 64">
	            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	              <circle fill="#FFFFFF" cx="32" cy="32" r="32"></circle>
	              <path
	                d="M20.7894737,31.0526316 L43.5263158,31.0526316 L43.5263158,21.5789474 L20.7894737,21.5789474 L20.7894737,31.0526316 Z M40.6842105,42.4210526 C39.1115789,42.4210526 37.8421053,41.1515789 37.8421053,39.5789474 C37.8421053,38.0063158 39.1115789,36.7368421 40.6842105,36.7368421 C42.2568421,36.7368421 43.5263158,38.0063158 43.5263158,39.5789474 C43.5263158,41.1515789 42.2568421,42.4210526 40.6842105,42.4210526 L40.6842105,42.4210526 Z M23.6315789,42.4210526 C22.0589474,42.4210526 20.7894737,41.1515789 20.7894737,39.5789474 C20.7894737,38.0063158 22.0589474,36.7368421 23.6315789,36.7368421 C25.2042105,36.7368421 26.4736842,38.0063158 26.4736842,39.5789474 C26.4736842,41.1515789 25.2042105,42.4210526 23.6315789,42.4210526 L23.6315789,42.4210526 Z M17,40.5263158 C17,42.2025263 17.7389474,43.6905263 18.8947368,44.7326316 L18.8947368,48.1052632 C18.8947368,49.1473684 19.7473684,50 20.7894737,50 L22.6842105,50 C23.7364211,50 24.5789474,49.1473684 24.5789474,48.1052632 L24.5789474,46.2105263 L39.7368421,46.2105263 L39.7368421,48.1052632 C39.7368421,49.1473684 40.5793684,50 41.6315789,50 L43.5263158,50 C44.5684211,50 45.4210526,49.1473684 45.4210526,48.1052632 L45.4210526,44.7326316 C46.5768421,43.6905263 47.3157895,42.2025263 47.3157895,40.5263158 L47.3157895,21.5789474 C47.3157895,14.9473684 40.5326316,14 32.1578947,14 C23.7831579,14 17,14.9473684 17,21.5789474 L17,40.5263158 Z"
	                fill="#C0392B"></path>
	            </g>
	          </svg>
	        </div>
	        <div class="direction">To: <span class="label-success label label-success" id="showTo"></span></div>
	        <div class="direction">From: <span class="label-warning label label-warning" id="showFrom"></span></div>
	        <div class="direction">Due By: <span class="label-info label label-info">
	        	<span id="days"></span>
	        	<span id="hours"></span>
	        	<span id="mins"></span>
	        	<span id="secs"></span>
	        	<span>Left</span>
	        </span></div>
	      </div>
	      <div class="body">
	    
	          <div class="next-in-label">Amount Due: Ksh <span id="showAmount"></span></div>
	          <div class="next-in-label">Package: <span id="showPackage"></span></div>
	          <div class="next-in-label">Ordered By: <span id="showName"></span></div>
	       
	      </div>
	    </div>
		</div>
		<div id="googleMap" style="width:100%; height: 94vh;"></div>
	</div>
</div>

</div>

<script type="text/javascript" src="{{url('js/tracker.js')}}"></script>

<script type="text/javascript" src="{{url('https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=tracker')}}"></script>

<script>
	$(function() {
		$( "#selectable" ).selectable();
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

</script>

</body>
</html>

@endsection