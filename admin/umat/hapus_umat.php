<?php
include '../../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE from umat where id_umat='$id'");

echo "<script>alert('Berhasil dihapus');</script>";
echo "<script>document.location = '../umat.php'; </script>";
?>