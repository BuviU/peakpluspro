<nav class="navbar navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-btn">
			<button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
		</div>

		<div class="navbar-brand">
			<a href="index.php"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo" class="img-responsive logo" style="width: 45px;"></a>
			<span style="font-weight: 700; margin-left: 5px;">NWSDB</span>
		</div>

		<div class="navbar-right">
			<form id="navbar-search" class="navbar-form search-form" style="display: none;">
				<input value="" class="form-control" placeholder="Search here..." type="text">
				<button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
			</form>

			<div id="navbar-menu">
				<ul class="nav navbar-nav">

					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
							<i class="bi bi-bell"></i>
							<span class="notification-dot"></span>
						</a>
						<ul class="dropdown-menu notifications">
							<li class="header"><strong>You have 4 new Notifications</strong></li>
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
							<li>
								<a href="javascript:void(0);">
									<div class="media">
										<div class="media-left">
											<i class="icon-like text-success"></i>
										</div>
										<div class="media-body">
											<p class="text">Your New Campaign <strong>Holiday Sale</strong> is approved.</p>
											<span class="timestamp">11:30 AM Today</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<div class="media">
										<div class="media-left">
											<i class="icon-pie-chart text-info"></i>
										</div>
										<div class="media-body">
											<p class="text">Website visits from Twitter is 27% higher than last week.</p>
											<span class="timestamp">04:00 PM Today</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<div class="media">
										<div class="media-left">
											<i class="icon-info text-danger"></i>
										</div>
										<div class="media-body">
											<p class="text">Error on website analytics configurations</p>
											<span class="timestamp">Yesterday</span>
										</div>
									</div>
								</a>
							</li>
							<li class="footer"><a href="javascript:void(0);" class="more">See all notifications</a></li>
						</ul>
					</li>
		
					<li>
						<a href="<?php echo base_url(); ?>Con_login/logout" class="icon-menu"><i class="bi bi-box-arrow-right"></i></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
