<style>
    @media only screen and (max-width: 767px) {

        .navbar-brand {
            margin: 10px 5px;
            top: 20px;
            left: 10px;
        }
    }
</style>

<section class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('') ?>"><img src="<?= base_url('assets/images/logo_horizon.png') ?>" height="50" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('') ?>">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Layanan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $layanan = $this->Dokter->fetch_data('article')->result();
                        foreach ($layanan as $m) : ?>
                            <a class="dropdown-item" href="<?= base_url('') . $m->url . '/' . $m->slug ?>"><img width="20px" src="<?= base_url('assets/images/') . $m->favicon ?>"> <?= $m->title ?></a>
                        <?php endforeach; ?>

                    </div>
                </li>
                <li class="nav-item"><a href="#google-map" class="nav-link">Kontak</a></li>
                <li class="nav-item"><a href="#about" class="nav-link">Tentang Kami</a></li>
                <li class="nav-item"><a href="https://wa.link/lafb83" class="nav-link">Buat Janji</a></li>

            </ul>
        </div>
    </div>
</section>