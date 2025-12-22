<?php
$host = "localhost";
$username = "root";
$password = "";
$database   = "Toko_Flower_Akib";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
     echo "Koneksi gagal: " . mysqli_connect_error();
}else{
  
}

?>