<body>
  <div class="login-page">
  <div class="form">
    <img src="assets/images/logo_bprks_slt.png" alt="BPRKS SLT" width="60%" style="margin-top:-20px; margin-bottom: 10px">
      <input id="username" name="username" type="text" placeholder="username" autocomplete="off" required/>
      <input id="password" name="password" type="password" placeholder="password" autocomplete="off" required/>
      <button id="login" type="button">login</button>
      <p class="message">Copy &copy; <?= date("Y") ?> PT Sentra Layanan Terpadu <br><a href="#">Sinta Trisnawati (NPM. 17111266)</a></p>
  </div>
</div>
<?php
  require_once(APPPATH."views/structure/script.php");
 ?>
</body>
</html>
