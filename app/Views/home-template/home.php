<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/home-tamu/image/favicon.png" type="image/png">
    <title>Royal Hotel Mahar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/home-tamu/css/bootstrap.css">
    <link rel="stylesheet" href="/home-tamu/vendors/linericon/style.css">
    <link rel="stylesheet" href="/home-tamu/css/font-awesome.min.css">
    <link rel="stylesheet" href="/home-tamu/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/home-tamu/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/home-tamu/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="/home-tamu/vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="/home-tamu/css/style.css">
    <link rel="stylesheet" href="/home-tamu/css/responsive.css">
</head>

<body>

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="" style="background: url('./gambar/hotel.jpg') no-repeat scroll center 0/cover;"></div>
            <div class="container">
                <div class="banner_content text-center">
                    <h5>Welcome To</h5>
                    <h2>Royal HOTEL MAHAR</h2>
                    <p>Royal Hotel Mahar, hotel terbaik di Kuningan untuk keluarga tercinta.</p>
                    <!-- <a href="#" class="btn theme_btn button_hover">Get Started</a> -->
                </div>
            </div>
        </div>
    </section>
    <!--================Header Area =================-->
    <header class="header_area">
        <a class="navbar-brand logo_h" href="index.html"><img src="image/Logo.png" alt=""></a>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="/home-tamu/image/favicon.png" alt=""></a>
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <!-- <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="#bagian_kamar">Kamar Hotel</a></li>
                        <li class="nav-item"><a class="nav-link" href="#bagian_fasilitas">Fasilitas Hotel</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!--================ Accomodation Area  =================-->
    <section id="bagian_kamar" class="accomodation_area section_gap">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">Kamar Hotel Mahar</h2>
                <!-- <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p> -->
            </div>
            <div class="row mb_30">
                <?php foreach ($fasilitas_kamar as $row) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="accomodation_item text-center">
                            <div class="hotel_img">
                                <img src="/gambar/<?= $row['foto'] ?> " alt="" height="200px" weight="200px">
                                <a href="fasilitas-kamar" class="btn theme_btn button_hover">Pesan</a>
                            </div>
                            <h4 class="sec_h4"><?= $row['tipe_kamar'] ?></h4>
                            </a>
                            <h5>Rp. <?= $row['harga'] ?> <small>/Malam</small></h5>
                            <p><?= $row['deskripsi'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

    <!--================ Facilities Area  =================-->
    <section id="bagian_fasilitas" class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_w">Fasilitas Hotel Mahar</h2>
                <!-- <p>Who are in extremely love with eco friendly system.</p> -->
            </div>
            <div class="row mb_30">
                <?php foreach ($fasilitas_hotel as $row) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="facilities_item">
                            <h4 class="sec_h4"><i class=""></i><?= $row['nama_fasilitas_umum'] ?></h4>
                            <p><?= $row['deskripsi'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
    <!--================ Facilities Area  =================-->
</body>

</html>