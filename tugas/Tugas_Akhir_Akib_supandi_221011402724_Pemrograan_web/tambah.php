<?php

include 'koneksi.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $tanggal    = $_POST['tanggal'];
    $nama_helm  = $_POST['nama_helm'];
    $jenis      = $_POST['jenis_helm'];
    $harga      = $_POST['harga'];
    $jumlah     = $_POST['jumlah'];
    $total      = $harga * $jumlah;
    $kasir      = $_SESSION['username'];

    mysqli_query($koneksi, "
        INSERT INTO transaksi 
        (tanggal, nama_helm, jenis_helm, harga, jumlah, total, kasir)
        VALUES 
        ('$tanggal','$nama_helm','$jenis','$harga','$jumlah','$total','$kasir')
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Tambah Transaksi Penjualan Helm</h5>
        </div>

        <div class="card-body">
            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Helm</label>
                    <input type="text" name="nama_helm" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Helm</label>
                    <select name="jenis_helm" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option>Full Face</option>
                        <option>Half Face</option>
                        <option>Open Face</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button name="simpan" class="btn btn-success">Simpan</button>
                </div>

            </form>
        </div>
    </div>

</div>

</body>
</html>
