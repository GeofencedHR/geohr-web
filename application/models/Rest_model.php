<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_Model extends CI_Model
{

    public function save_location($location)
    {
        $this->load->database();
        $this->db->query("insert into test (name) values ('" . $location . "')");
        return array("location" => $location);
    }

}