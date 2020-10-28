<?php
//host:user:pass:databse
$con = mysqli_connect("localhost","root","","register");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
// else {
// 	echo("sucess");
// }
?>