<body class="adminbody">

<div id="main">
  <?php
  // <!-- top bar navigation -->
  require_once(APPPATH."views/structure/top_nav.php");
	// <!-- End Navigation -->
  $path = $this->session->userdata("sess_path");

	// <!-- Left Sidebar -->
  require_once(APPPATH."views/structure/nav_$path.php");
	// <!-- End Sidebar -->

  // <!-- Start content -->
    ($this->input->get("p")) ? $page = base64_decode($this->input->get("p")): $page = "dashboard";
    if(file_exists(APPPATH."views/$path/$page.php"))
      $this->load->view("$path/$page");
    else
      $this->load->view("structure/error_404");

    // <!-- END content-page -->
  ?>
  <footer class="footer">
		<span class="text-right">
		Copyright &copy; <?= date("Y") ?> <a target="_blank" href="#">Sistem Pintar SLT BPRKS</a>
		</span>
		<span class="float-right">
		Dibangun oleh <a target="_blank" href="#"><b>Sinta Trisnawati (NPM. 17111266)</b></a>
		</span>
	</footer>

</div>
<!-- END main -->
<?php
require_once(APPPATH."views/structure/script.php");
?>

</body>
</html>
