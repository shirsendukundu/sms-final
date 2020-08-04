<?php
include('connection.php');
$Course_name = $_POST['course_name'];
$Duration = $_POST['duration'];
$Fees = $_POST['course_fees'];

$sql = "INSERT INTO `course`(`course_name`, `duration`, `course_fees`) VALUES ('$Course_name','$Duration','$Fees')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>