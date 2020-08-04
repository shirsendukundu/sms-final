
<?php
include('header.php');
include('connection.php');
$sql ='SELECT `bid`, `time`, `day`, `course_name` FROM `batch` INNER JOIN course on batch.cid=course.cid';
		
$query = mysqli_query($conn, $sql);

?>
<html><head>
<title>All Bacth details</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
<h3><center>All Available Batch Details</center></h3>
<div  class="w3-responsive w3-margin">
<div  class="w3-margin">
<table id="table1" class=" w3-table-all w3-card-4 w3-hoverable ">
	
		<thead>
			<tr class="w3-color w3-dark-grey ">
				<th><input type="checkbox" name="chkall" id="ckbCheckAll"> Select All</th>
				<th>BATCH ID</th>
				<th>TIME</th>
				<th>ON DAY</th>
				<th>COURSE </th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
		
<?php


		while ($row = mysqli_fetch_assoc($query))
		{
			
			echo "<tr class='w3-hover-blue tr'>
					<td><input type='checkbox'  value=".$row["bid"]." name='chk[]' id='chk'class='chk'></td>
				    <td>".$row['bid']."</td>
					<td>".$row['time']."</td>
					<td>".$row['day']."</td>
					<td>".$row['course_name']."</td>
		            <td><a href='batch_update.php?bid=$row[bid]&time=$row[time]&day=$row[day]&cid=$row[course_name]'><i class='glyphicon glyphicon-pencil w3-Xlarge'></i></a> &nbsp <i class='glyphicon glyphicon-user  w3-Xlarge bid'></i></td>
					
				</tr>";
			
		}

?>	

</tbody><br/>
		<tfoot>
			
		</tfoot>
	</table><br/></div>

<center><a href="batch_mng.php" class="w3-btn w3-red"><i class="glyphicon glyphicon-plus"></i>Add New</a>
<button class="w3-btn w3-Yellow"id="btn">Notify Students </button>
</center>

</div></div>

<!––for modal––>

 <div id='id01' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Student list</h2>
      </header>
	  <div id="stu-list"class="w3-container">
         
		<!--Result will be show here-->

    
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
  </div>
<script>
$(document).ready(function(){
$(".bid").click(function(){
        $("#id01").show();
});
		$("#table1").on('click','.bid',function(){
		var currentrw=$(this).closest("tr");
		var col1=currentrw.find("td:eq(1)").text();
		console.log(col1);
		 $.ajax({
	type: "POST",
	url: "stu_list.php",
	data:'batch_id='+col1,
	success: function(result){
		$("#stu-list").html(result);
	}
	});
		
        });
    });



</script>
<!--for checkbox and select bid-->

   <script>
   
				$(document).ready(function () {
				$("#ckbCheckAll").click(function () {
				$(".chk").attr('checked', this.checked);
			});
			$("#chk,#ckbCheckAll").click(function () {
			var bid = [];
            $.each($("input[name='chk[]']:checked"), function(){            
              	 bid.push($(this).val());
            });
            //console.log(bid);
			$("#bid").val(bid.join(","));
        	
				});
			$("#btn").click(function () {
			var b_id=$("#bid").val();
			$.ajax({
			type: "POST",
			url: "batch_notify.php",
			data:'bid='+b_id,
			success: function(result){
				$("#msg").html(result);
			}
		});
		
				
			});
				
		});
	</script>
	<input type='text' value='' id='bid' name='mob' hidden >
	
      <div class="w3-container w3-teal" id="msg">
      <?php if(isset($_SESSION['flash'])){echo $_SESSION['flash'];}	?>
  <h5>Footer</h5>
</div>
</body>
</html>