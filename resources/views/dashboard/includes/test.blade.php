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
            <div style="margin-left: 1em; margin-right: 1em;">
              <ul class="nav nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
              <li class="active"><a href="#highlighted-justified-tab0" data-toggle="tab">Unassigned</a></li>
              <li><a href="#highlighted-justified-tab1" data-toggle="tab">Accepted</a></li>
              <li><a href="#highlighted-justified-tab2" data-toggle="tab">Picked Up</a></li>
              <li><a href="#highlighted-justified-tab3" data-toggle="tab">In Transit</a></li>
              <li><a href="#highlighted-justified-tab4" data-toggle="tab">Completed</a></li>
              <li><a href="#highlighted-justified-tab5" data-toggle="tab">Completed</a></li>
            </ul>
            </div>

						<div class="tab-content">
							<div class="tab-pane active" id="highlighted-justified-tab0">
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
                           <option data-tokens="Messager" value="rocketchooser">Messager</option>
                           <option data-tokens="Motor Cycle" value="rocketchooser">Motor Cycle</option>
                           <option data-tokens="Express Bike" value="rocketchooser">Express Bike</option>
                           <option data-tokens="Pickup" value="bankchooser">Pickup</option>
                           <option data-tokens="Van" value="bkashchooser">Van</option>
                           <option data-tokens="3-Tonne Truck" value="rocketchooser">3-Tonne Truck</option>
                           <option data-tokens="5-Tonne Truck" value="rocketchooser">5-Tonne Truck</option>
                           <option data-tokens="10-Tonne Truck" value="rocketchooser">10-Tonne Truck</option>
                           <option data-tokens="14-Tonne Truck" value="rocketchooser">14-Tonne Truck</option>
                           <option data-tokens="28-Tonne Truck" value="rocketchooser">28-Tonne Truck</option>
                         </select>
                       </div>

                     </div>
                   </div>
                 </div>
                 <div class="table-responsive">
                  <table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
                   <thead>
                    <tr>
                      <th>#Order Id</th>
                      <th>Category</th>
                      <th>To</th>
                      <th>From</th>
                      <th>Price</th>
                      <th>Distance</th>
                      <th>No. Stops</th>
                      <th>Status</th>
                      <th>Package</th>
                      <th>Time Of Delivery</th>
                      <th>Istructions</th>
                      <th style="padding: 44px;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="table">
                    @if($data)
                    @foreach($data as $order)
                    @if($order->status == 0)
                    <tr>
                      <td>
                        <span class="label-success label label-success">{{ $order->order_id }}</span>
                      </td>
                      <td>
                        <span class="label-warning label label-warning">{{ $order->category }}</span>
                      </td>
                      <td>
                        <label>{{$order->destination}}</label>   
                      </td>
                      <td>
                        {{$order->origin[0]}}
                      </td>
                      <td>
                        Ksh {{ $order->total }}
                      </td>
                      <td>
                        {{ $order->distance }} Km
                      </td>
                      <td>
                        <span class="label-success label label-success">
                          {{ $order->stops_count }}
                        </span>
                      </td>
                      <td>
                        @if($order->status == 0)
                        <span class="label label-warning">
                          Unassigned
                        </span>
                        @elseif($order->status == 1)
                        <span class="label-success label label-success">
                          Accepted
                        </span>
                        @elseif($order->status == 2)
                        <span class="label-success label label-success">
                          Picked Up
                        </span>
                        @elseif($order->status == 3)
                        <span class="label-success label label-success">
                          In Transit
                        </span>
                        @elseif($order->status == 4)
                        <span class="label label-success">
                          Complete
                        </span>
                        @else
                        <span class="label label-danger">
                          Cancelled
                        </span>
                        @endif
                      </td>
                      <td id="package">
                        {{$order->name}}
                      </td>
                      <td>
                        {{$order->pickup_datetime}}
                      </td>
                      <td>
                        {{$order->description}}
                      </td>
                      <td>
                        <div class="row">

                          <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="complete({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Complete</span></a></li><li><a onclick="cancel({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Cancel</span></a></li><li><a onclick="deleteOrder({{ $order->order_id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>

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
            </div>
          </div>

        <div class="tab-pane" id="highlighted-justified-tab1">
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
                                                       <option data-tokens="Bike" value="rocketchooser">Bike</option>
                                                       <option data-tokens="Pickup" value="bankchooser">Pickup</option>
                                                       <option data-tokens="Van" value="bkashchooser">Van</option>
                                                       <option data-tokens="3 Ton Truck" value="rocketchooser">3 Ton Truck</option>
                                                       <option data-tokens="5 Ton Truck" value="rocketchooser">5 Ton Truck</option>
                                                       <option data-tokens="10 Ton Truck" value="rocketchooser">10 Ton Truck</option>
                                                       <option data-tokens="28 Ton Truck" value="rocketchooser">28 Ton Truck</option>
                                                   </select>
                                               </div>
                                               
                                           </div>
                                       </div>
                                   </div>
                                   <div class="table-responsive">
                                      <table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
                                         <thead>
                                            <tr>
                                              <th>#Order Id</th>
                                               <th>Category</th>
                                               <th>To</th>
                                               <th>From</th>
                                               <th>Price</th>
                                               <th>Distance</th>
                                               <th>No. Stops</th>
                                               <th>Status</th>
                                               <th>Package</th>
                                               <th>Time Of Delivery</th>
                                               <th>Istructions</th>
                                               <th style="padding: 44px;">Action</th>
                                           </tr>
                                       </thead>
                                       <tbody id="table">
                                        @if($data)
                                        @foreach($data as $order)
                                        @if($order->status == 1)
                                        <tr>
                                          <td>
                                            <span class="label-success label label-success">{{ $order->order_id }}</span>
                                          </td>
                                          <td>
                                            <span class="label-warning label label-warning">{{ $order->category }}</span>
                                          </td>
                                           <td>
                                              <label>{{$order->destination}}</label>   
                                          </td>
                                          <td>
                                              {{$order->origin[0]}}
                                          </td>
                                          <td>
                                              Ksh {{ $order->total }}
                                          </td>
                                          <td>
                                              {{ $order->distance }} Km
                                          </td>
                                          <td>
                                              <span class="label-success label label-success">
                                                {{ $order->stops_count }}
                                              </span>
                                          </td>
                                          <td>
                                           @if($order->status == 0)
                                            <span class="label label-warning">
                                              Unassigned
                                            </span>
                                            @elseif($order->status == 1)
                                            <span class="label-success label label-success">
                                              Accepted
                                            </span>
                                            @elseif($order->status == 2)
                                            <span class="label-success label label-success">
                                              Picked Up
                                            </span>
                                            @elseif($order->status == 3)
                                            <span class="label-success label label-success">
                                              In Transit
                                            </span>
                                            @elseif($order->status == 4)
                                            <span class="label label-success">
                                              Complete
                                            </span>
                                            @else
                                            <span class="label label-danger">
                                              Cancelled
                                            </span>
                                            @endif
                                          </td>
                                          <td id="package">
                                              {{$order->name}}
                                          </td>
                                          <td>
                                              {{$order->pickup_datetime}}
                                          </td>
                                          <td>
                                              {{$order->description}}
                                          </td>
                                          <td>
                                              <div class="row">

                                                <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="complete({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Complete</span></a></li><li><a onclick="cancel({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Cancel</span></a></li><li><a onclick="deleteOrder({{ $order->order_id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>

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
                                    <option data-tokens="Bike" value="rocketchooser">Bike</option>
                                    <option data-tokens="Pickup" value="bankchooser">Pickup</option>
                                    <option data-tokens="Van" value="bkashchooser">Van</option>
                                    <option data-tokens="3 Ton Truck" value="rocketchooser">3 Ton Truck</option>
                                    <option data-tokens="5 Ton Truck" value="rocketchooser">5 Ton Truck</option>
                                    <option data-tokens="10 Ton Truck" value="rocketchooser">10 Ton Truck</option>
                                    <option data-tokens="28 Ton Truck" value="rocketchooser">28 Ton Truck</option>
                                </select>
                            </div>
                            
                        </div>
                    </div>

                </div>
                <div class="table-responsive">
                 <table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
                  <thead>
                    <tr>
                      <th>#Order Id</th>
                      <th>Category</th>
                      <th>To</th>
                      <th>From</th>
                      <th>Price</th>
                      <th>Distance</th>
                      <th>No. Stops</th>
                      <th>Status</th>
                      <th>Package</th>
                      <th>Time Of Delivery</th>
                      <th>Istructions</th>
                      <th style="padding: 44px;">Action</th>
                    </tr>
                  </thead>
                  <tbody id="table">
                    @if($data)
                    @foreach($data as $order)
                    @if($order->status == 2)
                    <tr>
                      <td>
                        <span class="label-success label label-success">{{ $order->order_id }}</span>
                      </td>
                      <td>
                        <span class="label-warning label label-warning">{{ $order->category }}</span>
                      </td>
                      <td>
                        <label>{{$order->destination}}</label>   
                      </td>
                      <td>
                        {{$order->origin[0]}}
                      </td>
                      <td>
                        Ksh {{ $order->total }}
                      </td>
                      <td>
                        {{ $order->distance }} Km
                      </td>
                      <td>
                        <span class="label-success label label-success">
                          {{ $order->stops_count }}
                        </span>
                      </td>
                      <td>
                        @if($order->status == 0)
                        <span class="label label-warning">
                          Unassigned
                        </span>
                        @elseif($order->status == 1)
                        <span class="label-success label label-success">
                          Accepted
                        </span>
                        @elseif($order->status == 2)
                        <span class="label-success label label-success">
                          Picked Up
                        </span>
                        @elseif($order->status == 3)
                        <span class="label-success label label-success">
                          In Transit
                        </span>
                        @elseif($order->status == 4)
                        <span class="label label-success">
                          Complete
                        </span>
                        @else
                        <span class="label label-danger">
                          Cancelled
                        </span>
                        @endif
                      </td>
                      <td id="package">
                        {{$order->name}}
                      </td>
                      <td>
                        {{$order->pickup_datetime}}
                      </td>
                      <td>
                        {{$order->description}}
                      </td>
                     <td>
                       <div class="row">

                        <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="complete({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Complete</span></a></li><li><a onclick="cancel({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Cancel</span></a></li><li><a onclick="deleteOrder({{ $order->order_id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>

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
                      <option data-tokens="Bike" value="rocketchooser">Bike</option>
                      <option data-tokens="Pickup" value="bankchooser">Pickup</option>
                      <option data-tokens="Van" value="bkashchooser">Van</option>
                      <option data-tokens="3 Ton Truck" value="rocketchooser">3 Ton Truck</option>
                      <option data-tokens="5 Ton Truck" value="rocketchooser">5 Ton Truck</option>
                      <option data-tokens="10 Ton Truck" value="rocketchooser">10 Ton Truck</option>
                      <option data-tokens="28 Ton Truck" value="rocketchooser">28 Ton Truck</option>
                    </select>
                  </div>

                </div>
              </div>

            </div>
            <div class="table-responsive">
             <table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
              <thead>
                <tr>
                  <th>#Order Id</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>No. Stops</th>
                  <th>Status</th>
                  <th>Package</th>
                  <th>Time Of Delivery</th>
                  <th>Istructions</th>
                  <th style="padding: 44px;">Action</th>
                </tr>
              </thead>
              <tbody id="table">
                @if($data)
                @foreach($data as $order)
                @if($order->status == 3)
                <tr>
                  <td>
                    <span class="label-success label label-success">{{ $order->order_id }}</span>
                  </td>
                  <td>
                    <span class="label-warning label label-warning">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td>
                    <span class="label-success label label-success">
                      {{ $order->stops_count }}
                    </span>
                  </td>
                  <td>
                    @if($order->status == 0)
                    <span class="label label-warning">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="label-success label label-success">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="label-success label label-success">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="label-success label label-success">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="label label-success">
                      Complete
                    </span>
                    @else
                    <span class="label label-danger">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    {{$order->pickup_datetime}}
                  </td>
                  <td>
                    {{$order->description}}
                  </td>
                  <td>
                   <div class="row">

                    <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="complete({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Complete</span></a></li><li><a onclick="cancel({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Cancel</span></a></li><li><a onclick="deleteOrder({{ $order->order_id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>

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
        <div class="tab-pane" id="highlighted-justified-tab4">
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
                      <option data-tokens="Bike" value="rocketchooser">Bike</option>
                      <option data-tokens="Pickup" value="bankchooser">Pickup</option>
                      <option data-tokens="Van" value="bkashchooser">Van</option>
                      <option data-tokens="3 Ton Truck" value="rocketchooser">3 Ton Truck</option>
                      <option data-tokens="5 Ton Truck" value="rocketchooser">5 Ton Truck</option>
                      <option data-tokens="10 Ton Truck" value="rocketchooser">10 Ton Truck</option>
                      <option data-tokens="28 Ton Truck" value="rocketchooser">28 Ton Truck</option>
                    </select>
                  </div>

                </div>
              </div>

            </div>
            <div class="table-responsive">
             <table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
              <thead>
                <tr>
                  <th>#Order Id</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>No. Stops</th>
                  <th>Status</th>
                  <th>Package</th>
                  <th>Time Of Delivery</th>
                  <th>Istructions</th>
                  <th style="padding: 44px;">Action</th>
                </tr>
              </thead>
              <tbody id="table">
                @if($data)
                @foreach($data as $order)
                @if($order->status == 4)
                <tr>
                  <td>
                    <span class="label-success label label-success">{{ $order->order_id }}</span>
                  </td>
                  <td>
                    <span class="label-warning label label-warning">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td>
                    <span class="label-success label label-success">
                      {{ $order->stops_count }}
                    </span>
                  </td>
                  <td>
                    @if($order->status == 0)
                    <span class="label label-warning">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="label-success label label-success">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="label-success label label-success">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="label-success label label-success">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="label label-success">
                      Complete
                    </span>
                    @else
                    <span class="label label-danger">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    {{$order->pickup_datetime}}
                  </td>
                  <td>
                    {{$order->description}}
                  </td>
                  <td>
                   <div class="row">

                    <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="complete({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Complete</span></a></li><li><a onclick="cancel({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Cancel</span></a></li><li><a onclick="deleteOrder({{ $order->order_id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>

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
        <div class="tab-pane" id="highlighted-justified-tab5">
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
                      <option data-tokens="Bike" value="rocketchooser">Bike</option>
                      <option data-tokens="Pickup" value="bankchooser">Pickup</option>
                      <option data-tokens="Van" value="bkashchooser">Van</option>
                      <option data-tokens="3 Ton Truck" value="rocketchooser">3 Ton Truck</option>
                      <option data-tokens="5 Ton Truck" value="rocketchooser">5 Ton Truck</option>
                      <option data-tokens="10 Ton Truck" value="rocketchooser">10 Ton Truck</option>
                      <option data-tokens="28 Ton Truck" value="rocketchooser">28 Ton Truck</option>
                    </select>
                  </div>

                </div>
              </div>

            </div>
            <div class="table-responsive">
             <table class="table datatable-basic text-center datatable-highlight" style="overflow-x:auto;border-collapse: collapse; white-space: nowrap;">
              <thead>
                <tr>
                  <th>#Order Id</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>No. Stops</th>
                  <th>Status</th>
                  <th>Package</th>
                  <th>Time Of Delivery</th>
                  <th>Istructions</th>
                  <th style="padding: 44px;">Action</th>
                </tr>
              </thead>
              <tbody id="table">
                @if($data)
                @foreach($data as $order)
                @if($order->status == 5)
                <tr>
                  <td>
                    <span class="label-success label label-success">{{ $order->order_id }}</span>
                  </td>
                  <td>
                    <span class="label-warning label label-warning">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td>
                    <span class="label-success label label-success">
                      {{ $order->stops_count }}
                    </span>
                  </td>
                  <td>
                    @if($order->status == 0)
                    <span class="label label-warning">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="label-success label label-success">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="label-success label label-success">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="label-success label label-success">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="label label-success">
                      Complete
                    </span>
                    @else
                    <span class="label label-danger">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    {{$order->pickup_datetime}}
                  </td>
                  <td>
                    {{$order->description}}
                  </td>
                  <td>
                   <div class="row">

                    <div class="dropdown pull-right"><ul class="dropdown-menu dropdown-menu-right"><li><a onclick="complete({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Complete</span></a></li><li><a onclick="cancel({{ $order->order_id }})" data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="fas fa-link"></i><span class="control-title">Cancel</span></a></li><li><a onclick="deleteOrder({{ $order->order_id }})" data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="fas fa-trash"></i><span class="control-title">Delete</span></a></li></ul><div class="dropdown-toggle" data-toggle="dropdown"><span class=" btn btn-default btn-sm panel-control-icon glyphicon glyphicon-option-vertical actions"></span></div></div>

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

<script type="text/javascript">
  function complete(id){
    var id = id;

    jQuery.ajax({
      url:'{{ route('orders.complete') }}',
      method:"POST",
      data:{id: id, _token: '{{csrf_token()}}'},
      success:function(result)
      {
        swal('Order'+result, "has been completed successfully!", "success").then(function(){ 
          location.reload()
        }
        );
      },
      error : function(){alert("Something Went Wrong.");},
    });
  }
</script>

<script>
  function cancel(id){
    var id = id;

    swal({
      title: "Are you sure?",
      text: "Once canceled, you will not be able to uncancel this order!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        jQuery.ajax({
          url:'{{ route('orders.cancel') }}',
          method:"POST",
          data:{id: id, _token: '{{csrf_token()}}'},
          success:function(result)
          {
            swal('Order'+result, "has been canceled!", {
              icon: "success",
            }).then(function(){ 
              location.reload()
            }
            );
          },
          error : function(){alert("Something Went Wrong.");},
        });
      } else {
        swal("Order is safe!").then(function(){ 
          location.reload()
        }
        );
      }
    });
  }
</script>

<script>
  function deleteOrder(id){
    var id = id;

    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this order!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        jQuery.ajax({
          url:'{{ route('orders.destroy') }}',
          method:"POST",
          data:{id: id, _token: '{{csrf_token()}}'},
          success:function(result)
          {
            swal('Order'+result, "has been deleted!", {
              icon: "success",
            }).then(function(){ 
              location.reload()
            }
            );
          },
          error : function(){alert("Something Went Wrong.");},
        });
      } else {
        swal("Order is safe!").then(function(){ 
          location.reload()
        }
        );
      }
    });
  }
</script>

ALTER TABLE `couriers` ADD `bearer_token` TEXT NULL DEFAULT NULL AFTER `api_token`;