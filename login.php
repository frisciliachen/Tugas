<?php 
session_start();
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>LOGIN</title>
 	<style>
 	body{
 		text-align: center;
 	}
 	</style>
 </head>
 <body>
<?php
 require_once "db.php";

if(isset($_GET["username"]) && isset($_GET["password"])) {
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);

	$conn = konek_db();
	$query = $conn->prepare("select * from user where username=? and password=?");
	$query->bind_param("ss",$username,$password);
	$hasil = $query->execute();

	if($hasil) {
		$result = $query->get_result();

		if($result->num_rows == 1){
		$_SESSION["username"] = $username;
		header("Location: content.php");	
	
	} else {
			echo "<script>alert('Username and Password Not Exists!')</script>";
			echo "<script>window.location.href='login.html'</script>";
		}
	} else {
		header("Location:www.yahoo.com");
	}
} 	else {
		echo '<script language="javascript">alert("Username or Password Wrong! Try Again!")</script>';
	}
 ?>

 </body>
</html>