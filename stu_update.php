<?php
include('header.php');
?>
<DOCTYPE!HTML>
<html>
<title>Student Update</title>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
	<div class=" w3-display-container w3-margin w3-card   w3-responsive">
		<div class= "w3-margin w3-responsive">
			<h2><center>Update Student Details</center></h2>
			<fieldset><legend>Search Student</legend><br>
				<form action ="" method="post">
				<input type="text" required class="w3-input w3-border w3-round w3-light-grey" name="sid" placeholder="Enter Student ID"><br>
				<input type="submit" class="w3-button w3-block w3-blue w3-margin-bottom" name="search" value="Search">
				</form>
			</fieldset>
				
		</div>
	</div>
</body>

</html>


<?php
include("connection.php");
if(isset($_POST["search"])){
$sid= $_POST['sid'];
//select student and his all batches 

$sql = "SELECT student.*,studentbatches.bid FROM student LEFT JOIN studentbatches ON student.sid=studentbatches.sid WHERE student.stu_id ='$sid'";
		
$query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)){
	$id=$row['sid'];
	$name=$row['stu_name'];
	$gur_name = $row['Gur _name'];
    $adress = $row['address'];
    $mobile =$row['mobile'];
    $dob = $row['dob'];
    $aadhar = $row['aadhar'];
    $gender = $row['gender'];
    $caste = $row['caste'];
    $education = $row['edu_qua'];
    $cid = $row['course_id'];
    $bid[]=$row['bid'];  //if a student have a one or many batches
    $photo=$row['photo'];
    
}}
$avtar="stu_avtar.jpg";

	?>




<!DOCTYPE html>

<html>
<head>
</head>
<body>
	<div class=" w3-display-container w3-margin w3-card  w3-responsive">
		<div class= "w3-margin   w3-responsive">
		<h3><center>Student Details</center></h3>
		<fieldset><legend>Student Info</legend>
<form action="stu_update_eng.php" method="post" enctype="multipart/form-data">
<div class="w3-display-container " style="height:190px;">
<div class="w3-display-topright ">
<img src='<?php if(empty($photo)){echo"$avtar";}else{echo "$photo";} ?>'' height='175'width='170' class="w3-padding w3-border" id="photo"><br>
<center><button class="w3-button w3-block w3-blue w3-margin-bottom" id="OpenImgUpload" type="button" style="margin-top:7px;" hidden>Change</button></center>
</div>
<div class="w3-display-topleft" style="width:80%;">
<label> Student id:</label><br/>
<input type="text"  class="w3-input w3-border w3-round w3-light-grey"  name="s_id" value="<?php if(empty($id)){echo'';}else{echo "$sid";}?>"readonly id="user_inp" ></br>
<!--this field is hidden and using for batch update on
	next page stu_update_eng.php-->
<input type="text" class="w3-input w3-border w3-round w3-light-grey"  name="sid" value="<?php if(empty($id)){echo'';}else{echo $id;}?>"hidden></br>

<label>Student Name:</label><br/>
<input type="text" name="name" class="w3-input w3-border w3-round w3-light-grey"   value="<?php if(empty($name)){echo'';}else{ echo"$name";}?>" required><br/></div></div>
<label > Gurdain Name:</label><br/>
<input type="text" class="w3-input w3-border w3-round w3-light-grey w3-margin-top" name="gur_name"value="<?php if(empty($gur_name)){echo'';}else{ echo"$gur_name";}?>" ><br/>
<label>Adress:</label><br/>
<textarea class="w3-input w3-border w3-round w3-light-grey" name="adress" cols="30" rows="4" ><?php if(empty($adress)){echo'';} else {echo "$adress";} ?></textarea><br/>
<label>Contact no:</label><br/>
<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="mobile" maxlength="10" value="<?php if(empty($mobile)){echo'';}else{echo"$mobile";}?>" ><br/>
<label>Date Of Birth:</label><br/>
<input type="date" id="dob" class="w3-input w3-border w3-round w3-light-grey" name="dob" value="<?php if(empty($dob)){echo'';}else{ echo"$dob";}?>"><br/>
<label>Aadhar No:</label><br/>
<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="aadhar" maxlength="12" value="<?php if(empty($aadhar)){echo'';}else{ echo"$aadhar";}?>"><br/>
<label>Education Qualification:</label><br/>
<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="edu_qua" value="<?php if(empty($education)){echo'';}else{echo "$education";}?>"><br/>
 <div class="w3-row-padding">
  <div class="w3-half">
<label>Gender:</label><br/>
<select name="gender" class="w3-select w3-border  w3-light-grey ">
<option value="select" selected disabled>Select</option>
<option value="Male"
<?php if(empty($gender)){echo '';}

     elseif($gender =='Male')
	{
		echo"selected";
	}
	?>>Male</option>
<option value="Female"
<?php    if(empty($gender)){echo'';}

         elseif($gender =='Female')
	{
		echo"selected";
	}
	?>>Female</option>
<option value="Others"
<?php if(empty($gender)){echo'';}
elseif($gender =='Others')
	{
		echo"selected";
	}
	?>>Others</option>
	</select></div>
	 
  <div class="w3-half">
<label>Caste:</label><br/>
<select name="caste" class="w3-select w3-border  w3-light-grey ">
 <option value="" selected disabled>Select</option>
<option value="General"

<?php
 if(empty($caste))
	{
		echo"";
	}
	elseif($caste=='General')
		{echo'selected';}
?>>General</option>
<option value="SC/ST"
<?php 
if(empty($caste))
	{
		echo"";
	}
	elseif($caste=='SC/ST')
		{echo'selected';}
	?>>SC/ST</option>
<option value="OBC"
<?php 
if(empty($caste))
	{
		echo"";
	}
	elseif($caste=='OBC')
		{echo'selected';}
	?>>OBC</option>
<option value="Others"
<?php 
if(empty($caste))
	{
		echo"";
	}
	elseif($caste=='Others')
		{echo'selected';}
	?>>Others</option>
</select> 
 <br/>
	</div>
</div>

</fieldset><br/>

<fieldset><legend>Course Details</legend>
 <div class="w3-row-padding">
  <div class="w3-half">
<label>Choose course:</label><br/>
<?php
$query = "SELECT cid,course_name FROM course ORDER BY course_name";
$result = mysqli_query($conn,$query);?>
<select class="w3-select w3-border  w3-light-grey " name= "course" onChange="getbatch(this.value)";>
<?php
while($row = mysqli_fetch_array($result)){
	//check if already student has a course 
	//if yes then select it 
	if($row['cid']===$cid){
		echo"<option value=$row[cid] selected>$row[course_name]</option>";
	}else{
		echo "<option value=$row[cid]>$row[course_name]</option>";
	}
}
  
?>
</select></div>
 
  <div class="w3-half">
<label>Select Batch: </label><br/>
<select class="w3-select w3-border  w3-light-grey " id="batch-list" name= "batch[]" multiple="multiple">
<?php
//loop for pass the $batch value as query prameter
//select all the batches that student already assigned.
// others batches are coming on their crossponding coures changes
		foreach ($bid as $batch) {
			$selectquery="SELECT `bid`,`time`,`day` FROM batch WHERE `bid`=$batch";
			$selectresult=mysqli_query($conn,$selectquery);
			$row = mysqli_fetch_array($selectresult);
			$time=$row[time];
			$day=$row[day];
			echo "<option value=$row[bid] selected=$row[bid]>$time|$day</option>";
				}

?>
</select>
</div></div><br/>
</fieldset>
<br/>	<input type="Submit" class="w3-button w3-block w3-blue w3-margin-bottom"    name='update' value="update" ><br/>
	 
</div>
</div>
<!----for profile pic update modal -->

 <div id='id01' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Upload Photo</h2>
      </header>
	  <div class="w3-container">
         <!--Result will be show here-->
        <fieldset><legend>Choose Photo</legend><br>
		<div class="w3-row-padding w3-mobile w3-center">
		<div class="w3-col l5">
			
 		<input type="file" class="w3-input w3-border w3-round w3-light-grey"  id="file" name ="photo" accept="image/*">
 		</div>
 		<div class="w3-col l2">
 		<button class="w3-button w3-yellow" hidden type="button" id="but_upload">Upload</button>
   		</div>
 		<div id="response" class="w3-col l2 w3-text-red">
 			<!--img src="3d-loader.gif" id="image" width="180px" height="120px" hidden="" alt="Uploading.."-->
 		</div>
 		<div class="w3-col l3 w3-text-blue">
 			<p>Only JPG, JPEG, PNG & GIF files are allowed.
			   Max file size 50 kb Min: No limit.
			   Resolution should be 100 x 100 in px.
 			</p>
 		</div><br><br>
 		
			 </form>

</div>
 
</fieldset><br>
<center><button id="done" hidden class="w3-button w3-blue" onclick="document.getElementById('id01').style.display='none'">Done</button></center><br>
     </div>
      
    </div>
  </div>

<!--Ajax call for crossponding batch list of selected courses-->

			<script>
			function getbatch(val) {
				$.ajax({
				type: "POST",
				url: "get-batch.php",
				data:'cid='+val,
				success: function(data){
					$("#batch-list").html(data);
				}
				});
			}
			</script>
		<!----for date picker---->	
	<script>
  	 $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"   
      });
     </script>
		<!----upload photo---->
     <script>	
       	$(document).ready(function(){
       	if($('#user_inp').val() != ''){

		/*pic modal show and change button show	*/
				
		$("#OpenImgUpload").show();
		}
		$("#OpenImgUpload").click(function(){
        $("#id01").show();
        $("#file").change(function(e){
        	var fileName = e. target. files[0]. name;
			if(fileName!=""){
			//call the validate() function for filename validation	
			validate(fileName);
        	 }
        });
		 //create form data object and getting the file name
		    $("#but_upload").click(function() { 
		        var fd = new FormData($('form')[0]); 
                var files = $('#file')[0].files[0]; 
                 fd.append('photo', files); 
			//ajax call for upload photo
                $.ajax({ 
                    url: 'ajax-upload-eng.php', 
                    type: 'post',
                    //dataType:'JSON', 
                    data: fd,
                    contentType: false, 
                    processData: false,
                     
                    beforeSend: function(){
				        $('#image').show();
				    },
				    complete: function(){
				        $('#image').hide();
				    },
                    success: function(response){ 
                    	$("#response").html(response);
                    	//reset input file path after upload failed
                    	    var res=$("img").size() ;
                    		if(res==1){
                    			var el = $('#file');
							    el.wrap('<form>').closest('form').get(0).reset();
							    el.unwrap();
							    $("#but_upload").hide();
                    		}
                    	}
                         
                      });
                	//after successfull upload show the done button 
                	$("#done").show();
                });
            });       
        }); 
     
      
      </script>

      <script>
      	//file name validation
      	function validate(value){
      		var output = value.substr(0, value.lastIndexOf('.')) || value;
			if(/^[a-zA-Z0-9- ]*$/.test(output) == false) {
			    
			    //$("#but_upload").hide();
			    alert('Your file name contains illegal characters.Does not put any special characters');
			    return;
			}
			//show the upload button on successfull validation 
			$("#but_upload").show();
			//console.log(output);
      	}
      </script>
      
</body>
</html>
