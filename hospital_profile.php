<?php
session_start();
$hosp_reg=$_SESSION['hospital'];

if(!isset($_SESSION['hospital']))
{echo '<script>alert("login first..")</script>';
  echo '<script>window.location="front.php"</script>';

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <?php include("header.php");?>
 <style>




* {
    box-sizing: border-box;
}

.s1{
      margin-bottom: 0;
      border-radius: 0;
      padding: 50px 16px;
    }


input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: blue;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
        margin-left: 1010px;
    margin-top: 5px;

    
}
input[type=button] {
    background-color: blue;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
        margin-left: 1010px;
    margin-top: 5px;

    
}


input[type=submit]:hover {
    background-color: lightblue;
}

.container1  {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;

}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row1:after {
    content: "";
    display: table;
    clear: both;
}



}
</style>
</head>

<?php
  $con=mysqli_connect("localhost","root","","project");
  

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



	<h2></h2>
	<div class="container container1">
  
  	<div class=" row row1">
  		<?php
  		  
        $sql="SELECT phone_no,email FROM hospital WHERE hospital_reg='$hosp_reg'";
  		  $result=mysqli_query($con,$sql);
  		    
  		  $r1=mysqli_fetch_assoc($result);
  		?>
      <div class="col-25">
        <label for="s1"><h4>Phone No</h4></label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="Phone" placeholder="" value="<?php echo $r1['phone_no']?>">
      </div>
     </div>
     
     <div class="row row1">
      <div class="col-25">
        <label for="s1"><h4>E-mail</h4></label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="email" placeholder=""  value="<?php echo $r1['email']?>">
      </div>
     </div>


<div class="row row1">
      <div class="col-25">
        <label for="s1"><h4>Your Specialities</h4></label>
      </div>
</div>
     <?php
  		$sql="SELECT name FROM c_specilities c,c_specilities1 c1 WHERE c.id=c1.specility_id AND hosp_reg='$hosp_reg';";
  		$result=mysqli_query($con,$sql);
  		
  			while($r1=mysqli_fetch_assoc($result))
  			{
  	 			?>
  	 			<div class="row row1">
    			<div class="col-25">
        		<label for="s1"></label>
      			</div>
      			<div class="col-75">
        		<input type="text" id="fname" name="s1" placeholder="" value="<?php echo $r1['name']?>">
      			</div>
      		    </div>
     		<?php	

 			}?>
 
    <div class="row row1"  >
    	<div class="pull-right"><input  type="button" value="Add New" name="new_specility" align="right" data-toggle="modal" data-target="#myModal">
        <div class="modal fade" id="myModal">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
        
              <div class="modal-body">
        
                <form action="rihan2.php" method="post">

                 <?php
                    $sql="SELECT name,id FROM c_specilities WHERE id NOT IN(SELECT specility_id from c_specilities1 WHERE hosp_reg='$hosp_reg')";
                    $result=mysqli_query($con,$sql);
                    while ($r1=mysqli_fetch_assoc($result)) {
                      
                    
                 ?>
                  <div class="form-check ">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"  name="Specialities[]" value="<?php echo $r1['id']?>"><?php echo $r1['name']?>
                  </label>
                  </div>
                  <?php
                }
                ?>
                
        
              
              <div class="modal-footer">
                <button type="submit" name="ok" class="btn btn-default" >Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?php
               if(isset($_POST['ok']))
                  {
                  $P=$_POST['Specialities'];
                  for($i=0; $i <count($P) ; $i++)
                  {
                    $run="INSERT INTO c_specilities1 VALUES('$hosp_reg',$P[$i]) ";
                    $qury=mysqli_query($con,$run);
                    if($qury)
                      echo '<script>window.location="rihan2.php"</script>';
                    else
                      echo "rrrrrr";
                  }
                  }
                ?>
              </div>
              </form>
            </div>
          </div>
    	   </div>    
        </div>
      </div> 
     </div>    


    <div class="row row1">
      <div class="col-25">
        <label for="s1"><h4>Your Additional Services</h4></label>
        </div>
    </div>
     <?php
  		$sql="SELECT name FROM add_services s,add_services1 s1 WHERE s.id=s1.service_id AND hosp_reg='$hosp_reg'";
  		$result=mysqli_query($con,$sql);
  		
  			while($r1=mysqli_fetch_assoc($result))
  			{
  	 			?>
  	 			<div class="row row1">
    			<div class="col-25">
        		<label for="s1"></label>
      			</div>
      			<div class="col-75">
        		<input type="text" id="fname" name="s1" placeholder="" value="<?php echo $r1['name']?>">
      			</div>
      		    </div>
     		<?php	

 			}?>


    <div class="row row1 "  >
      <div class="pull-right"><input  type="button" value="Add New" name="new_service" align="right" data-toggle="modal" data-target="#myModal1">
        <div class="modal fade" id="myModal1">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
        
              <div class="modal-body">
        
                <form action="" method="post">

                 <?php
                    $sql="SELECT name,id FROM add_services WHERE id NOT IN(SELECT service_id FROM add_services1 WHERE hosp_reg='$hosp_reg')";
                    $result=mysqli_query($con,$sql);
                    while ($r1=mysqli_fetch_assoc($result)) {
                      
                    
                 ?>
                  <div class="form-check ">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="other[]" value="<?php echo $r1['id']?>"><?php echo $r1['name']?>
                  </label>
                  </div>
                  <?php
                }
                ?>
                
           
              
              <div class="modal-footer">
                <button type="submit" name="ok1" class="btn btn-default">Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <?php
               if(isset($_POST['ok1']))
                  {
                  $P=$_POST['other'];
                  for($i=0; $i <count($P) ; $i++)
                  {
                    
                    $run="INSERT INTO add_services1 VALUES('$hosp_reg',$P[$i]) ";
                    $qury=mysqli_query($con,$run);
                    if($qury)
                      echo '<script>window.location="rihan2.php"</script>';
                    else
                      echo "rrrrrr";
                  }
                  }
                ?>
              </div>
              </form>
            </div>
          </div>
         </div>    
        </div>
      </div> 
     </div>
   



                            <div class="row row1">
                              <div class="col-25">
                                <label for="fname"><h4>Room Types</h4></label>
                              </div>
                              <div class="col-25">
                                <label for="fname"><h4>No. of beds</h4></label>
                              </div>
                              <div class="col-25">
                                <label for="fname"><h4>Room Rent-Non AC</h4></label>
                              </div>
                              <div class="col-25">
                                <label for="fname"><h4>Room Rent-AC</h4></label>
                              </div>
                            </div>

                       <form action="rihan2.php" method="post">
                            <?php
                              $sql="SELECT Room_Types,No_Of_Beds, Rent_Non_AC, Rent_AC FROM room_rents rr,room_id r WHERE hosp_reg='$hosp_reg' and rr.Room_Types=r.name ORDER BY r.id ";

                              if ($result=mysqli_query($con,$sql))
                              {$r=1;
                                
                                while ($row=mysqli_fetch_assoc($result))
                              { 
                            ?>  

                            
                            <div class="row row1">
                              <div class="col-25">
                                <label for="fname"><?php echo $row['Room_Types'] ?></label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="No_Of_Beds<?php echo$r;?>" value="<?php echo $row['No_Of_Beds'] ?>">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="Rent_Non_AC<?php echo$r;?>" value="<?php echo $row['Rent_Non_AC'] ?>">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="Rent_AC<?php echo$r;?>" value="<?php echo $row['Rent_AC'] ?>">
                              </div>
                            </div>

                            <?php
                            $r++;
                              }
                                
                              }


                              if(isset($_POST['submit'])){
                              for($i=1;$i<=7;$i++)
                              {$s1=$_POST["No_Of_Beds$i"];
                                $s2=$_POST["Rent_Non_AC$i"];
                                $s3=$_POST["Rent_AC$i"];
                                
                                $q1="UPDATE room_rents,room_id SET No_Of_Beds=$s1,Rent_Non_AC=$s2,Rent_AC=$s3 WHERE hosp_reg='$hosp_reg' and room_id.id=$i and room_id.name=room_rents.Room_Types";
                                $r11=mysqli_query($con,$q1);  

                                if($r11)
                                  echo '<script>window.location="rihan2.php"</script>';
                                else
                                  echo "rihan";
                              }
                            }
                              ?>
                              <div class="row row1">
                                <input type="submit" value="Submit" name="submit">
                              </div>
                        </form>


                            

    
  
</div>
>


<div>
<?php include("footer.html");?>	
</div>
</body>
</html>