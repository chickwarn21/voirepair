<?php
session_start();
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    include 'validate.php';
    include 'func.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from `registration` where username='$username' and password='$password' ";
        $result=mysqli_query($con,$sql);
    
    if($result){
      
        $num=mysqli_num_rows($result);
        
        if($num>0){
           $login=1;
           
           $user_data = mysqli_fetch_assoc($result);
           

           $_SESSION['user_id'] = $user_data['user_id'];
           $_SESSION['username']=$username;
            
           header('location:mRepair_guide.html');

        }else{
            $invalid=1;
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
  border: 1px rgb(244, 108, 99); /* Green border */
   /* Some padding */
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
  width: 75%;
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

.bot {
  text-decoration: none;
  position: fixed;
  bottom: 0;
  width: 100%;
  text-align: center;
  font-family: "Montserrat" ; 
  background-color: rgb(244, 108, 99);
  color: rgb(255, 255, 255);
  text-decoration: none;
  
}

  </style>
  </head>
  <body>
  
<?php

if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Logined!</strong> Your successfully logined.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<?php

if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Invalid!</strong> Enter correct Username and Password.
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

  <form action="login.php" method="post">
  
    <div class="container"  style="background-color: rgb(244, 108, 99);">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="abc.xyz@voiapp.io" name="username" required>

    

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Password" name="password" required>


        <div style="padding: 2%;"></div>

    <button  style="background-color: #04AA6D; color: white;" type="submit" ><b>Login</b></button>
    <button onclick="location.href = 'sign.php';" style="background-color: #008CBA; color: white;"><b>SignUp</b></button>
    </div>
  </form>
  </div> 
 
  <div  class="bot" >
    <p>&#169; 2022 <i>All rights reserved Voi Technology AB.</i>
  <!--  <br>    Creators <a style="text-decoration: none; color:rgb(255, 255, 255);" href= "https://app.hibob.com/employee-profile/2338686568232910967"><b>Tommy Høeg</b></a> 
    &<a href="https://app.hibob.com/employee-profile/2760433236394901522" style="text-decoration: none; color: rgb(255, 255, 255);"> <b>Karthik Lokesh</b></p>
-->
  </div>

</body>
</html>