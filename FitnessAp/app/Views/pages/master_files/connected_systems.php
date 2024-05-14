<?= view('layouts/header'); ?>

<body class="theme-cyan">

	<!-- Page Loader -->
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="m-t-30 mb-3">
				<h3 style="color: white;"><strong>:: EDMS ::</strong></h3>
			</div>
			<p>Please wait...</p>
		</div>
	</div>
	<!-- Overlay For Sidebars -->

	<div id="wrapper">

		<?= view('layouts/nav_bar'); ?>
		<?= view('layouts/sidebar'); ?>

		<div id="main-content">
			<div class="container-fluid">

				<!-- <?php //echo $block_header; 
						?> -->

				<div class="row mt-4">
					<div class="col-md-10 d-flex">
						<h4 class="p-title">API Connected Systems</h4>
					</div>
				</div>

				<div class="row clearfix mt-3">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<h2>List of systems that are currently connected to the EDMS's API.</h2>
							</div>
							<div class="body">
								<div class="card" style="border: 1px solid #e5e5e5; margin-top: -20px;">
									<div class="card-header d-flex py-2">
										<div class="d-flex mr-auto" style="font-weight: 500; font-size: 14px;">
											Connect a New System with EDMS's API
										</div>
									</div>
									<div class="card-body">
										<div class="row clearfix">
											<div class="col-sm-12">
												<div class="form-group">
													<label class="form-label">System Name<font color="#FF0000"><strong>*</strong></font></label>
													<input type="text" name="system_name" id="system_name" class="form-control" placeholder="" required>
												</div>
											</div>
										</div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<button type="button" id="connect_btn" class="btn btn-primary px-5">Connect</button>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-hover js-basic-example dataTable table-custom">
										<thead class="thead-dark">
											<tr>
												<th style="width: 5%;">#</th>
												<th style="width: 15%;">System Name</th>
												<th style="width: 15%;">System ID</th>
												<th>API KEY</th>
												<th style="width: 5%;">Access</th>
												<th style="width: 5%;">Actions</th>
											</tr>
										</thead>
										<tbody>
											<!-- itertate through $connected_systems array -->
											<?php
											if (isset($connected_systems) && !empty($connected_systems)) {
												$x = 1;
												foreach ($connected_systems as $system) {
											?>
													<tr>
														<td><?php echo $x; ?></td>
														<td><?php echo $system['system_name']; ?></td>
														<td><?php echo $system['system_id']; ?></td>
														<td id="api_key_name"><?php echo $system['api_key']; ?></td>
														<td>
															<div class="d-flex justify-content-center">
																<div class="form-check form-switch">
																	<input class="form-check-input systemAccessSwitch" style="cursor: pointer;" type="checkbox" data-system-id="<?php echo $system["id"]; ?>" role="switch" id="systemAccessSwitch" <?php echo ($system['access'] == 1) ? "checked" : ""; ?>>
																</div>
															</div>
														</td>
														<td>
															<div class="dropup">
																<button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																	<i class="bi bi-three-dots-vertical"></i>
																</button>
																<ul class="dropdown-menu" style="z-index: 99999;">
																	<li><a class="dropdown-item copy_system_id_btn" href="#" data-system-id="<?php echo $system['system_id']; ?>">Copy System ID</a></li>
																	<li><a class="dropdown-item copy_api_key_btn" href="#" data-api-key-name="<?php echo $system['api_key']; ?>">Copy API Key</a></li>
																	<li><a class="dropdown-item regenerate_btn" href="#" data-api-key-id="<?php echo $system['id']; ?>">Regenerate API Key</a></li>
																	<?php
																	// check if the user is an admin, then show delete btn
																	if ($user_role == 1) {
																	?>
																		<li><a class="dropdown-item text-danger  delete_api_key_btn" href="#" data-api-key-id="<?php echo $system['id']; ?>">Delete</a></li>
																	<?php } ?>
																</ul>
															</div>
														</td>
													</tr>
											<?php
													$x++;
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
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

			// connect_btn click
			$('#connect_btn').click(function() {
				var system_name = $('#system_name').val();
				if (system_name == '') {
					Swal.fire({
						icon: 'warning',
						title: 'Missing Data',
						text: 'Please enter a system name.',
					});
				} else {
					// ajax call
					$.ajax({
						url: '<?php echo base_url(); ?>master_files/connected_systems/create',
						type: 'POST',
						data: {
							"system_name": system_name
						},
						dataType: 'json',
						beforeSend: function() {
							$('#connect_btn').attr('disabled', true);
							$('#connect_btn').html('<i class="fa fa-spinner fa-spin"></i>');
						},
						success: function(data) {
							if (data.status == 201) {
								Swal.fire({
									icon: 'success',
									title: 'Success',
									text: data.message,
									showConfirmButton: false,
									timer: 1500
								}).then(function() {
									window.location.href = "<?php echo base_url(); ?>master_files/connected_systems";
								});
							} else if (data.status == 400) {
								Swal.fire({
									icon: 'warning',
									title: 'Missing Fields',
									text: data.message,
								});
							} else if (data.status == 409) {
								Swal.fire({
									icon: 'warning',
									title: 'Duplicate system name',
									text: data.message,
								});
							} else if (data.status == 500) {
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: data.message,
								});
							}
							$('#connect_btn').attr('disabled', false);
							$('#connect_btn').html('Connect');
						},
						error: function(jqXHR, textStatus, errorThrown) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Something went wrong! Please try again later.',
							});
							$('#connect_btn').attr('disabled', false);
							$('#connect_btn').html('Connect');
						}
					});
				}
			});

			// updateAccess()
			$('.table tbody').on("change", ".systemAccessSwitch", function() {
				var id = $(this).attr('data-system-id');
				// ajax call
				$.ajax({
					url: '<?php echo base_url(); ?>master_files/connected_systems/update_access/' + id,
					type: 'PUT',
					data: {},
					dataType: 'json',
					beforeSend: function() {
						$(this).attr('disabled', true);
						$(this).html('<i class="fa fa-spinner fa-spin"></i>');
					},
					success: function(data) {
						if (data.status == 200) {
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: data.message,
								showConfirmButton: false,
								timer: 1500
							}).then(function() {
								window.location.href = "<?php echo base_url(); ?>master_files/connected_systems";
							});
						} else if (data.status == 404) {
							Swal.fire({
								icon: 'warning',
								title: 'Not Found',
								text: data.message,
							});
						} else if (data.status == 500) {
							Swal.fire({
								icon: 'error',
							})
						}
					}
				});
			});

			// regenerate_btn click
			$('.table tbody').on("click", ".regenerate_btn", function() {
				var button = $(this);
				var icon = button.find(".bi-arrow-counterclockwise");
				var system_id = button.attr('data-api-key-id');

				// ajax call
				$.ajax({
					url: '<?php echo base_url(); ?>master_files/connected_systems/update/' + system_id,
					type: 'PUT',
					data: {},
					dataType: 'json',
					beforeSend: function() {
						button.attr('disabled', true);
						button.html('<i class="fa fa-spinner fa-spin"></i>');
					},
					success: function(data) {
						if (data.status == 200) {
							Swal.fire({
								icon: 'success',
								title: 'Success',
								text: data.message,
								showConfirmButton: false,
								timer: 1500
							}).then(function() {
								window.location.href = "<?php echo base_url(); ?>master_files/connected_systems";
							});
						} else if (data.status == 404) {
							Swal.fire({
								icon: 'warning',
								title: 'Not Found',
								text: data.message,
							});
						} else if (data.status == 500) {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: data.message,
							});
						}
						button.attr('disabled', false);
						button.html('<i class="bi bi-arrow-counterclockwise fw-bold fs-6"></i>');
					},
					error: function(jqXHR, textStatus, errorThrown) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Something went wrong! Please try again later.',
						});
						button.attr('disabled', false);
						button.html('<i class="bi bi-arrow-counterclockwise fw-bold fs-6"></i>');
					}
				});
			});


			// Function to copy API key
			$('.table tbody').on("click", ".copy_api_key_btn", function() {
				var button = $(this);
				var icon = button.find(".bi-copy");
				var apiKey = button.data("api-key-name");

				// Create a temporary input element to copy the text
				var tempInput = $("<input>");
				$("body").append(tempInput);
				tempInput.val(apiKey).select();
				document.execCommand("copy");
				tempInput.remove();

				// show a swal to say that the api key has been copied
				Swal.fire({
					title: 'Copied !',
					showConfirmButton: false,
					timer: 1000
				});
			});

			// Function to copy System ID
			$('.table tbody').on("click", ".copy_system_id_btn", function() {
				var button = $(this);
				var systemId = button.data("system-id");

				// Create a temporary input element to copy the text
				var tempInput = $("<input>");
				$("body").append(tempInput);
				tempInput.val(systemId).select();
				document.execCommand("copy");
				tempInput.remove();

				// show a swal to say that the api key has been copied
				Swal.fire({
					title: 'Copied !',
					showConfirmButton: false,
					timer: 1000
				});
			});

			// delete_api_key_btn click
			$('.table tbody').on("click", ".delete_api_key_btn", function() {
				Swal.fire({
					title: 'Please Confirm',
					html: "<label class='data-text'>Are you sure you want to delete this system ? They won't be able to connect to EDMS's API once you delete this. Please note that this action cannot be undone, so proceed with caution.</label>",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
					if (result.isConfirmed) {
						// get system id
						var system_id = $(this).attr('data-api-key-id');
						// ajax call
						$.ajax({
							url: '<?php echo base_url(); ?>master_files/connected_systems/delete/' + system_id,
							type: 'DELETE',
							data: {},
							dataType: 'json',
							beforeSend: function() {
								$('.delete_api_key_btn').attr('disabled', true);
								$('.delete_api_key_btn').html('<i class="fa fa-spinner fa-spin"></i>');
							},
							success: function(data) {
								if (data.status == 200) {
									Swal.fire({
										icon: 'success',
										title: 'Success',
										text: data.message,
										showConfirmButton: false,
										timer: 1500
									}).then(function() {
										window.location.href = "<?php echo base_url(); ?>master_files/connected_systems";
									});
								} else if (data.status == 404 || data.status == 400) {
									Swal.fire({
										icon: 'warning',
										title: 'Warning',
										text: data.message,
									});
								} else if (data.status == 500) {
									Swal.fire({
										icon: 'error',
										title: 'Oops...',
										text: data.message,
									});
								}
								$('.delete_api_key_btn').attr('disabled', false);
								$('.delete_api_key_btn').html('<i class="fa fa-trash"></i>');
							},
							error: function(jqXHR, textStatus, errorThrown) {
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Something went wrong! Please try again later.',
								});
								$('.delete_api_key_btn').attr('disabled', false);
								$('.delete_api_key_btn').html('<i class="fa fa-trash"></i>');
							}
						});
					}
				})

			});
		});
	</script>
</body>

</html>