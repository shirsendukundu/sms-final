<?php
include('header.php');
include('connection.php');


?>
<?php
/*for search student details*/
if(isset($_POST['search']) && (!empty($_POST['stu-id']))){
	$stu_id=$_POST['stu-id'];
	$query="SELECT sid,stu_name,address,mobile,course_name FROM student INNER JOIN course ON student.course_id = course.cid WHERE stu_id= '$stu_id'
	AND certificate_issue IS NULL";

	$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){
	$sid=$row['sid'];
	$name=$row['stu_name'];
	$adress=$row['address'];
	$mobile=$row['mobile'];
	$course=$row['course_name'];
 } 

 if(empty($sid)){echo "This student certificate has been already issueing ";}
}
else if(isset($_POST['search']) &&(empty($_POST['stu-id']))){
	 	echo "Please enter student id";
	 }

 /*for calculate if student has any outstanding fess*/
	if (!empty($sid)){
	 	$sql="SELECT course_fees, SUM(amount) as totalpay 
	            FROM ((course inner join student 
	            on course.cid=student.course_id)
	             inner join transaction on student.sid=transaction.sid)
	            WHERE student.sid='$sid'";
	 $res=mysqli_query($conn,$sql);
	 while($row1=mysqli_fetch_assoc($res)){
	 	$totalpay=$row1['totalpay'];
	 	$course_fees=$row1['course_fees'];
            $outstanding=$course_fees - $totalpay;
	 }
	 
	 if($course_fees > $totalpay){
	     $alert= "Student outstanding fees are RS: $outstanding /-"; 
	 }
    else { $alert2="The student doesn't have any Fees due";
	 }
	 }
	 ?>
<?php
/*for update certificate*/
   if(isset($_POST['submit'])&&(!empty($_POST['certificate']))){
	$cno=$_POST['certificate'];
	$stuid=$_POST['sid'];
	$update="UPDATE `student` SET `certificate_issue`='$cno' WHERE sid='$stuid'";
	$upadateQuery=mysqli_query($conn,$update);
     
     echo "Update succesfully" ;
       
	}
    if(empty($_POST['certificate'])or(empty($stuid)&&(isset($_POST['submit'])))){
    	{echo "please select any student first ";}
    }

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>certificate issue</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<div class=" w3-display-container w3-margin w3-card  w3-responsive">
		<center><h2>Issueing Certificate </h2></center>
		<div class= "w3-margin w3-container w3-border w3-border-blue">
			
			<fieldset>
				<legend>
				Search Student
				</legend>
				<form action="" method="post" accept-charset="utf-8">
				<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="stu-id" value="" placeholder="Enter Student Id eg:S100"><br>
				<input class="w3-button w3-block w3-Teal w3-margin-bottom" type="submit" name="search" value="Search" ><br>
			
			</fieldset>
		</form>
		</div><br></div><br>
		<div class=" w3-display-container w3-margin w3-card  w3-responsive">
			<center><h2>Student Details</h2></center>
		<div class= "w3-margin w3-container w3-border w3-border-blue">
      <form action="" method="post" accept-charset="utf-8">
      	<input type="text" name="sid" value="<?php if(!empty($sid)){echo "$sid" ;} ?>" hidden><br>

      	<label>Name:</label>
	<input type="text" name="name" class="w3-input w3-border w3-round w3-light-grey" value="<?php if(!empty($name)){echo "$name";} ?>" readonly><br>
	<label>Adress:</label>
	<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="adress" value="<?php if(!empty($adress)){echo "$adress" ;} ?>"readonly><br>
	
	<div class="w3-row">
    <div class="w3-half">
    	<label>Mobile:</label>
	<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="mobile" value="<?php if(!empty($mobile)){echo "$mobile";} ?>"readonly></div>
	<div class="w3-half">
		<label>Course:</label>
	<input class="w3-input w3-border w3-round w3-light-grey" type="course" value=
	"<?php if(!empty($course)){echo "$course";} ?>"readonly></div></div>
    <br>
    <label>Certificate No:</label>
    <input id="cno" class="w3-input w3-border w3-round w3-light-grey" type="text" name="certificate" value="" placeholder="Enter certificate no" readonly ><br>
   <center><input class="w3-btn w3-blue " type="Submit" name="submit" value="Submit" > </center><br>
	</form>

	</div><br>
	</div>
  <!--for modal-->
  <div id="modal" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <h3 style="color:red">Warning!</h3>
        <p>Once issued a certificate ,that student
        doesn't showing in any query like outstanding fees,batch,course etc ...Before issueing certificate student course fees must be fully PAID.</p>
        <h4 style="color:blue"><?php if(!empty($alert)){echo "$alert";}else{if(!empty($alert2)){echo "$alert2";}}?></h4>
        <center><button class="w3-btn w3-blue " id="understand">I understand</button></center>
        <br>
      </div>
    </div>
  </div><br>

</body>
</html>
<script >
        $(document).ready(function(){
        $('#cno').click(function () {
        $('#modal').show();
        });
        $('#understand').click(function () {
       $('#cno').removeAttr('readonly');
       $('#modal').hide();
       $('#cno').off('click');
        });
    });
         
</script>
