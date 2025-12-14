<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = [];
    $lebar = [];
    $luas = [];
    for ($i = 1; $i <= 3; $i++) {
        $panjang[$i] = $_POST["panjang$i"] ?? 0;
        $lebar[$i] = $_POST["lebar$i"] ?? 0;
        
        $luas[$i] = $panjang[$i] * $lebar[$i];
    }
}
echo "<h3>Mencari Luas Persegi Panjang</h3>";
echo "<form method='post' action=''>";
echo "<table border='1'>";
echo "<tr><th></th><th>Panjang</th><th>Lebar</th></tr>";
for ($i = 1; $i <= 3; $i++) {
    echo "<tr>";
    echo "<td>$i.</td>";
    echo "<td><input type='number' name='panjang$i' value='" . ($panjang[$i] ?? "isi panjang") . "'></td>";
    echo "<td><input type='number' name='lebar$i' value='" . ($lebar[$i] ?? "isi lebar") . "'></td>";
    echo "</tr>";
}
echo "</table><br>";
echo "<input type='submit' value='Hitung'>";
echo "</form>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h3>Hasil Perhitungan</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Panjang</th><th>Lebar</th><th>Luas</th></tr>";
    for ($i = 1; $i <= 3; $i++) {
        echo "<tr>";
        echo "<td>" . $panjang[$i] . "</td>";
        echo "<td>" . $lebar[$i] . "</td>";
        echo "<td>" . $luas[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>