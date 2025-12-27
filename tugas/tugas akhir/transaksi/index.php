<?php
include '../auth/cek_login.php';
include '../db/koneksi.php';


?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Transaksi</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Data Transaksi Penjualan Helm</h4>
            </div>

            <div class="card-body">

                <a href="tambah.php" class="btn btn-success mb-3">
                    + Tambah Transaksi
                </a>

                <table class="table table-bordered table-striped table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jenis Helm</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY id DESC");

                        while ($d = mysqli_fetch_assoc($data)) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['tanggal']; ?></td>
                                <td><?= $d['jenis_helm']; ?></td>
                                <td>Rp <?= number_format($d['harga']); ?></td>
                                <td><?= $d['jumlah']; ?></td>
                                <td><strong>Rp <?= number_format($d['total']); ?></strong></td>
                                <td>
                                    <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <a href="delete.php?id=<?= $d['id']; ?>" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>