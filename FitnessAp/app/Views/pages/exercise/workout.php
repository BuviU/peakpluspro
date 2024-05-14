
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Peakpulse Pro</title>
  <?= view('layouts/header'); ?>
  <style>
    .stretch-card {
      @include display-flex;
      @include align-items(stretch);
      @include justify-content(stretch);

      >.card {
        width: 100%;
        min-width: 100%;
        height: fit-content;

      }

    }


    .circle {
      width: 29px;
      height: 27px;
      border-radius: 20px;
      display: inline-block;
      text-align: center;
      line-height: 27px;
    }

    .circle span {
      color: white; /* text color */
    }


  </style>

  <body>


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
                     <tr>
                      <div class="search-field d-none d-md-block">
                        <form class="d-flex align-items-center h-100" action="#">

                          <div class="input-group" style="border: none; ">
                            <label class="form-control form-check-label" style="border: none; 
                            font-size: 1.125rem;"><strong>Workout</strong></label>
                            <div class="input-group-append">
                              <button type="button" class="btn btnlightpurple  btn-fw"
                              style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Create
                            New Workouts</button>
                          </div>
                        </div>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="Search Your Workout Here..."
                          aria-label="Search Workout" aria-describedby="basic-addon2"
                          style="padding: 20px 30px !important; border-radius: 15px !important;">
                        </div>
                      </form>
                    </div>
                  </tr>
                </thead>
                <tbody>
                 <div class="row mt-5"> 
                  <?php foreach ($workout as $work) {
                    $colors = array('#ff5733', '#33ff57', '#5733ff', '#ff33a8', '#33a8ff');
                    $random_color = $colors[array_rand($colors)]; 

                    $words = explode(' ', $work['workout']);

                    ?>


                    <div class="col-md-6 stretch-card grid-margin">
                      <div class="card card-img-holder">
                        <div class="card-body">
                          <h5 class="mt-3"><span class="fontbackg"><?php echo $work['description'] ?></span></h5>
                          <h5 class="mt-3"> <a href="add_exercise.html"> <?php echo $work['workout']; ?></a></h5>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15"
                            aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                        <div >
                          <a class="btn btn-danger btn-sm remove-button btn_del" style="float: right;" data-id="<?php echo $work['id'] ?>"><i class="mdi mdi-delete"></i></a>
                        </div>
                        <div class="ribbon">
                          <a href="#" id="myAnchor" class="work_edit" data-id=<?php echo $work['id']?> ><i class="mdi mdi-pencil"></i></a>
                        </div>
                      </div>
                    </div>


                  <?php } ?>
                </div>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 grid-margin stretch-card">

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add New Workout</h4>
          <form class="forms-sample" id="form-workout">
            <input type="hidden" name="workout_id" id="workout_id" >
            <input type="hidden" name="is_edit" id="is_edit" value="0">
            <div class="form-group">
             <select class="form-control form-control-lg" id="membership" name="membership" style="padding: 18px 30px !important; border-radius: 15px !important;">
              <option>Select Membership</option>
              <?php foreach ($membership as $member): ?>
                <?php if ($membership_id == $member['id']): ?>
                  <option value="<?= $member['id'] ?>" selected><?= $member['membership_name'] ?></option>
                  <?php else: ?>
                    <option value="<?= $member['id'] ?>"><?= $member['membership_name'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>

            </div>

            <div class="form-group">
              <select class="form-control form-control-lg" id="program" name="program" style="padding: 18px 30px !important; border-radius: 15px !important;">
                <option>Select Program</option>
                <?php foreach ($program as $prgm): ?>
                  <?php if ($program_id == $prgm['id']): ?>
                    <option value="<?= $prgm['id'] ?>" selected><?= $prgm['program'] ?></option>
                    <?php else: ?>
                      <option value="<?= $prgm['id'] ?>"><?= $prgm['program'] ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>

              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="workout" name="workout" placeholder="Workout Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
              </div>
              <div class="form-group" style="
              padding: 18px 30px !important;">
              <div class="form-check form-check-primary">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input" name="ExampleRadio1" id="Monday" checked="" value="Monday">Monday <i class="input-helper"></i></label>
                </div>
                <div class="form-check form-check-primary">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="ExampleRadio1" id="Tuesday" checked="" value="Tuesday">Tuesday <i class="input-helper"></i></label>
                  </div>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="ExampleRadio1" id="Wednesday" checked="" value="Wednesday">Wednesday <i class="input-helper"></i></label>
                    </div>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="ExampleRadio1" id="Thursday" checked="" value="Thursday">Thursday <i class="input-helper"></i></label>
                      </div>
                      <div class="form-check form-check-primary">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="ExampleRadio1" id="Friday" checked="" value="Friday">Friday <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="ExampleRadio1" id="Saturday" checked="" value="Saturday">Saturday <i class="input-helper"></i></label>
                          </div>
                          <div class="form-check form-check-primary">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="ExampleRadio1" id="Sunday" checked="" value="Sunday">Sunday <i class="input-helper"></i></label>
                            </div>

                          </div>
                  <!--     <div class="form-group">
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="file" class="form-control" id="image_file" name="image_file" placeholder="Add thumbnail">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button" style="padding: 12px 30px !important; border-radius: 25px !important;">Browse</button>
                          </span>
                        </div>
                      </div>
                    -->

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
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
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


  <script type="text/javascript">
  // submit category_create_form
  $('#form-workout').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
    // ajax call
    $.ajax({
      url: '<?php echo base_url(); ?>createWorkout',
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
        } else if (data.status == 200) {
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: data.message,
            showConfirmButton: false,
            timer: 1500
          }).then(function(){
            location.reload();
          });
        } else if (data.status == 404) {
          Swal.fire({
            icon: 'warning',
            title: 'Not Found!',
            text:data.message,
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


  $("#membership").blur(function(e) {
    var member_id = $(this).val();

    $.ajax({
      url: "<?php echo base_url(); ?>getprogram/" + member_id,
      method: "GET",
      data: {},
      dataType: 'json',
      success: function(response) {

       if (response.status == 200) {

        var selectElement = document.getElementById("program");
        selectElement.innerHTML = ""; 

        var defaultOption = document.createElement("option");
        defaultOption.text = "Select program";
        defaultOption.value = ""; 
        selectElement.appendChild(defaultOption);

        response.data.forEach(function(item) {
          var option = document.createElement("option");
          option.text = item.program;
          option.value = item.id; 
          selectElement.appendChild(option);
        });
      } else if (response.status == 400) {
        Swal.fire({
         icon: 'warning',
         title: 'Warning',
         text: 'No Programs Available!.',
         showConfirmButton: false,
         timer: 1500
       });
      } else {
        Swal.fire({
         icon: 'error',
         title: 'Error',
         text: 'Something went wrong!',
         showConfirmButton: false,
         timer: 1500
       });
      }
    }
  });
  });

  
  $('.work_edit').click(function(event) {
    var workout_id = $(this).attr('data-id');
    $('#workout_id').val(workout_id);
    $.ajax({
      type: "GET",
      url: "<?php echo base_url(); ?>getWorkoutDetails/" + workout_id,
      dataType: "json",
      beforeSend: function() {

      },
      success: function(response) {
        console.log(response);
        if (response.status == 200) {

          $('#membership').val(response.data[0].membership);
          $('#program').val(response.data[0].program);
          $('#workout').val(response.data[0].workout);
          $('#is_edit').val(1);

          var selected = response.data[0].description;
          var selectedRadio = document.getElementById(selected);

          if (selectedRadio) {
            selectedRadio.checked = true;
          }else{

          }


        } else {

        }
      },
      error: function(jqXHR, textStatus, errorThrown) {

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

          var workout_id = $(this).attr('data-id');

          $.ajax({
            url: '<?php echo base_url(); ?>deleteWorkout/' + workout_id,
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
                  text: 'This workout cannot be deleted since it contains several Exercises. You can continue even though no Exercises are attached to this program',
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
</body>
<?= view('layouts/footer'); ?>
</html>