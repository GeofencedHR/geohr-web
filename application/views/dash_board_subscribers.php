<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
require_once("dash_board_subscribers_search.php");
?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Plan</th>
                <th>Registered on</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $i = 1;
            foreach ($pageData['data']->result() as $row) {
                echo "
                <tr>
                <td>" . $i++ . "</td>
                <td>" . $row->user_first_name . "</td>
                <td>" . $row->user_email . "</td>
                <td>" . $row->plan . "</td>
                <td>" . $row->user_created . "</td>
                <td>
                    <span class=\"badge " . getStatusLabel($row->status) . "\">" . $row->status . "</span>
                </td>
                <td>
                    <a href=";
                ?>

                <?php echo base_url('/index.php/dashboard/subscriber/view?id=' . $row->user_id); ?>

                <?php
                echo "\" class=\"badge badge-info\">View</a>
                </td>
            </tr>
                ";
            }
            ?>
            </tbody>
        </table>
    </div>

    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($pageData['currentPage'] <= 1) {
                echo "disabled";
            } ?>">
                <a class="page-link"
                   href="<?php echo base_url('/index.php/dashboard?page=' . ($pageData['currentPage'] - 1) . '&email=' . $pageData['email'] . '&status=' . $pageData['status']); ?>"
                   tabindex="-1">Previous</a>
            </li>

            <?php
            for ($x = 1; $x <= $pageData['pages']; $x++) {
                ?>

                <li class="page-item
                <?php if ($pageData['currentPage'] == $x) {
                    echo "active";
                } ?>">
                    <a class="page-link"
                       href="<?php echo base_url('/index.php/dashboard?page=' . $x . '&email=' . $pageData['email'] . '&status=' . $pageData['status']); ?>">
                        <?php echo $x; ?>
                    </a>
                </li>

                <?php
            }
            ?>

            <li class="page-item <?php if ($pageData['currentPage'] >= $pageData['pages']) {
                echo "disabled";
            } ?>">
                <a class="page-link"
                   href="<?php echo base_url('/index.php/dashboard?page=' . ($pageData['currentPage'] + 1) . '&email=' . $pageData['email'] . '&status=' . $pageData['status']); ?>">Next</a>
            </li>
        </ul>
    </nav>

<?php
require_once("dash_board_footer.php");

function getStatusLabel($status)
{
    if ($status == "ACTIVE") {
        return "badge-success";
    } elseif ($status == "NEW") {
        return "badge-warning";
    } elseif ($status == "SUSPENDED") {
        return "badge-danger";
    }

    return "";
}