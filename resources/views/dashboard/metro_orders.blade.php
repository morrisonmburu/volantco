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

<div class="content">
  <!-- Individual column searching (selects) -->
  <div class="card">
    <div class="card-header header-elements-inline">
      <h5 class="card-title">All Orders Table</h5>
      <div class="header-elements">
        <div class="list-icons">
          <a class="list-icons-item" data-action="collapse"></a>
          <a class="list-icons-item" data-action="reload"></a>
          <a class="list-icons-item" data-action="remove"></a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid nav-justified rounded border-0">
          <li class="nav-item">
            <a href="#solid-rounded-justified-tab0" class="nav-link rounded-left active" data-toggle="tab"><span class="badge badge-danger badge-pill mr-2">{{ $orderstats['unassigned'] }}</span>Unassigned</a>
          </li>
          <li class="nav-item">
            <a href="#solid-rounded-justified-tab1" class="nav-link rounded-left" data-toggle="tab"><span class="badge badge-info badge-pill mr-2">{{ $orderstats['accepted'] }}</span>Accepted</a>
          </li>
          <li class="nav-item">
            <a href="#solid-rounded-justified-tab2" class="nav-link rounded-left" data-toggle="tab"><span class="badge badge-info badge-pill mr-2">{{ $orderstats['picked_up'] }}</span>Picked Up</a>
          </li>
          <li class="nav-item">
            <a href="#solid-rounded-justified-tab3" class="nav-link rounded-left" data-toggle="tab"><span class="badge badge-success badge-pill mr-2">{{ $orderstats['in_transit'] }}</span>In Transit</a>
          </li>
          <li class="nav-item">
            <a href="#solid-rounded-justified-tab4" class="nav-link rounded-left" data-toggle="tab"><span class="badge badge-success badge-pill mr-2">{{ $orderstats['complete'] }}</span>Completed</a>
          </li>
          <li class="nav-item">
            <a href="#solid-rounded-justified-tab5" class="nav-link rounded-left" data-toggle="tab"><span class="badge badge-danger badge-pill mr-2">{{ $orderstats['cancelled'] }}</span>Cancelled</a>
          </li>
          
        </ul>

        <style type="text/css">
          .big{
            font-size: 13px;
          }
        </style>

        <div class="tab-content">
          <div class="tab-pane fade show active" id="solid-rounded-justified-tab0">
            <table class="table table-responsive datatable-column-search-selects">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $order)
                @if($order->status == 0)
                <tr>
                  <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning big">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="badge badge-info big">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="badge badge-primary big">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="badge-success badge-success big">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="badge badge-success big">
                      Complete
                    </span>
                    @else
                    <span class="badge badge-danger big">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td>
                    <span class="badge badge-warning big">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    {{ $order->client_name }}
                  </td>
                  <td>
                    <?php
                      $date = date('l, F, d h:i a', strtotime($order->pickup_datetime));
                    ?>
                    {{ $date }}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    <span class="badge badge-success big">{{ $order->order_id }}</span>
                  </td>
                  <td class="text-center">
                    <div class="list-icons">
                      <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" onclick="complete({{ $order->order_id }})"><i class="fas fa-link"></i> Complete Order </a>
                          <a class="dropdown-item" onclick="cancel({{ $order->order_id }})"><i class="fas fa-link"></i> Cancel Order </a>
                          <a class="dropdown-item" href="/orders/{{ $order->order_id }}" target="blank"><i class="fas fa-eye"></i> View Order </a>
                          {{-- <a class="dropdown-item" onclick="deleteOrder({{ $order->order_id }})"><i class="fas fa-trash"></i> Delete Order </a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                @endif
                @endforeach
                @endif

              </tbody>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="tab-pane fade" id="solid-rounded-justified-tab1">
            <table class="table table-responsive datatable-column-search-selects">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $order)
                @if($order->status == 1)
                <tr>
                  <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning badge-lg big">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="badge badge-info big">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="badge badge-primary big">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="badge-success badge-success big">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="badge badge-success big">
                      Complete
                    </span>
                    @else
                    <span class="badge badge-danger big">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td>
                    <span class="badge badge-warning big">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    {{ $order->client_name }}
                  </td>
                  <td>
                    <?php
                      $date = date('l, F, d h:i a', strtotime($order->pickup_datetime));
                    ?>
                    {{ $date }}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    <span class="badge badge-success big">{{ $order->order_id }}</span>
                  </td>
                  <td class="text-center">
                    <div class="list-icons">
                      <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <a  class="dropdown-item" onclick="complete({{ $order->order_id }})"><i class="fas fa-link"></i> Complete Order </a>
                          <a  class="dropdown-item" onclick="cancel({{ $order->order_id }})"><i class="fas fa-link"></i> Cancel Order </a>
                          <a class="dropdown-item" href="/orders/{{ $order->order_id }}" target="blank"><i class="fas fa-eye"></i> View Order </a>
                          {{-- <a  class="dropdown-item" onclick="deleteOrder({{ $order->order_id }})"><i class="fas fa-trash"></i> Delete Order </a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                @endif
                @endforeach
                @endif

              </tbody>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="tab-pane fade" id="solid-rounded-justified-tab2">
            <table class="table table-responsive datatable-column-search-selects">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $order)
                @if($order->status == 2)
                <tr>
                  <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning big ">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="badge badge-info big">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="badge badge-primary big">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="badge-success badge-success big">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="badge badge-success big">
                      Complete
                    </span>
                    @else
                    <span class="badge badge-danger big">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td>
                    <span class="badge badge-warning big">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    {{ $order->client_name }}
                  </td>
                  <td>
                    <?php
                      $date = date('l, F, d h:i a', strtotime($order->pickup_datetime));
                    ?>
                    {{ $date }}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    <span class="badge badge-success big">{{ $order->order_id }}</span>
                  </td>
                  <td class="text-center">
                    <div class="list-icons">
                      <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <a  class="dropdown-item" onclick="complete({{ $order->order_id }})"><i class="fas fa-link"></i> Complete Order </a>
                          <a class="dropdown-item" onclick="cancel({{ $order->order_id }})"><i class="fas fa-link"></i> Cancel Order </a>
                          <a class="dropdown-item" href="/orders/{{ $order->order_id }}" target="blank"><i class="fas fa-eye"></i> View Order </a>
                          {{-- <a class="dropdown-item" onclick="deleteOrder({{ $order->order_id }})"><i class="fas fa-trash"></i> Cancel Order </a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                @endif
                @endforeach
                @endif

              </tbody>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="tab-pane fade" id="solid-rounded-justified-tab3">
            <table class="table table-responsive datatable-column-search-selects">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $order)
                @if($order->status == 3)
                <tr>
                  <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning big ">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="badge badge-info big">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="badge badge-primary big">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="badge badge-success big">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="badge badge-success big">
                      Complete
                    </span>
                    @else
                    <span class="badge badge-danger big">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td>
                    <span class="badge badge-warning big">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    {{ $order->client_name }}
                  </td>
                  <td>
                    <?php
                      $date = date('l, F, d h:i a', strtotime($order->pickup_datetime));
                    ?>
                    {{ $date }}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    <span class="badge badge-success big">{{ $order->order_id }}</span>
                  </td>
                  <td class="text-center">
                    <div class="list-icons">
                      <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <a  class="dropdown-item" onclick="complete({{ $order->order_id }})"><i class="fas fa-link"></i> Complete Order </a>
                          <a class="dropdown-item" onclick="cancel({{ $order->order_id }})"><i class="fas fa-link"></i> Cancel Order </a>
                          <a class="dropdown-item" href="/orders/{{ $order->order_id }}" target="blank"><i class="fas fa-eye"></i> View Order </a>
                          {{-- <a class="dropdown-item" onclick="deleteOrder({{ $order->order_id }})"><i class="fas fa-trash"></i> Cancel Order </a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                @endif
                @endforeach
                @endif

              </tbody>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="tab-pane fade" id="solid-rounded-justified-tab4">
            <table class="table table-responsive datatable-column-search-selects">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $order)
                @if($order->status == 4)
                <tr>
                  <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning big">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="badge badge-info big">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="badge badge-primary big">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="badge-success badge-success big">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="badge badge-success big">
                      Complete
                    </span>
                    @else
                    <span class="badge badge-danger big">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td>
                    <span class="badge badge-warning big">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    {{ $order->client_name }}
                  </td>
                  <td>
                    <?php
                      $date = date('l, F, d h:i a', strtotime($order->pickup_datetime));
                    ?>
                    {{ $date }}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    <span class="badge badge-success big">{{ $order->order_id }}</span>
                  </td>
                  <td class="text-center">
                    <div class="list-icons">
                      <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <a  class="dropdown-item" onclick="complete({{ $order->order_id }})"><i class="fas fa-link"></i> Complete Order </a>
                          <a  class="dropdown-item" onclick="cancel({{ $order->order_id }})"><i class="fas fa-link"></i> Cancel Order </a>
                          <a class="dropdown-item" href="/orders/{{ $order->order_id }}" target="blank"><i class="fas fa-eye"></i> View Order </a>
                          {{-- <a  class="dropdown-item" onclick="deleteOrder({{ $order->order_id }})"><i class="fas fa-trash"></i> Cancel Order </a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                @endif
                @endforeach
                @endif

              </tbody>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>

          <div class="tab-pane fade" id="solid-rounded-justified-tab5">
            <table class="table table-responsive datatable-column-search-selects">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                @if($data)
                @foreach($data as $order)
                @if($order->status == 5)
                <tr>
                  <td>
                    @if($order->status == 0)
                    <span class="badge badge-warning big ">
                      Unassigned
                    </span>
                    @elseif($order->status == 1)
                    <span class="badge badge-info big">
                      Accepted
                    </span>
                    @elseif($order->status == 2)
                    <span class="badge badge-primary big">
                      Picked Up
                    </span>
                    @elseif($order->status == 3)
                    <span class="badge badge-success big">
                      In Transit
                    </span>
                    @elseif($order->status == 4)
                    <span class="badge badge-success big">
                      Complete
                    </span>
                    @else
                    <span class="badge badge-danger big">
                      Cancelled
                    </span>
                    @endif
                  </td>
                  <td>
                    <span class="badge badge-warning big">{{ $order->category }}</span>
                  </td>
                  <td>
                    <label>{{$order->destination}}</label>   
                  </td>
                  <td>
                    {{$order->origin[0]}}
                  </td>
                  <td>
                    {{ $order->client_name }}
                  </td>
                  <td>
                    <?php
                      $date = date('l, F, d h:i a', strtotime($order->pickup_datetime));
                    ?>
                    {{ $date }}
                  </td>
                  <td>
                    Ksh {{ $order->total }}
                  </td>
                  <td>
                    {{ $order->distance }} Km
                  </td>
                  <td id="package">
                    {{$order->name}}
                  </td>
                  <td>
                    <span class="badge badge-success big">{{ $order->order_id }}</span>
                  </td>
                  <td class="text-center">
                    <div class="list-icons">
                      <div class="dropdown">
                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                          <i class="icon-menu9"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                          <a  class="dropdown-item" onclick="complete({{ $order->order_id }})"><i class="fas fa-link"></i> Complete Order </a>
                          <a  class="dropdown-item" onclick="cancel({{ $order->order_id }})"><i class="fas fa-link"></i> Cancel Order </a>
                          <a class="dropdown-item" href="/orders/{{ $order->order_id }}" target="blank"><i class="fas fa-eye"></i> View Order </a>
                          {{-- <a  class="dropdown-item" onclick="deleteOrder({{ $order->order_id }})"><i class="fas fa-trash"></i> Cancel Order </a> --}}
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                @endif
                @endforeach
                @endif

              </tbody>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Category</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Client Name</th>
                  <th>Time</th>
                  <th>Price</th>
                  <th>Distance</th>
                  <th>Package</th>
                  <th>#Order Id</th>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /individual column searching (selects) -->
</div>

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

@endsection