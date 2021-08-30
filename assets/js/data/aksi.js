var origin = location.origin+"/spk/sltbprks/";

//SIMPAN INSERT DAN UPDATE NASABAH
$("#simpan").click(function(){
  var data1 = $("#kode").val();
  var data2 = $("#nama").val();
  var data3 = $("#jk").val();
  var data4 = $("#status").val();
  var data5 = $("#usia").val();
  var data6 = $("#state").val();

  $.ajax({
    url:origin+"Aksi/nasabah_"+data6,
    data: {kode:data1,nama:data2,jk:data3,status:data4,usia:data5},
    method:"post",
    dataType: "json",
    success: function(res){
      var icon;
      if(res.status == "1")
        icon = "success";
      else
        icon = "error";

        swal({
            title: res.judul,
            text: res.msg,
            icon: icon,
          }).then(function(){
            location.reload()
          });
    }
  });
});

//NEW
$("#new").click(function(){
  $("#state").val("insert");
  $("#modal").modal("show");
  $("#judul_modal").html("Tambah Data Baru");
  $("#deskripsi_modal").html("<select class=\"form-control\" style=\"width:100%\" id=\"agen\"><option></option></select>");
  //Menampilkan data ke Select Box
  $("#agen").select2({
      placeholder:"Pilih Agen",
      ajax: {
        url: origin+'Datareferensi/data_agen_select',
        dataType: 'json',
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      }
    });
    $("#agen").on("change", function(){
      $.ajax({
        url: origin+"Datareferensi/request_new?q=nasabah",
        data: {id:$("#agen").val()},
        method: "post",
        dataType: "json",
        success: function(res){
          $("#kode").val(res.newid);
          $("#simpan").removeAttr("disabled");
        }
      });
    });
});

//SIMPAN INSERT DAN UPDATE AGEN
$("#simpan_agen").click(function(){
  var data1 = $("#kode").val();
  var data2 = $("#nama").val();
  var data3 = $("#status").val();
  var data4 = $("#state").val();

  $.ajax({
    url:origin+"Aksi/agen_"+data4,
    data: {kode:data1,nama:data2,status:data3},
    method:"post",
    dataType: "json",
    success: function(res){
      var icon;
      if(res.status == "1")
        icon = "success";
      else
        icon = "error";

        swal({
            title: res.judul,
            text: res.msg,
            icon: icon,
          }).then(function(){
            location.reload()
          });
    }
  });
});

  //NEW AGEN
  $("#new_agen").click(function(){

    $("#state").val("insert");
    $("#modal").modal("show");
    $("#judul_modal").html("Tambah Data Baru");
    $("#deskripsi_modal").html("<select class=\"form-control\" style=\"width:100%\" id=\"supervisi\"><option></option></select>");
    //Menampilkan data ke Select Box
    $("#supervisi").select2({
        placeholder:"Pilih Supervisi",
        ajax: {
          url: origin+'Config/data_supervisi_select',
          dataType: 'json',
          // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
      });
    //Menampilkan data ke Select Box
      $("#supervisi").on("change", function(){
        $.ajax({
          url: origin+"Datareferensi/request_new?q=agen",
          data: {id:$("#supervisi").val()},
          method: "post",
          dataType: "json",
          success: function(res){
            $("#kode").val(res.newid);
          }
        });
      });

  });

  //SIMPAN INSERT DAN UPDATE LAYANAN
  $("#simpan_layanan").click(function(){
    var data1 = $("#kode").val();
    var data2 = $("#nama").val();
    var data3 = $("#catatan").val();
    var data4 = $("#state").val();

    $.ajax({
      url:origin+"Aksi/layanan_"+data4,
      data: {kode:data1,nama:data2,catatan:data3},
      method:"post",
      dataType: "json",
      success: function(res){
        var icon;
        if(res.status == "1")
          icon = "success";
        else
          icon = "error";

          swal({
              title: res.judul,
              text: res.msg,
              icon: icon,
            }).then(function(){
              location.reload()
            });
      }
    });
  });

  //NEW LAYANAN
  $("#new_layanan").click(function(){

    $("#state").val("insert");
    $("#modal").modal("show");
    $("#judul_modal").html("Tambah Data Baru");
    $("#deskripsi_modal").html("Tambah Data Layanan");

        $.ajax({
          url: origin+"Datareferensi/request_new?q=layanan",
          dataType: "json",
          success: function(res){
            $("#kode").val(res.newid);
          }
        });

  });

  //SIMPAN INSERT DAN UPDATE KRITERIA
  $("#simpan_kriteria").click(function(){
    var data1 = $("#kode").val();
    var data2 = $("#nama").val();
    var data3 = $("#catatan").val();
    var data4 = $("#state").val();

    $.ajax({
      url:origin+"Aksi/kriteria_"+data4,
      data: {kode:data1,nama:data2,catatan:data3},
      method:"post",
      dataType: "json",
      success: function(res){
        var icon;
        if(res.status == "1")
          icon = "success";
        else
          icon = "error";

          swal({
              title: res.judul,
              text: res.msg,
              icon: icon,
            }).then(function(){
              location.reload()
            });
      }
    });
  });

  //NEW KRITERIA
  $("#new_kriteria").click(function(){
    $("#simpan_kriteria").attr("disabled","disabled");
    $("#state").val("insert");
    $("#modal").modal("show");
    $("#judul_modal").html("Tambah Data Baru");
    $("#deskripsi_modal").html("<select class=\"form-control\" style=\"width:100%\" id=\"layanan\"><option></option></select>");
    //Menampilkan data ke Select Box
    $("#layanan").select2({
        placeholder:"Pilih Layanan",
        ajax: {
          url: origin+'Datareferensi/data_layanan_select',
          dataType: 'json',
          // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        }
      });
      $("#layanan").on("change", function(){
        $.ajax({
          url: origin+"Datareferensi/request_new?q=kriteria",
          data: {id:$("#layanan").val()},
          method: "post",
          dataType: "json",
          success: function(res){
            $("#kode").val(res.newid);
            $("#simpan_kriteria").removeAttr("disabled");
          }
        });
      });
  });

  //SIMPAN INSERT DAN UPDATE TAHUN
  $("#simpan_tahun").click(function(){
    var data1 = $("#kode").val();
    var data2 = $("#nama").val();
    var data3 = $("#catatan").val();
    var data4 = $("#state").val();

    $.ajax({
      url:origin+"Aksi/tahun_"+data4,
      data: {kode:data1,nama:data2,catatan:data3},
      method:"post",
      dataType: "json",
      success: function(res){
        var icon;
        if(res.status == "1")
          icon = "success";
        else
          icon = "error";

          swal({
              title: res.judul,
              text: res.msg,
              icon: icon,
            }).then(function(){
              location.reload()
            });
      }
    });
  });

  //NEW TAHUN
  $("#new_tahun").click(function(){

    $("#state").val("insert");
    $("#modal").modal("show");
    $("#judul_modal").html("Tambah Data Baru");
    $("#deskripsi_modal").html("Penambahan Data Tahun harus sesuai dengan pengkalenderan masehi");
    //Menampilkan data ke Select Box

      $("#kode").on("keyup", function(){
        var tahun = $("#kode").val();
        var intRegex = /^\d+$/;

        if($("#kode").val().length > 0 && intRegex.test($("#kode").val())){

          $("#simpan_tahun").removeAttr("disabled");
          $("#kode").removeClass("is-invalid");

          $.ajax({
            url: origin+"Datareferensi/request_new?q=tahun",
            data: {id:tahun},
            method: "post",
            dataType: "json",
            success: function(res){
              if(res.newid == "1"){
                $("#simpan_tahun").removeAttr("disabled");
                $("#kode").removeClass("is-invalid");
                $("#msg_kode").html("");
              } else {
                $("#simpan_tahun").attr("disabled", "disabled");
                $("#kode").addClass("is-invalid");
                $("#msg_kode").html("Tahun sudah digunakan");
              }
            }
          });


          //Pengecekan Kabisat
          if (tahun%400 == 0){
              $("#nama").val("Tahun Kabisat");
              $("#catatan").html("Jumlah hari adalah: 365 Hari");
          }else if(tahun%100 == 0){
            $("#nama").val("Bukan Tahun Kabisat");
            $("#catatan").html("Jumlah hari adalah: 366 Hari");
          }else if(tahun%4 == 0){
              $("#nama").val("Tahun Kabisat");
              $("#catatan").html("Jumlah hari adalah: 365 Hari");
          }else{
              $("#nama").val("Bukan Tahun Kabisat");
              $("#catatan").html("Jumlah hari adalah: 366 Hari");
          }

        } else {
          $("#kode").addClass("is-invalid");
          $("#simpan_tahun").attr("disabled","disabled");
        }
      });
  });

  //SIMPAN INSERT DAN UPDATE USER
  $("#simpan_user").click(function(){
    var data1 = $("#kode").val();
    var data2 = $("#nama").val();
    var data3 = $("#password").val();
    var data4 = $("#level").val();
    var data5 = $("#nama_lengkap").val();
    var data6 = $("#status").val();
    var data7 = $("#state").val();
    var data8 = $("#password_hd").val();
    var data;

    if(data3.length == 0)
      data = {kode:data1,nama:data2,level:data4,nama_lengkap:data5,status:data6,pass_hd:data8};
      else
      data = {kode:data1,nama:data2,pass:data3,level:data4,nama_lengkap:data5,status:data6,pass_hd:data8};


    $.ajax({
      url:origin+"Aksi/user_"+data7,
      data: data,
      method:"post",
      dataType: "json",
      success: function(res){
        var icon;
        if(res.status == "1")
          icon = "success";
        else
          icon = "error";

          swal({
              title: res.judul,
              text: res.msg,
              icon: icon,
            }).then(function(){
              location.reload()
            });
      }
    });
  });

  //NEW USER
  //USER $check
  $("#nama").on("change", function(){
      $.ajax({
        url: origin+"Config/user_check?nama="+$("#nama").val(),
        dataType: "json",
        success: function(res){
          if(res.stat == "1"){
            $("#simpan_user").removeAttr("disabled");
            $("#msg_nama").html("");
            $("#nama").removeClass("is-invalid");
          } else{
            $("#msg_nama").html(res.pesan);
            $("#nama").addClass("is-invalid");
            $("#simpan_user").attr("disabled","disabled");
          }
        }
      });

  });

  $("#new_user").click(function(){
    $("#state").val("insert");
    $("#modal").modal("show");
    $("#nama").val("");
    $("#password").val("");
    $("#judul_modal").html("Tambah Data Baru");
    $("#deskripsi_modal").html("Penambahan Data Pengguna Sistem");

    $("#level").select2({
      placeholder:"Pilih Level Akses",
      ajax: {
        url: origin+'Config/data_level_select',
        dataType: 'json',
        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
      }
    });
    $("#level").on("change", function(){
      var spv;
      if($("#level").val() === "1"){
        $("#lab_spv").html("Pilih Supervisi");
        $("#spv_select").html("<select type=\"text\" class=\"form-control\" id=\"spv\" style=\"width:100%\"><option></option></select>")
        $("#spv").select2({
          placeholder:"Pilih Supervisi",
          ajax: {
            url: origin+'Config/data_supervisi_select',
            dataType: 'json',
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
          }
        });
        $("#spv").on("change", function(){
          $.ajax({
            url: origin+"Datareferensi/request_new?q=user_spv",
            dataType: "json",
            method: "post",
            data: {id:$("#spv").val()},
            success: function(res){
              $("#kode").val(res.newid);
            }
          });
        });

      } else {
        $("#spv_select").html("");
        $("#lab_spv").html("");

      }
    });
    $.ajax({
      url: origin+"Datareferensi/request_new?q=user",
      dataType: "json",
      success: function(res){
        $("#kode").val(res.newid);
      }
    });
  });

  //SIMPAN INSERT DAN UPDATE KRITERIA
  $("#simpan_supervisi").click(function(){
    var data1 = $("#kode").val();
    var data2 = $("#nama").val();
    var data3 = $("#status").val();
    var data4 = $("#state").val();

    $.ajax({
      url:origin+"Aksi/supervisi_"+data4,
      data: {kode:data1,nama:data2,status:data3},
      method:"post",
      dataType: "json",
      success: function(res){
        var icon;
        if(res.status == "1")
          icon = "success";
        else
          icon = "error";

          swal({
              title: res.judul,
              text: res.msg,
              icon: icon,
            }).then(function(){
              location.reload()
            });
      }
    });
  });

  //NEW SUPERVISI
  $("#new_supervisi").click(function(){
    $("#simpan_supervisi").attr("disabled","disabled");
    $("#state").val("insert");
    $("#modal").modal("show");
    $("#judul_modal").html("Tambah Data Baru");
    $("#deskripsi_modal").html("Tambah Data Supervisi");
    //Menampilkan data ke Select Box

        $.ajax({
          url: origin+"Datareferensi/request_new?q=spv",
          method: "post",
          dataType: "json",
          success: function(res){
            $("#kode").val(res.newid);
            $("#simpan_supervisi").removeAttr("disabled");
          }
        });
  });
