<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/15/2018
 * Time: 1:13 AM
 */

class User_validation_library
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function is_admin()
    {
        $this->CI->load->library('session');
        if ($this->CI->session->userdata('user_level') == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function is_subscriber()
    {
        $this->CI->load->library('session');
        if ($this->CI->session->userdata('user_level') == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function is_logged_in()
    {
        $this->CI->load->library('session');
        if ($this->CI->session->has_userdata('email') &&
            $this->CI->session->has_userdata('user_level')) {
            return true;
        }

        return false;
    }

    public function get_page_data($pageData)
    {
        $this->CI->load->library('session');
        $data['email'] = $this->CI->session->userdata('email');
        $data['user_level'] = $this->CI->session->userdata('user_level');
        $data['name'] = $this->CI->session->userdata('name');
        $data['user_id'] = $this->CI->session->userdata('user_id');
        $data['pageData'] = $pageData;
        return $data;
    }

    public function get_user_id()
    {
        $this->CI->load->library('session');
        return $this->CI->session->userdata('user_id');
    }

    public function email_check($email)
    {
        $this->CI->load->library('form_validation');
        $this->CI->load->library('user_library');

        $existing_user = $this->CI->user_library->find_by_email($email);
        if ($existing_user->num_rows() == 0) {
            return true;
        } else {
            $this->CI->form_validation->set_message('email_check', 'Email address "' . $existing_user->row()->user_email . '" is already registered."');
            return false;
        }
    }
}