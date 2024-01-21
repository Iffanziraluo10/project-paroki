<?php
include 'session.php';
require_once __DIR__ . '/../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
        'orientation' => 'L',
    ]);
$nama_file = ('Laporan_Dana_Mandiri');
ob_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak PDF</title>

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
            Laporan Dana Masuk untuk Pembayaran Dana Mandiri<br>
        </h4>
        <table class="table1" cellpadding="5" cellspacing ="0">
            <thead>
                <tr>
                    <th style="border: 1px solid;">No</th>
                    <th style="border: 1px solid;">Nomor KK</th>
                    <th style="border: 1px solid;">Nama Umat</th>
                    <th style="border: 1px solid;">Bulan</th>
                    <th width="6%" style="border: 1px solid;">Tahun</th>
                    <th style="border: 1px solid;">Nama Stasi/Wilayah</th>
                    <th style="border: 1px solid;">Nama Lingkungan</th>
                    <th style="border: 1px solid;">Dana Wajib</th>
                    <th style="border: 1px solid;">Dana Sukarela</th>
                    <th style="border: 1px solid;">Tanggal Pembayaran</th>
                    
                </tr>
            </thead>
            <tbody>';
            <?php
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * from dana_mandiri 
                inner join umat on dana_mandiri.id_umat=umat.id_umat 
                inner join lingkungan on dana_mandiri.id_lingkungan=lingkungan.id_lingkungan 
                inner join stasi on dana_mandiri.id_stasi=stasi.id_stasi order by id_dana asc");		
                while($d=mysqli_fetch_array($data)){
                    ?>
                <tr>
                    <td style="border: 1px solid;"><?= $no++ ?></td>
                    <td style="border: 1px solid;"><?=  $d["no_kk"] ?></td>
                    <td style="border: 1px solid;"><?=  $d["nama_kepala_kk"] ?></td>
                    <td style="border: 1px solid;"><?= $d["bulan"] ?></td>
                    <td style="border: 1px solid;"><?= $d["tahun"] ?></td>
                    <td style="border: 1px solid;"><?= $d["nama_stasi"] ?></td>
                    <td style="border: 1px solid;"><?= $d["nama_lingkungan"] ?></td>
                    <td style="border: 1px solid;">Rp<?= number_format ($d['dana_wajib'],0, ",", ".") ?></td>
                    <td style="border: 1px solid;">Rp<?= number_format ($d['dana_sukarela'],0, ",", ".") ?></td>
                    <td style="border: 1px solid;"><?= tgl_indo ($d['tgl_pembayaran']) ?></td>
                </tr>
                    <?php
                } ?>
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
        };
        ?>
        </div>
    <?php
        $html = ob_get_contents();
        ob_end_clean();
        $mpdf->WriteHTML(utf8_encode($html));
        $mpdf->debug = true;
        $mpdf->Output("".$nama_file.".pdf","I");
    ?>
    </body>
    </html>