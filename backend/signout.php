<?php
include 'database.php';
if (1 == 1) {
    $outtime = $_POST['outtime'];
    $id_u = $_POST['id'];
    echo $id_u;
    echo "<br>";
    echo $outtime;
    $sql = "UPDATE entries SET u_outtime = '$outtime' WHERE u_id = '$id_u'";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: ../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    echo ("NOT INSERTED");
}

?>