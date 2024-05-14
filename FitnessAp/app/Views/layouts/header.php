


<head>
  <title>Peakpulse Pro</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
  <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

  <link rel="icon" href="assets/images/Logo-02.svg" type="image/png">
  <!-- VENDOR CSS -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-icons.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/timeline.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.min.css">
 
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>/assets/scannerjs/scanner.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">
 
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?php //echo base_url(); 
  ?>assets/css/main.css">
  <link rel="stylesheet" href="<?php //echo base_url(); 
  ?>assets/css/color_skins.css">


</head>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" >
    <a class="navbar-brand brand-logo" href="index.html"><img src="<?php echo base_url(); ?>assets/images/Logo-04.svg" alt="logo"/></a>
    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url(); ?>assets/images/Logo-04.svg" alt="logo"/></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize"></button>     
    <!-- <div class="search-field d-none d-md-block">
      <form class="d-flex align-items-center h-100" action="#">
        <div class="input-group">
          <div class="input-group-prepend bg-transparent">
            <i class="input-group-text border-0 mdi mdi-magnify"></i>
          </div>
          <input
          type="text"
          class="form-control bg-transparent border-0"
          placeholder="Search projects"
          />
        </div>
      </form>
    </div> -->
    <ul class="navbar-nav navbar-nav-right" >
      <li class="nav-item d-none d-lg-block full-screen-link"><a class="nav-link"><i class="mdi mdi-fullscreen" id="fullscreen-button"></i></a></li>
      <li class="nav-item dropdown"><a class="nav-link count-indicator dropdown-toggle"id="messageDropdown" href="#" data-bs-toggle="dropdown"aria-expanded="false" ><i class="mdi mdi-email-outline"></i><span class="count-symbol bg-warning"></span></a>
            <div
            class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
            aria-labelledby="messageDropdown"
            >
            <h6 class="p-3 mb-0">Messages</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img
                src="\assets/images/faces/face4.jpg"
                alt="image"
                class="profile-pic"
                />
              </div>
              <div
              class="preview-item-content d-flex align-items-start flex-column justify-content-center"
              >
              <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
                Mark send you a message
              </h6>
              <p class="text-gray mb-0">1 Minutes ago</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <img
              src="\assets/images/faces/face2.jpg"
              alt="image"
              class="profile-pic"
              />
            </div>
            <div
            class="preview-item-content d-flex align-items-start flex-column justify-content-center"
            >
            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
              Cregh send you a message
            </h6>
            <p class="text-gray mb-0">15 Minutes ago</p>
          </div>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item preview-item">
          <div class="preview-thumbnail">
            <img
            src="\assets/images/faces/face3.jpg"
            alt="image"
            class="profile-pic"
            />
          </div>
          <div
          class="preview-item-content d-flex align-items-start flex-column justify-content-center"
          >
          <h6 class="preview-subject ellipsis mb-1 font-weight-normal">
            Profile picture updated
          </h6>
          <p class="text-gray mb-0">18 Minutes ago</p>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      <h6 class="p-3 mb-0 text-center">4 new messages</h6>
    </div>
    </li>
    <li class="nav-item dropdown">
      <a
      class="nav-link count-indicator dropdown-toggle"
      id="notificationDropdown"
      href="#"
      data-bs-toggle="dropdown"
      >
      <i class="mdi mdi-bell-outline"></i>
      <span class="count-symbol bg-danger"></span>
    </a>
    <div
    class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
    aria-labelledby="notificationDropdown"
    >
    <h6 class="p-3 mb-0">Notifications</h6>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item preview-item">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-success">
          <i class="mdi mdi-calendar"></i>
        </div>
      </div>
      <div
      class="preview-item-content d-flex align-items-start flex-column justify-content-center"
      >
      <h6 class="preview-subject font-weight-normal mb-1">
        Event today
      </h6>
      <p class="text-gray ellipsis mb-0">
        Just a reminder that you have an event today
      </p>
    </div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item preview-item">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-warning">
          <i class="mdi mdi-settings"></i>
        </div>
      </div>
      <div
      class="preview-item-content d-flex align-items-start flex-column justify-content-center"
      >
      <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
      <p class="text-gray ellipsis mb-0">Update dashboard</p>
    </div>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item preview-item">
      <div class="preview-thumbnail">
        <div class="preview-icon bg-info">
          <i class="mdi mdi-link-variant"></i>
        </div>
      </div>
      <div
      class="preview-item-content d-flex align-items-start flex-column justify-content-center"
      >
      <h6 class="preview-subject font-weight-normal mb-1">
        Launch Admin
      </h6>
      <p class="text-gray ellipsis mb-0">New admin wow!</p>
    </div>
    </a>
    <div class="dropdown-divider"></div>
    <h6 class="p-3 mb-0 text-center">See all notifications</h6>
    </div>
    </li>
    <li class="nav-item nav-logout d-none d-lg-block">
      <button class="nav-link logoutBtn">
        <i class="mdi mdi-power"></i>
      </button>
    </li>
    <li class="nav-item nav-settings d-none d-lg-block">
      <a class="nav-link" href="#">
        <i class="mdi mdi-format-line-spacing"></i>
      </a>
    </li>
    </ul>
    <button
    class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
    type="button"
    data-toggle="offcanvas"
    >
    <span class="mdi mdi-menu"></span>
    </button>
</div>
</nav>








