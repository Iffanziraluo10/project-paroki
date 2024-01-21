<?php
session_start();
if($_SESSION['status']!=="admin_login"){
    header("location: ../../login/login.php?pesan=belum_login");
    exit();
}
include "../../koneksi.php";
?>