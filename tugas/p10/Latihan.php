<?php 
$totalGaji = 0;
$tunjanganAnak = 0;
$gajiPokok = 0;

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $golongan = $_POST['golongan'];
    $status = $_POST['status'];
    $jmlAnak = $_POST['jmlAnak'];

    
    switch ($golongan) {
        case 'A':
            $gajiPokok = 1000000;
            break;
        case 'B':
            $gajiPokok = 1500000;
            break;
        case 'C':
            $gajiPokok = 2000000;
            break;
        default:
            $gajiPokok = 0;
            break;
    }

  
    if ($jmlAnak > 0 && $jmlAnak < 4) {
        $tunjanganAnak = $jmlAnak * 30000;
    } elseif ($jmlAnak >= 4) {
        $tunjanganAnak = 4 * 30000; 
    }

    
    $totalGaji = $gajiPokok + $tunjanganAnak;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P10 Akib Supandi</title>
</head>
<body>
    <form action="latihan.php" method="post" >
     
    <label >Nama karyawan</label><br> <br>
    <input type="text" name="nama"><br> <br>

      <label for="">golongan</label>
      <input type="radio" name="golongan" value="A">A
      <input type="radio" name="golongan" value="b">B
      <input type="radio" name="golongan" value="C">C  <br> <br>
    
    <label for="">Status</label> ::
    <select name="status" id="" name="status"><br> <br>
        <option value="">single</option> <br> <br>
        <option value="">nikah</option> <br> <br>
          <option value="">Janda/Duda</option> <br> <br>
    </select><br><br>

    <label for="">jumlah Anak</label> 
    <input type="number" name="jmlAnak"><br> <br>
      

    <button type="sumbit" name="save">Save</button>
    
    </form> <br> <br>

    <table border="1">
        <thead>
            <tr>
                <td>Nama Karyawan</td>
                <td>Jenis Karyawan</td>
                <td>Golongan</td>
                <td>status</td>
                <td>jumlah anak</td>
                <td>Gaji poko</td>
                <td>tunjangan Anak</td>
                <td> Total Gaji</td>
            </tr>
            
        </thead>

        <tbody>
            <tr>
                <td> <?=$nama ?></td>
            </tr>
        </tbody>
    </table>
    
</body>
</html>





