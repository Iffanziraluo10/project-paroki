<?php
    require "session2.php";
    $stasi = $_GET['stasi'];
    $tahun = $_GET['tahun'];
    $triwulan = $_GET['bulan'];

    if ($triwulan == '1') {
        $start_date = $tahun . "-01-01";
        $end_date = $tahun . "-03-31";
        $bulan = array('Januari','Februari','Maret');
    } else if ($triwulan == '2') {
        $start_date = $tahun . "-04-01";
        $end_date = $tahun . "-06-30";
        $bulan = array('April','Mei','Juni');
    } else if ($triwulan == '3') {
        $start_date = $tahun . "-07-01";
        $end_date = $tahun . "-09-30";
        $bulan = array('Juli','Agustus','September');
    } else if ($triwulan == '4') {
        $start_date = $tahun . "-10-01";
        $end_date = $tahun . "-12-31";
        $bulan = array('Oktober','November','Desember');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Laporan Dana Mandiri</title>
    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    .kop-surat{
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    body{
        background-color: white;
        color: black;
        font-family: sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th{
        text-align: center;
        padding: 8px 0px 8px 0px;
        background-color: #dddddd;
    }
    table, td, th{
        border: 1px solid;
        
    }
    .logo {
        float: left;
        margin-right: 20px;
    }
    .logo1 {
        float: right;
        margin-left: 20px;
    }
    .logo img {
        max-width: 100px;
        height: auto;
    }
    .logo1 img {
        max-width: 100px;
        height: auto;
    }
    .title {
        margin-top: 30px;
        text-align: center;
    }
    .title h1 {
        font-size: 24px;
        margin-bottom: 5px;
    }
    .subtitle {
        margin-top: 5px;
        text-align: center;
        font-size: 16px;
    }
    hr{
        background-color: black;
        padding-bottom: 3px;
        margin-top: 0px;
    }
    h4{
        text-align: center;
    }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="kop-surat">
        <div class="logo">
            <img src="../../img/logo_st.fransiskus.png" width="600px" alt="Logo">
        </div>
        <div class="logo1">
            <img src="../../img/logo_keuskupan.png" width="600px" alt="Logo">
        </div>
        <div class="title text-uppercase">
            <h1>Keuskupan Agung Medan</h1>
            <h1>Paroki St. Fransiskus Asisi Padang Bulan Medan</h1>
        </div>
        <div class="subtitle">
            Jl. Bunga Ester No. 93B, Padang Bulan Selayang II, Kec. Medan Selayang, Padang Bulan Medan - 20131 <br>
            Telp. Kantor Sekretariat : 061-8214761 Email: sanfrancis.padangbulanmedan@gmail.com
        </div>
    </div>
    <hr>
    <h4>
        Pembayaran Dana Mandiri untuk Triwulan <?php echo "$triwulan"," (" ,"$bulan[0]", "," ,"$bulan[1]", "," ,"$bulan[2]" , ")" ?> tahun <?php echo $tahun ?> <br> Wilayah <?php echo $stasi ?>
    </h4>
    <div class="table-responsive">
        <table style="width:100%; background-color: white; color: black;">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama Lingkungan</th>
                <th colspan="3" align="center">Bulan</th>
                <th rowspan="2">Jumlah terkumpul</th>
            </tr>
            <tr>
                <?php
                    foreach ($bulan as $b){
                        echo "<th>$b</th>";
                    }
                    ?>
            </tr>
        </thead>
        <tbody>
        <?php
            include "../../koneksi.php";

            $no = 1;
            $total=0;
            $grandTotal = 0;
            $totalA = 0;
            $totalB = 0;
            $totalC = 0;
            $data = mysqli_query($koneksi,"SELECT lingkungan.nama_lingkungan, SUM(IF(bulan = '$bulan[0]' and tahun='$tahun', dana_wajib, 0)) AS jumlah1, SUM(IF(bulan = '$bulan[1]' and tahun='$tahun', dana_wajib, 0)) AS jumlah2, SUM(IF(bulan = '$bulan[2]' and tahun='$tahun', dana_wajib, 0)) AS jumlah3 FROM dana_mandiri right join lingkungan on dana_mandiri.id_lingkungan=lingkungan.id_lingkungan 
            inner join stasi on lingkungan.id_stasi=stasi.id_stasi where nama_stasi= '$stasi'  group by lingkungan.id_lingkungan order by lingkungan.id_lingkungan asc");
            while($d=mysqli_fetch_assoc($data)){
                ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['nama_lingkungan'] ?></td>
                <td>Rp
                    <?php echo number_format ($d['jumlah1'],0, ',', '.');
                    ?>
                </td>
                <td>Rp
                <?php echo number_format ($d['jumlah2'],0, ',', '.');
                    ?>
                </td>
                <td>Rp
                <?php echo number_format ($d['jumlah3'],0, ',', '.');
                    ?>
                </td>
                <td>Rp
                    <?php 
                    $kolom1= $d['jumlah1'];
                    $kolom2= $d['jumlah2'];
                    $kolom3= $d['jumlah3'];

                    $total = $kolom1 + $kolom2 + $kolom3;

                    echo number_format ($total,0, ',', '.') ?>
                </td>
            </tr>
            <?php
                $grandTotal += $total;
                $totalA += $kolom1;
                $totalB += $kolom2;
                $totalC += $kolom3;
            }
            ?>
            <tr>
                <td colspan="2" align="center"><b>Jumlah</b></td>
                <td align="center"><b>Rp<?php echo number_format($totalA,0, ',', '.');?></b> </td>
                <td align="center"><b>Rp<?php echo number_format($totalB,0, ',', '.');?></b> </td>
                <td align="center"><b>Rp<?php echo number_format($totalC,0, ',', '.');?></b> </td>
                <td align="center"><b>Rp<?php echo number_format($grandTotal,0, ',', '.');?></td>
            </tr>
        </tbody>
        </table>
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
</div>

<!-- datatables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
        $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>