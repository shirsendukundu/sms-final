<?php
//run query for student details by stu_id
include('connection.php');
include('header.php');
if(isset($_POST['sid'])){

$stuid=$_POST['sid'];
$query="SELECT stu_name,stu_id,mobile,batch_id,course_name,photo,dob,address FROM student INNER JOIN course on student.course_id=course.cid WHERE student.stu_id='$stuid'";
$data=mysqli_query($conn,$query);
 
 while($row=mysqli_fetch_array($data)){
	$name=$row['stu_name'];
	$sid=$row['stu_id'];
	$mobile=$row['mobile'];
	$cname=$row['course_name'];
	$batch=$row['batch_id'];
    $photo=$row['photo'];
	$dob=$row['dob'];
	$adress=$row['address'];
	}
}
?>

<DOCTYPE!HTML>
<html><head>
<title>Student ID Card Issue</title>
</head>
<body>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
<div class= "w3-margin w3-container">
<h2><center>Student ID Card Issue</center></h2>
<fieldset><legend>Search Student</legend>
<form action ="icard_issue.php" method="post">
<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="sid" placeholder="Enter Student Id"><br/>
<input type="submit" class="w3-button w3-block w3-Teal w3-margin-bottom" value="search">
</fieldset></form><br/></div></div>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
<div class= "w3-margin w3-container">
 <fieldset><center><legend>Student Details</legend></center>
 <form action ="icard_generate.php" method="post" target="_blank">
 <label>Student ID:</label><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($sid)){echo '';}else {echo $sid;}?>" name="stuid" readonly><br/>
 <label>Student Name:</label><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($name)){echo '';}else {echo $name;}?>" name="name" readonly><br/>
  <label>Adress:</label><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($adress)){echo '';}else {echo $adress;}?>" name="adress"><br/>
 <label>Contact No:</label><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($mobile)){echo '';}else {echo $mobile;}?>" name="mobile"><br/>
 <label>DOB:</label><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($dob)){echo '';}else {echo $dob;}?>" name="dob"><br/>
  <label>Course Name:</label><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($cname)){echo '';}else {echo $cname;}?>" name="cname"><br/>
  <label>Batch ID:</label><br/>
 <input type ="text"  class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($batch)){echo '';}else {echo $batch;}?>" name="batch"><br/>
 <input type ="text" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(empty($photo)){echo '';}else {echo $photo;}?>" name="photo" hidden><br/>
 <input type="submit" name="submit" class="w3-button w3-block w3-Teal w3-margin-bottom" value="Generate ID Card">
</fieldset>
</body>
</div></div>
</html>