<?php
session_start();
if($_SESSION['status']!="stasi_login"){
    header("location: ../../login/login.php?pesan=belum_login");
    exit();
}
require "../../koneksi.php";


if ($_SESSION['username'] == "stasi_st_fransiskus_psr_vi"){
    $stasi = "Stasi St. Fransiskus Pasar VI";
} else if ($_SESSION['username'] == "stasi_st_petrus"){
    $stasi = "Stasi St. Petrus Simpang Kwala";
} else if ($_SESSION['username'] == "stasi_laurensius"){
    $stasi = "Stasi St. Laurensius Simpang Selayang";
} else if ($_SESSION['username']== "stasi_st_paulus"){
    $stasi = "Stasi Santo Paulus Pasar Baru";
} else if ($_SESSION['username']== "stasi_st_theresia"){
    $stasi = "Stasi Santa Theresia Perumnas";
} else if($_SESSION['username']== "stasi_st_yoseph"){
    $stasi = "Stasi Santo Yoseph Gedung Johor";
}

?>