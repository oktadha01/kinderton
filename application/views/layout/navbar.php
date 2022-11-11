<?php $this->load->view('layout/alert/_alert') ?>
<header id="navbar" class="version_1 z-index-5">

   <!-- /main_header -->
   <!-- <div class="main_header"></div> -->

   <div class="main_header main_nav Sticky bg-kinderton max-height-4rem">
      <div class="container pr-3">
         <div class="row small-gutters">
            <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
               <div id="logo">
                  <a href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('assets'); ?>/img/logo-kinderton.png" alt="" width="100" height="35"></a>
               </div>
            </div>
            <nav class="col-xl-6 col-lg-7 top-menu-nav--5px">
               <a id="sidebar-menu" class="open_close" href="javascript:void(0);">
                  <div class="hamburger hamburger--spin">
                     <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                     </div>
                  </div>
               </a>
               <div class="main-menu">
                  <div id="header_menu">
                     <a href="#"><img src="<?php echo base_url('assets'); ?>/img/kinderton coklat-30.png" alt="" width="100" height="35"></a>
                     <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                  </div>
                  <ul>
                     <li>
                        <a class="menu" href="<?php echo base_url('dashboard'); ?>">Home</a>
                     </li>
                     <li>
                        <a class="menu" href="<?php echo base_url('produk'); ?>/gender/Girl">Girls</a>
                     </li>
                     <li>
                        <a class="menu" href="<?php echo base_url('produk'); ?>/gender/Boy">Boys</a>
                     </li>
                     <li>
                        <a class="menu" href="<?php echo base_url('produk'); ?>/gender/unisex">Unisex</a>
                     </li>
                     <li>
                        <a class="menu" href="<?php echo base_url('more_info'); ?>">More info</a>
                     </li>
                  </ul>
                  <div class="foto-nav"></div>
               </div>
            </nav>
            <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right top-icon-nav-5px">
               <?php if (!$this->session->userdata('is_login')) : ?>
                  <li class="float-right list-none">
                     <a href="" class="ml-3 a-header-icon" data-toggle="modal" data-target="#modal-login"><i class="fa-solid fa-right-to-bracket menu-icon-header"></i>
                     </a>
                  </li>
               <?php else : ?>
                  <?php if ($this->session->userdata("privilage") == 'admin') { ?>
                     <li class="float-right list-none">
                        <a href="<?php echo base_url('Olah_data'); ?>" class="ml-3 a-header-icon"><i class="fa-solid fa-database menu-icon-header"></i>
                           <span id="" class="badge badge-success navbar-badge-db notif-pesanan"></span>
                        </a>
                        <a href="#" class="ml-3 a-header-icon a-header-icon-user" data-toggle="dropdown"><span class="user-acaunt mr-1"><?= $this->session->userdata("nm_user") ?></span> <i class="fa-regular fa-user menu-icon-header"></i>
                        </a>
                        <div id="dropdown-user" class="menu-dropdown dropdown-menu dropdown-menu-lg dropdown-menu-right">
                           <div class="dropdown-divider"></div>
                           <a href="<?php echo base_url('user'); ?>" class="dropdown-item">
                              <i class="fa-regular fa-user"></i> <?= $this->session->userdata("nm_user") ?>
                           </a>
                           <div class="dropdown-divider"></div>
                           <a href="<?php echo site_url('logout'); ?>" class="dropdown-item">
                              <i class="fa-solid fa-right-from-bracket"></i> LOGOUT
                           </a>
                        </div>
                     </li>
                     <?php
                  } else if ($this->session->userdata("privilage") == 'member') {
                     if ($this->session->userdata("status_user") == '0') {
                     ?>
                        <li class="float-right list-none">
                           <a href="#" class="ml-3 a-header-icon a-header-icon-user" data-toggle="dropdown"><span class="user-acaunt mr-1"><?= $this->session->userdata("nm_user") ?></span> <i class="fa-regular fa-user menu-icon-header"></i>
                           </a>
                           <div id="dropdown-user" class="menu-dropdown dropdown-menu dropdown-menu-lg dropdown-menu-right">
                              <div class="dropdown-divider"></div>
                              <a href="<?php echo base_url('user'); ?>" class="dropdown-item">
                                 <i class="fa-regular fa-user"></i> <?= $this->session->userdata("nm_user") ?>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="<?php echo site_url('logout'); ?>" class="dropdown-item">
                                 <i class="fa-solid fa-right-from-bracket"></i> LOGOUT
                              </a>
                           </div>

                        </li>
                     <?php
                     } else { ?>
                        <li class="float-right list-none btn_add_to_cart">
                           <a href="#page" id="btn-addtocart-favorit" class="ml-3 a-header-icon"><i class="fa-regular fa-heart menu-icon-header"></i>
                              <span id="notif-favorit" class="badge badge-warning navbar-badge-favorit"></span>
                           </a>

                           <a href="#page" id="btn-cart" class="ml-3 a-header-icon"><i class="fa-solid fa-cart-shopping menu-icon-header"></i>
                              <span id="" class="badge badge-success navbar-badge-cart notif-cart"></span>
                           </a>
                        </li>
                        <li class="float-right list-none">
                           <a href="#" class="ml-3 a-header-icon a-header-icon-user" data-toggle="dropdown"><span class="user-acaunt mr-1"><?= $this->session->userdata("nm_user") ?></span> <i class="fa-regular fa-user menu-icon-header"></i>
                           </a>
                           <div id="dropdown-user" class="menu-dropdown dropdown-menu dropdown-menu-lg dropdown-menu-right">
                              <!-- <div class="dropdown-divider"></div> -->
                              <a href="<?php echo site_url('user'); ?>" class="dropdown-item">
                                 <i class="fa-regular fa-user"></i> <?= $this->session->userdata("nm_user") ?>
                              </a>
                              <div class="dropdown-divider"></div>
                              <a href="<?php echo site_url('logout'); ?>" class="dropdown-item">
                                 <i class="fa-solid fa-right-from-bracket"></i> LOGOUT
                              </a>
                           </div>
                        </li>
                     <?php
                     }
                     ?>
                  <?php
                  } ?>
               <?php endif ?>

            </div>
         </div>

      </div>
      <div class="search_mob_wp">
         <input type="text" class="form-control" placeholder="Search over 10.000 products">
         <input type="submit" class="btn_1 full-width" value="Search">
      </div>
   </div>

</header>
<!-- /.modal -->
<script>

</script>