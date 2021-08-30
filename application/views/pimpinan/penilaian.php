<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Penilaian Akhir Agen</h1>
                      <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Manipulasi Data</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>
        </div>


        <div class="row">

						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-user-secret"></i> Penilaian Agen (Final Scoring)</h3>
									Data Agen berikut berada dalam wilayah Supervisi dinilai berdasarkan tiga variabel dan 5 kluster dan dinilai berdasarkan<br> panjang data (interval sebesar 0 s. 100) capaian masing-masing agen.
                  <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modal"><i class="fa fa-book"></i> Panduan Predikat</button>
                </div>

								<div class="card-body">
									<div class="table-responsive">
                    <table id="tbl_centroid_pim" class="table table-striped">
                      <thead>
                        <tr>
                          <th width="20%" >Kode Agen</th>
                          <th width="30%" >Nama Agen</th>
                          <th width="10%" >Jumlah Nasabah</th>
                          <th width="10%" >Jumlah Approve</th>
                          <th width="10%" >Jumlah Cashflow</th>
                          <th width="10%" >Predikat</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>


<!-- Modal Ubah Data -->
<div class="modal fade" id="modal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judul_modal"><i class="fa fa-book"></i> Panduan Predikat Agen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Centroid</th>
              <th>Predikat</th>
              <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $data = array("super" => "96", "hebat" => "80", "cukup" => "64", "kurang" => "54", "buruk" => "26");
              $no   = 1;
              foreach ($data as $key => $value):
                echo "<tr>
                    <td>Centroid $no</td>
                    <td>".strtoupper($key)."</td>
                    <td>$value</td>
                </tr>";
                $no++;
              endforeach;
            ?>

          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
