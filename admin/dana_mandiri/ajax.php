<?php
include "../../koneksi.php";

$id = $_GET['nokk'];

$sql = "SELECT *,
GROUP_CONCAT(DISTINCT CONCAT(
    CASE bulan
        WHEN 'Januari' THEN '1'
        WHEN 'Februari' THEN '2'
        WHEN 'Maret' THEN '3'
        WHEN 'April' THEN '4'
        WHEN 'Mei' THEN '5'
        WHEN 'Juni' THEN '6'
        WHEN 'Juli' THEN '7'
        WHEN 'Agustus' THEN '8'
        WHEN 'September' THEN '9'
        WHEN 'Oktober' THEN '10'
        WHEN 'November' THEN '11'
        WHEN 'Desember' THEN '12'
        
    END,
    ' (', tahun, ')'
) SEPARATOR ', ') AS nama_bulan_tahun
FROM dana_mandiri
INNER JOIN umat ON dana_mandiri.id_umat = umat.id_umat
INNER JOIN stasi ON dana_mandiri.id_stasi = stasi.id_stasi
INNER JOIN lingkungan ON dana_mandiri.id_lingkungan = lingkungan.id_lingkungan
WHERE no_kk = '$id'
GROUP BY dana_mandiri.id_umat ";

echo "<table class='table table-striped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>No KK</th>";
        echo "<th>Nama Umat</th>";
        echo "<th>Bulan(tahun) yang telah dibayar</th>";
        echo "<th>Nama Stasi</th>";
        echo "<th>Nama Lingkungan</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        
    $data = mysqli_query($koneksi,$sql);
    if (mysqli_num_rows($data)==0){
        echo "<tr col='5'>";
        echo "<td>Data Kosong</td>";
        echo "</tr>";
    } else{
        while($d=mysqli_fetch_array($data)){
            echo "<tr>";
            echo "<td>" . $d['no_kk'] . "</td>";
            echo "<td>" . $d['nama_kepala_kk'] . "</td>";
            echo "<td>" . $d['nama_bulan_tahun'] . "</td>";
            echo "<td>" . $d['nama_stasi'] . "</td>";
            echo "<td>" . $d ['nama_lingkungan'] . "</td>";
            echo "</tr>";
        }
    }
    
    echo "</tbody>";
    echo "</table>";

    echo "Keterangan : ". "1 = Januari, 2 = Februari, 3 = Maret dst";

?>