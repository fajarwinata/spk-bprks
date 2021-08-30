<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manipulasi extends CI_Controller{

  function nilai_agen(){
    $id_spv = base64_decode($this->input->get("id"));
    $data["data"] = array();
    $agen      = $this->mdata->agen_spv($id_spv);

    foreach ($agen->result() as $agen):
      $jml_nasabah    = $this->mvariabel->nasabah_jumlah($agen->kode_agen)->num_rows();
      $jml_pengajuan  = $this->mvariabel->nasabah_jumlah_pengajuan($agen->kode_agen)->num_rows();
      $jml_pembayaran = $this->mvariabel->nasabah_jumlah_pembayaran($agen->kode_agen)->num_rows();
      $rata_rata      = (float) ($jml_nasabah+$jml_pengajuan+$jml_pembayaran)/3;
      if($agen->status == "A"){
        $status = "Aktif" ;
        $text = "text-white" ;
        $color = "success" ;
      } else {
        $status = "Non-Aktif";
        $text = "" ;
        $color = "danger" ;
      }

      if($jml_pengajuan != 0) $persen1 = (float) ($jml_pengajuan/$jml_nasabah)*100;
        else $persen1 = 0;
      if($jml_pembayaran != 0) $persen2 = (float) ($jml_pembayaran/$jml_pengajuan)*100;
        else $persen2 = 0;

      array_push($data["data"], array(
        $agen->kode_agen,
        $agen->nama_agen,
        $jml_nasabah,
        $jml_pengajuan."<span class='badge bg-info text-white pull-right' >".ceil($persen1)."%</span>",
        $jml_pembayaran."<span class='badge bg-info text-white pull-right' >".ceil($persen2)."%</span>",
        substr($rata_rata,0, 10),
        "<span class='badge bg-$color $text'>$status</span>"
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  function centroid_agen(){
    $id_spv = base64_decode($this->input->get("id"));
    $data["data"] = array();
    $agen      = $this->mdata->agen_spv($id_spv);

    $kluster = 5;
		//81-100 = sangat baik
		//70-80 = baik
		//60-69 = cukup
		//40-59 = kurang
		//0-39 = kurang sekali
		$c['c1'] = rand(8,10);
		$c['c2'] = rand(6,7);
		$c['c3'] = rand(4,5);
		$c['c4'] = rand(2,3);
		$c['c5'] = rand(0,1);

    foreach ($agen->result() as $agen):
      $jml_nasabah    = $this->mvariabel->nasabah_jumlah($agen->kode_agen)->num_rows();
      $jml_pengajuan  = $this->mvariabel->nasabah_jumlah_pengajuan($agen->kode_agen)->num_rows();
      $jml_pembayaran = $this->mvariabel->nasabah_jumlah_pembayaran($agen->kode_agen)->num_rows();
      $rata_rata      = (float) round(($jml_nasabah+$jml_pengajuan+$jml_pembayaran)/3);

      //centroid_Processing
      $d1 = ceil(abs($rata_rata-$c['c1']));
      $d2 = ceil(abs($rata_rata-$c['c2']));
      $d3 = ceil(abs($rata_rata-$c['c3']));
      $d4 = ceil(abs($rata_rata-$c['c4']));
      $d5 = ceil(abs($rata_rata-$c['c5']));

//--------------Distance Sorting Algorithm (K-Means Algorithm)----------------//
      $array_sort_awal = array($d1,$d2,$d3,$d4,$d5);
			$array_sort = $array_sort_awal;
			for ($j=1;$j<=$kluster-1;$j++){//1 4 --> 2
				for ($k=0;$k<=$kluster-2;$k++) {//0 2 --> 1
					if ($array_sort[$k] > $array_sort[$k + 1]){ // $array_sort[0] > $array_sort[1] --> 6 > 3
						$temp = $array_sort[$k]; // 3
						$array_sort[$k] = $array_sort[$k + 1]; // 4
						$array_sort[$k + 1] = $temp; //$array_sort[1] = 4
					}
				}
			}

			for ($i = 0; $i < $kluster; $i++){
				for($r = 0; $r < $kluster; $r++)
				{
					if($array_sort[0] == $array_sort_awal[$r])
					{
            switch ($r) {
              case '0':
                // code...
                $status = "Super" ;
                $text   = "text-white" ;
                $color  = "success" ;
                break;
              case '1':
                // code...
                $status = "Hebat" ;
                $text   = "text-white" ;
                $color  = "primary" ;
                break;
              case '2':
                // code...
                $status = "Cukup" ;
                $text   = "" ;
                $color  = "info" ;
                break;
              case '3':
                // code...
                $status = "Kurang" ;
                $text   = "" ;
                $color  = "warning" ;
                break;
              case '4':
                // code...
                $status = "<i class='fa fa-close'></i> Buruk" ;
                $text   = "text-white" ;
                $color  = "danger" ;
                break;


              default:
                $status = "UNKNOWN" ;
                $text   = "" ;
                $color  = "secondary" ;
                // code...
                break;
            }
					}
				}
			}
//--------------Distance Sorting Algorithm (K-Means Algorithm)----------------//


      array_push($data["data"], array(
        $agen->kode_agen,
        $agen->nama_agen,
        $jml_nasabah,
        $jml_pengajuan,
        $jml_pembayaran,
        substr($rata_rata,0, 6),
        $d1,$d2,$d3,$d4,$d5,
        "<span class='badge bg-$color $text'>$status</span>"
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }


  function centroid_agen_all(){
    $data["data"] = array();
    $agen      = $this->mdata->agen_spv_all();

    $kluster = 5;
		//81-100 = sangat baik
		//70-80 = baik
		//60-69 = cukup
		//40-59 = kurang
		//0-39 = kurang sekali
		$c['c1'] = rand(81,100);
		$c['c2'] = rand(70,80);
		$c['c3'] = rand(60,69);
		$c['c4'] = rand(40,59);
		$c['c5'] = rand(0,39);

    foreach ($agen->result() as $agen):
      $jml_nasabah    = $this->mvariabel->nasabah_jumlah($agen->kode_agen)->num_rows();
      $jml_pengajuan  = $this->mvariabel->nasabah_jumlah_pengajuan($agen->kode_agen)->num_rows();
      $jml_pembayaran = $this->mvariabel->nasabah_jumlah_pembayaran($agen->kode_agen)->num_rows();
      $rata_rata      = (float) ($jml_nasabah+$jml_pengajuan+$jml_pembayaran)/3;

      //centroid_Processing
      $d1 = ceil(abs($rata_rata-$c['c1']));
      $d2 = ceil(abs($rata_rata-$c['c2']));
      $d3 = ceil(abs($rata_rata-$c['c3']));
      $d4 = ceil(abs($rata_rata-$c['c4']));
      $d5 = ceil(abs($rata_rata-$c['c5']));

//--------------Distance Sorting Algorithm (K-Means Algorithm)----------------//
      $array_sort_awal = array($d1,$d2,$d3,$d4,$d5);
			$array_sort = $array_sort_awal;
			for ($j=1;$j<=$kluster-1;$j++){//1 4 --> 2
				for ($k=0;$k<=$kluster-2;$k++) {//0 2 --> 1
					if ($array_sort[$k] > $array_sort[$k + 1]){ // $array_sort[0] > $array_sort[1] --> 6 > 3
						$temp = $array_sort[$k]; // 3
						$array_sort[$k] = $array_sort[$k + 1]; // 4
						$array_sort[$k + 1] = $temp; //$array_sort[1] = 4
					}
				}
			}

			for ($i = 0; $i < $kluster; $i++){
				for($r = 0; $r < $kluster; $r++)
				{
					if($array_sort[0]==$array_sort_awal[$r])
					{
            switch ($r) {
              case '0':
                // code...
                $status = "Super" ;
                $text   = "text-white" ;
                $color  = "success" ;
                break;
              case '1':
                // code...
                $status = "Hebat" ;
                $text   = "text-white" ;
                $color  = "primary" ;
                break;
              case '2':
                // code...
                $status = "Cukup" ;
                $text   = "" ;
                $color  = "info" ;
                break;
              case '3':
                // code...
                $status = "Kurang" ;
                $text   = "" ;
                $color  = "warning" ;
                break;
              case '4':
                // code...
                $status = "<i class='fa fa-close'></i> Buruk" ;
                $text   = "text-white" ;
                $color  = "danger" ;
                break;


              default:
                $status = "UNKNOWN" ;
                $text   = "" ;
                $color  = "secondary" ;
                // code...
                break;
            }
					}
				}
			}
//--------------Distance Sorting Algorithm (K-Means Algorithm)----------------//


      array_push($data["data"], array(
        $agen->kode_agen,
        $agen->nama_agen,
        $jml_nasabah,
        $jml_pengajuan,
        $jml_pembayaran,
        "<span class='btn btn-$color $text'>$status</span>"
      ));
    endforeach;

    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

  function iterasi_agen(){
    $id_spv       = base64_decode($this->input->get("id"));
    $data["data"] = array();
    $agen         = $this->mdata->agen_spv($id_spv);
    $no           =0;


    foreach ($agen->result() as $agen):
      $jml_nasabah    = $this->mvariabel->nasabah_jumlah($agen->kode_agen)->num_rows();
      $jml_pengajuan  = $this->mvariabel->nasabah_jumlah_pengajuan($agen->kode_agen)->num_rows();
      $jml_pembayaran = $this->mvariabel->nasabah_jumlah_pembayaran($agen->kode_agen)->num_rows();

      $c1a = 81;
      $c1b = 65;
      $c1c = 65;

      $c2a = 65;
      $c2b = 81;
      $c2c = 65;

      $c3a = 65;
      $c3b = 65;
      $c3c = 81;

      $c1a_b = "";
      $c1b_b = "";
      $c1c_b = "";

      $c2a_b = "";
      $c2b_b = "";
      $c2c_b = "";

      $c3a_b = "";
      $c3b_b = "";
      $c3c_b = "";

      $hc1=0;
      $hc2=0;
      $hc3=0;

      $no=0;
      $arr_c1 = array();
      $arr_c2 = array();
      $arr_c3 = array();

      $arr_c1_temp = array();
      $arr_c2_temp = array();
      $arr_c3_temp = array();

      //-- Loop it>
      for($i = 1; $i <= 3; $i++){
        ${"hc".$i} = sqrt(pow(($jml_nasabah-${"c".$i."a"}),2)+pow(($jml_pengajuan-${"c".$i."b"}),2)+pow(($jml_pembayaran-${"c".$i."c"}),2));
      }


      if($hc1<=$hc2)
      {
        if($hc1<=$hc3)
        {
          $arr_c1[$no] = 1;
        }
        else
        {
          $arr_c1[$no] = '0';
        }
      }
      else
      {
        $arr_c1[$no] = '0';
      }

      if($hc2<=$hc1)
      {
        if($hc2<=$hc3)
        {
          $arr_c2[$no] = 1;
        }
        else
        {
          $arr_c2[$no] = '0';
        }
      }
      else
      {
        $arr_c2[$no] = '0';
      }

      if($hc3<=$hc1)
      {
        if($hc3<=$hc2)
        {
          $arr_c3[$no] = 1;
        }
        else
        {
          $arr_c3[$no] = '0';
        }
      }
      else
      {
        $arr_c3[$no] = '0';
      }

      $arr_c1_temp[$no] = $jml_nasabah;
      $arr_c2_temp[$no] = $jml_pengajuan;
      $arr_c3_temp[$no] = $jml_pembayaran;

      if($arr_c1[$no]) $cen1 = "<a role=\"button\" href=\"#\" class=\"btn btn-primary\">".$arr_c1[$no]."</a>" ;
      else $cen1 = $arr_c1[$no];

      if($arr_c2[$no]) $cen2 = "<a role=\"button\" href=\"#\" class=\"btn btn-primary\">".$arr_c2[$no]."</a>" ;
      else $cen2 = $arr_c2[$no];

      if($arr_c3[$no]) $cen3 = "<a role=\"button\" href=\"#\" class=\"btn btn-primary\">".$arr_c3[$no]."</a>" ;
      else $cen3 = $arr_c3[$no];

      array_push($data["data"], array(
        $agen->kode_agen,
        $agen->nama_agen,
        $jml_nasabah,
        $jml_pengajuan,
        $jml_pembayaran,
        $hc1,$hc2,$hc3,
        $cen1,$cen2,$cen3
      ));
      $no++;
    endforeach;



    echo json_encode($data, JSON_PRETTY_PRINT);
    //Cetak JSON Data
  }

} //END of CLASS
