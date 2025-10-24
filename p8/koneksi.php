<?php 

$localhost="localhost";
$user ="root";
$password="";
$DataBase="mahasiswa";


$root =mysqli_connect($localhost,$user,$password,$DataBase);


if(!$root){
  echo "eroor brader";
}


