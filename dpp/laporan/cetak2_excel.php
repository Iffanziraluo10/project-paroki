<?php
    include "../../koneksi.php";
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan_dana_masuk_keseluruhan.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview</title>
    
    <style>
        *{
            background-color: white;
            color: black;
            font-family: Arial, Helvetica, sans-serif;
        }
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse
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
    <div class="table-responsive">
    <h4>
            Laporan Dana Masuk untuk Pembayaran Dana Mandiri<br>
    </h4>
    <table style="width:100%; background-color: white; color: black;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor KK</th>
                <th>Nama Umat</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Nama Stasi/Wilayah</th>
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
            inner join stasi on dana_mandiri.id_stasi=stasi.id_stasi order by id_dana asc");		
            while($d=mysqli_fetch_array($data)){
                ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['no_kk'] ?></td>
                <td><?php echo $d['nama_kepala_kk'] ?></td>
                <td><?php echo $d['bulan'] ?></td>
                <td><?php echo $d['tahun'] ?></td>
                <td><?php echo $d['nama_stasi'] ?></td>
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script>
        $(document).ready(function () {
        $('#example').DataTable();
    });
    </script>
</body>
</html>