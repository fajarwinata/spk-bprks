<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Konfigurasi Supervisi</h1>
                      <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Konfigurasi</li>
                      </ol>
                      <div class="clearfix"></div>
                  </div>
              </div>
        </div>


        <div class="row">

						<div class="col-md-12">
							<div class="card mb-3">
								<div class="card-header">
									<h3><i class="fa fa-user-secret"></i> Data Supervisi</h3>
									Data Supervisi merupakan data konfigurasi yang akan digunakan untuk menentukan kelompok agen layanan.
                  <button id="new_supervisi" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Supervisi</button>
                </div>

								<div class="card-body">
									<div class="table-responsive">
                    <table id="tbl_supervisi" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Kode Supervisi</th>
                          <th>Nama Supervisi</th>
                          <th width="20%">Status</th>
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
                <label for="exampleInputEmail1">Kode Supervisi</label>
                <input type="text" class="form-control" id="kode" placeholder="Kode Supervisi" readonly>
                <small id="msg_kode" class="form-text text-muted">Kode Supervisi Dibuat oleh sistem</small>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" id="status">
                  <option value="Y">Aktif</option>
                  <option value="N">Non-Aktif</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Nama Supervisi</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama Supervisi">
              </div>

            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="state" val="">
        <button id="simpan_supervisi" type="button" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
