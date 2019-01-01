<?php
if(isset($_SESSION['username'])){
	header("location:main.php");
}
if(!empty($_POST['username']) && !empty($_POST['Password'])){
	session_start();
	$username = $_POST['username'];
	$Password = $_POST['Password'];
	include "db.php";
	$sql = "SELECT Password FROM users where username = '" . $username . "' limit 1" ;
	$run = mysqli_query($conn,$sql);
	$row = $run->fetch_assoc();
	if(password_verify($Password,$row['Password'])){
		$_SESSION['username'] = $username;
		header("location:../main.php");

	}else{
		echo "nope";
	}

}
?>