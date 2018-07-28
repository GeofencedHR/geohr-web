<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_employee_search.php")
?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Employee ID</th>
                <th>Created on</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Jack</td>
                <td>jack@gmail.com</td>
                <td>EP-001</td>
                <td>10:30 PM on 20/10/2018</td>
                <td>
                    <span class="badge badge-success">Active</span>
                </td>
                <td>
                    <a href="<?php echo base_url('/index.php/dashboard/employee/view'); ?>" class="badge badge-info">View</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Saman</td>
                <td>saman@gmail.com</td>
                <td>EP-002</td>
                <td>8:30 PM on 21/11/2018</td>
                <td>
                    <span class="badge badge-danger">Suspended</span>
                </td>
                <td>
                    <a href="<?php echo base_url('/index.php/dashboard/employee/view'); ?>" class="badge badge-info">View</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

<?php
require_once("dash_board_footer.php");