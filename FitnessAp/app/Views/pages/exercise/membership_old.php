<?= view('layouts/header'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Peakpulse Pro</title>

  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />

</head>
<div id="baseHeader"></div>
<div class="container-fluid page-body-wrapper">
    <div id="sidebar"><?= view('layouts/sidebar'); ?></div>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-9 grid-margin">
                    <!-- <div class="col-md-9 grid-margin stretch-card"> -->
                    <!-- <div class="card">
                        <div class="card-body">                     -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <div class="search-field d-none d-md-block">
                                    <form class="d-flex align-items-center h-100" action="#">
                                        <div class="input-group" style="border: none; padding-top: 40px;;">
                                            <label class="form-control form-check-label1" style="border: none;
                                                        "><img
                                                        src="<?php echo base_url(); ?>assets/images/faces/face1.jpg"
                                                        class="me-2" alt="image"
                                                        style="border-radius: 50px; width: 40px; height: 40px !important;margin-left: -10px;">Coach
                                                Mohan</label>

                                        </div>
                                        <div class="input-group" style="border: none; ">
                                            <label class="form-control form-check-label" style="border: none;
                                                        font-size: 1.125rem;"><strong>Membership</strong></label>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btnlightpurple  btn-fw"
                                                        style="padding: 10px 30px !important; border-radius: 25px !important; vertical-align: middle !important;">
                                                    Create New Membership
                                                </button>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <input type="search" class="form-control"
                                                   placeholder="Search Your Membership Here..."
                                                   aria-label="Search Membership" aria-describedby="basic-addon2"
                                                   style="padding: 20px 30px !important; border-radius: 15px !important;">
                                        </div>
                                    </form>
                                </div>
                            </tr>
                            </thead>
                            <br>
                            <div class="row">
                                <?php foreach ($members as $member) { ?>
                                <div class="col-md-4 stretch-card grid-margin">
                                    <div class="card  card-img-holder ">
                                        <div class="card-body mini-marg">

                                            <div style="width: 100%; height: 100%; overflow: hidden;">
                                                <img src="<?php echo base_url(); ?>public/uploads/membership_img/<?php echo $member['thumbnail']; ?>"
                                                     alt="image" class="rounded-3 p-b-10" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <br>
                                            <h5><span class="fontbackg"><?php echo $member['membership_name']; ?></span></h5>
                                            <h5>
                                                <?php echo $member['description']; ?>
                                            </h5>
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                     style="width: 58%" aria-valuenow="58" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                            <br>
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
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            </tbody>
                        </table>
                    </div>
                    <!-- </div>
                    </div> -->
                </div>
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card" style="height: fit-content;">
                        <div class="card-body">
                            <h4 class="card-title">Add Membership</h4>
                            <form id="membership-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control " id="membership_name" name="membership_name"
                                           placeholder="Membership Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " id="description" name="description"
                                           placeholder="Description">
                                </div>


                                <div class="form-group">
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="file" class="form-control" id="image_file" name="image_file"
                                               placeholder="Add thumbnail">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-gradient-primary" type="button"
                                                style="padding: 12px 30px !important; border-radius: 25px !important;">Browse</button>
                                    </span>
                                    </div>
                                </div>


                                <button class="btn1 btn-gradient-primary me-2"
                                        style="width: 100%; border-radius: 25px;">Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<!--         <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Arttricks 2024</span>
                <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="https://arttricks.com.au/"
                                                                               target="_blank">arttricks.com.au</a></span>
            </div>
        </footer> -->
        <?= view('layouts/footer'); ?>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
</div>
</div>
</body>
<?= view('layouts/footer'); ?>


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
                        // window.location.href = "<?php //echo base_url(); 
                        ?>settings/menu_list";
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
</script>

</html>