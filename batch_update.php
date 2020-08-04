<?php
include('connection.php');
include('header.php');
$_GET['bid'];
$_GET['time'];
$_GET['day'];
$_GET['cid'];


?>


<html>
<title>Batch Management</title>
<body><div class=" w3-display-container  w3-margin w3-card  w3-responsive">
<div class= "w3-margin  w3-responsive">
<h2>Batch Management</h2>
<fieldset><legend>Batch Details</legend>
                 
 <form action ="" method="GET">
   Batch id:
  <input type="text" name="bid" value="<?php echo $_GET['bid'];?>" readonly> <br><br/>
  Course: 
<?php
 

	$query = "SELECT cid, course_name FROM course ORDER BY course_name";
	$result = mysqli_query($conn,$query);
    echo "<select name=cid value=''>";
 while($row = mysqli_fetch_array($result))
	{
	echo "<option value=$row[cid]>$row[course_name]</option>";
    }		
	    $select=$_GET['cid'];
		$selectcourse="SELECT cid,course_name FROM course WHERE course_name='$select'";
		$selectresult0=mysqli_query($conn,$selectcourse);
	  while($row = mysqli_fetch_array($selectresult0))
		{
	      echo "<option selected=$row[cid]>$row[course_name]</option>";
	    }
               echo "</select>";

?>
<br></br>
  
  Batch Time:
  <input type="time" name="time" value="<?php echo $_GET['time'];?>"> <br><br/>
  
	On Day:
	<select name="day">
    <option value="Sunday"
	<?php if($_GET['day']=='Sunday')
	{
		echo"selected";
	}
	?>
	>Sunday</option>
    <option value="Monday"
	<?php if($_GET['day']=='Monday')
	{
		echo"selected";
	}
	?>
	>Monday</option>
    <option value="Tuesday"
	<?php if($_GET['day']=='Tuesday')
	{
		echo"selected";
	}
	?>
	>Tuesday</option>
    <option value="Wenesday"
	<?php if($_GET['day']=='Wenesday')
	{
		echo"selected";
	}
	?>
	>Wenesday</option>
	<option value="Thrusday"
	<?php if($_GET['day']=='Thrusday')
	{
		echo"selected";
	}
	?>
	>Thrusday</option>
	<option value="Friday"
	<?php if($_GET['day']=='Friday')
	{
		echo"selected";
	}
	?>
	>Friday</option>
	<option value="Saturday"
	<?php if($_GET['day']=='Saturday')
	{
		echo"selected";
	}
	?>
	>Saturday</option>
	
	</select><br><br/><a href="batch_details.php">See All Exting Batches</a><br><br/>
  
  
  <input type="submit" name="Submit" value="update"><br><br/>
</fieldset></form></body></html>
<?php
  if (isset($_GET["Submit"]))
	{
		$batch=$_GET['bid'];
		$btime=$_GET['time'];
		$bday=$_GET['day'];
		$course=$_GET['cid'];
		$updatequery="UPDATE BATCH SET time='$btime',day='$bday',cid='$course' WHERE bid='$batch'";
		$data=mysqli_query($conn,$updatequery);
		if($data);
		{
			echo ".$btime.$batch.$bday.$course.updated sucessfully";
		}
	
	
	}

?>
