<?php
session_start();
include '../db/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, 
    "SELECT * FROM users WHERE username='$username' AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['username'] = $data['username'];
    header("Location: dashboard.php");
} else {
    echo "Login gagal!";
}
?>
