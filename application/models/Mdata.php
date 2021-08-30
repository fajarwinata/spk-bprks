<?php

/**
 * Model Data Referensi, Konfigurasi dan New Code Generate
 */
class Mdata extends CI_Model
{

  //----------------------------------- DATA REF -------------------------------//
  function nasabah(){
    return $this->db->get("m_nasabah");
  }

  function nasabah_detail($kode){
    return $this->db->get_where("m_nasabah", array("kode_nasabah" => $kode));
  }

  function agen_select($kode){
    return $this->db->get_where("m_agen", array("kode_agen" => $kode));
  }

  function agen_all(){
    return $this->db->get("m_agen");
  }

  function layanan(){
    return $this->db->get("m_layanan");
  }

  function layanan_select($kode){
    return $this->db->get_where("m_layanan", array("kode_layanan" => $kode));
  }
  //----------------------------------- DATA REF -------------------------------//

  //----------------------------------- KONFIG --------------------------------//
  //KRITERIA
  function kriteria(){
    return $this->db->get("conf_kriteria");
  }

  function kriteria_select($kode){
    return $this->db->get_where("conf_kriteria", array("kode_kriteria" => $kode));
  }

  //TAHUN
  function tahun(){
    return $this->db->get("conf_tahun");
  }

  function tahun_select($kode){
    return $this->db->get_where("conf_tahun", array("tahun" => $kode));
  }

  //USER
  function user(){
          $this->db->join("sys_level", "m_user.level_user = sys_level.id_sys");
    return $this->db->get("m_user");
  }

  //SUPERVISI
  function supervisi(){
    return $this->db->get("conf_supervisi");
  }

  function supervisi_select($kode){
    return $this->db->get_where("conf_supervisi", array("kode_supervisi" => $kode));
  }

  //Level
  function level(){
    return $this->db->get("sys_level");
  }

  function user_select($kode){
    return $this->db->get_where("m_user", array("kode_user" => $kode));
  }

  function user_check($nama){
    return $this->db->get_where("m_user", array("nama_user" => $nama));
  }
  //----------------------------------- KONFIG --------------------------------//



  //----------------------------------- NEW ID --------------------------------//
  function new_kode_nasabah($agen){
      $this->db->select("(SELECT MAX(kode_nasabah) FROM m_nasabah WHERE kode_nasabah LIKE '$agen.".date("ymd")."-%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 11, 3); $id++;
      return $new   = "$agen.".date("ymd")."-".sprintf("%03s",$id);
  }

  function new_kode_agen($spv){
      $this->db->select("(SELECT MAX(kode_agen) FROM m_agen WHERE kode_agen LIKE '$spv%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 5, 2); $id++;
      return $new   = "$spv".sprintf("%02s",$id);
  }

  function new_kode_layanan(){
      $this->db->select("(SELECT MAX(kode_layanan) FROM m_layanan WHERE kode_layanan LIKE 'LT%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 2, 2); $id++;
      return $new   = "LT".sprintf("%02s",$id);
  }

  function new_kode_kriteria($kode){
      $this->db->select("(SELECT MAX(kode_kriteria) FROM conf_kriteria WHERE kode_kriteria LIKE '$kode-%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 5, 3); $id++;
      return $new   = "$kode-".sprintf("%03s",$id);
  }

  function new_kode_user(){
      $date  = date("ym");
      $this->db->select("(SELECT MAX(kode_user) FROM m_user WHERE kode_user LIKE '$date%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 4, 3); $id++;
      return $new   = "$date".sprintf("%03s",$id);
  }

  function new_kode_user_spv($spv){
      $this->db->select("(SELECT MAX(kode_user) FROM m_user WHERE kode_user LIKE '$spv%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 6, 2); $id++;
      return $new   = "$spv"."u".sprintf("%02s",$id);
  }

  function new_kode_supervisi(){
      $this->db->select("(SELECT MAX(kode_supervisi) FROM conf_supervisi WHERE kode_supervisi LIKE 'SP%') AS id", FALSE);
      $query = $this->db->get();
      $row   = $query->row();
      $id    = (int) substr($row->id, 0, 2); $id++;
      return $new   = "SP".sprintf("%03s",$id);
  }

  function new_kode_tahun($kode){
      $check = $this->db->get_where("conf_tahun", array("tahun" => $kode))->num_rows();
      ($check > 0)? $id = 0 : $id = 1;
      return $id;
  }
  //----------------------------------- NEW ID --------------------------------//

  //----------------------------------- MANIPULASI ----------------------------//

  function agen_spv($spv){
    $this->db->where("kode_agen LIKE '$spv%'");
    return $this->db->get("m_agen");
  }

  function agen_spv_all(){
    return $this->db->get("m_agen");
  }

}
