<?php

$barang = [
    ["nama" => "Buku",      "jumlah" => 2, "harga_satuan" => 17500],
    ["nama" => "Mouse",     "jumlah" => 5, "harga_satuan" => 30000],
    ["nama" => "FlashDisk", "jumlah" => 1, "harga_satuan" => 70000],
    ["nama" => "Pulpen",    "jumlah" => 3, "harga_satuan" => 22300],
];

$uang_dibayar = 350000;



$total_harga = 0;

foreach ($barang as $key => $brg) {
    $harga = $brg["jumlah"] * $brg["harga_satuan"];
    $barang[$key]["harga"] = $harga;
    $total_harga += $harga;
}


$diskon = 0;
if ($total_harga >= 500000) {
    $diskon = 0.10;
} elseif ($total_harga >= 200000) {
    $diskon = 0.05;
}

$potongan = $total_harga * $diskon;
$bayar    = $total_harga - $potongan;



// ============================
$selisih = $uang_dibayar - $bayar;

$keterangan = "Cukup";
if ($selisih > 0) {
    $keterangan = "Lebih";
} elseif ($selisih < 0) {
    $keterangan = "Kurang";
}

$selisih = abs($selisih);


$fmt_total_harga  = "Rp " . number_format($total_harga, 0, ",", ".");
$fmt_potongan     = "Rp " . number_format($potongan, 0, ",", ".");
$fmt_bayar        = "Rp " . number_format($bayar, 0, ",", ".");
$fmt_uang_dibayar = "Rp " . number_format($uang_dibayar, 0, ",", ".");
$fmt_selisih      = "Rp " . number_format($selisih, 0, ",", ".");

foreach ($barang as $key => $brg) {
    $barang[$key]["fmt_harga_satuan"] = "Rp " . number_format($brg["harga_satuan"], 0, ",", ".");
    $barang[$key]["fmt_harga"]        = "Rp " . number_format($brg["harga"], 0, ",", ".");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemesanan</title>
</head>
<body>

<h2>Daftar Pemesanan Peralatan Kantor</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Harga</th>
    </tr>

    <?php foreach ($barang as $brg): ?>
        <tr>
            <td><?= $brg["nama"] ?></td>
            <td><?= $brg["jumlah"] ?></td>
            <td><?= $brg["fmt_harga_satuan"] ?></td>
            <td><?= $brg["fmt_harga"] ?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan="3">Total Harga</td>
        <td><?= $fmt_total_harga ?></td>
    </tr>
    <tr>
        <td colspan="3">Diskon (<?= $diskon * 100 ?> %)</td>
        <td><?= $fmt_potongan ?></td>
    </tr>
    <tr>
        <td colspan="3">Jumlah Harus Dibayar</td>
        <td><?= $fmt_bayar ?></td>
    </tr>
    <tr>
        <td colspan="3">Uang Dibayarkan</td>
        <td><?= $fmt_uang_dibayar ?></td>
    </tr>
    <tr>
        <td colspan="3">Uang Kurang/Lebih</td>
        <td><?= $fmt_selisih ?></td>
    </tr>
    <tr>
        <td colspan="3">Keterangan</td>
        <td><?= $keterangan ?></td>
    </tr>
</table>

</body>
</html>
