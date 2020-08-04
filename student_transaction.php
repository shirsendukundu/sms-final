<?php
include('header.php');
?>
<html>
<head>
<title>student transaction</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
</head>
<body>
<div class="  w3-margin w3-card  w3-responsive">
<div class= "w3-margin w3-container">
<div  class="w3-margin w3-card w3-responsive">
<fieldset>
<div class="w3-margin w3-responsive">
<legend>Search</legend><label>Student ID</label>

<input class="w3-input w3-border w3-round w3-light-grey" type ="text" name="stuid" placeholder="Enter Student ID  eg:S100"id="stuid"><br/>
<center><button type="submit" id ="btn" class="w3-btn w3-blue">Search</button></center>
</div></div></fieldset>
<div id="txndiv"class="w3-margin">


<?php
/*include('connection.php');
    if(isset($_POST["search"])){
	$stuid=$_POST['stuid'];
	$stu_id_string= substr("$stuid", 1); 
	$sql="SELECT * FROM `transaction` inner JOIN fees_type on 
transaction.fees_for=fees_type.fees_type_id
where sid='$stu_id_string'";
    $result=mysqli_query($conn,$sql);
	}
	
	?>
	

<h3 class="w3-broder"><center>Student's Transactions</center></h3>
<table class="w3-table-all  w3-hoverable">
<thead >
      <tr class="w3-dark-grey">
  <th>Txn_Id</th>
  <th>Txn_date</th>
  <th>For Month</th>
    <th>For year</th>
  <th>Fees Type</th>
  <th>Amount</th>
  </tr>
  </thead>
<?php
if(!empty($result))
	{
	while($row = mysqli_fetch_assoc($result))
			{
    
			
				echo"<tbody>
		  <tr>
		  <td>".$row['txn_id']."</td>
		  <td>".$row['date']."</td>
		  <td>".$row['month']."</td>
		  <td>".$row['year']."</td>
		  <td>".$row['fees_type']."</td>
		  <td>".$row['amount']."</td>
		 </tr>
			       </tbody>";
			
			}
	}

	*/?>

	
<script>
      $(document).ready(function () {
  
        $("#btn").click(function () {
        var sidid =$('#stuid').val();
        var sid = sidid.substring(1);
    $.ajax({
          type: "POST",
          url: "ajax_stu_txn_details.php",
          data:'sid='+sid,
          success: function(result){
            $("#txndiv").html(result);
                        }
          });
    });
  
    });
     
	</script>
<!--</table></div></div></div></div>-->
</div></div></body></html>