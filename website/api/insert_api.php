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
				$data = $row;			
			}
		}
	if($found){
		var_dump($data);
		if($type != 'mid'){
		$sql = "UPDATE limits SET color = '" .$data['color']. "', limit_database = '".$data['limit_database']."' where id = '".$data['id']."'";
		}else{
		$sql = "UPDATE limits SET color = '" .$data['color']. "' where id = '".$data['id']."'";
		}

	}else{
		if($type != 'mid'){
			if(isset($color) && isset($type) && isset($limit)){
				$sql = "INSERT INTO limits (color,Limit_type,limit_database) VALUES ('".$color."','" .$type."','".$limit."')";
			}
		}else{			
			if(isset($color) && isset($type)){
				$sql = "INSERT INTO limits (color,Limit_type) VALUES ('".$color."','" .$type."')";
			}
		}
	}
	$run = mysqli_query($conn,$sql) or die ($conn->error);
	var_dump($run);
	break;
	
	default:
		header("location:../logout.php");
		return;
		exit();
	break;
}

?>