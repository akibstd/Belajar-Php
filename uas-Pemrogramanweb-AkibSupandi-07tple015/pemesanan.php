<?php
include "db/koneksi.php";


$q = mysqli_query($koneksi,"SELECT MAX(no_transaksi) AS maxkode FROM pemesanan");
$d = mysqli_fetch_assoc($q);

if ($d['maxkode'] == NULL) {
    $no_transaksi = "INV-001";
} else {
    $urut = (int) substr($d['maxkode'], 4, 3);
    $urut++;
    $no_transaksi = "INV-" . str_pad($urut, 3, "0", STR_PAD_LEFT);
}


if (isset($_POST['simpan'])) {
    $no     = $_POST['no_transaksi'];
    $tgl    = $_POST['tgl'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $cek = mysqli_query($koneksi,"SELECT * FROM pemesanan WHERE no_transaksi='$no'");
    if (mysqli_num_rows($cek) > 0) {
        mysqli_query($koneksi,"
            UPDATE pemesanan SET
            tgl_pemesanan='$tgl',
            nama_pembeli='$nama',
            alamat='$alamat'
            WHERE no_transaksi='$no'
        ");
    } else {
        mysqli_query($koneksi,"
            INSERT INTO pemesanan VALUES (
            '$no','$tgl','$nama','$alamat',0,'BELUM LUNAS','PROSES'
            )
        ");
    }
}

if (isset($_GET['hapus'])) {
    mysqli_query($koneksi,"
        DELETE FROM pemesanan
        WHERE no_transaksi='$_GET[hapus]'
    ");
}


$edit = false;
if (isset($_GET['edit'])) {
    $edit = true;
    $e = mysqli_fetch_assoc(
        mysqli_query($koneksi,"
            SELECT * FROM pemesanan
            WHERE no_transaksi='$_GET[edit]'
        ")
    );
}
?>

<!DOCTYPE html>
<html>
<head>
<title>DATA PEMESANAN</title>
</head>
<body>

<h3>APLIKASI TOKO ONLINE "PAMULANG STORE"</h3>
<b>By : Akib Supandi</b>
<hr>

<a href="index.php">Stok Barang</a> |
<a href="pemesanan.php">Pemesanan</a> |
<a href="pembayaran.php">Pembayaran</a>

<h4>FORM PEMESANAN</h4>

<form method="post">
<table cellpadding="5">
<tr>
    <td>No Transaksi</td>
    <td>
        <input type="text" name="no_transaksi"
        value="<?= $edit ? $e['no_transaksi'] : $no_transaksi ?>" readonly>
    </td>
</tr>

<tr>
    <td>Tanggal Pemesanan</td>
    <td>
        <input type="date" name="tgl"
        value="<?= $edit ? $e['tgl_pemesanan'] : date('Y-m-d') ?>" required>
    </td>
</tr>

<tr>
    <td>Nama Pembeli</td>
    <td>
        <input type="text" name="nama"
        value="<?= $edit ? $e['nama_pembeli'] : '' ?>" required>
    </td>
</tr>

<tr>
    <td>Alamat</td>
    <td>
        <textarea name="alamat" required><?= $edit ? $e['alamat'] : '' ?></textarea>
    </td>
</tr>

<tr>
    <td colspan="2">
        <button name="simpan">SIMPAN</button>
    </td>
</tr>
</table>
</form>

<h4>Rekap pemesanan</h4>

<table border="1" cellpadding="5">
<tr>
    <th>No Transaksi</th>
    <th>Tanggal</th>
    <th>Nama Pembeli</th>
    <th>Status Bayar</th>
    <th>Status Pesanan</th>
    <th>Aksi</th>
</tr>

<?php
$data = mysqli_query($koneksi,"SELECT * FROM pemesanan");
while ($d = mysqli_fetch_assoc($data)) {
    echo "<tr>
        <td>$d[no_transaksi]</td>
        <td>$d[tgl_pemesanan]</td>
        <td>$d[nama_pembeli]</td>
        <td>$d[status_bayar]</td>
        <td>$d[status_pesanan]</td>
        <td>
            <a href='?edit=$d[no_transaksi]'>Edit</a> |
            <a href='?hapus=$d[no_transaksi]'
               onclick=\"return confirm('Hapus data?')\">Delete</a>
        </td>
    </tr>";
}
?>
</table>

</body>
</html>
