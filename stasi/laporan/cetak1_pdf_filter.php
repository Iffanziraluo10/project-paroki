<?php
    require "session2.php";

    require_once __DIR__ . '/../../vendor/autoload.php';
    
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

    $mpdf = new \Mpdf\Mpdf([
            'orientation' => 'L',
        ]);
        
    $nama_file = ('Laporan_Dana_Mandiri_Triwulan_ '.$triwulan.' _( '.$bulan[0].','.$bulan[1].','.$bulan[2].')_tahun_ '.$tahun.' _Wilayah_ '.$stasi.' ');
    ob_start();

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak PDF Filter 1</title>

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
        .table1, table{
            width: 100%;
        }
        th{
            text-align: center;
            padding: 8px 0px 8px 0px;
            background-color: #dddddd;
        }
        .table1 {
            border: 1px solid;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        hr{
            background-color: black;
            margin-top: 5px;
            margin-bottom: 0px;
        }
        h4{
            text-align: center;
            font-size : 20px;
            font-style : bold;
        }
        </style>
    </head>
    <body>
    <div class="container-fluid">
    <table class="table2" style="border-style: none;">
        <tr>
            <td><img src="../../img/logo_st.fransiskus.png" width="100px" alt="Logo"></td>
            <td align="center">
                <h1>Keuskupan Agung Medan</h1>
                <h1>Paroki St. Fransiskus Assisi Padang Bulan Medan</h1>
                Jl. Bunga Ester No. 93B, Padang Bulan Selayang II, Kec. Medan Selayang, Padang Bulan Medan - 20131 <br>
                Telp. Kantor Sekretariat : 061-8214761 Email: sanfrancis.padangbulanmedan@gmail.com
                
            </td>
            <td><img src="../../img/logo_keuskupan.png" width="100px" alt="Logo"></td>
        </tr>
    </table>
        <hr>
        <h4>
            Laporan Pembayaran Dana Mandiri Triwulan <?= $triwulan ?> (<?= "$bulan[0]",",","$bulan[1]",",","$bulan[2]" ?>) tahun <?= $tahun?> <br>
            Wilayah <?= $stasi ?>
        </h4>
        <table class="table1" cellpadding="5" cellspacing ="0">
            <thead>
                <tr>
                    <th style="border: 1px solid;" rowspan="2">No</th>
                    <th style="border: 1px solid;" rowspan="2">Nomor KK</th>
                    <th style="border: 1px solid;" rowspan="2">Nama Kepala Keluarga</th>
                    <th style="border: 1px solid;" rowspan="2">Nama Lingkungan</th>
                    <th style="border: 1px solid;" colspan="3" align="center">Bulan</th>
                </tr>
                <tr>
                <?php
                    foreach ($bulan as $b){
                        echo "<th style='border: 1px solid;'>$b</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
            <?php

            $no = 1;
            
            $data = mysqli_query($koneksi,"SELECT *, SUM(IF(bulan = '$bulan[0]', dana_wajib, 0)) AS $bulan[0], SUM(IF(bulan = '$bulan[1]', dana_wajib, 0)) AS $bulan[1], SUM(IF(bulan = '$bulan[2]', dana_wajib, 0)) AS $bulan[2] FROM dana_mandiri 
            right join umat on dana_mandiri.id_umat=umat.id_umat 
            inner join stasi on umat.id_stasi=stasi.id_stasi
            inner join lingkungan on umat.id_lingkungan=lingkungan.id_lingkungan where nama_stasi = '$stasi'
            GROUP BY no_kk order by umat.id_umat asc");
            while($d=mysqli_fetch_assoc($data)){
                ?>
            <tr>
                <td style="border: 1px solid;"><?php echo $no++ ?></td>
                <td style="border: 1px solid;"><?php echo $d['no_kk'] ?></td>
                <td style="border: 1px solid;"><?php echo $d['nama_kepala_kk'] ?></td>
                <td style="border: 1px solid;"><?php echo $d['nama_lingkungan'] ?></td>
                <td style="border: 1px solid;" align="center">
                    <?php 
                    if ($d[$bulan[0]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i>&#8730;</i>";
                    }
                    else{
                        echo "<i style='color:red;'>&#9747;</i>";
                    }
                    ?>
                </td>
                <td style="border: 1px solid;" align="center">
                    <?php 
                    if ($d[$bulan[1]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i>&#8730;</i>";
                    }
                    else{
                        echo "<i style='color:red;'>&#9747;</i>";
                    }
                    ?>
                </td>
                <td style="border: 1px solid;" align="center">
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
    <?php
        $html = ob_get_contents();
        ob_end_clean();
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->debug = true;
        $mpdf->Output(" ".$nama_file.".pdf","I");
    ?>
    </body>
    </html>