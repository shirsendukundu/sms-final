<?php
include('connection.php');
$cid = $_POST['cid'];
$time = $_POST['time'];
$day = $_POST['day'];

$sql= "INSERT INTO `batch`(`cid`, `time`, `day`) VALUES ('$cid','$time','$day')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>