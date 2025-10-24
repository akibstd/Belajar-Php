

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 8</title>
</head>
<body>
      <form action="index.php" method="post">
        <label for="">Alamat</label><br>
        <input type="text" name="nama"> 
        <br>

        <label for="">Alamat</label><br>
        <input type="text" name="alamat"><br>

         <button type="submit" name="submit" >Submit </button>
      </form>
</body>
</html>
<?php  
  require('koneksi.php');
 $submit=$_POST['submit'];
  $nama=$_POST['nama'];
  $alamat=$_POST['alamat'];

  if(isset($submit) && isset($nama) && isset($alamat)){
      $query="INSERT INTO data (nama, alamat) VALUES ('$nama','$alamat')";
      $result=mysqli_query($root,$query);
      
      
  }


  
   
// if(empty($nama) && empty($alamat)){
//     echo "berhasil";

//     exit;
// }



//  $query="INSERT INTO `data`(`nama`, `alamat`) VALUES ($nama,$alamat)";

//  mysqli_query($root,$query);

?>