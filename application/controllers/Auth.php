<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        //Get Role ID from Session        
        $role_id = $this->session->userdata('role_id');

        //If Role ID from session null or empty, fill login form
        if (!$role_id) {
            $data['title']  = 'Login Form';

            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/auth_header', $data);
                $this->load->view('auth/login');
                $this->load->view('templates/auth_footer', $data);
            } else {
                $this->_Checklogin();
            }
        } else {
            //If Role ID from session Exist, redirect to usermenu
            $this->db->select('a.menu_id as menu_id, b.title, b.title, b.url, b.icon, b.is_active');
            $this->db->from('user_access_menu a');
            $this->db->join('user_submenu b', 'a.menu_id = b.menu_id');
            $this->db->where('role_id', $role_id);
            $this->db->where('b.is_active', 1);
            $this->db->order_by('a.menu_id');
            $this->db->limit(1);
            $mData = $this->db->get()->row_array();

            $redirectMenu = $mData['url'];
            redirect($redirectMenu);
        }
    }

    private function _Checklogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            $is_active = $user['is_active'];

            if ($is_active == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $email,
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);
                    // if ($data['role_id'] == 2) {
                    //     redirect('UserMenu');
                    // } elseif ($data['role_id'] == 1) {
                    //     redirect('AdminMenu');
                    // }
                    // redirect('Dashboard');
                    //Get 1 menu access URL by User Role and redirect to that URL
                    $this->db->select('a.menu_id as menu_id, b.title, b.title, b.url, b.icon, b.is_active');
                    $this->db->from('user_access_menu a');
                    $this->db->join('user_submenu b', 'a.menu_id = b.menu_id');
                    $this->db->where('role_id', $user['role_id']);
                    $this->db->where('b.is_active', 1);
                    $this->db->order_by('a.menu_id');
                    $this->db->limit(1);
                    $mData = $this->db->get()->row_array();

                    $redirectMenu = $mData['url'];
                    redirect($redirectMenu);
                } else {
                    $this->session->set_flashdata('myflashloginfailed', 'login failed');
                    redirect('Auth');
                }
            } else {
            }
        } else {
            $this->session->set_flashdata('myflashfailed', 'user not found');
            redirect('Auth');
        }
    }

    public function registration()
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

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            // echo "Tes kesini";
            $data = [
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'fullname' => htmlspecialchars($this->input->post('fullname', true)),
                'nickname' => htmlspecialchars($this->input->post('nickname', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role_id' => 2,
                'is_active' => 1,
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('myflash', 'Registered Succeed');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('myflashlogout', 'loggout');
        redirect('Auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
