<?php
	include 'database.php';
	$drop=$_POST['drop'];
	$fname=$_POST['fname'];
	$result=$_POST['result'];
	
	$sql = "INSERT INTO `history`( `type`, `input`, `output`) 
	VALUES ('$drop','$fname','$result')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>