<?php
include 'koneksi.php';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Transaksi</title>

    <style>
        body {
            font-family: Arial;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: center;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>

<body onload="window.print()">

<h3>LAPORAN TRANSAKSI PENJUALAN HELM</h3>

<table>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jenis Helm</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>

    <?php
    $no = 1;
    $total_semua = 0;

    $query = "SELECT * FROM transaksi 
              WHERE tanggal LIKE '%$keyword%' 
              OR jenis_helm LIKE '%$keyword%'
              ORDER BY id DESC";

    $data = mysqli_query($koneksi, $query);

    while ($d = mysqli_fetch_assoc($data)) {
        $total_semua += $d['total'];
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['tanggal'] ?></td>
            <td><?= $d['jenis_helm'] ?></td>
            <td>Rp <?= number_format($d['harga']) ?></td>
            <td><?= $d['jumlah'] ?></td>
            <td>Rp <?= number_format($d['total']) ?></td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="5"><b>Total Keseluruhan</b></td>
        <td><b>Rp <?= number_format($total_semua) ?></b></td>
    </tr>
</table>

</body>
</html>
