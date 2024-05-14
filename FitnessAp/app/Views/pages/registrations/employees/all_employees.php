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
						<h4 class="p-title">Employee Registrations</h4>
					</div>
				</div>

				<div class="row clearfix mt-3">
					<div class="col-md-12">
						<div class="card">
							<div class="d-flex border-bottom">
								<div class="me-auto">
									<div class="header p-0 py-2 pt-4 mx-3">
										<h2>Employee Registration Details</h2>
										<span class="badge bg-dark mt-2"><?php echo count($members) . " members found." ?></span>
									</div>
								</div>
								<div class="d-flex justify-content-end align-items-center me-3"><?php
																								// check if the user is an admin, then show New Staff Member btn
																								if ($user_role == 1) {
																								?>
										<a href="<?php echo base_url(); ?>registrations/staff_member/new" class="btn btn-primary">+ New Employee Registration</a>
									<?php } ?>
								</div>
							</div>
							<div class="body">
								<div class="table-responsive">
									<table class="table table-hover js-basic-example dataTable table-custom">
										<thead class="thead-dark">
											<tr>
												<th style="width: 5%;">#</th>
												<th>Employee</th>
												<th style="width: 10%;">Code</th>
												<th style="width: 25%;">Email</th>
												<th style="width: 15%;">Contact No.</th>
												<th style="width: 10%;">Action</th>
											</tr>
										</thead>
										<tbody>
											<!-- itertate through $members array -->
											<?php
											if (isset($members) && !empty($members)) {
												$x = 1;
												foreach ($members as $member) {
											?>
													<tr>
														<td><?php echo $x; ?></td>
														<td>
															<div class="d-flex flex-column">
																<span><strong><?php echo $member['name']; ?></strong></span>
																<small><?php echo $member['designation_name']; ?></small>
																<small><?php echo $member['cost_center_name']; ?></small>
																<small><?php echo $member['location_name']; ?></small>
															</div>
														</td>
														<td><?php echo $member['emp_num']; ?></td>
														<td><?php echo $member['email']; ?></td>
														<td><?php echo $member['contact_no']; ?></td>
														<td>
															<div class="dropup">
																<button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
																	<i class="bi bi-three-dots-vertical"></i>
																</button>
																<ul class="dropdown-menu" style="z-index: 99999;">
																	<li>
																		<a href="<?php echo base_url(); ?>registrations/staff_member/show/<?php echo $member['id']; ?>" class="dropdown-item">More Details</a>
																	</li>
																	<?php
																	// check if the user is an admin, then show delete btn
																	if ($user_role == 1) {
																	?>
																		<li><a data-emp-num="<?php echo $member['emp_num']; ?>" class="dropdown-item text-danger delete-btn" href="#">Delete</a></li>
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
			// delete btn click
			$('.delete-btn').click(function() {
				Swal.fire({
					icon: 'warning',
					title: 'Are you sure?',
					text: 'You want to delete this staff member.',
					showCancelButton: true,
					confirmButtonText: 'Yes, delete it!',
					cancelButtonText: 'No, cancel!',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
						// AJAX request
						$.ajax({
							url: '<?php echo base_url(); ?>registrations/staff_member/delete',
							type: 'post',
							data: {
								emp_num: $(this).data('emp-num')
							},
							success: function(response) {
								// check if the response has success
								if (response.status == 200) {
									Swal.fire({
										icon: 'success',
										title: 'Success!',
										text: response.message,
									}).then((result) => {
										if (result.isConfirmed) {
											location.reload();
										}
									});
								} else {
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
					}
				})
			});
		});
	</script>
</body>

</html>