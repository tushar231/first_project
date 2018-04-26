<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hospital Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php include("header.php");?>
</head>

<style >
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;

  
}


</style>

<?php
  if(isset($_POST['submit']))
  {
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
      $conn = mysqli_connect("localhost","root","","project");
       



        $hosp_reg=$_POST['RegistrationNumber'];

        $pass=$_POST['Password'];
        $hosp_name=$_POST['Name'];
        $area=$_POST['Area'];
        $city=$_POST['City'];
        $state=$_POST['State'];
        $pin=$_POST['Pincode'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];

        $s="SELECT hospital_reg FROM hospital WHERE hospital_reg='$hosp_reg' ";
        $result=mysqli_query($conn,$s);
        if(mysqli_num_rows($result)>0)
        {
          $message = 'Already registered';

          echo "<SCRIPT>
                alert('$message');
                </SCRIPT>";
        }
        
        
else if($_POST['RegistrationNumber']=='Registration Number')
        {
          $message = 'enter registration no.';

          echo "<SCRIPT>
                alert('$message');
                </SCRIPT>";

        }
        

        else 
        {
          $run1="INSERT INTO hospital ( hospital_reg, Password, hospital_name, area, city, state, pin, phone_no, email) VALUES ('$hosp_reg','$pass','$hosp_name','$area','$city','$state',$pin,$phone,'$email')";

          $qury=mysqli_query($conn,$run1);
          




          $P=$_POST['Specialities'];
          for($i=0; $i <count($P) ; $i++)
          {
            
            $run="INSERT INTO c_specilities1 VALUES('$hosp_reg',$P[$i])";
            $qury=mysqli_query($conn,$run);
            
          }

          $P=$_POST['other'];
          for($i=0;$i<count($P);$i++)
          {
            
            $run="INSERT INTO add_services1 VALUES('$hosp_reg',$P[$i])";
            $qury=mysqli_query($conn,$run);
            
          }



            extract($_POST);

            $run1="INSERT INTO room_rents VALUES('$hosp_reg','Multibedded',$m_beds,$m_no_ac,$m_ac)";
            $run2="INSERT INTO room_rents VALUES('$hosp_reg','Others',$o_beds,$o_no_ac,$o_ac)";
            $run3="INSERT INTO room_rents VALUES('$hosp_reg','Single',$s_beds,$s_no_ac,$s_ac)";
            $run4="INSERT INTO room_rents VALUES('$hosp_reg','Twin Sharing',$t_beds,$t_no_ac,$t_ac)";
            $run5="INSERT INTO room_rents VALUES('$hosp_reg','Emergency',$e_beds,$e_no_ac,$e_ac)";
            $run6="INSERT INTO room_rents VALUES('$hosp_reg','Day Care',$da_beds,$da_no_ac,$da_ac)";
            $run7="INSERT INTO room_rents VALUES('$hosp_reg','Delux',$de_beds,$de_no_ac,$de_ac)";

            $r=mysqli_query($conn,$run1);
            
            
            mysqli_query($conn,$run2);
            

            mysqli_query($conn,$run3);
            

            mysqli_query($conn,$run4);
            

            mysqli_query($conn,$run5);
            

            mysqli_query($conn,$run6);
            

            mysqli_query($conn,$run7);
            

            
        }
    }



}
?>

<body>








<div class="container">
  <h2 align="center"><i class="fa fa-hospital-o"></i> Hospital Registration</h2>
  
  <form  name='registration' action="rihan.php" method="post" onSubmit="return ValidateEmail(email);">
    
    <div class="form-group">
      <label for="inputdefault">Registration Number</label>
      <input class="form-control" name="RegistrationNumber" id="inputdefault1" placeholder="Registration Number..." type="text" value="Registration Number">
    </div>

    <div class="form-group">
      <label for="inputdefault">Password</label>
      <input class="form-control" name="Password" id="inputdefault2" placeholder="Password.." type="Password">
    </div>

    <div class="form-group">
      <label for="inputdefault">Name</label>
      <input class="form-control" name="Name" id="inputdefault3" placeholder="Hospital Name..." type="text">
    </div>
    
    
    <div class="form-group">
      <label for="inputdefault">Area</label>
      <input class="form-control" name="Area" id="inputdefault4" placeholder="Area..." type="text">
    </div>
    <div class="form-group">
      <label for="sel1">City</label>
      <select class="form-control" name="City" id="sel1" placeholder="Choose state...">
        <option>Mumbai</option>
        <option>Hyderabad</option>
        <option>Delhi</option>
        <option>Kolkata</option>
        <option>Bangalore</option>
        <option>Chennai</option>
        <option>Pune</option>
        <option>Lucknow</option>
        <option>Ahamdabad</option>
        <option>Chandigarh</option>
        <option>Jaipur</option>
      </select>
    </div>
    <div class="form-group">
      <label for="sel1">State</label>
      <select class="form-control" name="State" id="sel1" placeholder="Choose City...">
        <option>Maharashtra</option>
        <option>Andhra Pradesh</option>
        <option>Delhi</option>
        <option>West Bengal</option>
        <option>Karnataka</option>
        <option>Tamilnadu</option>
        <option>Up</option>
        <option>Gujarat</option>
        <option>Chandigarh</option>
        <option>Rajsthan</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="inputdefault">Pincode</label>
      <input class="form-control" name="Pincode" id="inputdefault5" type="text" placeholder="Pincode...">
    </div>

    <div class="form-group">
      <label for="inputdefault">Phone Number</label>
      <input class="form-control" name="phone" id="inputdefault6" type="text" placeholder="Phonenumber...">
    </div>
    <div class="form-group">
      <label for="inputdefault">Email</label>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>

                 <div class="form-group"> 
                         <label for="inputdefault" ><b>Clinic Specialities</b></label><br>
                       <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="container">
                            <div class="row">
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox"  name="Specialities[]" value="1">Ophthalmology
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="2">ENT
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="3">Neurology
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="4">Bariatric Surgery
                                </label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="5">cardiology
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="6">Dermatology
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="7">Orthopadics
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]"  value="8">Onclology
                                </label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="9">Obstetrics
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="10">Pulmonology
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="11">Organ Transplant
                                </label>
                              </div>
                              <div class="col-25">
                                <label for="checkbox-inline">
                                <input type="checkbox" name="Specialities[]" value="12">Endocrinology
                                </label>
                              </div>
                           </div>
                           <div class="row">
                            <div class="col-25">
                              <label for="checkbox-inline">
                               <input type="checkbox" name="Specialities[]" value="13">Gastroenterology
                              </label>
                            </div>
                            <div class="col-25">
                             <label for="checkbox-inline">
                             <input type="checkbox" name="Specialities[]" value="14">Paediatrics
                             </label>
                            </div>
                            <div class="col-25">
                             <label for="checkbox-inline">
                             <input type="checkbox" name="Specialities[]" value="15">Urology
                             </label>
                            </div>
                            <div class="col-25">
                             <label for="checkbox-inline">
                             <input type="checkbox" name="Specialities[]" value="16">Plastic surgery
                             </label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-25">
                             <label for="checkbox-inline">
                             <input type="checkbox" name="Specialities[]" value="17">CVT
                             </label>
                            </div>
                            <div class="col-25">
                             <label for="checkbox-inline">
                             <input type="checkbox" name="Specialities[]"s value="18">Robotic Surgery
                             </label>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
         <div>
                 <div class="form-group"> 
                         <label for="inputdefault" >Additional services</label><br>
                          <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="container">
                            <div class="row">
                              <div class="col-25">
                         <label for="checkbox-inline">
                         <input type="checkbox"  name="other[]" value="1">Overnight Attendant Lounge
                          </label>
                        </div>
                        <div class="col-25">
                            <label for="checkbox-inline">
                            <input type="checkbox" name="other[]" value="2">ATM
                             </label>
                            </div>
                            <div class="col-25">
                              <label for="checkbox-inline">
                         <input type="checkbox"  name="other[]" value="3">Parking
                          </label>
                        </div>
                        <div class="col-25">
                            <label for="checkbox-inline">
                            <input type="checkbox" name="other[]" value="4">Valet Parking
                             </label>
                           </div>
                           </div>
                           <div class="row">
                            <div class="col-25">
                                            <label for="checkbox-inline">
                         <input type="checkbox"  name="other[]" value="5">Emerald Lounge
                          </label>
                        </div>
                        <div class="col-25">
                            <label for="checkbox-inline">
                            <input type="checkbox" name="other[]" value="6">International Services Desk
                             </label>
                           </div>
                           <div class="col-25">
                              <label for="checkbox-inline">
                            <input type="checkbox" name="other[]" value="7">Corporate Desk
                             </label>
                           </div>
                           <div class="col-25">
                              <label for="checkbox-inline">
                            <input type="checkbox" name="other[]" value="8">Business Centre
                             </label>
                           </div>
                           </div>
                           </div>

         </div>
       </div>
     </div>


<div class="form-group"> 
                         <label for="inputdefault" >Room Information</label><br>
                          <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="container">
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">Room Types</label>
                              </div>
                              <div class="col-25">
                                <label for="fname">No. of beds</label>
                              </div>
                              <div class="col-25">
                                <label for="fname">Room Rent-Non AC</label>
                              </div>
                              <div class="col-25">
                                <label for="fname">Room Rent-AC</label>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">1.Multibedded</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="m_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="m_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="m_ac" value="0">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">2.Others</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="o_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="o_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="o_ac" value="0">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">3.Single</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="s_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="s_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="s_ac" value="0">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">4.Twin Sharing</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="t_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="t_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="t_ac" value="0">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">5.Emergency</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="e_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="e_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="e_ac" value="0">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">6.Day Care</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="da_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="da_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="da_ac" value="0">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-25">
                                <label for="fname">7.Delux</label>
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="de_beds" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="de_no_ac" value="0">
                              </div>
                              <div class="col-25">
                                <input type="text" id="fname" name="de_ac" value="0">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

     

    <input  type="submit" id="submit" class="btn btn-primary btn-block" value="Submit" name="submit" style="margin-bottom: 40px;">



  </form>
</div>


 
<?php include("footer.html");?>


</body>
</html>
