<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/14/2018
 * Time: 11:29 PM
 */

class Employees extends CI_Controller
{
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('user_validation_library');
        $this->load->model('Employees_model');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_subscriber()) {

            $empId = null;
            $status = null;
            $page = null;

            if (isset($_GET['empId'])) {
                $empId = $_GET['empId'];
            }

            if (isset($_GET['status'])) {
                $status = $_GET['status'];
            }

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }

            $employees = $this->Employees_model->get_employees($empId, $status, $this->user_validation_library->get_user_id(), $page);
            $this->load->view('dash_board_employees', $this->user_validation_library->get_page_data($employees));
        } else {
            redirect('/login');
        }
    }

    public function view()
    {
        $this->load->helper('url');
        $this->load->library('user_validation_library');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_subscriber()) {
            $this->load->view('dash_board_employee_view', $this->user_validation_library->get_page_data(null));
        } else {
            redirect('/login');
        }
    }

    public function create()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('user_validation_library');
        $this->load->model('Employees_model');

        $this->form_validation->set_rules('firstName', 'First name', 'required|max_length[25]');
        $this->form_validation->set_rules('lastName', 'Last name', 'max_length[50]');
        $this->form_validation->set_rules('epId', 'Employee ID', 'required|callback_emp_id_check|max_length[10]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|callback_email_check|max_length[100]');
        $this->form_validation->set_error_delimiters('<div class="form-error-alert">', '</div>');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_subscriber()) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('dash_board_employee_create', $this->user_validation_library->get_page_data(null));
            } else {
                $digits = 4;
                $password = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

                $user = array(
                    'user_first_name' => $_POST['firstName'],
                    'user_last_name' => $_POST['lastName'],
                    'user_emp_id' => $_POST['epId'],
                    'user_email' => $_POST['email'],
                    'user_password' => md5($password),
                    'user_status' => 2,
                    'user_level' => 3,
                    'user_parent_id' => $this->user_validation_library->get_user_id()
                );

                $created_user = $this->Employees_model->create_employee($user, $password);
                $data = array();
                if ($created_user->num_rows() == 1) {
                    $data['status'] = "DONE";
                    $this->load->view('dash_board_employee_create', $this->user_validation_library->get_page_data($data));
                } else {
                    $data['status'] = "ERROR";
                    $this->load->view('dash_board_employee_create', $this->user_validation_library->get_page_data($data));
                }
            }
        } else {
            redirect('/login');
        }
    }

    public function report()
    {
        $this->load->helper('url');
        $this->load->library('user_validation_library');

        if ($this->user_validation_library->is_logged_in() && $this->user_validation_library->is_subscriber()) {
            $this->load->view('dash_board_employee_report_view', $this->user_validation_library->get_page_data(null));
        } else {
            redirect('/login');
        }
    }

    // This is required for form validation to check for duplicate emails.
    public function email_check($email)
    {
        $this->load->library('user_validation_library');
        return $this->user_validation_library->email_check($email);
    }

    // This is required for form validation to check for employee Id.
    public function emp_id_check($empId)
    {
        $this->load->library('user_validation_library');
        return $this->user_validation_library->emp_id_check($empId);
    }
}