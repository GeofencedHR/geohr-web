<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/4/2018
 * Time: 12:53 PM
 */

class Dashboard_model extends CI_Model
{
    public function getSubscribers($email, $status, $page = 1)
    {
        /*
         * Related plain SQL
         * -----------------
         * SELECT users.user_id, users.user_first_name, users.user_email, users.user_created, user_statuses.status, user_plans.plan FROM users
         * INNER JOIN user_statuses ON users.user_status=user_statuses.status_id
         * INNER JOIN user_plans ON users.user_plan=user_plans.plan_id
         * WHERE users.user_level=2 AND
         * user_statuses.status='NEW' AND
         * users.user_email='amal@dushan.lk';
         * */
        if ($page < 1) {
            $page = 1;
        }
        $this->load->database();
        $this->db->select('users.user_id, users.user_first_name, users.user_email, users.user_created, user_statuses.status, user_plans.plan');
        $this->db->join('user_statuses', 'users.user_status=user_statuses.status_id', 'inner');
        $this->db->join('user_plans', 'users.user_plan=user_plans.plan_id', 'inner');
        $this->db->where("users.user_level", 2);

        if (trim($email) != null && trim($email) != '') {
            $this->db->where("users.user_email", $email);
        }

        if (trim($status) != null && trim($status) != '') {
            $this->db->where("user_statuses.status", $status);
        }

        $recordsPerPage = 10;
        $queryOffset = ($page - 1) * $recordsPerPage;
        /*
         * Page = 1, OFFSET = 0
         * Page = 2, OFFSET = 10
         * Page = 3, OFFSET = 20
         * Page = 4, OFFSET = 30
         *
         * param 2 = num of records
         * param 3 = OFFSET
         * */
        $pages = $this->db->count_all_results('users', FALSE);
        $this->db->limit($recordsPerPage, $queryOffset);
        $data = $this->db->get();
        return array("pages" => $pages / $recordsPerPage, "data" => $data, "currentPage" => $page, "email" => $email, "status" => $status);
    }

    public function getSubscriberProfile($subId)
    {
        $this->load->database();
        $this->db->select('users.user_id, users.user_first_name, users.user_last_name, users.user_email, users.	user_company, users.user_created, users.user_last_updated, user_statuses.status, user_plans.plan');
        $this->db->join('user_statuses', 'users.user_status=user_statuses.status_id', 'inner');
        $this->db->join('user_plans', 'users.user_plan=user_plans.plan_id', 'inner');
        $this->db->where("users.user_id", $subId);
        $data = $this->db->get('users');
        return array("profile" => $data);
    }
}