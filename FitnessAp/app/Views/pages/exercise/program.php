

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>Peakpulse Pro</title>
  
  <?= view('layouts/header'); ?>

</head>
<body>
<div class="container-scroller">
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
                                                  font-size: 1.125rem;"><strong>Programs</strong></label>
                                                  <div class="input-group-append">
                                                    <button type="button" class="btn btnlightpurple  btn-fw"
                                                    style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Create
                                                  New Programs</button>
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
                                          <?php  foreach ($selected_program as $prog) { ?>
                                            <div class="col-md-6 stretch-card grid-margin">
                                              <div class="card card-img-holder">
                                                <div class="card-body">

                                                  <a href="<?php echo base_url() ?>workout/<?php echo $prog['id'] ?>/<?php echo $prog['membership'] ?>"><img src="<?php echo base_url(); ?>public/uploads/program_img/<?php echo $prog['thumbnail']; ?>" alt="image" width="64px" height="64px"/></a>

                                                  <h5 class="mt-3"> <a href="<?php echo base_url() ?>workout/<?php echo $prog['id'] ?>/<?php echo $prog['membership'] ?>"><?php echo $prog['program']; ?></a></h5>
                                                  <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 55%" aria-valuenow="55"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                  </div>
                                                  <br />
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
                                                  <div >
                                                    <a class="btn btn-danger btn-sm remove-button btn_del" style="float: right;" data-id="<?php echo $prog['id'] ?>"><i class="mdi mdi-delete"></i></a>
                                                  </div>
                                                  <div class="ribbon">
                                                   <a href="#" id="myAnchor" class="program_edit" data-id=<?php echo $prog['id'] ?> ><i class="mdi mdi-pencil"></i></a>
                                                 </div>
                                                 <button class="btn1 btn-primary add-workouts" data-program = "<?php echo $prog['id'] ?>" data-membership = "<?php echo $prog['membership'] ?>">Add Workouts</button>
                                               </div>
                                             </div>
                                           </div>
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
                                        <h4 class="card-title">Add Program</h4>
                                        <form class="forms-sample" id="program_form">
                                          <input type="hidden" name="program_id" id="program_id" >
                                          <input type="hidden" name="is_edit" id="is_edit" value="0">
                                          <input type="hidden" name="tmp_mem" id="tmp_mem" value="<?php echo $id;?>">
                                          <div class="form-group">
                                            <select class="form-control form-control-lg" id="membership" name="membership" style="padding: 18px 30px !important; border-radius: 15px !important;">
                                              <option value="">Select Membership</option>
                                              <?php foreach ($membership as $member):
                                                  if($membership_id == $member['id'] ){
                                                    $txt = 'selected';
                                                  }else{
                                                    $txt ='';
                                                  }

                                               ?>
                                                <option value="<?= $member['id'] ?>"  <?php  echo $txt;?> ><?= $member['membership_name'] ?></option>
                                              <?php endforeach; ?>
                                            </select>

                                          </div>
                                          <div class="form-group">
                                            <input type="text" class="form-control" id="program" name="program"  placeholder="Program Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
                                          </div>
                                          <div class="form-group">
                                            <input type="text" class="form-control" id="description" name="description" placeholder="Description" style="padding: 18px 30px !important; border-radius: 15px !important;">
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
                                          <button type="submit" class="btn1 btn-gradient-primary me-2" id="btn_submit" style="width: 100%; border-radius: 25px;">Save</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- content-wrapper ends -->
                              <!-- partial:partials/_footer.html -->
                             
                              <!-- partial -->
                            </div>
                            <!-- main-panel ends -->
                          </div>
                          <!-- page-body-wrapper ends -->
                          </div>
                        </body>
                        <?= view('layouts/footer'); ?>

                        <script>
                          $('#program_form').submit(function(e) {
                            e.preventDefault();

                            var formData = new FormData(this);

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

                                    location.reload();
                                  });
                                }  else  if (data.status == 200) {
                                  Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                  }).then(function() {

                                    location.reload();
                                  });
                                }else if (data.status == 404) {
                                  Swal.fire({
                                    icon: 'warning',
                                    title: 'Not Found Data',
                                    text: data.message,
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


    $(document).ready(function() {
      $('#membership').change(function() {
        var selectedMembership = $(this).val();
        var id = $("#tmp_mem").val();
            
        window.location.href = "<?= site_url('program/') ?>" + selectedMembership+"/"+ id;
      });
    });




    $('.program_edit').click(function(event) {
      var program_id = $(this).attr('data-id');
      $('#program_id').val(program_id);



      $.ajax({
        type: "GET",
        url: "<?php echo base_url(); ?>getProgramDetails/" + program_id,
        dataType: "json",
        beforeSend: function() {
          $('#loadingModal').modal('show');
        },
        success: function(response) {

          if (response.status == 200) {

            $('#membership').val(response.data[0].membership);
            $('#program').val(response.data[0].program);
            $('#description').val(response.data[0].Description);
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

          var program_id = $(this).attr('data-id');

          $.ajax({
            url: '<?php echo base_url(); ?>deleteProgram/' + program_id,
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
                  title: 'This program cannot be deleted since it contains several workouts. You can continue even though no workouts are attached to this program',
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