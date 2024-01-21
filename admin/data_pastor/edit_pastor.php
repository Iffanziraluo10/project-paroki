<?php
    include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Pastor | Admin</title>
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
                    <a href=".././pastor.php" class="nav-item nav-link active"><i class="fa fa-users me-2"></i>Data Pastor</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Kelola Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href=".././umat.php" class="dropdown-item"><i class="fa fa-user-friends"></i> Data Umat</a>
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
                        <h6 class="mb-0">Edit Data Pastor</h6>
                        <a href="../pastor.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi,"SELECT * from pastor where id_pastor='$id'");
					while($d = mysqli_fetch_array($data)){
                    ?>
                    <form action="" method="POST" name="Form" onsubmit="return validateForm()" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="id" value="<?php echo $d['id_pastor']; ?>">
                            <label for="" class="form-label">Nama Pastor</label>
                            <input type="text" class="form-control" name="npastor" value="<?php echo $d['nama_pastor'] ?>">
                        </div>
                        <div class="mb-3">
                        <label for="" class="form-label">Foto</label>
                            <input type="hidden" class="form-control" name="flama" value="<?php echo $d['foto'] ?>" readonly>
                            <input type="file" class="form-control" name="fpastor">
                            <?php if($d['foto'] != "") { ?>
                                <img src="../../img/<?= $d['foto'] ?>" width="100"><br>
                            <?php } ?>
                            
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="ket" value="<?php echo $d['keterangan'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success" id="btn" name="edit">Perbarui</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Data Lingkungan End -->
            
            <?php
            if(isset($_POST['edit'])){
                // ambil nama
                $id_pastor = $_POST['id'];
                $nama = $_POST['npastor'];
                // $foto = $_POST['fpastor'];
                // $foto_lama = $_POST['flama'];
                $keterangan = $_POST['ket'];

                if($_FILES['fpastor']['name'] != "") {
                    // upload foto baru ke folder lokal
                    $nama_foto = $_FILES['fpastor']['name'];
                    $tmp_foto = $_FILES['fpastor']['tmp_name'];
                    $ukuran_foto = $_FILES['fpastor']['size'];
                    $tipe_foto = $_FILES['fpastor']['type'];

                    // validasi tipe file
                    $valid = array('jpg','jpeg','png');
                    $tipe = explode(".", $nama_foto);
                    $tipe = end($tipe);
                    $tipe = strtolower($tipe);

                    //periksa ukuran file
                    if ($ukuran_foto > 1000000) {
                        echo "<script>
                            alert('Ukuran foto terlalu besar (maksimal 1MB)');
                            </script>";
                        return false;
                    }

                    if(!in_array($tipe, $valid)) {
                        echo "<script>
                                alert('Upload foto dengan ekstensi jpg, jpeg, atau png');
                            </script>";
                        return false;
                    }

                    // ukuran foto
                    list($lebar, $tinggi) = getimagesize($tmp_foto);
                    
                    if (!$lebar >= 500 && !$tinggi >=350) {
                        echo "<script>alert('Ukuran Foto harus 500x350 px');
                        </script>";
                        return false;
                    } 

                    move_uploaded_file($tmp_foto, "../../img/".$nama_foto);
    
                    // update data di database dengan nama foto baru
                    $sql = "UPDATE pastor SET nama_pastor='$nama', foto='$nama_foto', keterangan='$keterangan' where id_pastor='$id_pastor'";

                } else{
                    $sql = "UPDATE pastor SET nama_pastor='$nama', keterangan='$keterangan' where id_pastor='$id_pastor'";
                }

                $query_edit=mysqli_query($koneksi,$sql);

                if(!$query_edit){
                    die('Invalid query:'.mysqli_error($koneksi));
                }
                echo "<script>alert('Berhasil diubah');</script>";
                echo "<script>document.location = '../pastor.php'; </script>";

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
    <script>
        function validateForm() {
            var a = document.forms["Form"]["npastor"].value;
            var b = document.forms["Form"]["fpastor"].value;
            var c = document.forms["Form"]["ket"].value;
            
            if (a == "" || b =="" || c=="" ) {
            alert("Form Tidak Boleh Kosong"); 
            return false;
            }
        }
    </script>
</body>
</html>