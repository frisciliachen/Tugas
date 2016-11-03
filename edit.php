<!DOCTYPE html>
<html>
<head>
	<title>Mengupdate Menu</title>
</head>
<body>
	<?php
		require_once "db.php";

		if(!isset($_GET['ID']))
			die("Menu tidak ditemukan");

		$conn = konek_db();

		$id = $_GET['ID'];
		$query = $conn->prepare("select * from daftar where ID = ?");
		$query->bind_param("i", $id);
		$result = $query->execute();

		if(! $result)
			die("Gagal query");

		$rows = $query->get_result();
		if ($rows->num_rows == 0)
			die ("<p>Menu tidak ditemukan</p>");

		$data = $rows->fetch_object();
	?>
	<form method="post" action="update.php?ID=<?php echo $data->ID; ?>"> 
		<div>
			<label>ID : </label>
			<span><?php echo $data->ID; ?></span>
		</div>
		<div>
			<label>Nama Menu :</label>
			<input type="text" name="Nama" value="<?php echo $data->Nama; ?>">
		</div>
		<div>
			<label>Harga :</label>
			<input type="text" name="Harga" value="<?php echo $data->Harga; ?>">
		</div>
		
		<div><input type="submit" value="Update"></div>

	</form>
</body>
</html>