<?php
    require "session2.php";
    $tahun = $_GET['tahun'];
    $triwulan = $_GET['triwulan'];

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

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan_dana_mandiri_triwulan_'$triwulan'_($bulan[0]_$bulan[1]_$bulan[2])_Wilayah_'$stasi'_tahun_'$tahun'.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Excel Filter 1</title>
    
    <style>
        *{
            background-color: white;
            color: black;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            
        }
        th{
            text-align: center;
            padding: 8px 0px 8px 0px;
            background-color: #dddddd;
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
            color: black;
            padding-bottom: 3px;
        }
        h4{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <h4>
        Pembayaran Dana Mandiri untuk Triwulan <?php echo "$triwulan"," (" ,"$bulan[0]", "," ,"$bulan[1]", "," ,"$bulan[2]" , ")" ?> tahun <?php echo $tahun ?> <br> Wilayah <?php echo $stasi ?>
    </h4>
    <div class="table-responsive">
        <table id="example" class="display" style="width:100%; background-color: white; color: black;">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nomor KK</th>
                    <th rowspan="2">Nama Kepala Keluarga</th>
                    <th rowspan="2">Nama Lingkungan</th>
                    <th colspan="3">Bulan</th>
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
            
            $data = mysqli_query($koneksi,"SELECT *, SUM(IF(bulan = '$bulan[0]', dana_wajib, 0)) AS $bulan[0], SUM(IF(bulan = '$bulan[1]', dana_wajib, 0)) AS $bulan[1], SUM(IF(bulan = '$bulan[2]', dana_wajib, 0)) AS $bulan[2] FROM dana_mandiri 
            right join umat on dana_mandiri.id_umat=umat.id_umat 
            inner join stasi on umat.id_stasi=stasi.id_stasi
            inner join lingkungan on umat.id_lingkungan=lingkungan.id_lingkungan where nama_stasi = '$stasi'
            GROUP BY no_kk order by umat.id_umat asc");
            while($d=mysqli_fetch_assoc($data)){
                ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['no_kk'] ?></td>
                <td><?php echo $d['nama_kepala_kk'] ?></td>
                <td><?php echo $d['nama_lingkungan'] ?></td>
                <td class="text-center">
                    <?php 
                    if ($d[$bulan[0]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i>&#8730;</i>";
                    }
                    else{
                        echo "<i style='color:red;'>&#9747;</i>";
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?php 
                    if ($d[$bulan[1]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i>&#8730;</i>";
                    }
                    else{
                        echo "<i style='color:red;'>&#9747;</i>";
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?php 
                    if ($d[$bulan[2]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i>&#8730;</i>";
                    }
                    else{
                        echo "<i style='color:red;'>&#9747;</i>";
                    }
                    ?>
                </td>
            </tr>
            <?php
                
            }
            ?>
            
        </tbody>
        </table>
    </div>
</div>

</body>
</html>