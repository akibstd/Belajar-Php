<?php 

$tangkai=[
    'angrek'=>10000,
    'mawar'=>8000,
    'melati'=>6000,
    'sedapMalam'=>5000,
    'bangke'=>10000
];
  $jumlah=[1,2,3,4,5,6,7,8,9];
$jarak= null;
$diskon=2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>nama bunga</th>
                <th>harga</th>
            </tr>

        </thead>
           <tbody>
            <tr>
                <td>angrek</td>
                <td><?=$tangkai['angrek']?></td>
            </tr>
             <tr>
                <td>mawar</td>
                <td><?=$tangkai['mawar']?></td>
            </tr>
             <tr>
                <td>Melati</td>
                <td><?=$tangkai['melati']?></td>
            </tr>
            <tr>
                <td>sedap Malam</td>
                <td><?=$tangkai['sedapMalam']?></td>
            </tr>
            
             <tr>
                <td>Bangke</td>
                <td><?=$tangkai['bangke']?></td>
            </tr>
           </tbody>

           
    </table>

     <br>

    <table border="1">
        <thead>
            <tr>
                <th>nama bunga</th>
                <th>harga</th>
                <th>jumlah</th>
                <th>jarak</th>
                <th>biaya kirim</th>
                 <th>total</th>
                
            </tr>

        </thead>
           <tbody>
            <tr>
                <td>angrek</td>
                <td><?=$tangkai['angrek']?></td>
                <td><?=$jumlah[2]?></td>
                <td><?php $jarakangrek=5; echo $jarakangrek ?></td>
                <td>0</td>
                <td><?php $total=$tangkai['angrek']*$jumlah[2]; echo $total ?></td>
            </tr>

             <tr>
                <td>mawar</td>
                <td><?=$tangkai['mawar']?></td>
                <td><?=$jumlah[3]?></td>
                <td><?php $jarakmawar=6; echo $jarakmawar ?></td>
                <td>15</td>
                <td><?php $total=$tangkai['mawar']*$jumlah[3]; +15000; echo $total ?></td>
            </tr>

             <tr>
                <td>melati</td>
                <td><?=$tangkai['melati']?></td>
                <td><?=$jumlah[6]?></td>
                <td><?php $jarakmelati=7; echo $jarakmelati ?></td>
                <td>15</td>
                <td><?php $total=$tangkai['melati']*$jumlah[3]; +15000; echo $total ?></td>
            </tr>
           </tbody>

           
    </table>
</body>
</html>
