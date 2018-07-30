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
        $this->load->database();
        $this->db->insert('users', $user);
    }

    public function find_user_by_email($email)
    {
        $this->load->database();
        $this->db->where("user_email", $email);
        return $this->db->get("users");
    }

    public function validate_user_credentials($username, $password)
    {
        $this->load->database();
        $array = array('user_email' => $username, 'user_password' => $password);
        $this->db->where($array);
        return $this->db->get("users");
    }
}