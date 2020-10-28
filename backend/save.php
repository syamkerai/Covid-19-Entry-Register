<?php
include 'database.php';
if(count($_POST)>0){
	if($_POST['type']==1){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
        $mnumber=$_POST['mnumber'];
        $noofmembers=$_POST['noofmembers'];
        $tdate=$_POST['tdate'];
		$intime=$_POST['intime'];
		$sql = "INSERT INTO `entries`( `u_fname`, `u_lname`,`u_mnumber`,`u_noofmembers`,u_tdate,u_intime) 
		VALUES ('$fname','$lname','$mnumber','$noofmembers','$tdate','$intime')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']==2){
		$id=$_POST['u_id'];
		$outtime=$_POST['u_outtime'];
		$sql = "UPDATE `entries` SET u_outtime='$outtime' WHERE u_id='$id'";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']==3){
		$id=$_POST['u_id'];
		$sql = "DELETE FROM `entries` WHERE u_id=$id ";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if(count($_POST)>0){
	if($_POST['type']==4){
		$id=$_POST['u_id'];
		$sql = "DELETE FROM entries WHERE u_id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>