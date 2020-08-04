<?php include('header.php');?>
<html>
<head>
<title>Course Management</title>
</head>
<body>
<div class=" w3-display-container  w3-margin w3-card  w3-responsive">
      <h3><center>Add New Course </center></h3>
<div class="w3-margin">
     <fieldset>
                <legend>Course Details</legend>
 
         <form action ="course_engine.php" method="post">
 <div class="w3-row-padding">
 <div class="w3-third">
 <label> Course Name:</label><br/>
  <input type="text" class="w3-input w3-border w3-round w3-light-grey" name="course_name"></div>
 <div class="w3-third">
 <label> Course Duration:</label><br/>
    <input type="text" class="w3-input w3-border w3-round w3-light-grey" name="duration"></div>
	<div class="w3-third">
 <label> Course Fess:</label><br/>
  <input type="text" class="w3-input w3-border w3-round w3-light-grey" name="course_fees"><br><br/></div>
  
<center><a href="course_details.php" class="w3-btn w3-red">All Courses</a>
&nbsp
 <input type="submit" value="ADD NEW" class="w3-btn w3-blue"></center>
     </fieldset>
	    </form></div></div></div>
</body>
</html>
