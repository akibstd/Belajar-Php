<?php 

$tangkai = [
  'angrek' => 10000,
  'mawar' => 8000,
  'melati' => 6000,
  'sedapMalam' => 5000,
  'bangke' => 10000
];

$jumlah = [1,2,3,4,5,6,7,8,9];

$total = $tangkai['angrek'] * $jumlah[2];
$totalMawar = $tangkai['mawar'] * $jumlah[3];
$totalMelati = $tangkai['melati'] * $jumlah[6];
$totalBangkai = $tangkai['bangke'] * $jumlah[8];

$totalan = $total + $totalMawar + $totalMelati + $totalBangkai;

echo "<h2 align='center'>DATA PENJUALAN BUNGA</h2>";
echo "<table border='1' cellspacing='0' cellpadding='5' width='100%'>";
echo "<tr>
        <th>Nama Bunga</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Jarak</th>
        <th>Biaya Kirim</th>
        <th>Total</th>
      </tr>";

echo "<tr>
        <td>angrek</td>
        <td>{$tangkai['angrek']}</td>
        <td>{$jumlah[2]}</td>
        <td>5</td>
        <td>0</td>
        <td>$total</td>
      </tr>";

echo "<tr>
        <td>mawar</td>
        <td>{$tangkai['mawar']}</td>
        <td>{$jumlah[3]}</td>
        <td>3</td>
        <td>0</td>
        <td>$totalMawar</td>
      </tr>";

echo "<tr>
        <td>melati</td>
        <td>{$tangkai['melati']}</td>
        <td>{$jumlah[6]}</td>
        <td>3</td>
        <td>0</td>
        <td>$totalMelati</td>
      </tr>";

echo "<tr>
        <td>bangke</td>
        <td>{$tangkai['bangke']}</td>
        <td>{$jumlah[8]}</td>
        <td>5</td>
        <td>0</td>
        <td>$totalBangkai</td>
      </tr>";

echo "<tr>
        <td colspan='5'>Total Semua</td>
        <td>$totalan</td>
      </tr>";

echo "</table>";

echo "<h3>Jika jarak kurang dari 5 km gratis, 5 sampai 50 km biaya 15k</h3>";
echo "<h3>Minimal pembelian 500k dapat diskon</h3><br>";

// ===================================
// FITUR SEARCHING
// ===================================
echo "<h2>PENCARIAN DATA BUNGA</h2>";

$cari = "melati"; // bisa diganti manual atau dari input

if (array_key_exists($cari, $tangkai)) {
    echo "Bunga ditemukan:<br>";
    echo "Nama: $cari<br>";
    echo "Harga: {$tangkai[$cari]}<br>";
} else {
    echo "Bunga '$cari' tidak ditemukan!";
}

?>
