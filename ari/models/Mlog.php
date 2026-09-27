<?php
Class Mlog extends CI_Model{

    function login($username, $password){

                // $this->db->select('*');
                // $this->db->from('ref_log');
        $this->db->where('username', $username);
        $this->db->where('active', '1');
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
        $query = $this->db->get('ref_log');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }


}
?>
