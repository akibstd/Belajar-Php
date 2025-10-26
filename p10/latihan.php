<?php 
if(isset($_POST['save'])){
 $nama=$_POST['nama'];
$golongan=$_POST['golongan'];
$status=$_POST['status'];
$jmlAnak=$_POST['jmlAnak'];
 
   if($golongan && $jmlAnak <4){
    $total= $golongan +30000;
       
   }

 

  echo $total;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P10</title>
</head>
<body>
    <form action="latihan.php" method="post" >
     
    <label for="" >Nama karyawan</label><br> <br>
    <input type="text" name="nama"><br> <br>

      <label for="">golongan</label>
      <input type="radio" name="golongan" value="1000000">A
      <input type="radio" name="golongan" value="1,500">B
      <input type="radio" name="golongan" value="200000">C  <br> <br>
    
    <label for="">Status</label> ::
    <select name="status" id="" name="status"><br> <br>
        <option value="">single</option> <br> <br>
        <option value="">nikah</option> <br> <br>
          <option value="">Janda/Duda</option> <br> <br>
    </select><br><br>

    <label for="">jumlah Anak</label> 
    <input type="number" name="jmlAnak"><br> <br>
      

    <button type="sumbit" name="save">Save</button>
    
    </form> <br> <br>

    <table border="1">
        <thead>
            <tr>
                <td>Nama Karyawan</td>
                <td>Jenis Karyawan</td>
                <td>Golongan</td>
                <td>status</td>
                <td>jumlah anak</td>
                <td>Gaji poko</td>
                <td>tunjangan Anak</td>
                <td> Total Gaji</td>
            </tr>
        </thead>
    </table>
    
</body>
</html>





