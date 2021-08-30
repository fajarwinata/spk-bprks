<script src="assets/js/modernizr.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/moment.min.js"></script>

<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>

<script src="assets/js/method-get.js"></script>

<!-- App js -->
<script src="assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->

	<!-- Counter-Up-->
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

  <!-- Base64-->
  <script src="assets/plugins/base64/jquery.base64.js"></script>
  <!-- Plug-->
  <script type="text/javascript" src="assets/plugins/DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script type="text/javascript" src="assets/plugins/select2/js/select2.min.js"></script>
  <script type="text/javascript" src="assets/js/data/datatables.js"></script>
  <script type="text/javascript" src="assets/js/data/aksi.js"></script>

	<script>
		$(document).ready(function() {
        //Memberikan Nilai pada Variable GET P
        if(!$_GET["p"]) location.replace("?p="+$.base64.btoa("dashboard"));

			// data-tables
			$('#example1').DataTable();

			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		});

		$("#login").click(function(){

			if($("#username").val().length > 0 && $("#password").val().length > 0){
				$.ajax({
			    url:'<?= site_url("cas/Log/login") ?>',
			    data: {username:$("#username").val(), password:$("#password").val()},
			    method:"post",
			    dataType: "json",
			    success: function(res){
							var judul, pesan, ikon;

						if(res.status == "1"){
							judul = "Login Sukses";
							pesan	= "Login Berhasil, Klik OK untuk melanjutkan";
							ikon 	= "success";
						}
						else{
							judul = "Login Gagal";
							pesan	= res.message;
							ikon 	= "error";
						}

						swal({
								title: judul,
								text: pesan,
								icon: ikon,
							}).then(function(){ location.reload() });
					}
				});
			} else {
				swal({
						title: "ERROR!",
						text: "Username dan Password tidak boleh Kosong",
						icon: "error",
					});
			}

		});
	</script>


<!-- END Java Script for this page -->
