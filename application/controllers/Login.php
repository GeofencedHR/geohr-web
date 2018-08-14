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
                    'user_level' => $existing_user->row()->user_level,
                    'user_id' => $existing_user->row()->user_id
                );
                $this->session->set_userdata($userData);
                if ($existing_user->row()->user_level == 2) {
                    redirect('/employees');
                }

                if ($existing_user->row()->user_level == 1) {
                    redirect('/subscribers');
                }
            } else {
                $data = array();
                $data['status'] = "ERROR";
                $this->load->view('login_page', $data);
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
}