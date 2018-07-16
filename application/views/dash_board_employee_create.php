<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_employee_search.php");
?>

<hr/>

  <div class="row">
     <div class="col-md-8 order-md-1">
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

            <div class="mb-3">
              <label for="username">Email address</label>
              <div class="input-group">
                <input type="email" class="form-control" id="username" placeholder="Email address">
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