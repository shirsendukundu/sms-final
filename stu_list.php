

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="w3.css">
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("connection.php");
echo $_POST['batch_id'];

echo $query ="SELECT student.stu_id ,student.stu_name,student.mobile,student.address FROM studentbatches INNER JOIN student ON studentbatches.sid = student.sid WHERE studentbatches.bid='$_POST[batch_id]'";


	$results = mysqli_query($conn,$query);
?>
         <div  class="w3-responsive w3-margin">
         <table   class=" w3-table-all w3-card-4 w3-hoverable " >
	
	<thead>
			<tr class="w3-color w3-dark-grey ">
				<th>Student ID</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Adress</th>
				
			</tr>
	</thead>
		<tbody>

		
		

<?php
	while($row=$results->fetch_assoc()) 
		{
			
			echo "<tr class='w3-color w3-hover-blue'>
					<td>".$row['stu_id']."</td>
					<td>".$row['stu_name']."</td>
					<td>".$row['mobile']."</td>
					<td>".$row['address']."</td>
		            
				</tr>";
			
		}





?>
</tbody></table>
</body></html>
	