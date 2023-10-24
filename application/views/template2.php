<!DOCTYPE html>
<html lang="en">

<head>

    <title><?= $title . ' |' . $headmeta ?></title>
    <!--

Template 2098 Health

http://www.tooplate.com/view/2098-health

-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="<?= (!empty($description)) ? $description : "" ?>">
    <meta name="keywords" content="<?= (!empty($keywords)) ? $keywords : "" ?>">
    <meta name="author" content="Tooplate">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="icon" href="<?= base_url('assets/images/logo_gigi.png') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="<?= base_url('assets/css/') ?>bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/') ?>font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/') ?>animate.css">
<link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
<link rel="stylesheet" href="<?= base_url('assets/css/') ?>owl.carousel.css">
<link rel="stylesheet" href="<?= base_url('assets/css/') ?>owl.theme.default.min.css">
<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/slicknav.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/flaticon.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/gijgo.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/animate.min.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/animated-headline.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/magnific-popup.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/fontawesome-all.min.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/themify-icons.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/slick.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/nice-select.css">
<link rel="stylesheet" href="<?= base_url('assets/medical/') ?>assets/css/style.css">

<link rel="stylesheet" href="<?= base_url('assets/css/') ?>tooplate-style.css">

</head>

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">



    <!-- HEADER -->
    <?php $this->load->view('templating/header', $data) ?>


    <?php $this->load->view('templating/topbar', $data) ?>

    <!-- HOME -->
    <?= $contents ?>
    <!-- GOOGLE MAP -->



    <?php $this->load->view('templating/footer', $data); ?>


    <!-- SCRIPTS -->
    <script src="<?= base_url('assets/js/') ?>jquery.js"></script>
    <script src="<?= base_url('assets/js/') ?>bootstrap.min.js"></script>
    <script src="<?= base_url('assets/js/') ?>jquery.sticky.js"></script>
    <script src="<?= base_url('assets/js/') ?>jquery.stellar.min.js"></script>
    <script src="<?= base_url('assets/js/') ?>wow.min.js"></script>
    <script src="<?= base_url('assets/js/') ?>smoothscroll.js"></script>
    <script src="<?= base_url('assets/js/') ?>owl.carousel.min.js"></script>


    <script src="<?= base_url('assets/medical') ?>/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/wow.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/animated.headline.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.sticky.js"></script>

    <!-- counter , waypoint -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/waypoints.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/contact.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.form.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/mail-script.js"></script>
    <script src="<?= base_url('assets/medical') ?>/assets/js/jquery.ajaxchimp.min.js"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="<?= base_url('assets/medical') ?>/assets/js/plugins.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/medical/') ?>assets/js/main.js"></script>

</body>

</html>