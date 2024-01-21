<?php 
	include "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan | <?= $stasi ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo_keuskupan1.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

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
        <div class="sidebar pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <img src="img/logo_admin.png" alt="logo">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user1.png" alt="user" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Admin</h6>
                        <span><?= $stasi ?></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Kelola Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="umat.php" class="dropdown-item"><i class="fa fa-user-friends"></i> Data Umat</a>
                            <a href="lingkungan.php" class="dropdown-item"><i class="fa fa-home"></i> Data Lingkungan</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-folder-open me-2"></i>Kelola Laporan</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="laporan1.php" class="dropdown-item active"><i class="fa fa-folder-open"></i> Laporan Dana Mandiri</a>
                                <a href="laporan2.php" class="dropdown-item"><i class="fa fa-folder-open"></i>  Laporan Uang Masuk</a>
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
                    <img src="img/logo_admin.png" alt="logo">
                </a>
                <a href="#" class="sidebar-toggler coklat flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user1.png" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Admin <?= $stasi ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="logout.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Data Dana Mandiri Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="mb-0">Laporan Dana Mandiri</h1>
                    </div>
                    <form method="POST" name="Form" action="laporan/laporan1_filter.php" onsubmit="return validateForm()">
                    <div class="row">
                        <div class="col-3">
                            <h5>Filter Berdasarkan</h5>
                        </div>
                        <div class="col-3">
                            <!-- Triwulan Bulan -->
                            <select class="form-select" name="bulan">
                                <option value="">--Bulan--</option>
                                <option value="1">Januari - Maret</option>
                                <option value="2">April - Juni</option>
                                <option value="3">Juli - September</option>
                                <option value="4">Oktober - Desember</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" name="tahun">
                                <option value="">--Tahun--</option>
                                <?php 
                                $start_year = 2015;
                                $end_year = date('Y') + 10;
                                for ($i = $start_year; $i <= $end_year; $i++) {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" target="_blank"><i class="fa fa-filter"></i> Filter</button>
                            
                        </div>
                    </div>
                    </form>
                    
                    <div class="table-responsive mt-2" style="color:black;">
                        <table id="example" class="display" style="width:100%; background-color: white; color: black;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor KK</th>
                                    <th>Nama Umat</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Nama Lingkungan</th>
                                    <th>Dana Wajib</th>
                                    <th>Dana Sukarela</th>
                                    <th>Tanggal Pembayaran</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                $data = mysqli_query($koneksi,"SELECT * from dana_mandiri 
                                inner join umat on dana_mandiri.id_umat=umat.id_umat 
                                inner join lingkungan on dana_mandiri.id_lingkungan=lingkungan.id_lingkungan 
                                inner join stasi on dana_mandiri.id_stasi=stasi.id_stasi where nama_stasi = '$stasi' ");		
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['no_kk'] ?></td>
                                    <td><?php echo $d['nama_kepala_kk'] ?></td>
                                    <td><?php echo $d['bulan'] ?></td>
                                    <td><?php echo $d['tahun'] ?></td>
                                    <td><?php echo $d['nama_lingkungan'] ?></td>
                                    <td>Rp<?php echo number_format ($d['dana_wajib'],0, ',', '.') ?></td>
                                    <td>Rp<?php echo number_format ($d['dana_sukarela'],0, ',', '.') ?></td>
                                    <td><?php echo tgl_indo ($d['tgl_pembayaran']) ?></td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php
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
            <!-- Data Dana Mandiri End -->


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
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
    <script>
        function validateForm() {
            var a = document.forms["Form"]["bulan"].value;
            var b = document.forms["Form"]["tahun"].value;
            if (a == "" || b =="" ) {
                alert("Harap diisi !!!"); 
            return false;
            }
        }
    </script>
</body>

</html>