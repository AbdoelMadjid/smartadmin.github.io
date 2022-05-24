<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserMenu extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('vid');
	}

	public function index()
	{

		// $data['title'] = 'User Menu';
		// $data['mylist'] = $this->vid->get_video();
		// $this->load->view('templates/header', $data);
		// $this->load->view('templates/sidebar', $data);
		// $this->load->view('usermenu', $data);
		// // $this->load->view('usermenu', array('error'=> ' '));        
		// $this->load->view('templates/footer');
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// echo 'selamat datang: ' . $data['user']['nickname'];		
		if ($data) {
			$mydata['title'] = 'User Menu';
			$mydata['mylist'] = $this->vid->get_video();
			$mydata['fullname'] = $data['user']['fullname'];
			$mydata['role_id'] = $data['user']['role_id'];
			$this->load->view('templates/header', $mydata);
			$this->load->view('templates/sidebar', $mydata);
			$this->load->view('usermenu', $data);
			$this->load->view('templates/footer');
		} else {
		}
	}

	public function save()
	{
		// $this->load->model('profile_model');
		// $data['current_user'] = $this->auth_model->current_user();

		// if ($this->input->method() === 'post') {
		// the user id contain dot, so we must remove it
		// $file_name = str_replace('.','',$data['current_user']->id);

		$this->form_validation->set_rules('fileInput', 'File Input', 'callback_check_input_file');

		if ($this->form_validation->run() == TRUE) {

			$config['upload_path']          = FCPATH . '/assets/upload/video/';
			$config['allowed_types']        = 'mp4|mpeg4|webm|ogg';
			// $config['file_name']            = $file_name;
			$config['overwrite']            = true;
			$config['max_size']             = 1024; // 1MB
			$config['max_width']            = 1080;
			$config['max_height']           = 1080;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('fileInput')) {

				//Save Video to Local Path
				$uploadData = $this->upload->data();
				$my_file_name = $uploadData['file_name'];
				$path_location = $uploadData['full_path'];
			}

			//Save to Database			
			$this->vid->save_video($my_file_name, $path_location);

			//Flash  data show
			$this->session->set_flashdata('myflash', 'Upload Succeed');
			redirect('UserMenu');
		} else {
			$data['title'] = 'User Menu';
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('usermenu');
			$this->load->view('templates/footer');
		}
	}

	public function check_input_file()
	{
		$check = TRUE;
		if ((!isset($_FILES['fileInput'])) || $_FILES['fileInput']['size'] == 0) {
			$this->form_validation->set_message('check_input_file', 'The {fileInput} column is required');
			$check = FALSE;
		} else if (isset($_FILES['fileInput']) && $_FILES['fileInput']['size'] != 0) {
			$allowedExts = array("mp4", "mpeg");
			// $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
			$allowedTypes = array('video/mpeg', 'video/quicktime', 'video/mp4');
			$extension = pathinfo($_FILES["fileInput"]["name"], PATHINFO_EXTENSION);
			// $detectedType = exif_imagetype($_FILES['fileInput']['tmp_name']);			

			$type = $_FILES['fileInput']['type'];

			if (!in_array($type, $allowedTypes)) {
				$this->form_validation->set_message('check_input_file', 'Invalid Video Content!');
				$check = FALSE;
			}
			if (filesize($_FILES['fileInput']['tmp_name']) > 2097152) {
				$this->form_validation->set_message('check_input_file', 'The Video file size shoud not exceed 2MB!');
				$check = FALSE;
			}
			if (!in_array($extension, $allowedExts)) {
				$this->form_validation->set_message('check_input_file', "Invalid file extension {$extension}");
				$check = FALSE;
			}
		}

		return $check;

		// $allowed_mime_type_arr = array('video/mp4');
		// $mime = get_mime_by_extension($_FILES['fileInput']['name']);
		// if(isset($_FILES['fileInput']['name']) && $_FILES['fileInput']['name']!=""){
		//     if(in_array($mime, $allowed_mime_type_arr)){
		//         return true;
		//     }else{
		//         $this->form_validation->set_message('file_check', 'Please select only mp4 file.');
		//         return false;
		//     }
		// }else{
		//     $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
		//     return false;
		// }
	}

	public function Delete($id)
	{
		$this->vid->delete_video($id);
		$this->session->set_flashdata('myflash', 'deleted');
		redirect('UserMenu');
	}
}
