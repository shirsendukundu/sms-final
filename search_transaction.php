<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>search transaction</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</script>

</head>
<body>

<div class="  w3-margin w3-card w3-display-container w3-responsive">
  <?php
  //for record delete flash message
 if(isset($_SESSION['flash'])){
  echo '<div class="w3-panel w3-col l4 w3-green w3-round w3-display-topright w3-margin">
  
  <span onclick=this.parentElement.style.display="none"
  class="w3-btn w3-large w3-green  w3-midium w3-display-topright">&times;</span><br/>
  <center><p class="w3-midium">'.$_SESSION['flash'].'</p></center>
  </div></br>';
  unset($_SESSION['flash']);
 }
 ?>
<div class= "w3-margin ">
<div  class="w3-margin w3-card w3-responsive">
<fieldset>
<div  class="w3-margin w3-responsive ">
  <legend>Search Transaction</legend>
  

<div class="w3-row-padding ">
 <div class="w3-col l3">
    <label>Transaction ID</label>
    <input class="w3-input w3-border w3-round w3-light-grey" type ="text" name="txnid" placeholder="Enter Transaction ID eg:T123 " ="" id="txnid">

  </div>
   <div class="w3-col l2 w3-margin-left"></br>
    <label class="w3-margin-top w3-right">OR</label></div>
    <div class="w3-col l3 w3-right">
      <label>End date</label><br>
    <input type="date" name="edate" class="w3-input w3-margin-right w3-padding" id="edate">
  </div>
  <div class="w3-col l3 w3-right">
    <label for="">Start date</label></br>
    <input type="date" name="sdate" class="w3-input w3-padding " id="sdate"></div>
  </div><br><br>
<center>
  <button type="submit" id="btn" class="w3-btn w3-blue w3-medium">Search</button>
</center><br>
</div>

</fieldset>
<div id='txndiv' class='w3-margin'>
</div>
</div>
<script>
$(document).ready(function () {
  
        $("#btn").click(function () {
        var txnno =  $('#txnid').val();
        var sdate =  $('#sdate').val();
        var edate =  $('#edate').val();
    $.ajax({
          type: "POST",
          url: "ajax_search_txn.php",
          data: { txn_id: txnno, stdate: sdate, eddate: edate },
          success: function(result){
            $("#txndiv").html(result);
                        }
              });
      });
  
    //for either select txn id or select start and end date
    
      $('#sdate,#edate').click(function(){
        $('#txnid').val(null);
        });
         $('#txnid').click(function(){
        $('#sdate,#edate').val("");
        
        });
        $('#del').click(function(){
alert("Do you Really want to Delete this record ?");
});
 });
        
    
  
</script>
<script>
     $( "#edate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"   
      });
       
     $( "#sdate" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd"   
      });
       </script>
 
</body></html>

