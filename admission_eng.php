<?php
include('connection.php');

$name = $_POST['name'];
$gur_name = $_POST['gur_name'];
$adress = $_POST['adress'];
$mobile = $_POST['mobile'];
$dob = $_POST['dob'];
$aadhar = $_POST['aadhar'];
$gender = $_POST['gender'];
$caste = $_POST['caste'];
$education = $_POST['edu_qua'];
$cid = $_POST['course'];
$bid=$_POST['batch'];
$filename = $_FILES['photo']['name'];

//$temp_name = $_FILES['photo']['tmp_name'];
$folder ="student_img/".$filename;
$sql= "INSERT INTO `student`(`stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`, `course_id`, `batch_id`, `photo`) VALUES ('$name','$gur_name','$adress','$mobile','$dob','$aadhar','$gender','$caste','$education','$cid','','$folder')";

    if (mysqli_query($conn, $sql)) {
    	//last inserted student id
    	$last_id = $conn->insert_id;
    	//echo "l id".$last_id;
    	//foreach loop for getting the batches and run the query  
    	foreach ($bid as $batch) {
    	$query="INSERT INTO `studentbatches`(`sid`, `bid`) VALUES ($last_id,$batch)";
    	mysqli_query($conn, $query);
    	//echo $batch;
    	}//end foreach loop
    	//redirect after successfully run the script
    	header("Location:all_student_details.php");
} else {
    echo "Error: record not inserted successfully";
}
mysqli_close($conn);


?>