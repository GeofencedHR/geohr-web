<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_employee_search.php");
?>

    <hr/>

    <div class="row">
        <div class="col-md-8 order-md-1">

            <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="user"></span> Create employee
            </span>
            </h5>

            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First name">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last name">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="epId">Employee ID</label>
                        <input type="text" class="form-control" id="epId" placeholder="Employee ID">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email address">
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