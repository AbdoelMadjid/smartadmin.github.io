<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadVideo extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        has_logged_in();
        $this->load->model('users');
        $this->load->model('vid');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if ($data) {

            //Get user Role
            $this->db->select('nik, email, fullname, nickname, b.role, b.id_role');
            $this->db->from('users a');
            $this->db->join('user_role b', 'a.role_id = b.id_role');
            $this->db->where('email', $this->session->userdata('email'));
            $query = $this->db->get();
            $data = $query->row_array();

            // $userRole = $data['id_role'];
            $userFullName['fullname'] = $data['fullname'];

            //Get user Menu based on User Role
            // $this->db->select('a.menu_id, b.title, b.title, b.url, b.icon, b.is_active');
            // $this->db->from('user_access_menu a');
            // $this->db->join('user_submenu b', 'a.menu_id = b.menu_id');
            // $this->db->where('role_id', $userRole);
            // $this->db->where('b.is_active', 1);
            // $queryRole = $this->db->get();
            // $mData = $queryRole->result_array();

            // $myNewData['menuData'] = $mData + $data;
            $myNewData['mylist'] = $this->vid->get_video();
            $newTitle['title'] = 'Upload Video';

            // $myNewQueryRole = $queryRole->result_array();
            $myNewQuery2['menuData'] = $newTitle + $userFullName;

            $this->load->view('templates/header', $myNewData);
            $this->load->view('templates/sidebar', $myNewQuery2);
            $this->load->view('upload_video', $myNewData);
            $this->load->view('templates/footer');
        }
    }


    public function save()
    {
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
            redirect('UploadVideo');
        } else {
            $data['title'] = 'User Menu';
            // $this->load->view('templates/header', $data);
            // $this->load->view('templates/sidebar', $data);
            // $this->load->view('UploadVideo');
            // $this->load->view('templates/footer');

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
            $queryRole = $this->db->get();
            $mData = $queryRole->result_array();

            $myNewData['menuData'] = $mData + $data;
            $myNewData['mylist'] = $this->vid->get_video();
            $newTitle['title'] = 'Upload Video';

            $myNewQueryRole = $queryRole->result_array();
            $myNewQuery2['menuData'] = $myNewQueryRole + $newTitle + $userFullName;

            $this->load->view('templates/header', $myNewData);
            $this->load->view('templates/sidebar', $myNewQuery2);
            $this->load->view('upload_video');
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
            $allowedTypes = array('video/mpeg', 'video/quicktime', 'video/mp4');
            $extension = pathinfo($_FILES["fileInput"]["name"], PATHINFO_EXTENSION);

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
    }

    public function Delete($id)
    {
        $this->vid->delete_video($id);
        $this->session->set_flashdata('myflash', 'deleted');
        redirect('UploadVideo');
    }
}
