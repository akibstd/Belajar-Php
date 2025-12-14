<?php

$harga_otomatis = [
    "Apel"   => 10000,
    "Mangga" => 12000,
    "Beras"  => 15000,
    "Roti"   => 8000,
    "Susu"   => 9000
];


echo "<form method='POST'>";


echo "<label>Nama Barang</label><br>";
echo "<select name='nama_barang'>";
foreach ($harga_otomatis as $nama_buah => $harga) {
    echo "<option value='$nama_buah'>$nama_buah</option>";
}
echo "</select><br><br>";


echo "<label>Kategori</label><br>";
echo "<input type='radio' name='kategori' value='Makanan' required> Makanan<br>";
echo "<input type='radio' name='kategori' value='Minuman'> Minuman<br>";
echo "<input type='radio' name='kategori' value='Pangan'> Pangan<br><br>";


echo "<label>Lokasi Penyimpanan</label><br>";
echo "<select name='lokasi'>";
echo "<option value='Lokasi 1'>Lokasi 1</option>";
echo "<option value='Lokasi 2'>Lokasi 2</option>";
echo "<option value='Lokasi 3'>Lokasi 3</option>";
echo "</select><br><br>";


echo "<label>Masa Pakai (hari)</label><br>";
echo "<input type='number' name='masa_pakai' required><br><br>";


echo "<label>Jumlah Stok</label><br>";
echo "<input type='number' name='stok' required><br><br>";


echo "<button type='submit' name='proses'>PROSES</button>";

echo "</form><br>";


if (isset($_POST['proses'])) {
    $nama_barang = $_POST['nama_barang'];
    $kategori    = $_POST['kategori'];
    $lokasi      = $_POST['lokasi'];
    $masa_pakai  = intval($_POST['masa_pakai']);
    $stok        = intval($_POST['stok']);

    
    $harga_satuan = $harga_otomatis[$nama_barang];

    
    $nilai_persediaan = $stok * $harga_satuan;
    $total_persediaan = $nilai_persediaan;

    
    $kode_barang =
        strtoupper(substr($nama_barang, 0, 1)) .
        strtoupper(substr($nama_barang, -1)) .
        "-" .
        strtoupper(substr($kategori, 0, 2)) .
        "-" .
        substr($stok, -1);

   
    $tanggal_expired = date('d-m-Y', strtotime("+$masa_pakai days"));

   
    echo "<h2>OUTPUT</h2>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr>
            <th>NAMA BARANG</th>
            <th>KATEGORI</th>
            <th>STOCK</th>
            <th>HARGA SATUAN</th>
            <th>MASA PAKAI</th>
            <th>LOKASI SIMPAN</th>
            <th>NILAI PERSEDIAAN</th>
            <th>KODE BARANG</th>
            <th>TANGGAL EXPIRED</th>
        </tr>";
    echo "<tr>
            <td>$nama_barang</td>
            <td>$kategori</td>
            <td>$stok</td>
            <td>" . number_format($harga_satuan, 0, ',', '.') . "</td>
            <td>{$masa_pakai} hari</td>
            <td>$lokasi</td>
            <td>" . number_format($nilai_persediaan, 0, ',', '.') . "</td>
            <td>$kode_barang</td>
            <td>$tanggal_expired</td>
        </tr>";
    echo "</table>";

    
    echo "<h3>Total harga: " . number_format($total_persediaan, 0, ',', '.') . "</h3>";
}
?>
