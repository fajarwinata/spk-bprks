<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller{
  public function __contruct(){
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }

  //Data Kriteria
  function data_kriteria(){
    $data["data"] = array();
    $kriteria     = $this->mdata->kriteria();

    foreach ($kriteria->result() as $kriteria):
        $kode         = substr($kriteria->kode_kriteria, 0, 4);
        $layanan      = $this->mdata->layanan_select($kode)->row();
      array_push($data["data"], array(
        $kriteria->kode_kriteria,
        $layanan->nama_layanan,
        $kriteria->nama_kriteria,
        $kriteria->ket_kriteria
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Kriteria
  function data_kriteria_detail(){
    $kode         = $this->input->post("id");
    $kriteria      = $this->mdata->kriteria_select($kode)->row();

    if($kriteria){
      $data = array(
        "status"  => "1",
        "kode"    => $kriteria->kode_kriteria,
        "nama"    => $kriteria->nama_kriteria,
        "catatan" => $kriteria->ket_kriteria
      );
    } else{
      $data= array(
        "status"  => "0",
        "msg"     => "Gagal!"
      );
    }


    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Tahun
  function data_tahun(){
    $data["data"] = array();
    $tahun     = $this->mdata->tahun();

    foreach ($tahun->result() as $tahun):
      array_push($data["data"], array(
        $tahun->tahun,
        $tahun->kabisat,
        $tahun->ket_tahun
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Tahun
  function data_tahun_detail(){
    $kode         = $this->input->post("id");
    $tahun      = $this->mdata->tahun_select($kode)->row();

    if($tahun){
      $data = array(
        "status"  => "1",
        "kode"    => $tahun->tahun,
        "nama"    => $tahun->kabisat,
        "catatan" => $tahun->ket_tahun
      );
    } else{
      $data= array(
        "status"  => "0",
        "msg"     => "Gagal!"
      );
    }


    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data User
  function data_user(){
    $data["data"] = array();
    $user         = $this->mdata->user();

    foreach ($user->result() as $user):
      ($user->status_user == "Y") ? $status = "Aktif" : $status = "Tidak Aktif";
      array_push($data["data"], array(
        $user->kode_user,
        $user->nama_user,
        $user->nama_lengkap,
        $user->nama_level,
        substr($user->pass_user,0,20)."...",
        $status
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }
  function user_check(){
      $nama         = $this->input->get("nama");
      $user         = $this->mdata->user_check($nama)->num_rows();
      if($user > 0)
        $data = array("stat" => "0", "pesan" => "Username sudah digunakan");
      else
        $data = array("stat" => "1", "pesan" => "");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }
  //Data user
  function data_user_detail(){
    $kode         = $this->input->post("id");
    $user         = $this->mdata->user_select($kode)->row();

    if($user){
      $level      = $this->mdata->level()->result();
      $option     = "";

      foreach ($level as $level):
        if($level->id_sys == $user->level_user)
          $option .= "<option value='".$level->id_sys."' selected>".$level->nama_level."</option>";
        else
          $option .= "<option value='".$level->id_sys."'>".$level->nama_level."</option>";
      endforeach;

      ($user->status_user == "Y") ? $status = "<option value='Y' selected>Aktif</option><option value='N'>Non-Aktif</option>" : $status = "<option value='Y'>Aktif</option><option value='N' selected>Non-Aktif</option>";

      $data = array(
        "status"        => "1",
        "kode"          => $user->kode_user,
        "nama"          => $user->nama_user,
        "password"      => $user->pass_user,
        "level"         => $option,
        "nama_lengkap"  => $user->nama_lengkap,
        "sts_user"      => $status
      );
    } else{
      $data= array(
        "status"  => "0",
        "msg"     => "Gagal!"
      );
    }


    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  function data_level_select(){
    $data["results"]         = array();
    $level                 = $this->mdata->level();

    foreach ($level->result() as $level):

      array_push($data["results"], array(
        "id"    => $level->id_sys,
        "text"  => $level->nama_level
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Supervisi
  function data_supervisi(){
    $data["data"] = array();
    $supervisi     = $this->mdata->supervisi();

    foreach ($supervisi->result() as $supervisi):
      ($supervisi->status_supervisi == "Y")? $status = "Aktif" : $status = "Tidak-Aktif";
      array_push($data["data"], array(
        $supervisi->kode_supervisi,
        $supervisi->nama_supervisi,
        $status
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Supervisi
  function data_supervisi_detail(){
    $kode         = $this->input->post("id");
    $supervisi    = $this->mdata->supervisi_select($kode)->row();

    ($supervisi->status_supervisi == "Y") ? $status = "<option value='Y' selected>Aktif</option><option value='N'>Non-Aktif</option>" : $status = "<option value='Y'>Aktif</option><option value='N' selected>Non-Aktif</option>";

    if($supervisi){
      $data = array(
        "status"        => "1",
        "kode"          => $supervisi->kode_supervisi,
        "nama"          => $supervisi->nama_supervisi,
        "sts"           => $status
      );
    } else{
      $data= array(
        "status"  => "0",
        "msg"     => "Gagal!"
      );
    }


    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Select2
  function data_supervisi_select(){
    $data["results"]         = array();
    $supervisi               = $this->mdata->supervisi();

    foreach ($supervisi->result() as $supervisi):

      array_push($data["results"], array(
        "id"    => $supervisi->kode_supervisi,
        "text"  => $supervisi->nama_supervisi
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

} //END OF CLASS
