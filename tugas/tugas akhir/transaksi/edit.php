<?php
include '../auth/cek_login.php';
include '../db/koneksi.php';

$id = $_GET['id'];


$data = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id='$id'");
$d = mysqli_fetch_assoc($data);


if (isset($_POST['update'])) {
    $tanggal    = $_POST['tanggal'];
    $nama_helm  = $_POST['nama_helm'];
    $jenis      = $_POST['jenis_helm'];
    $harga      = $_POST['harga'];
    $jumlah     = $_POST['jumlah'];
    $total      = $harga * $jumlah;

    mysqli_query($koneksi, "
        UPDATE transaksi SET
            tanggal='$tanggal',
            nama_helm='$nama_helm',
            jenis_helm='$jenis',
            harga='$harga',
            jumlah='$jumlah',
            total='$total'
        WHERE id='$id'
    ");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Transaksi Penjualan Helm</h5>
        </div>

        <div class="card-body">
            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"
                           value="<?= $d['tanggal']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Helm</label>
                    <input type="text" name="nama_helm" class="form-control"
                           value="<?= $d['nama_helm']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Helm</label>
                    <select name="jenis_helm" class="form-select" required>
                        <option <?= $d['jenis_helm']=='Full Face'?'selected':'' ?>>Full Face</option>
                        <option <?= $d['jenis_helm']=='Half Face'?'selected':'' ?>>Half Face</option>
                        <option <?= $d['jenis_helm']=='Open Face'?'selected':'' ?>>Open Face</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control"
                           value="<?= $d['harga']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control"
                           value="<?= $d['jumlah']; ?>" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                    <button name="update" class="btn btn-warning">Update</button>
                </div>

            </form>
        </div>
    </div>

</div>

</body>
</html>
