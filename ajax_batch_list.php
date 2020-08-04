<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="w3.css">
<title>Batch list Modal</title>
</head>

<body>
<?php
require_once("connection.php");

$sid=trim($_POST["sid"],"sS");
	$query ="SELECT studentbatches.bid,batch.time,batch.day from studentbatches INNER join batch on studentbatches.bid= batch.bid WHERE studentbatches.sid=$sid";

//echo $query;
	$results = mysqli_query($conn,$query);
?>
         <div  class="w3-responsive w3-margin">
         <table   class=" w3-table-all w3-card-4 w3-hoverable " >
	
	<thead>
			<tr class="w3-color w3-dark-grey ">
				<th>BATCH ID</th>
				<th>TIME</th>
				<th>ON DAY</th>
			</tr>
		</thead>
		<tbody>

		
		

<?php
	while($row=$results->fetch_assoc()) 
		{
			
			echo "<tr class='w3-color w3-hover-blue'>
					<td>B".$row['bid']."</td>
					<td>".$row['time']."</td>
					<td>".$row['day']."</td>
					
		            
				</tr>";
			
		}





?>
		</tbody>
	</table>
</body>
</html>
	