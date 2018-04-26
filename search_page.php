<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php include("header.php");?>

<style >

  

.s1{
      margin-bottom: 0;
      border-radius: 0;
      padding: 50px 16px;
    }
	.carousel-inner img {
      width: 100%; 
      margin: auto;
      min-height:200px;
  }
  @media (max-width: 500px) {
    .carousel-caption {
      display: none; 
    }
}
.jumbotron{
margin-bottom: 0;
      border-radius: 0;
      padding: 50px 16px;
}

.col-50 {
    float: left;
    width: 50%;
    margin-top: 6px;



</style>


</head>


<?php
  $con=mysqli_connect("localhost","root","","project");
  $hosp_reg=$_GET['h_id'];

?>

<body>

  	<nav class="navbar navbar-default s1" style="background-color: lightgreen;margin-top: -22px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <?php
          $q="SELECT *  FROM hospital WHERE hospital_reg='$hosp_reg'";
          $result=mysqli_query($con,$q);
          $row=mysqli_fetch_assoc($result)

      ?>
      <a class="navbar-brand" href="#"><h1><b><?php echo $row['hospital_name']; ?></b></h1></a><br><br><br><br><br><br>
      
      <a class="navbar-brand" href="#"><p><b><?php echo $row['area'];?><br><?php echo $row['city'].", ".$row['state'];?><br><span class="glyphicon glyphicon-phone "></span><b><?php echo $row['phone_no'];?><b><br><span class="glyphicon glyphicon-envelope "></span><b><?php echo $row['email'];?></b></p></h5></a><br>
      
        
    </div>
    <div class="collapse navbar-collapse" >
      <div class="nav navbar-nav navbar-right"   style="padding-top: 0px ; font-size: 14px;">
       <img src="hospital1.png" alt="hospital1" class="img-circle" width="200" height="200">
        
      </div>
    </div>
  </div>
</nav>


<div class="jumbotron">
<div class="container">
  
  <div class="panel panel-default">
    <div class="panel-heading"><h4><b>Clinic Specialities</b></h4></div>
    <div class="panel-body">
      <div class="container">
        <?php
          $sql="SELECT name FROM c_specilities1 c1,c_specilities c WHERE hosp_reg='$hosp_reg' AND c.id=c1.specility_id";

            if ($result=mysqli_query($con,$sql))
            {
              
              while ($row=mysqli_fetch_assoc($result))
              {
                echo "<div class=\"row\" style=\"background-color:#f5f5f0;\"><h5>".$row['name']."</h5></div></br>";
              }
              
              mysqli_free_result($result);
            }
        ?>
      </div>
    </div>

      
    <div class="panel-heading"><h4><b>Additional services</b></h4></div>
    <div class="panel-body">
      <div class="container">
        <?php
          $sql="SELECT name FROM add_services1 c1,add_services c WHERE hosp_reg='$hosp_reg' AND c.id=c1.service_id";

            if ($result=mysqli_query($con,$sql))
            {
              
              while ($row=mysqli_fetch_assoc($result))
              {
                echo "<div class=\"row\" style=\"background-color:#f5f5f0;\"><h5>".$row['name']."</h5></div></br>";
              }
              
              mysqli_free_result($result);
            }
        ?>
      </div>
    </div>


  </div>
</div>






 
   <div class="container">
  
  <div class="panel panel-default">
    <div class="panel-heading"><h4><b>Room Rents</b></h4></div>
   


  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Room Types</th>
        <th>No. of Beds</th>
        <th>Room Rent-Non AC</th>
        <th>Room Rent-AC</th>
      </tr>
    </thead>
    <tbody>


        <?php
          $sql="SELECT Room_Types,No_Of_Beds, Rent_Non_AC, Rent_AC FROM room_rents WHERE hosp_reg='$hosp_reg'";

            if ($result=mysqli_query($con,$sql))
            {
              
              while ($row=mysqli_fetch_assoc($result))
              { 
              ?>
                

            <tr>
              <td><?php echo $row['Room_Types'] ?></td>
              <td><?php echo $row['No_Of_Beds'] ?></td>
              <td><?php echo $row['Rent_Non_AC'] ?></td>
              <td><?php echo $row['Rent_AC'] ?></td>
            </tr>
              <?php
              }
              mysqli_free_result($result);
            }
        ?>

      
    </tbody>
  </table>

      

  
  
  
   </div>
  </div>
</div>
</div>
</div>	
<?php include("footer.html");?>

 
</body>
</html>