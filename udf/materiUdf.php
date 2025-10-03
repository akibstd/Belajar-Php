<?php
class produk{
    public $harga;
    public $nama;
    public $jumlah;

    public function __construct($nama,$harga,$jumlah){
        $this->nama=$nama;
        $this->harga=$harga;
        $this->jumlah=$jumlah;
    }
    public function hitung(){
        return $this->harga * $this->jumlah;
    }
 
    public function infoProduk(){
        return "produk {$this->nama}, jumlah {$this->jumlah},total:".$this->hitung();
    }

   
}

 $produkl=new produk("laptop" ,20000,2);
  $produk2=new produk("keyboard" ,2000000,3);

 echo $produkl->infoProduk();
 echo "<br>";
  echo $produk2->infoProduk();
  //a, $this hanya bisa digunakan di dalam method/function yang berada di dalam sebuah class.
// Karena $this merepresentasikan object yang sedang aktif (instance dari class).

