<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Peakpulse Pro</title>

    <?= view('layouts/header'); ?>
     <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">


    
</head>

<body>
    <div id="baseHeader"></div> 
    <div class="container-fluid page-body-wrapper">
        <div id="sidebar"><?= view('layouts/sidebar'); ?></div>


        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-md-8 grid-margin">
                <div class="card">
                  <div class="card-body">                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>

                          <tr>
                           <div class="search-field">
                            <form class="d-flex align-items-center h-100" action="#" style="padding-top: 40px;">

                                <div class="input-group" style="border: none; ">                                  
                                   <label class="form-control form-check-label" style="border: none; 
                                   font-size: 1.125rem;"><strong>Users</strong></label>
                                   <div class="input-group-append">
                                     <button type="button" class="btn btnlightpurple  btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Add New Users</button>
                                 </div> 
                             </div>
                             <div class="input-group">                                   
                                <input type="search" class="form-control" placeholder="Search Your Exercise Here..." aria-label="Search Users" aria-describedby="basic-addon2" style="padding: 20px 30px !important; border-radius: 15px !important;">

                            </div>

                        </form>
                    </div></tr>
                </thead>
                <tbody>
                  <?php foreach ($clients as $client) : ?>
                      <tr>
                        <td style="width: 100%;">
                          <img src="<?php echo base_url(); ?>uploads/client_img/<?php echo $client['prof_pic']; ?>" class="me-2" alt="image"> <?php echo $client['f_name']; ?> <?php echo $client['l_name']; ?> <br><br>
                          <?php echo $client['email']; ?>
                      </td>
                      <td  style="width: 100%;"></td><td style="width: 100%;"></td>
                      <td> <button type="button" class="btn1 btn-outline-primary btn-rounded btn-fw"  onclick="window.location.href='<?= base_url('editUser/' . $client['user_id']) ?>'"><i class="mdi mdi-pencil"></i></button></td>
                  </tr>
              <?php endforeach; ?>











          </tbody>
      </table>
  </div>
                  </div>
                  </div>
              </div>

              <div class="col-md-4 grid-margin stretch-card mt-5">

                <div class="card">
                   <div class="card-body">
                    <h4 class="card-title">Add Users</h4>                    
                    <form id="createUser" class="forms-sample" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control inputfieldform" id="f_name" name="f_name"
                            placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control inputfieldform" id="l_name" name="l_name"
                            placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control inputfieldform" id="email" name="email"
                            placeholder="Email">
                        </div>

                                                    
                            <!-- <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload Profile Image"
                                style="border: none;">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                    onclick="$('#user_img').click();">Browse</button>
                                </span>
                            </div> -->
                        <div class="form-group">
                            <input type="file" name="image_file" class="file-upload-default" id="user_img">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Profile Image" aria-label="Profile Image" aria-describedby="button-addon2" style="border: none;">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button" id="button-addon2" >Browse</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <select class="form-control inputfieldform" id="exampleSelectGender" name="gender"
                            placeholder="Gender">
                            <option>Select Your Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <input type="date" class="form-control inputfieldform" name="dob"
                            placeholder="Date of Birth (dd/mm/yyyy)"/>
                        </div>
                    </div>
                    <h5 class="card-title1">Body Composition</h5>
                    <div class="form-group">
                        <input type="text" class="form-control inputfieldform" id="calories"
                        placeholder="Calories">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control inputfieldform" id="bodyfat"
                        placeholder="Estimated Bodyfat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control inputfieldform" id="weight"
                        placeholder="weight (Kg)">
                    </div>
                    <div class="form-group">
                        <select class="form-control inputfieldform" id="Activity_level"
                        placeholder="Activity level">
                        <option>Activity Level</option>
                        <option>Level 1</option>
                        <option>Level 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control inputfieldform" id="Height"
                    placeholder="Height">
                </div>
                <div class="form-group">
                    <select class="form-control inputfieldform" id="Conversion_System"
                    placeholder="Preferred Conversion System">
                    <option>Prefered Conversion System</option>
                    <option>System 1</option>
                    <option>System 2</option>
                </select>
            </div>
            <div class="form-group">
                <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled
                    placeholder="Upload Front Picture"
                    style="padding: 18px 30px !important; border: none;">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                        onclick="$('#fileInput').click();">Browse</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled
                    placeholder="Upload Back Picture"
                    style="padding: 18px 30px !important; border: none;">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                      onclick="$('#fileInput').click();">Browse</button>
                  </span>
              </div>
          </div>
          <div class="form-group">
            <input type="file" name="img[]" class="file-upload-default" id="fileInput">
            <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled
                placeholder="Upload Left Side Picture"
                style="padding: 18px 30px !important; border: none;">
                <span class="input-group-append">
                    <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                    onclick="$('#fileInput').click();">Browse</button>
                </span>
            </div>
        </div>
        <div class="form-group">
            <input type="file" name="img[]" class="file-upload-default" id="fileInput">
            <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled
                placeholder="Upload Right Side Picture"
                style="padding: 18px 30px !important; border: none;">
                <span class="input-group-append">
                  <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                  onclick="$('#fileInput').click();">Browse</button>
              </span>
          </div>
      </div>


      <div class="form-group">
        <input type="file" name="img[]" class="file-upload-default">
        <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled
            placeholder="Upload Right Side Picture"
            style="padding: 18px 30px !important; border: none;">
            <span class="input-group-append">
                <button class="file-upload-browse btn1 btn-gradient-primary" type="button">Browse</button>
            </span>
        </div>
    </div>
    <div class="form-group">
        <input type="text" class="form-control inputfieldform" id="weight"
        placeholder="Waist Measurement (cm)">
    </div>
    <div class="form-group">
        <input type="text" class="form-control inputfieldform" id="weight"
        placeholder="Chest Measurement (cm)">
    </div>
    <div class="form-group">
        <input type="text" class="form-control inputfieldform" id="weight"
        placeholder="Hip Measurement (cm)">
    </div>
    <div class="form-group">
        <input type="text" class="form-control inputfieldform" id="weight"
        placeholder="Thigh Measurement (cm)">
    </div>
    <div class="form-group">
        <input type="text" class="form-control inputfieldform" id="weight"
        placeholder="Arm Measurement (cm)">
    </div>

    <button type="submit" class="btn1 btn-gradient-primary me-2"
    style="width: 100%; border-radius: 25px;">Save
</button>


</form>
</div>
</div>
</div>

</div>
</div>

<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">

</footer>
<!-- partial -->
</div>

<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>



<!-- plugins:js -->

<!-- endinject -->


<!-- endinject -->

<!-- End custom js for this page -->
<?= view('layouts/footer'); ?>

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


<script>
    $(document).ready(function () {
        $('#createUser').on('submit', function (e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "<?php echo base_url(); ?>createUser",
                type: 'POST',
                data: formData,
                dataType: 'json',
                cache: false,
                processData: false, // Important! It prevents jQuery from transforming the data into a query string
                contentType: false, // Important! The content type is set to false for FormData to work
                beforeSend: function() {
                    $('#createUser button[type="submit"]').attr('disabled', true);
                    $('#createUser button[type="submit"]').html('Please wait...');
                },
                success: function (data) {
                    console.log(data);
                   if (data.status == 201) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
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
                        title: 'Failed',
                        text: data.message,
                    });
                    } else if (data.status == 500) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message,
                    });
                    } else if (data.status == 408) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Duplicate Data',
                            text: data.message,
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle any errors here
                    // console.log(textStatus, errorThrown);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again later.',
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#fileInput').change(function() {
                    var fileName = $(this).val().split('\\').pop(); // Get the file name without the path
                    $('.file-upload-info').val(fileName); // Set the file name in the text input
                });
    });
</script>
</body>
</html>