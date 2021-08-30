var origin = location.origin+"/spk/sltbprks/";
$(document).ready(function(){

  var table = $('#tbl_nasabah').DataTable( {
      ajax: origin+"Datareferensi/data_nasabah",
        select: true
    } );

    table
        .on( 'select', function ( e, dt, type, indexes ) {
            var rowData = table.rows( indexes ).data().toArray();
            swal({
                title: "Apa yang anda inginkan?",
                text: "Pilih satu aksi yang kamu inginkan",
                icon: "warning",
                buttons: ["Ubah Data", "Hapus"],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {

                  $.ajax({
                    url:origin+"Aksi/nasabah_delete",
                    method:'post',
                    data: {id:rowData[0][0]},
                    dataType: "json",
                    success: function(res){
                      var ikon;
                      (res.status == "1")? ikon = "success" : ikon = "error";
                        swal({
                          title: res.judul,
                          text: res.msg,
                          icon: ikon,
                        }).then(function(){
                          location.reload()
                        });
                    }

                  });
                } else {
                  $("#modal").modal("show");
                  $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                  $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                  //Isikan Data melalui server
                    $.ajax({
                      url:origin+"Datareferensi/data_nasabah_detail",
                      method:'post',
                      data: {id:rowData[0][0]},
                      dataType: "json",
                      success: function(res){
                        if(res.status == "1"){
                          $("#kode").val(res.kode);
                          $("#nama").val(res.nama);
                          $("#jk").html(res.jk);
                          $("#status").html(res.sts);
                          $("#usia").val(res.usia);
                          $("#state").val("update");
                        } else
                          swal(res.msg);
                      }

                    });
                }
              });
              $("#new").attr("disabled","disabled");

        } )
        .on( 'deselect', function ( e, dt, type, indexes ) {
          $("#new").removeAttr("disabled");
          $("#kode").val("");
          $("#nama").val("");
          $("#usia").val("");
          $("#state").val("");
        } );


  var table_agen = $('#tbl_agen').DataTable( {
      ajax: origin+"Datareferensi/data_agen",
        select: true
    } );

    table_agen
        .on( 'select', function ( e, dt, type, indexes ) {
            var rowData = table_agen.rows( indexes ).data().toArray();
            swal({
                title: "Apa yang anda inginkan?",
                text: "Pilih satu aksi yang kamu inginkan",
                icon: "warning",
                buttons: ["Ubah Data", "Hapus"],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {

                  $.ajax({
                    url:origin+"Aksi/agen_delete",
                    method:'post',
                    data: {id:rowData[0][0]},
                    dataType: "json",
                    success: function(res){
                      var ikon;
                      (res.status == "1")? ikon = "success" : ikon = "error";
                        swal({
                          title: res.judul,
                          text: res.msg,
                          icon: ikon,
                        }).then(function(){
                          location.reload()
                        });
                    }

                  });
                } else {
                  $("#modal").modal("show");
                  $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                  $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                  //Isikan Data melalui server
                    $.ajax({
                      url:origin+"Datareferensi/data_agen_detail",
                      method:'post',
                      data: {id:rowData[0][0]},
                      dataType: "json",
                      success: function(res){
                        if(res.status == "1"){
                          $("#kode").val(res.kode);
                          $("#nama").val(res.nama);
                          $("#status").html(res.sts);
                          $("#state").val("update");
                        } else
                          swal(res.msg);
                      }

                    });
                }
              });
              $("#new_agen").attr("disabled","disabled");

        } )
        .on( 'deselect', function ( e, dt, type, indexes ) {
          $("#new_agen").removeAttr("disabled");
          $("#kode").val("");
          $("#nama").val("");
          $("#state").val("");
        } );

        //Layanan
  var table_layanan = $('#tbl_layanan').DataTable( {
      ajax: origin+"Datareferensi/data_layanan",
        select: true
    } );

    table_layanan
        .on( 'select', function ( e, dt, type, indexes ) {
            var rowData = table_layanan.rows( indexes ).data().toArray();
            swal({
                title: "Apa yang anda inginkan?",
                text: "Pilih satu aksi yang kamu inginkan",
                icon: "warning",
                buttons: ["Ubah Data", "Hapus"],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {

                  $.ajax({
                    url:origin+"Aksi/layanan_delete",
                    method:'post',
                    data: {id:rowData[0][0]},
                    dataType: "json",
                    success: function(res){
                      var ikon;
                      (res.status == "1")? ikon = "success" : ikon = "error";
                        swal({
                          title: res.judul,
                          text: res.msg,
                          icon: ikon,
                        }).then(function(){
                          location.reload()
                        });
                    }

                  });
                } else {
                  $("#modal").modal("show");
                  $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                  $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                  //Isikan Data melalui server
                    $.ajax({
                      url:origin+"Datareferensi/data_layanan_detail",
                      method:'post',
                      data: {id:rowData[0][0]},
                      dataType: "json",
                      success: function(res){
                        if(res.status == "1"){
                          $("#kode").val(res.kode);
                          $("#nama").val(res.nama);
                          $("#catatan").html(res.catatan);
                          $("#state").val("update");
                        } else
                          swal(res.msg);
                      }

                    });
                }
              });
              $("#new_layanan").attr("disabled","disabled");
        } )
        .on( 'deselect', function ( e, dt, type, indexes ) {
          $("#new_layanan").removeAttr("disabled");
          $("#kode").val("");
          $("#nama").val("");
          $("#catatan").html("");
          $("#state").val("");
        } );

        //Kriteria
        var table_kriteria = $('#tbl_kriteria').DataTable( {
            ajax: origin+"Config/data_kriteria",
              select: true
          } );

          table_kriteria
              .on( 'select', function ( e, dt, type, indexes ) {
                  var rowData = table_kriteria.rows( indexes ).data().toArray();
                  swal({
                      title: "Apa yang anda inginkan?",
                      text: "Pilih satu aksi yang kamu inginkan",
                      icon: "warning",
                      buttons: ["Ubah Data", "Hapus"],
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {

                        $.ajax({
                          url:origin+"Aksi/kriteria_delete",
                          method:'post',
                          data: {id:rowData[0][0]},
                          dataType: "json",
                          success: function(res){
                            var ikon;
                            (res.status == "1")? ikon = "success" : ikon = "error";
                              swal({
                                title: res.judul,
                                text: res.msg,
                                icon: ikon,
                              }).then(function(){
                                location.reload()
                              });
                          }

                        });
                      } else {
                        $("#modal").modal("show");
                        $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                        $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                        //Isikan Data melalui server
                          $.ajax({
                            url:origin+"Config/data_kriteria_detail",
                            method:'post',
                            data: {id:rowData[0][0]},
                            dataType: "json",
                            success: function(res){
                              if(res.status == "1"){
                                $("#simpan_kriteria").removeAttr("disabled");
                                $("#kode").val(res.kode);
                                $("#nama").val(res.nama);
                                $("#catatan").html(res.catatan);
                                $("#state").val("update");
                              } else
                                swal(res.msg);
                            }

                          });
                      }
                    });
                    $("#new_kriteria").attr("disabled","disabled");
              } )
              .on( 'deselect', function ( e, dt, type, indexes ) {
                $("#new_kriteria").removeAttr("disabled");
                $("#kode").val("");
                $("#nama").val("");
                $("#catatan").html("");
                $("#state").val("");
              } );

        //Tahun
        var table_tahun = $('#tbl_tahun').DataTable( {
            ajax: origin+"Config/data_tahun",
              select: true
          } );

          table_tahun
              .on( 'select', function ( e, dt, type, indexes ) {
                  var rowData = table_tahun.rows( indexes ).data().toArray();
                  swal({
                      title: "Apa yang anda inginkan?",
                      text: "Pilih satu aksi yang kamu inginkan",
                      icon: "warning",
                      buttons: ["Ubah Data", "Hapus"],
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {

                        $.ajax({
                          url:origin+"Aksi/tahun_delete",
                          method:'post',
                          data: {id:rowData[0][0]},
                          dataType: "json",
                          success: function(res){
                            var ikon;
                            (res.status == "1")? ikon = "success" : ikon = "error";
                              swal({
                                title: res.judul,
                                text: res.msg,
                                icon: ikon,
                              }).then(function(){
                                location.reload()
                              });
                          }

                        });
                      } else {
                        $("#modal").modal("show");
                        $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                        $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                        //Isikan Data melalui server
                          $.ajax({
                            url:origin+"Config/data_tahun_detail",
                            method:'post',
                            data: {id:rowData[0][0]},
                            dataType: "json",
                            success: function(res){
                              if(res.status == "1"){
                                //Ubah Pengaturan
                                $("#kode").attr("readonly","readonly");
                                $("#kode").removeClass("is-invalid");
                                $("#simpan_tahun").removeAttr("disabled");
                                //Ubah Pengaturan

                                $("#kode").val(res.kode);
                                $("#nama").val(res.nama);
                                $("#catatan").html(res.catatan);
                                $("#state").val("update");
                              } else
                                swal(res.msg);
                            }

                          });
                      }
                    });
                    $("#new_tahun").attr("disabled","disabled");
              } )
              .on( 'deselect', function ( e, dt, type, indexes ) {
                $("#new_tahun").removeAttr("disabled");
                $("#simpan_tahun").attr("disabled","disabled");
                $("#kode").addClass("is-invalid");
                $("#kode").removeAttr("readonly");
                $("#kode").val("");
                $("#nama").val("");
                $("#catatan").html("");
                $("#state").val("");
              } );

        //Tahun
        var table_user = $('#tbl_user').DataTable( {
            ajax: origin+"Config/data_user",
              select: true
          } );

          table_user
              .on( 'select', function ( e, dt, type, indexes ) {
                  var rowData = table_user.rows( indexes ).data().toArray();
                  swal({
                      title: "Apa yang anda inginkan?",
                      text: "Pilih satu aksi yang kamu inginkan",
                      icon: "warning",
                      buttons: ["Ubah Data", "Hapus"],
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {

                        $.ajax({
                          url:origin+"Aksi/user_delete",
                          method:'post',
                          data: {id:rowData[0][0]},
                          dataType: "json",
                          success: function(res){
                            var ikon;
                            (res.status == "1")? ikon = "success" : ikon = "error";
                              swal({
                                title: res.judul,
                                text: res.msg,
                                icon: ikon,
                              }).then(function(){
                                location.reload()
                              });
                          }

                        });
                      } else {
                        $("#modal").modal("show");
                        $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                        $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                        $("#nama").removeClass("is-invalid");
                        $("#msg_nama").html("");
                        $("#simpan_user").removeAttr("disabled");
                        //Isikan Data melalui server
                          $.ajax({
                            url:origin+"Config/data_user_detail",
                            method:'post',
                            data: {id:rowData[0][0]},
                            dataType: "json",
                            success: function(res){
                              if(res.status == "1"){
                                $("#kode").val(res.kode);
                                $("#nama").val(res.nama);
                                $("#password").val("");
                                $("#password_hd").val(res.password);
                                $("#level").html(res.level);
                                $("#nama_lengkap").val(res.nama_lengkap);
                                $("#status").html(res.sts_user);
                                $("#state").val("update");
                              } else
                                swal(res.msg);
                            }

                          });
                      }
                    });
                    $("#new_user").attr("disabled","disabled");
              } )
              .on( 'deselect', function ( e, dt, type, indexes ) {
                $("#new_user").removeAttr("disabled");
                $("#nama").val("");
                $("#catatan").html("");
                $("#state").val("");
              } );

        var table_supervisi = $('#tbl_supervisi').DataTable( {
            ajax: origin+"Config/data_supervisi",
              select: true
          } );

          table_supervisi
              .on( 'select', function ( e, dt, type, indexes ) {
                  var rowData = table_supervisi.rows( indexes ).data().toArray();
                  swal({
                      title: "Apa yang anda inginkan?",
                      text: "Pilih satu aksi yang kamu inginkan",
                      icon: "warning",
                      buttons: ["Ubah Data", "Hapus"],
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {

                        $.ajax({
                          url:origin+"Aksi/supervisi_delete",
                          method:'post',
                          data: {id:rowData[0][0]},
                          dataType: "json",
                          success: function(res){
                            var ikon;
                            (res.status == "1")? ikon = "success" : ikon = "error";
                              swal({
                                title: res.judul,
                                text: res.msg,
                                icon: ikon,
                              }).then(function(){
                                location.reload()
                              });
                          }

                        });
                      } else {
                        $("#modal").modal("show");
                        $("#judul_modal").html("Ubah Data "+rowData[0][0]);
                        $("#deskripsi_modal").html("<i class='fa fa-edit'></i> Kamu akan melakukan perubahan data dibawah ini<br><hr>");
                        //Isikan Data melalui server
                          $.ajax({
                            url:origin+"Config/data_supervisi_detail",
                            method:'post',
                            data: {id:rowData[0][0]},
                            dataType: "json",
                            success: function(res){
                              if(res.status == "1"){
                                $("#kode").val(res.kode);
                                $("#nama").val(res.nama);
                                $("#status").html(res.sts);
                                $("#state").val("update");
                              } else
                                swal(res.msg);
                            }

                          });
                      }
                    });
                    $("#new_supervisi").attr("disabled","disabled");

              } )
              .on( 'deselect', function ( e, dt, type, indexes ) {
                $("#new_supervisi").removeAttr("disabled");
                $("#kode").val("");
                $("#nama").val("");
                $("#state").val("");
              } );

      //======================= Data Manipulasi ===============================//
      //Rata-rata agen
      var id_spv = $("#idspv").val();
      var table_penilaian = $('#tbl_penilaian').DataTable( {
          ajax: origin+"Manipulasi/nilai_agen?id="+id_spv
        } );

      //Nilai Akhir Agen
      var table_centroid = $('#tbl_centroid').DataTable( {
          ajax: origin+"Manipulasi/centroid_agen?id="+id_spv
        } );

      //Iterasi Pertama
      var table_centroid = $('#tbl_iterasi').DataTable( {
          ajax: origin+"Manipulasi/iterasi_agen?id="+id_spv,
          createdRow: function(row, data, dataIndex){
            $('td:eq(5)', row).attr('colspan', 3);
            $('td:eq(5)', row).addClass('text-center');
            $('td:eq(6)', row).attr('colspan', 3);
            $('td:eq(6)', row).addClass('text-center');
            $('td:eq(7)', row).attr('colspan', 3);
            $('td:eq(7)', row).addClass('text-center');
          },
          columns: [
            { "data": 0 },
            { "data": 1 },
            { "data": 2 },
            { "data": 3 },
            { "data": 4 },
            { "data": 5 },
            { "data": 6 },
            { "data": 7 },
            { "data": 8 },
            { "data": 9 },
            { "data": 10 }
        ],
        } );

        //Khusus PIMPINAN
        var table_agen_pim = $('#tbl_agen_pim').DataTable( {
            ajax: origin+"Datareferensi/data_agen"
          } );

        var table_pim = $('#tbl_nasabah_pim').DataTable( {
            ajax: origin+"Datareferensi/data_nasabah"
          } );

        var table_layanan_pim = $('#tbl_layanan_pim').DataTable( {
            ajax: origin+"Datareferensi/data_layanan"
          } );

        var table_supervisi_pim = $('#tbl_supervisi_pim').DataTable( {
            ajax: origin+"Config/data_supervisi"
          } );

        //Nilai Akhir Agen
        var table_centroid_pim = $('#tbl_centroid_pim').DataTable( {
            ajax: origin+"Manipulasi/centroid_agen_all"
          } );
        //Khusus PIMPINAN

});
