<?= view('layouts/header'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    

</head>

<body>

<div class="container-fluid page-body-wrapper">
    <div id="sidebar">
        <?= view('layouts/sidebar'); ?>
    </div>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row mt-5">
                <div class="col-md-8 grid-margin">
                    <!-- <div class="card">
                      <div class="card-body">                     -->
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>

                            <tr>
                                <td style="width: 100%;">
                                    <img src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" class="me-2"
                                         alt="image"> User's Full name <br><br>
                                   
                                </td>
                                <td style="width: 100%;"></td>
                                <td style="width: 100%;"></td>
                                <!-- <td>
                                    <button type="button" class="btn1 btn-gradient-primary btn-rounded btn-fw">Edit
                                    </button>
                                </td> -->
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <label><h4><strong> Achievements Completed</strong></h4></label>
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/faces/badge1.png"
                                                           class="me-2" alt="image"></div>
                                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/faces/badge2.png"
                                                           class="me-2" alt="image"></div>
                                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/faces/badge3.png"
                                                           class="me-2" alt="image"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/faces/badge1.png"
                                                           class="me-2" alt="image"></div>
                                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/faces/badge2.png"
                                                           class="me-2" alt="image"></div>
                                <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/faces/badge3.png"
                                                           class="me-2" alt="image"></div>
                            </div>

                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <br><br>


                    <div class="row">
                        <!-- Membership -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body mini-marg">
                                    <!-- <div class="table-responsive"> -->
                                        <table class="table">
                                            <form class="d-flex align-items-center  " action="#">
                                                <div class="input-group" style="border: none; ">
                                                    <label class="form-control form-check-label" style="border: none;
                                                font-size: 1.125rem;"><strong>Memberships</strong></label>

                                                </div>
                                            </form>
                                            <tbody>

                                            <tr>
                                                <td style="width: 100%;" class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/member-card.png"
                                                         class="me-2" alt="image"> Membership 1 <br><br>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td style="width: 100%;" class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/member-card.png"
                                                         class="me-2" alt="image"> Membership 2 <br><br>
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>

                        <!-- Program -->
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body mini-marg">
                                    <!-- <div class="table-responsive"> -->
                                    <table class="table">
                                            <form class="d-flex align-items-center  " action="#">
                                                <div class="input-group" style="border: none; ">
                                                    <label class="form-control form-check-label" style="border: none;
                                                font-size: 1.125rem;"><strong>Programs</strong></label>

                                                </div>
                                            </form>
                                            <tbody>

                                            <tr>
                                                <td style="width: 100%;" class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/member-card.png"
                                                         class="me-2" alt="image"> program 1 <br><br>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td style="width: 100%;" class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/member-card.png"
                                                         class="me-2" alt="image"> program 2 <br><br>
                                                </td>

                                            </tr>

                                            </tbody>
                                        </table>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- </div>
                 </div> -->
                </div>


                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit User</h5>
                            <form class="forms-sample" id="updateUser">
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="f_name"
                                           value="<?php echo $user['f_name'] ?>"
                                           placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="l_name"
                                           value="<?php echo $user['l_name'] ?>"
                                           placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control inputfieldform" id="email"
                                           value="<?php echo $user['email'] ?>"
                                           placeholder="Email">
                                </div>

                                <!-- <div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Profile Image"
                                               style="padding: 18px 20px !important; border: none;">
                                        <span class="input-group-append">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                        onclick="$('#fileInput').click();">Browse</button>
                            </span>
                                    </div>
                                </div> -->

                                <div class="form-group">
                            <input type="file" name="image_file" class="file-upload-default" id="user_img">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Profile Image" aria-label="Profile Image" aria-describedby="button-addon2" style="border: none;">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button" id="button-addon2" >Browse</button>
                            </div>
                        </div>

                                <div class="form-group">
                                    <select class="form-control inputfieldform" id="gender">
                                        <option value="" <?php echo ($user['gender'] == '') ? 'selected' : ''; ?>>Select
                                            Your Gender
                                        </option>
                                        <option value="Male" <?php echo ($user['gender'] == 'Male') ? 'selected' : ''; ?>>
                                            Male
                                        </option>
                                        <option value="Female" <?php echo ($user['gender'] == 'Female') ? 'selected' : ''; ?>>
                                            Female
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9">
                                        <input class="form-control inputfieldform"
                                               id="dob" type="date"
                                               value="<?php echo $user['dob'] ?>"
                                               placeholder="Date of Birth (dd/mm/yyyy)"/>
                                    </div>
                                </div>
                                <h5 class="card-title1">Body Composition</h5>
                                <!--<div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="calories"
                                           placeholder="Calories">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="bodyfat"
                                           placeholder="Estimated Bodyfat">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="weight"
                                           placeholder="weight (Kg)">
                                </div>
                                <div class="form-group">
                                    <select class="form-control inputfieldform" id="Activity_level"
                                            placeholder="Activity level">
                                        <option>Activity Level</option>
                                        <option>Level 1</option>
                                        <option>Level 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="Height"
                                           placeholder="Height">
                                </div>
                                <div class="form-group">
                                    <select class="form-control inputfieldform" id="Conversion_System"
                                            placeholder="Preferred Conversion System">
                                        <option>Prefered Conversion System</option>
                                        <option>System 1</option>
                                        <option>System 2</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Front Picture"
                                               style="padding: 18px 20px !important; border: none;">
                                        <span class="input-group-append">
                                <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                        onclick="$('#fileInput').click();">Browse</button>
                            </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Back Picture"
                                               style="padding: 18px 20px !important; border: none;">
                                        <span class="input-group-append">
                              <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                      onclick="$('#fileInput').click();">Browse</button>
                          </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Left Side Picture"
                                               style="padding: 18px 20px !important; border: none;">
                                        <span class="input-group-append">
                            <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                    onclick="$('#fileInput').click();">Browse</button>
                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default" id="fileInput">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Right Side Picture"
                                               style="padding: 18px 20px !important; border: none;">
                                        <span class="input-group-append">
                          <button class="file-upload-browse btn1 btn-gradient-primary" type="button"
                                  onclick="$('#fileInput').click();">Browse</button>
                      </span>
                                    </div>
                                </div>-->


                                <!--<div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                               placeholder="Upload Right Side Picture"
                                               style="padding: 18px 20px !important; border: none;">
                                        <span class="input-group-append">
                            <button class="file-upload-browse btn1 btn-gradient-primary" type="button">Browse</button>
                          </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="weight"
                                           placeholder="Waist Measurement (cm)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="weight"
                                           placeholder="Chest Measurement (cm)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="weight"
                                           placeholder="Hip Measurement (cm)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="weight"
                                           placeholder="Thigh Measurement (cm)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control inputfieldform" id="weight"
                                           placeholder="Arm Measurement (cm)">
                                </div>-->

                                <button type="submit" class="btn1 btn-gradient-primary me-2"
                                        style="width: 100%; border-radius: 25px;">Save
                                </button>


                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- </div> -->

            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Arttricks 2024</span>
                    <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="https://arttricks.com.au/"
                                                                                   target="_blank">arttricks.com.au</a></span>
                </div>
            </footer> -->
            <!-- partial -->
           
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
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

<script>
    $(document).ready(function () {
        $('#updateUser').on('submit', function (event) {
            event.preventDefault();

            var formData = new FormData(this);
            formData.append('id', $('#user_id').val());
            formData.append('f_name', $('#f_name').val());
            formData.append('l_name', $('#l_name').val());
            formData.append('email', $('#email').val());
            formData.append('gender', $('#gender').val());
            formData.append('dob', $('#dob').val());
            formData.append('image_file', $('#fileInput')[0].files[0]);

            $.ajax({
                url: '<?php echo base_url(); ?>/updateUser',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // Handle the server response here
                    console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle any errors here
                    console.error(textStatus, errorThrown);
                }
            });
        });
    });
</script>


</body>
<?= view('layouts/footer'); ?>
</html>