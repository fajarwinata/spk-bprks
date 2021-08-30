<?php

/**
 *
 */
class Maksi extends CI_Model
{

  function update($table, $set, $where)
  {
            $this->db->set($set);
            $this->db->where($where);
     return $this->db->update($table);
  }

  function insert($table, $data)
  {
     return $this->db->insert($table, $data);
  }

  function delete($table, $where)
  {
            $this->db->where($where);
     return $this->db->delete($table);
  }
}
