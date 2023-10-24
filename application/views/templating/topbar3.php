 <!-- MENU -->
 <style>
     @media only screen and (max-width: 767px) {
         .rand {
             scale: 2;
             margin: 10px 20px;
         }
     }
 </style>
 <header>
     <!--? Header Start -->
     <div class="header-area">
         <div class="main-header header-sticky sticky-bar">
             <div class="container-fluid">
                 <div class="row align-items-center">
                     <!-- Logo -->
                     <div class="col-xl-2 col-lg-2 col-md-1">
                         <div class="logo">
                             <a href="<?= base_url('') ?>"><img src="<?= base_url('assets/images/logo_horizon.png') ?>" class="logo" width="30%"></a>
                         </div>
                     </div>
                     <div class="col-xl-10 col-lg-10 col-md-10">
                         <div class="menu-main d-flex align-items-center justify-content-end">
                             <!-- Main-menu -->
                             <div class="main-menu f-right d-none d-lg-block">
                                 <nav>
                                     <ul id="navigation">
                                         <li><a href="<?= base_url('') ?>" class="text-primary">Beranda</a></li>
                                         <li><a href="#" class="text-primary">Layanan</a>
                                             <ul class="submenu">
                                                 <?php $layanan = $this->Dokter->fetch_data('article')->result();
                                                    foreach ($layanan as $m) : ?>
                                                     <li><a class="text-primary" href="<?= base_url('') . $m->url . '/' . $m->slug ?>"><img width="20px" src="<?= base_url('assets/images/') . $m->favicon ?>"> <?= $m->title ?></a></li>
                                                 <?php endforeach; ?>
                                             </ul>
                                         </li>
                                         <li><a href="#google-map" class="smoothScroll text-primary">Kontak</a></li>
                                         <li><a href="#about" class="smoothScroll text-primary">Tentang Kami</a></li>
                                     </ul>
                                 </nav>
                             </div>
                             <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                 <a href="https://wa.link/lafb83" class="btn header-btn">Make an appointment</a>
                             </div>
                         </div>
                     </div>
                     <!-- Mobile Menu -->
                     <div class="col-12">
                         <div class="mobile_menu d-block d-lg-none"></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->
 </header>