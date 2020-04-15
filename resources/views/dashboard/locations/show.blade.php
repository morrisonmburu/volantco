@extends("dashboard.includes.main")

@section("content")

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
<section class="content">
	<div class="row">
		<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="cpa90TSeTV">
			<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="cpa90TSeTV" data-index="0">
				<div class="panel-heading ui-sortable-handle">
					<div class="btn-group"> 
						<a style="background-color:#26a69a; border-color: #26a69a"  class="btn btn-success" href="\locations\"> <i class="fa fa-plus"></i> Go back</a> 
					</div>
					<div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title">Edit title</span></a></li><li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-move"></i><span class="control-title">Unpin</span></a></li><li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title">Reload</span></a></li><li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title">Minimize</span></a></li><li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-fullscreen"></i><span class="control-title">Fullscreen</span></a></li><li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title">Close</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div></div></div>
					<div class="panel-body">
						<div class="row">
							<div class="panel-header">
								<div class="col-sm-4 pull-right">
									<div class="dataTables_length">

										<a href="#" class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>

										<a href="#" class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>

										<a href="#" class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>

									</div>
								</div>
							</div>

						</div>

						<div class="table-responsive">


							<div class="panel panel-info">
								<div class="panel-heading" style="background-color:#26a69a;">
									
								</div>
								<div class="panel-body">
									<div class="row">

										<div class=" col-md-9 col-lg-9 "> 
											<table class="table table-user-information" style="align-items: center;">
												<tbody>
													<tr>
														<td>ID</td>
														<td>{{$data->id}}</td>
													</tr>
													<tr>
														<td>Name</td>
														<td>{{$data->name}}</td>
													</tr>

													<tr>
														<tr>
															<td>Address</td>
															<td>{{$data->address}}</td>
														</tr>
														<tr>
															<td>Longitude</td>
															<td>{{$data->longitude}}</td>
														</tr>
														<tr>
															<td>latitude</td>
															<td>{{$data->latitude}}</td>
														</tr>

													</tr>

												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="panel-footer">
									<!--                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>-->
									<span class="pull-right">
										<a title="Edit" href="/locations/{{$data->id}}/edit" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
										<a title="Delete" href="/locations/{{$data->id}}/destroy" data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-remove"></i></a>&nbsp;
									</span>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /.content -->

</div>
<!-- /content area -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>


@endsection