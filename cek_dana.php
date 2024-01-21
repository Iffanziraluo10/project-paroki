<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cek Dana Mandiri | SIPDM</title>
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
                <h5 class="m-0" style="font-size: 19px;">
                    <img src="img/logo_st.fransiskus.png" width="50px" alt="">
                    <img src="img/logo_keuskupan.png" width="50px" alt="">
                    Gereja Katolik Paroki St. Fransiskus Assisi Padang Bulan Medan
                </h5>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse text-sm-start" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Beranda</a>
                    <a href="index.php" class="nav-item nav-link">Tentang</a>
                    <a href="cek_dana.php" class="nav-item nav-link active">Cek Dana</a>
                    <a href="index.php" class="nav-item nav-link">Galeri</a>
                    <a href="index.php" class="nav-item nav-link">Kontak</a>
                    
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


    <!-- Cek Dana Start -->
    <div id="tentang" class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <div class="section-title text-center position-relative pb-3 mb-5">
                        <h5 class="fw-bold warna-coklat text-uppercase">Cek Dana Mandiri Anda</h5>
                        <h1 class="mb-0">SIPDM</h1>
                    </div>
                    <?php
                    if(isset($_POST['nokk'])){
                    ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Tahun</td>
                                <td>Bulan</td>
                                <td>Dana Wajib</td>
                                <td>Dana Sukarela</td>
                                <td>Tanggal Pembayaran</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $nokk = $_POST['nokk'];
                        $namaling = $_POST['lingkungan1'];
                        $nstasi = $_POST['stasi1'];
                        $query = "SELECT * FROM dana_mandiri 
                        inner join umat on dana_mandiri.id_umat=umat.id_umat
                        inner join lingkungan on dana_mandiri.id_lingkungan=lingkungan.id_lingkungan 
                        inner join stasi on dana_mandiri.id_stasi=stasi.id_stasi 
                        where umat.no_kk='$nokk' order by dana_mandiri.tahun and dana_mandiri.bulan asc ";
                        $data = mysqli_query($koneksi,$query);
                        if(mysqli_num_rows($data)){
                            echo "<p>Nomor Kartu Keluarga : $nokk</p>";
                            echo "<p>Nama Lingkungan : $namaling</p>";
                            echo "<p>Nama Wilayah/Stasi : $nstasi</p>";
                            while($d=mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td><?php echo $d['tahun']?></td>
                                <td><?php echo $d['bulan']?></td>
                                <td>Rp <?php echo number_format ($d['dana_wajib'], 0, ',', '.')?></td>
                                <td>Rp <?php echo number_format ($d['dana_sukarela'], 0, ',', '.')?></td>
                                <td><?php echo tgl_indo ($d['tgl_pembayaran']) ?></td>
                            </tr>
                            <?php 
                            }
                        }else{ ?>
                            <tr>
                                <td colspan="4">DATA TIDAK DITEMUKAN</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="cek_dana.php">CEK LAGI</a>
                    
                    <?php } else{
                    ?>
                    
                    <form action="cek_dana.php" method="POST" name="Form" onsubmit="return validateForm()">
                    
                    <div class="row g-0 mb-3">
                        <div class="col-4 wow zoomIn" data-wow-delay="0.4s">
                            <p class="mb-2">Nomor Kartu Keluarga (yang terdaftar) :</p>
                        </div>
                        <div class="col-6 wow zoomIn" data-wow-delay="0.4s">
                            <input type="text" class="form-control" id="nokk" name="nokk">
                        </div>
                    </div>
                    <div class="row g-0 mb-3">
                        <div class="col-4 wow zoomIn" data-wow-delay="0.4s">
                            <p class="mb-2">Nama Lingkungan :</p>
                        </div>
                        <div class="col-6 wow zoomIn" data-wow-delay="0.4s">
                            <input type="text" class="form-control" id="nling" name="lingkungan1" readonly>
                            
                            <input type="hidden" class="form-control" name="lingkungan" id="idlingkungan">
                        </div>
                    </div>
                    <div class="row g-0 mb-3">
                            <div class="col-4 wow zoomIn" data-wow-delay="0.4s">
                                <p class="mb-2">Nama Wilayah / Stasi :</p>
                            </div>
                            <div class="col-6 wow zoomIn" data-wow-delay="0.4s">
                                <input type="text" id="stasi" class="form-control" name="stasi1" readonly>
                                <input type="hidden" readonly class="form-control" name="stasi" id="idstasi">
                            </div>
                    </div>
                    <button class="btn btn-primary">Cek Dana</button>
                    </form>
                    
                    <?php } 
                        // ambil data
                        $query = "SELECT * from umat inner join lingkungan on umat.id_lingkungan=lingkungan.id_lingkungan inner join stasi on umat.id_stasi=stasi.id_stasi";
                        $result = mysqli_query($koneksi, $query);
                        
                        //mengubah data menjadi array asosiatif
                        $data = array();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $data[] = $row;
                        }
                        
                        //mengirim data ke JavaScript
                        echo '<script>var data = ' . json_encode($data) . ';</script>';

                        function tgl_indo($tanggal){
                            $bulan = array (
                                1 =>   'Januari',
                                'Februari',
                                'Maret',
                                'April',
                                'Mei',
                                'Juni',
                                'Juli',
                                'Agustus',
                                'September',
                                'Oktober',
                                'November',
                                'Desember'
                            );
                            $pecahkan = explode('-', $tanggal);
                            
                            // variabel pecahkan 0 = tanggal
                            // variabel pecahkan 1 = bulan
                            // variabel pecahkan 2 = tahun
                        
                            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Cek Dana End -->


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

    <!-- ambil id stasi dan id lingkungan -->
    <script>
        //menangkap elemen input
        var nokk1 = document.getElementById("nokk");
        var nlingkungan = document.getElementById("nling");
        var id_ling = document.getElementById("idlingkungan");
        var nama_st = document.getElementById("stasi");
        var id_st = document.getElementById("idstasi");


        //fungsi untuk menampilkan data ke input
        function tampilkanData(id, nilai) {
            document.getElementById(id).value = nilai;
        }

        //fungsi untuk menghapus nilai input
        function hapusNilai(id) {
        document.getElementById(id).value = "";
        }

        //event saat input1 diubah
        nokk1.addEventListener("keyup", function() {
        //mengecek apakah ada data yang cocok dengan input1
        var found = false;
        for (var i = 0; i < data.length; i++) {
            if (data[i].no_kk === nokk1.value) {
            //jika ditemukan, menampilkan data ke input2 dan input3
            tampilkanData("nling", data[i].nama_lingkungan);
            tampilkanData("idlingkungan", data[i].id_lingkungan);
            tampilkanData("stasi", data[i].nama_stasi);
            tampilkanData("idstasi", data[i].id_stasi);
            
            found = true;
            break;
            }
        }
        
        //jika tidak ditemukan, menghapus nilai input2 dan input3
        if (!found) {
            hapusNilai("nling");
            hapusNilai("idlingkungan");
            hapusNilai("stasi");
            hapusNilai("idstasi");
        }
        });

        //event saat input1 dihapus
        nokk1.addEventListener("keydown", function(event) {
        if (event.keyCode === 8 || event.keyCode === 46) {
            hapusNilai("nling");
            hapusNilai("idlingkungan");
            hapusNilai("stasi");
            hapusNilai("idstasi");
        }
        });
    </script>
    <script>
        function validateForm() {
            var a = document.forms["Form"]["nokk"].value;
            var b = document.forms["Form"]["lingkungan1"].value;
            var c = document.forms["Form"]["stasi1"].value;  
            if (a == "" || b =="" || c =="") {
            alert("Tidak Boleh Kosong"); 
            return false;
            }
        }
    </script>
</body>

</html>