<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_employee_search.php");
?>
  <div class="row">
      <div class="table-responsive col-md-8 order-md-1">

        <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="list"></span> Attendance records
          </span>
        </h5>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>First in</th>
                  <th>Last out</th>
                  <th>Total hours</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>21/10/2018</td>
                  <td>8:15 AM</td>
                  <td>10:30 AM</td>
                  <td>2 hours 15 minutes</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>20/10/2018</td>
                  <td>9:15 AM</td>
                  <td>12:30 PM</td>
                  <td>3 hours 15 minutes</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="col-md-4 order-md-2">

          <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="file-text"></span> Report summary
          </span>
          </h5>

          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Name</h6>
                <small class="text-muted">Name of employee</small>
              </div>
              <span class="text-muted">Jack Hill</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Location</h6>
                <small class="text-muted">Name of work place</small>
              </div>
              <span class="text-muted">Coffee bean - Dehiwala</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Date</h6>
                <small class="text-muted">Date of attendance report</small>
              </div>
              <span class="text-muted">2018-10-05</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Hours</h6>
                <small class="text-muted">Total work hours</small>
              </div>
              <span class="text-muted">5 hours 32 mins</span>
            </li>
          </ul>
        </div>
      </div>


<?php
require_once("dash_board_footer.php");