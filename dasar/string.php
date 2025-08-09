<?php
// ⁡⁢⁣⁣  menjalankan perintah pertama di php⁡
echo "hello word";

//⁡⁣⁢⁢ ⁡⁢⁣⁣ini adalah kalimat string di php⁡
$String = "ini adalah Kalimat String";  // ⁡⁢⁣⁣membuat variable menampung string⁡
echo "<h2> $String</h2>";

//  ⁡⁢⁣⁣untuk menghitung panjang string⁡
echo strlen( $String) ."<br>";

// ⁡⁢⁣⁣mengabungkan string dengan  .⁡
$string1="string 1";   
$string2="string 2";    
$stringGabung= $string1 . $string2;  // ⁡⁢⁣⁣buat variable yang menampung lalu gabungkan variable dengan .⁡

 // ⁡⁢⁣⁣mengeprint hasil pengabungan⁡
echo "<h2>$stringGabung </h2>";

$integer =5; //⁡⁢⁣⁣ membuat integer⁡
$float=1.3;  // ⁡⁢⁣⁣membuat float⁡
echo "<h3> nilai integer: $integer </h3>";
echo "<h3> nilai float: $float </h3>";  // print hasil

// ⁡⁣⁣⁡⁣⁣⁢Menampilkan tipe data menggunakan var_dump⁡
var_dump($integer);
var_dump($float);




?>

