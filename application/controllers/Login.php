<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Login extends CI_Controller
{
	
	public function index() 
	{
		$this->load->helper('url');
		$this->load->view('login_page');
	}

	public function forgot_password() 
	{
		$this->load->helper('url');
		$this->load->view('forgot_password');
	}

	public function register() 
	{
		$this->load->helper('url');
		$this->load->view('register');
	}
}