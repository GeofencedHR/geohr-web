<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_employee_search.php");
?>

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

            <div class="mb-3">
              <label for="address">Status</label>
              <select id="inputState" class="form-control">
                  <option selected disabled="true">Select</option>
                  <option>Active</option>
                  <option>Suspended</option>
              </select>
            </div>

            <!-- <hr class="mb-4"> -->
            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Update</button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-4 order-md-2 mb-4">

          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Summary</span>
          </h4>

          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Work places</h6>
                <small class="text-muted">Number of assigned work places</small>
              </div>
              <span class="text-muted">03</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Last place</h6>
                <small class="text-muted">Last attended work place</small>
              </div>
              <span class="text-muted">Coffee bean - Dehiwala</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Time</h6>
                <small class="text-muted">Time of the last attendance</small>
              </div>
              <span class="text-muted">2018-10-05 10:30 PM</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Created</h6>
                <small class="text-muted">Employee created date</small>
              </div>
              <span class="text-muted">2018-10-05 10:30 PM</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Updated</h6>
                <small class="text-muted">Date of last updated</small>
              </div>
              <span class="text-muted">2018-10-05 10:30 PM</span>
            </li>
          </ul>

          <!-- <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form> -->
        </div>
      </div>


<?php
require_once("dash_board_footer.php");