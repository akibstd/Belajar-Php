<?php 
 $angka = 12;

    
    $angkaKali = array(15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45);
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
            <td>angka1</td>
            <td>operator</td>
             <td>angka2</td>
             <td>hasil</td>
        </tr>
       </thead>

         
         <?php foreach($angkaKali as  $angka2): ?>
            <?php  $hasil=$angka * $angka2 ?>
            <tr>
                <td><?=$angka?></td>
                <td>kali</td>
                 <td> <?=$angka2 ?></td>
                 <td><?= $hasil ?></td>
                 
            </tr>
       </tbody>

           <tbody>
       <?php endforeach ?>
    </table>
</body>
</html>
