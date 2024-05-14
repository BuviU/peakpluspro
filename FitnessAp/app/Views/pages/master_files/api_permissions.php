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
				<div class="row mt-4">
					<div class="col-md-10 d-flex">
						<h4 class="p-title">API Access Permissions</h4>
					</div>
				</div>

				<div class="row clearfix mt-3">
					<div class="col-md-12">
						<div class="card">
							<div class="header">
								<h2>Assigned Permissions</h2>
							</div>
							<div class="body">
								<div class="card" style="border: 1px solid #e5e5e5; margin-top: -20px;">
									<div class="card-header d-flex py-2">
										<div class="d-flex mr-auto" style="font-weight: 500; font-size: 14px;">
											Filter Permissions by System
										</div>
									</div>
									<div class="card-body">
										<div class="row clearfix">
											<div class="col-sm-12">
												<div class="form-group">
													<select name="system_id" id="system_id" class="js-example-basic-single form-control" style="width: 100%;" required>
														<option value="0">Select a System...</option>
														<?php
														foreach ($systems as $system) {
															// if $group_id == $profile->id, then set selected
															$selected = "";
															if ($system_id == $system['system_id']) {
																$selected = "selected";
															}
															echo '<option value="' . $system['system_id'] . '" ' . $selected . ' >' . $system['system_name'] . '</option>';
														}
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="row clearfix">
											<div class="col-sm-12">
												<button type="button" id="filter_btn" class="btn btn-primary px-5"><i class="bi bi-funnel-fill"></i>&nbsp;&nbsp;Filter</button>
											</div>
										</div>
									</div>
								</div>
								<?php if (isset($system_permissions)) { ?>
									<?php foreach ($api_route_groups as $route_group) { ?>
										<div class="card" style="border: 1px solid #e5e5e5;">
											<div class="card-header bg-dark text-light d-flex py-2">
												<div class="d-flex mr-auto" style="font-weight: 700; font-size: 13px;">
													<?php echo $route_group['group_name']; ?>
												</div>
											</div>
											<div class="card-body">
												<div class="table-responsive">
													<table class="table table-hover js-basic-example dataTable table-custom">
														<thead class="thead-light">
															<tr>
																<th>#</th>
																<th>Permission</th>
																<th>Description</th>
																<th>Status</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$x = 1;
															foreach ($api_route_permissions as $permission) {
																if ($route_group['id'] == $permission['route_group_id']) {
															?>
																	<tr style="width: 100%;">
																		<td style="width: 10%;"><?php echo $x; ?></td>
																		<td><label class="text-info"><?php echo $permission['permission']; ?></label></td>
																		<td><?php echo $permission['description']; ?></td>

																		<?php
																		// check if the system has permission, for this menu_item
																		$has_permission = false;
																		$permission_id = 0;
																		foreach ($system_permissions as $system_permission) {
																			if ($permission['id'] == $system_permission['permission_id']) {
																				$has_permission = true;
																				$permission_id = $system_permission['id'];
																				break;
																			}
																		}
																		?>


																		<td style="width: 10%;" class="text-info">
																			<div class="d-flex justify-content-center">
																				<img src="<?php echo base_url(); ?>assets/images/<?php echo ($has_permission) ? "ok" : "close"; ?>.png" alt="..." width="20px">
																			</div>
																		</td>
																		<td style="width: 10%;">
																			<div class="d-flex justify-content-end pe-2">
																				<?php
																				if ($has_permission) {
																				?>
																					<button class="btn text-danger btn-sm me-2 remove-privilege-btn" data-privilege-id="<?php echo $permission_id; ?>"><i class="fa fa-times"></i></button>
																				<?php } else { ?>
																					<button class="btn text-success btn-sm me-2 add-privilege-btn" data-system-id="<?php echo $system_id; ?>" data-permission-id="<?php echo $permission['id']; ?>"><i class="fa fa-plus"></i></button>
																				<?php } ?>
																			</div>
																		</td>
																	</tr>
															<?php $x++;
																}
															} ?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
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
		$('.js-example-basic-single').select2({
			placeholder: " Select",
			allowClear: true
		});

		document.addEventListener("DOMContentLoaded", function(event) {
			var scrollpos = localStorage.getItem('scrollpos');
			if (scrollpos) window.scrollTo(0, scrollpos);
		});

		window.onbeforeunload = function(e) {
			localStorage.setItem('scrollpos', window.scrollY);
		};


		// filter button click
		$('#filter_btn').click(function() {
			var system_id = $('#system_id').val();
			window.location.href = "<?php echo base_url(); ?>master_files/api_access_permissions/" + system_id;
		});

		// add privilege button click
		$('.add-privilege-btn').click(function() {
			var system_id = $(this).data('system-id');
			var permission_id = $(this).data('permission-id');
			// alert(privilege_id + " " + group_id + " " + permission_id + " " + action);
			$.ajax({
				url: "<?php echo base_url(); ?>master_files/api_access_permissions/add/" + system_id + "/" + permission_id,
				method: "GET",
				data: {},
				dataType: 'json',
				success: function(data) {
					console.log(data);
					if (data.status == 201) {
						location.reload();
					} else if (data.status == 400) {
						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: 'Bad Request. Please try again.',
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Something went wrong!',
							showConfirmButton: false,
							timer: 1500
						});
					}
				}
			});
		});

		// remove privilege button click
		$('.remove-privilege-btn').click(function() {
			var privilege_id = $(this).data('privilege-id');
			// alert(privilege_id + " " + group_id + " " + menu_id + " " + action);
			$.ajax({
				url: "<?php echo base_url(); ?>master_files/api_access_permissions/remove/" + privilege_id,
				method: "GET",
				data: {},
				dataType: 'json',
				success: function(data) {
					console.log(data);
					if (data.status == 200) {
						location.reload();
					} else if (data.status == 400) {
						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: 'Bad Request. Please try again.',
							showConfirmButton: false,
							timer: 1500
						});
					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error',
							text: 'Something went wrong!',
							showConfirmButton: false,
							timer: 1500
						});
					}
				}
			});
		});
	</script>
</body>

</html>