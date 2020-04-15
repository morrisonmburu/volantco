@extends("dashboard.includes.main")

@section("content")

<style type="text/css">

#infowindow-content .title {
	font-weight: bold;
}

#infowindow-content {
	display: inline;
	
}
</style>

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
							<a style="background-color:#26a69a; border-color: #26a69a" class="btn btn-primary" href="/locations/ }}"> <i class="fa fa-plus"></i> View Locations</a>  
						</div>
						<div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title">Edit title</span></a></li><li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-move"></i><span class="control-title">Unpin</span></a></li><li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title">Reload</span></a></li><li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a></li><li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-fullscreen"></i><span class="control-title">Fullscreen</span></a></li><li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title">Close</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div></div></div>
						<div class="panel-body">

							{!! Form::open(['action'=> ['locationsController@update', $data->id], 'method'=>'PUT'], ['class'=>'col-sm-10']) !!}

							<div class="row">
								<div class="col-lg-6">
									<table width="100%" border="0" align="center" cellspacing="0">

										<tbody>

													<tr>
															<td bgcolor=""><div class="col-sm-10 form-group">
																<label> Location Name </label>
																<div class="input-group">
																		<span class="input-group-addon"><i class="icon-location4"></i></span>
																{{ Form::text('location', $data->name, ['class' => "form-control", 'placeholder' => "Location Name", 'id' => 'location']) }}
																</div>
															</div>
														</td>
													</tr>

													<tr>
														<input type="hidden" name="name" id="name"/>
														<input type="hidden" name="address" id="address" />
														<input type="hidden" name="latitude" id="lat" />
														<input type="hidden" name="longitude" id="long" />
													</tr>

													<tr>
														<td colspan="2"> 
															<div class="col-sm-10 reset-button">
																{{ Form::reset('Clear form', ['class'=>'btn btn-warning form-button', 'style'=>'background-color: #26a69a, border-color:#26a69a']) }}

																{{ Form::submit('Update', ['class'=>'btn btn-success','style'=>'background-color: #26a69a, border-color:#26a69a'])}}


															</div>
														</td>   
													</tr>
										</tbody>
									</table>
									</div>
									<div class="col-lg-6">
											<div id="googleMap" style="width:450px; height: 500px;"></div>

											<div id="infowindow-content">
												<img src="" width="16" height="16" id="place-icon">
												<span id="place-name"  class="title"></span><br>
												<span id="place-address"></span>
											</div>
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
	<script type="text/javascript" src="{{url('js/locations.js')}}"></script>

	<script type="text/javascript" src="{{url('https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyC_WPxndykde_MAUC_5FKnXPp035kJw5nI&callback=locations')}}"></script>

</body>
</html>

@endsection