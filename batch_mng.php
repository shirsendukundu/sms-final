<html>
<title>Batch Management</title>
<body>
<?php 
include('header.php');
?>
<div class=" w3-display-container  w3-margin w3-card  w3-responsive">

<h2><center>Add New Batch </center></h2>
<div class="w3-margin">
<fieldset><legend>Batch Details</legend>
                 
 <form action ="batch_engine.php" method="post">
 <div class="w3-row-padding">
  <div class="w3-third">
 <label> Course id :</label><br/> 
  <?php
include('connection.php');
$query = "SELECT cid, course_name FROM course ORDER BY course_name";
$result = mysqli_query($conn,$query);?>
<select name='cid' class="w3-select w3-border  w3-light-grey " >
<option value="">Select Course</option>
<?Php
while($row = mysqli_fetch_array($result)){
echo "<option value=$row[cid]>$row[course_name]</option>";
}
echo "</select>";
?></div>
 <div class="w3-third">
  <label>Batch Time:</label><br/>
  <input type="time" class="w3-input w3-border w3-round w3-light-grey" name="time"></div>
   <div class="w3-third">
  <label>On Day:</label><br/>
    <select name="day" class="w3-select w3-border  w3-light-grey "  >
	 <option value="">Select Day</option>
    <option value="Sunday">Sunday</option>
    <option value="Monday">Monday</option>
    <option value="Tuesday">Tuesday</option>
    <option value="Wenesday">Wenesday</option>
	<option value="Thrusday">Thrusday</option>
	<option value="Friday">Friday</option>
	<option value="Saturday">Saturday</option>
	</select>
	</div></div><br><br/>
	
	<center><a href="batch_details.php" class="w3-btn w3-red">See All Exting Batches</a>&nbsp &nbsp 
  
  <input type="submit" class="w3-btn w3-blue" value="ADD NEW"></center>
</fieldset></div></body></html>
