<body>  <footer class="footer">
  <div class="container-fluid d-flex justify-content-between">
    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Arttricks 2024</span>
    <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"><a href="https://arttricks.com.au/" target="_blank">www.arttricks.com.au</a></span>
  </div>
</footer></body>


<!-- Javascript -->

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
 
  
  <script src="<?php echo base_url(); ?>assets/select2/select2.full.min.js"></script>

 
  <script src="<?php echo base_url(); ?>assets/js/sweetalert2@11.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/misc.js"></script>

  <script src="<?php echo base_url(); ?>assets/vendors/chart.js/Chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/todolist.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendors/js/vendor.bundle.base.js"></script>


<script>
  $(document).ready(function() {
      // logout btn on click - logout
      $('.logoutBtn').on('click', function() {
        
        logout();
      });

      $('.logoutDiv').on('click', function() {
        logout();
      });

      

      function logout() {
        Swal.fire({
          title: 'Are you sure?',
          text: "You want to logout from the system?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#00a65a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Logout!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "<?php echo base_url(); ?>logout",
              method: "GET",
              dataType: null,
              success: function(response) {
                if (response.status == 200) {
                  let timerInterval;
                  Swal.fire({
                    title: "Please Wait...",
                    html: response.msg,
                    timer: 2000,
                    timerProgressBar: false,
                    didOpen: () => {
                      Swal.showLoading();
                    },
                    willClose: () => {
                      clearInterval(timerInterval);
                    }
                  }).then((result) => {
                    
                    window.location.href = "<?php echo base_url() ?>";
                    
                  });

                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                  title: 'Error!',
                  text: errorThrown,
                  icon: 'error',
                  confirmButtonColor: '#00a65a',
                });
              }
            });
          }
        });

        
      }

    });
  </script>
  

