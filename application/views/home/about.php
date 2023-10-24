<section id="news-detail" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-sm-7">
                <!-- NEWS THUMB -->
                <div class="news-detail-thumb">
                    <div class="news-image">
                        <img src="<?= base_url('assets/images/ralkindi.jpg')  ?>" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <!-- SECTION TITLE -->
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2 class="text-left">Tentang Poli Gigi Alkindi</h2>
                            <p class="text-justify">Poli Gigi Al Kindi lahir dari ide luar biasa founder Klinik Al Kindi, dr. Faruq, CHC agar setiap orang dari seluruh lapisan masyarakat memiliki kesempatan yang sama untuk mendapatkan edukasi, serta perawatan gigi dan mulut yang layak.</p>
                            <p class="text-justify">Hingga akhirnya, Poli Gigi Al Kindi berhasil berdiri di bawah naungan KPRJ AL KINDI pada tanggal 28 Maret 2022.</p>
                            <p class="text-justify">Kehadiran Poli Gigi Al Kindi didasari pada sebuah visi, tentu ini bukanlah hal yang mudah, Poli Gigi Al Kindi akan terus berkomitmen untuk meningkatkan mutu dan kualitas pelayanan.</p>
                            <p class="text-justify">Poli Gigi Al Kindi ditangani oleh dokter yang ahli dan berpengalaman di bidangnya. Selain itu, dokter Poli Gigi Al Kindi selalu mengadakan pelatihan secara berkala agar selalu up-to-date dan tanggap dalam memberikan pelayanan yang memuaskan.</p>
                            <p class="text-justify">Poli Gigi Al Kindi juga turut aktif dalam mengedukasi dan menyuarakan pentingnya kesehatan gigi dan mulut kepada masyarakat melalui sosial media kami seperti tiktok, instagram, dan youtube.</p>
                        </div>
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <br>
                            <h2 class="text-left">Visi dan Misi</h2>
                            <h3 class="text-left">Visi </h3>
                            <p class="text-justify">Mewujudkan Poli Gigi Al Kindi sebagai klinik yang modern dan berstandar Internasional.</p>
                            <br>
                            <h3 class="text-left">Misi </h3>
                            <ul>
                                <li>
                                    <p>Mengedepankan profesionalitas dalam melayani pasien</p>

                                </li>
                                <li>
                                    <p>Mengedepankan kualitas dan pelayanan yang modern dan terbaru</p>
                                </li>
                                <li>
                                    <p> Memprioritaskan hak-hak pasien dalam mencapai kesembuhan dan kenyamanan</p>
                                </li>
                                <li>
                                    <p> Mengikuti perkembangan zaman metode terbaru </p>
                                </li>
                                <li>
                                    <p>Mengikuti perkembangan dan metode penelitian terbaru dalam pelayanan gigi.</p>
                                </li>

                            </ul>
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
                        <h4>Layanan Spesial Kami </h4>
                        <?php $artikel = $this->Dokter->fetch_data('article')->result();
                        foreach ($artikel as $p) : ?>
                            <div class="media">
                                <div class="media-object pull-left">

                                </div>
                                <div class="media-body">
                                    <p><i class="fa fa-check"></i><a href="<?= base_url('') . $p->url . '/' . $p->slug ?>"> <?= $p->title ?></a></p>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>


                </div>
            </div>

        </div>
    </div>
</section>