<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
	}
	
	public function index()
	{
		$data['title'] = 'User Menu';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);				
        $this->load->view('v_upload', array('error' => ' ' ));
		$this->load->view('templates/footer');
	}

    public function aksi_upload()
    {        
        $config['upload_path']          = FCPATH.'/assets/upload/video/';        
		$config['allowed_types']        = 'mp4|webm|ogg|mpeg4';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('v_upload_sukses', $data);
		}
    }
}