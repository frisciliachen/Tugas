<!DOCTYPE html>
<html>
<head>
	<title>Daftar Menu</title>
	<style type="text/css">
	body{
		text-align: center;
	}
		table, th, td{
				border : 1px solid #C6C6C6;
				border-collapse:collapse;
				border-spacing:15px;
				padding: 20px;
				margin: 20px;	
			}
	.table{
		margin-left: 425px;
	}
	</style>
</head>
<body>
	<?php
		require_once "db.php";

		$conn = konek_db();

		$query = $conn->prepare("select * from daftar");

		$result = $query->execute();

		if(! $result)
			die("Gagal query");
		;
		$rows = $query->get_result();
	?>
	<h1> Daftar Menu </h1>

	<div class="table">
	<table>
		<tr>
			<th>ID </th>
			<th>Nama Menu </th>
			<th>Harga </th>
			<th>Action</th>
		</tr>
		<?php
			while($row = $rows->fetch_array()) {
				//die(var_export($row, true));
				$url_edit = "edit.php?ID=" . $row['ID'];
				$url_delete = "delete.php?ID=" . $row['ID'];
				echo "<tr>";
				echo "<td>" . $row['ID'] . "</td>";
				echo "<td>" . $row['Nama'] . "</td>";
				echo "<td>" . $row['Harga'] . "</td>";
				echo "<td><a href='" . $url_edit . "'><button>Edit</button></a>";
				echo "<a href='" . $url_delete . "'><button>Hapus</button></a></td>";
				echo "</tr>";
			}
		?>
	</table>
	</div>
	<a href="create.html"><input type="submit" value="Tambah Menu" style="margin: 50px;"></a><br><br>
	<a href="logout.php"><input type="submit" value="Logout" style="margin: 50px;"></a>
</body>
</html>