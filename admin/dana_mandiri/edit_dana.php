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

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                            <a href=".././logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Data Lingkungan Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Edit Data Dana Mandiri</h6>
                        <a href="../kdana.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"SELECT * from dana_mandiri inner join umat on dana_mandiri.id_umat=umat.id_umat inner join lingkungan on dana_mandiri.id_lingkungan=lingkungan.id_lingkungan inner join stasi on dana_mandiri.id_stasi=stasi.id_stasi where id_dana='$id'");
					while($d = mysqli_fetch_array($data)){
                    ?>
                    <form action="" method="POST" name="Form" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $d['id_dana']; ?>">
                            <label for="" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" name="nokk" value="<?php echo $d['no_kk'] ?>" readonly>
                            <i>Atas nama</i>
                            <input type="text" class="form-control" name="namakk" value="<?php echo $d['nama_kepala_kk'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Bulan</label>
                            <?php
                            $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            $bulan1 = $d['bulan'];
                            echo '<select class="form-select mb-3" name="nbulan">';
                            foreach ($bulan as $b) {
                                $selected = ($b == $bulan1)? 'selected' : '';
                                echo "<option value='$b' $selected >" .$b. 
                                "</option>";
                            }
                            echo '</select>';
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="">Tahun</label>
                            <?php
                            $tahun = array();
                            for ($i = 2015 ; $i <= 2040; $i++) {
                                $tahun[] = $i;
                            }
                            $tahun1 = $d['tahun'];
                            echo '<select class="form-select mb-3" name="ntahun">';
                            // echo '<option>--Silahkan Pilih--</option>';
                            foreach ($tahun as $c) {
                                
                                $selected = ($c == $tahun1)? 'selected' : '';
                                echo "<option value='$c' $selected>" .$c. 
                                "</option>";
                            }
                            echo "</select>";
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Lingkungan</label>
                            <input type="text" class="form-control" name="nlingkungan" value="<?php echo $d['nama_lingkungan'] ?>" readonly>
                            
                        </div>
                        <div class="mb-3">
                            <label for="input-text" class="form-label">Stasi/Wilayah</label>
                            <input type="text" id="stasi" class="form-control" name="nstasi" value="<?php echo $d['nama_stasi'] ?>" readonly>
                        </div>
                        <label for="" class="form-label">Dana Wajib</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" oninput="checkNominal()" max="10000" id="dwajib" name="dwajib" value="<?php echo $d['dana_wajib']?>" required>
                            <i id="error-msg" style="color:red;"></i>
                        </div>
                        <label for="" class="form-label">Dana Sukarela</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="text" class="form-control" id="dsukarela" name="dsukarela" value="<?php echo $d['dana_sukarela']?>">
                        </div>
                        <div class="mb-3">
                            <label for="input-text" class="form-label">Tanggal Pembayaran</label>
                            <input type="date" id="tpembayaran" class="form-control" name="tpembayaran" value="<?php echo $d['tgl_pembayaran'] ?>" >
                        </div>
                        <button type="submit" class="btn btn-success" id="btn" name="edit">Perbarui</button>
                    </form>
                    <?php } ?>
                </div>
                <?php
                
                ?>
            </div>
            <!-- Data Lingkungan End -->
            
            <?php
            if(isset($_POST['edit'])){
                $id_dana = $_POST['id'];
                $bulan = $_POST['nbulan'];
                $tahun = $_POST['ntahun'];
                $dwajib = $_POST['dwajib'];
                $dsukarela = $_POST['dsukarela'];
                $tgl = $_POST['tpembayaran'];

                $query_edit = mysqli_query($koneksi, "UPDATE dana_mandiri SET bulan='$bulan', tahun='$tahun', dana_wajib='$dwajib', dana_sukarela='$dsukarela', tgl_pembayaran='$tgl' where id_dana='$id_dana'");

                if(!$query_edit){
                    die('Invalid query:'.mysqli_error($koneksi));
                    
                }

                echo "<script>alert('Berhasil diubah');</script>";
                echo "<script>document.location = '../kdana.php'; </script>";
                
            }
            ?>

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
        function checkNominal() {
            var nominalInput = document.getElementById("dwajib");
            var errorDiv = document.getElementById("error-msg");
            
            if (nominalInput.value > 10000) {
                errorDiv.innerHTML = "Nominal tidak boleh melebihi 10000";
                nominalInput.setCustomValidity("Nominal tidak boleh melebihi 10000");
            } else {
                errorDiv.innerHTML = "";
                nominalInput.setCustomValidity("");
            }
        }
    </script>
    <!-- ambil id stasi dan id lingkungan -->
    <script>
        const selectOption = document.querySelector("#select-option");
		const idstasi = document.querySelector("#idstasi");
		const idlingkungan = document.querySelector("#idlingkungan");
		const nstasi = document.querySelector("#stasi");

		selectOption.addEventListener("change", function() {
			//ambil data dari select option yang dipilih
			const ids = selectOption.options[selectOption.selectedIndex].getAttribute("data-idstasi");
			const idl = selectOption.options[selectOption.selectedIndex].getAttribute("data-idl");
			const namastasi = selectOption.options[selectOption.selectedIndex].getAttribute("data-nstasi");

			//tampilkan data di dalam input text
			idstasi.value = ids;
			idlingkungan.value = idl;
            stasi.value = namastasi;
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
            var h = document.forms["Form"]["namakk"].value;
            if (a == "" || b =="" || c =="" || d =="" || e =="" || f =="" || g =="" || h == "") {
            alert("Form Tidak Boleh Kosong"); 
            return false;
            }
        }
    </script>
</body>
</html>