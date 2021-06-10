@extends("settings.includes.main")

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
					<div class="col-lg-9">
						<div class="tabbable">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="activity">

									<!-- Timeline -->
									<div class="timeline timeline-left content-group">
										<div class="timeline-container">

											<!-- Blog post -->
											<div class="timeline-row">
												<div class="timeline-icon">
													<div class="bg-success-400">
														<i class="icon-user"></i>
													</div>
												</div>

												<div class="panel panel-flat timeline-content">
													<div class="panel-heading">
														<h6 class="panel-title">Admin User Settings</h6>
													</div>

													<div class="panel-body">

														<div class="form-group">
															<div class="row">
																<div id="error-user" class="alert alert-danger alert-styled-left alert-bordered">
																		<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
																		<span class="text-semibold">Oh snap!</span> <span id="error-user-message"></span> <a href="#" class="alert-link">try submitting again</a>.
																	</div>
																<div class="col-md-6">
																	<label>Username</label>
																	<input type="text" required class="form-control" name="username" id="username" placeholder="Username" value="{{ $user->name }}">
																</div>
																<div class="col-md-6">
																	<label>Email Address</label>
																	<input type="text" required class="form-control" name="email" id="email" placeholder="email Address" value="{{ $user->email }}">
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<label>Change Admin Password</label>
																	<input type="password" required class="form-control" name="password" id="password">
																</div>
															</div>
														</div>
														
													</div>

													<div class="panel-footer panel-footer-transparent">
														<div class="col-md-3"></div>
														<div class="col-md-6">
															<button id="addUserSettings" class="btn btn-block btn-success btn-md">Save</button>
														</div>
														<div class="col-md-3"></div>
													</div>
												</div>
											</div>
											<!-- /blog post -->


											<!-- Invoices -->
											<div class="timeline-row">
												<div class="timeline-icon">
													<div class="bg-success-400">
														<i class="icon-cash3"></i>
													</div>
												</div>

												<div class="row">

													<div class="col-lg-12">
														<div class="panel border-left-lg border-left-success invoice-grid timeline-content">
															<div class="panel-heading">
																<h6 class="panel-title">Mpesa Payment Settings</h6>
															</div>
															<div class="panel-body">
																<div class="row">
																	<div id="error-mpesa" class="alert alert-danger alert-styled-left alert-bordered">
																		<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
																		<span class="text-semibold">Oh snap!</span> <span id="error-mpesa-message"></span> <a href="#" class="alert-link">try submitting again</a>.
																	</div>
																	<div class="col-md-12">
																		<label>Mpesa consumerKey</label>
																		<input type="text" required class="form-control" name="m-cosumerKey" id="m-cosumerKey" placeholder="Mpesa consumerKey" value="{{ (($data) ? $data->mpesa_consumerKey : '') }}">
																	</div>

																	<div class="col-md-12">
																		<label>Mpesa consumerSecret</label>
																		<input type="text" required class="form-control" name="m-consumerSecret" id="m-consumerSecret" placeholder="Mpesa consumerSecret" value="{{ (($data) ? $data->mpesa_consumerSecret : '') }}">
																	</div>
																</div>
																<input type="hidden" name="id_number" id="id_number" value="{{ $user->id }}">
															</div>
															<div style="padding-top: 63px;"></div>
															<div class="panel-footer panel-footer-condensed">
																<div class="col-md-3"></div>
																<div class="col-md-6">
																	<button id="addMpesaSettings" class="btn btn-block btn-info btn-md">Save</button>
																</div>
																<div class="col-md-3"></div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /invoices -->
										</div>
									</div>
									<!-- /timeline -->

								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3">

						<!-- User thumbnail -->
						<div class="thumbnail">
							<div class="thumb thumb-rounded thumb-slide">
								<img src="/images/logo.jpg" alt="">
								<div class="caption">
									<span>
										<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
										<a href="user_pages_profile" class="btn bg-success-400 btn-icon btn-xs"><i class="icon-link"></i></a>
									</span>
								</div>
							</div>

							<div class="caption text-center">
								<h6 class="text-semibold no-margin">Job Oyagi <small class="display-block">CEO & Founder</small></h6>
								<ul class="icons-list mt-15">
									<li><a href="#" data-popup="tooltip" title="Google Drive"><i class="icon-google-drive"></i></a></li>
									<li><a href="#" data-popup="tooltip" title="Twitter"><i class="icon-twitter"></i></a></li>
									<li><a href="#" data-popup="tooltip" title="google"><i class="icon-google"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- /user thumbnail -->

					</div>
				</div>
				<!-- /user profile -->

				<!-- Footer -->
				<div class="footer text-muted">
					&copy; 2020. <a href="#">Volant Ltd</a> by <a href="https://volantco.net" target="_blank">Volant Ltd</a>
				</div>
				<!-- /footer -->

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

	$(document).ready(function(){
		$("#error-mpesa").hide();
		$("#error-user").hide();
	});

	$("#addMpesaSettings").click(function(e){
		e.preventDefault()
		var mpesa_consumerKey = $("#m-cosumerKey").val()
		var mpesa_consumerSecret = $("#m-consumerSecret").val()
		var user_id = $("#id_number").val()

		jQuery.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:'{{ route("settings.mpesa") }}',
			method:"POST",
			data:{mpesa_consumerKey: mpesa_consumerKey, mpesa_consumerSecret: mpesa_consumerSecret, user_id: user_id},
			success:function(result)
			{
				// $("#error-mpesa").show()
				if(result.errors){
					var error1 = JSON.stringify(result.errors.mpesa_consumerKey[0]);
					var error2 = JSON.stringify(result.errors.mpesa_consumerSecret[0]);

					$("#error-mpesa-message").html(
						'<p>'+error1+'</p>'+'<p>'+error2+'</p>'
						)
					$("#error-mpesa").show()
				}else{
					swal('Mpesa',"Settings have been updated successfully!", "success").then(function(){ 
						window.location.reload()
					}
					);
				}
				
			},
			error : function(error){
				alert("Something Went Wrong.");
			},
		});		
	});

	$("#addUserSettings").click(function(e){
		e.preventDefault()
		var username = $("#username").val()
		var email = $("#email").val()
		var password = $("#password").val()
		var user_id = $("#id_number").val()

		jQuery.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:'{{ route("settings.user") }}',
			method:"POST",
			data:{username: username, email: email, password: password, user_id: user_id},
			success:function(result)
			{
				// $("#error-mpesa").show()
				if(result.errors){

					var error1 = JSON.stringify(result.errors);

					$("#error-user-message").html(
						'<p>'+error1+'</p>'
						)
					$("#error-user").show()
				}else{
					swal('User'+result.id, "Settings have been updated successfully!", "success").then(function(){ 
						window.location.reload()
					}
					);
				}
				
			},
			error : function(error){
				alert("Something Went Wrong.");
			},
		});		
	});
</script>

@endsection