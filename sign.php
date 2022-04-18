<?php
session_start();
$success=0;
$user=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'validate.php';
    include 'func.php';
    $username=$_POST['username'];
    $empid=$_POST['empid'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $sql="select * from `registration` where username='$username'";
    $sql1="select * from `registration` where empid='$empid'";
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
     
    if($result){
        $num=mysqli_num_rows($result);
        $num1=mysqli_num_rows($result1);
        if(($num>0) || ($num1>0)){
            $user=1;
        }else{
          if($password===$cpassword){
            
            $user_id = random_num(20);
           $sql="insert into `registration` (user_id,username,empid,password) 
                  values('$user_id','$username','$empid','$password')";

           $result=mysqli_query($con,$sql); 

           if($result){
               //echo "SignUp Success";
               $success=1;
               header('location:login.php');
           } 
           }else{
                  $invalid=1;   
            //die(mysqli_error($con));
           }
        } 
    }
}

?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>
 

.w3-container{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    border: 1px rgb(244, 108, 99);
}

.heading {
     position: relative;
    text-align: center;
   font-family: "Montserrat" ; 
   font-weight: 600;
   font-size: 7vw; 
   bottom: 1px;
   color:rgb(255, 255, 255);
   left: 12%; 
    display: flex;
    flex-wrap: wrap; 
    border: 1px rgb(244, 108, 99);
    }

.top-left {
  position: relative;
  
  width: 11%;
  height: 11%;
  top: 7px;
  display: flex;
  flex-wrap: wrap;
  }

.main-pic {
  position: relative;
  width: 100%;
  height: auto;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.btn-group button {
  background-color: rgb(244, 108, 99);; /* Green background */
  border: 1px rgb(244, 108, 99);; /* Green border */
  padding-inline : 22.35%; /* Some padding */
  color: white; /* White text */
  font-family: "Montserrat" ;
  font-weight: 600;font-size: 4vw;
  cursor: pointer; /* Pointer/hand icon */
  float: left; /* Float the buttons side by side */
}

/* Clear floats (clearfix hack) */
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: rgb(244, 108, 99);;
}
.container {
  width:100%;
  height: auto;
position: relative;
background-color: rgb(244, 108, 99);
height:auto;
  margin: 2px;
  padding: 16px;
  color: white; /* White text */
  font-family: "Montserrat" ;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 85%;
  padding: 5px;
  margin: 2px 0 11px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 5px 12px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}

.help-tip{
    position: absolute;
    top: 24%;
    right: 35%;
    text-align: center;
    background-color: rgb(244, 108, 99);
    border-radius: 50%;
    width: 10%;
    height: 24px;
    font-size: 14px;
    line-height: 26px;
    cursor: default;
}

.help-tip:before{
    content:'?';
    font-weight: bold;
    color:#fff;
}

.help-tip:hover p{
    display:block;
    transform-origin: 100% 0%;

    -webkit-animation: fadeIn 0.3s ease-in-out;
    animation: fadeIn 0.3s ease-in-out;

}

.help-tip p{    /* The tooltip */
    display: none;
    text-align: left;
    background-color: rgb(244, 108, 99);
    padding: 10px;
    width: 300px;
    position: absolute;
    border-radius: 3px;
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
    right: -4px;
    color: #FFF;
    font-size: 13px;
    line-height: 1.4;
}

.help-tip p:before{ /* The pointer of the tooltip */
    position: absolute;
    content: '';
    width:0;
    height: 0;
    border:6px solid transparent;
    border-bottom-color:#1E2021;
    right:10px;
    top:-12px;
}

.help-tip p:after{ /* Prevents the tooltip from being hidden */
    width:100%;
    height:40px;
    content:'';
    position: absolute;
    top:-40px;
    left:0;
}

/* CSS animation */

@-webkit-keyframes fadeIn {
    0% { 
        opacity:0; 
        transform: scale(0.6);
    }

    100% {
        opacity:100%;
        transform: scale(1);
    }
}

@keyframes fadeIn {
    0% { opacity:0; }
    100% { opacity:100%; }
}

span {
    width: 30px;
    display: block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

span:hover {    
    overflow: visible;
}

  </style>
  </head>
  <body>
  
  <?php

if($user){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> User already exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

<?php

if($invalid){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Oops!</strong>Password did not match .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>


<?php

if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfully!</strong> Singed UP.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>
    <div class="w3-container" style="background-color: rgb(244, 108, 99);">
   <img class="top-left" src="images\logo.png" alt="VOI">
    <div class="heading"><b>Repair Guide</b> 
    </div>
    </div>
   

  <div class="main-pic">
  <img class="main-pic" src="images\voi_log.jpg" alt="VOI">

  <form action="sign.php" method="post">
  
    <div class="container"  style="background-color: rgb(244, 108, 99);">

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="abc.xyz@voiapp.io" name="username"
    pattern="([a-z]+)(.)([a-z]+)(@voiapp.io)"
    title="Voi email ana.max@voiapp.io" required>

    <label for="empid"><b>Employee ID</b><span>(?)HiBob Profile->Edit->Work:Employee ID*</span>  </label> 
    <input type="text" placeholder="1234" name="empid"  minlength="1" maxlength="5" 
    parent="[0-9]{4,4}" title="HiBob Profile->Edit->Work:Employee ID*"
    required>
    

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" 
     pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
    title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

    <label for="cpassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Password" name="cpassword" required>

        <div style="padding: 2%;"></div>

    <button  style="background-color: #04AA6D; color: white;" type="submit" ><b>Signup</b></button>
    <button onclick="location.href = 'login.php';" style="background-color: #008CBA; color: white;"> <b>Login</b></button>
    
    </div>
  </form>
  </div> 
 </body>
</html>