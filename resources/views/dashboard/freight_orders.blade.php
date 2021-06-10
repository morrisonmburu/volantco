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
		
		<div class="col-sm-12 lobipanel-parent-sortable ui-sortable" data-lobipanel-child-inner-id="yy9ycBRabT">
			<div class="panel panel-bd lobidrag lobipanel lobipanel-sortable" data-inner-id="yy9ycBRabT" data-index="0">
				<div class="panel-heading ui-sortable-handle">
					<div class="btn-group"> 
						{{-- <a class="btn btn-success" href="/truck/create"> <i class="fa fa-plus"></i> Add Truck</a>  --}}
					</div>
					<div class="pull-right"><ul class="icons-list"><li><a title="Edit Title" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-pencil"></i><span class="control-title"><i class="fa fa-pencil" aria-hidden="true"></i></span></a></li><li><a title="Reload" data-action="reload" data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-reload"></i><span class="control-title"></span></a></li><li><a title="Minimize" data-action="collapse" data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-minus"></i><span class="control-title"></span></a></li><li><a title="Close" data-action="close" data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon ti-close"></i><span class="control-title"></span></a></li></ul></div></div>
					<div class="tabbable">
						<ul class="nav nav-tabs nav-tabs-highlight nav-justified">
							<li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab">In Transit</a></li>
							<li><a href="#highlighted-justified-tab2" data-toggle="tab">Complete</a></li>
							<li><a href="#highlighted-justified-tab3" data-toggle="tab">Cancelled</a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active" id="highlighted-justified-tab1">
								<div class="panel-body">
									<div class="row">
										<div class="panel-header">
											<div class="col-sm-4 pull-right">
												<div class="dataTables_length">

													<a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
													<a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
													<a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>

												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label>Filter Package:</label>
													<select name="paymentmethodparent" id="select" class="selectpicker" data-live-search="true">
													<option data-tokens="" value="">Select a Package</option>
													<option data-tokens="3 Tonn Truck" value="rocketchooser">3 Tonn Truck</option>
													<option data-tokens="5 Tonn Truck" value="rocketchooser">5 Tonn Truck</option>
													<option data-tokens="10 Tonn Truck" value="rocketchooser">10 Tonn Truck</option>
													<option data-tokens="16 Tonn Truck" value="rocketchooser">16 Tonn Truck</option>
													<option data-tokens="20 Tonn Truck" value="rocketchooser">20 Tonn Truck</option>
													<option data-tokens="25 Tonn Truck" value="rocketchooser">25 Tonn Truck</option>
												</select>
												</div>
												
											</div>
										</div>

									</div>
									<div class="table-responsive">
										<table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
											<thead>
												<tr>
													<th>To</th>
													<th>From</th>
													<th>Price</th>
													<th>Package</th>
													<th>Time Of Delivery</th>
													<th style="padding: 44px;">Action</th>
												</tr>
											</thead>
											<tbody>
												@if($data)
												@foreach($data as $order)
												@if($order->mark == 0 && $order->cancel == 0)
												<tr>
													<td>
														<label>{{$order->to}}</label>   
													</td>
													<td>
														{{$order->from}}
													</td>
													<td>
														{{ $order->price }}
													</td>
													<td>
														{{$order->package}}
													</td>
													<td>
														{{$order->time}}
													</td>
													<td>
														<div class="row">

															{!! Form::open(['action'=> ['FreightController@destroy', $order->id], 'method'=>'POST']) !!}
															<button href="/freight_orders/{{$order->id}}/destroy" class="btn btn-danger btn-xs pull-right" data-toggle="tooltip" data-placement="right" title="Delete">
																<i class="fas fa-trash"></i>
															</button>
															{{Form::hidden('_method', 'DELETE')}}

															{!! Form::close() !!}


															<a href="/freight_orders/{{$order->id}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>

														</div>
													</td>
												</tr>
												@endif
												@endforeach
												@else
												<tr style="text-align: center;">

												</tr>
												@endif                 
											</tbody>
										</table>
									</div>

                {{-- <div class="page-nation text-right">
                    <ul class="pagination pagination-large">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="http://testlayout.net/admin/view_truck.php#">2</a></li>
                        <li class="disabled"><span>...</span></li><li>
                        </li><li><a rel="next" href="http://testlayout.net/admin/view_truck.php#">Next</a></li>
                    </ul>
                </div> --}}
            </div>
							</div>

							<div class="tab-pane" id="highlighted-justified-tab2">
								<div class="panel-body">
									<div class="row">
										<div class="panel-header">
											<div class="col-sm-4 pull-right">
												<div class="dataTables_length">

													<a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
													<a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
													<a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>

												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label>Filter Package:</label>
													<select name="paymentmethodparent" id="select" class="selectpicker" data-live-search="true">
													<option data-tokens="" value="">Select a Package</option>
													<option data-tokens="3 Tonn Truck" value="rocketchooser">3 Tonn Truck</option>
													<option data-tokens="5 Tonn Truck" value="rocketchooser">5 Tonn Truck</option>
													<option data-tokens="10 Tonn Truck" value="rocketchooser">10 Tonn Truck</option>
													<option data-tokens="16 Tonn Truck" value="rocketchooser">16 Tonn Truck</option>
													<option data-tokens="20 Tonn Truck" value="rocketchooser">20 Tonn Truck</option>
													<option data-tokens="25 Tonn Truck" value="rocketchooser">25 Tonn Truck</option>
												</select>
												</div>
												
											</div>
										</div>

									</div>
									<div class="table-responsive">
										<table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
											<thead>
												<tr>
													<th>To</th>
													<th>From</th>
													<th>Price</th>
													<th>Package</th>
													<th>Time Of Delivery</th>
													<th>Istructions</th>
													<th style="padding: 44px;">Action</th>
												</tr>
											</thead>
											<tbody>
												@if($data)
												@foreach($data as $order)
												@if($order->mark == 1 && $order->cancel == 0)
												<tr>
													<td>
														<label>{{$order->to}}</label>   
													</td>
													<td>
														{{$order->from}}
													</td>
													<td>
														{{ $order->price }}
													</td>
													<td>
														{{$order->package}}
													</td>
													<td>
														{{$order->time}}
													</td>
													<td>
														{{$order->instructions}}
													</td>
													<td>
														<div class="row">

															{!! Form::open(['action'=> ['FreightController@destroy', $order->id], 'method'=>'POST']) !!}
															<button href="/freight_orders/{{$order->id}}/destroy" class="btn btn-danger btn-xs pull-right" data-toggle="tooltip" data-placement="right" title="Delete">
																<i class="fa fa-trash-o" aria-hidden="true"></i>
															</button>
															{{Form::hidden('_method', 'DELETE')}}

															{!! Form::close() !!}


															<a href="/freight_orders/{{$order->id}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>

															<a href="/freight_orders/{{$order->id}}/dispatch" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Dispatch"><i class="fa fa-truck" aria-hidden="true"></i></a>
														</div>
													</td>
												</tr>
												@endif
												@endforeach
												@else
												<tr style="text-align: center;">

												</tr>
												@endif                 
											</tbody>
										</table>
									</div>

                {{-- <div class="page-nation text-right">
                    <ul class="pagination pagination-large">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="http://testlayout.net/admin/view_truck.php#">2</a></li>
                        <li class="disabled"><span>...</span></li><li>
                        </li><li><a rel="next" href="http://testlayout.net/admin/view_truck.php#">Next</a></li>
                    </ul>
                  </div> --}}
                </div>
							</div>

							<div class="tab-pane" id="highlighted-justified-tab3">
								<div class="panel-body">
									<div class="row">
										<div class="panel-header">
											<div class="col-sm-4 pull-right">
												<div class="dataTables_length">

													<a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
													<a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
													<a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>

												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-4">
												<div class="form-group">
													<label>Filter Package:</label>
													<select name="paymentmethodparent" id="select" class="selectpicker" data-live-search="true">
													<option data-tokens="" value="">Select a Package</option>
													<option data-tokens="3 Tonn Truck" value="rocketchooser">3 Tonn Truck</option>
													<option data-tokens="5 Tonn Truck" value="rocketchooser">5 Tonn Truck</option>
													<option data-tokens="10 Tonn Truck" value="rocketchooser">10 Tonn Truck</option>
													<option data-tokens="16 Tonn Truck" value="rocketchooser">16 Tonn Truck</option>
													<option data-tokens="20 Tonn Truck" value="rocketchooser">20 Tonn Truck</option>
													<option data-tokens="25 Tonn Truck" value="rocketchooser">25 Tonn Truck</option>
												</select>
												</div>
												
											</div>
										</div>

									</div>
									<div class="table-responsive">
										<table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
											<thead>
												<tr>
													<th>To</th>
													<th>From</th>
													<th>Price</th>
													<th>Package</th>
													<th>Time Of Delivery</th>
													<th>Istructions</th>
													<th style="padding: 44px;">Action</th>
												</tr>
											</thead>
											<tbody>
												@if($data)
												@foreach($data as $order)
												@if($order->mark == 0 && $order->cancel == 1)
												<tr>
													<td>
														<label>{{$order->to}}</label>   
													</td>
													<td>
														{{$order->from}}
													</td>
													<td>
														{{ $order->price }}
													</td>
													<td>
														{{$order->package}}
													</td>
													<td>
														{{$order->time}}
													</td>
													<td>
														{{$order->instructions}}
													</td>
													<td>
														<div class="row">

															{!! Form::open(['action'=> ['FreightController@destroy', $order->id], 'method'=>'POST']) !!}
															<button href="/freight_orders/{{$order->id}}/destroy" class="btn btn-danger btn-xs pull-right" data-toggle="tooltip" data-placement="right" title="Delete">
																<i class="fa fa-trash-o" aria-hidden="true"></i>
															</button>
															{{Form::hidden('_method', 'DELETE')}}

															{!! Form::close() !!}


															<a href="/freight_orders/{{$order->id}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="View"><i class="fa fa-eye" aria-hidden="true"></i></a>

															<a href="/freight_orders/{{$order->id}}/dispatch" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Dispatch"><i class="fa fa-truck" aria-hidden="true"></i></a>
														</div>
													</td>
												</tr>
												@endif
												@endforeach
												@else
												<tr style="text-align: center;">

												</tr>
												@endif                 
											</tbody>
										</table>
									</div>

                {{-- <div class="page-nation text-right">
                    <ul class="pagination pagination-large">
                        <li class="disabled"><span>«</span></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="http://testlayout.net/admin/view_truck.php#">2</a></li>
                        <li class="disabled"><span>...</span></li><li>
                        </li><li><a rel="next" href="http://testlayout.net/admin/view_truck.php#">Next</a></li>
                    </ul>
                  </div> --}}
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
    <!-- /main content -->

  </div>
  <!-- /page container -->

</body>
</html>

<script type="text/javascript">

    var $rows = $('#table tr');
    $("#select").change(function () {
       var selectedText = $(this).find("option:selected").text();
       $rows.show().filter(function() {
           var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
           return !~text.indexOf(selectedText.toLowerCase());
       }).hide();
   });

</script>

@endsection