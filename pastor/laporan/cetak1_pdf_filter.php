<?php
    include 'session.php';

    require_once __DIR__ . '/../../vendor/autoload.php';
    
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
                    <th style="border: 1px solid;" rowspan="2">Nama Lingkungan</th>
                    <th style="border: 1px solid;" colspan="3" align="center">Bulan</th>
                    <th style="border: 1px solid;" rowspan="2">Jumlah terkumpul</th>
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
                <td style="border: 1px solid;"><?php echo $no++ ?></td>
                <td style="border: 1px solid;"><?php echo $d['nama_lingkungan'] ?></td>
                <td style="border: 1px solid;">Rp
                    <?php echo number_format ($d['jumlah1'],0, ',', '.');
                    ?>
                </td>
                <td style="border: 1px solid;">Rp
                <?php echo number_format ($d['jumlah2'],0, ',', '.');
                    ?>
                </td>
                <td style="border: 1px solid;">Rp
                <?php echo number_format ($d['jumlah3'],0, ',', '.');
                    ?>
                </td>
                <td style="border: 1px solid;">Rp
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
                <td style="border: 1px solid;" colspan="2" align="center"><b>Jumlah</b></td>
                <td style="border: 1px solid;" align="center"><b>Rp<?php echo number_format($totalA,0, ',', '.');?></b> </td>
                <td style="border: 1px solid;" align="center"><b>Rp<?php echo number_format($totalB,0, ',', '.');?></b> </td>
                <td style="border: 1px solid;" align="center"><b>Rp<?php echo number_format($totalC,0, ',', '.');?></b> </td>
                <td style="border: 1px solid;" align="center"><b>Rp<?php echo number_format($grandTotal,0, ',', '.');?></td>
            </tr>
        </tbody>
        </table>
            <?php
            function tgl_indo($tanggal){
            $bulan = array (
                1 =>   "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
            );
            $pecahkan = explode("-", $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
    
            return $pecahkan[2] . " " . $bulan[ (int)$pecahkan[1] ] . " " . $pecahkan[0];
            }
            ?>
            
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