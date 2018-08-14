<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/14/2018
 * Time: 10:59 PM
 */

class Register extends CI_Controller
{

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Login_model');

        $this->form_validation->set_rules('fname', 'First name', 'required|max_length[25]');
        $this->form_validation->set_rules('lname', 'Last name', 'max_length[50]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|callback_email_check|max_length[100]');
        $this->form_validation->set_rules('company', 'Company name', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('repassword', 'Password confirmation', 'required|min_length[5]|max_length[20]|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="form-error-alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            $user = array(
                'user_first_name' => $_POST['fname'],
                'user_last_name' => $_POST['lname'],
                'user_company' => $_POST['company'],
                'user_email' => $_POST['email'],
                'user_password' => md5($_POST['password']),
                'user_level' => 2
            );
            $created_user = $this->Login_model->create_subscriber($user);
            $data = array();
            if ($created_user->num_rows() == 1) {
                $data['status'] = "DONE";
                $this->load->view('registration_status', $data);
            } else {
                $data['status'] = "ERROR";
                $this->load->view('registration_status', $data);
            }
        }
    }

    public function verify()
    {
        $this->load->helper('url');
        $id = $_GET['id'];
        $token = $_GET['token'];

        $this->load->model('Login_model');
        $user = $this->Login_model->find_user_by_id($id);
        if ($user->num_rows() == 1) {
            $foundToken = md5($user->row()->user_created);
            $data = array();
            if ($token == $foundToken) {
                $this->Login_model->activate_user($id);
                $data['status'] = "DONE";
                $this->load->view('account_confirmation', $data);
            } else {
                $data['status'] = "ERROR";
                $this->load->view('account_confirmation', $data);
            }
        }
    }

    // This is required for form validation to check for duplicate emails.
    public function email_check($email)
    {
        $this->load->library('user_validation_library');
        return $this->user_validation_library->email_check($email);
    }
}