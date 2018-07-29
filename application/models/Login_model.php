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

    public function find_subscriber_by_email($email)
    {
        $this->load->database();
        $this->db->where("user_email", $email);
        return $this->db->get("users");
    }
}