<style >
  
</style>
<div>
	<nav class="navbar navbar-default " style="background-color: lightblue !important;">
      <div class="container-fluid" >
        <div class="navbar-header"  >
            <a class="navbar-brand" href="front.php"><span class="glyphicon glyphicon-plus"></span><b>HealthCare</b></a>
        </div>
    
        <ul class="nav navbar-nav navbar-right" style="padding-top:10px;" >	
            <li><a href="rihan.php" id="myBtn1"><span class="glyphicon glyphicon-user"></span><b> Registration</b> </a></li>

            <?php
            	if(!isset($_SESSION['hospital']))
            	{
            ?>
            <li ><a href="#" id="myBtn"><span class="glyphicon glyphicon-log-in"></span><b> Login</b></a></li>
            <?php
        	}
        	else
        	{?>
        		
        			<li ><a href="logout.php" id="myBtn"><span class="glyphicon glyphicon-log-out"></span><b> Log out</b></a></li>	
        		
        	
        <?php	}

            ?>
        </ul>
      </div>
  </nav>

  
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 20px; background-color: lightblue;" >
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> <b>Login</b></h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="front.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span><b> Registration number</b></label>
              <input type="text" class="form-control" id="usrname" placeholder="Registration number" name="hosp_reg">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password">
            </div>
            


              <button type="submit" class="btn btn-info btn-block" name="login" id="myBtn" ata-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="rihan.php">Sign Up</a></p>
          
      </div>
      
    </div>
  </div> 
</div>


  
  
 

  
  
     
      
    </div>
  </div>

</div>
 

 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal2").modal();
    });
});
</script>
</div>

<?php
$con=mysqli_connect("localhost","root","","project");
if(isset($_POST['login']))
{	extract($_POST);

	$q="SELECT * FROM hospital WHERE hospital_reg='$hosp_reg'";
	$r=mysqli_query($con,$q);

	if(mysqli_num_rows($r)==1)
	{
		$row=mysqli_fetch_assoc($r);
		if($password==$row['Password'])
		{
			$_SESSION['hospital']=$hosp_reg;

			if(isset($_SESSION['hospital'])){
        echo '<script>window.location="rihan2.php"</script>';
				echo $_SESSION['hospital'];
      }
		}
    else
    {
      echo '<script>alert("wrong password")</script>';
      echo '<script>window.location="front.php"</script>';
    }
	}
  else
  {
    echo '<script>alert("user not exits")</script>';
  }


}

?>


