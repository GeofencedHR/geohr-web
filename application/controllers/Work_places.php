<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/15/2018
 * Time: 1:06 AM
 */

class Work_places extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('user_validation_library');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_subscriber()) {
            $this->load->view('dash_board_workplaces', $this->user_validation_library->get_page_data(null));
        } else {
            redirect('/login');
        }
    }

//    public function create()
//    {
//        $this->load->helper(array('form', 'url'));
//        $this->load->library('user_validation_library');
//        // $this->load->model('Employees_model');
//        $this->load->view('dash_board_workplace_create', $this->user_validation_library->get_page_data(null));
//    }
}