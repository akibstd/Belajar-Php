<?php
$koneksi = mysqli_connect("localhost", "root", "", "akib_toko_helm");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
