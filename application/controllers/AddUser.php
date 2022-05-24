<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddUser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        has_logged_in();
        $this->load->model('users');
    }
    public function index()
    {
        $data['admin'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        if ($data) {
            // $mydata['title'] = 'Add User';
            // $userdata['userlist'] = $this->users->listUser();

            // $mydata['fullname'] = $data['admin']['fullname'];
            // $mydata['role_id'] = $data['admin']['role_id'];
            // $this->load->view('templates/header', $mydata);
            // $this->load->view('templates/sidebar', $mydata);            
            // $this->load->view('add_user', $userdata);
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
            $this->db->where('b.is_active', 1);
            $queryRole = $this->db->get();
            $mData = $queryRole->result_array();

            $newTitle['title'] = 'Add User';

            $myNewQueryRole = $queryRole->result_array();
            $myNewQuery2['menuData'] = $myNewQueryRole + $newTitle + $userFullName;
            $userdata['userlist'] = $this->users->listUser();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $myNewQuery2);
            $this->load->view('add_user', $userdata);
            $this->load->view('templates/footer');
        }
    }

    public function Delete($id)
    {
        $this->users->delete_user($id);
        $this->session->set_flashdata('myflash', 'deleted');
        redirect('AddUser');
    }

    public function registration()
    {
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        } else {
            $role_id = $this->session->userdata('role_id');
            $menu_nm = $this->uri->segment(1);

            $getMenu = $this->db->get_where('usermenu', ['menu' => $menu_nm])->row_array();

            $menu_id = $getMenu['id_menu'];

            // $UserAccess = $this->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);



            //Get user Menu based on User Role
            $this->db->select('a.menu_id, b.title, b.title, b.url, b.icon, b.is_active');
            $this->db->from('user_access_menu a');
            $this->db->join('user_submenu b', 'a.menu_id = b.menu_id');
            $this->db->where('role_id', $role_id);
            $this->db->where('b.is_active', 1);
            $UserAccess = $this->db->get();

            //Get user Role
            $this->db->select('nik, email, fullname, nickname, b.role, b.id_role');
            $this->db->from('users a');
            $this->db->join('user_role b', 'a.role_id = b.id_role');
            $this->db->where('email', $this->session->userdata('email'));
            $query = $this->db->get();
            $mydata = $query->row_array();

            $userFullName['fullname'] = $mydata['fullname'];

            if ($UserAccess->num_rows() < 1) {
                redirect('Auth/blocked');
            } else {
                $newTitle['title'] = 'User Registration';

                $myNewQueryRole = $UserAccess->result_array();
                $myNewQuery2['menuData'] = $myNewQueryRole + $newTitle + $userFullName;

                $this->load->view('templates/header');
                $this->load->view('templates/sidebar', $myNewQuery2);
                $this->load->view('user_registration');
                $this->load->view('templates/footer');
            }
        }
    }

    public function registration_save()
    {
        $data['title'] = 'Registration Form';

        $this->form_validation->set_rules('nik', 'Nik/Nomor induk kependudukan', 'required|trim');
        $this->form_validation->set_rules('fullname', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('nickname', 'Nick Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'email already registered !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[retype_password]', [
            'matches' => 'password not match !',
            'min_length' => 'password too short !'
        ]);
        $this->form_validation->set_rules('retype_password', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('validatedInputGroupSelect', 'Option value', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
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

            $newTitle['title'] = 'User Registration';

            $myNewQueryRole = $queryRole->result_array();
            $myNewQuery2['menuData'] = $myNewQueryRole + $newTitle + $userFullName;
            $userdata['userlist'] = $this->users->listUser();

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $myNewQuery2);
            $this->load->view('user_registration');
            $this->load->view('templates/footer');
        } else {
            // echo "Tes kesini";
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'fullname' => htmlspecialchars($this->input->post('fullname', true)),
                'nickname' => htmlspecialchars($this->input->post('nickname', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                // 'role_id' => 2,
                'role_id' => htmlspecialchars($this->input->post('validatedInputGroupSelect', true)),
                'is_active' => 1,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            // var_dump($data['role_id']);
            // die;
            $this->db->insert('users', $data);
            $this->session->set_flashdata('myflash', 'Registered Succeed');
            redirect('AddUser');
        }
    }
}
