<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
      <?php
          $navigasi = array("dashboard" => "Beranda", "penilaian" => "Nilai Rata-rata", "nilai_akhir" => "Penilaian Akhir", "iterasi" => "Iterasi Nilai");

          $icon     = array("home","braille", "braille", "sort-numeric-asc");
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
