<?php
    include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Dana Mandiri | Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/logo_keuskupan.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- Select2 -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" > -->
    
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> -->
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar  pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <img src="../img/logo_admin.png" alt="logo">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="../img/user.png" alt="user" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href=".././index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href=".././pastor.php" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Data Pastor</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Kelola Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href=".././umat.php" class="dropdown-item"><i class="fa fa-user-friends"></i> Data Umat</a>
                            <a href=".././stasi.php" class="dropdown-item"><i class="fa fa-place-of-worship"></i>  Data Stasi</a>
                            <a href=".././lingkungan.php" class="dropdown-item"><i class="fa fa-home"></i> Data Lingkungan</a>
                        </div>
                    </div>
                    <a href=".././kdana.php" class="nav-item nav-link active"><i class="fa fa-hand-holding me-2"></i>Kelola Dana Mandiri</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-folder-open me-2"></i>Kelola Laporan</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href=".././laporan1.php" class="dropdown-item"><i class="fa fa-folder-open"></i> Laporan Dana Mandiri</a>
                                <a href=".././laporan2.php" class="dropdown-item"><i class="fa fa-folder-open"></i>  Laporan Uang Masuk</a>
                            </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="../img/logo_admin.png" alt="logo">
                </a>
                <a href="#" class="sidebar-toggler coklat flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="../img/user.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <!-- <a href=".././edit_profil.php" class="dropdown-item">Edit Profil</a> -->
                            <a href=".././logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Data Dana Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Tambah Dana Mandiri</h6>
                        <a href="../kdana.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <form action="" method="POST" name="Form" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" id="nokk" name="nokk" onkeyup="showData(this.value)">

                            <!-- id_umat -->
                            <input type="hidden" class="form-control" id="idumat" name="id_umat1" readonly>
                            <!-- nama kk -->
                            <i>Atas nama</i>
                            <input type="text" class="form-control" id="namakk" name="namakk1" readonly>
                        </div>
                        <label for="" class="form-label">Bulan</label>
                        <div class="mb-3 ">
                            <?php
                                $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                foreach ($bulan as $b) {
                                echo "<div class='form-check form-check-inline'>";
                                echo "<input type='checkbox' class='form-check-input' id='flexCheckDefault' name='bulan[]' value='$b' >$b<br>";
                                
                                echo "</div>";
                                }
                            ?>
                        </div>
                        <label for="" class="form-label">Tahun</label>
                        <div class="mb-3">
                                <?php
                                for ($i = 0; $i < 26; $i++) {
                                    $tahun = 2015 + $i;
                                    // $tahun = date("Y", strtotime("+$i year"));
                                    echo "<div class='form-check form-check-inline'>";
                                    echo "<input type='checkbox' class='form-check-input' id='tahun1' name='tahun[]' value='$tahun' >$tahun<br>";
                                    echo "</div>";
                                }
                                ?>
                            
                        </div>
                        <label for="" class="form-label">Dana Wajib</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" id="dwajib" name="dwajib">
                            <input type="hidden" readonly class="form-control" id="dwajib2" name="dwajib2">
                        </div>
                        <label for="" class="form-label">Dana Sukarela</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" name="dsukarela">
                        </div>
                        <div class="mb-3">
                            <label for="select-option" class="form-label">Nama Lingkungan</label>
                            <!-- hidden id lingkungan -->
                            <input type="hidden" name="lingkungan" class="form-control" id="ling1" readonly>
                            <!-- menampilkan nama lingkungan-->
                            <input type="text" class="form-control" id="nlingkungan1" name="nlingkungan" readonly> 
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Stasi / Wilayah</label>
                            <!-- hidden id stasi -->
                            <input type="hidden" name="stasi" class="form-control" id="id_stasi" readonly>
                            <!-- menampilkan nama stasi -->
                            <input type="text" class="form-control" id="nstasi" name="nstasi" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="select-option" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="tpembayaran" name="tpembayaran"> 
                        </div>
                        <button type="submit" class="btn btn-success" id="btn" name="tambah">Kirim</button>
                    </form>
                </div>
            </div>
            <!-- Data Dana End -->
            
            <?php
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

            // kirim
            if(isset($_POST['tambah'])){
                $iumat = $_POST['id_umat1'];
                $bulan = $_POST['bulan'];
                $tahun = implode (",", $_POST['tahun']);
                $jumlah_bulan = count($bulan);
                $hasilbagi = $_POST['dwajib2'];
                $nlingkungan = $_POST['lingkungan'];
                $nstasi = $_POST['stasi'];
                $dwajib = $_POST['dwajib'];
                $dsukarela = $_POST['dsukarela'];
                $tglbayar = $_POST['tpembayaran'];

                for($i=0; $i<$jumlah_bulan; $i++){
                    $query_tambah = mysqli_query($koneksi, "INSERT INTO dana_mandiri  VALUES ('','".$iumat."', '".$bulan[$i]."', '".$tahun."', '".$nstasi."', '".$nlingkungan."', '".$hasilbagi."', '".$dsukarela."', '".$tglbayar."')");
                    
                }

                if(mysqli_affected_rows($koneksi) > 0){
                    echo "<script>alert('Berhasil ditambahkan');</script>";
                    echo "<script>document.location = '../kdana.php'; </script>";
                } else {
                    die('Invalid query:'.mysqli_error($koneksi));
                }

                // if(!$query_tambah){
                //     die('Invalid query:'.mysqli_error($koneksi));
                // }

                // echo "<script>alert('Berhasil ditambahkan');</script>";
                // echo "<script>document.location = '../kdana.php'; </script>";
                
            }
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div id="txtHint">Info Bulan serta Tahun yang telah membayar ada disini...</div>
                </div>
            </div>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4" >
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col text-center">
                            &copy; 
                            <script type="text/javascript">
                                new Date().getFullYear()>document.write(new Date().getFullYear());
                            </script>
                            - SIPDM Gereja Katolik Paroki St. Fransiskus Assisi Padang Bulan Medan. All Right Reserved.
                        </div>
                    </div>
                </div>

            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg bg_coklat btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    
    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
    
    <script>
        //menangkap elemen input
        var nokk1 = document.getElementById("nokk");
        var idumat = document.getElementById("idumat");
        var namakk = document.getElementById("namakk");
        var idling = document.getElementById("ling1");
        var nlingkungan = document.getElementById("nlingkungan1");
        var id_st = document.getElementById("id_stasi");
        var nama_st = document.getElementById("nstasi");


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
            tampilkanData("idumat", data[i].id_umat);
            tampilkanData("namakk", data[i].nama_kepala_kk);
            tampilkanData("ling1", data[i].id_lingkungan);
            tampilkanData("nlingkungan1", data[i].nama_lingkungan);
            tampilkanData("id_stasi", data[i].id_stasi);
            tampilkanData("nstasi", data[i].nama_stasi);
            
            found = true;
            break;
            }
        }
        
        //jika tidak ditemukan, menghapus nilai input2 dan input3
        if (!found) {
            hapusNilai("idumat");
            hapusNilai("namakk");
            hapusNilai("ling1");
            hapusNilai("nlingkungan1");
            hapusNilai("nstasi");
        }
        });

        //event saat input1 dihapus
        nokk1.addEventListener("keydown", function(event) {
        if (event.keyCode === 8 || event.keyCode === 46) {
            hapusNilai("idumat");
            hapusNilai("namakk");
            hapusNilai("ling1");
            hapusNilai("nlingkungan1");
            hapusNilai("nstasi");
        }
        });

    </script>
    <script type="text/javascript">
        function validateForm() {
            var a = document.forms["Form"]["nokk"].value;   
            var b = document.forms["Form"]["bulan"].value;   
            var c = document.forms["Form"]["tahun"].value;
            var d = document.forms["Form"]["nlingkungan"].value;  
            var e = document.forms["Form"]["nstasi"].value;     
            var f = document.forms["Form"]["dwajib"].value;
            var g = document.forms["Form"]["dsukarela"].value;
            var h = document.forms["Form"]["tpembayaran"].value;
            if (a == "" || b =="" || c =="" || d =="" || e =="" || f =="" || g =="" || h =="") {
            alert("Form Tidak Boleh Kosong"); 
            return false;
            }
        }
    </script>
    <!-- menghitung dana wajib per-bulan -->
    <script>
        // Ambil element harga dan checkbox
        const hargaInput = document.getElementById('dwajib');
        const checkboxInputs = document.querySelectorAll('input[name="bulan[]"]');
        const hasilBagi = document.getElementById('dwajib2');

        // Tambahkan event listener pada input harga
        hargaInput.addEventListener('keyup', function () {
            const harga = parseInt(this.value);
            let counter = 0;

            // Cek setiap checkbox
            checkboxInputs.forEach(function (checkbox) {
                if (harga >= (counter + 1) * 10000) {
                    checkbox.checked = true;
                } else {
                    checkbox.checked = false;
                }
                counter++;
            });
            // menghitung harga yang dimasukkan
            const jumlahCheckbox = Math.ceil(harga/10000);
            hasilBagi.value = harga/jumlahCheckbox;
        });
    </script>
    <script>
        function showData(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "Info Bulan serta Tahun yang telah membayar ada disini....";
                return;
            }
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
            xhttp.open("GET", "ajax.php?nokk="+str);
            xhttp.send();
        }
    </script>
    
</body>
</html>