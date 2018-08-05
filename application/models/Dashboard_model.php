<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/4/2018
 * Time: 12:53 PM
 */

class Dashboard_model extends CI_Model
{
    public function getSubscribers()
    {
        /*
         * Related plain SQL
         * -----------------
         * SELECT users.user_id, users.user_first_name, users.user_email, users.user_created, user_statuses.status, user_plans.plan FROM users
         * INNER JOIN user_statuses ON users.user_status=user_statuses.status_id
         * INNER JOIN user_plans ON users.user_plan=user_plans.plan_id
         * WHERE users.user_level=2;
         * */
        $this->load->database();
        $this->db->select('users.user_id, users.user_first_name, users.user_email, users.user_created, user_statuses.status, user_plans.plan');
        $this->db->join('user_statuses', 'users.user_status=user_statuses.status_id', 'inner');
        $this->db->join('user_plans', 'users.user_plan=user_plans.plan_id', 'inner');
        $this->db->where("user_level", 2);
        return $this->db->get("users");
    }
}