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
}