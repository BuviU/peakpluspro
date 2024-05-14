<?= view('layouts/header'); ?>
<html lang="en">
<body>
    <div id="baseHeader"></div>
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <div id="sidebar"><?= view('layouts/sidebar'); ?></div> 
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-8 grid-margin stretch-card">
                                <!-- <div class="card">
                                    <div class="card-body">   -->
                                        <div class="search-field d-none d-md-block">
                                            <form class=" align-items-center h-100" action="#">

                                                <div class="input-group" style="border: none">
                                                <label class="form-control form-check-label"
                                                    style="border: none; font-size: 1.125rem"><strong>Exercise</strong></label>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btnlightpurple btn-fw" style="
                                                                padding: 10px 30px !important;
                                                                border-radius: 25px !important;
                                                                vertical-align: middle !important;
                                                            ">
                                                    Create New Exercise
                                                    </button>
                                                </div>
                                                </div>
                                                <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search Your Exercise Here..."
                                                    aria-label="Search Exercise" aria-describedby="basic-addon2" style="
                                                            padding: 20px 30px !important;
                                                            border-radius: 15px !important;
                                                            " />
                                                </div>
                                            </form>
                                        </div>
                                        <?php if(!empty($exercise)) { ?>
                                        <div class="row mt-5">
                                            <div class="col-md-12 stretch-card">
                                                <div class="card">
                                                    <div class="card-body">

                                                        <?php  

                                                        $x = 0;
                                                        foreach ($exercise as $exercise) { ?>
                                                            <video width="100%" height="240" controls>
                                                                <source src="movie.mp4" type="video/mp4">
                                                                <source src="movie.ogg" type="video/ogg">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                            <h5 class="mt-3"><span class="fontbackg"><?php echo $exercise['series'];?></span></h5>
                                                            <h5 class="mt-3">
                                                                <a href="add_workouts.html"><?php echo $exercise['exercise_name'];?></a>
                                                            </h5>

                                                            <div class="description">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Sets</th>
                                                                                    <th>Reps</th>
                                                                                    <th>Tempo</th>
                                                                                    <th>rest</th>
                                                                                    <th>Weight(kg)</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><?php echo $exercise['sets'];?></td>
                                                                                    <td><?php echo $exercise['reps'];?></td>
                                                                                    <td><?php echo $exercise['tempo'];?></td>
                                                                                    <td><?php echo $exercise['rest'];?></td>
                                                                                    <td><?php echo $exercise['weight'];?></td>
                                                                                </tr>  
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="ribbon">
                                                            <a href="#"><i class="mdi mdi-pencil"></i></a>
                                                            </div>
                                                        <?php $x++; } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                        <?php } ?>
                                    <!-- </div>              
                                </div> -->
                            </div>

                            <div class="col-md-4 grid-margin stretch-card mt-5">
                                <div class="card" style="height: fit-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Add Exercise</h4>
                                        <form class="forms-sample" id="form-exercise" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <select class="form-control form-control-lg" id="member" name="member" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    ">
                                                <option>Select Membership</option>
                                                <?php  foreach ($members as $member) { ?>
                                                    <option value=<?php echo $member['id'];?> ><?php echo $member['membership_name'];?></option>
                                                <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control form-control-lg" id="program" name="program" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    ">
                                                <option>Select program</option>
                                                
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control form-control-lg" id="workout" name="workout" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    ">
                                                <option>Select workout</option>
                                                
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control form-control-lg" id="series"  name="series" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    ">
                                                <option>Select Series</option>
                                                <option value="A">A</option>
                                                <option value="A1">A1</option>
                                                <option value="A2">A2</option>
                                                <option value="B">B</option>
                                                <option value="B1">B1</option>
                                                <option value="B2">B2</option>
                                                <option value="C">C</option>
                                                <option value="C1">C1</option>
                                                <option value="C2">C2</option>
                                                <option value="D">D</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="E">E</option>
                                                <option value="E1">E1</option>
                                                <option value="E2">E2</option>
                                                <option value="F">F</option>
                                                <option value="F1">F1</option>
                                                <option value="F2">F2</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exercise"  name="exercise" placeholder="Exercise name" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    " />
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control form-control-lg" id="sets"  name="sets" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    ">
                                                <option>Select Sets</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="reps" name="reps" placeholder="Reps" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    " />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="tempo" name="tempo" placeholder="Tempo" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    " />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="rest" name="rest" placeholder="Rest" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    " />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    " />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Video Url" style="
                                                        padding: 18px 30px !important;
                                                        border-radius: 15px !important;
                                                    " />
                                            </div>

                                            <!-- <div class="form-group">
                                                <input type="file" name="img[]" class="file-upload-default" id="fileInput" />
                                                <div class="input-group col-xs-12">
                                                <input type="text" class="form-control file-upload-info" disabled placeholder="Video URL"
                                                    style="padding: 18px 30px !important; border: none" />
                                                <span class="input-group-append">
                                                    <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                                    onclick="$('#fileInput').click();">
                                                    Browse
                                                    </button>
                                                </span>
                                                </div>
                                            </div> -->

                                            <button type="submit" class="btn1 btn-gradient-primary me-2" style="width: 100%; border-radius: 25px">
                                                Save
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
     
                    <?= view('layouts/footer'); ?>

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        
        <!-- container-scroller -->

        <!-- End custom js for this page -->
    </body>
    <?= view('layouts/footer'); ?>


<script type="text/javascript">
      // submit category_create_form
      $('#form-exercise').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);
      // formData.append('image_file', $('#image_file')[0].files[0]); // Add this line
      // ajax call
      $.ajax({
        url: '<?php echo base_url(); ?>createExercise',
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

    $("#member").blur(function(e) {
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

                        var selectElement = document.getElementById("program");
                        selectElement.innerHTML = ""; 

                        var defaultOption = document.createElement("option");
                        defaultOption.text = "Select program";
                        defaultOption.value = ""; 
                        selectElement.appendChild(defaultOption);
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

    $("#program").blur(function(e) {
        var program_id = $(this).val();
        var member_id = $("#member").val();

            $.ajax({
				url: "<?php echo base_url(); ?>getworkout/" + member_id +"/" + program_id,
				method: "GET",
				data: {},
				dataType: 'json',
				success: function(response) {
					
					if (response.status == 200) {
                        
                        var selectElement = document.getElementById("workout");
                        selectElement.innerHTML = ""; 

                        var defaultOption = document.createElement("option");
                        defaultOption.text = "Select workout";
                        defaultOption.value = ""; 
                        selectElement.appendChild(defaultOption);

                        response.data.forEach(function(item) {
                            var option = document.createElement("option");
                            option.text = item.workout;
                            option.value = item.id; 
                            selectElement.appendChild(option);
                        });
					} else if (response.status == 400) {
						Swal.fire({
							icon: 'warning',
							title: 'Warning',
							text: 'No Workouts Available!.',
							showConfirmButton: false,
							timer: 1500
						});

                        var selectElement = document.getElementById("workout");
                        selectElement.innerHTML = ""; 

                        var defaultOption = document.createElement("option");
                        defaultOption.text = "Select workout";
                        defaultOption.value = ""; 
                        selectElement.appendChild(defaultOption);
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
  </script>
</html>