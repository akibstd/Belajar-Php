<?php
$harga_barang = [
    "ROTI" => 5000,
    "SUSU" => 8000,
    "BERAS" => 12000,
    "TEPUNG" => 7000,
    "GULA" => 10000,
    "KOPI" => 15000,
    "TEH" => 6000,
    "MIE" => 3000
   
];
$lokasi_simpan = ["rak 1", "rak 2", "rak 3"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST["nama_barang"] ?? "";
    $kategori = $_POST["kategori"] ?? "";
    $stock = $_POST["stock"] ?? 0;
    $masa_pakai = $_POST["masa_pakai"] ?? 0;
    $lokasi = $_POST["lokasi"] ?? "";
    
    $harga_satuan = $harga_barang[$nama_barang] ?? 0;
    $nilai_persediaan = $stock * $harga_satuan;
        $kode_barang = substr($nama_barang, 0, 1) . substr($nama_barang, -1, 1) . "-" . 
                   substr($nama_barang, 0, 2) . "-" . rand(1, 9);
    
    $tanggal_expired = date('Y-m-d', strtotime("+$masa_pakai days"));
}
?>
<h3>Masukan Makanan Akib Mart</h3>
<form method='post' action=''>
    <h5>Masukan Belanjaan</h5><br>
    <input type='text' name='nama_barang' value='<?php echo $nama_barang ?? ""; ?>'><br><br>
    <strong>KATEGORI</strong><br>
    <input type='radio' name='kategori' value='Makanan' <?php echo (($kategori ?? "") == 'Makanan') ? 'checked' : ''; ?>> Makanan<br>
    <input type='radio' name='kategori' value='Minuman' <?php echo (($kategori ?? "") == 'Minuman') ? 'checked' : ''; ?>> Minuman<br>
    <input type='radio' name='kategori' value='Pangan' <?php echo (($kategori ?? "") == 'Pangan') ? 'checked' : ''; ?>> Pangan<br><br>
    <select name='lokasi'>
        <option value=''>-- Pilih Lokasi --</option>
        <?php
        foreach ($lokasi_simpan as $lok) {
            $selected = (($lokasi ?? "") == $lok) ? 'selected' : '';
            echo "<option value='$lok' $selected>$lok</option>";
        }
        ?>
    </select><br><br>
    <strong>MASA PAKAI</strong><br>
    <input type='number' name='masa_pakai' value='<?php echo $masa_pakai ?? ""; ?>'> hari<br><br>
    <strong> STOCK</strong><br>
    <input type='number' name='stock' value='<?php echo $stock ?? ""; ?>'><br><br>
    <input type='submit' name='proses' value='PROSES'>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['proses'])) {
    echo "<br><h3>OUTPUT:</h3>";
    echo "<table border='1' style='width:100%'>";
    echo "<tr>
            <th>NAMA BARANG</th>
            <th>KATEGORI</th>
            <th>STOCK</th>
            <th>HARGA SATUAN</th>
            <th>MASA PAKAI</th>
            <th>LOKASI SIMPAN</th>
            <th>NILAI PERSEDIAAN</th>
            <th>KODE BARANG</th>
            <th>TANGGAL EXPIRE</th>
          </tr>";
         
    echo "<tr>
            <td>$nama_barang</td>
            <td>$kategori</td>
            <td>$stock</td>
            <td>Rp " . number_format($harga_satuan, 0, ',', '.') . "</td>
            <td>$masa_pakai hari</td>
            <td>$lokasi</td>
            <td>Rp " . number_format($nilai_persediaan, 0, ',', '.') . "</td>
            <td>$kode_barang</td>
            <td>$tanggal_expired</td>
          </tr>";
    echo "</table>";
    echo "<br><strong>TOTAL PERSEDIAAN: Rp " . number_format($nilai_persediaan, 0, ',', '.') . "</strong>";
}
?>
<br><br>
<strong>Daftar Harga Satuan:</strong><br>
<?php
foreach ($harga_barang as $nama => $harga) {
    echo "$nama: Rp " . number_format($harga, 0, ',', '.') . "<br>";
}
 echo "---------------Akib Supandi--------------------------------";
?>
