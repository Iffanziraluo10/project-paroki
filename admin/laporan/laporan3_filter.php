<?php

include '../../koneksi.php';
$triwulan = $_POST['bulan'];
$tahun = $_POST['tahun'];

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
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
</head>
<h4>Tahun : <?php echo $tahun ?></h4>
  <table border="2px">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nomor KK</th>
                <th rowspan="2">Nama Kepala Keluarga</th>
                <th rowspan="2">Nama Stasi/Wilayah</th>
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
            $no = 1;
            $data = mysqli_query($koneksi,"SELECT *, SUM(IF(bulan = '$bulan[0]', dana_wajib, 0)) AS $bulan[0], SUM(IF(bulan = '$bulan[1]', dana_wajib, 0)) AS $bulan[1], SUM(IF(bulan = '$bulan[2]', dana_wajib, 0)) AS $bulan[2] FROM dana_mandiri2 
            right join umat on dana_mandiri2.id_umat=umat.id_umat 
            inner join stasi on umat.id_stasi=stasi.id_stasi
            inner join lingkungan on umat.id_lingkungan=lingkungan.id_lingkungan
            GROUP BY no_kk order by umat.id_umat asc");
            
            while($d=mysqli_fetch_array($data)){
                ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $d['no_kk'] ?></td>
                <td><?php echo $d['nama_kepala_kk'] ?></td>
                <td><?php echo $d['nama_stasi'] ?></td>
                <td><?php echo $d['nama_lingkungan'] ?></td>
                <td>
                    <?php 
                    if ($d[$bulan[0]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i class='fa fa-check'></i>";
                    }
                    else{
                        echo "<i class='fa fa-times' style='color:red;'></i>";
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if ($d[$bulan[1]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i class='fa fa-check'></i>";
                    }
                    else{
                        echo "<i class='fa fa-times' style='color:red;'></i>";
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if ($d[$bulan[2]] == '10000' && $d['tahun'] == $tahun){
                        echo "<i class='fa fa-check'></i>";
                    }
                    else{
                        echo "<i class='fa fa-times' style='color:red;'></i>";
                    }
                    ?>
                </td>
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