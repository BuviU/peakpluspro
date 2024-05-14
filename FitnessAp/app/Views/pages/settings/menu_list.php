<?= view('layouts/header'); ?>

<body>
  <div class="container-scroller">


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <div id="sidebar"><?= view('layouts/sidebar'); ?></div>
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
                          <th>Category</th>
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      $x = 1;
                      foreach ($menu_list as $menu_item) {

                        ?>

                        <tbody>

                          <tr>

                            <td style="width: 10%;"><?php echo $x; ?></td>
                            <td><?php echo $menu_item['category']; ?></td>
                            <td><?php echo $menu_item['name']; ?></td>
                            <td style="width: 5%;">

                            <div class="btn-group" role="group" aria-label="Basic example">
                              
                              <a type="button" class="btn btn-outline-primary edit-menu-item-btn" data-toggle="modal" data-target="#edit_data" data-menu-item-id="<?php echo $menu_item['id']; ?>" >
                                  <i class="mdi mdi-pencil-outline"></i>
                              </a>

                              
                              <a type="button" class="btn btn-outline-primary delete-menu-item-btn"  data-menu-item-id="<?php echo $menu_item['id']; ?>">
                                  <i class="mdi mdi-delete"></i>
                              </a>
                                   
                            </div>

                              <!-- <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw edit-menu-item-btn" data-toggle="modal" data-target="#edit_data" data-menu-item-id="<?php echo $menu_item['id']; ?>" style="padding: 10px 30px !important; border-radius: 25px !important;">Edit</button> -->

                            </td>
                            <?php
                                // check if the user is an admin, then show delete btn
                          // if ($user_role == 1) {
                            ?>
                            <!-- <td  style="width:5%;"> <button type="button" class="btn2 btn-gradient-primary btn-rounded btn-fw delete-menu-item-btn" data-menu-item-id="<?php echo $menu_item['id']; ?>"  style="padding: 10px 30px !important; border-radius: 25px !important;">Delete</button></td> -->
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
                <h4 class="card-title">Add Menu List</h4>                    
                <form class="forms-sample" id="menu_item_insert_form" enctype="multipart/form-data">

                  <div class="form-group ">
                    <!-- <label class="col-sm-3 col-form-label">Country</label> -->
                    <div class="col-sm-9">
                      <select class="form-control" id="menu_item_category" name="menu_item_category" style="padding: 18px 30px !important; border-radius: 15px !important;">
                        <option value="0">Select a Category...</option>
                        <?php
                        foreach ($categories as $category) {
                          echo '<option value="' . $category['id'] . '">' . $category['category'] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">                        
                    <input type="text" class="form-control" id="menu_item_name" name="menu_item_name" placeholder="Enter Menu Item Name" style="padding: 18px 30px !important; border-radius: 15px !important;">
                  </div>
                  <div class="form-group">                        
                    <input type="text" class="form-control" id="menu_item_url" name="menu_item_url" placeholder=" Enter Page URL" style="padding: 18px 30px !important; border-radius: 15px !important;">
                  </div>
                  <div class="form-group">                        
                    <input type="text" class="form-control" id="menu_icon" name="menu_icon" placeholder="Enter Menu Icon" style="padding: 18px 30px !important; border-radius: 15px !important;">
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
            <form id="menu_item_update_form">
              <div class="modal-body">
                <input type="hidden" name="menu_item_id_edit" id="menu_item_id_edit">
                <input type="hidden" name="menu_item_name_old_edit" id="menu_item_name_old_edit" class="form-control" required>

                <div class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group ">
                      <!-- <label class="col-sm-3 col-form-label">Country</label> -->
                      <div class="col-sm-9">
                        <select class="form-control" id="menu_item_category_edit" name="menu_item_category_edit" style="padding: 18px 30px !important; border-radius: 15px !important;">
                          <option value="0">Select a Category...</option>
                          <?php
                          foreach ($categories as $category) {
                            echo '<option value="' . $category['id'] . '">' . $category['category'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="cat_name_up">Item Name</label><small class="req"> *</small>
                      <input autofocus="" id="menu_item_name_edit" name="menu_item_name_edit" placeholder="" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label for="cat_name_up">Page URL</label><small class="req"> *</small>
                      <input autofocus="" id="menu_item_url_edit" name="menu_item_url_edit" placeholder="" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label for="cat_name_up">Order</label><small class="req"> *</small>
                      <input autofocus="" id="menu_item_order" name="menu_item_order" placeholder="" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label for="cat_name_up">Menu Icon</label><small class="req"> *</small>
                      <input autofocus="" id="menu_icon_edit" name="menu_icon_edit" placeholder="" type="text" class="form-control" />
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





<script>

    // submit category_create_form
    $('#menu_item_insert_form').submit(function(e) {
      e.preventDefault();
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/menu_list/create',
        type: 'POST',
        data: new FormData(this),
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
              // window.location.href = "<?php echo base_url(); ?>settings/menu_list";
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

    // .edit-menu_item-btn click
    $('.edit-menu-item-btn').click(function() {
      $('#edit_data').modal('show');
      // get menu_item id
      var menu_item_id = $(this).attr('data-menu-item-id');
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/menu_list/show/' + menu_item_id,
        type: 'GET',

        dataType: 'json',
        beforeSend: function() {
          $('#menuItemEditOffcanvas button[type="submit"]').attr('disabled', true);
          $('#menuItemEditOffcanvas button[type="submit"]').html('Please wait...');
        },
        success: function(response) {
          if (response.status == 200) {
            // set menu_item id
            $('#menu_item_id_edit').val(response.data.id);
            // set menu_item id
            $('#menu_item_order').val(response.data.order_id);
            // set menu_item name
            $('#menu_item_name_edit').val(response.data.name);
            $('#menu_item_name_old_edit').val(response.data.name);
            // set menu_item url
            $('#menu_item_url_edit').val(response.data.url);
            // set menu_item category - select option
            $('#menu_item_category_edit').val(response.data.cat_id).trigger('change');
            // open offcanvas
            $('#menuItemEditOffcanvas').offcanvas('show');
            $('#menuItemEditOffcanvas button[type="submit"]').attr('disabled', false);
            $('#menuItemEditOffcanvas button[type="submit"]').html('Update');

          } else if (response.status == 404) {

            $('#menuItemEditOffcanvas button[type="submit"]').attr('disabled', false);
            $('#menuItemEditOffcanvas button[type="submit"]').html('Update');

          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#menuItemEditOffcanvas button[type="submit"]').attr('disabled', false);
          $('#menuItemEditOffcanvas button[type="submit"]').html('Update');
        }
      });
    });

    // submit menu_item_update_form
    $('#menu_item_update_form').submit(function(e) {
      e.preventDefault();

      var menu_item_id_edit = $('#menu_item_id_edit').val();
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>settings/menu_list/update/' + menu_item_id_edit,
        type: 'PUT',
        data: $(this).serialize(),
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#menu_item_update_form button[type="submit"]').attr('disabled', true);
          $('#menu_item_update_form button[type="submit"]').html('Please wait...');
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
              window.location.href = "<?php echo base_url(); ?>settings/menu_list";
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
              title: 'Duplicate Name',
              text: data.message,
            });
          } else if (data.status == 500) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
            });
          }
          $('#menu_item_update_form button[type="submit"]').attr('disabled', false);
          $('#menu_item_update_form button[type="submit"]').html('Create');
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong! Please try again later.',
          });
          $('#menu_item_update_form button[type="submit"]').attr('disabled', false);
          $('#menu_item_update_form button[type="submit"]').html('Create');
        }
      });
    });

    // delete-menu-item-btn click
    $('.delete-menu-item-btn').click(function() {
      Swal.fire({
        title: 'Please Confirm',
        html: "<label class='data-text'>Are you sure you want to delete this menu item ? Please note that this action cannot be undone, so proceed with caution.</label>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {

          // get menu_item id
          var menu_item_id = $(this).attr('data-menu-item-id');
          // ajax call
          $.ajax({
            url: '<?php echo base_url(); ?>settings/menu_list/delete/' + menu_item_id,
            type: 'DELETE',
            data: {},
            dataType: 'json',
            beforeSend: function() {
              $('.delete-menu-item-btn').attr('disabled', true);
              $('.delete-menu-item-btn').html('<i class="fa fa-spinner fa-spin"></i>');
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
                  window.location.href = "<?php echo base_url(); ?>settings/menu_list";
                });
              } else if (data.status == 500) {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: data.message,
                });
              }
              $('.delete-menu-item-btn').attr('disabled', false);
              $('.delete-menu-item-btn').html('<i class="fa fa-trash"></i>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong! Please try again later.',
              });
              $('.delete-menu-item-btn').attr('disabled', false);
              $('.delete-menu-item-btn').html('<i class="fa fa-trash"></i>');
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