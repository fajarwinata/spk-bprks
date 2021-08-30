<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
      <?php

      $navigasi = array("dashboard" => "Beranda", "data-" => "Informasi Referensi", "variabel-" => "Kinerja &amp; Rekomendasi", "penilaian" => "Kinerja Agen");
      $sub_nav  = array("data-" => array("data_nasabah" => "Data Nasabah", "data_agen" => "Data Agen", "data_supervisi" => "Data Supervisi", "data_layanan" => "Data Layanan"),
                        "variabel-" => array("variabel_nasabah" => "Jumlah Nasabah", "variabel_layanan" => "Jumlah Penyaluran Dana", "variabel_pembayaran" => "Jumlah Nasabah Membayar")
                      );
      $icon     = array("home","list-alt","sliders", "connectdevelop");

          $no       = 0;
          foreach ($navigasi as $key => $value) {
            $getlink = str_replace("-", "", $key);
            $cut_url = substr(base64_decode($this->input->get("p")), 0, strlen($getlink));
            ($getlink == $cut_url) ? $active = "active" : $active = "";
            echo "<li class=\"submenu\">";
            if(strpos($key, "-") == true){
              echo "<a class=\"$active\" href=\"#\"><i class=\"fa fa-fw fa-".$icon[$no]."\"></i><span> $value </span> <span class=\"menu-arrow\"></span></a>";
              echo "<ul class=\"list-unstyled\">";
              foreach ($sub_nav[$key] as $key => $value) {
                    echo "<li class=\"$active\"><a href=\"?p=".base64_encode($key)."\">$value</a></li>";
                  }
              echo "</ul>";
            } else
              echo "<a class=\"$active\" href=\"?p=".base64_encode($key)."\"><i class=\"fa fa-fw fa-".$icon[$no]."\"></i><span> $value </span> </a>";

            echo "</li>";
            $no++;
          }
       ?>
      </ul>

      <div class="clearfix"></div>

    </div>
    <div class="clearfix"></div>
  </div>
</div>
