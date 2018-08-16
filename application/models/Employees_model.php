<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/16/2018
 * Time: 12:24 AM
 */

class Employees_model extends CI_Model
{
    public function create_employee($user, $plain_password)
    {
        $this->load->library('user_library');
        $created_user = $this->user_library->create($user);
        if ($created_user->num_rows() == 1) {
            $this->load->library('email_library');
            $mail_content = $this->email_library->create_employee_account_confirmation_mail($plain_password);
            $this->email_library->send($created_user->row()->user_email, $created_user->row()->user_first_name, $mail_content['subject'], $mail_content['body']);
        }
        return $created_user;
    }

    public function get_employees($empId, $status, $subId, $page)
    {
        $this->load->library('user_library');
        return $this->user_library->find_employees($empId, $status, $subId, $page);
    }
}