<section id="home" class="slider" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme">
                <div class="item item-first">
                    <div class="caption">
                        <div class="col-md-offset-1 col-md-10">
                            <h3>Let's make your life happier</h3>
                            <h1>Healthy Living</h1>
                            <a href="#team" class="section-btn btn btn-default smoothScroll">Meet Our Doctors</a>
                        </div>
                    </div>
                </div>
            </div>
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
                                Pencabutan
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
                        <img src="<?= base_url('assets/') ?>images/drg_ajeng.png" class="img-responsive" alt="">
                        <figcaption>
                            <h3>Dr. Ajeng</h3>
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
                    <h2 class="wow fadeInUp" data-wow-delay="0.1s">Our Doctors</h2>
                </div>
            </div>

            <div class="clearfix"></div>
            <?php foreach ($doctor as $dr) : ?>
                <div class="col-md-4 col-sm-6">
                    <div class="team-thumb wow fadeInUp" data-wow-delay="0.2s">
                        <img src="<?= base_url('assets/images/') . $dr->images ?>" class="img-responsive" alt="">

                        <div class="team-info">
                            <h3><?= $dr->nama ?></h3>
                            <p><?= $dr->subjectdr ?></p>
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
                    <h2>Keuntungan Perawatan Ortodonti di Poli Gigi Alkindi</h2>
                    <p>Kini, Poli Gigi Alkindi hadir dengan perawatan ortodonti. Memilih perawatan gigi di Poli Gigi Alkindi, bisa dapat banyak keuntungan, lho! Mulai dari penanganan aman dan nyaman, hingga menikmati harga promo yang gila-gilaan. Selain itu, kamu juga bisa menikmati segala perawatan gigi dengan harga yang terjangkau.</p>
                </div>
                <img src="<?= base_url('assets/images/OrtoCekat.jpg') ?>" class="img-responsive" alt="">
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                    <a href="news-detail.html">
                        <img src="<?= base_url('assets/images') ?>/model1.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>March 08, 2018</span>
                        <h3><a href="news-detail.html">About Amazing Technology</a></h3>
                        <p>Maecenas risus neque, placerat volutpat tempor ut, vehicula et felis.</p>
                        <div class="author">
                            <img src="<?= base_url('assets/images') ?>/author-image.jpg" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>Jeremie Carlson</h5>
                                <p>CEO / Founder</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                    <a href="news-detail.html">
                        <img src="<?= base_url('assets/images') ?>/news-image2.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>February 20, 2018</span>
                        <h3><a href="news-detail.html">Introducing a new healing process</a></h3>
                        <p>Fusce vel sem finibus, rhoncus massa non, aliquam velit. Nam et est ligula.</p>
                        <div class="author">
                            <img src="<?= base_url('assets/images') ?>/author-image.jpg" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>Jason Stewart</h5>
                                <p>General Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <!-- NEWS THUMB -->
                <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                    <a href="news-detail.html">
                        <img src="<?= base_url('assets/images') ?>/news-image3.jpg" class="img-responsive" alt="">
                    </a>
                    <div class="news-info">
                        <span>January 27, 2018</span>
                        <h3><a href="news-detail.html">Review Annual Medical Research</a></h3>
                        <p>Vivamus non nulla semper diam cursus maximus. Pellentesque dignissim.</p>
                        <div class="author">
                            <img src="<?= base_url('assets/images') ?>/author-image.jpg" class="img-responsive" alt="">
                            <div class="author-info">
                                <h5>Andrio Abero</h5>
                                <p>Online Advertising</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6">
                <img src="<?= base_url('assets/images') ?>/appointment-image.jpg" class="img-responsive" alt="">
            </div>

            <div class="col-md-6 col-sm-6">
                <!-- CONTACT FORM HERE -->
                <form id="appointment-form" role="form" method="post" action="#">

                    <!-- SECTION TITLE -->
                    <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                        <h2>Make an appointment</h2>
                    </div>

                    <div class="wow fadeInUp" data-wow-delay="0.8s">
                        <div class="col-md-6 col-sm-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="date">Select Date</label>
                            <input type="date" name="date" value="" class="form-control">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <label for="select">Select Department</label>
                            <select class="form-control">
                                <option>General Health</option>
                                <option>Cardiology</option>
                                <option>Dental</option>
                                <option>Medical Research</option>
                            </select>
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <label for="telephone">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                            <label for="Message">Additional Message</label>
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                            <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>