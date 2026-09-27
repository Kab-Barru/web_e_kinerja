<?php
class Mpassword extends Ci_model{


    function cek($a,$nik)
    {
      $this->db->select('*');
      $this->db->from('ref_log');
      $this->db->where('username', $nik);
      $this->db->where('password', MD5($a));
      $this->db->limit(1);
      $query = $this->db->get();

      if($query -> num_rows() == 1)
          {
          return $query->result();
          }
          else
          {
          return false;
          }
    }



}
