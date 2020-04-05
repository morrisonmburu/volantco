@extends("dashboard.includes.main")

@section("content")

	<!-- Main content -->

	<!-- /page header -->
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
	<br>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!-- Form controls -->
			<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="ekiAi16e04">
				<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="ekiAi16e04" data-index="0">
					<div class="panel-heading ui-sortable-handle">
						<div class="btn-group"> 
							<a style="background-color:#26a69a; border-color: #26a69a" class="btn btn-primary" href="/orders/{{ $data->id }}"> <i class="fa fa-plus"></i> View Order</a>  
						</div>
						<div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title">Edit title</span></a></li><li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-move"></i><span class="control-title">Unpin</span></a></li><li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title">Reload</span></a></li><li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a></li><li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-fullscreen"></i><span class="control-title">Fullscreen</span></a></li><li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title">Close</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div></div></div>
						<div class="panel-body">

							{!! Form::open(['action'=> 'dispatchController@store', 'method'=>'POST'], ['class'=>'col-sm-12']) !!}

							<div class="row">
								<div class="col-lg-6">
									<table width="100%" border="0" align="center" cellspacing="0">

										<tbody>
											
													<tr>
														<td bgcolor="">
															<div class="col-sm-10 form-group">
																<label>Dispatch Number
																	<font color="red">*</font>
																</label>

																{{ Form::text('dispatchno', old('dispatchno'), [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter Dispatch Number"]) }}
																<input type="hidden" name="orderNo" value="{{ $id }}" />
															</div>
														</td>

														<td>
															<div class="col-sm-10 form-group">
																<label>Customer Name
																	<font color="red">*</font>
																</label>
																<div class="input-group">
																		<span class="input-group-addon"><i class="icon-user"></i></span>
																{{ Form::text('customerName', $volantuser->name, [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter Customer Name", 'readonly']) }}
																</div>
															</div>
														</td> 
													</tr>

													<tr>
															<td bgcolor=""><div class="col-sm-10 form-group">
																<label> From </label>
																<div class="input-group">
																		<span class="input-group-addon"><i class="icon-location4"></i></span>
																{{ Form::text('from', $data->from, ['class' => "form-control", 'placeholder' => "From", 'id' => 'from', 'readonly']) }}
																</div>
															</div>
														</td>

														<td bgcolor="">
															<div class="col-sm-10 form-group">
																<label> To </label>
																<div class="input-group">
																		<span class="input-group-addon"><i class="icon-location4"></i></span>
																{{ Form::text('to', $data->to, ['class' => "form-control", 'placeholder' => "To", 'id' => 'to', 'readonly']) }}
																</div>
															</div>
														</td>
													</tr>

													<tr>
														<td bgcolor=""><div class="col-sm-6 form-group">
															<label>Courier <font color="red">*</font></label>

															<select name="courierName" id="courierName" class="form-control" placeholder="Select">
																@foreach($driver as $courier)
																<option></option>
																<option value="{{$courier->id}}">{{$courier->firstName}} {{ $courier->lastName }}
																</option>
																@endforeach

															</select> 
														</div> <div> <label></label><br>
															<a class="btn btn-primary" style="margin-top: 5px;" href="/courier/create"> <i class="fa fa-fw fa-plus-circle"></i>Quick Add</a></div></td>


															<td><div class="col-sm-6 form-group">
																<label>Truck <font color="red">*</font></label>
																<select name="truckNo" id="truckNo" class="form-control" placeholder="Select">
																	@foreach($trucks as $truck)
																	<option></option>
																	<option value="{{$truck->id}}">{{$truck->ownerShipType}}
																	</option>
																	@endforeach

																</select> </div> <div> <label></label><br>
																	<a class="btn btn-primary" style="margin-top: 5px;" href="/truck/create"> <i class="fa fa-fw fa-plus-circle"></i>Quick Add</a></div>
																</td> 
															</tr>

															<tr>
																<td>
																<div class="col-sm-10 form-group">
																	<label>Pick Up Date:
																		<font color="red">*</font>
																	</label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-calendar22"></i></span>
																		{{ Form::text('pickup', old('pickup'), [ 'required'=>"", 'class' => "form-control daterange-single"]) }}
																	</div>
																</div>
															</td>
															<td>
																<div class="col-sm-10 form-group">
																	<label>Charge Amount:
																		<font color="red">*</font>
																	</label>
																	<div class="input-group">
																		<span class="input-group-addon"><i class="icon-cash"></i></span>
																		{{ Form::text('amount', $data->price, [ 'required'=>"", 'class' => "form-control", 'readonly']) }}
																	</div>
																</div>
															</td>
															</tr>

													<tr>
														<td colspan="2"> 
															<div class="col-sm-10 reset-button">
																{{ Form::reset('Clear form', ['class'=>'btn btn-warning form-button', 'style'=>'background-color: #26a69a, border-color:#26a69a']) }}

																{{ Form::submit('Save', ['class'=>'btn btn-success','style'=>'background-color: #26a69a, border-color:#26a69a'])}}


															</div>
														</td>   
													</tr>
										</tbody>
									</table>
									</div>
									<div class="col-lg-6">
											<div id="googleMap" style="width:450px; height: 500px;"></div>
									</div>
								</div>
							{!! Form::close() !!}

						</div>
					</div>
				</div>


			</div>


		</section> <!-- /.content -->


	</div>
<!-- /content area -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
	<script type="text/javascript" src="{{url('js/dispatch.js')}}"></script>

	<script type="text/javascript" src="{{url('https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=dispatch')}}"></script>

</body>
</html>


@endsection