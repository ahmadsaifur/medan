<section id="news-detail" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-7">
                <!-- NEWS THUMB -->
                <div class="news-detail-thumb">
                    <div class="news-image">
                        <img src="<?= base_url('assets/banner/') . $artikel->images; ?>" class="img-responsive" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <h2 class="text-capitalize">Gigi Tiruan Lepasan</h2>
                                <p class="text-justify">Gigi Tiruan yang dapat dilepas pasang dan mudah untuk dibersihkan ini merupakan salah satu alternatif perawatan pengganti gigi yang hilang di Poli Gigi Al Kindi.</p>
                                <p class="text-justify">Terdapat berbagai jenis gigi tiruan lepasan yang bisa kamu pilih di Poli Gigi Al Kindi mulai dari gigi tiruan akrilik, gigi tiruan kerangka logam dan gigi tiruan fleksi (Tanpa Kawat).</p>
                                <p class="text-justify">Konsultasikan dengan dokter gigi spesialis kami yang sudah berpengalaman untuk menentukan mana yang terbaik untukmu!</p>
                                <p class="text-justify">Untuk Biaya perawatan di Poli Gigi Al Kindi, Anda bisa tanyakan ke Admin Kami Klik <a href="https://wa.link/lafb83">Disini </a></p>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <h2 class="text-capitalize">Dokter Kami</h2>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('assets/images/fotodokter.jpg') ?>" class="img-responsive" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <h2 class="text-capitalize">Dokter berpengalaman dan up-to-date</h2>
                                <p class="text-justify">Kami mengadakan pelatihan secara berkala kepada dokter gigi kami agar selalu up-to-date dan tanggap dalam memberikan pelayanan yang memuaskan.</p>
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                                <h2 class="text-capitalize">Peralatan Lengkap</h2>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-6">
                            <!-- NEWS THUMB -->
                            <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('assets/images/room1.jpg') ?>" class="img-responsive" alt="">
                                </a>
                                <div class="news-info">
                                    <h3 class="text-capitalize">Ruangan bersih dan nyaman.</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <!-- NEWS THUMB -->
                            <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('assets/images/bleach1.jpg') ?>" class="img-responsive" alt="">
                                </a>
                                <div class="news-info">
                                    <h3 class="text-capitalize">Peralatan canggih</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <!-- NEWS THUMB -->
                            <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                                <a href="<?= base_url() ?>">
                                    <img src="<?= base_url('assets/images/koral.jpg') ?>" class="img-responsive" alt="">
                                </a>
                                <div class="news-info">
                                    <h3 class="text-capitalize">Alat memenuhi standar</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-5">
                <div class="news-sidebar">
                    <div class="news-author">
                        <h4>Tentang Poli Gigi Alkindi</h4>
                        <p class="text-justify" style="text-indent: 45px;">Memilih perawatan gigi di Poli Gigi Alkindi, bisa dapat banyak keuntungan, lho! Mulai dari penanganan aman dan nyaman, hingga menikmati harga promo yang gila-gilaan. Selain itu, kamu juga bisa menikmati segala perawatan gigi dengan harga yang terjangkau.</p>
                    </div>

                    <div class="recent-post">
                        <h4>Layanan Kami Lainnya</h4>
                        <?php foreach ($post as $p) : ?>
                            <div class="media">
                                <div class="media">
                                    <div class="media-object pull-left">

                                    </div>
                                    <div class="media-body">
                                        <p class="media-heading"><a href="<?= base_url('') . $p->url . '/' . $p->slug ?>"><i class="fa fa-check"></i> <?= $p->title ?></a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>