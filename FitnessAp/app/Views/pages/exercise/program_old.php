<?= view('layouts/header'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Peakpulse Pro</title>

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />

</head>

<body>
  <div id="baseHeader"></div>
  <div class="container-fluid page-body-wrapper">
    <div id="sidebar"><?= view('layouts/sidebar'); ?></div>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <div class="search-field d-none d-md-block">
                          <form class="d-flex align-items-center h-100">
                            <div class="input-group" style="border: none; ">
                              <label class="form-control form-check-label" style="border: none; font-size: 1.125rem;"><strong>Program</strong></label>
                              <div class="input-group-append">
                                <button type="button" class="btn btnlightpurple  btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Create New Program</button>
                              </div>
                            </div>
                            <div class="input-group">
                              <input type="search" class="form-control" placeholder="Search Your Program Here..." aria-label="Search Program" aria-describedby="basic-addon2" style="padding: 20px 30px !important; border-radius: 15px !important;">
                            </div>
                          </form>
                        </div>
                      </tr>
                    </thead><br>
                  <!--   <div class="row">
                      <div class="col-12">
                        <h3>Membership 1</h3>
                      </div>
                    </div> -->

                    <div class="row">
                      <?php  foreach ($membership as $member) {



                        ?>
                        <h3><?php echo $member['membership_name']; ?></h3>
                        <?php  foreach ($program as $prog) {

                          if($member['id'] == $prog['membership']){


                            ?>
                            <div class="col-md-4 stretch-card grid-margin">
                              <div class="card  card-img-holder ">
                                <div class="card-body">
                                  <div class="video-container">
                                    <img src="<?php echo base_url(); ?>public/uploads/program_img/<?php echo $prog['thumbnail']; ?>" width="200px" height="130px">
                                  </div><br>
                                  <h5><span class="fontbackg"><?php echo $prog['program']; ?></span></h5>
                                  <!-- <h5>Phase 1</h5> -->
                                  <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div><br>
                                  <div class="description">
                                    <div class="row">
                                      <div class="col-md-7">
                                        <p class="txt1">17 Workouts</p>
                                      </div>
                                      <div class="col-md-5">
                                        <p class="txt1">331 Users</p>
                                      </div>
                                    </div>
                                  </div>
                                  <button class="btn btn-primary add-workouts" data-program = "<?php echo $prog['id'] ?>" data-membership = "<?php echo $prog['membership'] ?>">Add Workouts</button>
                                </div>
                              </div>
                            </div>
                          <?php } } ?>

                        </div>
                      <?php } ?>



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="height: fit-content;">
              <div class="card-body">
                <h4 class="card-title">Add Program</h4>
                <form class="forms-sample" id="program_form">
                  <div class="form-group">
                   <select class="form-control form-control-lg" id="membership" name="membership" style="padding: 18px 30px !important; border-radius: 15px !important;">
                    <option value="1">Select Membership</option>
                    <?php foreach ($membership as $member): ?>
                      <option value="<?= $member['id'] ?>"><?= $member['membership_name'] ?></option>
                    <?php endforeach; ?>
                  </select>

                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="program" name="program"  placeholder="Program Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="description" name="description" placeholder="Description" style="padding: 18px 30px !important; border-radius: 15px !important;">
                </div>
                <div class="form-group">
                  <input type="file" name="img[]" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="file" class="form-control" id="image_file" name="image_file"
                    placeholder="Add thumbnail">
                    <span class="input-group-append">
                      <button class="file-upload-browse btn btn-gradient-primary" type="button"
                      style="padding: 12px 30px !important; border-radius: 25px !important;">Browse</button>
                    </span>
                  </div>
                </div>
                <button type="submit" class="btn1 btn-gradient-primary me-2" id="btn_submit" style="width: 100%; border-radius: 25px;">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <?= view('layouts/footer'); ?>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

<!-- container-scroller -->

<!-- endinject -->
<!-- Plugin js for this page -->


<!-- Custom js for this page -->

<!-- End custom js for this page -->
</body>
<?= view('layouts/footer'); ?>

<script>
  $('#program_form').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
    // ajax call
    $.ajax({
      url: '<?php echo base_url(); ?>createProgram',
      type: 'POST',
      data: formData,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function() {
        $('#program_form button[type="submit"]').attr('disabled', true);
        $('#program_form button[type="submit"]').html('Please wait...');
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
        $('#program_form button[type="submit"]').attr('disabled', false);
        $('#program_form button[type="submit"]').html('Create');
      },
      error: function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong! Please try again later.',
        });
        $('#program_form button[type="submit"]').attr('disabled', false);
        $('#program_form button[type="submit"]').html('Create');
      }
    });
  });


      // Get all elements with class "add-workouts"
      var addButtons = document.querySelectorAll('.add-workouts');

    // Loop through each button and add click event listener
    addButtons.forEach(function(button) {
      button.addEventListener('click', function() {
            // Get the program ID and membership ID from the data attributes
            var programId = this.getAttribute('data-program');
            var membershipId = this.getAttribute('data-membership');
            
            // Construct the URL with the program ID and membership ID
            window.location.href = "<?php echo base_url(); ?>workout/"+programId+"/"+membershipId;
            
            // Redirect to the constructed URL
            window.location.href = url;
          });
    });
  </script>

  </html>