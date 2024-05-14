<?= view('layouts/header'); ?>

<body>
  <div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
      <div class="col-md-12 p-0 m-0">
        <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
          <div class="ps-lg-1">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more</p>
              <a href="#" target="_blank" class="btn me-2 buy-now-btn border-0">*</a>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between">
            <a href="#"><i class="mdi mdi-home me-3 text-white"></i></a>
            <button id="bannerClose" class="btn border-0 p-0">
              <i class="mdi mdi-close text-white me-0"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="../../assets/images/logo.png" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../..assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="../..assets/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">David Greyy</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
                </div>
              </li>
              <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                  <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count-symbol bg-warning"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../..assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                      <p class="text-gray mb-0"> 1 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../..assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                      <p class="text-gray mb-0"> 15 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <img src="../..assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                      <p class="text-gray mb-0"> 18 Minutes ago </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count-symbol bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="mdi mdi-calendar"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                      <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-warning">
                        <i class="mdi mdi-settings"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                      <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-info">
                        <i class="mdi mdi-link-variant"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                      <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                </div>
              </li>
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-power"></i>
                </a>
              </li>
              <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="#">
                  <i class="mdi mdi-format-line-spacing"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                  <div class="nav-profile-image">
                    <img src="../..assets/images/faces/face1.jpg" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                  </div>
                  <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">David Grey</span>
                    <span class="text-secondary text-small">Super Admin</span>
                  </div>
                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                </a>
              </li>
              <li class="nav-item">

                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-home menu-icon"></i>
                  <span class="menu-title">Dashboard</span>

                </a>
              </li>
              <div class="card" style="margin-left: 20px; margin-right: 20px;">
                <h4 class="font-weight-bold mt-3 p-3 pb-0">Account</h4>

                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">

                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Memberships</span>
                    <!-- <i class="menu-arrow"></i> -->
                  </a>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../..pages/icons/mdi.html">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Programs</span>

                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../..add_workouts.html">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Workouts</span>

                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../..add_exercise.html">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Exercise</span>

                  </a>
                </li>
              </div>

              <div class="card mt-3" style="margin-left: 20px; margin-right: 20px;">
                <h4 class="font-weight-bold mt-3 p-3 pb-0">Client Handling</h4>
                <li class="nav-item">
                  <a class="nav-link" href="../..pages/forms/basic_elements.html">
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    <span class="menu-title">Messenger</span>

                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../..pages/charts/chartjs.html">
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                    <span class="menu-title">Coaches</span>

                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../..add_coaches.html">
                    <i class="mdi mdi-table-large menu-icon"></i>
                    <span class="menu-title">Users</span>

                  </a>
                </li>



              </div>
              <div class="card mt-3" style="margin-left: 20px; margin-right: 20px;">
                <h4 class="font-weight-bold mt-3 p-3 pb-0">Support</h4>
                <li class="nav-item">
                  <a class="nav-link" href="../..pages/forms/basic_elements.html">
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    <span class="menu-title">Support Tickets</span>

                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../..pages/charts/chartjs.html">
                    <i class="mdi mdi-chart-bar menu-icon"></i>
                    <span class="menu-title">Report Generation</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                    <i class="mdi mdi-medical-bag menu-icon"></i>
                    <span class="menu-title">Payment</span>
                  </a>
                </li>
              </div>

              <div class="card mt-3" style="margin-left: 20px; margin-right: 20px;">
                <h4 class="font-weight-bold mt-3 p-3 pb-0">Settings</h4>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">
                    <i class="mdi mdi-settings menu-icon"></i>
                    <span class="menu-title">Settings</span>   
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.html">
                    <i class="mdi mdi-logout menu-icon"></i>
                    <span class="menu-title">Log Out</span>   
                  </a>
                </li>
              </div>

            </ul>
          </nav>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">

              <div class="row">


               <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Basic form elements</h4>
                    <p class="card-description"> Basic form elements </p>
                    <form class="employee_form">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                   <!--    <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                      </div> -->
                      <div class="form-group">
                        <label for="exampleSelectGender">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" name="image" id="image" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Phone Number</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="Location">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Menu Category</h5>
                  <button type="button" class="btn btn-secondary close modal_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="menu_item_update_form">
                  <div class="modal-body">
                    <input type="hidden" name="menu_item_id_edit" id="menu_item_id_edit">
                    <input type="hidden" name="menu_item_name_old_edit" id="menu_item_name_old_edit" class="form-control" required>

                    <div class="form-horizontal">
                      <div class="box-body">
                        <div class="form-group ">
                          <!-- <label class="col-sm-3 col-form-label">Country</label> -->
                          <div class="col-sm-9">
                            <select class="form-control" id="menu_item_category_edit" name="menu_item_category_edit" style="padding: 18px 30px !important; border-radius: 15px !important;">
                              <option value="0">Select a Category...</option>
                              <?php
                              foreach ($categories as $category) {
                                echo '<option value="' . $category['id'] . '">' . $category['category'] . '</option>';
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="cat_name_up">Item Name</label><small class="req"> *</small>
                          <input autofocus="" id="menu_item_name_edit" name="menu_item_name_edit" placeholder="" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                          <label for="cat_name_up">Page URL</label><small class="req"> *</small>
                          <input autofocus="" id="menu_item_url_edit" name="menu_item_url_edit" placeholder="" type="text" class="form-control" />
                        </div>
                        <div class="form-group">
                          <label for="cat_name_up">Order</label><small class="req"> *</small>
                          <input autofocus="" id="menu_item_order" name="menu_item_order" placeholder="" type="text" class="form-control" />
                        </div>

                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary" >Update</button>
                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Arttricks 2024</span>
                <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="https://arttricks.com.au/" target="_blank">arttricks.com.au</a></span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->

      <!-- End custom js for this page -->
    </body>
    <?= view('layouts/footer'); ?>


    </html>


    <script>
      $('.js-example-basic-single').select2({
        placeholder: " Select",
        allowClear: true
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
      $(".modal_close").click(function() {
        $('#edit_data').modal('hide');
        $(':input[type="submit"]').prop('disabled', false);
      });
    </script>