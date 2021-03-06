<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("header.php");
?>

    <div class="row mt-5">
        <div class="col"></div>
        <div class="col">
            <?php
            if ($status == "DONE") {
                ?>
                <div class="alert alert-success text-center" role="alert">
                    Registration success!<br/>Please check your email inbox for the confirmation email.<br/>
                    <a href="<?php echo base_url('/index.php/login'); ?>">
                        Go to login page.
                    </a>
                </div>
                <?php
            }
            ?>

            <?php
            if ($status == "ERROR") {
                ?>
                <div class="alert alert-danger text-center" role="alert">
                    Registration failed: Please contact support team!<br/>
                    <a href="<?php echo base_url('/index.php/login'); ?>">
                        Go to login page.
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col"></div>
    </div>

<?php
require_once("footer.php");