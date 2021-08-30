<?php
class Mvariabel extends CI_Model{

  //Looping Data
  function agen_loop(){
    return $this->db->get("m_agen");
  }

  function nasabah_loop(){
    return $this->db->get("m_nasabah");
  }

  function nasabah_pengajuan_loop(){
           $this->db->where("jmlh_pencairan > 0");
           $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pengajuan");
  }

  function nasabah_pengajuan_all(){
           $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pengajuan");
  }

  function nasabah_pembayaran_loop(){
           $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pembayaran");
  }

  function nasabah_pembayaran_all(){
    return $this->db->get("trx_pembayaran");
  }

  function nasabah_penolakan_loop(){
           $this->db->where("jmlh_pencairan = 0");
           $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pengajuan");
  }

  //WHERE
  function nasabah_jumlah($agen){
    return $this->db->get_where("m_nasabah", "kode_nasabah LIKE '$agen%'");
  }

  function nasabah_jumlah_pengajuan($agen){
           $this->db->where("kode_nasabah LIKE '$agen%' AND jmlh_pencairan > 0");
           $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pengajuan");
  }

  function nasabah_jumlah_penolakan($agen){
           $this->db->where("kode_nasabah LIKE '$agen%' AND jmlh_pencairan = 0");
           $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pengajuan");
  }

  function nasabah_jumlah_pembayaran($agen){
    $this->db->where("kode_nasabah LIKE '$agen%' ");
    $this->db->group_by("kode_nasabah", "asc");
    return $this->db->get("trx_pembayaran");
  }

  function nasabah_pembayaran(){
    return $this->db->get("trx_pembayaran");
  }



}
