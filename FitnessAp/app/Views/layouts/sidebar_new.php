<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="<?php echo base_url(); ?>assets/images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">David Grey</span>
          <span class="text-secondary text-small">ddf</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item ml20">

      <a class="nav-link" href="\index.html">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>

      </a>
    </li>

    <?php
    foreach ($allowed_categories as $category) {
      ?>
      <div class="card" style="margin-left: 20px; margin-right: 20px;">
        <h4 class="font-weight-bold mt-3 p-3 pb-0"><?php echo $category['category']; ?></h4>
        <?php
        foreach ($allowed_menu_list as $menu_item) {
          if ($category['cat_id'] == $menu_item['cat_id']) { ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() . $menu_item['url']; ?>">

                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                <span class="menu-title"><?php echo $menu_item['menu']; ?></span>
              </a>

            </li>
           
          <?php }
        }
        ?>

      </div>
    <?php } ?>

    <!-- <div class="card mt-3" style="margin-left: 20px; margin-right: 20px;">
      <h4 class="font-weight-bold mt-3 p-3 pb-0">Client Handling</h4>
      <li class="nav-item">
        <a class="nav-link" href="/pages/super-admin/messenger.html">
          <i class="mdi mdi-facebook-messenger menu-icon"></i>
          <span class="menu-title">Messenger</span>

        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>coaches">
          <i class="mdi mdi-tie menu-icon"></i>
          <span class="menu-title">Coaches</span>

        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="users">
          <i class="mdi mdi-account-multiple-outline menu-icon"></i>
          <span class="menu-title">Users</span>

        </a>
      </li>



    </div> -->
<!--       <div class="card mt-3" style="margin-left: 20px; margin-right: 20px;">
        <h4 class="font-weight-bold mt-3 p-3 pb-0">Support</h4>
        <li class="nav-item">
          <a class="nav-link" href="/pages/super-admin/support_tickets.html">
            <i class="mdi mdi-ticket menu-icon"></i>
            <span class="menu-title">Support Tickets</span>

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pages/super-admin/report_generation.html">
            <i class="mdi mdi-chart-bar menu-icon"></i>
            <span class="menu-title">Report Generation</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/pages/super-admin/payment.html">
            <i class="mdi mdi-cash-multiple menu-icon"></i>
            <span class="menu-title">Payment</span>
          </a>
        </li>
      </div> -->


<!--       <div class="align-text-bottom">
        <h4 class="font-weight-bold mt-3 p-3 pb-0 ml20">Settings</h4>
        <li class="nav-item ml20">
          <a class="nav-link" href="<?php echo base_url() ?>settings/menu_category">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Menu Category</span>
          </a>
        </li>
        <li class="nav-item ml20">
          <a class="nav-link" href="<?php echo base_url() ?>settings/menu_list">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Menu List</span>
          </a>
        </li>
        <li class="nav-item ml20">
          <a class="nav-link" href="<?php echo base_url() ?>settings/group_profile">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Group Profle</span>
          </a>
        </li>
        <li class="nav-item ml20">
          <a class="nav-link" href="<?php echo base_url() ?>settings/group_privilege/0">
            <i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Group privilege</span>
          </a>
        </li>
        <li class="nav-item ml20">
          <a class="nav-link" href="#">
            <i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span>
          </a>
        </li>
      </div> -->
    </ul>
  </nav>

  <script src="../..assets/js/jquery-3.3.1.min.js"></script>
  <script src="../..assets/js/bootstrap.min.js"></script>
  <script src="../..assets/js/jquery.nice-select.min.js"></script>
  <script src="../..assets/js/jquery-ui.min.js"></script>
  <script src="../..assets/js/jquery.slicknav.js"></script>