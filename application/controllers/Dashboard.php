<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user_m');
		$this->load->helper('url');
	}

	function tambah_aksi(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$fullname = $this->input->post('fullname');
		$level = $this->input->post('level');
	
		$data = array(
			'username' => $username,
			'password' => $password,
			'fullname' => $fullname,
			'level' => $level
			);
			$this->User_m->input_data($data, 'user');
			redirect('Dashboard/index');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->user_m->hapus_record($where, 'user');
		redirect('Dashboard/index');
	}

	function edit_user($id){
		$where = array ('id' => $id);
		$data['user'] = $this->User_m->edit_datauser('user', $where)->result();
		$this->load->view('admin',$data);
	}

	function update_user(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$fullname = $this->input->post('fullname');
		$level = $this->input->post('level');
		$data = array(
			'username' => $username,
			'password' => $password,
			'fullname' => $fullname,
			'level' => $level
			);
			$where = array(
				'id' => $id
				);
			$this->User_m->update_datauser($where, $data, 'user');
			redirect('Dashboard/index');
	}

	public function index()
	{
		$data['user'] = $this->user_m->tampil_data()->result();
		$this->load->view('admin', $data);
		
		// var_dump($data);
	}

}
