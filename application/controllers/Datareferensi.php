<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datareferensi extends CI_Controller{
  public function __contruct(){
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }

  //Data Nasabah
  function data_nasabah(){
    $data["data"] = array();
    $nasabah      = $this->mdata->nasabah();

    foreach ($nasabah->result() as $nasabah):
      $agen = $this->mdata->agen_select(substr($nasabah->kode_nasabah, 0, 7))->row();
      switch ($nasabah->status_nasabah) {
        case 'A':
          $status = "Aktif";
          break;
        case 'S':
          $status = "Suspend";
          break;
        case 'B':
          $status = "Black List";
          break;

        default:
          $status = "Tidak Diketahui";
          break;
      }
      array_push($data["data"], array(
        $nasabah->kode_nasabah,
        $agen->nama_agen,
        $nasabah->nm_nasabah."<span class='pull-right'><img src='assets/images/".$nasabah->jk_nasabah.".png' width='16px'></span>",
        "Usia: ".$nasabah->usia_nasabah."th <span class='pull-right'><img src='assets/images/".$nasabah->status_nasabah.".png' width='16px'></span>",
        $status
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Nasabah Detail
  function data_nasabah_detail(){
    $kode         = $this->input->post("id");
    $nasabah      = $this->mdata->nasabah_detail($kode)->row();
    ($nasabah->jk_nasabah == "L") ? $option = "<option value='L' selected>Laki-laki</option><option value='P'>Perempuan</option>" : $option = "<option value='L' >Laki-laki</option><option value='P' selected>Perempuan</option>";
    switch ($nasabah->status_nasabah) {
      case 'A':
        $sts = "<option value='A' selected>Aktif</option><option value='S'>Suspen</option><option value='B'>Black List</option>";
        break;
      case 'S':
        $sts = "<option value='A' >Aktif</option><option value='S' selected>Suspen</option><option value='B'>Black List</option>";
        break;
      case 'B':
        $sts = "<option value='A' >Aktif</option><option value='S'>Suspen</option><option value='B' selected>Black List</option>";
        break;
    }

    if($nasabah){
      $data = array(
        "status"  => "1",
        "kode"    => $nasabah->kode_nasabah,
        "nama"    => $nasabah->nm_nasabah,
        "jk"      => $option,
        "usia"    => $nasabah->usia_nasabah,
        "sts"     => $sts
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
  function data_agen_select(){
    $data["results"]         = array();
    $agen                    = $this->mdata->agen_all();

    foreach ($agen->result() as $agen):

      array_push($data["results"], array(
        "id"    => $agen->kode_agen,
        "text"  => $agen->nama_agen
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  function data_layanan_select(){
    $data["results"]         = array();
    $layanan                    = $this->mdata->layanan();

    foreach ($layanan->result() as $layanan):

      array_push($data["results"], array(
        "id"    => $layanan->kode_layanan,
        "text"  => $layanan->nama_layanan
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Request New ID
  function request_new(){
    $id          = $this->input->post("id");

    switch($this->input->get("q")){
      case 'nasabah':
        $data        = $this->mdata->new_kode_nasabah($id);
        break;
      case 'agen':
        $data        = $this->mdata->new_kode_agen($id);
        break;
      case 'layanan':
        $data        = $this->mdata->new_kode_layanan();
        break;
      case 'kriteria':
        $data        = $this->mdata->new_kode_kriteria($id);
        break;
      case 'tahun':
        $data        = $this->mdata->new_kode_tahun($id);
        break;
      case 'user':
        $data        = $this->mdata->new_kode_user();
        break;
      case 'user_spv':
        $data        = $this->mdata->new_kode_user_spv($id);
        break;
      case 'spv':
        $data        = $this->mdata->new_kode_supervisi();
        break;
    }

    $data        = array("newid" => $data);

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Agen
  function data_agen(){
    $data["data"] = array();
    $agen      = $this->mdata->agen_all();

    foreach ($agen->result() as $agen):
      ($agen->status == "A")? $status = "Aktif" : $status = "Non-Aktif";

      array_push($data["data"], array(
        $agen->kode_agen,
        $agen->nama_agen,
        $status
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Agen Detail
  function data_agen_detail(){
    $kode         = $this->input->post("id");
    $agen      = $this->mdata->agen_select($kode)->row();
    switch ($agen->status) {
      case 'A':
        $sts = "<option value='A' selected>Aktif</option><option value='N'>Non-Aktif</option>";
        break;
      case 'N':
        $sts = "<option value='A' >Aktif</option><option value='N' selected>Non-AKtif</option>";
        break;
    }

    if($agen){
      $data = array(
        "status"  => "1",
        "kode"    => $agen->kode_agen,
        "nama"    => $agen->nama_agen,
        "sts"     => $sts
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

  //Data Layanan
  function data_layanan(){
    $data["data"] = array();
    $layanan      = $this->mdata->layanan();

    foreach ($layanan->result() as $layanan):

      array_push($data["data"], array(
        $layanan->kode_layanan,
        $layanan->nama_layanan,
        $layanan->catatan
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  //Data Agen Detail
  function data_layanan_detail(){
    $kode         = $this->input->post("id");
    $layanan      = $this->mdata->layanan_select($kode)->row();

    if($layanan){
      $data = array(
        "status"  => "1",
        "kode"    => $layanan->kode_layanan,
        "nama"    => $layanan->nama_layanan,
        "catatan" => $layanan->catatan
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

} //END of CLASS
