<?php
include('header.php');
include('connection.php');

$sql = 'SELECT `photo`,`stu_id`, `stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`,`course_name` FROM `student` INNER JOIN course on student.course_id=course.cid';
		
$query = mysqli_query($conn, $sql);
?>
<html>
		<head>
		<title>All Students details</title>
		</head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>

<div class=" w3-display-container w3-margin w3-card w3-responsive">
	<h3><center>All Students Details</center></h3>
<div  class="w3-responsive w3-margin">
	<i class='glyphicon glyphicon-search  w3-large'></i><input class="w3-input w3-animate-input" type="text" id="search" placeholder=" Search Student " style="width:225px"><br/>

	<table class="w3-table-all w3-hoverable w3-centered w3-card-4 w3-small" id="table1">
		<thead>
        <tr class="w3-color w3-dark-grey  ">
				<th>Photo</th>
				<th>Student ID</th>
				<th>Name</th>
				<th>Gurdian</th>
				<th>Address</th>
				<th>Contact No</th>
				<th>DOB</th>
				<th>Aadhar No</th>
				<th>Gender</th>
				<th>Caste</th>
		        <th>Qualification</th>
				<th>Course</th>
				<th>Batches</th>
				
			</tr>
		</thead>
		
		
		<?php
		while ($row = mysqli_fetch_assoc($query))
		 
		{
			echo "<tbody id= tabledata> 
			 <tr class='w3-hover-grey'>
			         
			        <td><img src='".$row['photo']."'height='50'width='50'/></td>
					<td>".$row['stu_id']."</td>
					<td>".$row['stu_name']."</td>
					<td>".$row['Gur _name']."</td>
					<td>".$row['address']."</td>
					<td>".$row['mobile']."</td>
					<td>".$row['dob']."</td>
					<td>".$row['aadhar']."</td>
					<td>".$row['gender']."</td>
					<td>".$row['caste']."</td>
					<td>".$row['edu_qua']."</td>
					<td>".$row['course_name']."</td>
					<td><i class='glyphicon glyphicon-th-list  w3-large bid'></i></td>
					
		         </tr>
			</tbody>";
		}?>
		
		
		
	
	</table>
</div>

<!--for batch list modal -->
 <div id='id01' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Student's Batch list</h2>
      </header>
	  <div id="batch-list"class="w3-container">
         <!--Result will be show here-->
         <img src="3d-loader.gif" id="image" width="180px" height="120px" hidden="" alt="Uploading..">
     </div>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
  </div>
  <!--for student batch list show in Modal-->
<script>
$(document).ready(function(){
$(".bid").click(function(){
        $("#id01").show();
});
		$("#table1").on('click','.bid',function(){
		var currentrw=$(this).closest("tr");
		var col1=currentrw.find("td:eq(1)").text();
		//alert(col1);
		 $.ajax({
	type: "POST",
	url: "ajax_batch_list.php",
	data:'sid='+col1,
	beforeSend: function(){
				        $('#image').show();
				    },
				    complete: function(){
				        $('#image').hide();
				    },
	success: function(result){
		$("#batch-list").html(result);
	}
	});
		
        });
    });
</script>
<!--for search student on page-->
<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabledata tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>



