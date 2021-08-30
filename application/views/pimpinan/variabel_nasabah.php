<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Jumlah Nasabah</h1>
                      <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Data Variabel</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>
        </div>


        <div class="row">

						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-address-card"></i> Jumlah Nasabah</h3>
									Data Variabel Jumlah Nasabah dihitung berdasarkan jumlah nasabah dalam suatu agen.
                  <?php $total_nasabah = $this->mvariabel->nasabah_loop()->num_rows(); ?>
                  <button class="btn btn-outline-primary pull-right"><i class="fa fa-users"></i> Total Nasabah: <?= $total_nasabah ?> Orang</button>
                </div>
								<div class="card-body row p-5">
                  <?php
                    $agen = $this->mvariabel->agen_loop();
                    if($agen->num_rows() > 0){
                      foreach ($agen->result() as $agen):
                        $jml_nasabah = $this->mvariabel->nasabah_jumlah($agen->kode_agen)->num_rows();
                        ($jml_nasabah == 0) ? $jmlh = 1 : $jmlh = $jml_nasabah;
                        $target_up        = ceil($jmlh*1.8);
                        $target_min       = round($jmlh*1.8);
                        ($agen->status == "A") ?
                            $status = "<div class=\"btn btn-primary btn-sm pull-right\" role=\"alert\"><i class=\"fa fa-check\"></i> Aktif</div>" :
                            $status = "<div class=\"btn btn-danger btn-sm pull-right\" role=\"alert\"><i class=\"fa fa-close\"></i> Tidak Aktif</div>" ;
                        echo "
                        <div class=\"card border-primary m-2\" style=\"width: 19rem;\">
                          <div class=\"card-header\"><i class=\"fa fa-user-secret\"></i> Agen: ".$agen->nama_agen."</div>
                          <div class=\"card-body text-primary\">
                          <h6 class=\"card-title\">Informasi: $status</h6>
                          <p class=\"card-text\">
                            <table width=\"100%\"class=\"table table-striped\">
                              <tr>
                                <td width=\"40%\">Kode Agen</td>
                                <td width=\"10%\">:</td>
                                <td width=\"50%\">".$agen->kode_agen."</td>
                              </tr>
                              <tr>
                              <td width=\"40%\">Nasabah</td>
                              <td width=\"10%\">:</td>
                              <td width=\"50%\">".$jml_nasabah." Orang</td>
                              </tr>
                              <tr>
                                <td width=\"40%\">Next-Target</td>
                                <td width=\"10%\">:</td>
                                <td width=\"50%\" class=\"bg-warning text-white\"> ".$target_min." sd. ".$target_up." Orang</td>
                              </tr>
                            </table>
                          </p>
                          </div>
                        </div>
                        ";
                      endforeach;
                    } else {
                      echo "
                      <div class=\"alert alert-warning\" role=\"alert\">
								               <h4 class=\"alert-heading\">Data Agen Tidak Ditemukan!</h4>
								                 <p>Data Agen tidak ditemukan periksa pengaturan data referensi kamu!.</p>
								               <hr>
								                <p class=\"mb-0\">Jika Data Referensi bermasalah, maka akan mempengaruhi perhitungan pada data variabel.</p>
								      </div>";
                    }
                  ?>

                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
