<?php
include '../../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE from stasi where id_stasi='$id'");

echo "<script>alert('Berhasil dihapus');</script>";
echo "<script>document.location = '../stasi.php'; </script>";
?>