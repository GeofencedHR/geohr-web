<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('dash_board_subscribers');
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