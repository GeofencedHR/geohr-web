<?php

/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/16/2018
 * Time: 12:32 AM
 */
class Registration_model extends CI_Model
{
    public function activate_user($id)
    {
        $this->load->library('user_library');
        $data = array("user_status" => 2);
        $this->user_library->update('user_id', $id, $data);
    }
}