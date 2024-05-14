<?= view('layouts/header'); ?>

<body>
  <div class="container-scroller">

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
            <div class="col-md-8 grid-margin stretch-card mt-5">
              <div class="card">
                <div class="card-body">                    
                  <div class="table-responsive">
                    <table class="table">

                      <thead class="thead-dark">
                        <tr>
                          <th>#</th>
                          <th>Profile Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <?php
                      $x = 1;
                      foreach ($profiles as $profile) {

                        ?>

                        <tbody>

                          <tr>

                            <td style="width: 10%;"><?php echo $x; ?></td>
                            <td><?php echo $profile['type']; ?></td>
                            <td style="width: 5%;">
                              <!-- <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw edit-profile-btn" data-toggle="modal" data-target="#edit_data" data-profile-id="<?php echo $profile['id']; ?>" style="padding: 10px 30px !important; border-radius: 25px !important;">Edit</button> -->

                              <div class="btn-group" role="group" aria-label="Basic example">
                              
                              <a type="button" class="btn btn-outline-primary dit-profile-btn" data-toggle="modal" data-target="#edit_data" data-profile-id="<?php echo $profile['id']; ?>">
                                  <i class="mdi mdi-pencil-outline"></i>
                              </a>

                              
                              <a type="button" class="btn btn-outline-primary delete-profile-btn" data-profile-id="<?php echo $profile['id']; ?>">
                                  <i class="mdi mdi-delete"></i>
                              </a>
                               

                                
                            </div>

                            </td>
                            <?php
                                // check if the user is an admin, then show delete btn
                          // if ($user_role == 1) {
                            ?>
                            <!-- <td  style="width:5%;"> <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw delete-profile-btn" data-profile-id="<?php echo $profile['id']; ?>"  style="padding: 10px 30px !important; border-radius: 25px !important;">Delete</button></td> -->
                            <?php 
                        // }
                            ?>


                          </tr>

                        </tbody>
                        <?php


                        $x++;
                      } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card mt-5">

              <div class="card">
               <div class="card-body">
                <h4 class="card-title">Add Profile Details</h4>                    
                <form class="forms-sample" id="profile_insert_form" enctype="multipart/form-data">
                  <div class="form-group">                        
                    <input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Enter Group Profile Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
                  </div>



                  <button type="submit" class="btn1 btn-gradient-primary me-2" style="width: 100%; border-radius: 25px;">Save</button>


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
              <h5 class="modal-title" id="exampleModalLabel">Edit Profile Name</h5>
              <button type="button" class="btn btn-secondary close modal_close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="profile_update_form">
              <div class="modal-body">
                <input type="hidden" name="profile_id_edit" id="profile_id_edit">
                <input type="hidden" name="profile_name_old_edit" id="profile_name_old_edit" class="form-control" required>

                <div class="form-horizontal">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="cat_name_up">Profile Name</label><small class="req"> *</small>
                      <input autofocus="" id="profile_name_edit" name="profile_name_edit" placeholder="" type="text" class="form-control" />
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

    // submit profile_create_form
    $('#profile_insert_form').submit(function(e) {
      e.preventDefault();
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/group_profile/create',
        type: 'POST',
        data: new FormData(this),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#profile_insert_form button[type="submit"]').attr('disabled', true);
          $('#profile_insert_form button[type="submit"]').html('Please wait...');
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
              window.location.href = "<?php echo base_url(); ?>settings/group_profile";
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
              title: 'Duplicate Profile Name',
              text: data.message,
            });
          } else if (data.status == 500) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
            });
          }
          $('#profile_insert_form button[type="submit"]').attr('disabled', false);
          $('#profile_insert_form button[type="submit"]').html('Create');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#profile_insert_form button[type="submit"]').attr('disabled', false);
          $('#profile_insert_form button[type="submit"]').html('Create');
        }
      });
    });

    // .edit-profile-btn click
    $('.edit-profile-btn').click(function() {
      // get profile id
      $('#edit_data').modal('show');
      var profile_id = $(this).attr('data-profile-id');
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/group_profile/show/' + profile_id,
        type: 'GET',
        data: {},
        dataType: 'json',
        beforeSend: function() {
          $('#profileEditOffcanvas button[type="submit"]').attr('disabled', true);
          $('#profileEditOffcanvas button[type="submit"]').html('Please wait...');
        },
        success: function(response) {
          if (response.status == 200) {
            // set profile id
            $('#profile_id_edit').val(response.data.profile.id);
            // set profile name
            $('#profile_name_edit').val(response.data.profile.type);
            $('#profile_name_old_edit').val(response.data.profile.type);
            // open offcanvas
            $('#profileEditOffcanvas').offcanvas('show');
            $('#profileEditOffcanvas button[type="submit"]').attr('disabled', false);
            $('#profileEditOffcanvas button[type="submit"]').html('Update');
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Not Found',
              text: response.message,
            });
            $('#profileEditOffcanvas button[type="submit"]').attr('disabled', true);
            $('#profileEditOffcanvas button[type="submit"]').html('Update');
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#profileEditOffcanvas button[type="submit"]').attr('disabled', false);
          $('#profileEditOffcanvas button[type="submit"]').html('Update');
        }
      });
    });

    // submit profile_update_form
    $('#profile_update_form').submit(function(e) {
      e.preventDefault();
      // get profile id
      var profile_id = $('#profile_id_edit').val();
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/group_profile/update/' + profile_id,
        type: 'PUT',
        data: $(this).serialize(),
        cache: false,
        processData: true,
        beforeSend: function() {
          $('#profile_update_form button[type="submit"]').attr('disabled', true);
          $('#profile_update_form button[type="submit"]').html('Please wait...');
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
              window.location.href = "<?php echo base_url(); ?>settings/group_profile";
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
              title: 'Duplicate Profile Name',
              text: data.message,
            });
          } else if (data.status == 500) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
            });
          }
          $('#profile_update_form button[type="submit"]').attr('disabled', false);
          $('#profile_update_form button[type="submit"]').html('Create');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#profile_update_form button[type="submit"]').attr('disabled', false);
          $('#profile_update_form button[type="submit"]').html('Create');
        }
      });
    });

    // delete-profile-btn click
    $('.delete-profile-btn').click(function() {
      Swal.fire({
        title: 'Are you sure ?',
        html: "<label class='data-text'>Users who registered under this profile won't be able to logged in to the system once you delete this! Please note that this action cannot be undone, so proceed with caution.</label>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          // get profile id
          var profile_id = $(this).attr('data-profile-id');
          // ajax call
          $.ajax({
            url: '<?php echo base_url(); ?>settings/group_profile/delete/' + profile_id,
            type: 'DELETE',
            data: {},
            dataType: 'json',
            beforeSend: function() {
              $('.delete-profile-btn').attr('disabled', true);
              $('.delete-profile-btn').html('<i class="fa fa-spinner fa-spin"></i>');
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
                  window.location.href = "<?php echo base_url(); ?>settings/group_profile";
                });
              } else if (data.status == 500) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: data.message,
                });
              }
              $('.delete-profile-btn').attr('disabled', false);
              $('.delete-profile-btn').html('<i class="fa fa-trash"></i>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! Please try again later.',
              });
              $('.delete-profile-btn').attr('disabled', false);
              $('.delete-profile-btn').html('<i class="fa fa-trash"></i>');
            }
          });
        }
      })

    });

    $(".modal_close").click(function() {
      $('#edit_data').modal('hide');
      $(':input[type="submit"]').prop('disabled', false);
    });
  </script>

  </html>