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
            <div class="search-field">
              <form class="d-flex align-items-center h-100" action="#">
                <div class="input-group" style="border: none">
                  <label class="form-control form-check-label"
                    style="border: none; font-size: 1.125rem"><strong>Coaches</strong></label>
                  <div class="input-group-append">
                    <button type="button" class="btn btnlightpurple btn-fw" style="padding: 10px 30px !important;border-radius: 25px !important;vertical-align: middle !important;">
                      Create New Coaches
                    </button>
                  </div>

                  <div class="input-group">
                    <input type="search" class="form-control" placeholder="Search Coach Name Here..."
                      aria-label="Search Coach" aria-describedby="basic-addon2" style="
                          padding: 20px 30px !important;
                          border-radius: 15px !important;
                          margin-bottom: 20px;
                        " />
                  </div>
                </div>
              </form>
            </div>



            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table">
 
                      <tbody>

                        <?php  
                        $i = 1;
                            foreach ($coach as $coach) {
                        ?>
                        <tr data-id="<?php echo $coach['id'];?>">
                          <td><?php echo $i;?></td>
                          <td> <?php echo $coach['f_name'];?> </td>
                          <td> <?php echo $coach['email'] ?></td>
                          <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                              
                              <a type="button" class="btn btn-outline-primary edit_btn" data-toggle="modal" data-target="#edit_data">
                                  <i class="mdi mdi-pencil-outline"></i>
                              </a>

                              
                              <a type="button" class="btn btn-outline-primary" href="<?php echo base_url()?>membership/<?php echo $coach['id'];?>">
                                  <i class="mdi mdi-fast-forward"></i>
                              </a>
                               

                                
                            </div>
                          </td>
                        </tr>
                        <?php 
                        $i++;
                        } ?>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
                      
                      

          <div class="col-md-4 grid-margin stretch-card mt-5">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Coaches</h4>
                <form class="forms-sample" id="form-coach">
                  <div class="form-group">                        
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name" style="padding: 18px 30px !important; border-radius: 15px !important;"></div>
                  <div class="form-group">                       
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name" style="padding: 18px 30px !important; border-radius: 15px !important;"></div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" style="padding: 18px 30px !important; border-radius: 15px !important;"></div>  
                  <div class="form-group">
                    <select class="form-control" id="group_profile" name="group_profile" placeholder="Gender" style=" border-radius: 15px;">
                      <?php foreach ($group_profiles as $profile): ?>
                        <option value="<?= $profile['id'] ?>"><?= $profile['type'] ?></option>
                      <?php endforeach; ?>
                    </select></div>                 
                  <div class="form-group"> 
                    <label for="image_file" style="color: #c9c8c8; padding-bottom: 10px; font-family: Inter-regular; font-size: 0.8125rem;">Add Profile Pic</label>
                    <input type="file" class="form-control" id="image_file" name="image_file"  placeholder="Add Profile Pic" ></div>
                  <div class="form-group">
                    <select class="form-control" id="gender" name="gender" placeholder="Gender" style=" border-radius: 15px !important;">
                      <option disabled selected>Select Your Gender</option>
                      <option>Male</option>4
                      <option>Female</option>
                    </select> </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Date of Birth (dd/mm/yyyy)" id="dob" name="dob" style="padding: 18px 30px !important; border-radius: 15px !important;"/></div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" style="padding: 18px 30px !important; border-radius: 15px !important;"></div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="padding: 18px 30px !important; border-radius: 15px !important;"></div>

                  <button type="submit" class="btn1 btn-gradient-primary me-2" style="width: 100%; border-radius: 25px;">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>

   <!-- ================= edit popup start =============== -->

    <div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Caoches</h5>
                    <button type="button" class="btn btn-secondary close modal_close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="coach_update_form">
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="box-body">
                                <input type="hidden" id="id_up" name="id_up" class="form-control">
                                <div class="form-group">
                                    <label for="f_name_up">First Name</label><small class="req"> *</small>                        
                                    <input type="text" class="form-control" id="f_name_up" name="f_name_up" placeholder="First Name" style="border-radius: 15px !important;">
                                </div>
                                <div class="form-group"> 
                                    <label for="l_name_up">Last Name</label><small class="req"> *</small>                      
                                    <input type="text" class="form-control" id="l_name_up" name="l_name_up" placeholder="Last Name" style="border-radius: 15px !important;">
                                </div>
                                <div class="form-group">
                                    <label for="email_up">Email</label><small class="req"> *</small>
                                    <input type="email" class="form-control" id="email_up" name="email_up" placeholder="Email" style="border-radius: 15px !important;">
                                    <input type="hidden" id="email_old" name="email_old" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label for="group_profile_up">Group Profile</label><small class="req"> *</small>
                                    <select class="form-control" id="group_profile_up" name="group_profile_up" placeholder="Group Profile" style=" border-radius: 15px !important;">
                                        <?php foreach ($group_profiles as $profile): ?>
                                        <option value="<?= $profile['id'] ?>"><?= $profile['type'] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>                 

                                <div class="form-group">   
                                    <label for="image_file_up">Profile Image</label><small class="req"> *</small>                   
                                        <input type="file" class="form-control" id="image_file_up" name="image_file_up"  placeholder="Add Profile Pic" style=" border-radius: 15px !important;">
                                        <img src="" width="64px" height="64px" alt="Old profile image" id="old_img" style=" border-radius: 25px !important;"/>
                                        <input type="hidden" id="old_image" name="old_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="gender_up">Gender</label><small class="req"> *</small> 
                                    <select class="form-control" id="gender_up" name="gender_up" placeholder="Gender" style=" border-radius: 15px !important;">
                                        <option disabled selected>Select Your Gender</option>
                                        <option value="Male">Male</option>4
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="dob_up">Birthday</label><small class="req"> *</small> 
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Date of Birth (dd/mm/yyyy)" id="dob_up" name="dob_up" style="border-radius: 15px !important;"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username_up">Username</label><small class="req"> *</small> 
                                    <input type="text" class="form-control" id="username_up" name="username_up" placeholder="Username" style="border-radius: 15px !important;">
                                </div>
                                <div class="form-group">
                                    <label for="password_up">Password(If you need to change fill it)</label>
                                    <input type="password" class="form-control" id="password_up" name="password_up" placeholder="Password" style="border-radius: 15px !important;">
                                </div> 
                            </div>
                        </div>
                        <br>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a type="submit" class="btn btn-outline-primary" >Update</a> 

                          <a type="button" class="btn btn-outline-primary delete_btn">
                                  <i class="mdi mdi-delete"></i>
                          </a>
                        </div>
                    </div>
                </form>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_close" data-dismiss="modal">Close</button>
                </div>
            </div>
          </div>
        </div>
      </div>
        

         <!-- ================= edit popup end =============== -->
    
         </div>
        </div>
      </div>
    </div> 
  </body>
  <!-- ===footer=== -->
  <?= view('layouts/footer'); ?>
  <!-- ===footer=== -->





<script type="text/javascript">
      // submit category_create_form
      $('#form-coach').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
      // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>createCoach',
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

    $('tbody').on('click', '.edit_btn', function() {
        var row = $(this).closest('tr'); 
        var dataId = row.data('id'); 

        $("#edit_data").modal('show');
        
        $.ajax({
        url: '<?php echo base_url(); ?>editCoach/'+ dataId,
        type: 'GET',
        data: {},
        dataType: 'json',
        success: function(response) {
            // console.log(response);
        if (response.status == 200) {
            var imageUrl = "<?php echo base_url(); ?>public/uploads/coach_img/" + response.data[0]['prof_pic'];
            document.getElementById("old_img").src = imageUrl;
            $("#f_name_up").val(response.data[0]['f_name']);
            $("#l_name_up").val(response.data[0]['l_name']); 
            $("#email_up").val(response.data[0]['email']);
            $("#email_old").val(response.data[0]['email']);  
            $("#group_profile_up").val(response.data[0]['group_id']);
            $("#gender_up").val(response.data[0]['gender']);   
            $("#dob_up").val(response.data[0]['dob']);
            $("#username_up").val(response.data[0]['user']); 
            $("#id_up").val(response.data[0]['id']);
            $("#old_image").val(response.data[0]['prof_pic']);
                
                        
		} else if (response.status == 400) {
			Swal.fire({
				icon: 'warning',
				title: 'Warning',
				text: 'No Data Available!.',
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

    $('tbody').on('click', '.delete_btn', function() {
        var row = $(this).closest('tr'); 
        var dataId = row.data('id'); 

        $.ajax({
        url: '<?php echo base_url(); ?>deleteCoach/'+ dataId,
        type: 'DELETE',
        data: {},
        dataType: 'json',
        success: function(response) {
            console.log(response);
        if (response.status == 200) {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: response.message,
              showConfirmButton: false,
              timer: 1500
          }); 
          setTimeout(() => {
            location.reload();
          }, 2000);
                
                        
        } else if (response.status == 400) {
          Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: response.message,
            showConfirmButton: false,
            timer: 1500
          });    
        } else if (response.status == 409) {
           Swal.fire({
            icon: 'warning',
            title: 'Can not be done.',
            text: response.message,
            showConfirmButton: false,
            timer: 1500
          }); 
        }else {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: response.message,
            showConfirmButton: false,
            timer: 1500
          });
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



    $(".modal_close").click(function(){
        $("#edit_data").modal('hide');
    });

    $('#coach_update_form').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
      
      $.ajax({
        url: '<?php echo base_url(); ?>updateCoach',
        type: 'POST',
        data: formData,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
       
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
          } else if (data.status == 408) {
            Swal.fire({
              icon: 'warning',
              title: 'Duplicate Email',
              text: data.message,
            });
          } else if (data.status == 500) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.message,
            });
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
  </script>

</html>