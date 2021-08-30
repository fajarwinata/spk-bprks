<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Jumlah Dana Terbayarkan</h1>
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
									<h3><i class="fa fa-address-card"></i> Jumlah Nasabah Membayar</h3>
									Data Variabel Jumlah nasabah yang sudah membayar cicilan dihitung berdasarkan <br>jumlah dana yang sudah diterima dalam suatu agen.
                  <?php
                  $total_nasabah  = $this->mvariabel->nasabah_pembayaran()->result();
                  $nominal        = 0;
                  foreach ($total_nasabah as $nom) {
                    $nominal += $nom->jmlh_cicilan;
                  }

                  $total_nasabah  = $this->mvariabel->nasabah_pembayaran_loop()->num_rows();
                  ?>
                </div>
                <div class="ml-3 pr-4 row">
                <div class="alert alert-primary col-md-4" role="alert">
                  <h5 class="ml-3"><i class="fa fa-money"></i> Total Pembayaran Dana:</h5>
                  <h4 class="ml-3"><?= $total_nasabah ?> Orang</h4>
                </div>
                <div class="alert alert-secondary col-md-8" role="alert">
                  <h5 class="ml-3"><i class="fa fa-money"></i> Total Dana Terbayar:</h5>
                  <h4 class="ml-3">Rp. <?= rupiah($nominal) ?></h4>
                </div>
              </div>
								<div class="card-body row p-5">
                  <?php
                    $agen = $this->mvariabel->agen_loop();
                    if($agen->num_rows() > 0){
                      foreach ($agen->result() as $agen):
                        $jml_nasabah    = $this->mvariabel->nasabah_jumlah_pembayaran($agen->kode_agen)->num_rows();
                        $jml_pengajuan  = $this->mvariabel->nasabah_jumlah_pengajuan($agen->kode_agen)->num_rows();
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
                                <td width=\"40%\">App Cair</td>
                                <td width=\"10%\">:</td>
                                <td width=\"50%\">".$jml_pengajuan." Orang</td>
                              </tr>
                              <tr>
                                <td width=\"40%\">Membayar</td>
                                <td width=\"10%\">:</td>
                                <td width=\"50%\">".$jml_nasabah." Orang</td>
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
