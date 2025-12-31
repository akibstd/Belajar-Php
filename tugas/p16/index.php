<?php
include "koneksi.php";


if (isset($_GET['hapus'])) {
    $id = (int) $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM barang WHERE id=$id");
    header("Location: index.php");
    exit;
}


$editData = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];
    $res = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
    $editData = mysqli_fetch_assoc($res);
}


if (isset($_POST['proses'])) {

    $id            = $_POST['id'] ?? '';
    $nama_barang   = $_POST['nama_barang'];
    $kategori      = $_POST['kategori'];
    $kode_barang   = $_POST['kode_barang'];
    $masa_pakai    = (int) $_POST['masa_pakai'];
    $jumlah_stock  = (int) $_POST['jumlah_stock'];

    switch (strtolower($nama_barang)) {
        case "roti": $harga_satuan = 5000; break;
        case "air mineral": $harga_satuan = 3000; break;
        case "beras": $harga_satuan = 12000; break;
        default: $harga_satuan = 10000;
    }

    $nilai_persediaan = $jumlah_stock * $harga_satuan;
    $tanggal_expired  = date("Y-m-d", strtotime("+$masa_pakai days"));

    if ($id == '') {
      
        $sql = "INSERT INTO barang 
        (nama_barang,kategori,kode_barang,masa_pakai,jumlah_stock,harga_satuan,nilai_persediaan,tanggal_expired)
        VALUES
        ('$nama_barang','$kategori','$kode_barang','$masa_pakai','$jumlah_stock','$harga_satuan','$nilai_persediaan','$tanggal_expired')";
    } else {
    
        $sql = "UPDATE barang SET
                nama_barang='$nama_barang',
                kategori='$kategori',
                kode_barang='$kode_barang',
                masa_pakai='$masa_pakai',
                jumlah_stock='$jumlah_stock',
                harga_satuan='$harga_satuan',
                nilai_persediaan='$nilai_persediaan',
                tanggal_expired='$tanggal_expired'
                WHERE id=$id";
    }

    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang Akib Mart</title>
</head>
<body>

<h2><?= $editData ? "Edit Data Barang" : "Input Data Barang" ?></h2>

<form method="post">
    <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

    <table>
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama_barang" required
                value="<?= $editData['nama_barang'] ?? '' ?>"></td>
        </tr>

        <tr>
            <td>Kategori</td>
            <td>
                <?php $kat = $editData['kategori'] ?? ''; ?>
                <input type="radio" name="kategori" value="Makanan" <?= $kat=="Makanan"?'checked':'' ?>> Makanan
                <input type="radio" name="kategori" value="Minuman" <?= $kat=="Minuman"?'checked':'' ?>> Minuman
                <input type="radio" name="kategori" value="Pangan" <?= $kat=="Pangan"?'checked':'' ?>> Pangan
            </td>
        </tr>

        <tr>
            <td>Kode Barang</td>
            <td><input type="text" name="kode_barang" required
                value="<?= $editData['kode_barang'] ?? '' ?>"></td>
        </tr>

        <tr>
            <td>Masa Pakai</td>
            <td><input type="number" name="masa_pakai" required
                value="<?= $editData['masa_pakai'] ?? '' ?>"></td>
        </tr>

        <tr>
            <td>Jumlah Stok</td>
            <td><input type="number" name="jumlah_stock" required
                value="<?= $editData['jumlah_stock'] ?? '' ?>"></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="proses">
                    <?= $editData ? "Update" : "Simpan" ?>
                </button>
                <?php if ($editData): ?>
                    <a href="index.php">Batal</a>
                <?php endif; ?>
            </td>
        </tr>
    </table>
</form>

<hr>

<h2>Data Barang Akib supandi</h2>

<form method="get">
    <input type="text" name="keyword" placeholder="Cari..."
           value="<?= $_GET['keyword'] ?? '' ?>">
    <button type="submit">Cari</button>
    
</form>

<br>

<table border="1" cellpadding="5">
    <tr>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Nilai</th>
        <th>Kode</th>
        <th>Expired</th>
        <th>Aksi</th>
    </tr>

<?php
$keyword = $_GET['keyword'] ?? '';
$sql = $keyword ?
"SELECT * FROM barang WHERE nama_barang LIKE '%$keyword%' OR kode_barang LIKE '%$keyword%'" :
"SELECT * FROM barang";

$res = mysqli_query($conn, $sql);
$total = 0;

while ($r = mysqli_fetch_assoc($res)) {
    $total += $r['nilai_persediaan'];
    echo "<tr>
        <td>$r[nama_barang]</td>
        <td>$r[kategori]</td>
        <td>$r[jumlah_stock]</td>
        <td>$r[harga_satuan]</td>
        <td>$r[nilai_persediaan]</td>
        <td>$r[kode_barang]</td>
        <td>$r[tanggal_expired]</td>
        <td>
            <a href='?edit=$r[id]'>Edit</a> | 
            <a href='?hapus=$r[id]' onclick='return confirm(\"Hapus data?\")'>Hapus</a>
        </td>
    </tr>";
}

echo "<tr>
        <td colspan='4'><b>Total</b></td>
        <td colspan='4'><b>Rp $total</b></td>
      </tr>";
?>

</table>

</body>
</html>
