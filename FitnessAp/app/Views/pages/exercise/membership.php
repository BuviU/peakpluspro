<!DOCTYPE html>
<html lang="en">

<head>
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
            <!-- <div class="table-responsive"> -->
              <table class="table">
                <thead>
                  <tr>
                    <div class="search-field d-none d-md-block">
                      <form class="d-flex align-items-center h-100" action="#">

                        <div class="input-group" style="border: none; ">
                          <label class="form-control form-check-label" style="border: none; 
                          font-size: 1.125rem;"><strong>Membership</strong></label>
                          <div class="input-group-append">
                            <button type="button" class="btn btnlightpurple  btn-fw"
                            style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">Create
                          New Membership</button>
                        </div>
                      </div>
                      <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search Your Membership Here..."
                        aria-label="Search Membership" aria-describedby="basic-addon2"
                        style="padding: 20px 30px !important; border-radius: 15px !important;">
                      </div>
                    </form>
                  </div>
                </tr>
              </thead>

              <tbody>
                <div class="row mt-5">
                  <?php foreach ($members as $member) { ?>
                    <div class="col-md-6 stretch-card grid-margin">
                      <div class="card  card-img-holder ">
                        <div class="card-body mini-marg">
                          <a href="<?php echo base_url() ?>program/0/<?php echo $member['id'] ?>"><img src="<?php echo base_url(); ?>public/uploads/membership_img/<?php echo $member['thumbnail']; ?>" height="64px" width="64px" alt="image" /></a>
                          <!-- <h5 class="mt-3"><span class="fontbackg">TAG</span></h5> -->
                          <h5 class="mt-3"><a href="<?php echo base_url() ?>program/0/<?php echo $member['id'] ?>"><?php echo $member['membership_name']; ?></a></h5>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 58%"
                            aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
                          </div><br>
                          <div class="description">
                            <div class="row">
                              <div class="col-md-4">
                                <p class="txt2">5 Programs</p>
                              </div>
                              <div class="col-md-4">
                                <p class="txt2">17 Workouts</p>
                              </div>
                              <div class="col-md-4">
                                <p class="txt2">331 Users</p>
                              </div>
                            </div>
                          </div>
                          <!-- <div >
                            <a class="btn btn-danger btn-sm remove-button btn_del" style="float: right;" data-id="<?php echo $member['id'] ?>"><i class="mdi mdi-delete"></i></a>
                          </div>
                          <div class="ribbon">
                            <a href="#" id="myAnchor" class="member_id" data-id=<?php echo $member['id'] ?> ><i class="mdi mdi-pencil"></i></a>
                          </div> -->

                          <div class="btn-group" role="group" aria-label="Basic example" style="float: right;">
                              
                              <a href="#" id="myAnchor" type="button" class="btn btn-outline-primary edit_btn member_id" data-id=<?php echo $member['id'] ?> >
                                  <i class="mdi mdi-pencil-outline"></i>
                              </a> 
                              <a type="button" class="btn btn-outline-primary remove-button btn_del" data-id="<?php echo $member['id'] ?>">
                                  <i class="mdi mdi-delete"></i>
                              </a>  
                            </div>

                        </div>
                      </div>
                    </div>
                  <?php } ?>

                </div>





              </tbody>
            </table>
          </div>


          <div class="col-md-4 grid-margin stretch-card mt-5">
            <div class="card" style="height: fit-content;">
              <div class="card-body">
                <h4 class="card-title">Add Membership</h4>
                <form id="membership-form" enctype="multipart/form-data">
                  <input type="hidden" name="is_edit" id="is_edit" value="0">
                  <input type="hidden" name="membership_id" id="membership_id" >

                  <div class="form-group">
                    <input type="text" class="form-control inputfieldform" id="membership_name" name="membership_name" placeholder="Membership Name">
                  </div>

                  <!-- <div class="form-group"> -->
                    <!-- <input type="file" name="img[]" class="file-upload-default" id="image_file"> -->

                    <!-- <div class="input-group mb-3">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Add thumbnail" aria-label="Add thumbnail" aria-describedby="button-addon3" style="border: none;">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button" id="button-addon3" onclick="$('#image_file').click();">Browse</button>
                            </div> -->
<!-- 
                    <div class="input-group mb-3">
                      <input type="file" class="form-control file-upload-info " id="image_file" name="image_file"  aria-label="Add thumbnail" aria-describedby="button-addon3" style="border: none;"
                      placeholder="Add thumbnail">
                  </div> -->


                  <!-- </div> -->

                  <div class="form-group">
                            <input type="file" name="image_file" class="file-upload-default" id="thumbnail_img">
                            
                            <div class="input-group mb-3">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Add thumbnail" aria-label="Add thumbnail" aria-describedby="button-addon2" style="border: none;">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button" id="button-addon2" onclick="$('#thumbnail_img').click();">Browse</button>
                            </div>
                        </div>

                  <button type="submit" class="btn1 btn-gradient-primary me-2"
                  style="width: 100%; border-radius: 25px;">Save</button>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function () {
          $('#fileInput').change(function () {
            var fileName = $(this).val().split('\\').pop(); // Get the file name without the path
            $('.file-upload-info').val(fileName); // Set the file name in the text input
          });
        });
      </script>

      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
     
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
</div>
<!-- container-scroller -->
</body>
<?= view('layouts/footer'); ?>

<script>
  document.getElementById('thumbnail-input').addEventListener('change', function () {
    previewThumbnail(this);
  });

  function previewThumbnail(input) {
    var thumbnailPreview = document.getElementById('thumbnail-preview');
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
      thumbnailPreview.src = e.target.result;
    };

    if (file) {
      reader.readAsDataURL(file);
    } else {
      thumbnailPreview.src = '#';
    }
  }
</script>


<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slicknav.js"></script>
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

<script>


  $('#membership-form').submit(function (e) {


        // alert('xgvdfg');

        e.preventDefault();

        var formData = new FormData(this);
        // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
        // ajax call
        $.ajax({
          url: '<?php echo base_url(); ?>createMembership',
          type: 'POST',
          data: formData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function () {
            $('#membership_form button[type="submit"]').attr('disabled', true);
            $('#membership_form button[type="submit"]').html('Please wait...');
          },
          success: function (data) {
            if (data.status == 201) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {


                location.reload();
              });
            }  if (data.status == 200) {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {


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
            $('#membership_form button[type="submit"]').attr('disabled', false);
            $('#membership_form button[type="submit"]').html('Create');
          },
          error: function (jqXHR, textStatus, errorThrown) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong! Please try again later.',
            });
            $('#membership_form button[type="submit"]').attr('disabled', false);
            $('#membership_form button[type="submit"]').html('Create');
          }
        });
      });



  // document.getElementById('myAnchor').addEventListener('click', myFunction);

  $('.member_id').click(function(event) {
    var member_id = $(this).attr('data-id');
    $('#membership_id').val(member_id);
    // alert(id);

    // alert('test');
    $.ajax({
      type: "GET",
      url: "<?php echo base_url(); ?>getMembershipDetails/" + member_id,
      dataType: "json",
      beforeSend: function() {
        $('#loadingModal').modal('show');
      },
      success: function(response) {
          // console.log(response);
          $('.typeahead').val('');
          if (response.status == 200) {
         var membership_name = response.data[0].membership_name; // Accessing membership_name
         $('#membership_name').val(membership_name);
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

        var membership_id = $(this).attr('data-id');

        $.ajax({
          url: '<?php echo base_url(); ?>deleteMembership/' + membership_id,
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
                text: 'This membership cannot be deleted since it contains several programs. You can continue even though no programs are attached to this membership',
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