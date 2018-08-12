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

            $email = $created_user->row()->user_email;
            $name = $created_user->row()->user_first_name;
            $mail_content = $this->email_library->create_account_confirmation_mail(md5($created_user->row()->user_created));
            $this->email_library->send($email, $name, $mail_content['subject'], $mail_content['body']);
        }
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