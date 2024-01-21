<?php 
session_start();
include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$hak_akses = $_POST['hak_akses'];

$data = mysqli_query($koneksi,"SELECT * from user where username='$username' and password='$password' and hak_akses='$hak_akses'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data);
    $db_hak_akses = $user['hak_akses'];

    if ($hak_akses == $db_hak_akses) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = $db_hak_akses . "_login";

        switch ($db_hak_akses) {
            case "admin":
                header("location: ../admin/");
                break;
            case "dpp":
                header("location: ../dpp/");
                break;
            case "pastor":
                header("location: ../pastor/");
                break;
            case "stasi":
                header("location: ../stasi/");
                break;
            default:
                header("location:login.php?pesan=tidak_valid");
                break;
        }
    } else {
        header("location:login.php?pesan=tidak_valid");
    }
} else {
    header("location:login.php?pesan=gagal");
}
?>