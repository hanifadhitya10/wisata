<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "wisata";

$koneksi =mysqli_connect($host, $user, $pass, $db);

if (!$koneksi){
    die("Koneksi gagal: " . msqli_connect_error());
}
    
?>
  
