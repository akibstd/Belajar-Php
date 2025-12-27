<?php
include '../auth/cek_login.php';
include '../db/koneksi.php';

$id = $_GET['id'];


mysqli_query($koneksi, "DELETE FROM transaksi WHERE id='$id'");


header("Location: index.php");
