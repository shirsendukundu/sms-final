<?php
include('header.php');
?>
 
<!DOCTYPE html>
<html>
<title>student admission</title>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
 <div class=" w3-display-container w3-margin w3-card  w3-responsive">
 
<h1><center>Student Admission</center></h1>
<div  class="w3-container w3-margin">
<fieldset><legend>Student Info</legend>
<form action="admission_eng.php" method="post" enctype="multipart/form-data">
<label>Student Name:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="name"required><br/>
<label>Gurdian Name:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="gur_name" required><br/>
<label> Adress:</label>
<textarea rows="4" cols="30" class="w3-input w3-border w3-round w3-light-grey" name="adress">
</textarea><br/>
<label>Contact no:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="mobile" maxlength="10" ><br/>
<label>Date Of Birth:</label>
<input class="w3-input w3-border w3-round w3-light-grey" id="dob" type="date" name="dob"><br/>
<label>Aadhar No:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="aadhar" maxlength="12"><br/>
  <div class="w3-row-padding">
  <div class="w3-half">
<label>Gender:</label>
<select class="w3-select w3-border  w3-light-grey " name="gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>
</select><br><br/></div>
<div class="w3-half">
<label>Caste:</label>
<select class="w3-select  w3-border w3-light-grey " name="caste">
<option value="General">General</option>
<option value="SC/ST">SC/ST</option>
<option value="OBC">OBC</option>
<option value="Others">Others</option></select><br><br/></div>
<label>Education Qualification:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="edu_qua"><br/>

</fieldset><br/>

<fieldset><legend>Course Details</legend>
<div class="w3-row-padding">
  <div class="w3-half">
<label>Choose course:</label>

<?php
include('connection.php');
$query = "SELECT cid, course_name FROM course ORDER BY course_name";
$result = mysqli_query($conn,$query);
?>
  
<select class="w3-select w3-border  w3-light-grey " name= "course" id="course-list" onChange="getbatch(this.value)";>
<option value=''>Select course</option>
<?php
while($row = mysqli_fetch_array($result)){
echo "<option value=$row[cid]>$row[course_name]</option>";
}
echo "</select>";
?>
</div>
 <div class="w3-half">
<label> Select Batch:</label>

<select class="w3-select w3-border  w3-light-grey " id="batch-list" name="batch[]" multiple="multiple">
<option value=''>Select Batch</option>
</select></div><br/>


</fieldset><br/>
<fieldset><legend>Upload Photo</legend><br/>
	
	
<div class="w3-row-padding w3-mobile w3-center">
	<div class="w3-col l5">
 		<input class="w3-input w3-border w3-round w3-light-grey" type="file" id="file" name="photo" accept="image/*"></div>
 		<div class="w3-col l2">
 			<button class="w3-button w3-yellow" hidden type="button" id="but_upload";>Upload</button>
   		</div>
 		<div id="response" class="w3-col l2 w3-text-red">
 			<img src="3d-loader.gif" id="image" width="180px" height="120px" hidden="" alt="Uploading..">
 		</div>
 		<div class="w3-col l3 w3-text-blue">
 			<p>Only JPG, JPEG, PNG & GIF files are allowed.
			   Max file size 50 kb Min: No limit.
			   Resolution should be 100 x 100 in px.
 			</p>
 		</div>
			
</div>
 
</fieldset><br></select><br><br>

<button class="w3-button w3-block w3-blue w3-margin-bottom" type="Submit" name="Submit" value="Submit" >Submit</button>
<br/>
</form>


<script type="text/javascript"> 
//ajax call for getting batch list aacording to select course
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

 <script>
  //date picker for dob
   $( "#dob" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"   
      });
  </script>

<script>

  $(document).ready(function() { 
       $("#file").change(function(e){
          var fileName = e. target. files[0]. name;
            if(fileName !=""){
      //call the validate() function for filename validation  
                  validate(fileName);
                       }
         });
      //create form data object and getting file name
         $("#but_upload").click(function() { 
                var fd = new FormData($('form')[0]); 
                var files = $('#file')[0].files[0]; 
                 fd.append('file', files); 
      //ajax call for upload photo
                $.ajax({ 
                    url: 'ajax-upload-eng.php', 
                    type: 'post', 
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

                        }
                        

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
          $("#but_upload").hide();
          return;
      }
      //show the upload button on successfull validation 
      $("#but_upload").show();
      //console.log(output);
        }
  </script>

</body>

</html>


