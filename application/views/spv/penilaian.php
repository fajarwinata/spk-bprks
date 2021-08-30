<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Data Nilai Rata-rata Agen</h1>
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
									<h3><i class="fa fa-user-secret"></i> Penilaian Agen</h3>
									Data Agen berikut berada dalam wilayah Supervisi dinilai berdasarkan tiga variabel yang menentukan nilai rata-rata capaian masing-masing agen.
                </div>

								<div class="card-body">
									<div class="table-responsive">
                    <input type="hidden" id="idspv" value="<?= base64_encode(substr($this->session->userdata("sess_id"), 0, 5)) ?>">
                    <table id="tbl_penilaian" class="table table-striped">
                      <thead>
                        <tr>
                          <th width="20%">Kode Agen</th>
                          <th width="30%">Nama Agen</th>
                          <th width="10%">Jumlah Nasabah</th>
                          <th width="10%">Jumlah Approve</th>
                          <th width="10%">Jumlah Cashflow</th>
                          <th width="10%">Nilai Rata-rata</th>
                          <th width="10%">Status</th>
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
