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
<div class="content">
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Order Payments Table</h5>
			<div class="header-elements">
				<div class="list-icons">
					<a class="list-icons-item" data-action="collapse"></a>
					<a class="list-icons-item" data-action="reload"></a>
					<a class="list-icons-item" data-action="remove"></a>
				</div>
			</div>
		</div>

		<div class="card-body">
			<table class="table table-responsive datatable-column-search-selects">
				<thead>
					<tr>
						<th>#Order Payment Id</th>
						<th>Payment Type</th>
						<th>Total Amount</th>
						<th>Balance</th>
						<th>Extra</th>
						<th>Made By</th>
						<th>Status</th>
						<th>Payment Datetime</th>
					</tr>
				</thead>
				<tbody id="table">
					@if($data)
					@foreach($data as $pay)
					<tr>
						<td>
							<span class="badge badge-success">{{ $pay->order_payment_id }}</span>
						</td>
						<td>
							<span class="badge badge-warning">
								{{ $pay->payment_type }}
							</span>  
						</td>
						<td>
							{{$pay->total}}
						</td>
						<td>
							{{ $pay->balance }}
						</td>
						<td>
							{{ $pay->extra }}
						</td>
						<td>
							{{ $pay->username }}
						</td>
						<td>
							@if($pay->status == 1)
							<span class="badge badge-success">
								Paid
							</span>
							@else
							<span class="badge badge-danger">
								Not Paid
							</span>
							@endif
						</td>
						<td>
							{{ $pay->datetime }}
						</td>
					</tr>
					@endforeach
					@else
					<tr style="text-align: center;">

					</tr>
					@endif                  
				</tbody>
				<tfoot>
					<tr>
						<th>#Order Payment Id</th>
						<th>Payment Type</th>
						<th>Total Amount</th>
						<th>Balance</th>
						<th>Extra</th>
						<th>Made By</th>
						<th>Status</th>
						<th>Payment Datetime</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div> <!-- /.content -->

@endsection