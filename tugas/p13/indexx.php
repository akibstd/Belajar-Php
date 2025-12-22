<?php
include "koneksi.php";


if (isset($_POST['proses'])) {

    $nama_barang  = $_POST['nama_barang'];
    $kategori     = $_POST['kategori'];
    $kode_barang  = $_POST['kode_barang'];
    $masa_pakai   = (int) $_POST['masa_pakai'];
    $jumlah_stock = (int) $_POST['jumlah_stock'];


    switch (strtolower($nama_barang)) {
        case "roti":
            $harga_satuan = 5000;
            break;
        case "air mineral":
            $harga_satuan = 3000;
            break;
        case "beras":
            $harga_satuan = 12000;
            break;
        default:
            $harga_satuan = 10000;
    }

    $nilai_persediaan = $jumlah_stock * $harga_satuan;
    $tanggal_expired  = date("Y-m-d", strtotime("+$masa_pakai days"));

    $sql = "INSERT INTO barang 
            (nama_barang, kategori, kode_barang, masa_pakai, jumlah_stock, harga_satuan, nilai_persediaan, tanggal_expired)
            VALUES 
            ('$nama_barang','$kategori','$kode_barang','$masa_pakai','$jumlah_stock','$harga_satuan','$nilai_persediaan','$tanggal_expired')";

    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input dan Data Barang Akib mart</title>
</head>
<body>

<h2>Input Data Barang</h2>


<form method="post">
    <table>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama_barang" required></td>
        </tr>

        <tr>
            <td>Kategori</td>
            <td>
                <input type="radio" name="kategori" value="Makanan" required> Makanan
                <input type="radio" name="kategori" value="Minuman"> Minuman
                <input type="radio" name="kategori" value="Pangan"> Pangan
            </td>
        </tr>

        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="kode_barang" required></td>
        </tr>

        <tr>
            <td>Masa Pakai (hari)</td>
            <td><input type="number" name="masa_pakai" required></td>
        </tr>

        <tr>
            <td>Jumlah Stok</td>
            <td><input type="number" name="jumlah_stock" required></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="proses" value="Simpan">
            </td>
        </tr>
    </table>
</form>

<hr>

<h2>Data Barang</h2>


<form method="get">
    Cari Barang :
    <input type="text" name="keyword" placeholder="Nama / Kode Barang"
           value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>">
    <input type="submit" value="Cari">
    <a href="index.php">Reset</a>
</form>

<br>


<table border="1" cellpadding="5" cellspacing="0">
    <tr style="background:#f2f2f2;">
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga Satuan (Rp)</th>
        <th>Masa Pakai</th>
        <th>Nilai Persediaan (Rp)</th>
        <th>Kode Barang</th>
        <th>Tanggal Expired</th>
    </tr>

<?php

if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
    $keyword = mysqli_real_escape_string($conn, $_GET['keyword']);
    $query   = "SELECT * FROM barang 
                WHERE nama_barang LIKE '%$keyword%' 
                OR kode_barang LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM barang";
}

$result = mysqli_query($conn, $query);
$total  = 0;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $total += $row['nilai_persediaan'];
        echo "<tr>
                <td>{$row['nama_barang']}</td>
                <td>{$row['kategori']}</td>
                <td>{$row['jumlah_stock']}</td>
                <td>{$row['harga_satuan']}</td>
                <td>{$row['masa_pakai']}</td>
                <td>{$row['nilai_persediaan']}</td>
                <td>{$row['kode_barang']}</td>
                <td>{$row['tanggal_expired']}</td>
              </tr>";
    }

    echo "<tr>
            <td colspan='5'><b>Total Nilai Persediaan</b></td>
            <td colspan='3'><b>Rp $total</b></td>
          </tr>";
} else {
    echo "<tr><td colspan='8' align='center'>Data tidak ditemukan</td></tr>";
}
mysqli_close($conn);
?>

</table>

</body>
</html>
