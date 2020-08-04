<?php
include('connection.php');
$txn_id=$_GET['txnid'];
$sql="DELETE FROM `transaction` WHERE `txn_id`='$_GET[txnid]'";
 if(mysqli_query($conn,$sql)){
 	echo"successs";
 	session_start();
 	$_SESSION['flash']="Record Deleted Successfully";
 	header("Location:/sms/search_transaction.php");
 }
?>