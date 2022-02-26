<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $title ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        .card-product:after {
            content: "";
            display: table;
            clear: both;
            visibility: hidden;
        }

        .card-product .price-new,
        .card-product .price {
            margin-right: 5px;
        }

        .card-product .price-old {
            color: #999;
        }

        .card-product .img-wrap {
            border-radius: 3px 3px 0 0;
            overflow: hidden;
            position: relative;
            height: 220px;
            text-align: center;
        }

        .card-product .img-wrap img {
            max-height: 100%;
            max-width: 100%;
            object-fit: cover;
        }

        .card-product .info-wrap {
            overflow: hidden;
            padding: 15px;
            border-top: 1px solid #eee;
        }

        .card-product .action-wrap {
            padding-top: 4px;
            margin-top: 4px;
        }

        .card-product .bottom-wrap {
            padding: 15px;
            border-top: 1px solid #eee;
        }

        .card-product .title {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container-fluid">

            <div class="row justify-content-center">
                <div class="col-xl-9 d-flex align-items-center">
                    <h1 class="logo mr-auto"><a href="index.php">Dope Wild Sablon's</a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav class="nav-menu d-none d-lg-block">
                        <ul>

                            <li><a href="index">Beranda</a></li>
                            <li><a href="pilihkaos">Order</a></li>
                            <li><a href="tentang">Tentang Kami</a></li>
                            <li><a href="berita">Berita</a></li>
                            <li><a href="faq">FAQ</a></li>
                            <li><a href="ulasan">Ulasan</a></li>

                            <?php
                            if (strlen($_SESSION['user']) == 0) {
                                include('includes/topbarnosignin.php');
                            } else {
                                include('includes/topbarsignin.php');
                            }
                            ?>
                </div>
            </div>

        </div>
    </header><!-- End Header -->