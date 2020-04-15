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
	<!-- Main content --><br>
	<section class="content">
		<div class="row">
			<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="cpa90TSeTV">
				<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="cpa90TSeTV" data-index="0">
					<div class="panel-heading ui-sortable-handle">
						<div class="btn-group"> 
							<a style="background-color:#26a69a; border-color: #26a69a"  class="btn btn-success" href="/locations/create"> <i class="fa fa-plus"></i> Add Location</a> 
						</div>
						<div class="pull-right"><ul class="icons-list"><li><a title="Edit Title" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></li><li><a title="Reload" data-action="reload" data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title"></span></a></li><li><a title="Minimize" data-action="collapse" data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title"></span></a></li><li><a title="Close" data-action="close" data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title"></span></a></li></ul></div></div>
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
								<table style="white-space: nowrap;" class="table datatable-basic text-center datatable-highlight">
									<thead >
										<tr>
											<th>Place ID</th>
											<th>Name</th>
											<th>Address</th>
											<th>Longitude</th>
											<th>Latitude</th>
											<th style="padding: 44px;">Action</th>
										</tr>
									</thead>
									<tbody>
										@if($data)
										@foreach($data as $location)
										<tr>
											<td>
												{{$location->id}}
											</td>
											<td>
												{{ $location->address }}
											</td>
											<td>
												{{ $location->address }}
											</td>
											<td>
												{{$location->longitude}}
											</td>
											<td>
												{{$location->latitude}}
											</td>
											<td>
												<div class="row">
													{!! Form::open(['action'=> ['locationsController@destroy', $location->id], 'method'=>'POST']) !!}
													<button href="/locations/{{$location->id}}/destroy" class="btn btn-danger btn-xs pull-right" data-toggle="tooltip" data-placement="right" title="Delete">
														<i class="fa fa-trash-o" aria-hidden="true"></i>
													</button>
													{{Form::hidden('_method', 'DELETE')}}

													{!! Form::close() !!}

													<a href="/locations/{{$location->id}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>

													<a href="/locations/{{$location->id}}/edit" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>

												</div>
											</td>
											{{-- @endif --}}


										</tr>
										@endforeach
										@else
										<tr style="text-align: center;">

										</tr>
										@endif

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> <!-- /.content -->

		<!-- Basic datatable -->
		
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>


@endsection