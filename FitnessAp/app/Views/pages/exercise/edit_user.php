

<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    
    <?= view('layouts/header'); ?>
</head>

<body>

<div class="container-fluid page-body-wrapper">
    <div id="sidebar">
        <?= view('layouts/sidebar'); ?>
    </div>

    <div class="main-panel">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-md-8 grid-margin">
                    <!-- <div class="card">
                      <div class="card-body">                     -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>

                            <tr>
                                <div class="search-field d-none d-md-block">
                                    <form class="d-flex align-items-center" action="#" method="post">
                                        <input type="hidden" id="user_id" value="<?php echo $user['user_id'] ?>">
                                        <div class="input-group" style="border: none;">
                                            <label class="form-control form-check-label1" style="border: none;
                                font-size: 1.125rem; padding-top: 40px;"><img
                                                        src="<?php echo base_url(); ?>assets/images/faces/face1.jpg"
                                                        class="me-2" alt="image"
                                                        style="border-radius: 50px; width: 40px; height: 40px !important;margin-left: -10px;">Coach
                                                Mohan</label>

                                        </div>
                                        <div class="input-group" style="border: none; ">
                                            <label class="form-control form-check-label" style="border: none;
                                   font-size: 1.125rem;"><strong>User Profile</strong></label>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btnlightpurple  btn-fw"
                                                        style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">
                                                    Add New Users
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="search" class="form-control"
                                                   placeholder="Search Your Exercise Here..." aria-label="Search Users"
                                                   aria-describedby="basic-addon2"
                                                   style="padding: 20px 30px !important; border-radius: 15px !important;">

                                        </div>

                                    </form>
                                </div>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td style="width: 100%;">
                                    <img src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" class="me-2"
                                         alt="image"> David Grey <br><br>
                                    david@gmail.com
                                </td>
                                <td style="width: 100%;"></td>
                                <td style="width: 100%;"></td>
                                <td>
                                    <button type="button" class="btn1 btn-gradient-primary btn-rounded btn-fw">Edit
                                    </button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <br><br>

                    <div class="row">
                        <div class="col-md-1">

                        </div>
                        <div class="col-md-6">
                            <img src="<?php echo base_url(); ?>assets/images/faces/profile.png" class="me-2"
                                 alt="image"> <label><h5 style="text-align: center;"><strong>Good Morning David
                                        !</strong><br>Continue Your Journey And Achieve <br>Your Target</h5></label>
                        </div>

                        <div class="col-md-4">
                            <button type="button" class="btn btnlightpurple  btn-fw "
                                    style="padding: 10px 20px !important; border-radius: 25px !important; vertical-align: middle !important;"></button>
                        </div>
                        <div class="col-md-1">

                        </div>
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
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body mini-marg">
                                    <div class="table-responsive">
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
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/face1.jpg"
                                                         class="me-2" alt="image"> David Grey <br><br>
                                                    david@gmail.com
                                                </td>

                                                <td>
                                                    <button type="button"
                                                            class="btn1 btn-gradient-primary btn-rounded btn-fw"
                                                            style="padding: 10px 20px !important; border-radius: 25px !important;">
                                                        Follow
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/face2.jpg"
                                                         class="me-2" alt="image"> Stella Johnson <br><br>
                                                    stella@gmail.com
                                                </td>

                                                <td>
                                                    <button type="button"
                                                            class="btn1 btn-gradient-primary btn-rounded btn-fw"
                                                            style="padding: 10px 20px !important; border-radius: 25px !important;">
                                                        Follow
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/face3.jpg"
                                                         class="me-2" alt="image"> Marina Michel <br><br>
                                                    Marina@gmail.com
                                                </td>

                                                <td>
                                                    <button type="button"
                                                            class="btn1 btn-gradient-primary btn-rounded btn-fw"
                                                            style="padding: 10px 20px !important; border-radius: 25px !important;">
                                                        Follow
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/face4.jpg"
                                                         class="me-2" alt="image"> John Doe <br><br>
                                                    Marina@gmail.com
                                                </td>

                                                <td>
                                                    <button type="button"
                                                            class="btn1 btn-gradient-primary btn-rounded btn-fw"
                                                            style="padding: 10px 20px !important; border-radius: 25px !important;">
                                                        Follow
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="card-label1">
                                                    <img src="<?php echo base_url(); ?>assets/images/faces/face4.jpg"
                                                         class="me-2" alt="image"> Karina Doe <br><br>
                                                    Karina@gmail.com
                                                </td>

                                                <td>
                                                    <button type="button"
                                                            class="btn1 btn-gradient-primary btn-rounded btn-fw"
                                                            style="padding: 10px 20px !important; border-radius: 25px !important;">
                                                        Follow
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Program -->
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body mini-marg">
                                    <!-- <div class="table-responsive"> -->
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <div class="search-field d-none d-md-block">
                                                <form class="d-flex align-items-center" action="#">
                                                    <div class="input-group" style="border: none; ">
                                                        <label class="form-control form-check-label" style="border: none;
                                                 font-size: 1.125rem;"><strong>Programs</strong></label>

                                                    </div>
                                                </form>
                                            </div>
                                        </tr>
                                        </thead>
                                        <br>
                                        <tbody>
                                        <div class="row">
                                            <div class="col-md-6 stretch-card grid-margin">
                                                <div class="card  card-img-holder ">
                                                    <div class="card-body mini-marg">
                                                        <div class="video-container">
                                                            <video controls class="vid1">
                                                                <source src="your_video.mp4" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                        <br>
                                                        <h5><span class="fontbackg">FRONTEND</span></h5>
                                                        <h5>Phase 1</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                 style="width: 55%" aria-valuenow="55" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                        <br>
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
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 stretch-card grid-margin">
                                                <div class="card  card-img-holder ">
                                                    <div class="card-body mini-marg">
                                                        <div class="video-container">
                                                            <video controls class="vid1">
                                                                <source src="your_video.mp4" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        </div>
                                                        <br>
                                                        <h5><span class="fontbackg">FRONTEND</span></h5>
                                                        <h5>Phase 2</h5>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                 style="width: 45%" aria-valuenow="45" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                        <br>
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
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
            <?= view('layouts/footer'); ?>
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
</html>