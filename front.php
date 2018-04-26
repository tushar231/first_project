<?php
session_start();
$con=mysqli_connect("localhost","root","","project");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Healthcare</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php include("header.php");?>

<script type="text/javascript">
  
function s(str)
{      
         

            var req=new XMLHttpRequest();
      req.open("get","http://localhost/list.php?city="+str,true);
      req.send();
      req.onreadystatechange=function(){


        if(req.readyState==4 && req.status==200)
        {
                document.getElementById("myList").innerHTML=req.responseText;
        }
      };



}


  
</script>



</head>

<style type="text/css">
  

.navbar
   {


    background-color: lightblue;
}
.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
    }



</style>
<body>


  

 <div class="container" style="padding-top: 200px; padding-left: 350px;  ">
 <div  class="col-lg-12">
 <form action="" method="post">
  <div class="input-group" style="display: inline-flex;">
  
      <select id="selector" onchange="s(this.value)">
      <option value="Mumbai"> Mumbai</option>
      <option value="Hyderabad"> Hyderabad</option>
      <option value="Delhi"> Delhi</option>
      <option value="Kolkata"> Kolkata</option>
      <option value="Bangalore"> Bangalore</option>
      <option value="Chennai"> Chennai</option>
      <option value="Pune"> Pune</option>
      <option value="Lucknow"> Lucknow</option>
      <option value="Ahamdabad"> Ahamdabad</option>
      <option value="UP"> UP</option>
      <option value="Chandigarh"> Chandigarh</option>
    <option value="Jaipur"> Jaipur</option>
    </select>

    <input type="text" class="form-control" placeholder="Search" style="display: inline;width: 395px;" id="myInput" >
    
    <br>
  
  </div>
  <ul class="list-group" id="myList" style="    margin-left: 101px;margin-right: 280px;">
    
  </ul>  
</form>
</div>

</div>
<script>

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myList li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});



</script>

  
  
     
      
    </div>
  </div>

</div>
 
<script>
$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#myModal1").modal({backdrop: true});
    });
   
});
</script>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>
<div style=" position: fixed;left: 0px; right: 0px;bottom: 0px;">
    <?php include("footer.html");?>
</div>
</body>
</html>
