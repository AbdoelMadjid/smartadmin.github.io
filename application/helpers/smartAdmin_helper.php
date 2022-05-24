<?php

function has_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        redirect('Auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu_nm = $ci->uri->segment(1);

        $getMenu = $ci->db->get_where('usermenu', ['menu' => $menu_nm])->row_array();

        $menu_id = $getMenu['id_menu'];

        $UserAccess = $ci->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($UserAccess->num_rows() < 1) {
            redirect('Auth/blocked');
        }
    }
}
