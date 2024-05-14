<?= view('layouts/header'); ?>

<body>
  <div class="container-scroller">


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
                    <thead>

                    </thead>
                    <?php
                    $x = 1;
                    foreach ($categories as $category) {

                      ?>

                      <tbody>

                        <tr>

                          <td style="width: 10%;"><?php echo $x; ?></td>
                          <td><?php echo $category['category']; ?></td>
                          <td style="width: 5%;">
                            <!-- <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw btn_edit" data-toggle="modal" data-target="#edit_data" data-category-id="<?php echo $category['id']; ?>" style="padding: 10px 30px !important; border-radius: 25px !important;">Edit</button> -->

                            <div class="btn-group" role="group" aria-label="Basic example">
                              
                              <a type="button" class="btn btn-outline-primary btn_edit" data-toggle="modal" data-target="#edit_data" data-category-id="<?php echo $category['id']; ?>" >
                                  <i class="mdi mdi-pencil-outline"></i>
                              </a>

                              
                              <a type="button" class="btn btn-outline-primary btn_del" data-category-id="<?php echo $category['id']; ?>">
                                  <i class="mdi mdi-delete"></i>
                              </a>
                                   
                            </div>

                          <?php
                                // check if the user is an admin, then show delete btn
                          // if ($user_role == 1) {
                          ?>
                          
                          <!-- <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw btn_del" data-category-id="<?php echo $category['id']; ?>"  style="padding: 10px 30px !important; border-radius: 25px !important;">Delete</button> -->
                        </td>
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
              <h4 class="card-title">Add Menu Category</h4>                    
              <form class="forms-sample" id="category_insert_form" enctype="multipart/form-data">
                <div class="form-group">                        
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Menu Category Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Menu Category</h5>
            <button type="button" class="btn btn-secondary close modal_close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="category_update_form">
            <div class="modal-body">
              <input type="hidden" name="category_id_edit" id="category_id_edit">
              <input type="hidden" name="category_name_old_edit" id="category_name_old_edit" class="form-control" required>

              <div class="form-horizontal">
                <div class="box-body">

                  <div class="form-group">
                    <label for="cat_name_up">Category Name</label><small class="req"> *</small>
                    <input autofocus="" id="category_name_edit" name="category_name_edit" placeholder="" type="text" class="form-control" />
                  </div>
                  <div class="row clearfix">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label class="form-label">Order<font color="#FF0000"><strong>*</strong></font></label>
                        <input type="number" name="order" id="order" class="form-control" placeholder="" required>
                      </div>
                    </div>
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

    // submit category_create_form
    $('#category_insert_form').submit(function(e) {
      e.preventDefault();
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/menu_category/create',
        type: 'POST',
        data: new FormData(this),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#category_insert_form button[type="submit"]').attr('disabled', true);
          $('#category_insert_form button[type="submit"]').html('Please wait...');
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
              window.location.href = "<?php echo base_url(); ?>settings/menu_category";
            });
          } else if (data.status == 400 || data.status == 409) {
            Swal.fire({
              icon: 'warning',
              title: 'Warning',
              text: data.message,
            });
          } else if (data.status == 500) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
            });
          }
          $('#category_insert_form button[type="submit"]').attr('disabled', false);
          $('#category_insert_form button[type="submit"]').html('Create');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#category_insert_form button[type="submit"]').attr('disabled', false);
          $('#category_insert_form button[type="submit"]').html('Create');
        }
      });
    });

        // .edit-category-btn click
        $('.btn_edit').click(function() {
          $('#edit_data').modal('show');
      // get category id
      var category_id = $(this).attr('data-category-id');
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/menu_category/show/' + category_id,
        type: 'GET',
        data: {},
        dataType: 'json',
        beforeSend: function() {
          $('#categoryEditOffcanvas button[type="submit"]').attr('disabled', true);
          $('#categoryEditOffcanvas button[type="submit"]').html('Please wait...');
        },
        success: function(response) {
          // response status == 200
          if (response.status == 200) {
            // set category id
            $('#category_id_edit').val(response.data.id);
            // set category id
            $('#order').val(response.data.order_id);
            // set category name
            $('#category_name_edit').val(response.data.category);
            $('#category_name_old_edit').val(response.data.category);
            // open offcanvas
            $('#categoryEditOffcanvas').offcanvas('show');
            $('#categoryEditOffcanvas button[type="submit"]').attr('disabled', false);
            $('#categoryEditOffcanvas button[type="submit"]').html('Update');

          } else if (response.status == 404) {
            Swal.fire({
              icon: 'Warning',
              title: 'Not Found',
              text: response.message,
            });
            $('#categoryEditOffcanvas button[type="submit"]').attr('disabled', false);
            $('#categoryEditOffcanvas button[type="submit"]').html('Update');
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#categoryEditOffcanvas button[type="submit"]').attr('disabled', false);
          $('#categoryEditOffcanvas button[type="submit"]').html('Update');
        }
      });
    });


    // submit category_update_form
    $('#category_update_form').submit(function(e) {
      e.preventDefault();
      // get category id
      var category_id = $('#category_id_edit').val();
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/menu_category/update/' + category_id,
        type: 'PUT',
        data: $(this).serialize(),
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#category_update_form button[type="submit"]').attr('disabled', true);
          $('#category_update_form button[type="submit"]').html('Please wait...');
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
              window.location.href = "<?php echo base_url(); ?>settings/menu_category";
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
          $('#category_update_form button[type="submit"]').attr('disabled', false);
          $('#category_update_form button[type="submit"]').html('Create');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#category_update_form button[type="submit"]').attr('disabled', false);
          $('#category_update_form button[type="submit"]').html('Create');
        }
      });
    });


            // delete-category-btn click
            $('.btn_del').click(function() {
              Swal.fire({
                title: 'Are you sure ?',
                html: "<label class='data-text'>if you proceed, Sub menu items under this menu category will also be deleted! Please note that this action cannot be undone, so proceed with caution.</label>",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
          // get category id
          var category_id = $(this).attr('data-category-id');
          // ajax call
          $.ajax({
            url: '<?php echo base_url(); ?>settings/menu_category/delete/' + category_id,
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
                  window.location.href = "<?php echo base_url(); ?>settings/menu_category";
                });
              } else if (data.status == 500) {
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


            $(".modal_close").click(function() {
              $('#edit_data').modal('hide');
              $(':input[type="submit"]').prop('disabled', false);
            });
          </script>
</html>