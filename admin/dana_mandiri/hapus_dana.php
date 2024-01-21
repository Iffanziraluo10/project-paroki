<?php
include '../../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE from dana_mandiri where id_dana='$id'");

echo "<script>alert('Berhasil dihapus');</script>";
echo "<script>document.location = '../kdana.php'; </script>";
?>