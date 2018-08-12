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
        $created_user = $this->user_library->create($user);

        if ($created_user->num_rows() == 1) {
            $this->load->library('email_library');
            $mail_content = $this->email_library->create_account_confirmation_mail($created_user->row()->user_id, md5($created_user->row()->user_created));
            $this->email_library->send($created_user->row()->user_email, $created_user->row()->user_first_name, $mail_content['subject'], $mail_content['body']);
        }
        return $created_user;
    }

    public function find_user_by_email($email)
    {
        $this->load->library('user_library');
        return $this->user_library->find_by_email($email);
    }

    public function find_user_by_id($id)
    {
        $this->load->library('user_library');
        return $this->user_library->find_by_id($id);
    }

    public function validate_user_credentials($username, $password)
    {
        $this->load->library('user_library');
        return $this->user_library->find_by_email_password($username, $password);
    }

    public function activate_user($id)
    {
        $this->load->library('user_library');
        $data = array("user_status" => 2);
        $this->user_library->update('user_id', $id, $data);
    }
}