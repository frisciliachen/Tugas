<?php 
session_start();

if(! isset($_SESSION["username"])) {
	die("Anda belum login");
} 
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Contoh Session</title>
</head>
<body>
<p>Content ini hanya ditampilkan jika user sudah login</p>
<p>Klik<a href="logout.php">Disini</a>untuk logout</p>
</body>
</html>