<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function index()
	{
		$this->load->helper('url');
		$this->load->view('dash_board_subscribers');
	}

	public function reports()
	{
		$this->load->helper('url');
		$this->load->view('dash_board_reports');
	}
}