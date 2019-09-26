<?php
include 'check.php';

if(!isset($_SESSION['name'])) { // checks to see if there is a session for the user
  header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Euro finance app</title>
    
    
    <!-- CSS -->
  
     <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--Font Awesome-->
    <link href="css/fontawesome.min.css">

   
  </head>
  <body>
      <section>
        <div class="container-fluid welcome">
             <h1>Welcome, <b><?= $_SESSION['fname']?></b></h1>
             <a class="btn btn-dark" href="logout.php">Sign Out</a>
        </div>
      </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>