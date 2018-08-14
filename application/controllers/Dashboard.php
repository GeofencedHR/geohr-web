<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Dashboard_model');

        if ($this->isLoggedIn() && $this->isAdmin()) {

            $email = null;
            $status = null;
            $page = null;

            if (isset($_GET['email'])) {
                $email = $_GET['email'];
            }

            if (isset($_GET['status'])) {
                $status = $_GET['status'];
            }

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $subscribers = $this->Dashboard_model->getSubscribers($email, $status, $page);
            $this->load->view('dash_board_subscribers', $this->getPageData($subscribers));
        } else {
            redirect('/login');
        }
    }

    public function subscriber_view()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('Dashboard_model');

        if ($this->isLoggedIn() && $this->isAdmin()) {

            if (isset($_POST['status'])) {
                $update = array();
                $update['user_status'] = $_POST['status'];
                $this->Dashboard_model->update_subscriber($_GET['id'], $update);
            }

            if (isset($_POST['plan'])) {
                $update = array();
                $update['user_plan'] = $_POST['plan'];
                $this->Dashboard_model->update_subscriber($_GET['id'], $update);
            }

            $profileData = $this->Dashboard_model->getSubscriberProfile($_GET['id']);
            if ($profileData['profile']->num_rows() == 1) {
                $data = array();
                $data['profile'] = $profileData['profile']->row();
                $data['id'] = $_GET['id'];
                $this->load->view('dash_board_subscribers_view', $this->getPageData($data));
            }
        } else {
            redirect('/login');
        }
    }

    public function admin_reports()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->isLoggedIn() && $this->isAdmin()) {
            $this->load->view('dash_board_admin_reports', $this->getPageData(null));
        } else {
            redirect('/login');
        }
    }

    public function employees()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->isLoggedIn() && $this->isSubscriber()) {
            $this->load->view('dash_board_employees', $this->getPageData(null));
        } else {
            redirect('/login');
        }
    }

    public function employee_view()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->isLoggedIn() && $this->isSubscriber()) {
            $this->load->view('dash_board_employee_view', $this->getPageData(null));
        } else {
            redirect('/login');
        }
    }

    public function employee_create()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('firstName', 'First name', 'required|max_length[25]');
        $this->form_validation->set_rules('lastName', 'Last name', 'max_length[50]');
        $this->form_validation->set_rules('epId', 'Employee ID', 'required|max_length[10]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|callback_email_check|max_length[100]');
        $this->form_validation->set_error_delimiters('<div class="form-error-alert">', '</div>');

        if ($this->isLoggedIn() && $this->isSubscriber()) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('dash_board_employee_create', $this->getPageData(null));
            }
        } else {
            redirect('/login');
        }
    }

    public function employee_report_view()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->isLoggedIn() && $this->isSubscriber()) {
            $this->load->view('dash_board_employee_report_view', $this->getPageData(null));
        } else {
            redirect('/login');
        }
    }

    public function work_places()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if ($this->isLoggedIn() && $this->isSubscriber()) {
            $this->load->view('dash_board_workplaces', $this->getPageData(null));
        } else {
            redirect('/login');
        }
    }

    private function isLoggedIn()
    {
        if ($this->session->has_userdata('email') &&
            $this->session->has_userdata('user_level')) {
            return true;
        }

        return false;
    }

    private function getPageData($pageData)
    {
        $data['email'] = $this->session->userdata('email');
        $data['user_level'] = $this->session->userdata('user_level');
        $data['name'] = $this->session->userdata('name');
        $data['user_id'] = $this->session->userdata('user_id');
        $data['pageData'] = $pageData;
        return $data;
    }

    public function email_check($email)
    {
        $this->load->model('Login_model');
        $existing_user = $this->Login_model->find_user_by_email($email);
        if ($existing_user->num_rows() == 0) {
            return true;
        } else {
            $this->form_validation->set_message('email_check', 'Email address "' . $existing_user->row()->user_email . '" is already registered."');
            return false;
        }
    }

    private function isAdmin()
    {
        if ($this->session->userdata('user_level') == 1) {
            return true;
        } else {
            return false;
        }
    }

    private function isSubscriber()
    {
        if ($this->session->userdata('user_level') == 2) {
            return true;
        } else {
            return false;
        }
    }
}