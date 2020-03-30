@extends("dashboard.includes.main")

@section("content")

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
		<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="RidyzuSl7W">
			<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="RidyzuSl7W" data-index="0">
				<div class="panel-heading ui-sortable-handle">
					<div class="btn-group"> 
						<a style="background-color:#26a69a; border-color: #26a69a" class="btn btn-primary" href="/courier/"> <i class="fa fa-plus"></i> View Courier</a>  
					</div>
					<div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title">Edit title</span></a></li><li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-move"></i><span class="control-title">Unpin</span></a></li><li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title">Reload</span></a></li><li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a></li><li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-fullscreen"></i><span class="control-title">Fullscreen</span></a></li><li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title">Close</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div></div></div>
					<div class="panel-body">

						{!! Form::open(['action'=> ['courierController@update', $data->id], 'method'=>'POST'], ['class'=>'col-sm-10']) !!}
						<div class="table_responsive">

							<table width="100%" border="0" align="center" cellspacing="0" >

								<tbody>
									<tr>
										<td bgcolor=""><div class="col-sm-10 form-group">
											<label>First Name<font color="red">*</font></label>

											{{ Form::text('firstName', $data->firstName, [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter First Name"]) }}

										</div></td>
										<td bgcolor=""><div class="col-sm-10 form-group">
											<label>Last Name<font color="red">*</font></label>

											{{ Form::text('lastName', $data->lastName, [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter Last Name"]) }}

										</div></td>
									</tr>

									<tr>
										<td bgcolor=""><div class="col-sm-10 form-group">
											<label>City<font color="red">*</font></label>

											{{ Form::text('city', $data->city, [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter city"]) }}

										</div></td>


										<td><div class="col-sm-10 form-group">
											<label>County<font color="red">*</font></label>

											{{ Form::text('county', $data->county, [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter County"]) }}

										</div></td> 
									</tr>


									<tr>

										<td><div class="col-sm-10 form-group">
											<label>Phone Number</label>
											<div class="input-group">
												<div class="input-group-addon" id="get" >
													<img src="/images/ke.png" style="padding-right: 5px;" >+254</div>
												{{ Form::tel('phoneNo', $data->phoneNo, ['class' => "form-control", 'placeholder' => "Enter Phone no.", "maxlength" => "9", "data-country" => "KE"]) }}
											</div>

										</div></td> 

										<td bgcolor=""><div class="col-sm-10 form-group">
											<label>Email</label>

											{{ Form::text('email', $data->email, ['class' => "form-control", 'placeholder' => "Enter Email"]) }}

										</div></td>
									</tr>



									<tr>
										

										<td><div class="col-sm-10 form-group">
											<label>Default Payment Type<font color="red">*</font></label>
											{{Form::select('paymentType', ['Manual Pay'=>'Manual Pay', 'Pay per mile'=>'Pay per mile', 'Contract'=>'Contract'], $data->paymentType, [ 'required'=>"", 'class'=>'form-control', 'placeholder'=>"Default Payment Type"])}}


										</div></td> 

										<td bgcolor=""><div class="col-sm-10 form-group">
											<label>License number</label>
											{{ Form::text('licenseNo', $data->licenseNo, ['class' => "form-control ", 'placeholder' => "Enter license No"]) }}

										</div></td>
									</tr>




									<tr>

										<td>

											<div class="col-sm-10 form-group">
												<label>License Expiration Date
												</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="icon-calendar22"></i>
													</div>

													<input name="licenseExpiryDate" type="text" class="form-control daterange-single pull-right" value="{{$data->licenseExpiryDate}}">

												</div>
											</div>


										</td> 

										<td bgcolor=""><div class="col-sm-10 form-group">
											<label>License issuing state/jurisdiction<font color="red"> </font></label>
											{{ Form::text('licenseIssuingState', $data->licenseIssuingState, ['class' => "form-control", 'placeholder' => "Enter License Issuing state."]) }}

										</div></td>
									</tr>


									<tr>
										<td bgcolor="">

											<div class="col-sm-10 form-group">
												<label>Hire Date</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="icon-calendar22"></i>
													</div>

													<input name="hireDate" type="text" class="form-control daterange-single pull-right" value="{{$data->hireDate}}">

												</div>
											</div>


										</td>


										<td>    

											<div class="col-sm-10 form-group">
												<label>Termination Date</label>
												<div class="input-group date">
													<div class="input-group-addon">
														<i class="icon-calendar22"></i>
													</div>

													<input name="terminationDate" type="text" class="form-control daterange-single pull-right" value="{{$data->terminationDate}}">

												</div>
											</div>


										</td> 
									</tr>
									<input type="text" name="status" value="Active" hidden>
									<tr> <td colspan="2" bgcolor="#009688"> <strong><font color="white">Emergency Contact</font> </strong></td> </tr>


									<tr>
										<td >
											<div class="col-sm-10 form-group">
												<label>Contact Name<font color="red">*</font></label>
												{{ Form::text('emergencyContactName', $data->emergencyContactName, [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter Person Name ."]) }}

											</div>
										</td>
										<td>
											<div class="col-sm-10 form-group">
												<label>Phone<font color="red">*</font></label>

												<div class="input-group">
												<div class="input-group-addon" id="get" >
													<img src="/images/ke.png" style="padding-right: 5px;" >+254</div>
												{{ Form::tel('emergencyPhoneNo', $data->emergencyPhoneNo, [ 'required'=>"",'class' => "form-control", 'placeholder' => "Enter Person No.", "maxlength" => "9", "data-country" => "KE"]) }}
											</div>

											</div>
										</td> 
									</tr>
									<tr>

										{{Form::hidden('_method', 'PUT')}}
										<td colspan="2"> 
											<div class="col-sm-10 reset-button">
												{{ Form::reset('Clear form', ['class'=>'btn btn-warning form-button', 'style'=>'background-color: #26a69a, border-color:#26a69a']) }}

												{{ Form::submit('Save', ['class'=>'btn btn-success','style'=>'background-color: #26a69a, border-color:#26a69a'])}}


											</div>
										</td>


									</tr>
									
								</tbody></table></div>



								{!! Form::close() !!}
							</div>
						</div>
					</div>


				</div>


			</section> <!-- /.content -->

			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>


@endsection