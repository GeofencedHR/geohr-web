<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("header.php");
?>

    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="d-flex justify-content-center logo">
                <img src="<?php echo base_url('resources/images/logo-transparent.png'); ?>"
                     alt="Generic placeholder image">
            </div>

            <?php echo form_open('/register'); ?>

            <h4 class="text-center padding-top5 padding-bottom5">Get started today!</h4>
            <div class="form-group">
                <label for="fname">First name</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name"
                       value="<?php echo set_value('fname'); ?>">
                <?php echo form_error('fname'); ?>
            </div>
            <div class="form-group">
                <label for="lname">Last name</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name"
                       value="<?php echo set_value('lname'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                       placeholder="Email address" value="<?php echo set_value('email'); ?>">
                <?php echo form_error('email'); ?>
            </div>
            <div class="form-group">
                <label for="company">Company name</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Company name"
                       value="<?php echo set_value('company'); ?>">
                <?php echo form_error('company'); ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <?php echo form_error('password'); ?>
            </div>
            <div class="form-group">
                <label for="repassword">Re-enter password</label>
                <input type="password" class="form-control" id="repassword" name="repassword"
                       placeholder="Re-enter password">
                <?php echo form_error('repassword'); ?>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            </form>
            <div class="text-center action-links">
                <a href="<?php echo base_url('/index.php/login'); ?>">Back to login</a>
            </div>
        </div>
        <div class="col"></div>
    </div>

<?php
require_once("footer.php");