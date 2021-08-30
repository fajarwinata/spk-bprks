<div class="headerbar ">
  <!-- LOGO -->
      <div class="headerbar-left">
    <a href="<?= base_url() ?>" class="logo"><img alt="Logo" src="assets/images/bank.png" /> <span><b>PT SLT</b> - BPRKS</span></a>
      </div>

      <nav class="navbar-custom">

                  <ul class="list-inline float-right mb-0">
                    <li class="list-inline-item dropdown notif">
                      <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" >
                        <i class="fa fa-fw fa-user"></i> <?= $this->session->userdata("sess_nm_l") ?>
                      </a>
                    </li>
          <li class="list-inline-item dropdown notif">
                          <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <i class="fa fa-fw fa-question-circle"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-arrow-success dropdown-lg">
                              <!-- item-->
                              <div class="dropdown-item noti-title">
                                  <h5><small><i class="fa fa-user"></i> <?= $this->session->userdata("sess_level") ?></small></h5>
                              </div>

                              <!-- item-->
                              <a href="#" class="dropdown-item notify-item">
                                  <p class="notify-details ml-0">
                                      <b>Kamu login sebagai <?= $this->session->userdata("sess_level") ?></b>
                                      <span>dengan segala hak yang diberikan, <br>gunakan dengan penuh tanggungjawab</span>
                                  </p>
                              </a>

                              <!-- All-->
                              <a title="SISTEM PINTAR" href="#" class="dropdown-item notify-item notify-all">
                                  <i class="fa fa-cog fa-spin"></i> Sistem Pintar
                              </a>

                          </div>
                      </li>



                      <li class="list-inline-item dropdown notif">
                          <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <img src="assets/images/avatars/<?= $this->session->userdata("sess_path") ?>.png" alt="Profile image" class="avatar-rounded">
                          </a>
                          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                              <!-- item-->
                              <div class="dropdown-item noti-title">
                                  <h5 class="text-overflow"><small>Hello, <?= $this->session->userdata("sess_name") ?></small> </h5>
                              </div>

                              <!-- item-->
                              <a href="<?= site_url("cas/Log/logout") ?>" class="dropdown-item notify-item">
                                  <i class="fa fa-power-off"></i> <span>Keluar</span>
                              </a>

                          </div>
                      </li>

                  </ul>

                  <ul class="list-inline menu-left mb-0">
                      <li class="float-left">
                          <button class="button-menu-mobile open-left">
              <i class="fa fa-fw fa-bars"></i>
                          </button>
                      </li>
                  </ul>

      </nav>

</div>
