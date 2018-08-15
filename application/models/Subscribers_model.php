<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/16/2018
 * Time: 12:13 AM
 */

class Subscribers_model extends CI_Model
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

    public function getSubscribers($email, $status, $page)
    {
        $this->load->library('user_library');
        return $this->user_library->subscriber_search($email, $status, $page);
    }
}