<!DOCTYPE html>
<html>
<head>
	<title>Hapus menu</title>
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
$query = $conn -> prepare("select * from daftar where ID=?");
$query->bind_param("i",$id);
$result = $query->execute();

if(!$result)
	die("gagal query");
$rows = $query->get_result();

if($rows->num_rows==0)
	die("Menu tidak ditemukan");
$produk = $rows->fetch_object();

$query = $conn->prepare("delete from daftar where ID=?");
$query->bind_param("i",$id);
$result = $query->execute();

if($result)
	echo"<p>Menu berhasil di didelete</p>";
else
	echo"<p>Gagal mendelete menu</p>";
?>
<a href="read.php"><input type="submit" value="Lihat Menu" style="margin: 50px; padding: 20px;"></a>
</body>
</html>