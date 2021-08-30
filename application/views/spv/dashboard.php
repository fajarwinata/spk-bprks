<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Dashboard</h1>
                      <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>
        </div>
        <!-- end row -->
        <?php
        $kode_spv      = substr($this->session->userdata("sess_id"), 0, 5);
        $jml_agen       = $this->mdata->agen_spv($kode_spv)->num_rows();
        $jml_nasabah    = $this->mvariabel->nasabah_jumlah($kode_spv)->num_rows();
        $jml_penyaluran = $this->mvariabel->nasabah_jumlah_pengajuan($kode_spv)->num_rows();
        $jml_penolakan  = $this->mvariabel->nasabah_jumlah_penolakan($kode_spv)->num_rows();
        ?>

        <div class="alert alert-info" role="alert">
        <p><b>Sistem Pintar Pendukung Keputusan</b></a></p>
        <p>PT Sentra Layanan Terpadu: <b>(Grup BPRKS)</b>,
        Anda masuk kedama sistem sebagai Supervisi untuk melihat hasil atau penilaian dari tiap-tiap agen dibawah anda,
        anda memiliki agen sebanyak <?= $jml_agen ?> Agen.
        </p>
        </div>

          <div class="row">
              <div class="col-md-4">
                  <div class="card-box noradius noborder bg-default">
                      <i class="fa fa-file-text-o float-right text-white"></i>
                      <h6 class="text-white text-uppercase m-b-20">Jumlah Nasabah</h6>
                      <h1 class="m-b-20 text-white counter"><?= $jml_nasabah ?></h1>
                      <span class="text-white">Orang</span>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card-box noradius noborder bg-success">
                      <i class="fa fa-money float-right text-white"></i>
                      <h6 class="text-white text-uppercase m-b-20">Jumlah Pencairan</h6>
                      <h1 class="m-b-20 text-white counter"><?= $jml_penyaluran ?></h1>
                      <span class="text-white">Orang</span>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card-box noradius noborder bg-danger">
                      <i class="fa fa-close float-right text-white"></i>
                      <h6 class="text-white text-uppercase m-b-20">Jumlah Penolakan</h6>
                      <h1 class="m-b-20 text-white counter"><?= $jml_penolakan ?></h1>
                      <span class="text-white">Orang</span>
                  </div>
              </div>


          </div>
          <!-- end row -->



        </div>
  <!-- END container-fluid -->

</div>
<!-- END content -->

</div>
