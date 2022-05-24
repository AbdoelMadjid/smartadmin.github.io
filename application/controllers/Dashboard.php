<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('email')) {
		// 	redirect('auth');
		// }
		has_logged_in();
	}

	public function index()
	{
		// $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $mydata['title'] = 'Dashboard';

		// $mydata['fullname'] = $data['user']['fullname'];
		// $mydata['role_id'] = $data['user']['role_id'];
		// $this->load->view('templates/header', $mydata);
		// $this->load->view('templates/sidebar', $mydata);
		// $this->load->view('dashboard');
		// $this->load->view('templates/footer');

		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		if ($data) {
			//Get user Role
			$this->db->select('nik, email, fullname, nickname, b.role, b.id_role');
			$this->db->from('users a');
			$this->db->join('user_role b', 'a.role_id = b.id_role');
			$this->db->where('email', $this->session->userdata('email'));
			$query = $this->db->get();
			$data = $query->row_array();


			$userRole = $data['id_role'];
			$userFullName['fullname'] = $data['fullname'];

			//Get user Menu based on User Role
			$this->db->select('a.menu_id, b.title, b.title, b.url, b.icon, b.is_active');
			$this->db->from('user_access_menu a');
			$this->db->join('user_submenu b', 'a.menu_id = b.menu_id');
			$this->db->where('role_id', $userRole);
			$this->db->where('b.is_active', 1);
			$queryRole = $this->db->get();
			$mData = $queryRole->result_array();

			$myNewData['menuData'] = $mData + $data;
			// $myNewData['mylist'] = $this->vid->get_video();
			$newTitle['title'] = 'Dashboard';

			$myNewQueryRole = $queryRole->result_array();
			$myNewQuery2['menuData'] = $myNewQueryRole + $newTitle + $userFullName;

			$this->load->view('templates/header', $myNewData);
			$this->load->view('templates/sidebar', $myNewQuery2);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');
		}
	}
}
