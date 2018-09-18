<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_employee_search.php");
?>

    <hr/>

    <div class="row">
        <div class="col-md-8 order-md-1">

            <?php
//            if (isset($pageData) && $pageData['status'] == "DONE") {
//                ?>
<!--                <div class="alert alert-success text-center" role="alert">-->
<!--                    Employee created successfully.-->
<!--                    <a href="--><?php //echo base_url("/index.php/employees/view") ?><!--">-->
<!--                        View.-->
<!--                    </a>-->
<!--                </div>-->
<!--                --><?php
//            }
            ?>

            <?php
//            if (isset($pageData) && $pageData['status'] == "ERROR") {
//                ?>
<!--                <div class="alert alert-danger text-center" role="alert">-->
<!--                    Something went wrong while create the employee. Please contact support.-->
<!--                </div>-->
<!--                --><?php
//            }
            ?>

            <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="user"></span> Create employee
            </span>
            </h5>

            <?php echo form_open('/employees/create'); ?>
            <div class="row">
                <div class="col-md-6 mb-3 form-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="First name" name="firstName"
                           value="<?php /*echo set_value('firstName');*/ ?>">
                    <?php /*echo form_error('firstName');*/ ?>
                </div>

                <div class="col-md-6 mb-3 form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Last name" name="lastName"
                           value="<?php /*echo set_value('lastName');*/ ?>">
                    <?php /*echo form_error('lastName');*/ ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3 form-group">
                    <label for="epId">Employee ID</label>
                    <input type="text" class="form-control" id="epId" placeholder="Employee ID" name="epId"
                           value="<?php /*echo set_value('epId');*/ ?>">
                    <?php /*echo form_error('epId');*/ ?>
                </div>

                <div class="col-md-6 mb-3 form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email address" name="email"
                           value="<?php /*echo set_value('email');*/ ?>">
                    <?php /*echo form_error('email');*/ ?>
                </div>
            </div>

            <!-- <hr class="mb-4"> -->
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
                </div>
            </div>
            </form>
        </div>
    </div>


<?php
require_once("dash_board_footer.php");