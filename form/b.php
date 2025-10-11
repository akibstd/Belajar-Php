<?php 
$hasil=0;
  
if (isset($_POST['submit'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
     $hasil = $panjang * $lebar;

   
}
    
                 
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <label for="">Panjang</label>
    <input type="number" name="panjang"> <br> <br>

     <label for="">Lebar</label>
    <input type="number" name="lebar">  <br> <br>

    <button name="submit" type="submit">Hitung</button>
    </form>
   
   <table border="1"> 
    <thead>
        <tr>
            <th>panjang</th>
            <th>lebar</th>
            <th>Hasil</th>
        </tr>
    </thead>
    <tbody>
         <?php foreach($hasil as  $angka): ?>
          
        <tr>
            <td>10</td>
            <td>11</td>
            <td><?=$angka ?></td>
        </tr>
         <?php endforeach ?>
    </tbody>

   </table>
   
</body>
</html>


           
            