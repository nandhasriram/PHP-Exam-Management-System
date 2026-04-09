<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>IMS ERP - Jpninfotech</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   

  </head>
<body style="overflow-x: hidden;">
<?php
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(0);
 $user=$_SESSION["user"];

 $Password=$_SESSION["Password"];
 $username=$_SESSION["username"];

if($userid==''&&$Password=='')
{
 

?>
<div style="display: flex; justify-content: flex-end; padding-right: 80px !important;">

<span style="font-size: smaller;" ><a href="" style="color:black;text-decoration: none;">ARE YOU A Admin?</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  


<span style="font-size: smaller;" > <a href="users-login.php" style="color:green;text-decoration: none;">Log In</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="users-signup.php" style="color:green;text-decoration: none;"><!-- Free sign up--></a>
</span>    </div>  
<?php
}
else if($userid!=''|$Password!='') {
 $userid;
 $Password;

?>
<div style="display: flex; justify-content: flex-end; padding-right: 80px !important;">

<span style="font-size: smaller;" ><a href="" style="color:black;text-decoration: none;">Welcome! &nbsp; <?php echo $username; ?></a></span>&nbsp;&nbsp;&nbsp;&nbsp;
  


<span style="font-size: smaller;" > <a href="logout.php" style="color:green;text-decoration: none;">Log Out</a>&nbsp;&nbsp;&nbsp;&nbsp;
<!--<a href="users-signup.php" style="color:green;text-decoration: none;"> Free sign up</a>-->
</span>   </div> 
<?php
}
//session_destroy();
$Date=date("d/m/Y");
?>
 <!-- Heading heading menu --> 
  

<?php include "headingmenu.php";?> 
<!-- Ends -->
<hr class="hr" />
<!-- banner 
 -->
 <style>
.center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}


</style>
<div class="center" style="width:1400px;">
 <table class="table table-striped table-bordered " style="text-align: center;">
  <thead>
    <tr style="text-align: center;">
      <th colspan="4" scope="col"  style="text-align: center;">Student Class Attendance</th>
      
    </tr>
  </thead>
  <tbody style="text-align: left;">
  <tr style="height:15px;" >
      <td   colspan="4" scope="col">
      <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Search Student id card
  </button>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <table class="table table-striped table-bordered " style="text-align: left;"> 
  <tr>
    <td> Student Admission No:</td>
    <td> Student Class:</td>
      <td>Student Section: </td>
      <td></td>
      
    </tr>
    <form action="idcard.php" method="post"> 
    <tr>   
    <td style="text-align: left;"> <input name="AdmissionNo" value="<?php echo $AdmissionNo;?>"/></td>
    <td style="text-align: left; "><input name="admissionClass"   value="<?php echo $admissionClass;?>" /></td>
    <td><input name="admissionSection"   value="<?php echo $admissionSection;?>" /></td>
   
    <td><input value="Search" type="submit" /></td>
    
    </tr>
    </form> 
</table>
  </div> 
</div>
        
       
      </td>
      
    </tr>
    <!--<tr>
    <td style="width:600px;" >Admission for Grade :</td>
      <td style="width:600px;"><input /></td>
      <td style="width:600px;"><input value="Search" type="submit" /></td>
      <td style="width:600px;"></td>
    </tr> 
    <tr style="text-align: left;">
      <th colspan="4" scope="col"> Attendance Details</th>
      
    </tr>
    <tr>
    <td> Student Roll Number</td>
    <td> Student Full Name:</td>
      <td>Attendance Date: </td>
      <td>Attendance </td>
      
    </tr>
    <tr>   
    <td style="text-align: left;"> <input /></td>
    <td style="text-align: left; "><input /></td>
    <td><input name="StudentName" value="<?php echo $Date;?>" /></td>
   
      <td><input value="Search" type="submit" /></td>
    
    </tr>-->
     
    
  </tbody>
</table>
</div>
<!--
<hr class="hr" />
</div>
<table>
  <tr  ><td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding: 12px; width:250px;height:120px; 
  border-radius: 12px;
  padding: 5px;" class="shadow p-3 mb-5 bg-white rounded">
   

   <strong>Easily plan your Admission</strong><br/><br/>
   <strong style="color:Tomato;" >Get Started  ></strong>-->
<!--Plan your wedding <br/>on the go with the Adorebliss app <img src="icon/sign-board-finall-3.png" width="200px"
                   height="60px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>

<div style="border: 1px shadow green;
  padding: 12px; width:350px; 
  border-radius: 12px;
  padding: 5px; " class="shadow p-3 mb-5 bg-white rounded"> <img src="icon/love.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>-->
<!--</td><td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding:20px; width:150px;height:120px;
  border-radius: 12px;
  " class="shadow p-3 mb-5 bg-white rounded">
   
   <img src="image/Manage student fees.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
   <strong>Manage student fees</strong><br/>
 
  </div>
 
 
 


</td>

<td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding:20px; width:150px;height:120px;
  border-radius: 12px;
  " class="shadow p-3 mb-5 bg-white rounded">
   
   <img src="image/Student records.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
   <strong>Student records</strong><br/>
 
  </div>
 
 
 


</td>

<td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding:20px; width:150px;height:120px;
  border-radius: 12px;
  " class="shadow p-3 mb-5 bg-white rounded">
   
   <img src="image/Attendance and grades.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
   <strong>Attendance and grades</strong><br/>
 
  </div>
 
 
 


</td>

<td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding:20px; width:150px;height:120px;
  border-radius: 12px;
  " class="shadow p-3 mb-5 bg-white rounded">
   
   <img src="image/Generate reports on various aspects.png" width="40px"
                   height="10px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
   <strong>Generate reports on various aspects</strong><br/>
 
  </div>
 
 
 


</td>

<td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding:20px; width:150px;height:120px;
  border-radius: 12px;
  " class="shadow p-3 mb-5 bg-white rounded">
   
   <img src="image/Time Table Management.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
   <strong>Time Table Management</strong><br/>
 
  </div>
 
 
 


</td>
<td style="padding: 15px;">

<div style="border: 1px shadow green;
  padding:20px; width:150px;height:120px;
  border-radius: 12px;
  " class="shadow p-3 mb-5 bg-white rounded">
   
   <img src="image/Examinations & Mark sheet Management.png" width="40px"
                   height="10px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
   <strong>Exam & Mark sheet Management</strong><br/>
 
  </div>
 
 
 


</td>

</tr></table>
<div>

<table>
  <tr  ><td style="padding: 15px;">
  <div style="border: 1px shadow green;
  padding: 12px; width:300px;height:375px; 
  border-radius: 12px;
  padding: 5px;" class="shadow p-3 mb-5 bg-white rounded">
   <table>
  <tr  ><td style="padding: 0px;">
  <img src="image/Faculty Management.jpg" style="width:250px;height:150px;"
                 
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
  </td>


</tr>
</table>

   <strong>Faculty
Management</strong><br/><br/>
   <strong style="color:Tomato;" >Get Started  ></strong>-->
<!--Plan your wedding <br/>on the go with the Adorebliss app <img src="icon/sign-board-finall-3.png" width="200px"
                   height="60px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>

<div style="border: 1px shadow green;
  padding: 12px; width:350px; 
  border-radius: 12px;
  padding: 5px; " class="shadow p-3 mb-5 bg-white rounded"> <img src="icon/love.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>-->
<!--</td>

<td style="padding: 15px;">
  <div style="border: 1px shadow green;
  padding: 12px; width:300px;height:375px; 
  border-radius: 12px;
  padding: 5px;" class="shadow p-3 mb-5 bg-white rounded">
   <table>
  <tr  ><td style="padding: 0px;">
  <img src="image/Hostel Management.jpg" style="width:250px;height:150px;"
                 
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
  </td>

  
</tr>
</table>

   <strong>Hostel
Management</strong><br/><br/>
   <strong style="color:Tomato;" >Get Started  ></strong>-->
<!--Plan your wedding <br/>on the go with the Adorebliss app <img src="icon/sign-board-finall-3.png" width="200px"
                   height="60px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>

<div style="border: 1px shadow green;
  padding: 12px; width:350px; 
  border-radius: 12px;
  padding: 5px; " class="shadow p-3 mb-5 bg-white rounded"> <img src="icon/love.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>-->
<!--</td>
<td style="padding: 15px;">
  <div style="border: 1px shadow green;
  padding: 12px; width:300px;height:375px; 
  border-radius: 12px;
  padding: 5px;" class="shadow p-3 mb-5 bg-white rounded">
   <table>
  <tr  ><td style="padding: 0px;">
  <img src="image/Transport.jpg" style="width:250px;height:150px;"
                 
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
  </td>

  
</tr>
</table>

   <strong>Transport
Management</strong><br/><br/>
   <strong style="color:Tomato;" >Get Started  ></strong>-->
<!--Plan your wedding <br/>on the go with the Adorebliss app <img src="icon/sign-board-finall-3.png" width="200px"
                   height="60px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>

<div style="border: 1px shadow green;
  padding: 12px; width:350px; 
  border-radius: 12px;
  padding: 5px; " class="shadow p-3 mb-5 bg-white rounded"> <img src="icon/love.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>-->
<!--</td><td style="padding: 15px;">
  <div style="border: 1px shadow green;
  padding: 12px; width:300px;height:375px; 
  border-radius: 12px;
  padding: 5px;" class="shadow p-3 mb-5 bg-white rounded">
   <table>
  <tr  ><td style="padding: 0px;">
  <img src="image/Placement.jpg" style="width:250px;height:150px;"
                 
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" />
  </td>

  
</tr>
</table>

   <strong>Placement
Management</strong><br/><br/>
   <strong style="color:Tomato;" >Get Started  ></strong>-->
<!--Plan your wedding <br/>on the go with the Adorebliss app <img src="icon/sign-board-finall-3.png" width="200px"
                   height="60px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>

<div style="border: 1px shadow green;
  padding: 12px; width:350px; 
  border-radius: 12px;
  padding: 5px; " class="shadow p-3 mb-5 bg-white rounded"> <img src="icon/love.png" width="40px"
                   height="15px"
                          class="img-fluid shadow-1-strong rounded" alt="Checklist" /></div>-->
</td>
</tr>
</table>
</div>

</body>
</html>
