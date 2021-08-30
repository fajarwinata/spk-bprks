<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Konfigurasi Tahun</h1>
                      <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Konfigurasi Sistem</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>
        </div>


        <div class="row">

						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-dropbox"></i> Konfigurasi Tahun</h3>
									Data Tahun merupakan data pendukung dalam melakukan validitas sebuah layanan <br>dan menentukan tingkat kelayakan suatu layanan.
                  <button id="new_tahun" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Tahun</button>
                </div>

								<div class="card-body">
									<div class="table-responsive">
                    <table id="tbl_tahun" class="table table-striped">
                      <thead>
                        <tr>
                          <th width="10%">Tahun</th>
                          <th>Jenis-Tahun</th>
                          <th width="30%">Catatan</th>
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
        <h5 class="modal-title" id="judul_modal">...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="deskripsi_modal">

        </div>
        <!-- Data Nasabah -->
            <div class="row">
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Tahun</label>
                <input type="text" class="form-control is-invalid" id="kode" placeholder="Tahun" >
                <small id="msg_kode" class="form-text text-danger"></small>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Jenis Tahun</label>
                <input type="text" class="form-control" id="nama" placeholder="Kriteria Tahun" readonly>
                <small class="form-text text-muted">Kriteria Tahun ditentukan oleh sistem</small>
              </div>
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Catatan</label>
                <textarea class="form-control col-md-12" id="catatan"></textarea>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="state" val="">
        <button id="simpan_tahun" type="button" class="btn btn-primary" disabled>Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
