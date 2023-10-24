<style>
    @media only screen and (max-width: 580px) {
        .navbar-brand {
            margin-left: -150px;

        }

        .navbar-nav {
            margin-left: 20px;
        }

        .navbar {
            background-color: azure;
        }
    }

    .layout-navbar-fixed {
        position: fixed;
        z-index: 10;
        width: 100%;
        background-color: azure;
    }

    .navbar {
        background-color: azure;
    }
</style>
<section class="main-header navbar navbar-expand-md navbar-light navbar-white layout-navbar-fixed">
    <div class="container">
        <a href="<?= base_url('') ?>" class="navbar-brand" style="">
            <img src="<?= base_url('assets/images/logo_horizon.png') ?>" height="50" alt="AdminLTE Logo" class="brand-image elevation-3" style="left: 20px;">
            <span class="brand-text font-weight-light"></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('') ?>" class="nav-link">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Layanan Kami</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php $layanan = $this->Dokter->fetch_data('article')->result();
                        foreach ($layanan as $m) : ?>
                            <li><a href="<?= base_url('') . $m->url . '/' . $m->slug ?>" class="dropdown-item"> <img width="20px" src="<?= base_url('assets/images/') . $m->favicon ?>"><?= $m->title ?> </a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#google-map" class="nav-link">Kontak</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('welcome/about/') ?>" class="nav-link">Tentang Kami</a>
                </li>
                <li class="nav-item btn-primary rounded btn">
                    <a href="https://wa.link/lafb83" class="nav-link text-white">Buat Janji</a>
                </li>
            </ul>

        </div>
    </div>
</section>