
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Peakpulse Pro</title>

  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
  <?= view('layouts/header'); ?>

</head>

<body>
  <div id="baseHeader"></div> 
  <div class="container-fluid page-body-wrapper">
    <div id="sidebar">
      <?= view('layouts/sidebar'); ?>
    </div>
    <div class="main-panel">
      <div class="content-wrapper">

        <div class="row">
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">                    
                <div class="table-responsive">
                  <table class="table">
                    <thead>

                      <tr>
                       <div class="search-field d-none d-md-block">
                        <form class="d-flex align-items-center h-100" action="#">



                          <div class="input-group" style="border: none; ">                                  
                           <label class="form-control form-check-label" style="border: none; 
                           font-size: 1.125rem;"><strong>User Accounts</strong></label>
                           <div class="input-group-append">
                             <button type="button" class="btn btnlightpurple  btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Add New Users</button>
                           </div> 
                         </div>
                         <div class="input-group">                                   
                          <input type="search" class="form-control" placeholder="Search Your Exercise Here..." aria-label="Search Exercise" aria-describedby="basic-addon2" style="padding: 20px 30px !important; border-radius: 15px !important;">

                        </div>

                      </form>
                    </div></tr>
                  </thead>
                  <tbody>
                   <?php  foreach ($coach as $coach) {

                    ?>

                    <tr>
                      <td style="width: 100%;">
                        <img src="<?php echo base_url(); ?>public/uploads/coach_img/<?php echo $coach['prof_pic']; ?>" alt="image"> <?php echo $coach['f_name']. ' '.$coach['l_name'] ?> <br><br>
                        david@gmail.com
                      </td>
                      <td  style="width: 100%;"></td><td style="width: 100%;"></td>
                      <td> <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important;">Edit</button></td>
                    </tr>

                  <?php } ?>



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 grid-margin stretch-card">

        <div class="card">
         <div class="card-body">
          <h4 class="card-title">Add User Accounts</h4>                    
          <form class="forms-sample" id="form-coach">
            <div class="form-group">                        
              <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
            </div>
            <div class="form-group">                       
              <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="padding: 18px 30px !important; border-radius: 15px !important;">
            </div>  
            <div class="form-group">
              <select class="form-control" id="group_profile" name="group_profile" placeholder="Gender" style=" border-radius: 15px;">
                <?php foreach ($group_profiles as $profile): ?>
                  <option value="<?= $profile['id'] ?>"><?= $profile['type'] ?></option>
                <?php endforeach; ?>

              </select>
            </div>                 

            <div class="form-group">                       
              <input type="file" name="img[]" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="file" class="form-control" id="image_file" name="image_file"  placeholder="Add Profile Pic" >
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 12px 30px !important; border-radius: 25px !important;">Browse</button>
                </span>
              </div>
            </div>
            <div class="form-group">
              <select class="form-control" id="gender" name="gender" placeholder="Gender" style=" border-radius: 15px !important;">
                <option disabled selected>Select Your Gender</option>
                <option>Male</option>4
                <option>Female</option>
              </select>
            </div>
            <div class="form-group">
              <!-- <label for="exampleInputbirth">Date of Birth</label> -->
              <div class="col-sm-9">
                <input class="form-control" placeholder="Date of Birth (dd/mm/yyyy)" id="dob" name="dob" style="padding: 18px 30px !important; border-radius: 15px !important;"/>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="padding: 18px 30px !important; border-radius: 15px !important;">
            </div>
              <div class="form-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="padding: 18px 30px !important; border-radius: 15px !important;">
            </div>

            <button type="submit" class="btn1 btn-gradient-primary me-2" style="width: 100%; border-radius: 25px;">Save</button>


          </form>
        </div>
      </div>
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
<script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
<script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
<script src="<?php echo base_url(); ?>assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
<!-- End custom js for this page -->
</body>

<?= view('layouts/footer'); ?>

<script type="text/javascript">
      // submit category_create_form
      $('#form-coach').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
      // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>createCoach',
        type: 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#menu_item_insert_form button[type="submit"]').attr('disabled', true);
          $('#menu_item_insert_form button[type="submit"]').html('Please wait...');
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
              // window.location.href = "<?php //echo base_url(); ?>settings/menu_list";
              // location.reload();
            });
          } else if (data.status == 400) {
            Swal.fire({
              icon: 'warning',
              title: 'Missing Data',
              text: data.message,
            });
          } else if (data.status == 409) {
            Swal.fire({
              icon: 'warning',
              title: 'Duplicate Category Name',
              text: data.message,
            });
          } else if (data.status == 500) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
            });
          }
          $('#menu_item_insert_form button[type="submit"]').attr('disabled', false);
          $('#menu_item_insert_form button[type="submit"]').html('Create');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#menu_item_insert_form button[type="submit"]').attr('disabled', false);
          $('#menu_item_insert_form button[type="submit"]').html('Create');
        }
      });
    });
  </script>
  </html>