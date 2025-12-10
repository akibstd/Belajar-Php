<?php
$buku = [
    [
        "judul" => "Algoritma Pemrograman",
        "penulis" => "Andi Wijaya",
        "penerbit" => "Erlangga",
        "tahun" => 2021,
        "halaman" => 250,
        "isbn" => "9786020001234", 
        "jumlah" => 10,
        "harga" => 85000
    ],
    [
        "judul" => "Dasar Basis Data",
        "penulis" => "Budi Santoso",
        "penerbit" => "Informatika",
        "tahun" => 2020,
        "halaman" => 300,
        "isbn" => "", 
        "jumlah" => 7,
        "harga" => 92000
    ],
    [
        "judul" => "Pemrograman Web PHP",
        "penulis" => "Citra Lestari",
        "penerbit" => "Gramedia",
        "tahun" => 2022,
        "halaman" => 280,
        "isbn" => "9786020005678",
        "jumlah" => 12,
        "harga" => 75000
    ],
    [
        "judul" => "Jaringan Komputer",
        "penulis" => "Dedi Gunawan",
        "penerbit" => "Andi Offset",
        "tahun" => 2019,
        "halaman" => 340,
        "isbn" => "",
        "jumlah" => 5,
        "harga" => 99000
    ],
    [
        "judul" => "Kecerdasan Buatan",
        "penulis" => "Eka Pratama",
        "penerbit" => "Informatika",
        "tahun" => 2023,
        "halaman" => 400,
        "isbn" => "9786020012345",
        "jumlah" => 8,
        "harga" => 120000
    ]
];




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

  
</head>
<body>

    <h2>Daftar Data Buku</h2>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Halaman</th>
            <th>ISBN</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>

        <?php foreach($buku as $index => $item): ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= $item["judul"] ?></td>
            <td><?= $item["penulis"] ?></td>
            <td><?= $item["penerbit"] ?></td>
            <td><?= $item["tahun"] ?></td>
            <td><?= $item["halaman"] ?></td>
            <td><?= $item["isbn"] ?: "Tidak ada" ?></td>
            <td><?= $item["jumlah"] ?></td>
            <td>Rp <?= number_format($item["harga"], 0, ",", ".") ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>