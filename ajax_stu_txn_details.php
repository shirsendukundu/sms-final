<?php
require_once("connection.php");

$sid=mysqli_real_escape_string($conn, $_POST['sid']);

	$query ="SELECT * FROM `transaction` inner JOIN fees_type on 
transaction.fees_for=fees_type.fees_type_id
where `sid`=$sid ORDER BY `txn_id` ASC";
	$results = mysqli_query($conn,$query);

?>

         <div >
         	<center><h3>Student Transaction Details</h3></center>
         <table   class=" w3-table-all w3-card-4 w3-hoverable " >
	
	<thead>
			<tr class=" w3-dark-grey ">
				<th>TXN_ID</th>
				<th>Date</th>
				<th>Month</th>
				<th>Year</th>
				<th>Fees Type</th>
				<th>Amount</th>
				
			</tr>
	</thead>
		<tbody>

		
		

<?php
if(empty($sid) or mysqli_num_rows($results)==0){
    $error_log = 'No such record found';
  echo"<tr><td style='color:red;text-align:center;'><b> $error_log</b></td></tr>";
  }
  else{
	while($row=$results->fetch_assoc()) 
		{
			
			echo "<tr class='w3-hover-blue'>
					<td>".$row['txn_id']."</td>
					<td>".$row['date']."</td>
					<td>".$row['month']."</td>
					<td>".$row['year']."</td>
					<td>".$row['fees_type']."</td>
					<td>".$row['amount']."</td>
		            
				</tr>";
			
		}
	

}


?>
