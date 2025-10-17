<?php 
$panjang = "";
$lebar = "";
$hasil = "";

if (isset($_POST['submit'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $hasil = $panjang * $lebar;
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <label>Panjang</label>
        <input type="number" name="panjang" required> <br><br>

        <label>Lebar</label>
        <input type="number" name="lebar" required> <br><br>

        <button name="submit" type="submit">Hitung</button>
    </form>

    <?php if (!empty($hasil)): ?>
    <table border="1"> 
        <thead>
            <tr>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $panjang ?></td>
                <td><?= $lebar ?></td>
                <td><?= $hasil ?></td>
            </tr>
        </tbody>
    </table>
    <?php endif; ?>

</body>
</html>
