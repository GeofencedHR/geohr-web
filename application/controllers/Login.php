<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Login extends CI_Controller
{

    public function index()
    {
        $this->load->helper('url');
        $this->load->view('login_page');
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

        $this->form_validation->set_rules('fname', 'First name', 'required|max_length[25]');
        $this->form_validation->set_rules('lname', 'Last name', 'max_length[50]');
        $this->form_validation->set_rules('email', 'Email address', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('company', 'Company name', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('repassword', 'Password confirmation', 'required|min_length[5]|max_length[20]|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            //TODO show success page!
        }
    }
}