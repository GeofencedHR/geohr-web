<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function high_light_tab($currentPath, $context)
{
    if ($context->uri->segment(1) == $currentPath) {
        echo "active";
    }
}

function isAdmin($user_level)
{
    if ($user_level == 1) {
        return true;
    } else {
        return false;
    }
}

function isSubscriber($user_level)
{
    if ($user_level == 2) {
        return true;
    } else {
        return false;
    }
}

?>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <?php if (isAdmin($user_level)) { ?>
                <li class="nav-item">
                    <a class="nav-link <?php high_light_tab(null, $this); ?>
                <?php high_light_tab("subscribers", $this); ?>"
                       href="<?php echo base_url("/index.php/subscribers"); ?>">
                        <span data-feather="users"></span>
                        Subscribers
                    </a>
                </li>
            <?php } ?>
            <?php if (isAdmin($user_level)) { ?>
                <li class="nav-item" id="admin_reports">
                    <a class="nav-link <?php high_light_tab("admin_reports", $this); ?>"
                       href="<?php echo base_url('/index.php/admin_reports'); ?>">
                        <span data-feather="trending-up"></span>
                        Reports
                    </a>
                </li>
            <?php } ?>
            <?php if (isSubscriber($user_level)) { ?>
                <li class="nav-item">
                    <a class="nav-link
                      <?php high_light_tab("employees", $this); ?> 
                      <?php high_light_tab("employee", $this); ?>"
                       href="<?php echo base_url('/index.php/employees'); ?>">
                        <span data-feather="users"></span>
                        Employees
                    </a>
                </li>
            <?php } ?>
            <?php if (isSubscriber($user_level)) { ?>
                <li class="nav-item">
                    <a class="nav-link <?php high_light_tab("work_places", $this); ?>"
                       href="<?php echo base_url('/index.php/work_places'); ?>">
                        <span data-feather="map-pin"></span>
                        Work places
                    </a>
                </li>
            <?php } ?>
            <?php if (isSubscriber($user_level) || isAdmin($user_level)) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span data-feather="settings"></span>
                        Settings
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>