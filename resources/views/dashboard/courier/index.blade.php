@include("dashboard.includes.head")
@include("dashboard.includes.nav")

@section("Couriers", "|dashboard")

<style type="text/css">
	.stepwizard-step p {
		margin-top: 10px;
	}

	.stepwizard-row {
		display: table-row;
	}

	.stepwizard {
		display: table;
		width: 100%;
		position: relative;
	}

	.stepwizard-step button[disabled] {
		opacity: 1 !important;
		filter: alpha(opacity=100) !important;
	}

	.stepwizard-row:before {
		top: 35px;
		bottom: 0;
		position: relative;
		content: " ";
		width: 100%;
		height: 1px;
		background-color: #ccc;
		z-order: 0;

	}

	.stepwizard-step {
		display: table-cell;
		text-align: center;
		position: relative;
	}

	.btn-circle {
		width: 60px;
		height: 60px;
		text-align: center;
		padding: 12px 0;
		font-size: 12px;
		line-height: 1.428571429;
		border-radius: 30px;
	}

	.avatar-wrapper{
		position: relative;
		height: 200px;
		width: 200px;
		margin: 50px auto;
		border-radius: 50%;
		overflow: hidden;
		box-shadow: 1px 1px 15px -5px black;
		transition: all .3s ease;
	}
	.avatar-wrapper:hover{
		transform: scale(1.05);
		cursor: pointer;
	}
	.avatar-wrapper:hover .profile-pic{
		opacity: .5;
	}
	.profile-pic {
		height: 100%;
		width: 100%;
		transition: all .3s ease;
	}
	.profile-pic:after{
		font-family: FontAwesome;
		content: "\f007";
		top: 80px; left: 0;
		width: 100%;
		height: 100%;
		position: absolute;
		font-size: 190px;
		background: #ecf0f1;
		color: #34495e;
		text-align: center;
	}

	.upload-button {
		position: absolute;
		top: 0; left: 0;
		height: 100%;
		width: 100%;
	}
	.upload-button .fa-arrow-circle-up{
		position: absolute;
		font-size: 234px;
		top: -17px;
		left: -17px;
		text-align: center;
		opacity: 0;
		transition: all .3s ease;
		color: #34495e;
	}
	.upload-button:hover .fa-arrow-circle-up{
		opacity: .9;
	}

	#drivers2:hover{
		background-color: #D7DBDD;
	}

	.actions:hover{
		background-color: #D7DBDD;
	}
</style>

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
<div class="content">
	<div class="row">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Associates Orders Table</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<button type="button" style="background-color:#26a69a; border-color: #26a69a"  class="btn btn-success" data-toggle="modal" data-target="#ModalDriverForm" > <i class="fa fa-plus"></i> Add An Associate</button>
				<table id="drivers" style="white-space: nowrap;" class="table table-responsive datatable-column-search-selects table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Associate Type</th>
							<th>Category</th>
							<th>Name</th>
							<th>Phone No</th>
							<th>Vehicle Model</th>
							<th>Vehicle Type</th>
							<th>Production Year</th>
							<th>Creation Date</th>
							<th>Board Number</th>
							<th>Plate Number</th>
							<th>Status</th>
							<th class="text-center">Actions</th>
						</tr>
					</thead>
					<tbody id="table">
						@if($data)
						@foreach($data as $driver)
						<tr id="drivers2" style="cursor: pointer;">
							<td>
								<span class="badge badge-success">{{ $driver->id }}</span>
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								<span class="badge badge-success">{{ $driver->associate_type }}</span>
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								@if($driver->category == 2)
								<span class="badge badge-success">Cargo & Freight</span>
								@elseif($driver->category == 3)
								<span class="badge badge-info">Packaging & Moves</span>
								@elseif($driver->category === 4)
								<span class="badge badge-primary">Construction Logistics</span>
								@else
								<span class="badge badge-warning">Metro Deliveries</span>
								@endif
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->Name }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->phoneNo }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->vehicle_model }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->vehicle_type }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->production_year }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->created_at }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->boardNo }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								{{ $driver->vehicle_platenumber }}
							</td>
							<td onclick="getDriver({{ $driver->id }})">
								@if($driver->status == 0)
								<span class="badge badge-danger">
									Inactive
								</span>
								@elseif($driver->status == 2)
								<span class="badge badge-warning">
									Suspended
								</span>
								@else
								<span class="badge badge-success">
									Active
								</span>
								@endif
							</td>
							<td class="text-center">
								<div class="list-icons">
									<div class="dropdown">
										<a href="#" class="list-icons-item" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" onclick="activateDriver({{ $driver->id }})"><i class="fas fa-toggle-on"></i> Activate </a>
											<a class="dropdown-item" onclick="suspend({{ $driver->id }})"><i class="fas fa-eye-slash"></i> Suspend </a>
											<a class="dropdown-item" onclick="deleteDriver({{ $driver->id }})"><i class="fas fa-trash"></i> Delete </a>
										</div>
									</div>
								</div>
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
							<th>#</th>
							<th>Associate Type</th>
							<th>Category</th>
							<th>Name</th>
							<th>Phone No</th>
							<th>Vehicle Model</th>
							<th>Vehicle Type</th>
							<th>Production Year</th>
							<th>Creation Date</th>
							<th>Board Number</th>
							<th>Plate Number</th>
							<th>Status</th>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal HTML Markup -->
	<div id="ModalDriverForm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title text-xs-center">Add New Associate</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<input type="hidden" name="_token" value="">

					<div class="form-group">
						<label class="control-label">Phone Number</label>
						<div class="input-group">
							<div class="input-group-addon" id="get" >
								<img src="/images/ke.png" style="padding-right: 5px;" ><span id="254">+254</span></div>
								<input type="tel" name="phoneNo" id="phoneNo" data-country="KE" maxlength="9" class="form-control">
							</div>
						</div>


						<div class="form-group">
							<label class="control-label">E-Mail Address</label>
							<div>
								<input type="email" class="form-control input-lg" name="email" value="" id="email">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">Associate Type</label>
							<div>
								<select class="form-control" id="associate_type">
									<option></option>
									<option value="Messager">Messanger</option>
									<option value="Express Bike">Bike</option>
									<option value="Pickup">Pickup</option>
									<option value="Van">Van</option>
									<option value="3-Tonne Truck">3 Tonn Truck</option>
									<option value="5-Tonne Truck">5 Tonn Truck</option>
									<option value="10-Tonne Truck">10 Tonn Truck</option>
									<option value="14-Tonne Truck">14 Tonn Truck</option>
									<option value="28-Tonne Truck">28 Tonn Truck</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">Associate Name</label>
							<div>
								<input type="text" class="form-control" name="associate_name" id="associate_name">
							</div>
						</div>


						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="driver1" class="btn btn-info">Add Associate</button>
						</div>

					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<!-- Modal HTML Markup -->
		<div id="ModalDriverForm2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalDriverForm2" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content" role="document">
					<div class="modal-header">
						<h4 class="modal-title text-xs-center">Edit Associate</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">


						<input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
						<div class="stepwizard">
							<div class="stepwizard-row setup-panel">
								<div class="stepwizard-step">
									<a href="#step-1" type="button" style="background-color: #C0392B;" class="btn btn-primary btn-circle"><i style="font-size: 30px;" class="far fa-user"></i></a>
									<p>Profile</p>
								</div>
								<div class="stepwizard-step">
									<a href="#step-2" type="button" style="background-color: #C0392B;" class="btn btn-default btn-circle disabled"><i style="font-size: 30px;"  class="fas fa-truck"></i></a>
									<p>Vehicle</p>
								</div>
								<div class="stepwizard-step">
									<a href="#step-3" type="button" style="background-color: #C0392B;" class="btn btn-default btn-circle disabled"><i style="font-size: 30px;"  class="fas fa-file-upload"></i></a>
									<p>Documents</p>
								</div>
							</div>
						</div>
						<div class="setup-content" id="step-1">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4 text-center" style="border-radius: 10px;">
										<!-- Dropzone -->

										<div class="content-group" id="driver_avatar_upload">

											<form method="post" action="{{route('image/upload/store')}}" enctype="multipart/form-data" 
											class="dropzone imageUpload" id="dropzone">
											@csrf
											<input type="hidden" name="orderImageid" id="orderImageid">
										</form>

									</div>

									<div class="content-group" id="driver_avatar">
										<img src="" >
										<button onclick="updateDriverImage()" class="btn btn-info btn-block text-center">Update Image</button>
									</div>
									<!-- /dropzone -->
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label">Name</label>
										<input  maxlength="100" type="text" required class="form-control" placeholder="Name" name="Name" id="Name"/>
									</div>
									<div class="form-group">
										<label class="control-label">Phone Number</label>
										<div class="input-group">
											<div class="inimagesput-group-addon" id="get" >
												<img src="/images/ke.png" style="padding-right: 5px;" ><span id="254">+254</span></div>
												<input type="text" data-country="KE" maxlength="15" placeholder="Phone Number" name="phoneNumber" class="form-control" id="phoneNumber"/>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">Email Address</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="Email Address" name="email_address" id="email_address"/>
										</div>
										<div class="form-group">
											<label class="control-label">License Number</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="License Number" name="license" id="license"/>
										</div>
										<div class="form-group">
											<label class="control-label">Category Type</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Category Type" name="c_type" id="c_type">
												<option id="c-type"></option>
												@foreach($category as $cat)
												<option value="{{ $cat->id }}">{{ $cat->name }}</option>
												@endforeach
											</select>
										</div>		
									</div>
								</div>

								<button style="background-color: #C0392B;" class="btn btn-primary nextBtn pull-right" type="button">Next</button>

							</div>
						</div>
						<div class="setup-content" id="step-2">
							<div class="col-md-12">
								<div class="col-md-11">

									<div class="row">

										<div class="col-md-4 text-center" style="border-radius: 10px;">
											<!-- Dropzone -->
											<div class="content-group" id="driver_car_avatar_upload">

												<form method="post" action="{{route('image/car/upload/store')}}" enctype="multipart/form-data" 
												class="dropzone imageUpload2" id="dropzone">
												@csrf
												<input type="hidden" name="orderImageid2" id="orderImageid2">
											</form>

										</div>

										<div class="content-group" id="driver_car_avatar">
											<img src="" >
											<button onclick="updateCarImage()" class="btn btn-info btn-block text-center">Update Image</button>
										</div>
										<!-- /dropzone -->
									</div>

									<div class="col-md-8">
										<div class="form-group">
											<label class="control-label">Vehicle Type</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Vehicle Type" name="v_type" id="v-type">
												<option id="ve-type"></option>
												<option>Classic</option>
												<option>Business</option>
											</select>
										</div>
										<div class="form-group">
											<label class="control-label">Associate Type</label>
											<div>
												<select class="form-control" id="associate_type3">
													<option id="associate_type2"></option>
													<option value="Messanger">Messanger</option>
													<option value="Bike">Bike</option>
													<option value="Pickup">Pickup</option>
													<option value="Van">Van</option>
													<option value="3 Tonn Truck">3 Tonn Truck</option>
													<option value="5 Tonn Truck">5 Tonn Truck</option>
													<option value="10 Tonn Truck">10 Tonn Truck</option>
													<option value="14 Tonn Truck">14 Tonn Truck</option>
													<option value="28 Tonn Truck">28 Tonn Truck</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label">Model</label>
											<input type="text" name="Model" id="model" data-country="KE" maxlength="100" placeholder="Model" class="form-control" name="model">
										</div>

										<div class="form-group">
											<label class="control-label">Color</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="Color" id="color" name="color" />
										</div>	
										<div class="form-group">
											<label class="control-label">Plate Number</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="Plate Number" id="plate-no" name="plate_no" />
										</div>
										<div class="form-group">
											<label class="control-label">Production Year</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="Production Year" name="p_year" id="p-year"/>
										</div>
										<div class="form-group">
											<label class="control-label">Board Number</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="Board Number" name="boardNo" disabled id="boardNo"/>
										</div>
										<div class="form-group">
											<label class="control-label">Number of passanger seats</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Number of passanger seats" id="p-number" name="p_number">
												<option id="pa-number"></option>
												<?php for ($i=0; $i <= 50; $i++): ?>
												<option>{{ $i }}</option>
												<?php endfor; ?>
											</select>
											<input type="hidden" name="id" id="id_number">
										</div>

									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<button style="background-color: #C0392B;" class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
									</div>
									<div class="col-md-6">
										<button onclick="updateDriver()" class="btn btn-success pull-right">Save!</button>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="setup-content" id="step-3">
						<div class="col-md-12">
							<div class="col-md-11">
								<p class="text-center" style="margin-top: 20px;">Associate DOCUMENTS NOT UPLOADED</p>
								<button onclick="updateDriver()" class="btn btn-success pull-right">Save!</button>
							</div>
						</div>
					</div>

				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</div>


<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
			<i class="icon-unfold mr-2"></i>
			Footer
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-footer">
		<span class="navbar-text">
			&copy; 2020<a href="#">Volant Ltd</a> by <a href="https://volantltd.com" target="_blank">Volant Ltd</a>
		</span>
	</div>
</div>
<!-- /footer -->

</div>
<!-- /main content -->
</div>
<!-- /page content -->
<!-- Core JS files -->
<script src="{{ url('global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ url('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/effects.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/widgets.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/extensions/jquery_ui/touch.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/sliders/slider_pips.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript" src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js') }}"></script>
<script src="{{ url('global_assets/js/demo_pages/datatables_api.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/media/fancybox.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/trees/fancytree_all.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/ui/prism.min.js') }}"></script>
<script src="{{ url('global_assets/js/plugins/pickers/color/spectrum.js') }}"></script>

<script src="{{ url('assets/js/app.js') }}"></script>
<script src="{{ url('global_assets/js/demo_pages/sidebar_components.js') }}"></script>

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

	$(document).ready(function(){
		$("#driver_avatar").hide();
		$("#driver_car_avatar").hide();
	})

	var DriverImage = $(".imageUpload").dropzone({
		uploadMultiple: false,
		maxFilesize: 1,
		renameFile: function(file) {
			var dt = new Date();
			var time = dt.getTime();
			return time+file.name;
		},
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		addRemoveLinks: true,
		timeout: 50000,
		removedfile: function(file) 
		{
			var name = file.upload.filename;
			var orderImageid = $("#orderImageid").val();
			$.ajax({
				type: 'POST',
				url: '{{ route("image/delete") }}',
				data: {filename: name, orderImageid: orderImageid, _token: '{{csrf_token()}}'},
				success: function (data){
					console.log("File has been successfully removed!!");
				},
				error: function(e) {
					console.log(e);
				}});
			var fileRef;
			return (fileRef = file.previewElement) != null ? 
			fileRef.parentNode.removeChild(file.previewElement) : void 0;
		},

		success: function(file, response) 
		{

		},
		error: function(file, response)
		{
			return false;
		}
	});

	var DriverVehicleImage = $(".imageUpload2").dropzone({
		uploadMultiple: false,
		maxFilesize: 1,
		renameFile: function(file) {
			var dt = new Date();
			var time = dt.getTime();
			return time+file.name;
		},
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		addRemoveLinks: true,
		timeout: 50000,
		removedfile: function(file) 
		{
			var name = file.upload.filename;
			var orderImageid = $("#orderImageid2").val();
			$.ajax({
				type: 'POST',
				url: '{{ route("image/car/delete") }}',
				data: {filename: name, orderImageid: orderImageid, _token: '{{csrf_token()}}'},
				success: function (data){
					console.log("File has been successfully removed!!");
				},
				error: function(e) {
					console.log(e);
				}});
			var fileRef;
			return (fileRef = file.previewElement) != null ? 
			fileRef.parentNode.removeChild(file.previewElement) : void 0;
		},

		success: function(file, response) 
		{

		},
		error: function(file, response)
		{
			return false;
		}
	});

			// Dropzone.options.dropzone =
			// {
				
			// };

			function updateDriverImage(){
				$("#driver_avatar").hide()
				$("#driver_avatar_upload").show()
			}

			function updateCarImage(){
				$("#driver_car_avatar").hide()
				$("#driver_car_avatar_upload").show()
			}

			function getDriver(id){
				// $("#drivers2").addClass('selected').siblings().removeClass('selected');    
				var value=$("#drivers2").html();

				// $("#drivers2").css("background-color","#D7DBDD")

				jQuery.ajax({
					url:'{{ route('getDriver') }}',
					method:"POST",
					data:{id: id, _token: '{{csrf_token()}}'},
					dataType: 'json',
					success:function(result)
					{
						$("#Name").val(result[0].Name)
						$("#phoneNumber").val(result[0].phoneNo)
						$("#email_address").val(result[0].email)
						$("#license").val(result[0].licenseNo)
						$('#ve-type').text(result[0].vehicle_type)
						$("#model").val(result[0].vehicle_model)
						$("#color").val(result[0].vehicle_color)
						$("#plate-no").val(result[0].vehicle_platenumber)
						$("#p-year").val(result[0].production_year)
						$("#boardNo").val(result[0].boardNo)
						$('#pa-number').text(result[0].number_of_passangers)
						$("#id_number").val(result[0].id)
						$("#orderImageid").val(result[0].id)
						$("#orderImageid2").val(result[0].id)
						$('#ModalDriverForm2').modal('show');
						$("#c-type").text(result[0].category);
						$("#associate_type2").text(result[0].associate_type)

						if(result[0].driver_avatar !== 'N/A' && result[0].driver_avatar !== ''){
							// console.log("test");
							$("#driver_avatar").show()
							$("#driver_avatar_upload").hide()
							$("#driver_avatar img").attr("src", '/images/'+result[0].driver_avatar);
							$("#driver_avatar img").attr("width", "200px");
							$("#driver_avatar img").attr("height", "200px");
						}else{
							$("#driver_avatar_upload").show()
							$("#driver_avatar").hide()
						}

						if(result[0].vehicle_avatar !== 'N/A' && result[0].vehicle_avatar !== ''){
							// console.log("test");
							$("#driver_car_avatar").show()
							$("#driver_car_avatar_upload").hide()
							$("#driver_car_avatar img").attr("src", '/images/'+result[0].vehicle_avatar);
							$("#driver_car_avatar img").attr("width", "200px");
							$("#driver_car_avatar img").attr("height", "200px");
						}else{
							$("#driver_car_avatar_upload").show()
							$("#driver_car_avatar").hide()
						}
					},
					error : function(){alert("Something Went Wrong.");},
				});

			}

			var navListItems = $('div.setup-panel div a'),
			allWells = $('.setup-content'),
			allNextBtn = $('.nextBtn');

			allWells.hide();

			navListItems.click(function (e) {
				e.preventDefault();
				var $target = $($(this).attr('href')),
				$item = $(this);

				if (!$item.hasClass('disabled')) {
					navListItems.removeClass('btn-primary').addClass('btn-default');
					$item.addClass('btn-primary');
					allWells.hide();
					$target.show();
					$target.find('input:eq(0)').focus();
				}
			});

			allNextBtn.click(function(){
				var curStep = $(this).closest(".setup-content"),
				curStepBtn = curStep.attr("id"),
				nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
				curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email']"),
				isValid = true;

				$(".form-group").removeClass("has-error");
				for(var i=0; i<curInputs.length; i++){
					if (!curInputs[i].validity.valid){
						isValid = false;
						$(curInputs[i]).closest(".form-group").addClass("has-error");
					}
				}

				if (isValid){
					nextStepWizard.removeClass('disabled').trigger('click');
					console.log(nextStepWizard)
				}
			});

			$('div.setup-panel div a.btn-primary').trigger('click');

			var readURL = function(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.profile-pic').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$(".file-upload").on('change', function(){
				readURL(this);
			});

			$(".upload-button").on('click', function() {
				$(".file-upload").click();
			});

			function updateDriver(){
				var Name =	$("#Name").val()
				var phoneNumber =	$("#phoneNumber").val()
				var email_address =	$("#email_address").val()
				var license =	$("#license").val()
				var v_type =	$('option:selected', '#v-type').val()
				var model =	$("#model").val()
				var color =	$("#color").val()
				var plate_no =	$("#plate-no").val()
				var p_year =	$("#p-year").val()
				var boardNo =	$("#boardNo").val()
				var p_number =	$('option:selected', '#p-number').val()
				var id_number =	$("#id_number").val()	
				var category_id = $('option:selected', '#c_type').val()	
				var associate_type = $('option:selected', '#associate_type3').val()

				jQuery.ajax({
					url:'{{ route("updateDriver") }}',
					method:"POST",
					data:{ Name: Name, phoneNumber: phoneNumber, email_address: email_address, license: license, v_type: v_type, model: model, color: color, plate_no: plate_no, p_year: p_year, p_number: p_number, id_number: id_number, category_id: category_id, associate_type: associate_type, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						swal('Associate'+result, "has been updated successfully!", "success").then(function(){ 
							window.location.reload()
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});

			}

			$("#driver1").click(function(){
				var phone = $("#phoneNo").val()
				var email = $("#email").val()
				var head = $("#254").text()
				var associate_type = $('option:selected', '#associate_type').val()
				var associate_name = $('#associate_name').val()

				var phoneNo = head+phone

				jQuery.ajax({
					url:'{{ route('addDriver') }}',
					method:"POST",
					data:{phoneNo: phoneNo, email: email, associate_type: associate_type, associate_name: associate_name, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						if(result.error){
							var message = JSON.stringify(result.error)
							swal({
								icon: 'error',
								title: 'Oops...',
								text: ' '+message,
							}).then(function(){ 
								window.location.reload()
							}
							);
						}else{
							swal('Associate'+result, "has been completed successfully!", "success").then(function(){ 
								window.location.reload()
							}
							);
						}
					},
					error : function(){alert("Something Went Wrong.");},
				});
			});

			function suspend(id){
				jQuery.ajax({
					url:'{{ route('suspendDriver') }}',
					method:"POST",
					data:{id: id, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						swal('Associate'+result, "has been suspended!", "success").then(function(){ 
							window.location.reload()
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});
			}

			function deleteDriver(id){
				swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this driver!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						jQuery.ajax({
							url:'{{ route('deleteDriver') }}',
							method:"POST",
							data:{id: id, _token: '{{csrf_token()}}'},
							success:function(result)
							{
								swal('Associate'+result, "has been deleted!", {
									icon: "success",
								}).then(function(){ 
									window.location.reload()
								}
								);
							},
							error : function(){alert("Something Went Wrong.");},
						});
					} else {
						swal("Associate is safe!").then(function(){ 
							window.location.reload()
						}
						);
					}
				});
			}

			function activateDriver(id){
				jQuery.ajax({
					url:'{{ route('activateDriver') }}',
					method:"POST",
					data:{id: id, _token: '{{csrf_token()}}'},
					success:function(result)
					{
						swal('Driver'+result, "has been activated!", "success").then(function(){ 
							window.location.reload()
						}
						);
					},
					error : function(){alert("Something Went Wrong.");},
				});
			}
		</script>

</body>
</html>
