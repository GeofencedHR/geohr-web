<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function high_light_tab($currentPath, $context) {
  if($context->uri->segment(2) == $currentPath) {
    echo "active";
  }
}

?>

      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php high_light_tab(null, $this); ?> 
                <?php high_light_tab("subscriber", $this); ?>" 
                  href="<?php echo base_url();?>">
                  <span data-feather="users"></span>
                  Subscribers
                </a>
              </li>
              <li class="nav-item" id="admin_reports">
                <a class="nav-link <?php high_light_tab("admin_reports", $this); ?>" 
                  href="<?php echo base_url('/index.php/dashboard/admin_reports');?>">
                  <span data-feather="trending-up"></span>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php high_light_tab("employees", $this); ?>" 
                  href="<?php echo base_url('/index.php/dashboard/employees');?>">
                  <span data-feather="users"></span>
                  Employees
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php high_light_tab("work_places", $this); ?>" 
                  href="<?php echo base_url('/index.php/dashboard/work_places');?>">
                  <span data-feather="map-pin"></span>
                  Work places
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="settings"></span>
                  Settings
                </a>
              </li>
            </ul>
          </div>
        </nav>