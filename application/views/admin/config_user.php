<div class="content-page">
    <div class="content">

  <div class="container-fluid">

        <div class="row">
              <div class="col-xl-12">
                  <div class="breadcrumb-holder">
                      <h1 class="main-title float-left">Konfigurasi Pengguna Sistem</h1>
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
									<h3><i class="fa fa-user"></i> Pengguna Sistem</h3>
									Data Pengguna sistem merupakan data yang digunakan dalam mengatur pengguna dalam suatu sistem.
                  <button id="new_user" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Pengguna</button>
                </div>

								<div class="card-body">
									<div class="table-responsive">
                    <table id="tbl_user" class="table table-striped">
                      <thead>
                        <tr>
                          <th width="10%">Kode Pengguna</th>
                          <th width="20%">Username</th>
                          <th width="30%">Nama Lengkap</th>
                          <th width="20%">Level</th>
                          <th width="10%">Password</th>
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
                <label for="exampleInputEmail1">Kode Pengguna</label>
                <input type="text" class="form-control" id="kode" placeholder="Kode Pengguna" readonly>
                <small id="msg_kode" class="form-text text-muted">Kode Pengguna Dibuat oleh sistem</small>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="nama" placeholder="Username Tanpa spasi">
                <small id="msg_nama" class="form-text text-danger"></small>
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Level Akses</label>
                <select type="text" class="form-control" id="level" style="width:100%">
                  <option></option>
                </select>

                <label for="spv" id="lab_spv"></label>
                <div id="spv_select"></div>

              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukan Password Baru">
                <input type="hidden" class="form-control" id="password_hd" value="$2y$10$AElJ9nKyT0MbQa0X6R6ttuWuGGCROhtrZaYzMdvAaR83qdaQ6XK5u">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukan Nama Lengkap">
              </div>
              <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Status</label>
                <select class="form-control" id="status">
                  <option value="Y">Aktif</option>
                  <option value="N">Non-Aktif</option>
                </select>
              </div>

            </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="state" val="">
        <button id="simpan_user" type="button" class="btn btn-primary" >Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
