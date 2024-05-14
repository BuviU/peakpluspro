<nav class="navbar navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
		</div>

		<div class="navbar-brand">
			<!-- <a href="index.php"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo" class="img-responsive logo" style="width: 45px;"></a> -->
			<span style="font-weight: 700; margin-left: 5px;">NWSDB</span>
		</div>

		<div class="navbar-right">
			<form id="navbar-search" class="navbar-form search-form" style="display: none;">
				<input value="" class="form-control" placeholder="Search here..." type="text">
				<button type="button" class="btn btn-default"><i class="ico
					n-magnifier"></i></button>
			</form>

			<div id="navbar-menu">
				<ul class="nav navbar-nav">

					<li class="dropdown">
						<!-- <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
							<i class="bi bi-bell"></i>
							<span class="notification-dot"></span>
						</a> -->
						<button type="button" class="btn btn-dark position-relative me-3" data-toggle="dropdown">
							<i class="bi bi-bell"></i>
							<span id="notification-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
							</span>
						</button>
						<ul id="notification-list" class="dropdown-menu notifications">
							<!-- <li class="header"><strong>You have 4 new Notifications</strong></li>
							<li>
								<a href="javascript:void(0);">
									<div class="media">
										<div class="media-left">
											<i class="icon-info text-warning"></i>
										</div>
										<div class="media-body">
											<p class="text">Campaign <strong>Holiday Sale</strong> is nearly reach budget limit.</p>
											<span class="timestamp">10:00 AM Today</span>
										</div>
									</div>
								</a>
							</li>
							<li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li> -->
						</ul>
					</li>

					<li>
						<style>
							.btn.focus,
							.btn:focus {
								outline: none !important;
								box-shadow: none !important;
								border: none !important;
							}
						</style>
						<a id="logoutBtn" href="javascript:void(0);" class="btn position-relative" data-toggle="dropdown">
							<i class="bi bi-box-arrow-right"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<!-- Javascript -->
<script src="<?php echo base_url(); ?>assets//jQuery/jQuery-2.1.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).ready(function() {
		// logout btn on click - logout
		$('#logoutBtn').on('click', function() {
			logout();
		});

		var previousNotifications = 0;
		// create an item in local storage to store the previous notifications count
		if (localStorage.getItem('previousNotifications') == null) {
			localStorage.setItem('previousNotifications', 0);
		} else {
			previousNotifications = localStorage.getItem('previousNotifications');
		}
		// sync notifications immediately after page load, and then every 5 seconds
		sync_notifications();
		setInterval(function() {
			sync_notifications();
		}, 15000);

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

		function sync_notifications() {
			// ajax call to sync notifications
			$.ajax({
				url: "<?php echo base_url(); ?>data/sync_notifications",
				method: "GET",
				dataType: null,
				success: function(response) {
					var notifications = JSON.parse(response);
					if (notifications.length > 0) {
						$('#notification-badge').text(notifications.length > 9 ? '9+' : notifications.length);
						$('#notification-list').empty();
						$('#notification-list').append('<li class="header"><strong>You have ' + notifications.length + ' new Forwards</strong></li>');
						var x = 0;
						notifications.forEach(notification => {
							x++;
							var icon = notification.is_a_document == 1 ? "bi bi-arrow-90deg-right text-primary" : "bi bi-file-earmark-text text-success";
							if (x < 5) {
								$('#notification-list').append('<li><a href="<?php echo base_url(); ?>mailbox/inbox"><div class="media"><div class="media-left"><i class="' + icon + '"></i></div><div class="media-body"><p class="text"><strong>' + notification.document_name + '</strong></p><span class="timestamp">' + notification.forwarded_by_name + " • " + notification.forwarded_at + '</span></div></div></a></li>');
							}
						});
						$('#notification-list').append('<li class="footer"><a href="<?php echo base_url(); ?>mailbox/inbox" class="more">See all Forwards</a></li>');

						// show desktop notification
						// Check if the browser supports the Notification API
						if (!("Notification" in window)) {
							console.log("This browser does not support desktop notifications.");
						} else if (Notification.permission !== "denied") {
							Notification.requestPermission().then(function(permission) {
								if (permission === "granted") {
									if (notifications.length > localStorage.getItem('previousNotifications')) {
										var notification = new Notification("EDMS", {
											body: "You have " + (notifications.length - previousNotifications) + " new forwards in your inbox. Click here to view them."
										});
										notification.onclick = function() {
											window.location.href = "<?php echo base_url(); ?>mailbox/inbox";
											window.focus();
										};
									}
								}
								previousNotifications = notifications.length;
								localStorage.setItem('previousNotifications', previousNotifications);
							});
						}
					} else {
						$('#notification-badge').text('');
						$('#notification-list').empty();
						$('#notification-list').append('<li class="header"><strong>You have 0 new Forwards</strong></li>');
						$('#notification-list').append('<li class="footer"><a href="<?php echo base_url(); ?>mailbox/inbox" class="more">See all Forwards</a></li>');
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(errorThrown);
				}
			});
		}
	});
</script>