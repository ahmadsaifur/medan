 <!-- MENU -->
 <style>
     @media only screen and (max-width: 767px) {
         .rand {
             scale: 2;
             margin: 10px 20px;
         }
     }
 </style>
 <section class="navbar navbar-default navbar-static-top" role="navigation">
     <div class="container">
         <div class="navbar-header">
             <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                 <span class="icon icon-bar"></span>
                 <span class="icon icon-bar"></span>
                 <span class="icon icon-bar"></span>
             </button>

             <!-- lOGO TEXT HERE -->
             <a href="<?= base_url('') ?>"><img src="<?= base_url('assets/images/logo_horizon.png') ?>" class="rand" width="10%"></a>
         </div>

         <!-- MENU LINKS -->

         <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav d-inline-block">
                 <li class="nav-item"><a href="<?= base_url('') ?>" class="smoothScroll">Beranda</a></li>
                 <li class=" nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         Layanan
                     </a>
                     <ul class="dropdown-menu">
                         <?php $layanan = $this->Dokter->fetch_data('article')->result();
                            foreach ($layanan as $m) : ?>
                             <li><a class="dropdown-item" href="<?= base_url('') . $m->url . '/' . $m->slug ?>"><img width="20px" src="<?= base_url('assets/images/') . $m->favicon ?>"> <?= $m->title ?></a></li>
                         <?php endforeach; ?>
                     </ul>
                 </li>
                 <li class="nav-item"><a href="#google-map" class="smoothScroll">Kontak</a></li>
                 <li class="nav-item"><a href="#about" class="smoothScroll">Tentang Kami</a></li>

                 <li class="appointment-btn"><a href="https://wa.link/lafb83">Make an appointment</a></li>
             </ul>
         </div>

     </div>
 </section>