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
              <span data-feather="user"></span> Profile
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

        <div class="col-md-4 order-md-2">

            <h5 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">
              <span data-feather="file-text"></span> Summary
          </span>
            </h5>

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
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
            <h4><span data-feather="bar-chart-2"></span> Reports</h4>

            <form class="form-inline">
                <div class="form-group mx-sm-3 mb-2">
                    <select id="inputState" class="form-control">
                        <option selected disabled="true">Select</option>
                        <option>Coffee bean - Dehiwala</option>
                        <option>McDonalds - Wellawatta</option>
                    </select>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="from" placeholder="From (date)">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" id="to" placeholder="To (date)">
                </div>
                <button type="submit" class="btn btn-primary mb-2">
                    <span data-feather="filter"></span> Show
                </button>
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Location</th>
                <th>First in</th>
                <th>Last out</th>
                <th>Total hours</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>21/10/2018</td>
                <td>Coffee bean - Dehiwala</td>
                <td>8:15 AM</td>
                <td>10:30 AM</td>
                <td>2 hours 15 minutes</td>
                <td>
                    <a href="<?php echo base_url('/index.php/dashboard/employee/report'); ?>" class="badge badge-info">View</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>20/10/2018</td>
                <td>Coffee bean - Dehiwala</td>
                <td>9:15 AM</td>
                <td>12:30 PM</td>
                <td>3 hours 15 minutes</td>
                <td>
                    <a href="<?php echo base_url('/index.php/dashboard/employee/report'); ?>" class="badge badge-info">View</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>


<?php
require_once("dash_board_footer.php");