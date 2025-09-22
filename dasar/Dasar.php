<?php
$data1 = 56;
echo "<b> file php pertama saya <br> ini php dalah html </b>";
echo "<h1> nilai 1 adalah $data1 </h1>";

$nilai1 = 10;
$nilai2 = 20;
$hasil = $nilai1 + $nilai2;

$buku= 17500;
$mouse=15000;
$plasdisk=70000;
$pulpen=321900;

$hasil1=$buku*2;
$hasil2=$mouse*5;
$hasil3=$pulpen*3;
$total=$hasil1 + $hasil2 + $plasdisk + $hasil3;
$totallan= $total - 5;





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
               <td>17000</td>
               <td><?= $hasil1 ?></td>
            </tr>

            <tr>
              <td>Mouse</td>
               <td> 5</td>
               <td>3000</td>
               <td><?= $hasil2 ?></td>
            </tr>

            <tr>
              <td>plashisk</td>
               <td> 1</td>
               <td>70000</td>
               <td><?= $plasdisk ?></td>
            </tr>
             
             <tr>
              <td>pulpen</td>
               <td> 3</td>
               <td>22300</td>
               <td><?= $hasil3 ?></td>
            </tr>
            <tr>
                <td>Total </td>
                <td>   <?= $total ?> <tr>
            </tr>
              <tr>
                <td>Diskon 0,5</td>
                 <td>Total Bayar</td>
                 <td><?= $totallan ?></td>
              </tr>
    </table>
</body>

</html>