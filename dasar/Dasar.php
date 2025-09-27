<?php
$data1 = 56;
echo "<b> file php pertama saya <br> ini php dalah html </b>";
echo "<h1> nilai 1 adalah $data1 </h1>";

// $nilai1 = 10;
// $nilai2 = 20;
// $hasil = $nilai1 + $nilai2;

// $buku= 17500;
// $mouse=15000;
// $plasdisk=70000;
// $pulpen=321900;
// $diskon=0.5;
// $hasil1=$buku*2;
// $hasil2=$mouse*5;
// $hasil3=$pulpen*3;
// $total=$hasil1 + $hasil2 + $plasdisk + $hasil3;
// $totallan= $total - $diskon;

$jumlah=[1,2,3,4,5];
$barang=[
  'buku'=>17500,
   'mouse'=>15000,
   'pulpen'=>22000,
   'plasdisk'=>30000
];

$hasilbuku=$barang['buku'] * $jumlah[1];
$hasilMouse=$barang['mouse'] * $jumlah[4];
$hasilPlasdisk=$barang['plasdisk'] *$jumlah[0];
$hasilPulpen=$barang['pulpen'] *$jumlah[2];


$total=$hasilbuku +$hasilMouse +$hasilPlasdisk + $hasilPulpen;
$diskon= 0.05;

$totalAkhir=$total - $diskon;








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {}
    </style>
</head>

<body>



   <table border="1"  >
                    <tr>
                        <th >Nama Barang</th>
                        <th >jumlah</th>
                        <th >Satuan</th>
                        <th >Jumlah Harga</th>
                       
                    </tr>
               
            <tr>
              <td>Buku</td>
               <td> 2</td>
               <td><?=$barang['buku'] ?></td>
               <td><?= $hasilbuku ?></td>
            </tr>

            <tr>
              <td>Mouse</td>
               <td> 5</td>
               <td><?=$barang['mouse']?></td>
               <td><?= $hasilMouse ?></td>
            </tr>

            <tr>
              <td>plashisk</td>
               <td> 1</td>
                <td><?=$barang['plasdisk']?></td>
               <td><?= $hasilPlasdisk ?></td>
            </tr>
             
             <tr>
              <td>pulpen</td>
               <td> 3</td>
               <td><?=$barang['pulpen'] ?></td>
               <td><?= $hasilPulpen ?></td>
            </tr>
            <tr>
                <td colspan="3">Total </td>
                <td>   <?= $total ?> <tr>
            </tr>
              <tr>
                <td colspan="3">Diskon 5%</td>
                <td ><?= $diskon ?></td>
              </tr>
              <tr>
                <td colspan="3">Total Bayar</td>
                 <td><?= $totalAkhir ?></td>
              </tr>
    </table>
</body>

</html>