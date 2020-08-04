<?php
include('header.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>fees deu of month</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<center><h3></h3></center>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
<div class= "w3-margin w3-container">

<div class="w3-card w3-margin ">
<fieldset><legend> &nbsp Search Students</legend>
<form action ="" method="POST" enctype="multipart/form-data">
<div class="w3-row-padding">
<div class="w3-third">
             <label>Year of:</label>
            <select  class="w3-select w3-border w3-light-grey" name="year">
						<option value="" selected>Choose Year..</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2015">2021</option>
						<option value="2015">2022</option>
            </select>
</div>
<div class="w3-third">
           <label>Month of:</label>
			<select class="w3-select w3-border w3-light-grey" name="month">
						<option value="" selected>Choose Month..</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
			</select>
</div>
       <div class="w3-third">
                         <label>Fees type:</label>
							<select class="w3-select w3-border w3-light-grey " name="type">	
									<option value="" selected>Select for..</option>
									<option value="5">Admission</option>
									<option value="6">Tuition</option>
									<option value="7">Exam</option>
									<option value="8">Others</option>
							</select></br><br/>
     </fieldset> <br>
     
<center><input class="w3-btn w3-red" type="submit"  name="search"  value="search" id="btn"></center></br></form>

</div>

<?php
include('connection.php');
if(isset($_POST["search"])){
if(!empty($_POST['month'] && $_POST['type'] && $_POST['year'])){
		
		

        		$month = $_POST['month'];
			    $year = $_POST['year'];
				$type = $_POST['type'];
				$query="select fees_type from fees_type where fees_type_id ='$type'";
                $res=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($res))
					{
				  $fees=$row['fees_type'];
				   }
				
				
				$sql = "select * from student 
				WHERE sid not IN 
				(SELECT sid from transaction WHERE `month`='$month' AND `year`='$year' AND `fees_for`='$type')
				AND
				certificate_issue is NULL";
				$result = mysqli_query($conn,$sql);
		}
			else {
            
             $err="Please select all the input field";
			echo "<div style='color:red;text-align:center;'><b>$err</b></div>";
			}
}			
		
?>

<center><h3> Unpaid Students </h3></center>
<div  class="w3-margin w3-responsive">
<table id="table" class="w3-table-all w3-hoverable">
<thead>
<tr id="tr" class="w3-dark-grey">
<th><input type="checkbox" name="chkall" id="ckbCheckAll"> Select All</th>
<th>Stu_id</th>
<th>Stu_name</th>
<th>Mobile</th>
<th>Adress</th>
<th>Classification</th>
</tr></thead>

<?php

if(!empty($result))
 { 
   
    while($row=mysqli_fetch_assoc($result))
         {
			 echo " 
			<tbody>
				
				<td><input type='checkbox'  value=".$row["mobile"]." name='chk[]' id='chk'class='chk'></td>
				<td>".$row['sid']."</td>
				<td>".$row['stu_name']."</td>
				<td>".$row['mobile']."</td>
				<td>".$row['address']."</td>
		 <td><i class='glyphicon glyphicon-list w3-Xlarge stu-txn'></i></td>
				</tr>";
				
			 
             
         }	
 }
?>
</tbody></table><br/><br/>
</div></div>
	

   <script>
   
				$(document).ready(function () {
				$("#ckbCheckAll").click(function () {
				$(".chk").attr('checked', this.checked);
			});
			$("#chk,#ckbCheckAll").click(function () {
			var mobileno = [];
            $.each($("input[name='chk[]']:checked"), function(){            
                mobileno.push($(this).val());
            });
            
			$("#mob").val(mobileno.join(","));
        	
				
				
				});
				
		});
				
		
	</script>

<!––for modal––>

 <div id='id01' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Transaction Details</h2>
      </header>
	  <div id="stu-txnlist"class="w3-container">
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
  </div>
   <script>
			$(document).ready(function(){
			$(".stu-txn").click(function(){
					$("#id01").show();
			});
		$("#table").on('click','.stu-txn',function(){
		var currentrw=$(this).closest("tr");
		var col1=currentrw.find("td:eq(1)").text();
		
				 $.ajax({
					type: "POST",
					url: "ajax_stu_txn_details.php",
					data:'sid='+col1,
					success: function(result){
						$("#stu-txnlist").html(result);
												}
		});
		
						});
										});
	 </script>


<form action ='f2smsapi.php' method='POST'>
		
<input type='text' value='' id='mob' name='mob' hidden >
<input type='text' value='<?php if(!empty($fees)){ echo "$fees";}?>' name='fees' hidden>
<input type='text' value='<?php if(!empty($month)){echo "$month";}?>' name='month' hidden>

<br/>
<center><input class="w3-btn w3-green" type="submit"  name="sendsms"  value="Send MSG" id="msg">
</center></br>

</body>
</html>