<?php
session_start();
include "db.php";
$cat = $_GET['cat'];
switch ($cat) {
	case 'insert':
		$color = $_POST['color'];
		$type = $_POST['type'];
		$limit = ($_POST['limit'])?$_POST['limit']:0;
		$checkup = "SELECT * FROM limits";
		$run = mysqli_query($conn,$checkup);
		$found = False;
		while($row = mysqli_fetch_array($run)) {
			if($row["Limit_type"] == $type){
				$found = True;
			}
		}
		var_dump($found);
		if($type != 'mid'){
			if(isset($color) && isset($type) && isset($limit)){
				$sql = "INSERT INTO limits (color,Limit_type,limit_database) VALUES ('".$color."','" .$type."','".$limit."')";
			}
		}else{			
			if(isset($color) && isset($type)){
				$sql = "INSERT INTO limits (color,Limit_type) VALUES ('".$color."','" .$type."')";
			}
		}
	$run = mysqli_query();

	break;
	
	default:
		header("location:header.php");
		return;
		exit();
	break;
}

?>