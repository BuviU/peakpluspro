

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Peakpulse Pro</title>
  
  <?= view('layouts/header'); ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.css">



</head>
<body>

  <div class="container-fluid page-body-wrapper">
    <div id="sidebar"><?= view('layouts/sidebar'); ?></div>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-8 grid-margin mt-5">
                                <!-- <div class="card">
                                  <div class="card-body"> -->
                                    <!-- <div class="table-responsive"> -->
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <div class="search-field d-none d-md-block">
                                              <form class="d-flex align-items-center h-100" action="#">

                                                <div class="input-group" style="border: none; ">
                                                  <label class="form-control form-check-label" style="border: none; 
                                                  font-size: 1.125rem;"><strong>Exercise</strong></label>
                                                  <div class="input-group-append">
                                                    <button type="button" class="btn btnlightpurple  btn-fw"
                                                    style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Create
                                                  New Exercise</button>
                                                </div>
                                              </div>
                                              <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search Your Program Here..."
                                                aria-label="Search Membership" aria-describedby="basic-addon2"
                                                style="padding: 20px 30px !important; border-radius: 15px !important;">
                                              </div>
                                            </form>
                                          </div>
                                        </tr>
                                      </thead>
                                      <tbody>
                                       
                                        <div class="row mt-5">
                                          <?php  foreach ($exercise as $excize) { ?>
                                            <tr>
                                              <td style="width: 100%;">
                                                <img src="<?php echo base_url(); ?>public/uploads/exercise_img/<?php echo $excize['thumbnail']; ?>" class="me-2" alt="image"><?php echo  $excize['exercise_name']; ?><br><br>

                                              </td>
                                              <td  style="width: 100%;"></td><td style="width: 100%;"></td>
                                              <td> <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw" style="padding: 10px 30px !important; border-radius: 25px !important;">Open</button></td>
                                              <td>   <div class="ribbon">
                                                <a href="#" id="myAnchor" class="exercise_id" data-id=<?php echo $excize['id'] ?> ><i class="mdi mdi-pencil"></i></a>
                                              </div></td>
                                              <td>   <div >
                                                <a class="btn btn-danger btn-sm remove-button btn_del" style="float: right;" data-id="<?php echo $excize['id'] ?>"><i class="mdi mdi-delete"></i></a>
                                              </div></td>
                                            </tr>
                                          <?php } ?>
                                        </div>
                                      </tbody>
                                    </table>
                                    <!-- </div> -->
                                    <!-- </div>
                                    </div> -->
                                  </div>
                                  <div class="col-md-4 grid-margin stretch-card mt-5">
                                    <div class="card" style="height: fit-content;">
                                      <div class="card-body">
                                        <h4 class="card-title">Add Exercise</h4>
                                        <form class="forms-sample" id="exercise_form">
                                          <input type="hidden" name="exercise_id" id="exercise_id">
                                          <input type="hidden" name="is_edit" id="is_edit" value="0">

                                          <div class="form-group">
                                            <input type="text" class="form-control" id="exercise" name="exercise"  placeholder="Exercise Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
                                          </div>

                                          <!-- <div class="form-group">
                                            <input type="file" name="img[]" class="file-upload-default">
                                            <div class="input-group col-xs-12">
                                              <input type="file" class="form-control" id="image_file" name="image_file"
                                              placeholder="Add thumbnail">
                                              <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-gradient-primary" type="button"
                                                style="padding: 12px 30px !important; border-radius: 25px !important;">Browse</button>
                                              </span>
                                            </div>
                                          </div> -->

                                          <div class="form-group">
                            <input type="file" name="image_file" class="file-upload-default" id="thumbnail_img">
                            
                            <div class="input-group mb-3">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Add thumbnail" aria-label="Add thumbnail" aria-describedby="button-addon2" style="border: none;">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button" id="button-addon2" onclick="$('#thumbnail_img').click();">Browse</button>
                            </div>
                        </div>
                                          <div class="form-group">
                                            <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Video URL" style="padding: 18px 30px !important; border-radius: 15px !important;">
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
                          <!-- </div> -->
                        </body>
                        <?= view('layouts/footer'); ?>

                        <script>
                          $('#exercise_form').submit(function(e) {
                            e.preventDefault();

                            var formData = new FormData(this);

                            $.ajax({
                              url: '<?php echo base_url(); ?>createNewExercise',
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

                                    location.reload();
                                  });
                                }else if (data.status == 200) {
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
                                    title: 'Duplicate Exercise Name',
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


    $(document).ready(function() {
      $('#membership').change(function() {
        var selectedMembership = $(this).val();
        window.location.href = "<?= site_url('program/index/') ?>" + selectedMembership;
      });
    });

    $('.exercise_id').click(function(event) {
      var exercise_id = $(this).attr('data-id');
      $('#exercise_id').val(exercise_id);

      $.ajax({
        type: "GET",
        url: "<?php echo base_url(); ?>getExerciseDetails/" + exercise_id,
        dataType: "json",
        beforeSend: function() {
          $('#loadingModal').modal('show');
        },
        success: function(response) {
          // console.log(response);
          // $('.typeahead').val('');
          if (response.status == 200) {
         var exercise_name = response.data[0].exercise_name; // Accessing membership_name
         $('#exercise').val(exercise_name);
         $('#video_url').val(response.data[0].video_url);
         $('#is_edit').val(1);

       } else {

       }
     },
     error: function(jqXHR, textStatus, errorThrown) {
      $('#loadingModal').modal('hide');
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Something went wrong! Please try again later.',
      });
    }
  });
    });


    // DELETE MEMBERSHIP DETAILS

    $('.btn_del').click(function() {

      Swal.fire({
        title: 'Are you sure ?',
        html: "<label class='data-text'>Are You Sure? Please note that this action cannot be undone, so proceed with caution.</label>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#a68edb',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {

          var exercise_id = $(this).attr('data-id');

          $.ajax({
            url: '<?php echo base_url(); ?>deleteExercise/' + exercise_id,
            type: 'DELETE',
            data: {},
            dataType: 'json',
            beforeSend: function() {
              $('.delete-category-btn').attr('disabled', true);
              $('.delete-category-btn').html('<i class="fa fa-spinner fa-spin"></i>');
            },
            success: function(data) {
              if (data.status == 200) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: data.message,
                  showConfirmButton: false,
                  timer: 1500
                }).then(function() {

                  location.reload();
                });
              } else if (data.status == 409) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: data.message,
                  // text: 'This Exercise  cannot be deleted since it contains several Exercise. You can continue even though no exercise are attached to this membership',
                });
              }else if (data.status == 500) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: data.message,
                });
              }
              $('.delete-category-btn').attr('disabled', false);
              $('.delete-category-btn').html('<i class="fa fa-trash"></i>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! Please try again later.',
              });
              $('.delete-category-btn').attr('disabled', false);
              $('.delete-category-btn').html('<i class="fa fa-trash"></i>');
            }
          });
        }
      })

    });
  </script>

  </html>