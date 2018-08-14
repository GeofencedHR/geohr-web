<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/14/2018
 * Time: 11:23 PM
 */

class Admin_reports extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('user_validation_library');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_admin()) {
            $this->load->view('dash_board_admin_reports', $this->user_validation_library->get_page_data(null));
        } else {
            redirect('/login');
        }
    }
}