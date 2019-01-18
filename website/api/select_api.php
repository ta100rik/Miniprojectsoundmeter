<?php
function givemejson($sql){
	include "db.php";
	$sth = mysqli_query($conn,$sql);
	$rows = array();
	while($r = mysqli_fetch_assoc($sth)) {
	    $rows[] = $r;
	}
	return json_encode($rows);
}
session_start();
$cat = $_GET['cat'];
switch ($cat) {
	case 'limits':
	$sql = "select * from limits";
	print_r(givemejson($sql));

	break;
	
	default:
		header("location:../logout.php");
		return;
		exit();
	break;
}

?>