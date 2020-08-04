<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
</head>
<body>
<?php
include('connection.php');
    
	 $txn_id=$_POST['txn_id'];
   $sdate=$_POST['stdate'];
   $edate=$_POST['eddate'];
  if($txn_id){
    	$sql="SELECT * FROM `transaction` inner JOIN fees_type on 
    transaction.fees_for=fees_type.fees_type_id
    where txn_id='$txn_id'";
  }else{
     $sql="SELECT * FROM `transaction` inner JOIN fees_type on 
    transaction.fees_for=fees_type.fees_type_id
    where `date` BETWEEN '$sdate' AND '$edate' ORDER BY txn_id ASC";
  
  }

    $result=mysqli_query($conn,$sql);
		?>
<div >
<center><h3>Transactions Details</h3></center><hr><br>
<?php
	if((mysqli_num_rows($result))==0){
    $error_log = 'No such record found';
      {
    echo"<span class='w3-text-red w3-center' ><h4>$error_log</h4></span>";
   }
  
  }
  else{ 
    echo '<table  class=" w3-table-all w3-card-4 w3-hoverable  id="table" ">
<thead >
      <tr class="w3-dark-grey  ">
  <th>Txn_id</th>
  <th>Stu_Id</th>
  <th>Txn_date</th>
  <th>For Month</th>
  <th>For year</th>
  <th>Fees Type</th>
  <th>Amount</th>
  <th>Action</th>
  </tr>
 </thead>';
	while($row = mysqli_fetch_assoc($result))
	{//pass the txn_id value via get requst on challan_gen.php
    $tid=trim($row['txn_id'],"tT");
		{echo"<tr class='w3-hover-blue'>
  <td>T".$tid."</td>
  <td>S".$row['sid']."</td>
  <td>".$row['date']."</td>
  <td>".$row['month']."</td>
   <td>".$row['year']."</td>
  <td>".$row['fees_type']."</td>
  <td>".$row['amount']."</td>
  <td><a href='challan_gen.php?txnid=".$tid." 'target='_blank''><button type='submit' class ='w3-btn w3-yellow id='print'>Print</button></a>
  <a href='transaction_del.php?txnid=T".$tid."'><button type='submit' class ='w3-btn w3-red' id='del'>Delete</button></a></td>
	</tr>";
		 
    }
	}
  

}
?>
</table><br/><br/>
</div></div></div>
<script>
  

</script>
</body>
</html>
	



