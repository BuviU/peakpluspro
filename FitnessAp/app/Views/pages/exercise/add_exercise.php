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
              <!-- ============== Strat Exercise ==========-->
              <?php if(!empty($exercise)) { ?>
              <div class="row mt-5">

                <?php  


                // Assuming $exercise is an array of exercises with 'series' attribute
                // Group exercises by 'series'
                $groupedExercises = [];
                foreach ($exercise as $singleExercise) {
                  $series = $singleExercise['series'];
                  if (!isset($groupedExercises[$series])) {
                    $groupedExercises[$series] = [];
                  }
                  $groupedExercises[$series][] = $singleExercise;
                }
                ?>

                <?php foreach ($groupedExercises as $series => $exercises):
                ?>
                <div class="grouped-exercises">
                  <h2></h2>
                  
                  <div class="col-md-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="mt-3"><span class="fontbackg"><?php echo $series; ?></span></h5>
                        <div class="description">
                          <div class="row">
                            <div class="col-md-12">
                              <table class="table">
                                <?php foreach ($exercises as $singleExercise): 
                                  
                                  ?>
                                  
                                  <thead>
                                    <tr>
                                      <th>Exercise</th>
                                      <th>Sets</th>
                                      <th>Reps</th>
                                      <th>Tempo</th>
                                      <th>rest</th>
                                      <th>Weight(kg)</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td><?php echo $singleExercise['exercise_name']; ?></td>
                                      <td><?php echo $singleExercise['sets']; ?></td>
                                      <td><?php echo $singleExercise['reps']; ?></td>
                                      <td><?php echo $singleExercise['tempo']; ?></td>
                                      <td><?php echo $singleExercise['rest']; ?></td>
                                      <td><?php echo $singleExercise['weight']; ?></td>
                                      <td>
                                        
                                          <button type="button" class="btn1 btn-gradient-primary btn-rounded btn-fw edit_btn" value="<?php echo $singleExercise['id']; ?>" style="background:linear-gradient(to right, #e2d5ff, #a68edb);"><i class="mdi mdi-pencil"></i></button>
                                        
                                      </td>
                                    </tr>
                                  </tbody>
                                <?php endforeach; ?>
                              </table>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>

                </div>
                <?php endforeach; ?>
              </div>
              <!-- ============== End Exercise ==========-->
              <?php }else{ ?>
              <?php } ?>
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
                      <?php  foreach ($program as $pro) { ?>
                          <option value=<?php echo $pro['id'];?> ><?php echo $pro['program'];?></option>
                      <?php }?>

                      </select>
                    </div>
                    <div class="form-group">
                      <select class="form-control form-control-lg" id="workout" name="workout" style="
                      padding: 18px 30px !important;
                      border-radius: 15px !important;
                      ">
                      <option>Select workout</option>
                      <?php  foreach ($workout as $work) { ?>
                        <option value=<?php echo $work['id'];?> ><?php echo $work['workout'];?></option>
                      <?php }?>
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
                      <select class="form-control form-control-lg js-example-basic-single" id="exercise" name="exercise[]" multiple style="
                        padding: 18px 30px !important;
                        border-radius: 15px !important;
                        ">
                        <option>Select Exercise</option>
                        <?php  foreach ($exercise_list as $excise) { ?>
                          <option value=<?php echo $excise['exercise_name'];?> ><?php echo $excise['exercise_name'];?></option>
                        <?php }?>
                      </select>
                      <span id="selected_exercise" style="color:#702dff;font-size:small;"></span>
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
                      <input type="hidden" class="form-control" id="unic_id" name="unic_id">
                    </div>
                    <button type="submit" class="btn1 btn-gradient-primary me-2" style="width: 100%; border-radius: 25px">
                      Save
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</body>
<?= view('layouts/footer'); ?>


<script src="<?php echo base_url(); ?>assets/select2/select2.min.js"></script>


<script>
  $('.js-example-basic-single').select2({
    placeholder: " Select",
    allowClear: true
  });

      // submit category_create_form
      $('#form-exercise').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

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
                icon: 'success',
                title: 'Success',
                text: data.message,
                showConfirmButton: false,
                timer: 1500
              }).then(function() {
                location.reload();
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



      $(document).ready(function() {
        $('#exercise').on('input', function() {
          var inputText = $(this).val();
          
          $.ajax({
            url: "<?php echo base_url(); ?>itemSearch",
            method: 'POST',
            data: { input_text: inputText },
            success: function(response) {
                   
                    console.log(response);
                  }
          });
        });
      });

      $(".edit_btn").click(function(e) {

        e.preventDefault();
        var exercise_id = $(this).val();

        // alert(exercise_id);

          $.ajax({
            url: "<?php echo base_url(); ?>editExercise/"+exercise_id,
            method: 'GET',
            data: {},
            dataType: 'json',
            cache: false,
            processData: false, 
            contentType: false,
            success: function(data) {
                // console.log(data);
                if(data.status == 200){
                  var membershipName = data.data[0].membership_name;
                  $("#member option").filter(function() {
                      return $(this).text() == membershipName; 
                  }).prop('selected', true); 

                  var program = data.data[0].program;
                  $("#program option").filter(function() {
                      return $(this).text() == program; 
                  }).prop('selected', true); 

                  var workout = data.data[0].workout;
                  $("#workout option").filter(function() {
                      return $(this).text() == workout; 
                  }).prop('selected', true);
                  
                  if (data.data[0].exercise_name) {
                      var selectedExercise = data.data[0].exercise_name;
                      $("#exercise").val([selectedExercise]); 

                      
                    $("#selected_exercise").html("<span style='font-weight: 200; color: red; font-size:small;'>Selected Exercises:</span> " + selectedExercise);

                  }

                
                  $("#series").val(data.data[0].series);
                  $("#sets").val(data.data[0].sets);
                  $("#reps").val(data.data[0].reps);
                  $("#tempo").val(data.data[0].tempo);
                  $("#rest").val(data.data[0].rest);
                  $("#weight").val(data.data[0].weight);
                  $("#unic_id").val(data.data[0].id);
                }else{

                }
                
            }
          });

        
      });
</script>
</html>
  
