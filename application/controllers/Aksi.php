<?php
/**
 *
 */
class Aksi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }

  //Tambah Data Nasabah
  function nasabah_insert(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $jk = $this->input->post("jk");
    $status = $this->input->post("status");
    $usia = $this->input->post("usia");

    $data = array(
                  "kode_nasabah" => $kode,
                  "nm_nasabah" => $nama,
                  "jk_nasabah" => $jk,
                  "usia_nasabah" => $usia,
                  "status_nasabah" => $status
                );
    $table = "m_nasabah";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data Nasabah
  function nasabah_update(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $jk = $this->input->post("jk");
    $status = $this->input->post("status");
    $usia = $this->input->post("usia");

    $set = array(
                  "nm_nasabah" => $nama,
                  "jk_nasabah" => $jk,
                  "usia_nasabah" => $usia,
                  "status_nasabah" => $status
                );
    $where = array("kode_nasabah" => $kode);
    $table = "m_nasabah";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data Nasabah
  function nasabah_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("kode_nasabah" => $kode);
    $table = "m_nasabah";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Tambah Data Agen
  function agen_insert(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $status = $this->input->post("status");

    $data = array(
                  "kode_agen" => $kode,
                  "nama_agen" => $nama,
                  "status" => $status
                );
    $table = "m_agen";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data Agen
  function agen_update(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $status = $this->input->post("status");

    $set = array(
                  "nama_agen" => $nama,
                  "status" => $status
                );
    $where = array("kode_agen" => $kode);
    $table = "m_agen";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data Agen
  function agen_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("kode_agen" => $kode);
    $table = "m_agen";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Tambah Data Layanan
  function layanan_insert(){
    //Data Recieve
    $kode    = $this->input->post("kode");
    $nama    = $this->input->post("nama");
    $catatan = $this->input->post("catatan");

    $data = array(
                  "kode_layanan" => $kode,
                  "nama_layanan" => $nama,
                  "catatan"      => $catatan
                );
    $table = "m_layanan";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data Layanan
  function layanan_update(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $catatan = $this->input->post("catatan");

    $set = array(
                  "nama_layanan" => $nama,
                  "catatan" => $catatan
                );
    $where = array("kode_layanan" => $kode);
    $table = "m_layanan";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data Layanan
  function layanan_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("kode_layanan" => $kode);
    $table = "m_layanan";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Tambah Data Kriteria
  function kriteria_insert(){
    //Data Recieve
    $kode    = $this->input->post("kode");
    $nama    = $this->input->post("nama");
    $catatan = $this->input->post("catatan");

    $data = array(
                  "kode_kriteria" => $kode,
                  "nama_kriteria" => $nama,
                  "ket_kriteria"  => $catatan
                );
    $table = "conf_kriteria";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data kriteria
  function kriteria_update(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $catatan = $this->input->post("catatan");

    $set = array(
                  "nama_kriteria" => $nama,
                  "ket_kriteria" => $catatan
                );
    $where = array("kode_kriteria" => $kode);
    $table = "conf_kriteria";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data Kriteria
  function kriteria_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("kode_kriteria" => $kode);
    $table = "conf_kriteria";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Tambah Data Tahun
  function tahun_insert(){
    //Data Recieve
    $kode    = $this->input->post("kode");
    $nama    = $this->input->post("nama");
    $catatan = $this->input->post("catatan");

    $data = array(
                  "tahun" => $kode,
                  "kabisat" => $nama,
                  "ket_tahun"  => $catatan
                );
    $table = "conf_tahun";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data Tahun
  function tahun_update(){
    //Data Recieve
    $kode = $this->input->post("kode");
    $nama = $this->input->post("nama");
    $catatan = $this->input->post("catatan");

    $set = array(
                  "kabisat" => $nama,
                  "ket_tahun" => $catatan
                );
    $where = array("tahun" => $kode);
    $table = "conf_tahun";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data tahun
  function tahun_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("tahun" => $kode);
    $table = "conf_tahun";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }


  //Tambah Data User
  function user_insert(){
    //Data Recieve
    $kode   = $this->input->post("kode");
    $nama   = $this->input->post("nama");
    if(isset($_POST["pass"]))
      $pass   = password_hash($this->input->post("pass"), PASSWORD_DEFAULT);
    else
      $pass   = $this->input->post("pass_hd");
    $level  = $this->input->post("level");
    $nama2  = $this->input->post("nama_lengkap");
    $status = $this->input->post("status");

    $data = array(
                  "kode_user" => $kode,
                  "nama_user" => $nama,
                  "level_user"  => $level,
                  "pass_user"  => $pass,
                  "status_user"  => $status,
                  "nama_lengkap"  => $nama2
                );
    $table = "m_user";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data User
  function user_update(){
    //Data Recieve
    $kode   = $this->input->post("kode");
    $nama   = $this->input->post("nama");
    if(isset($_POST["pass"]))
      $pass   = password_hash($this->input->post("pass"), PASSWORD_DEFAULT);
    else
      $pass   = $this->input->post("pass_hd");
    $level  = $this->input->post("level");
    $nama2  = $this->input->post("nama_lengkap");
    $status = $this->input->post("status");

    $set = array(
                  "kode_user" => $kode,
                  "nama_user" => $nama,
                  "level_user"  => $level,
                  "pass_user"  => $pass,
                  "status_user"  => $status,
                  "nama_lengkap"  => $nama2
                );
    $where = array("kode_user" => $kode);
    $table = "m_user";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data User
  function user_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("kode_user" => $kode);
    $table = "m_user";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Tambah Data User
  function supervisi_insert(){
    //Data Recieve
    $kode   = $this->input->post("kode");
    $nama   = $this->input->post("nama");
    $status = $this->input->post("status");

    $data = array(
                  "kode_supervisi" => $kode,
                  "nama_supervisi" => $nama,
                  "status_supervisi"  => $status
                );
    $table = "conf_supervisi";
    $insert= $this->maksi->insert($table, $data);

    if($insert)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Ditambahkan");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Ditambahkan");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Ubah Data User
  function supervisi_update(){
    //Data Recieve
    $kode   = $this->input->post("kode");
    $nama   = $this->input->post("nama");
    $status = $this->input->post("status");

    $set    = array(
                  "kode_supervisi" => $kode,
                  "nama_supervisi" => $nama,
                  "status_supervisi"  => $status
                );
    $where = array("kode_supervisi" => $kode);
    $table = "conf_supervisi";
    $update= $this->maksi->update($table, $set, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Diperbaharui");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Diperbaharui");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

  //Hapus Data User
  function supervisi_delete(){
    //Data Recieve
    $kode = $this->input->post("id");

    $where = array("kode_supervisi" => $kode);
    $table = "conf_supervisi";
    $update= $this->maksi->delete($table, $where);

    if($update)
      $data = array("status" => "1", "judul"=> "Sukses", "msg" => "Data Sukses Dihapus");
    else
      $data = array("status" => "0", "judul"=> "Gagal", "msg" => "Data Gagal Dihapus");

      echo json_encode($data, JSON_PRETTY_PRINT);
  }

} //END OF CLASS
