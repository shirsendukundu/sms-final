<?php
include('connection.php');
include('header.php');

        		$month = $_POST['month'];
			
				$year = $_POST['year'];
				$type = $_POST['type'];
				$sql = "select * from student 
				WHERE sid not IN 
				(SELECT sid from transaction WHERE `month`='$month' AND `year`='$year' AND `fees_for`='$type')
				AND
				certificate_issue=''";
				$result = mysqli_query($conn,$sql);
			
				
		
?>
<html><body>
<center><h3> Unpaid Students </h3></center><br/>
<div  class="w3-margin w3-responsive">
<table class=" w3-table-all  w3-hoverable">
<thead>
<tr class="w3-color w3-dark-grey ">
<th>Stu_id</th>
<th>Stu_name</th>
<th>Mobile</th>
<th>Adress</th>
</tr></thead>

<?php


   
    while($row=mysqli_fetch_assoc($result))
         {
			 echo " 
			<tbody>
				<tr id=1 class='w3-hover-blue tr'>
				<td>".$row['stu_id']."</td>
				<td>".$row['stu_name']."</td>
				<td>".$row['mobile']."</td>
				<td>".$row['address']."</td>
				</tr>";
				
			 
             
         }	

?>
</tbody><br/></table>