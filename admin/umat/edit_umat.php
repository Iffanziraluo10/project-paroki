<?php
    include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Data Umat | Admin</title>
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
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Kelola Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href=".././umat.php" class="dropdown-item active"><i class="fa fa-user-friends"></i> Data Umat</a>
                            <a href=".././stasi.php" class="dropdown-item"><i class="fa fa-place-of-worship"></i>  Data Stasi</a>
                            <a href=".././lingkungan.php" class="dropdown-item"><i class="fa fa-home"></i> Data Lingkungan</a>
                        </div>
                    </div>
                    <a href=".././kdana.php" class="nav-item nav-link"><i class="fa fa-hand-holding me-2"></i>Kelola Dana Mandiri</a>
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
                        <h6 class="mb-0">Edit Data Umat</h6>
                        <a href="../umat.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"SELECT * from umat inner join lingkungan on umat.id_lingkungan=lingkungan.id_lingkungan inner join stasi on umat.id_stasi=stasi.id_stasi where id_umat='$id'");
					while($d = mysqli_fetch_array($data)){
                    ?>
                    <form action="" method="POST" name="Form" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $d['id_umat']; ?>">
                            <label for="" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" name="nokk" value="<?php echo $d['no_kk'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" name="namakk" value="<?php echo $d['nama_kepala_kk'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="select-option" class="form-label">Lingkungan</label>
                            <!-- data sebelumnya --> <br>
                            <i>Data Lingkungan saat ini</i>
                            <input type="text" class="form-control mb-2" name="ling_semb" value="<?php echo $d['nama_lingkungan'] ?>" readonly>
                            <i>Data Stasi saat ini</i>
                            <input type="text" class="form-control mb-2" name="stasi_semb" value="<?php echo $d['nama_stasi'] ?>" readonly>
                            
                            <i>Jika data di atas tetap maka isi sesuai data di atas</i>
                            <select class="form-select mb-3" id="select-option" name="lingkungan1">
                                <option value="">--Silahkan Pilih--</option>
                                <?php
                                    $query = "SELECT * FROM stasi";
                                    $result = mysqli_query($koneksi, $query);

                                    while ($rowStasi = mysqli_fetch_assoc($result)) {
                                        echo '<optgroup label="' . $rowStasi['nama_stasi'] . '">';

                                        $queryLingkungan = "SELECT * FROM lingkungan WHERE id_stasi = " . $rowStasi['id_stasi'];
                                        $resultLingkungan = mysqli_query($koneksi, $queryLingkungan);

                                        while ($rowLingkungan = mysqli_fetch_assoc($resultLingkungan)) {
                                            echo 
                                            '<option value= "'.$rowLingkungan['id_lingkungan'].'" 
                                            data-idstasi= "'.$rowLingkungan['id_stasi'].'" 
                                            data-idl= "'.$rowLingkungan['id_lingkungan'].'" 
                                            data-nstasi= "'.$rowStasi['nama_stasi'].'">
                                            '.$rowLingkungan['nama_lingkungan'].'
                                            </option>';
                                        }

                                        echo '</optgroup>';
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="input-text" class="form-label">Stasi/Wilayah</label>
                            <input type="text" id="stasi" class="form-control" name="stasi1" readonly>
                        </div>
                        <input type="hidden" class="form-control" name="stasi" id="idstasi">
                        <input type="hidden" class="form-control" name="lingkungan" id="idlingkungan">
                        <button type="submit" class="btn btn-success" id="btn" name="edit">Kirim</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Data Lingkungan End -->
            
            <?php
            if(isset($_POST['edit'])){
                $id_umat = $_POST['id'];
                $nokk = $_POST['nokk'];
                $namakk = $_POST['namakk'];
                $stasi = $_POST['stasi'];
                $lingkungan = $_POST['lingkungan'];

                
                $query_edit = mysqli_query($koneksi, "UPDATE umat SET no_kk='$nokk', nama_kepala_kk='$namakk', id_lingkungan='$lingkungan', id_stasi='$stasi' where id_umat='$id_umat'");

                if(!$query_edit){
                    die('Invalid query:'.mysqli_error($koneksi));
                }

                echo "<script>alert('Berhasil diubah');</script>";
                echo "<script>document.location = '../umat.php'; </script>";
                
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
    <!-- <script>
        function getSelectedOption() {
        var selectOption = document.getElementById("select-option");
        var inputText = document.getElementById("stasi1");
        
        var selectedOptionValue = selectOption.options[selectOption.selectedIndex].value;
        
        inputText.value = selectedOptionValue;
        }
    </script> -->
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
    <script>
        function validateForm() {
            var a = document.forms["Form"]["nokk"].value;
            var b = document.forms["Form"]["namakk"].value;
            var c = document.forms["Form"]["lingkungan1"].value;
            var d = document.forms["Form"]["stasi1"].value;  
            if (a == "" || b =="" || c =="" || d =="") {
            alert("Form Tidak Boleh Kosong"); 
            return false;
            }
        }
    </script>
</body>
</html>