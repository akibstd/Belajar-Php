<?php

include 'koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$id = $_GET['id'];


mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");


header("Location: index.php");
