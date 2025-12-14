<?php
$jurusan = ["-- Pilih Jurusan --", "TKJ", "RPL", "Multimedia", "perhotelan"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis_kelamin = $_POST["jenis_kelamin"] ?? "";
    $hobi = $_POST["hobi"] ?? [];
    $selected_jurusan = $_POST["jurusan"] ?? "";
    
    
    echo "<h3>Data yang diinput:</h3>";
     echo "<h3>Akib Supandi</h3>";
    echo "Jenis Kelamin: " . ($jenis_kelamin ?: "Tidak dipilih") . "<br>";
    echo "Hobi: " . (empty($hobi) ? "Tidak ada" : implode(", ", $hobi)) . "<br>";
    echo "Jurusan: " . $selected_jurusan . "<br>";
}
echo "<h3>Form Input Data</h3>";
echo "<form method='post' action=''>";
echo "Jenis Kelamin:<br>";
echo " <input type='radio' name='jenis_kelamin' value='Laki-laki'> Laki-laki ";
echo " <input type='radio' name='jenis_kelamin' value='Perempuan'> Perempuan<br><br>";
echo "Hobi:<br>";
echo " <input type='checkbox' name='hobi[]' value='Membaca'> Membaca ";
echo " <input type='checkbox' name='hobi[]' value='Olahraga'> Olahraga ";
echo " <input type='checkbox' name='hobi[]' value='Musik'> Musik<br><br>";
echo "Jurusan:<br>";

echo "<select name='jurusan'>";
foreach ($jurusan as $item) {
    echo "<option value='$item'>$item</option>";
}
echo "</select><br><br>";

echo "<input type='submit' value='Submit'>";
echo "</form>";
?>
