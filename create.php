<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menambah Data Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once "db.php";

if (isset($_POST["nama"]) && isset($_POST["harga"])) {
    $nama  = $_POST["nama"];
    $harga = $_POST["harga"];

    $conn = konek_db();

    $query = $conn->prepare("insert into daftar(nama, harga) values(?, ?)");
  
    $query->bind_param("si", $nama, $harga);

    $result = $query->execute();

    
    if (! $result)
        die("<p>Proses query gagal.</p>");

    echo "<p>Data produk berhasil ditambahkan.</p>";
} else {
    echo "<p>Data produk belum diisi!</p>";
}
?>
</body>
</html>
