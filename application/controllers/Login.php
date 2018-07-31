<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Login extends CI_Controller
{

    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Login_model');

        $this->form_validation->set_rules('email', 'Email address', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div class="form-error-alert">', '</div>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_page');
        } else {
            $existing_user = $this->Login_model->validate_user_credentials($_POST['email'], md5($_POST['password']));
            if ($existing_user->num_rows() > 0) {
                $userData = array(
                    'email' => $existing_user->row()->user_email,
                    'name' => $existing_user->row()->user_first_name,
                    'user_level' => $existing_user->row()->user_level
                );
                $this->session->set_userdata($userData);
                if ($existing_user->row()->user_level == 2) {
                    redirect('/dashboard/employees');
                }

                if ($existing_user->row()->user_level == 1) {
                    redirect('/dashboard');
                }
            } else {
                $this->load->view('login_page');
            }
        }
    }

    public function logout()
    {
        $this->load->helper('url');
        $this->load->library('session');

        $sessionKeys = array('email', 'user_level');
        $this->session->unset_userdata($sessionKeys);
        redirect('/login');
    }

    public function forgot_password()
    {
        $this->load->helper('url');
        $this->load->view('forgot_password');
    }

    public function register()
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
            $this->Login_model->create_subscriber($user);
        }
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
}