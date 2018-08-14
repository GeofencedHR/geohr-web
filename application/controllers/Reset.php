<?php
/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 8/14/2018
 * Time: 11:07 PM
 */

class Reset extends CI_Controller
{
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('forgot_password');
    }
}