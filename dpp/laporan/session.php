<?php
session_start();
if($_SESSION['status']!=="dpp_login"){
    header("location:../../login/login.php?pesan=belum_login");
    exit();
}
include '../../koneksi.php';
?>