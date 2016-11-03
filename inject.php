<?php 
require_once "db.php";
$conn = konek_db();
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$query = mysqli_query($conn , "insert into daftar(nama,harga) values('" . $nama. "', ".$harga." )");
 ?>