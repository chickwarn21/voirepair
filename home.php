<?php

session_start();
if(!isset($_SESSION['username'])) {
    header('location:login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Logned</title>
  </head>
  <body>
    <h1>Hello, world!
    <?php
     echo $_SESSION['username']; 
    ?>
 </h1>

    <div class="container">
        <a href="logout.php" class="btn btn-primary mt-5">Logout</a>
</div> 
  </body>
</html>