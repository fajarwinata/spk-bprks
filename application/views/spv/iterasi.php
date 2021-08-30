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
									<h3><i class="fa fa-user-secret"></i> Iterasi K-Means</h3>
									Data Agen berikut berada dalam wilayah Supervisi dilakukan proses iterasi untuk mengetahui masing-masing centroid data.
                </div>

								<div class="card-body">
									<div class="table-responsive">
                    <input type="hidden" id="idspv" value="<?= base64_encode(substr($this->session->userdata("sess_id"), 0, 5)) ?>">
                    <table id="tbl_iterasi" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="20%" rowspan="2">Kode Agen</th>
                          <th width="30%" rowspan="2">Nama Agen</th>
                          <th width="10%" rowspan="2">Jumlah Nasabah</th>
                          <th width="10%" rowspan="2">Jumlah Approve</th>
                          <th width="10%" rowspan="2">Jumlah Cashflow</th>
                          <th width="10%" colspan="3">Centroid 1</th>
                          <th width="10%" colspan="3">Centroid 2</th>
                          <th width="10%" colspan="3">Centroid 3</th>
                          <th width="10%" rowspan="2">C1</th>
                          <th width="10%" rowspan="2">C2</th>
                          <th width="10%" rowspan="2">C3</th>
                        </tr>
                        <tr>
                          <th>81</th>
                          <th>65</th>
                          <th>65</th>
                          <th>65</th>
                          <th>81</th>
                          <th>65</th>
                          <th>65</th>
                          <th>65</th>
                          <th>81</th>
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
