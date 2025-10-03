<?php 
$data2=[1,2,3,4,5,6];
$data = [1, 2, 3, 4, 5, 6, 'angka'];

function cekAngka($array) {
    foreach ($array as $item) {
        if (!is_numeric($item)) {
            echo "DATA TIDAK SESUAI";
            return; 
        }
    }

    
    print_r($array);
}

echo cekAngka($data)."</br>";
echo cekAngka($data2);
?>