

		
				<div class="container">

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
					<div class="row setup-content" id="step-1">
						<div class="col-xs-12">

							<button style="background-color: #C0392B;" class="btn btn-primary nextBtn pull-right" type="button">Next</button>

						</div>
					</div>
					<div class="row setup-content" id="step-2">
						<div class="col-xs-12">
							<div class="col-md-11">

								
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
				<div class="row setup-content" id="step-3">
					<div class="col-xs-12">
						<div class="col-md-11">
							<p class="text-center" style="margin-top: 20px;">DRIVER DOCUMENTS NOT UPLOADED</p>
							<button onclick="updateDriver()" class="btn btn-success pull-right">Save!</button>
						</div>
					</div>
				</div>

			</div>

