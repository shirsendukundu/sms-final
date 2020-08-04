<?php
	include('connection.php');
	

if(isset($_POST["update"])){
		$sid=$_POST['sid'];
		$s_id= $_POST['s_id'];
		$sname = $_POST['name'];
		$g_name = $_POST['gur_name'];
		$adr = $_POST["adress"];
		$mob = $_POST['mobile'];
		$sdob = $_POST['dob'];
		$aadharno = $_POST['aadhar'];
		$gen = $_POST['gender'];
		$cast = $_POST['caste'];
		$edu = $_POST['edu_qua'];
		$c_id = $_POST['course'];
		$b_id=$_POST['batch'];
		$photo=$_FILES['photo']['name'];
		$implode=implode(",", $b_id);
		//using multiquery for update student details
		//and delete all others assigned batches from studentbatches that no more related to student
		$query="UPDATE student SET stu_name='$sname',`Gur _name`='$g_name',address='$adr',mobile='$mob',dob='$sdob',aadhar='$aadharno',gender='$gen',caste='$cast',edu_qua='$edu',course_id='$c_id' WHERE stu_id='$s_id';";
		$query.="DELETE FROM studentbatches WHERE bid NOT IN ($implode) AND sid=$sid";
			//run the above 2 query at a same time (multi query)
				if(mysqli_multi_query($conn,$query)){
				//flash the mysqli_multi_query 
				mysqli_next_result($conn);	
				//echo "Error". $query . mysqli_error($conn);
				//loop using for getting all the selected batch id and update  student batches
				//first delete all the assigned batches
				//insert new assign batch 
				//INSERT IGNORE INTO studentbatches VALUES (34,49);
	     		foreach ($b_id as $batch) {
						$sql="INSERT IGNORE INTO studentbatches (sid,bid) VALUES ($sid,$batch)";
	    			 	mysqli_query($conn,$sql);
	    				}
					}
	}
		//profile photo update
	if(!empty($photo)){
    $sql="SELECT `photo` FROM `student` WHERE stu_id='$s_id'";
    $query=mysqli_query($conn,$sql);
    $data=(mysqli_fetch_array( $query));
    //store the old photo path 
    echo $data[0];
    //update new photo 
    echo $up='student_img/'.$photo;
    $updatesql="UPDATE student SET photo='$up' WHERE stu_id='$s_id'";
    if(mysqli_query($conn,$updatesql)){
    	//after successfull update delete old photo;
    	unlink($data[0]);
	   	}  
    
	header("Location: http://localhost/sms/all_student_details.php");
	}
	else {
		 
	header("Location: http://localhost/sms/all_student_details.php");
	}
?>	