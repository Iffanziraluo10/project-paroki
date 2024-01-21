<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Beranda | SIPDM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/logo_keuskupan.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .judul {
            font-size:19px;
            white-space: nowrap;
        }
        @media (max-width: 767px) {
        .judul {
            white-space: normal;
        }
    }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div id="beranda" class="container-fluid latar-coklat px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-envelope alt me-2"></i>sanfrancis.padangbulanmedan@gmail.com</small>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h5 class="m-0 judul">
                    <img src="img/logo_st.fransiskus.png" style="width:50px;" alt="">
                    <img src="img/logo_keuskupan.png" style="width:50px;" alt="">
                    Gereja Katolik Paroki St. Fransiskus Assisi Padang Bulan Medan
                </h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse text-sm-start" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#beranda" class="nav-item nav-link active">Beranda</a>
                    <a href="#tentang" class="nav-item nav-link">Tentang</a>
                    <a href="cek_dana.php" class="nav-item nav-link">Cek Dana</a>
                    <a href="#galeri" class="nav-item nav-link">Galeri</a>
                    <a href="#kontak" class="nav-item nav-link">Kontak</a>
                    
                </div>
                <a href="login/login.php" class="tombol btn btn-danger py-2 px-4 ms-3">Login</a>
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/banner1.png" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang di</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Sistem Informasi Pengelolaan Dana Mandiri</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/banner2.png" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Selamat Datang di</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Sistem Informasi Pengelolaan Dana Mandiri</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Tentang Start -->
    <div id="tentang" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold warna-coklat text-uppercase">Tentang</h5>
                        <h1 class="mb-0">SIPDM</h1>
                    </div>
                    <p class="mb-4">Sistem Informasi Pengelolaan Dana Mandiri adalah sebuah sistem informasi yang digunakan untuk membantu pengelolaan dana atau keuangan secara mandiri. Pengelolaan dana mandiri menjadi penting untuk dilakukan karena dalam kehidupan sehari-hari, kebutuhan finansial semakin kompleks dan memerlukan manajemen yang baik agar dapat terpenuhi dengan baik. Dengan adanya SIPDM, gereja dapat memperoleh manfaat seperti:</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <p class="mb-2"><i class="fa fa-check warna-coklat me-3"></i>Kemudahan dalam mengelola keuangan dan dana mandiri gereja</p>
                            <p class="mb-2"><i class="fa fa-check warna-coklat me-3"></i>Membuat laporan keuangan dengan cepat dan akurat</p>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <p class="mb-2"><i class="fa fa-check warna-coklat me-3"></i>Menghemat waktu dan tenaga dalam mengelola keuangan dan inventaris gereja.</p>
                            <p class="mb-2"><i class="fa fa-check warna-coklat me-3"></i>Menghindari terjadinya kesalahan pencatatan transaksi keuangan dan pengeluaran yang tidak terkontrol</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/tentang.png" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tentang End -->


    <!-- Profil Start -->
    <div id="profil" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold warna-coklat text-uppercase">Profil Singkat</h5>
                <h1 class="mb-0">Gereja Katolik Paroki St. Fransiskus Assisi Padang Bulan Medan</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                            <div class="latar-coklat rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-map-pin text-white"></i>
                            </div>
                            <h4>Alamat</h4>
                            <p class="mb-0">Jl. Bunga Ester No. 93B, Padang Bulan Selayang II, Kec. Medan Selayang, Padang Bulan Medan - 20131</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                            <div class="latar-coklat rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-users text-white"></i>
                            </div>
                            <h4>Jumlah Umat</h4>
                            <p class="mb-0">10.133 jiwa <i>(data Biduk per 15/02/22)</i></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="img/profil.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row g-5">
                        <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                            <div class="latar-coklat rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-home text-white"></i>
                            </div>
                            <h4>Jumlah Stasi</h4>
                            <p class="mb-0">1.Gedung Johor; 2.Pasar Baru; 3.Perumnas Simalingkar; 4.Simpang Kwala; 5.Simpang Selayang</p>
                        </div>
                        <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                            <div class="latar-coklat rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fa fa-phone-alt text-white"></i>
                            </div>
                            <h4>Pelindung</h4>
                            <p class="mb-0">Santo Fransiskus dari Asisi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Profil Start -->

    <!-- kutipan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold warna-coklat text-uppercase">Kutipan Alkitab</h5>
                <h1 class="mb-0">Firman Tuhan Berkata dalam :</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">1 Timotius 6:10</h4>
                            <small class="text-uppercase">PL</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Sebab cinta uang adalah akar segala kejahatan; dengan memburu uang, beberapa orang telah menyimpang dari iman dan menyiksa dirinya dengan duka yang banyak.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Amsal 13:11</h4>
                            <small class="text-uppercase">PL</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Barangsiapa memperoleh keuntungan dengan cara yang tidak adil, maka harta itu akan lenyap dengan cepat, tetapi siapa mengumpulkan dengan kerja keras, akan menjadi kaya.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">Roma 13:8</h4>
                            <small class="text-uppercase">PB</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Jangan ada seorangpun yang berhutang kepada orang lain, selain dari pada saling mengasihi, karena barangsiapa yang mengasihi sesamanya, telah memenuhi hukum.
                    </div>
                </div>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <div class="ps-4">
                            <h4 class="text-primary mb-1">2 Korintus 9:7</h4>
                            <small class="text-uppercase">PB</small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        Berikanlah dengan sukacita, dan sukacitalah, dan janganlah menyimpan kesedihan di hatimu karena pemberianmu, sebab Allah menyukai orang yang memberikan dengan sukacita.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- kutipan End -->

    <!-- Galeri Start -->
    <div id="galeri" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold warna-coklat text-uppercase">Galeri</h5>
                <h1 class="mb-0">Daftar Nama Pastor</h1>
            </div>
            
            <div class="row g-5">
            <?php
            $sql = "SELECT * FROM pastor ";
            $query = mysqli_query($koneksi,$sql);
            while($d=mysqli_fetch_array($query)){
            ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/<?php echo $d['foto'] ?>" alt="galeri1" width="500px">
                            <a class="position-absolute top-0 start-0 latar-coklat text-white rounded-end mt-5 py-2 px-4" href="">Pastor</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user warna-coklat me-2"></i>Admin</small>
                                <small><i class="far fa-calendar-alt warna-coklat me-2"></i> April, 2022</small>
                            </div>
                            <h4 class="mb-3"><?php echo $d['nama_pastor']?></h4>
                            <p><?php echo $d['keterangan'] ?></p>
                            
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/galeri2.png" alt="galeri2">
                            <a class="position-absolute top-0 start-0 latar-coklat text-white rounded-end mt-5 py-2 px-4" href="">Jadwal</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user warna-coklat me-2"></i>Admin</small>
                                <small><i class="far fa-calendar-alt warna-coklat me-2"></i> Sep, 2019</small>
                            </div>
                            <h4 class="mb-3">Jadwal Perayaan Ekaristi</h4>
                            <p>Ekaristi dilaksanakan sesuai jadwal yang telah ditentukan.</p>
                            <p><i> Sumber Foto : Google</i></p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="img/galeri3.png" alt="">
                            <a class="position-absolute top-0 start-0 latar-coklat text-white rounded-end mt-5 py-2 px-4" href="">Bangunan</a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user warna-coklat me-2"></i>Admin</small>
                                <small><i class="far fa-calendar-alt warna-coklat me-2"></i> Feb, 2019</small>
                            </div>
                            <h4 class="mb-3">Bangunan Gereja</h4>
                            <p>Bangunan Gereja Katolik pada sore hari.</p>
                            <p><i> Sumber Foto : Google</i></p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Galeri Start -->

<!-- Hubungi Start -->
<!-- <div id="kontak" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold warna-coklat text-uppercase">Hubungi Kami</h5>
                    <h1 class="mb-0">Kontak</h1>
                </div>
                <p class="mb-4">Anda dapat menghubungi kami dari kontak yang tertera dibawah ini :</p>
                <div class="row g-0 mb-3">
                    <div class="col wow zoomIn" data-wow-delay="0.2s">
                        <p class="mb-2"><i class="fa fa-envelope warna-coklat me-3"></i>sanfrancis.padangbulanmedan@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone warna-coklat me-3"></i>061-8214761</p>
                        <p class="mb-2"><i class="fab fa-whatsapp warna-coklat me-3"></i>0812 7860 5400</p>
                        <p class="mb-2"><i class="fab fa-facebook warna-coklat me-3"></i>Paroki St.Fransiskus Assisi - Padang Bulan</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/kontak.png" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Hubungi End -->

    <!-- Gambar Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <img src="img/logo_keuskupan.png" alt="">
                    <img src="img/gb1.png" alt="">
                    <img src="img/gb2.png" alt="">
                    <img src="img/gb3.png" alt="">
                    <img src="img/gb4.png" alt="">
                    <img src="img/gb6.png" alt="">
                    <img src="img/gb7.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Gambar End -->
    
    <!-- Footer Start -->
    <div id="kontak" class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5 ">
                <div class="col-sm-12 col-md-6 mb-2 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 p-4">
                        <div class="d-flex">
                            <!-- maps -->
                            <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.1865483092583!2d98.64877361408942!3d3.544402351585687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312ff98ec21b79%3A0x7fdfecd8ac1ebbfd!2sGereja%20Santo%20Fransiskus%20Asisi!5e0!3m2!1sid!2sid!4v1679587533698!5m2!1sid!2sid" style="border:0; " width="365px" height="350px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-2 footer-about">
                    <div class="d-flex flex-column h-100 p-4">
                        <div class="section-title-sm position-relative pb-1 mb-0">
                            <div class="text-center">
                                <img src="img/logo_keuskupan.png" width="80px" alt="">
                                <img src="img/logo_st.fransiskus.png" width="80px" alt="">
                                <img src="img/unika.png" width="80px" alt="">
                                <h5 class="text-light mb-0">
                                    Keuskupan Agung Medan <br>
                                    Paroki St. Fransiskus Assisi Padang Bulan Medan
                                </h5>
                                <hr class="bg-warning my-2 pb-1" width="100%">
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Jl. Bunga Ester No. 93B, Padang Bulan Selayang II, Kec. Medan Selayang, Padang Bulan Medan - 20131</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">061-8214761</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-whatsapp text-primary me-2"></i>
                            <p class="mb-0">0812 7860 5400</p>
                        </div>
                        <p class="mb-0">Dibuat oleh : Tiffany Prayoga Ziraluo (Mahasiswa Prodi Sistem Informasi Universitas Katolik Santo Thomas)</p>
                        <div class="mt-4">
                            <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100083602938020&mibextid=ZbWKwL"><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-primary btn-square" href="https://instagram.com/parokipadangbulan?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-8 col-md-6 border border-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5 border border-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Kontak</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">Jl. Bunga Ester No. 93B, Padang Bulan Selayang II, Kec. Medan Selayang, Padang Bulan Medan - 20131</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">061-8214761</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-whatsapp text-primary me-2"></i>
                                <p class="mb-0">0812 7860 5400</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100083602938020&mibextid=ZbWKwL"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="https://instagram.com/parokipadangbulan?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <div class="container-fluid text-white" style="background: #4d3401;">
        <div class="container text-center">
            <div class="row justify-content-end">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; 
                            <script type="text/javascript">
                                new Date().getFullYear()>document.write(new Date().getFullYear());
                            </script>
                            - SIPDM Gereja Katolik Paroki St. Fransiskus Assisi Padang Bulan Medan. All Rights Reserved</p>
                    </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg bg-danger text-white btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>