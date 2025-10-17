<?php
$koneksi = mysqli_connect("localhost", "root", "", "p9");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
