<?php include('header.php');?>

<DOCTYPE!HTML>
<html>
<head>
<title>Student Fees Deposit</title>
</head>
<body>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
<div class= "w3-margin w3-container">
<h2><center>Student Fees Deposit</center></h2>

<fieldset><legend>Student Details</legend>
<label>Student ID</label>
<form action ="" method="post" enctype="multipart/form-data">
<input class="w3-input w3-border w3-round w3-light-grey"type="text" name="stuid" value="" ><br/>
<input class="w3-button w3-block w3-Teal w3-margin-bottom" type="submit"  name="search"  value="search">
</fieldset><br/></form></div>

<?php
//search student details
include('connection.php');
    if(isset($_POST["search"])){
	$stuid=$_POST['stuid'];
	$sql="SELECT sid,stu_id,stu_name FROM student WHERE stu_id='$stuid'";
    $result=mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result)){
    
	$sid=$row['sid'];
	$name=$row['stu_name'];
	}
	}
  ?>
<!--fees deposited form-->
<div class="w3-container w3-margin ">
<fieldset><legend>Fees Details</legend>
<form action ="deposit_eng.php" method="post" enctype="multipart/form-data">

<label>Student Id:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="sid" value="<?php if(empty($sid)){echo'';}else{echo"$sid";}?>" readonly><br/>
<label>Name:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="name"value="<?php if(empty($name)){echo'';}else{echo"$name";}?>" readonly><br/>

<label>Fees Deposit of:</label>
<select class="w3-select w3-border w3-light-grey" name="month">
<option value="" selected>Choose month..</option>
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option></select><br><br/>

<label>Year of:</label>
<select  class="w3-select w3-border w3-light-grey" name="year">
<option value="">Choose Year..</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2015">2021</option>
<option value="2015">2022</option>
</select><br><br/>

<label>Fees Type:</label>
<select class="w3-select w3-border w3-light-grey " name="type">
<option value="" selected>Select for..</option>
<option value="5">Admission</option>
<option value=" 6">Tuition</option>
<option value="7">Exam</option>
<option value="8">Others</option></select><br><br/>

<label>Amount:</label>
<input type="text" class="w3-input w3-border w3-round w3-light-grey "  name="amount"><br/>

<input class="w3-button w3-block w3-Teal w3-margin-bottom" type="submit"  name="submit" value="Submit">

</fieldset></div></div>
</form>






</body></html>