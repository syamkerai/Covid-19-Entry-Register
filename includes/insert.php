<?php
include_once("config.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $fName = $_POST['fname'];
    $lname = $_POST['lname'];
    $mnumber = $_POST['mnumber'];
    $tdate = $_POST['tdate'];
    $intime = $_POST['intime'];
    echo($fName);
    echo("<br>");
    echo($lname);
    echo("<br>");
    echo($mnumber);
    echo("<br>");
    echo($tdate);
    echo("<br>");
    echo($fName);
    echo("<br>");
    $sql = "INSERT INTO entries (u_fname, u_lname, u_mnumber, u_tdate, u_intime)VALUES ('$fName', '$lname', '$mnumber', '$tdate', '$intime')";
    
    if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
    mysqli_close($con);
}
else{
    echo("NOT INSERTED");
}


?>