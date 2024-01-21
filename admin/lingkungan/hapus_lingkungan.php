<?php
include '../../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE from lingkungan where id_lingkungan='$id'");

echo "<script>alert('Berhasil dihapus');</script>";
echo "<script>document.location = '../lingkungan.php'; </script>";
?>