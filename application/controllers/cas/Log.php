<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Central Authentication System
//BACKEND RESPONSE

class Log extends CI_Controller {
  function login(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    //1. Check_All_Request
    if(strlen($username) > 0 && strlen($password) > 0 ){
      //2. Check_user
      $check = $this->mlog->user_check($username);

      if($check->num_rows() > 0){
        $user_data  = $check->row();
        if($user_data->status_user == "Y"){
          if(password_verify($password, $user_data->pass_user)){
            $sess_data  = array(
              "sess_id"   => $user_data->kode_user,
              "sess_name" => $user_data->nama_user,
              "sess_nm_l" => $user_data->nama_lengkap,
              "sess_level"=> $user_data->nama_level,
              "sess_path" => $user_data->path,
              "sess_status"=> "ONLINE"
            );


            $this->session->set_userdata($sess_data);
            $response = array("status" => 1, "message" => "SUCCESS");
          }
          else $response = array("status" => 0, "message" => "Password yang kamu masukan Salah!");
        }
          else $response = array("status" => 0, "message" => "Status Kamu di Non-Aktifkan oleh Admin!");

      }
      else $response = array("status" => 0, "message" => "Username tidak ditemukan!");
    } else {
      $response = array("status" => 0, "message" => "Error, data yang dikirmkan tidak sesuai");
    }

      echo json_encode($response);
  }

  function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }

}
