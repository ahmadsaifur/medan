<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="container">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/banner/Behel_Gigi/Promo_Behel_Gigi_980_x_650_September_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Bleaching_Gigi/Promo_Bleaching_Gigi_980_x_650_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Cabut_Gigi_Anak/Promo_Cabut_Gigi_Anak_980_x_650_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Cabut_Gigi_Dewasa/Promo_Cabut_Gigi_Dewasa_980_x_650_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Crown_dan_Bridge/Promo_Crown_Bridge_980_x_650_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Gigi_Tiruan_Lepas_Sebagian/Promo_Gigi_Tiruan_Sebagian_980_x_650_September_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Perawatan_Gigi_Goyang/Promo_Perawatan_Gigi_Goyang_980_x_650.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Perawatan_Saluran_Akar/Promo_Perawatan_Saluran_Akar_980_x_650.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Promo_Bundle_Premium/Promo_Bundle_Premium_980_x_650.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Scaling_Gigi/Promo_Scaling_Gigi_980_x_650_September_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/banner/Tambal_Gigi/Promo_Tambal_Gigi_980_x_650_Desember_2023.jpg') ?>" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
</section>


<!-- ABOUT -->
<section id="about">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp" data-wow-delay="0.6s">Selamat Datang di Poli gigi Alkindi</h2>
                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <p>Poli Gigi Alkindi kini hadir untuk membantu anda memiliki gigi yang putih, bersih, rapi dan sehat. Di Poli Gigi Alkindi anda akan ditangani oleh dokter yang ahli dan berpengalaman serta memiliki sertifikat profesi di bidangnya. </p> <br>
                        <p>Poli Gigi Alkindi menyediakan peralatan dental yang berteknologi advance serta terkini untuk memanjakan dan memberikan anda pelayanan yang nyaman dan aman. </p> <br>
                        <p>Poli Gigi Alkindi dapat memberikan pelayanan untuk anda seperti :</p>
                        <ul>
                            <li>
                                Penambalan
                            </li>
                            <li>
                                Pencabutan
                            </li>
                            <li>
                                Pembersihan Karang Gigi (Scaling)
                            </li>
                            <li>
                                Perawatan Gusi Berdarah (Kuretase)
                            </li>
                            <li>
                                Perawatan Syaraf Gigi
                            </li>
                            <li>
                                Gigi Tiruan
                            </li>
                            <li>
                                Bleaching ( Teeth Whitening )
                            </li>
                            <li>
                                Kawat Gigi (Behel)
                            </li>
                            <li>
                                Perawatan Gigi Goyang
                            </li>
                        </ul>

                    </div>
                    <figure class="profile wow fadeInUp" data-wow-delay="1s">
                        <img src="<?= base_url('assets/') ?>images/drg_tien.jpg" class="img-responsive" alt="">
                        <figcaption>
                            <h3>Drg. Tien</h3>
                            <p>General Dentish Practicians </p>
                        </figcaption>
                    </figure>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- TEAM -->
<section id="team" data-stellar-background-ratio="1">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="about-info">
                    <h2 class="wow fadeInUp" data-wow-delay="0.1s">Dokter Kami</h2>
                </div>
            </div>

            <div class="clearfix"></div>
            <?php foreach ($doctor as $dr) : ?>
                <div class="col-md-4 col-sm-6">
                    <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                        <img src="<?= base_url('assets/images/') . $dr->images ?>" class="img-responsive" alt="">

                        <div class="team-info" style="padding: -20px ;margin-top: -20px;">
                            <h3 class="text-capitalize text-center text-white"><?= $dr->nama ?></h3>
                        </div>
                        <div class="team-contact-info">

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- NEWS -->
<section id="news" data-stellar-background-ratio="2.5">
    <div class="container">
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="text-justify">Keuntungan Perawatan Ortodonti di Poli Gigi Alkindi</h2>
                    <p class="text-justify">Kini, Poli Gigi Alkindi hadir dengan perawatan ortodonti. Memilih perawatan gigi di Poli Gigi Alkindi, bisa dapat banyak keuntungan, lho! Mulai dari penanganan aman dan nyaman, hingga menikmati harga promo yang gila-gilaan. Selain itu, kamu juga bisa menikmati segala perawatan gigi dengan harga yang terjangkau.</p>
                </div>
                <img src="<?= base_url('assets/images/OrtoCekat.jpg') ?>" class="img-responsive" alt="">
                <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                    <br>
                    <p class="text-justify">Agar gigi terlihat rapi dan menarik, Anda perlu melakukan perawatan ortodonti. Ortodonti merupakan istilah dalam kedokteran gigi, namun orang awam menyebutnya dengan penggunaan kawat gigi (behel)</p>
                    <p class="text-justify">Ortodonti bertugas untuk memastikan struktur wajah kamu tidak terganggu oleh posisi rahang yang tidak sejajar. Pada intinya, perawatan ortodonti bertujuan untuk mendapatkan susunan gigi yang teratur dan mendukung kesehatan gigi, mulut, dan wajah.</p>
                    <br>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <a href="news-detail.html">
                        <img src="<?= base_url('assets/images') ?>/model1.jpg" class="img-responsive" alt="">
                    </a>
                </div>
            </div>

            <div class="col-md-8 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <div class="news-info">
                        <h3>Kenapa harus memilih ortodonti di poli gigi alkindi?</h3>
                        <div class="team-contact-info">
                            <p><i class="fa fa-check"></i> Pilihan sistem perawatan yang disesuaikan dengan kondisi dan kebutuhan pasien. Mulai dari standar hingga berteknologi canggih</p>
                            <p><i class="fa fa-check"></i> Fasilitas medis yang lengkap, nyaman, dan modern serta memenuhi sesuai standar</p>
                            <p><i class="fa fa-check"></i> Pelatihan secara berkala pada dokter gigi kami agar selalu up-to-date dan tanggap dalam memberikan pelayanan yang memuaskan</p>
                            <p><i class="fa fa-check"></i> Harga yang terjangkau agar semua kalangan mampu menikmati perawatan ortodontik</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h2>Dokter Kami</h2>
                </div>
            </div>

            <div class="col-md-12 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/fotodokter.jpg') ?>" class=" img-responsive" alt="">
                    </a>
                </div>
                <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h3>Dokter berpengalaman dan up-to-date</h3>
                </div>
                <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <p>Kami mengadakan pelatihan secara berkala kepada dokter gigi kami agar selalu up-to-date dan tanggap dalam memberikan pelayanan yang memuaskan.</p>
                </div>
            </div>
        </div>


        <div class="row">

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
        <div class="row">

            <div class="col-md-12 col-sm-12">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h2 class="text-capitalize">Pilihan Alat Behel</h2>
                    <h4>Poli Gigi Alkindi menawarkan pilihan jenis behel seperti..</h4>
                </div>
            </div>


            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="news-detail.html">
                        <img src="<?= base_url('assets/images/image.jpg') ?>" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <h3>Behel Metal.</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <img src="<?= base_url('assets/images/asdf.jpg') ?>" class="img-responsive" alt="">
                    <div class="news-info">
                        <h3>Behel Ceramic</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="news-detail.html">
                        <img src="<?= base_url('assets/images/pasti.jpg') ?>" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <h3>Behel Damon</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <!-- SECTION TITLE -->
                <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h2>Prosedur Ortodontik di Poli Gigi Alkindi</h2>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/konsul1.jpg') ?>" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-info">
                        <h5 class="text-justify" style="text-indent: 45px;">Pertama, dokter akan melakukan serangkaian pemeriksaan yang meliputi wawancara, hal yang harus kamu catat adalah lakukan pemasangan kawat gigi di klinik gigi ataupun dokter gigi yang sudah terpercaya dan terjamin kualitasnya. Jangan sampai kamu tergoda untuk sembarang pasang behel, karena dapat merusak gigi kamu nantinya.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <!-- SECTION TITLE -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/pemeriksaan.jpg') ?>" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-info">
                        <h5 class="text-justify" style="text-indent: 45px;">Sebelum dilakukan perawatan ortodonti, dokter kami akan melakukan pemeriksaan fisik, pemeriksaan gigi, pengambilan cetakan gigi dan bagian dalam mulut secara menyeluruh. Selanjutnya, pengambilan foto intra oral dan profil pasien. Pengambilan foto rontgen panoramik dan cephalometri, serta pemeriksaan lain yang dibutuhkan untuk kasus pasien tersebut.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <!-- SECTION TITLE -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/scaling.jpg') ?>" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-info">
                        <h5 class="text-justify" style="text-indent: 45px;">Sebelum melakukan pemasangan kawat gigi, kamu harus memastikan bahwa gigi kamu bersih dari karang. Karena itu kamu perlu melakukan pembersihan karang gigi atau yang disebut scaling</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <!-- SECTION TITLE -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/pemeriksaan.jpg') ?>" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-info">
                        <h5 style="text-indent: 45px;" class="text-justify">Jika kondisi gigi kamu ada yang berlubang ataupun ada yang perlu dicabut, maka dokter terlebih dahulu akan mencabut atau menambal gigi kamu sebelum dilakukan pemasangan behel gigi.</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-6">
                <!-- SECTION TITLE -->
            </div>
            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
                    <a href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/pemeriksaan.jpg') ?>" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <div class="news-info">
                        <h5 style="text-indent: 45px;" class="text-justify">Setelah semua prosedur telah dilakukan, barulah dokter siap dan bisa memasangkan behel gigi sesuai dengan kebutuhan dan pilihan yang diinginkan. Setelah selesai pemasangan behel, kamu harus melakukan kontrol rutin. Agar permasalahan yang timbul saat memakai behel mampu diatasi dengan cepat oleh dokter</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <!-- SECTION TITLE -->
            <br>
            <div class="section-title wow fadeInUp animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h5 class="text-justify">Lama perawatan ortodontik tergantung kepada jenis, tingkat keparahan kasus, dan respon gigi atau tubuh pasien terhadap perawatan tersebut. Selama perawatan ortodonti, pasien dianjurkan untuk kontrol rutin dan mematuhi instruksi dari dokter gigi yang merawat, agar tercapai hasil perawatan yang optimal.</h5=>
            </div>
        </div>
    </div>
</section>