<?php
include '../auth/cek_login.php';
include '../db/koneksi.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
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
                <h4>Data Transaksi Penjualan Helm Akib Supandi</h4>
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <a href="tambah.php" class="btn btn-success">+ Tambah Transaksi</a>
                        <a href="cetak.php?keyword=<?= $keyword ?>" target="_blank" class="btn btn-danger">
                            Cetak PDF
                        </a>
                    </div>

                    <div class="col-md-6">
                        <form method="GET" class="d-flex">
                            <input type="text" name="keyword" class="form-control me-2" action="index.php"
                                value="<?= $keyword ?>">
                            <button class="btn btn-primary">Cari</button>
                        </form>
                    </div>
                </div>

                <table class="table table-bordered table-striped text-center">
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

                        if ($keyword != '') {
                            $query = "
                              SELECT * FROM transaksi
                                WHERE jenis_helm LIKE '%" . $keyword . "%'
                                  OR tanggal LIKE '%" . $keyword . "%'
                              ORDER BY id DESC
                                      ";
                        } else {
                            $query = "SELECT * FROM transaksi ORDER BY id DESC";
                        }
                        $data = mysqli_query($koneksi, $query) or die("Query Error: " . mysqli_error($koneksi));
                        if (mysqli_num_rows($data) > 0) {
                            while ($d = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $d['tanggal'] ?></td>
                                    <td><?= $d['jenis_helm'] ?></td>
                                    <td>Rp <?= number_format($d['harga']) ?></td>
                                    <td><?= $d['jumlah'] ?></td>
                                    <td><b>Rp <?= number_format($d['total']) ?></b></td>
                                    <td>
                                        <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="delete.php?id=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='7'>Data tidak ditemukan</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</body>

</html>