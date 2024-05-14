<?= view('layouts/header'); ?>

<body class="theme-cyan">

	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="m-t-30 mb-3">
				<h3 style="color: white;"><strong>:: EDMS ::</strong></h3>
			</div>
			<p>Just a moment...</p>
		</div>
	</div>
	<!-- Overlay For Sidebars -->

	<div id="wrapper">

		<?= view('layouts/nav_bar'); ?>
		<?= view('layouts/sidebar'); ?>

		<div id="main-content">
			<div class="container-fluid mb-5">

				<div class="row mt-4">
					<div class="col-md-12 d-flex">
						<?php if ($submit_type == "insert") { ?>
							<h4 class="p-title">New Employee Registration</h4>
						<?php } else { ?>
							<div class="d-flex">
								<img src="<?php if (isset($member) && $member['prof_pic'] != "") {
												echo base_url() . "assets/images/employees/" . $member['prof_pic'];
											} else {
												echo base_url() . "assets/images/employees/user.png";
											} ?>" width="100px" height="100px" alt="" style="border-radius: 20px;">
								<div class="ms-3">
									<h4 class="p-title" style="font-size: 38px;"><?php if (isset($member)) echo $member['name']; ?></h4>
									<div class="d-flex flex-column">
										<label style="font-weight: 400;" style="font-size: 14px;"><?php echo  $member['emp_num']; ?></label>
										<label style="font-weight: 400;" style="font-size: 14px;"><?php echo $member['designation_name']; ?></label>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

				<form id="new_employee_form" enctype="multipart/form-data" data-submit-type="<?php echo $submit_type; ?>">
					<div class="row clearfix mt-4">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="card">
								<div class="header">
									<?php if ($submit_type == "insert") {
									?>
										<h2>Employee Registration<small>You can register a new Employee here.</small> </h2>
									<?php
									} else { ?>
										<h2>Employee Registration Details<small>You can update the selected Employee details here.</small> </h2>
									<?php
									} ?>
								</div>
								<div class="body border-top">
									<div class="row clearfix mb-3">
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Location<font color="#FF0000"><strong>*</strong></font></label>
												<select name="location" id="location" class="js-example-basic-single form-control" style="width: 100%;" <?php if (isset($member)) echo "disabled"; ?> required>
													<option value="0">Select a Location...</option>
													<?php
													if (isset($member)) {
														$selected_location = $member['location_id'];
													} else {
														$selected_location = 0;
													}
													if (isset($locations)) {
														foreach ($locations as $location) {
															if ($selected_location == $location['location_id']) {
																echo '<option value="' . $location['location_id'] . '" selected>' . $location['location_name'] . '</option>';
															} else {
																echo '<option value="' . $location['location_id'] . '">' . $location['location_name'] . '</option>';
															}
														}
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Cost Center<font color="#FF0000"><strong>*</strong></font></label>
												<select name="cost_center" id="cost_center" class="js-example-basic-single form-control" style="width: 100%;" <?php if (isset($member)) echo "disabled"; ?> required>
													<option value="0">Select a Cost Center...</option>
													<?php
													if (isset($member)) {
														echo '<option value="' . $member['cost_center_id'] . '" selected >' . $member['cost_center_name'] . '</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Designation<font color="#FF0000"><strong>*</strong></font></label>
												<select name="designation" id="designation" class="js-example-basic-single form-control" style="width: 100%;" <?php if (isset($member)) echo "disabled"; ?> required>
													<option value="0">Select a Designation...</option>
													<?php
													if (isset($member)) {
														echo '<option value="' . $member['designation_id'] . '" selected >' . $member['designation_name'] . '</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>

									<?php
									// check if the user is not an admin, then readonly attribute
									$readonly  = "readonly";
									if ($user_role == 1) {
										$readonly  = "";
									} ?>
									<div class="row clearfix mb-3">
										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label for="">Select Employee<font color="#FF0000"><strong>*</strong></font></label>
												<select name="employee" id="employee" class="js-example-basic-single form-control" <?php if (isset($member)) echo "disabled"; ?> aria-label=".form-select-sm example">
													<option value="">Select Employee...</option>
													<?php
													if (isset($member)) {
														echo '<option value="' . $member['emp_num'] . '" selected >' . $member['name'] . '</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<input type="hidden" class="form-control" name="id" placeholder="" id="id" value="<?php if (isset($member)) echo $member['id']; ?>">
											<div class="form-group">
												<label>Employee Number<font color="#FF0000"><strong>*</strong></font></label>
												<input type="text" class="form-control" name="employee_number" placeholder="" id="employee_number" value="<?php if (isset($member)) {echo $member['emp_num']; } ?>" readonly>
											</div>
										</div>
									</div>
									<div class="row clearfix mb-3">
										<div class="col-md-8 col-sm-12">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="email" id="email" placeholder="" value="<?php if (isset($member)) echo $member['email']; ?>" <?php echo $readonly ?>>
											</div>
										</div>
										<div class="col-md-4 col-sm-12">
											<div class="form-group">
												<label>Contact Number</label>
												<input type="text" name="contact" id="contact" class="form-control" value="<?php if (isset($member)) echo $member['contact_no']; ?>" <?php echo $readonly ?> maxLength="11">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row clearfix">
						<div class="col-sm-12">
							<?php
							// check if the user is an admin, then show Submit btn
							if ($user_role == 1) {
							?>
								<button type="submit" class="btn btn-primary">Submit</button>
							<?php } ?>
							<a href="<?php echo base_url(); ?>registrations/staff_member" class="btn btn-outline-secondary">Cancel</a>
						</div>
					</div>

				</form>
			</div>
		</div>
		<!-- Loading Modal -->
		<div class="modal" id="loadingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loadingModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content" style="width: 300px; height: 80px; margin-left: 100px; margin-bottom: 100px;">
					<div class="modal-body">
						<div class="d-flex flex-column align-items-center justify-content-center">
							<img src="<?php echo base_url() ?>assets/images/loading.gif" width="30px">
							<label class="form-label">Syncing in Progress...</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Javascript -->
	<?= view('layouts/footer'); ?>

	<script>
		$(document).ready(function() {
			$('.js-example-basic-single').select2({
				placeholder: " Select",
				allowClear: true
			});
			// location select on change event
			$('#location').on('change', function() {
				// #cost_center, #designation, #employee select options reset
				$('#cost_center').html('<option value="0">Select a Cost Center...</option>');
				$('#cost_center').trigger('change');
				// get location_id
				var location_id = $(this).val();
				if (location_id != 0) {
					$.ajax({
						type: "GET",
						url: "<?php echo base_url('data/get_cost_centers'); ?>/" + location_id,
						dataType: "json",
						beforeSend: function() {
							$('#loadingModal').modal('show');
						},
						success: function(response) {
							$('#loadingModal').modal('hide');
							$('#cost_center').html('<option value="0">Select a Cost Center...</option>');
							$.each(response, function(index, value) {
								$('#cost_center').append('<option value="' + value.cost_center_id + '">' + value.cost_center_name + '</option>');
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							$('#loadingModal').modal('hide');
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Something went wrong! Please try again later.',
							});
						}
					});
				}
			});
			// cost_center select on change event
			$('#cost_center').on('change', function() {
				// #designation, #employee select options reset
				$('#designation').html('<option value="0">Select a Designation...</option>');
				$('#designation').trigger('change');
				// get cost_center_id
				var cost_center_id = $(this).val();
				if (cost_center_id != 0) {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('data/get_designations_from_employees'); ?>",
						dataType: "json",
						data: {
							'location': $('#location option:selected').text(),
							'cost_center': $('#cost_center option:selected').text()
						},
						beforeSend: function() {
							$('#loadingModal').modal('show');
						},
						success: function(response) {
							$('#loadingModal').modal('hide');
							$('#designation').html('<option value="0">Select a Designation..</option>');
							$.each(response, function(index, value) {
								$('#designation').append('<option value="' + value.designation + '">' + value.designation + '</option>');
							});
						},
						error: function(jqXHR, textStatus, errorThrown) {
							$('#loadingModal').modal('hide');
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Something went wrong! Please try again later.',
							});
						}
					});
				}
			});

			// designation select on change event
			$('#designation').on('change', function() {
				// #employee select options reset
				$('#employee').html('<option value="0">Select a Employee...</option>');
				$('#employee').trigger('change');
				// get designation_id
				var designation_id = $('#designation option:selected').text();
				if (designation_id != 0) {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url('data/get_employees'); ?>",
						data: {
							'location': $('#location option:selected').text(),
							'cost_center': $('#cost_center option:selected').text(),
							'designation': designation_id
						},
						dataType: "json",
						success: function(response) {
							// console.log(response);
							$('#employee').html('<option value="">Select Employee..</option>');
							$.each(response, function(index, value) {
								$('#employee').append('<option value="' + value.emp_code + '">' + value.emp_code + ' - ' + value.name + " - " + value.designation + '</option>');
							});
						}
					});
				}
			});

			// #employee on change, set employee number
			$('#employee').on('change', function() {
				$('#employee_number').val($(this).val());
			});

			// new_employee_form submit
			$('#new_employee_form').submit(function(e) {
				e.preventDefault();
				var submit_type = $(this).data('submit-type');

				var formData = new FormData(this);
				var url = '<?php echo base_url(); ?>registrations/staff_member/create';

				if (submit_type == 'update') {
					url = '<?php echo base_url(); ?>registrations/staff_member/update';
				}

				$.ajax({
					url: url,
					type: 'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function() {
						$('#new_employee_form button[type="submit"]').attr('disabled', true);
						$('#new_employee_form button[type="submit"]').html('Please wait...');
					},
					success: function(data) {
						console.log(data);
						if (data.status == 201 || data.status == 200) {
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: data.message,
								showConfirmButton: false,
								timer: 2500
							}).then(function() {
								window.location.href = "<?php echo base_url(); ?>registrations/staff_member";
							});
						} else if (data.status == 400) {
							Swal.fire({
								icon: 'warning',
								title: 'Invalid Data',
								text: getErrorText(data.errors),
							});
						} else if (data.status == 409) {
							Swal.fire({
								icon: 'warning',
								title: 'Duplicate NIC',
								text: data.message,
							});
						} else if (data.status == 403) {
							Swal.fire({
								icon: 'warning',
								title: 'Forbidden',
								text: data.message,
							});
						} else if (data.status == 500) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: data.message,
							});
						}
						$('#new_employee_form button[type="submit"]').attr('disabled', false);
						$('#new_employee_form button[type="submit"]').html('Submit');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Something went wrong! Please try again later.',
						});
						$('#new_employee_form button[type="submit"]').attr('disabled', false);
						$('#new_employee_form button[type="submit"]').html('Submit');
					}
				});

			});
		});

		function getErrorText(errors) {
			let errorText = '';

			for (const fieldName in errors) {
				if (errors.hasOwnProperty(fieldName)) {
					errorText += `${errors[fieldName]}\n`;
					break;
				}
			}

			return errorText;
		}
	</script>

</body>

</html>