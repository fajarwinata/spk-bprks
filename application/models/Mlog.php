<?php
class Mlog extends CI_Model{

    function user_check($username){
             $this->db->join("sys_level","sys_level.id_sys = m_user.level_user","left");
      return $this->db->get_where("m_user", array("nama_user" => $username));
    }
}
