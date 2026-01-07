<?php
$localhost="localhost";
$username="root";
$pass="";
$dbname="uas_Pemweb_akib";
$koneksi = mysqli_connect($localhost,$username,$pass,$dbname);
if(!$koneksi){
    echo"koneksi gagal";
}
?>