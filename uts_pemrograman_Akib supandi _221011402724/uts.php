<?php 
if (isset($_POST['save'])) { 
    $namasekolah = $_POST['namaSekolah']; 
    $namasiswa = $_POST['namaPeserta']; 
    $wilayah = $_POST['wilayah']; 
    $materi = $_POST['materi']; 
    $jumlah = $_POST['jumlahp']; 
    $tingkat = $_POST['tingkat']; 
    $waktu = $_POST['waktu']; 
} 

$kodePendaftar=[
    001=>'sd',
    002=>'smp',
    003=>'smk',
    
];

if(isset($_POST['submit'])){
    $namsek=$_POST['nama_sekolah'];
    $kategoriMat=$_POST['kategori_materi'];
    $pembayaran=$_POST['pembayaran'];
    $bayar=$_POST['bayar'];
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <form action="uts.php" method="post">
        <h1>Pendaftaran</h1>
        <label for="">Nama Sekolah</label>: 
        <input type="text" name="namaSekolah"> <br><br>
        
        <label for="">Kode Wilayah</label>: 
        <select name="wilayah">
            <option value="jakarta barat">Jakarta Barat</option>
            <option value="jaktim">Jakarta Timur</option>
            <option value="jakut">Jakarta Utara</option>
            <option value="jaksel">Jakarta Selatan</option>
            <option value="jakpus">Jakarta Pusat</option>
        </select><br><br>

        <label for="">Materi</label>: 
        <select name="materi">
            <option value="math">Matematika</option>
            <option value="saint">Sains</option>
            <option value="bahasa">Bahasa</option>
            <option value="asesmen">Asesmen</option>
            <option value="pengayaan">Pengayaan</option>
        </select><br><br>

        <label for="">Jumlah Peserta</label> 
        <input type="number" name="jumlahp"><br><br>

        <label for="">Nama Peserta</label> 
        <input type="text" name="namaPeserta"><br><br>

        <label for="">Tingkat Unit</label> 
        <input type="radio" name="tingkat" value="SD/MI"> SD/MI 
        <input type="radio" name="tingkat" value="SMP/MTs"> SMP/MTs 
        <input type="radio" name="tingkat" value="SMA/SMK"> SMA/SMK <br><br>

        <label for="">Waktu</label> 
        <input type="radio" name="waktu" value="September"> September 
        <input type="radio" name="waktu" value="Desember"> Desember 
        <input type="radio" name="waktu" value="Maret"> Maret 
        <input type="radio" name="waktu" value="Juni"> Juni <br><br>

        <button type="submit" name="save">Simpan</button>
    </form>   <br> <br>

    <?php if (isset($_POST['save'])): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Kode Pendaftaran</th>
                <th>Nama Sekolah</th>
                <th>Wilayah</th>
                <th>Jumlah Peserta</th>
                <th>Materi</th>
                <th colspan="2">tingkat</th>
                <th>waktu</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $namasiswa; ?></td>
                <td><?php echo $namasekolah; ?></td>
                <td><?php echo $wilayah; ?></td>
                <td><?php echo $jumlah; ?></td>
                <td><?php echo $materi; ?></td>
                 <td><?php echo $tingkat; ?></td>
                  <td><?php echo $tingkat; ?></td>
                   <td><?php echo $waktu; ?></td>
                
            </tr>
        </tbody>
    </table>
    <?php endif; ?>
     <hr>

     <form action="" method="post">
      <h1>pembayaran</h1>

      <form action="" method="get">
        <label for="">kode pendaftar</label>
        <input type="text">
        <button type="submit">Cari</button>
      </form> <br> <br>
       
        <label for="">nama sekolah</label>
        <input type="text" name="nama_Sekolah"><br> <br>
        
        <label for="">kategori materi</label>
        <input type="text" name="kategori_materi"> <br> <br>
        
        <label for="">pembayaran</label> 
        <input type="radio" name="pembayaran" value="Danabos"> dana bos
        <input type="radio" name="pembayaran" value="danabop"> bop 
        <input type="radio" name="pembayaran" value="danamandiri"> mandiri <br><br>

        <label for="">bayar</label> 
        <input type=" checkbox" name="bayar"> <br> <br>
             <button type="submit">submit</button>
    </form><br> <br>

    
    <table border="1">
        <thead>
            <tr>
                <th>Kode Pendaftaran</th>
                <th>Nama Sekolah</th>
                <th>kategori materi</th>
                <th>Dana pembayaran</th>
                <th>pembayaran</th>
                
                
            </tr>
        </thead>
        <tbody>
            <tr>
               
                
                
            </tr>
        </tbody>
    </table>
    
</body>
</html>
