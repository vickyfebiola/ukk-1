<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function index()
	{
		$this->load->view('login_admin');
	}

	public function login()
	{
		redirect('Dashboard');
	}
}
