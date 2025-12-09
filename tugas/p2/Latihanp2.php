<?php

$barang1 = "Buku";
$jumlah1 = 2;
$harga_satuan1 = 17500;
$harga1 = $jumlah1 * $harga_satuan1;

$barang2 = "Mouse";
$jumlah2 = 5;
$harga_satuan2 = 30000;
$harga2 = $jumlah2 * $harga_satuan2;

$barang3 = "FlashDisk";
$jumlah3 = 1;
$harga_satuan3 = 70000;
$harga3 = $jumlah3 * $harga_satuan3;

$barang4 = "Pulpen";
$jumlah4 = 3;
$harga_satuan4 = 22300;
$harga4 = $jumlah4 * $harga_satuan4;

$total_harga = $harga1 + $harga2 + $harga3 + $harga4;

$persen_diskon = 0;
if ($total_harga >= 500000) {
    $persen_diskon = 0.10;
} elseif ($total_harga >= 200000) {
    $persen_diskon = 0.05;
}

$nilai_diskon = $total_harga * $persen_diskon;
$jumlah_harus_dibayar = $total_harga - $nilai_diskon;

$uang_dibayarkan = 350000;

$selisih_uang = $uang_dibayarkan - $jumlah_harus_dibayar;
$keterangan_uang = "Cukup";

if ($selisih_uang > 0) {
    $keterangan_uang = "Lebih";
} elseif ($selisih_uang < 0) {
    $keterangan_uang = "Kurang";
    $selisih_uang = abs($selisih_uang);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pemesanan Peralatan Kantor</title>
</head>
<body>

    <table border="1">
        <thead>
            <tr>
                <th>Nama Peralatan</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $barang1 ?></td>
                <td class="right-align"><?= $jumlah1 ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga_satuan1,0,",",".") ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga1,0,",",".") ?></td>
            </tr>

            <tr>
                <td><?= $barang2 ?></td>
                <td class="right-align"><?= $jumlah2 ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga_satuan2,0,",",".") ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga2,0,",",".") ?></td>
            </tr>

            <tr>
                <td><?= $barang3 ?></td>
                <td class="right-align"><?= $jumlah3 ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga_satuan3,0,",",".") ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga3,0,",",".") ?></td>
            </tr>

            <tr>
                <td><?= $barang4 ?></td>
                <td class="right-align"><?= $jumlah4 ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga_satuan4,0,",",".") ?></td>
                <td class="right-align"><?= "Rp " . number_format($harga4,0,",",".") ?></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:right;"><strong>Total Harga</strong></td>
                <td class="right-align"><strong><?= "Rp " . number_format($total_harga,0,",",".") ?></strong></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:right;"><strong>Diskon (<?= $persen_diskon * 100 ?> %)</strong></td>
                <td class="right-align"><strong><?= "Rp " . number_format($nilai_diskon,0,",",".") ?></strong></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:right;"><strong>Jumlah Harus Dibayar</strong></td>
                <td class="right-align"><strong><?= "Rp " . number_format($jumlah_harus_dibayar,0,",",".") ?></strong></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:right;"><strong>Uang Dibayarkan</strong></td>
                <td class="right-align"><?= "Rp " . number_format($uang_dibayarkan,0,",",".") ?></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:right;"><strong>Uang Kurang/Lebih</strong></td>
                <td class="right-align"><?= "Rp " . number_format($selisih_uang,0,",",".") ?></td>
            </tr>

            <tr>
                <td colspan="3" style="text-align:right;"><strong>Keterangan</strong></td>
                <td class="right-align"><strong><?= $keterangan_uang ?></strong></td>
            </tr>
        </tbody>
    </table>

</body>
</html>
