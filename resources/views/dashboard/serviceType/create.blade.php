<!-- Modal HTML Markup -->
<div id="ModalServiceForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ModalServiceForm" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" role="document">
			<div class="modal-header">
				<h4 class="modal-title text-xs-center">Create Service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<input type="hidden" name="_token" id="csrf-token" value="{{csrf_token()}}" />
				<div class="stepwizard">
					<div class="stepwizard-row setup-panel1">
						<div class="stepwizard-step">
							<a href="#step-14" type="button" style="background-color: #C0392B;" class="btn btn-primary btn-circle"><i style="font-size: 30px;" class="fas fa-cogs"></i></a>
							<p>General Settings</p>
						</div>
						<div class="stepwizard-step">
							<a href="#step-24" type="button" style="background-color: #C0392B;" class="btn btn-default btn-circle disabled"><i style="font-size: 30px;"  class="fas fa-money-check-alt"></i></a>
							<p>Payment Methods</p>
						</div>
						<div class="stepwizard-step">
							<a href="#step-34" type="button" style="background-color: #C0392B;" class="btn btn-default btn-circle disabled"><i style="font-size: 30px;"  class="fas fa-dollar-sign"></i></a>
							<p>Fee Settings</p>
						</div>
					</div>
				</div>
				<div class="row setup-content1" id="step-14">
					<div class="col-xs-12">
						<div class="col-md-11">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
											<label class="control-label">Service Type*</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Service Type" name="s_type" id="s-type">
												<option></option>
												<option>Classic</option>
												<option>Business</option>
												<option>Corporate</option>
											</select>
									</div>

									<div class="form-group">
										<label class="control-label">Name</label>
										<input  maxlength="100" type="text" required class="form-control" placeholder="Name" name="Name" id="name"/>
									</div>
									
									<div class="form-group">
											<label class="control-label">Rate Type*</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Rate Type" name="r_type" id="ra_type">
												<option></option>
												<option>Regular</option>
												<option>Hourly</option>
											</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
											<label class="control-label">Instant Bookings*</label>
											<select maxlength="100" type="text" required class="form-control" placeholder="Rate Type" name="instant_book" id="instant_book">
												<option></option>
												<option>Enable</option>
												<option>Disable</option>
											</select>
									</div>

									<div class="form-group">
										<label class="control-label">Number of passanger seats</label>
										<select maxlength="100" type="text" required class="form-control" placeholder="Number of passanger seats" id="p_number" name="p_number">
											<option></option>
											<?php for ($i=0; $i <= 50; $i++): ?>
											<option>{{ $i }}</option>
											<?php endfor; ?>
										</select>
										<input type="hidden" name="id" id="id_number">
									</div>
								</div>
							</div>
								
							</div>
								<button style="background-color: #C0392B;" class="btn btn-primary nextBtn1 pull-right" type="button">Next</button>
							</div>
						</div>
				<div class="row setup-content1" id="step-24">
					<div class="col-xs-12">
						<div class="col-md-11">

							<div class="row">

							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="form-group">
									<label class="control-label">Payment Method*</label>
									<select maxlength="100" type="text" required class="form-control" placeholder="Payment Method" name="payment_method" id="payment-method">
										<option></option>
										<option>Mpesa</option>
										<option>Cash On Delivery</option>
									</select>
								</div>

							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="row">
							
								<button style="background-color: #C0392B;" class="btn btn-primary nextBtn1 pull-right" type="button" >Next</button>
							
						</div>

					</div>
				</div>
			</div>
			<div class="row setup-content1" id="step-34">
				<div class="col-xs-12">
					<div class="col-md-11">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="form-group">
										<label class="control-label">Per Minute Cost*</label>
										<input  maxlength="100" type="number" required class="form-control" placeholder="Per Minute Cost" name="per_minute" id="per_minute"/>
								</div>

								<div class="form-group">
										<label class="control-label">Per Kilometer Cost*</label>
										<input  maxlength="100" type="number" required class="form-control" placeholder="Per Kilometer Cost" name="per_kilometer" id="per_kilometer"/>
								</div>

								<div class="form-group">
										<label class="control-label">Default Cost*</label>
										<input  maxlength="100" type="number" required class="form-control" placeholder="Default Cost" name="default_cost" id="default_cost"/>
								</div>
							</div>
							<div class="col-md-2"></div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								
							</div>
							<div class="col-sm-6">
								<button id="createService" class="btn btn-success pull-right">Save!</button>
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
	var navListItems1 = $('div.setup-panel1 div a'),
		allWells1 = $('.setup-content1'),
		allNextBtn1 = $('.nextBtn1');

		allWells1.hide();

		navListItems1.click(function (e) {
			e.preventDefault();
		var $target1 = $($(this).attr('href')),
		$item1 = $(this);

		if (!$item1.hasClass('disabled')) {
		navListItems1.removeClass('btn-primary').addClass('btn-default');
		$item1.addClass('btn-primary');
		allWells1.hide();
		$target1.show();
		$target1.find('input:eq(0)').focus();
	}
	});

			allNextBtn1.click(function(){
				var curStep1 = $(this).closest(".setup-content1"),
				curStepBtn1 = curStep1.attr("id"),
				nextStepWizard1 = $('div.setup-panel1 div a[href="#' + curStepBtn1 + '"]').parent().next().children("a"),
				curInputs1 = curStep1.find("input[type='text'],input[type='url'],input[type='email'], select[type='text'], input[type='number']"),
				isValid1 = true;

				$(".form-group").removeClass("has-error");
				for(var i=0; i<curInputs1.length; i++){
					if (!curInputs1[i].validity.valid){
						isValid1 = false;
						$(curInputs1[i]).closest(".form-group").addClass("has-error");
					}
				}

				if (isValid1){
					nextStepWizard1.removeClass('disabled').trigger('click');
				}
			});

			$('div.setup-panel1 div a.btn-primary').trigger('click');
</script>