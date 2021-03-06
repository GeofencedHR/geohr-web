<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/12/2018
 * Time: 12:11 PM
 */

class User_library
{
    protected $CI;

    const USERS_TABLE_NAME = "users";
    const USER_STATUS_TABLE_NAME = "user_statuses";
    const USER_PLAN_TABLE_NAME = "user_plans";

    /*
     * Page = 1, OFFSET = 0
     * Page = 2, OFFSET = 10
     * Page = 3, OFFSET = 20
     * Page = 4, OFFSET = 30
     *
     * param 2 = num of records
     * param 3 = OFFSET
     * */
    const RECORDS_PER_PAGE = 10;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function create($user)
    {
        $this->CI->load->database();
        $this->CI->db->insert(self::USERS_TABLE_NAME, $user);
        return $this->find_by_email($user['user_email']);
    }

    public function update($key_field, $key_val, $data = array())
    {
        $this->CI->load->database();
        foreach ($data as $key => $value) {
            $this->CI->db->set($key, $value);
        }
        $this->CI->db->where($key_field, $key_val);
        $this->CI->db->update(self::USERS_TABLE_NAME);
    }

    public function find_by_email($email)
    {
        $this->CI->load->database();
        $this->CI->db->where("user_email", $email);
        return $this->CI->db->get(self::USERS_TABLE_NAME);
    }

    public function find_by_id($id)
    {
        $this->CI->load->database();
        $this->CI->db->where("user_id", $id);
        return $this->CI->db->get(self::USERS_TABLE_NAME);
    }

    public function find_by_parent_id_and_emp_id($parentId, $empId)
    {
        $this->CI->load->database();
        $array = array('user_parent_id' => $parentId, 'user_emp_id' => $empId);
        $this->CI->db->where($array);
        return $this->CI->db->get(self::USERS_TABLE_NAME);
    }

    public function find_by_email_password($username, $password)
    {
        $this->CI->load->database();
        $array = array('user_email' => $username, 'user_password' => $password);
        $this->CI->db->where($array);
        return $this->CI->db->get(self::USERS_TABLE_NAME);
    }

    public function subscriber_search($email, $status, $page = 1)
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
        $this->CI->load->database();
        $this->CI->db->select('users.user_id, users.user_first_name, users.user_email, users.user_created, user_statuses.status, user_plans.plan');
        $this->CI->db->join(self::USER_STATUS_TABLE_NAME, 'users.user_status=user_statuses.status_id', 'inner');
        $this->CI->db->join(self::USER_PLAN_TABLE_NAME, 'users.user_plan=user_plans.plan_id', 'inner');
        $this->CI->db->where("users.user_level", 2);

        if (trim($email) != null && trim($email) != '') {
            $this->CI->db->where("users.user_email", $email);
        }

        if (trim($status) != null && trim($status) != '') {
            $this->CI->db->where("user_statuses.status", $status);
        }

        $queryOffset = ($page - 1) * self::RECORDS_PER_PAGE;
        $pages = $this->CI->db->count_all_results(self::USERS_TABLE_NAME, FALSE);
        $this->CI->db->limit(self::RECORDS_PER_PAGE, $queryOffset);
        $data = $this->CI->db->get();
        return array("pages" => $pages / self::RECORDS_PER_PAGE, "data" => $data, "currentPage" => $page, "email" => $email, "status" => $status);
    }

    public function find_subscriber($subId)
    {
        $this->CI->load->database();
        $this->CI->db->select('users.user_id, users.user_first_name, users.user_last_name, users.user_email, users.	user_company, users.user_created, users.user_last_updated, user_statuses.status, user_plans.plan');
        $this->CI->db->join(self::USER_STATUS_TABLE_NAME, 'users.user_status=user_statuses.status_id', 'inner');
        $this->CI->db->join(self::USER_PLAN_TABLE_NAME, 'users.user_plan=user_plans.plan_id', 'inner');
        $this->CI->db->where("users.user_id", $subId);
        $data = $this->CI->db->get(self::USERS_TABLE_NAME);
        return array("profile" => $data);
    }

    public function find_employees($empId, $status, $subId, $page = 1)
    {
        /*
         * RELATED PLAIN SQL
         * -----------------
         * SELECT users.user_id, users.user_parent_id, users.user_emp_id, users.user_email, users.user_first_name, users.user_created,  user_statuses.status from users
         * INNER JOIN user_statuses ON users.user_status=user_statuses.status_id
         * WHERE users.user_emp_id="EP1001" AND
         * user_statuses.status='ACTIVE' AND
         * users.user_parent_id=25;
         * */
        if ($page < 1) {
            $page = 1;
        }
        $this->CI->load->database();
        $this->CI->db->select('users.user_id, users.user_parent_id, users.user_emp_id, users.user_email, users.user_first_name, users.user_created, user_statuses.status');
        $this->CI->db->join(self::USER_STATUS_TABLE_NAME, 'users.user_status=user_statuses.status_id', 'inner');
        $this->CI->db->where("users.user_parent_id", $subId);

        if (trim($empId) != null && trim($empId) != '') {
            $this->CI->db->where("users.user_emp_id", $empId);
        }

        if (trim($status) != null && trim($status) != '') {
            $this->CI->db->where("user_statuses.status", $status);
        }

        $queryOffset = ($page - 1) * self::RECORDS_PER_PAGE;
        $pages = $this->CI->db->count_all_results(self::USERS_TABLE_NAME, FALSE);
        $this->CI->db->limit(self::RECORDS_PER_PAGE, $queryOffset);
        $data = $this->CI->db->get();
        return array("pages" => $pages / self::RECORDS_PER_PAGE, "data" => $data, "currentPage" => $page, "empId" => $empId, "status" => $status);
    }

    public function find_employee($user_id)
    {
        $this->CI->load->database();
        $this->CI->db->select('users.user_id, users.user_parent_id, users.user_emp_id, users.user_email, users.user_first_name, users.user_last_name, users.user_created, users.user_last_updated, user_statuses.status');
        $this->CI->db->join(self::USER_STATUS_TABLE_NAME, 'users.user_status=user_statuses.status_id', 'inner');
        $this->CI->db->where("users.user_id", $user_id);
        $data = $this->CI->db->get(self::USERS_TABLE_NAME);
        return array("profile" => $data);
    }
}