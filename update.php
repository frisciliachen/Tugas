<!DOCTYPE html>
<html>
<head>
	<title>Update Data Menu</title>
	<style type="text/css">
		body{
			text-align: center;
		}
	</style>
</head>
<body>
<?php 
require_once "db.php"; 

$conn = konek_db();

if(! isset($_GET["ID"]))
	die("Tidak ada id menu");

$id = $_GET["ID"];
$query = $conn->prepare("select * from daftar where ID=?");
$query->bind_param("i", $id);
$result = $query->execute();

if (! $result)
	die("gagal query");

$rows = $query->get_result();
if ($rows->num_rows == 0)
	die("Menu tidak ditemukan");

if(! isset($_POST["Nama"]) || ! isset($_POST["Harga"]))
	die("data menu tidak lengkap");
$nama = $_POST["Nama"];
$harga = $_POST["Harga"];



$query = $conn->prepare("update daftar set Nama=?, Harga=? where ID=?");
$query->bind_param("sii" , $nama, $harga, $id);
$result = $query->execute();

if($result)
	echo "<p>Data menu berhasil di update</p>";
else
	echo "<p>Gagal Mengupdate Data menu</p>";

?>
<a href="read.php"><input type="submit" value="Lihat Menu" style="margin: 50px; padding: 20px;"></a>
</body>
</html>