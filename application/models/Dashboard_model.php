<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/4/2018
 * Time: 12:53 PM
 */

class Dashboard_model extends CI_Model
{
    public function getSubscribers($email, $status, $page)
    {
        $this->load->library('user_library');
        return $this->user_library->subscriber_search($email, $status, $page);
    }

    public function getSubscriberProfile($subId)
    {
        $this->load->library('user_library');
        return $this->user_library->find_subscriber($subId);
    }

    public function update_subscriber($id, $data)
    {
        $this->load->library('user_library');
        $this->user_library->update('user_id', $id, $data);
    }

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
}