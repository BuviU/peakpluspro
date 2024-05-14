<?= view('layouts/header'); ?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Peakpulse Pro</title>

  <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/vendors/css/vendor.bundle.base.css">


  <link rel="shortcut icon" href="<?php //echo base_url(); ?>assets/images/favicon.ico" />
</head>
-->
<body>
  <div class="container-scroller">
<!--     <div class="row p-0 m-0 proBanner" id="proBanner">
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
    </div> -->
    <!-- partial:partials/_navbar.html -->
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <div id="sidebar">
       <?= view('layouts/sidebar'); ?>
     </div> 
     <!-- partial -->
     <div class="main-panel">
      <div class="content-wrapper">

        <div class="row">
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">                    
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <!-- <tr>
                            <th class="card-title h-100">Coaches</th>
                           <th></th>
                           <th></th>
                            <th> <button type="button" class="btn btn-gradient-primary btn-rounded btn-fw">Add New Users</button> </th>
                          </tr> -->
                          <tr>
                           <div class="search-field d-none d-md-block">
                            <form class="d-flex align-items-center h-100" action="#">
                              <div class="input-group" style="border: none; ">                                  
                                <label class="form-control form-check-label" style="border: none; 
                                font-size: 1.125rem;"><img src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" class="me-2" alt="image" style="border-radius: 50px; width: 40px; height: 40px !important;margin-left: -10px;">Coach Mohan</label>

                              </div>
                              

                              <div class="input-group" style="border: none; ">                                  
                               <label class="form-control form-check-label" style="border: none; 
                               font-size: 1.125rem;"><strong>Exercise</strong></label>
                               <div class="input-group-append">
                                 <button type="button" class="btn btn-lightpurple  btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Create New Exercise</button>
                               </div> 
                             </div>
                             <div class="input-group">                                   
                              <input type="search" class="form-control" placeholder="Search Your Exercise Here..." aria-label="Search Exercise" aria-describedby="basic-addon2" style="padding: 20px 30px !important; border-radius: 15px !important;">

                            </div>

                          </form>
                        </div></tr>
                      </thead>
                      <?php  foreach ($exercise as $exercise) {

                        ?>

                        <tbody>

                          <tr>
                            <td style="width: 100%;">
                              <img src="<?php echo base_url(); ?>public/uploads/exercise_img/<?php echo $exercise['thumbnail']; ?>" class="me-2" alt="image"><?php echo  $exercise['exercise_name']; ?><br><br>
                              <?php echo  $exercise['description']; ?>
                            </td>
                            <td  style="width: 100%;"></td><td style="width: 100%;"></td>
                            <td> <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important;">Open</button></td>
                          </tr>

                        </tbody>

                      <?php  } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">

              <div class="card">
               <div class="card-body">
                <h4 class="card-title">Add New Exercise</h4>                    
                <form class="forms-sample" id="form-exercise" enctype="multipart/form-data">
                  <div class="form-group">                        
                    <input type="text" class="form-control" id="exercise" name="exercise" placeholder="Exercise Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
                  </div>
                  <div class="form-group">                       
                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Video Url" style="padding: 18px 30px !important; border-radius: 15px !important;">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" style="padding: 18px 30px !important; border-radius: 15px !important;">
                  </div>                   
                  <div class="form-group">                       
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="file" class="form-control" id="image_file" name="image_file"  placeholder="Add thumbnail" >
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 12px 30px !important; border-radius: 25px !important;">Browse</button>
                      </span>
                    </div>
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
      <!-- <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
          <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Arttricks 2024</span>
          <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="https://arttricks.com.au/" target="_blank">arttricks.com.au</a></span>
        </div>
      </footer> -->
      <?= view('layouts/footer'); ?>

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


<script type="text/javascript">
      // submit category_create_form
      $('#form-exercise').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
      // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>createExercise',
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
              location.reload();
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