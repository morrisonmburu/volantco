<!-- Modal HTML Markup -->
<div id="ModalServiceForm2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalServiceForm2" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" role="document">
			<div class="modal-header">
				<h4 class="modal-title text-xs-center">Edit Service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
				<div class="stepwizard">
					<div class="stepwizard-row setup-panel">
						<div class="stepwizard-step">
							<a href="#step-12" type="button" style="background-color: #C0392B;" class="btn btn-primary btn-circle"><i style="font-size: 30px;" class="fas fa-cogs"></i></a>
							<p>General Settings</p>
						</div>
						<div class="stepwizard-step">
							<a href="#step-22" type="button" style="background-color: #C0392B;" class="btn btn-default btn-circle disabled"><i style="font-size: 30px;"  class="fas fa-money-check-alt"></i></a>
							<p>Payment Methods</p>
						</div>
						<div class="stepwizard-step">
							<a href="#step-33" type="button" style="background-color: #C0392B;" class="btn btn-default btn-circle disabled"><i style="font-size: 30px;"  class="fas fa-dollar-sign"></i></a>
							<p>Fee Settings</p>
						</div>
					</div>
				</div>

				<div class="row setup-content" id="step-12">
					<div class="col-xs-12">
							<div class="col-md-11">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Service Type*</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Service Type" name="s_type" id="s-type2">
												<option id="se-type"></option>
												<option>Classic</option>
												<option>Business</option>
												<option>Corporate</option>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label">Name</label>
											<input  maxlength="100" type="text" required class="form-control" placeholder="Name" name="Name" id="Name"/>
										</div>

										<div class="form-group">
											<label class="control-label">Rate Type*</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Rate Type" name="r_type" id="r-type2">
												<option id="ra-type"></option>
												<option>Regular</option>
												<option>Hourly</option>
											</select>
										</div>
									</div>

									<div class="col-sm-6">
										<div class="form-group">
											<label class="control-label">Instant Bookings*</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Instant Booking" name="instant_book" id="instant_book2">
												<option id="instant-book"></option>
												<option>Enable</option>
												<option>Disable</option>
											</select>
										</div>

										<div class="form-group">
											<label class="control-label">Number of passanger seats</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Number of passanger seats" id="p_number" name="p_number2">
												<option id="pa-number"></option>
												<?php for ($i=0; $i <= 50; $i++): ?>
												<option>{{ $i }}</option>
												<?php endfor; ?>
											</select>
											<input type="hidden" name="id" id="id_number">
										</div>
									</div>
								</div>
							</div>

						<div class="row">
							<div class="col-sm-8"></div>
							<div class="col-sm-2">
								<button style="background-color: #C0392B;" class="btn btn-primary nextBtn2 pull-right" type="button" >Next</button>
							</div>
							<div class="col-sm-2">
								<button onclick="updateService()" class="btn btn-success pull-right">Save!</button>
							</div>
						</div>

					</div>
				</div>
				<div class="row setup-content" id="step-22">
					<div class="col-xs-12">
						<div class="col-md-11">

							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label">Payment Method*</label>
										<select maxlength="100" type="text" required class="form-control" placeholder="Payment Method" name="payment_method" id="payment-method2">
											<option id="payment_method"></option>
											<option>Mpesa</option>
											<option>Cash On Delivery</option>
										</select>
									</div>

								</div>
								<div class="col-md-2"></div>
							</div>
							<div class="row">
								<div class="col-sm-8"></div>
								<div class="col-sm-2">
									<button style="background-color: #C0392B;" class="btn btn-primary nextBtn2 pull-right" type="button" >Next</button>
								</div>
								<div class="col-sm-2">
									<button onclick="updateService()" class="btn btn-success pull-right">Save!</button>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="row setup-content" id="step-33">
					<div class="col-xs-12">
						<div class="col-md-11">
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label">Per Minute Cost*</label>
										<input  maxlength="100" type="text" required class="form-control" placeholder="Per Minute Cost" name="per_minute" id="per-minute"/>
									</div>

									<div class="form-group">
										<label class="control-label">Per Kilometer Cost*</label>
										<input  maxlength="100" type="text" required class="form-control" placeholder="Per Kilometer Cost" name="per_kilometer" id="per-kilometer"/>
									</div>

									<div class="form-group">
										<label class="control-label">Default Cost*</label>
										<input  maxlength="100" type="text" required class="form-control" placeholder="Default Cost" name="default_cost" id="default-cost"/>
									</div>
									<input type="hidden" name="id_number" id="id_number">
								</div>
								<div class="col-md-2"></div>
							</div>

							<div class="row">
								<div class="col-sm-6">

								</div>
								<div class="col-sm-6">
									<button onclick="updateService()" class="btn btn-success pull-right">Save!</button>
								</div>
							</div>
						</div>
					</div>
				</div>

		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	var navListItems = $('div.setup-panel div a'),
		allWells = $('.setup-content'),
		allNextBtn2 = $('.nextBtn2');

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

			allNextBtn2.click(function(){
				var curStep = $(this).closest(".setup-content"),
				curStepBtn = curStep.attr("id"),
				nextStepWizard2 = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
				curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'], select[type='text'], input[type='number']"),
				isValid = true;

				$(".form-group").removeClass("has-error");

				for(var i=0; i<curInputs.length; i++){
					if (!curInputs[i].validity.valid){
						isValid = false;
						$(curInputs[i]).closest(".form-group").addClass("has-error");
					}
				}

				if (isValid){
					nextStepWizard2.removeClass('disabled').trigger('click');
				}
			});

			$('div.setup-panel div a.btn-primary').trigger('click');
</script>