@extends("dashboard.includes.main")

@section("content")

<!-- Page container -->
<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">


			<!-- Content area -->
			<div class="content">
				<!-- User profile -->
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<div class="content-group">
						<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
							<div class="content-group-sm">
								<h6 class="text-semibold no-margin-bottom">
									Messenger/Skater
								</h6>

								<span class="display-block">metro deliveries</span>
							</div>

							<a href="#" class="display-inline-block content-group-sm">
								<img src="/images/packages.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
							</a>
						</div>

						<div class="panel no-border-top no-border-radius-top">
							<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
								<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
								<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Light Unit Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[0]->light_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Light Unit Distance <span class="badge bg-info-400">{{ $data[0]->light_unit_distance }} Kms</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Light Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[0]->light_unit_additional_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[0]->additional_location }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[0]->insurance }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[0]->waiting_time }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[0]->loading }}</span></a></li>

								<div style="margin-left: 50px;">
									<button onclick="update_pricing('{{ $data[0]->id }}', '{{ $data[0]->light_price }}', '{{ $data[0]->light_unit_distance }}', '{{ $data[0]->light_unit_additional_price }}', '{{ $data[0]->additional_location }}', '{{ $data[0]->insurance }}', '{{ $data[0]->waiting_time }}', '{{ $data[0]->loading }}')" class="btn btn-info btn-sm">Update Messenger/skater Pricing</button>
								</div>
							</ul>
						</div>
					</div>
					</div>

					<div class="col-md-4">
						<div class="content-group">
						<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
							<div class="content-group-sm">
								<h6 class="text-semibold no-margin-bottom">
									MotorCycle / Express Bike
								</h6>

								<span class="display-block">metro deliveries</span>
							</div>

							<a href="#" class="display-inline-block content-group-sm">
								<img src="/images/motorcycle.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
							</a>
						</div>

						<div class="panel no-border-top no-border-radius-top">
							<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
								<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
								<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Light Unit Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[1]->light_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Light Unit Distance <span class="badge bg-info-400">{{ $data[1]->light_unit_distance }} Kms</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Light Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[1]->light_unit_additional_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[1]->additional_location }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[1]->insurance }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[1]->waiting_time }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[1]->loading }}</span></a></li>

								<div style="margin-left: 30px;">
									<button onclick="update_pricing('{{ $data[1]->id }}','{{ $data[1]->light_price }}', '{{ $data[1]->light_unit_distance }}', '{{ $data[1]->light_unit_additional_price }}', '{{ $data[1]->additional_location }}', '{{ $data[1]->insurance }}', '{{ $data[1]->waiting_time }}', '{{ $data[1]->loading }}')" class="btn btn-info btn-sm">Update MotorCycle / Express Bike Pricing</button>
								</div>
							</ul>
						</div>
					</div>
					</div>
					<div class="col-md-2"></div>
				</div>

				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-4">
						<div class="content-group">
						<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
							<div class="content-group-sm">
								<h6 class="text-semibold no-margin-bottom">
									Pickup
								</h6>

								<span class="display-block">metro deliveries</span>
							</div>

							<a href="#" class="display-inline-block content-group-sm">
								<img src="/images/pickup.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
							</a>
						</div>

						<div class="panel no-border-top no-border-radius-top">
							<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
								<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
								<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Medium Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[2]->medium_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Medium Unit Distance <span class="badge bg-info-400">{{ $data[2]->medium_unit_distance }} Kms</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Medium Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[2]->medium_unit_additional_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[2]->additional_location }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[2]->insurance }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[2]->waiting_time }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[2]->loading }}</span></a></li>

								<div style="margin-left: 70px;">
									<button onclick="update_pricing('{{ $data[2]->id }}','{{ $data[2]->medium_price }}', '{{ $data[2]->medium_unit_distance }}', '{{ $data[2]->medium_unit_additional_price }}', '{{ $data[2]->additional_location }}', '{{ $data[2]->insurance }}', '{{ $data[2]->waiting_time }}', '{{ $data[2]->loading }}')" class="btn btn-info btn-sm">Update Pickup Pricing</button>
								</div>
							</ul>
						</div>
					</div>
					</div>
					<div class="col-md-4">
						<div class="content-group">
						<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
							<div class="content-group-sm">
								<h6 class="text-semibold no-margin-bottom">
									Van
								</h6>

								<span class="display-block">metro deliveries</span>
							</div>

							<a href="#" class="display-inline-block content-group-sm">
								<img src="/images/delivery3.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
							</a>
						</div>

						<div class="panel no-border-top no-border-radius-top">
							<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
								<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
								<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Medium Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[3]->medium_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Medium Unit Distance <span class="badge bg-info-400">{{ $data[3]->medium_unit_distance }} Kms</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Medium Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[3]->medium_unit_additional_price }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[3]->additional_location }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[3]->insurance }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[3]->waiting_time }}</span></a></li>
								<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[3]->loading }}</span></a></li>

								<div style="margin-left: 70px;">
									<button onclick="update_pricing('{{ $data[3]->id }}','{{ $data[3]->medium_price }}', '{{ $data[3]->medium_unit_distance }}', '{{ $data[3]->medium_unit_additional_price }}', '{{ $data[3]->additional_location }}', '{{ $data[3]->insurance }}', '{{ $data[3]->waiting_time }}', '{{ $data[3]->loading }}')" class="btn btn-info btn-sm">Update Van Pricing</button>
								</div>
							</ul>
						</div>
					</div>
					</div>
					<div class="col-md-2"></div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										3 Tonne Truck
									</h6>

									<span class="display-block">metro deliveries</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/delivery.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Price/Base Price<span class="badge bg-info-400">Ksh {{ $data[4]->heavy_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Heavy Unit Distance <span class="badge bg-info-400">{{ $data[4]->heavy_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[4]->heavy_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[4]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[4]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[4]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[4]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[4]->id }}','{{ $data[4]->heavy_price }}', '{{ $data[4]->heavy_unit_distance }}', '{{ $data[4]->heavy_unit_additional_price }}', '{{ $data[4]->additional_location }}', '{{ $data[4]->insurance }}', '{{ $data[4]->waiting_time }}', '{{ $data[4]->loading }}')" class="btn btn-info btn-sm">Update 3 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										5 Tonne Truck
									</h6>

									<span class="display-block">metro deliveries</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/truck.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[5]->heavy_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Heavy Unit Distance <span class="badge bg-info-400">{{ $data[5]->heavy_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[5]->heavy_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[5]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[5]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[5]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[5]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[5]->id }}','{{ $data[5]->heavy_price }}', '{{ $data[5]->heavy_unit_distance }}', '{{ $data[5]->heavy_unit_additional_price }}', '{{ $data[5]->additional_location }}', '{{ $data[5]->insurance }}', '{{ $data[5]->waiting_time }}', '{{ $data[5]->loading }}')" class="btn btn-info btn-sm">Update 5 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										10 Tonne Truck
									</h6>

									<span class="display-block">metro deliveries</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/trailer2.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;">Pricing</li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[6]->heavy_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Heavy Unit Distance <span class="badge bg-info-400">{{ $data[6]->heavy_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[6]->heavy_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[6]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[6]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[6]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[6]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[6]->id }}','{{ $data[6]->heavy_price }}', '{{ $data[6]->heavy_unit_distance }}', '{{ $data[6]->heavy_unit_additional_price }}', '{{ $data[6]->additional_location }}', '{{ $data[6]->insurance }}', '{{ $data[6]->waiting_time }}', '{{ $data[6]->loading }}')" class="btn btn-info btn-sm">Update 10 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										28 Tonne Truck
									</h6>

									<span class="display-block">metro deliveries</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/trailer4.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header" style="margin-right: 40px;"> <span class="badge bg-info-400">Special Pricing</span></li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[12]->heavy_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Heavy Unit Distance <span class="badge bg-info-400">{{ $data[12]->heavy_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Heavy Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[12]->heavy_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[12]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[12]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[12]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[12]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[12]->id }}','{{ $data[12]->heavy_price }}', '{{ $data[12]->heavy_unit_distance }}', '{{ $data[12]->heavy_unit_additional_price }}', '{{ $data[12]->additional_location }}', '{{ $data[12]->insurance }}', '{{ $data[12]->waiting_time }}', '{{ $data[12]->loading }}')" class="btn btn-info btn-sm">Update 28 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
							<div class="content-group">
								<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
									<div class="content-group-sm">
										<h6 class="text-semibold no-margin-bottom">
											Pickup Cargo

										</h6>
										<span class="display-block">Cargo & Freight</span>
									</div>

									<a href="#" class="display-inline-block content-group-sm">
										<img src="/images/pickup.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
									</a>
								</div>

								<div class="panel no-border-top no-border-radius-top">
									<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
										<li class="nav-item-header text-center" style="color:#fff;"> Pricing </li>
										<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Cargo Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[13]->cargo_price }}</span></a></li>
										<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Cargo Unit Distance <span class="badge bg-info-400">{{ $data[13]->cargo_unit_distance }} Kms</span></a></li>
										<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i>Cargo Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[13]->cargo_unit_additional_price }}</span></a></li>
										<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[13]->additional_location }}</span></a></li>
										<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[13]->insurance }}</span></a></li>
										<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[13]->waiting_time }}</span></a></li>
										<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[13]->loading }}</span></a></li>

										<div style="margin-left: 20px;">
											<button onclick="update_pricing('{{ $data[13]->id }}','{{ $data[13]->cargo_price }}', '{{ $data[13]->cargo_unit_distance }}', '{{ $data[13]->cargo_unit_additional_price }}', '{{ $data[13]->additional_location }}', '{{ $data[13]->insurance }}', '{{ $data[13]->waiting_time }}', '{{ $data[13]->loading }}')" class="btn btn-info btn-sm">Update Pickup Cargo Pricing</button>
										</div>
									</ul>
								</div>
							</div>
					</div>
					<div class="col-md-4">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										3 Tonne Truck Cargo
									</h6>
									<span class="display-block">Cargo & Freight</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/truck.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;"> Pricing </li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Cargo Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[7]->cargo_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Cargo Unit Distance <span class="badge bg-info-400">{{ $data[7]->cargo_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i>Cargo Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[7]->cargo_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[7]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[7]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[7]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[7]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[7]->id }}','{{ $data[7]->cargo_price }}', '{{ $data[7]->cargo_unit_distance }}', '{{ $data[7]->cargo_unit_additional_price }}', '{{ $data[7]->additional_location }}', '{{ $data[7]->insurance }}', '{{ $data[7]->waiting_time }}', '{{ $data[7]->loading }}')" class="btn btn-info btn-sm">Update 3 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										5 Tonne Truck Cargo
									</h6>
									<span class="display-block">Cargo & Freight</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/trailer.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;"> Pricing </li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Cargo Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[8]->cargo_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Cargo Unit Distance <span class="badge bg-info-400">{{ $data[8]->cargo_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i>Cargo Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[8]->cargo_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[8]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[8]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[8]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[8]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[8]->id }}','{{ $data[8]->cargo_price }}', '{{ $data[8]->cargo_unit_distance }}', '{{ $data[8]->cargo_unit_additional_price }}', '{{ $data[8]->additional_location }}', '{{ $data[8]->insurance }}', '{{ $data[8]->waiting_time }}', '{{ $data[8]->loading }}')" class="btn btn-info btn-sm">Update 5 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										10 Tonne Truck Cargo
									</h6>
									<span class="display-block">Cargo & Freight</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/trailer2.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;"> Pricing </li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Cargo Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[9]->cargo_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Cargo Unit Distance <span class="badge bg-info-400">{{ $data[9]->cargo_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i>Cargo Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[9]->cargo_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[9]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[9]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[9]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[9]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[9]->id }}','{{ $data[9]->cargo_price }}', '{{ $data[9]->cargo_unit_distance }}', '{{ $data[9]->cargo_unit_additional_price }}', '{{ $data[9]->additional_location }}', '{{ $data[9]->insurance }}', '{{ $data[9]->waiting_time }}', '{{ $data[9]->loading }}')" class="btn btn-info btn-sm">Update 10 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
					</div>
					</div>
					<div class="col-md-4">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										14 Tonne Truck Cargo
									</h6>
									<span class="display-block">Cargo & Freight</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/trailer4.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;"> Pricing </li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Cargo Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[10]->cargo_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Cargo Unit Distance <span class="badge bg-info-400">{{ $data[10]->cargo_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i>Cargo Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[10]->cargo_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[10]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[10]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[10]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[10]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[10]->id }}','{{ $data[10]->cargo_price }}', '{{ $data[10]->cargo_unit_distance }}', '{{ $data[10]->cargo_unit_additional_price }}', '{{ $data[10]->additional_location }}', '{{ $data[10]->insurance }}', '{{ $data[10]->waiting_time }}', '{{ $data[10]->loading }}')" class="btn btn-info btn-sm">Update 14 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="content-group">
							<div class="card-body bg-indigo-400 border-radius-top text-center" style="background-color: #8F0236; background-size: contain;">
								<div class="content-group-sm">
									<h6 class="text-semibold no-margin-bottom">
										28 Tonne Truck Cargo
									</h6>
									<span class="display-block">Cargo & Freight</span>
								</div>

								<a href="#" class="display-inline-block content-group-sm">
									<img src="/images/trailer4.png" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
								</a>
							</div>

							<div class="panel no-border-top no-border-radius-top">
								<ul class="nav nav-sidebar mb-2" style="background-color: #1A2370;">
									<li class="nav-item-header text-center" style="color:#fff;"> Pricing </li>
									<li class="nav-item"><a style="color:#fff;" href="#profile" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Cargo Price/Base Price <span class="badge bg-info-400">Ksh {{ $data[11]->cargo_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#schedule" class="nav-link" data-toggle="tab"><i class="icon-road"></i>Cargo Unit Distance <span class="badge bg-info-400">{{ $data[11]->cargo_unit_distance }} Kms</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#messages" class="nav-link" data-toggle="tab"><i class="icon-cash"></i>Cargo Unit Additional Price <span class="badge bg-info-400">Ksh {{ $data[11]->cargo_unit_additional_price }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Additional Location Price <span class="badge bg-info-400">Ksh {{ $data[11]->additional_location }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Insurance <span class="badge bg-info-400">Ksh {{ $data[11]->insurance }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Waiting Price <span class="badge bg-info-400">Ksh {{ $data[11]->waiting_time }}</span></a></li>
									<li class="nav-item"><a style="color:#fff;" href="#orders" class="nav-link" data-toggle="tab"><i class="icon-cash"></i> Loading Price <span class="badge bg-info-400">Ksh {{ $data[11]->loading }}</span></a></li>

									<div style="margin-left: 20px;">
										<button onclick="update_pricing('{{ $data[11]->id }}', '{{ $data[11]->cargo_price }}', '{{ $data[11]->cargo_unit_distance }}', '{{ $data[11]->cargo_unit_additional_price }}', '{{ $data[11]->additional_location }}', '{{ $data[11]->insurance }}', '{{ $data[11]->waiting_time }}', '{{ $data[11]->loading }}')" class="btn btn-info btn-sm">Update 28 Tonne Truck Pricing</button>
									</div>
								</ul>
							</div>
					</div>
					</div>
				</div>
				<!-- /user profile -->

				<!-- Footer -->
				<div class="footer text-muted">
					&copy; 2020. <a href="#">Volant Ltd</a> by <a href="https://volantltd.com" target="_blank">Volant Ltd</a>
				</div>
				<!-- /footer -->
				<div id="modal_form_vertical" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h5 class="modal-title">Update Volant Pricing</h5>
							</div>

								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label> Base Price </label>
												<input type="number" id="base_price" class="form-control">
											</div>

											<div class="col-sm-6">
												<label>Unit Distance</label>
												<input type="number" id="unit_distance" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label> Unit Additional Price </label>
												<input type="number" id="unit_additional_price" class="form-control" required>
											</div>

											<div class="col-sm-6">
												<label>Additional Location Price</label>
												<input type="number" id="additional_location_price" class="form-control" required>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label> Insurance </label>
												<input type="number" id="insurance" class="form-control" required>
											</div>

											<div class="col-sm-6">
												<label>Waiting Price</label>
												<input type="number" id="waiting_time" class="form-control">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6">
												<label> Loading Price </label>
												<input type="number" id="loading_price" class="form-control">
											</div>
										</div>
									</div>
									<input type="hidden" id="id_number" name="id_number" required>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="submit" onclick="updateVolantPricing()" class="btn btn-info">Update Pricing</button>
								</div>
						</div>
					</div>
				</div>
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

<script type="text/javascript">
	function update_pricing(id, base_price, unit_distance, unit_additional_price, additional_location, insurance, waiting_time, loading){
		$("#base_price").val(base_price);
		$("#unit_distance").val(unit_distance);
		$("#unit_additional_price").val(unit_additional_price);
		$("#additional_location_price").val(additional_location);
		$("#insurance").val(insurance);
		$("#waiting_time").val(waiting_time);
		$("#loading_price").val(loading);
		$("#id_number").val(id);
		$('#modal_form_vertical').modal();
	}

	function updateVolantPricing(){
		var base_price = $("#base_price").val();
		var unit_distance = $("#unit_distance").val();
		var unit_additional_price = $("#unit_additional_price").val();
		var additional_location_price = $("#additional_location_price").val();
		var insurance = $("#insurance").val();
		var waiting_time = $("#waiting_time").val();
		var loading_price = $("#loading_price").val();
		var id = $("#id_number").val();

		swal({
		  title: "Are you sure?",
		  text: "Once Updated the volant pricings will change in all volant applications!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willUpdate) => {
		  if (willUpdate) {

		  	$.ajax({
				type: 'POST',
				url: '{{ route('volant_pricings.update') }}',
				data: {id:id, base_price: base_price, unit_distance: unit_distance, unit_additional_price: unit_additional_price, additional_location_price: additional_location_price, insurance: insurance, waiting_time: waiting_time, loading_price: loading_price ,_token: '{{csrf_token()}}'},
				success: function(result){
					swal({
					  title: result,
					  text: "Volant Pricing Successfully Updated",
					  icon: "success",
					  button: "Ok",
					}).then(() => {
						location.reload()
					});
				},
				error: function(result){

				}
			});
		  } else {
		  	swal({
			  title: "Volant Pricing",
			  text: "Safe!",
			  icon: "success",
			});
		  }
		});
	}
</script>

@endsection