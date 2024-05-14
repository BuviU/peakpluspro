
<!DOCTYPE html>
<html lang="en">
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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/sweetalert/sweetalert.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-icons.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dropify/css/dropify.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/timeline.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/summernote/dist/summernote.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url() ?>/assets/scannerjs/scanner.css"> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?php //echo base_url(); 
  ?>assets/css/main.css">
  <link rel="stylesheet" href="<?php //echo base_url(); 
  ?>assets/css/color_skins.css">


</head>

<body>
  <div class="container-scroller">
    <div id="loginbg" class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="assets/images/Logo-02.svg">
              </div>
              <h4>Hola! let's get started</h4>
              <h6 class="font-weight-light">Login in to continue.</h6>
              <form class="pt-3" id="login_form">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3 align-items-center">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">LOG IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  <!-- <div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                    </div> -->
                    <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="https://atfusion.com.au/contact/" class="text-primary">Create</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->

      <!-- endinject -->
    </body>
    <?= view('layouts/footer'); ?>
    </html>

    <script>
      $(document).ready(function() {
            // Login form submit
            $("#login_form").on('submit', (function(e) {
              e.preventDefault();
              $.ajax({
                url: '<?php echo base_url() ?>login',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {},
                success: function(data) {
                  var response = data;
                  if (response.status == 200) {
                    let timerInterval;
                    Swal.fire({
                      icon: "success",
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
                      if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = "<?php echo base_url() ?>dashboard";
                      }
                    });

                  } else if (response.status == 400 || response.status == 401) {
                    Swal.fire({
                      title: "Warning",
                      text: response.msg,
                      icon: "warning"
                    });
                  } else if (response.status == 500) {
                    Swal.fire({
                      title: "Error",
                      text: response.msg,
                      icon: "error"
                    });
                  }
                },
                error: function(e) {
                  Swal.fire({
                    title: "Error",
                    text: "",
                    icon: "error"
                  });
                }
              });
            }));
          });
        </script>
      </body>

      </html>