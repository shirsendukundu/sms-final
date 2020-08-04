<?php
//run query for student details by stu_id
include('connection.php');
if(!empty($_GET['sid'])){

$stuid=$_GET['sid'];
$query="SELECT stu_name,`Gur _name`,stu_id,mobile,batch_id,course_name,photo,dob,address FROM STUDENT INNER JOIN COURSE on STUDENT.course_id=COURSE.cid WHERE STUDENT.stu_id= '$stuid'";
$data=mysqli_query($conn,$query);
 
 while($row=mysqli_fetch_array($data)){
	$name=$row['stu_name'];
	$gurdian=$row['Gur _name'];
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
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://localhost/sms/v.css">
	<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
	<link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
</head>
<body>
	<div class="main animated  lightSpeedIn delay-1s">
		<img src="http://www.jycsm.com/images/logo.png" alt="jycsm" id="banner" >
		<div class="content ">
			<h2>Digi-tech Computer Education Centre</h2>
			<p class="1">Authorised by JYCSM<br>
				147 K.C Das road, Sutragarh, Santipur
				Nadia, WestBengal


			</p><br><hr><br>
  <img src="<?php echo "$photo";?>" alt="jycsm" class="photo">
     <div><label>Name:</label>
      <input type="text" name="" value="<?php echo "$name";?>" class="inputbox1" placeholder="Name">
     <br>
     <label>Gurdian:</label>
      <input type="text" value="<?php echo "$gurdian";?>" class="inputbox2" placeholder="gurdian">
      <br>
     <label>Adress:</label>
      <input type="text" value="<?php echo "$adress";?>" class="inputbox" placeholder="adress">
     <br>
		<label>Contact no:</label>	
      <input type="text" value="<?php echo "$mobile";?>" class="inputbox" placeholder="mobile">
     </div><br>
     <div id="row3">
     	DOB:
      <input type="text" value="<?php echo "$dob";?>" class="row3" placeholder="dob">
      
      Course:
      <input type="text" value="<?php echo "$cname";?>" class="row3" placeholder="course">
     
     Batch:
      <input type="text" value="B<?php echo "$batch";?>" class="batch" placeholder="batch">
     
     </div>
     &nbsp <b>Declaretion:</b><br>
     <p class="dec">As per our knowledge all the above information are same,that student are given at the time of addmission .For further any query fell free to contact us<br>
     Thank you.. </p>
     
		</div>
	</div>


</body>
</html>

