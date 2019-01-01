<?php 
if(!empty($_POST)){
	include "db.php";
	$password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$username = $_POST['username'];
	// var_dump($conn);
	$sql = "INSERT INTO users (username,password) VALUES ('".$username."','".$password."')";
	$run = mysqli_query($conn,$sql) or die ($conn->error);
	var_dump($run);

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<body>
	<form method="POST">
		<label>username:</label>
		<input type="text" name="username">
		<br>
		<label>password:</label>
		<input type="password" name="pass">
		<input type="submit">
	</form>
</body>
</html>