<?php
include "Koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>p13</title>
</head>
<body>

<h2>Floris mart</h2>


<form method="post">
    Nama Bunga :
    <select name="bunga" required>
        <option value="">-- Pilih Bunga --</option>
        <option value="Anggrek">Anggrek</option>
        <option value="Mawar">Mawar</option>
        <option value="Sedap Malam">Sedap Malam</option>
    </select><br><br>

    Jumlah Beli :
    <input type="number" name="jumlah" required><br><br>

    Kirim :
    <input type="checkbox" name="kirim" value="Ya"> Ya<br><br>

    Jarak :
    <input type="radio" name="jarak" value="0-5"> 0–5 Km
    <input type="radio" name="jarak" value="5-10"> 5–10 Km
    <input type="radio" name="jarak" value=">10"> >10 Km<br><br>

    <input type="submit" name="proses" value="PROSES">
</form>

<hr>

<?php

if (isset($_POST['proses'])) {

    $bunga  = $_POST['bunga'];
    $jumlah = (int) $_POST['jumlah'];
    $kirim  = isset($_POST['kirim']) ? "Ya" : "Tidak";
    $jarak  = isset($_POST['jarak']) ? $_POST['jarak'] : "-";

   
    switch ($bunga) {
        case "Anggrek":
            $harga = 10000;
            break;
        case "Mawar":
            $harga = 8000;
            break;
        default:
            $harga = 5000;
    }

    $subtotal = $harga * $jumlah;

    
    if ($subtotal >= 1000000) {
        $diskon = 0.05 * $subtotal;
    } elseif ($subtotal >= 500000) {
        $diskon = 0.02 * $subtotal;
    } else {
        $diskon = 0;
    }

  
    if ($kirim == "Ya") {
        if ($jarak == "0-5") {
            $biaya_kirim = 0;
        } elseif ($jarak == "5-10") {
            $biaya_kirim = 20000;
        } else {
            $biaya_kirim = 50000;
        }
    } else {
        $biaya_kirim = 0;
    }

    $total_bayar = $subtotal - $diskon + $biaya_kirim;
   
    $sql = "INSERT INTO transaksi 
            (nama_bunga, harga, jumlah, kirim, jarak, biaya_kirim, total_bayar)
            VALUES 
            ('$bunga', '$harga', '$jumlah', '$kirim', '$jarak', '$biaya_kirim', '$total_bayar')";

    if (mysqli_query($conn, $sql)) {
        echo "<b>Data berhasil disimpan!</b><br><br>";
    } else {
        echo "<b>Gagal  data!</b><br><br>";
    }
}
?>


<form method="get">
    Cari :
    <input type="text" name="cari">
    <input type="submit" value="CARI">
</form>

<h3>TAMPIL DATA PENJUALAN Toko bunga Akib</h3>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Bunga</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Kirim</th>
        <th>Jarak</th>
        <th>Biaya Kirim</th>
        <th>Total Bayar</th>
    </tr>

<?php
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $query = "SELECT * FROM transaksi WHERE nama_bunga LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM transaksi ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
$no = 1;

if (mysqli_num_rows($result) > 0) {
    while ($data = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$no}</td>
                <td>{$data['nama_bunga']}</td>
                <td>Rp ".number_format($data['harga'],0,",",".")."</td>
                <td>{$data['jumlah']}</td>
                <td>{$data['kirim']}</td>
                <td>{$data['jarak']}</td>
                <td>Rp ".number_format($data['biaya_kirim'],0,",",".")."</td>
                <td>Rp ".number_format($data['total_bayar'],0,",",".")."</td>
              </tr>";
        $no++;
    }
} else {
    echo "<tr><td colspan='8'>Belum ada data</td></tr>";
}
?>
</table>

</body>
</html>
