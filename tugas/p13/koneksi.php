<?php 
$host="localhost";
$username="root";
$password="";
$db_name="toko_online";

$conn=mysqli_connect($host,$username,$password,$db_name);

if(!$conn){
    echo "koneksi gagal".mysqli_connect_error();
}
?>