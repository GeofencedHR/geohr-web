<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->session->has_userdata('email') &&
            $this->session->has_userdata('user_level')) {

            $data['email'] = $this->session->userdata('email');
            $data['user_level'] = $this->session->userdata('user_level');
            $this->load->view('dash_board_subscribers', $data);
        } else {
            redirect('/login');
        }
    }

    public function subscriber_view()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_subscribers_view');
    }

    public function admin_reports()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_admin_reports');
    }

    public function employees()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_employees');
    }

    public function employee_view()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_employee_view');
    }

    public function employee_create()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_employee_create');
    }

    public function employee_report_view()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_employee_report_view');
    }

    public function work_places()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_workplaces');
    }
}