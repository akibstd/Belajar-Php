<?php
 
 echo"<h1>-------- if------------- <h1>";
// if else di php 
$nilai = 80;
if ($nilai > 75) {
   echo '<h1> nilai a </h1>';
} else {
   'nilai b';
}

//switch case 

echo"<h1>--------------- switch ------------------ <h1>";
$warna = "red";
switch ($warna == 'red') {
   case "red";
      echo '<h1> warna merah </h1>';
      break;
   case "blue":
      echo "Your favorite color is blue!";
      break;
   case "green":
      echo "Your favorite color is green!";
      break;

}

echo"<h1>---------------- while-----------------  <h1>";
// ⁡⁢⁣⁣while loop⁡ 
$i = 1; // 
while ($i < 3) {
   if ($i === 3)
      break;
   echo '<h1> while </h1>';
   $i++;

}

echo"<h1>----------------- Dowhile---------------------- <h1>";
// ⁡⁢⁣⁣do while loop  
$i = 0;
do {
   echo "<h1>  $i </h1>";
   $i++;
} while ($i < 6);


 
 for($number =0 ;$number < 11; $number ++){
   echo "<h1> cetak $number </h1>";
 }

echo"<h1>--------------------- foreach-----------------  <h1>";
  
$colors = array("red", "green", "blue", "yellow");  
foreach ($colors as $x) { 
echo "<h1>$x </h1>"; 
} 





?>