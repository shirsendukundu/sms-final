<?php
include('connection.php');
require_once('header.php');

$_GET['cid'];
$_GET['cname'];
$_GET['duration'];
$_GET['fees'];


  if(isset($_GET["Submit"]))
  {
    $courseid=$_GET['cid'];
    $cname=$_GET['cname'];
    $duration=$_GET['duration'];
    $cfees=$_GET['fees'];
    $query="UPDATE course SET course_name='$cname',duration='$duration',course_fees='$cfees' WHERE cid='$courseid'";

    $data=mysqli_query($conn,$query);
  if($data) {
   header("Location:course_details.php");
   }  


  }
  
 ?> 
  


<html><title>Course Management</title>
<body>
<div class=" w3-display-container  w3-margin w3-card  w3-responsive">
      <div class= "w3-margin  w3-responsive">   
<center><h2>Update Course Details</h2></center><br/>
<div class= "w3-margin w3-responsive">   
<fieldset><center><legend>Cousre Details</legend></center>
               
 <form action ="" method="GET">
  <label> Course id:</label>
  <input type="text" name="cid"  class="w3-input w3-border w3-round w3-light-grey" value="<?php echo $_GET['cid'];?>" readonly> <br/>
  <label>Course Name:</label>
  <input type="text" name="cname" class="w3-input w3-border w3-round w3-light-grey"  value="<?php echo $_GET['cname'];?>" > <br/>
  <label>Duration:</label>
  <input type="text" name="duration"  class="w3-input w3-border w3-round w3-light-grey"  value="<?php echo $_GET['duration'];?>" ><br/>
 <label> Course Fess:</label>
  <input type="text" name="fees" class="w3-input w3-border w3-round w3-light-grey"  value="<?php echo $_GET['fees'];?>" ><br/>
  <input type="submit" name="Submit" class="w3-button w3-block w3-Teal w3-margin-bottom"  value="update"><br/></fieldset></form></body>
  </div></div></div>
  </html>
  
  