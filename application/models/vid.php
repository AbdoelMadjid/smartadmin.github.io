<?php 
    class vid extends CI_Model{
        
        public function get_video()
        {
            return $this->db->get('list_video')->result_Array();
            // $tes= $this->db->get('list_video')->result_Array();
            // var_dump($tes);
            // die;
        }

        public function save_video($my_file_name, $path_location)
        {
            $data = [
                "title" => $my_file_name,
                // "poster" => $this->input->post('poster'),
                "path" => $path_location,
                "create_date" => date('Y-m-d'),
                "create_user" => 'Adri'
            ];
            
            $this->db->insert('list_video', $data);
    
        }

        public function delete_video($id){
            $this->db->where('id', $id);
            $this->db->delete('list_video');
        }
    }
?>