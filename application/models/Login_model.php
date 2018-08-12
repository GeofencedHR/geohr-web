<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 7/29/2018
 * Time: 11:22 AM
 */

class Login_model extends CI_Model
{
    public function create_subscriber($user)
    {
        $this->load->library('user_library');
        return $this->user_library->create($user);
    }

    public function find_user_by_email($email)
    {
        $this->load->library('user_library');
        return $this->user_library->find_by_email($email);
    }

    public function validate_user_credentials($username, $password)
    {
        $this->load->library('user_library');
        return $this->user_library->find_by_email_password($username, $password);
    }
}