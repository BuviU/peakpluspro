<?= view('layouts/header'); ?>

<body class="theme-cyan">

	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="m-t-30 mb-3">
				<h3 style="color: white;"><strong>:: EDMS ::</h3>
			</div>
			<p>Just a moment...</p>
		</div>
	</div>
	<!-- Overlay For Sidebars -->

	<div id="wrapper">

		<?= view('layouts/nav_bar'); ?>
		<?= view('layouts/sidebar'); ?>

		<div id="main-content">
			<div class="container-fluid d-flex justify-content-center p-4 pt-5">
				<div class="card px-5" style="height: 100%; width: fit-content;">
					<div class="card-body">
						<div class="row">
							<div class="d-flex justify-content-center">
								<img src="<?php echo base_url(); ?>/assets/images/employees/user.png" alt="profile" class="rounded-circle" width="100" height="100">
							</div>
						</div>
						<div class="row">
							<div class="d-flex flex-column text-center mt-3">
								<h4><strong><?php echo $employee_name; ?></strong></h4>
								<span style="font-weight: 800;"><?php echo $emp_code; ?></span>
								<span style="font-weight: 300;"><?php echo $designation_name; ?></span>
								<span style="font-weight: 300;"><?php echo $cost_center_name; ?></span>
								<span style="font-weight: 300;"><?php echo $location_name; ?></span>
							</div>
						</div>
						<div class="row d-flex justify-content-center mt-4">
							<?php
							if (session()->get('is_admin') == 1) {
								echo '<button class="btn btn-dark" style="width: 300px;" data-bs-toggle="modal" data-bs-target="#changePasswordModal"><i class="icon-lock"></i>&nbsp;&nbsp;&nbsp;Change Password</button>';
							}
							?>
						</div>
						<div class="row d-flex justify-content-center mt-1 mb-3">
							<button id="sign_out" class="btn btn-danger" style="width: 300px;"><i class="icon-power"></i>&nbsp;&nbsp;&nbsp;Sign Out</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Change Password Modal -->
			<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<form id="change_password_form">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="current_password" class="form-label">Current Password<font color="#FF0000"><strong>*</strong></font></label>
											<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password">
											<div class="invalid-feedback" id="current_password_error"></div>
										</div>
									</div>
								</div>

								<div class="row mt-2">
									<div class="col-md-12">
										<div class="form-group">
											<label for="new_password" class="form-label">New Password<font color="#FF0000"><strong>*</strong></font></label>
											<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
											<div class="invalid-feedback" id="new_password_error"></div>
										</div>
									</div>
								</div>

								<div class="row mt-2">
									<div class="col-md-12">
										<div class="form-group">
											<label for="confirm_password" class="form-label">Confirm Password<font color="#FF0000"><strong>*</strong></font></label>
											<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm New Password">
											<div class="invalid-feedback" id="confirm_password_error"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Javascript -->
	<?= view('layouts/footer'); ?>
	<script>
		$(document).ready(function() {
			// change password form
			$('#change_password_form').on('submit', function(e) {
				e.preventDefault();
				// get form data
				var form_data = $(this).serialize();
				// submit form data to api
				$.ajax({
					url: "<?php echo base_url(); ?>my_profile/change_password",
					type: 'POST',
					dataType: 'json',
					data: form_data,
					success: function(response) {
						// check if the response has success
						if (response.status == 201) {
							// hide modal
							$('#changePasswordModal').modal('hide');
							// show success message
							Swal.fire({
								icon: 'success',
								title: 'Success!',
								text: response.message,
							});
						} else {
							// show swal
							Swal.fire({
								icon: 'warning',
								title: 'Warning',
								text: response.message,
							});
						}
					},
					error: function(response) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Something went wrong!',
						});
					}
				});
			});

			// sign out
			$('#sign_out').on('click', function() {
				logout();
			});

			function logout() {
			Swal.fire({
				title: 'Are you sure?',
				text: "You want to logout from the system?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#00a65a',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Logout!'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						url: "<?php echo base_url(); ?>logout",
						method: "GET",
						dataType: null,
						success: function(response) {
							if (response.status == 200) {
								let timerInterval;
								Swal.fire({
									title: "Please Wait...",
									html: response.msg,
									timer: 2000,
									timerProgressBar: false,
									didOpen: () => {
										Swal.showLoading();
									},
									willClose: () => {
										clearInterval(timerInterval);
									}
								}).then((result) => {
									// remove local storge items
									localStorage.removeItem('previousNotifications');
									// redirect to login page
									if (result.dismiss === Swal.DismissReason.timer) {
										var is_admin = "<?php echo session()->get('is_admin'); ?>"
										if (is_admin == 1) {
											window.location.href = "<?php echo base_url() ?>admin";
										} else {
											window.location.href = "<?php echo base_url() ?>";
										}
									}
								});

							}
						},
						error: function(jqXHR, textStatus, errorThrown) {
							Swal.fire({
								title: 'Error!',
								text: errorThrown,
								icon: 'error',
								confirmButtonColor: '#00a65a',
							});
						}
					});
				}
			});
		}
		});
	</script>
</body>

</html>