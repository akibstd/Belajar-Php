<?php
include "db/koneksi.php";


if (isset($_POST['simpan'])) {
    $kode   = $_POST['kode'];
    $nama   = $_POST['nama'];
    $stok   = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $reorder= $_POST['reorder'];

    
    if (substr($kode,0,2)=="MK") $harga=130000;
    elseif (substr($kode,0,2)=="MG") $harga=150000;
    elseif (substr($kode,0,2)=="MY") $harga=37000;
    elseif (substr($kode,0,2)=="BR") $harga=28000;
    else $harga=0;

    
    $cek = mysqli_query($koneksi,"SELECT * FROM barang WHERE kode_produk='$kode'");
    if (mysqli_num_rows($cek)>0) {
        mysqli_query($koneksi,"
            UPDATE barang SET stok = stok + $stok
            WHERE kode_produk='$kode'
        ");
    } else {
        mysqli_query($koneksi,"
            INSERT INTO barang VALUES
            ('$kode','$nama','$stok','$satuan','$reorder','$harga')
        ");
    }
}


if (isset($_GET['hapus'])) {
    mysqli_query($koneksi,"DELETE FROM barang WHERE kode_produk='$_GET[hapus]'");
}


$edit=false;
if (isset($_GET['edit'])) {
    $edit=true;
    $e=mysqli_fetch_assoc(
        mysqli_query($koneksi,"SELECT * FROM barang WHERE kode_produk='$_GET[edit]'")
    );
}
?>

<!DOCTYPE html>
<html>
<head>
<title>DATA BARANG</title>
</head>

<body>

<h3>APLIKASI TOKO ONLINE "PAMULANG STORE"</h3>
<b>By : Akib Supandi</b>
<hr>

<a href="index.php">Stok Barang</a> |
<a href="pembayaran.php">Pembayaran</a> |
<a href="pemesanan.php">Pemesanan</a>

<h4>DATA BARANG</h4>

<form method="post">
<table cellpadding="5">
<tr>
    <td>Kode Produk</td>
    <td><input type="text" name="kode" required
        value="<?= $edit?$e['kode_produk']:'' ?>"
        <?= $edit?'readonly':'' ?>>
    </td>
</tr>
<tr>
    <td>Nama Produk</td>
    <td><input type="text" name="nama" required
        value="<?= $edit?$e['nama_produk']:'' ?>">
    </td>
</tr>
<tr>
    <td>Stok</td>
    <td><input type="number" name="stok" required></td>
</tr>
<tr>
    <td>Satuan</td>
    <td>
        <select name="satuan" required>
            <option value="">-- Pilihan --</option>
            <option value="Box">Box</option>
            <option value="Liter">Liter</option>
            <option value="Piece">Piece</option>
        </select>
    </td>
</tr>
<tr>
    <td>Re-Order</td>
    <td><input type="number" name="reorder" required
        value="<?= $edit?$e['reorder']:'' ?>">
    </td>
</tr>
<tr>
    <td colspan="2"><button name="simpan">SAVE</button></td>
</tr>
</table>
</form>

<h4>TAMPIL DATA BARANG</h4>

<table border="1" cellpadding="5">
<tr>
    <th>Kode Produk</th>
    <th>Nama Produk</th>
    <th>Stok</th>
    <th>Satuan</th>
    <th>Harga/Satuan</th>
    <th>Re-Order</th>
    <th>Keterangan</th>
    <th>Action</th>
</tr>

<?php
$data=mysqli_query($koneksi,"SELECT * FROM barang");
while($d=mysqli_fetch_assoc($data)){
    $ket = ($d['stok']>$d['reorder']) ? "Masih Cukup" : "Segera PO";
    echo "<tr>
        <td>$d[kode_produk]</td>
        <td>$d[nama_produk]</td>
        <td>$d[stok]</td>
        <td>$d[satuan]</td>
        <td>$d[harga]</td>
        <td>$d[reorder]</td>
        <td>$ket</td>
        <td>
            <a href='?edit=$d[kode_produk]'>Edit</a> |
            <a href='?hapus=$d[kode_produk]'>Delete</a>
        </td>
    </tr>";
}
?>
</table>

</body>
</html>
