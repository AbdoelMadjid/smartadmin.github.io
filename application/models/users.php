<?php

class users extends CI_Model
{
    public function listUser()
    {
        // return $this->db->get('users')->result_array();
        //Get user Role
        $this->db->select('a.id, nik, email, fullname, nickname, b.role');
        $this->db->from('users a');
        $this->db->join('user_role b', 'a.role_id = b.id_role');
        $this->db->where('is_active', 1);
        return $this->db->get()->result_array();
    }

    public function delete_user($id)
    {
        // var_dump($id);
        // die;
        // $this->db->delete('users', array('id' => $id));
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('users');
    }
}
