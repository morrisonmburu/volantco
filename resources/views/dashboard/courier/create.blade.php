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
							<a style="background-color:#26a69a; border-color: #26a69a" class="btn btn-primary" href="/courier/"> <i class="fa fa-plus"></i> View Couriers</a>  
						</div>
						<div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title">Edit title</span></a></li><li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-move"></i><span class="control-title">Unpin</span></a></li><li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title">Reload</span></a></li><li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a></li><li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-fullscreen"></i><span class="control-title">Fullscreen</span></a></li><li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title">Close</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div></div></div>
						<div class="panel-body">

							{!! Form::open(['action'=> 'courierController@store', 'method'=>'POST'], ['class'=>'col-sm-12']) !!}

							<table width="100%" border="0" align="center" cellspacing="0">

								<tbody>
									<tr>
										<td bgcolor="">
											<div class="col-sm-10 form-group">
												<label>First Name
													<font color="red">*</font>
												</label>

												{{ Form::text('firstName', old('firstName'), [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter First Name"]) }}

											</div>
										</td>
										<td bgcolor="">
											<div class="col-sm-10 form-group">
												<label>Last Name
													<font color="red">*</font>
												</label>

												{{ Form::text('lastName', old('lastName'), [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter Last Name"]) }}

											</div>
										</td>
									</tr>

									<tr>
										<td bgcolor="">
											<div class="col-sm-10 form-group">
												<label>City
													<font color="red">*</font>
												</label>

												{{ Form::text('city', old('city'), [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter city"]) }}

											</div>
										</td>

										<td>
											<div class="col-sm-10 form-group">
												<label>County
													<font color="red">*</font>
												</label>

												{{ Form::text('county', old('county'), [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter county"]) }}

											</div>
										</td> 
									</tr>

									<tr>

										<td>
											<div class="col-sm-10 form-group">
												<label>Phone Number</label>
												<div class="input-group">
												<div class="input-group-addon" id="get" >
													<img src="/images/ke.png" style="padding-right: 5px;" >+254</div>
												{{ Form::tel('phoneNo', old('phoneNo'), ['class' => "form-control", 'placeholder' => "Enter Phone no.", "maxlength" => "9", "data-country" => "KE"]) }}
											</div>

											</div>
										</td> 

										<td bgcolor="">
											<div class="col-sm-10 form-group">
												<label>Email</label>

												{{ Form::text('email', old('email'), ['class' => "form-control", 'placeholder' => "Enter Email"]) }}

											</div>
										</td>

									</tr>

									<tr>

										<td>
											<div class="col-sm-10 form-group">
												<label>Default Payment Type
													<font color="red">*</font>
												</label>
												<select value="{{old('paymentType')}}" name="paymentType" required="" class="form-control">
													<option value="Manual Pay">Manual Pay</option>
													<option value="Pay per mile">Pay per mile</option>
													<option value="Contract">Contract</option>
												</select>
											</div>
										</td> 

										<td bgcolor="">
											<div class="col-sm-10 form-group">
												<label>License number</label>

												{{ Form::text('licenseNo', old('licenseNo'), ['class' => "form-control ", 'placeholder' => "Enter license No"]) }}

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

														<input name="licenseExpiryDate" value="{{old('licenseExpiryDate')}}" type="text" class="form-control daterange-single pull-right">

													</div>
												</div>
												

											</td> 

											<td bgcolor="">
												<div class="col-sm-10 form-group">
													<label>License issuing state/jurisdiction
														<font color="red"> </font>
													</label>
													{{ Form::text('licenseIssuingState',  old('licenseIssuingState'), ['class' => "form-control", 'placeholder' => "Enter License Issuing state."]) }}

												</div>
											</td> 

										</tr>

										<tr>
											<td bgcolor="">
												<div class="col-sm-10 form-group">
													<label>Hire Date</label>
													<div class="input-group date">
														<div class="input-group-addon">
															<i class="icon-calendar22"></i>
														</div>

														<input name="hireDate" value="{{old('hireDate')}}" type="text" class="form-control daterange-single pull-right">

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

														<input name="terminationDate" value="{{old('terminationDate')}}" type="text" class="form-control daterange-single pull-right">

													</div>
												</div> 
											</td> 
										</tr>
										<tr>
											<td colspan="2" bgcolor="#009688"> <strong>
												<font color="white">Emergency Contact</font>
											</strong>
										</td> 
									</tr>

									<tr>
										<td>
											<div class="col-sm-10 form-group">
												<label>Contact Name
													<font color="red">*</font>
												</label>

												{{ Form::text('emergencyContactName', old('emergencyContactName'), [ 'required'=>"", 'class' => "form-control", 'placeholder' => "Enter Person Name ."]) }}

											</div>
										</td>

										<td>
											<div class="col-sm-10 form-group">
												<label>Phone<font color="red">*</font></label>
												<div class="input-group">
												<div class="input-group-addon" id="get" >
													<img src="/images/ke.png" style="padding-right: 5px;" >+254</div>
												{{ Form::tel('emergencyPhoneNo', old('emergencyPhoneNo'), [ 'required'=>"",'class' => "form-control", 'placeholder' => "Enter Person No.", "maxlength" => "9", "data-country" => "KE"]) }}
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

</body>
</html>

@endsection