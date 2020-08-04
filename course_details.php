<?php
include('header.php');
include('connection.php');
$sql = 'SELECT * 
		FROM course';
		
$query = mysqli_query($conn, $sql);
?>

<html>
<head>
<title>All Course details</title>
</head>


<body>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
	<h3><center>All Available Course Details</center></h3><br/>
	<div  class="w3-responsive w3-margin">
    <table  class=" w3-table-all w3-card-4 w3-hoverable ">
		<thead>
			<tr class="w3-color w3-dark-grey ">
				<th>Course ID</th>
				<th>COURSE Name</th>
				<th>Duration</th>
				<th>Fees</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
		while ($row = mysqli_fetch_assoc($query))
		{
			
			echo "<tr class='w3-hover-blue'>
					<td>".$row['cid']."</td>
					<td>".$row['course_name']."</td>
					<td>".$row['duration']."</td>
					<td>Rs: ".$row['course_fees']."</td>
		            <td><a href='course_update.php?cid=$row[cid]&cname=$row[course_name]&duration=$row[duration]&fees=$row[course_fees]'><i class='glyphicon glyphicon-pencil  w3-xlarge'></i></a></td>

				</tr>";
			
		}?>
		
		</tbody><br/>
		<tfoot>
			
		</tfoot>
	</table><br/></div></div>

<center><a href="Course_mng.php" class="w3-btn w3-red"><i class='glyphicon glyphicon-plus '></i> ADD NEW </a></center>

</body></html>
