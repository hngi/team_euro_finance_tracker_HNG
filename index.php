<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./css/sign-in.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600,700&display=swap"
      rel="stylesheet"/>
      <link rel="stylesheet" href="css/style.css">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Fonts  -->
      <link href="css/fontawesome.min.css">
  	<title>Log_in</title>
  </head>
  <body>
  	<div class="main">
      <div class="auth__layout">
    		
        <div class="logo">
    			<img src="./frame.svg" alt="logo image" />
          <p><h1 class="logo__text">euros.com</h1></p>
    		</div>
        <div id="display">
          <?php if(isset($_SESSION['msg'])):?>
            <?=$_SESSION['msg']?>
            <?php unset($_SESSION['msg'])?>
          <?php endif?>
          <?= $message?>  
        </div>
        <div class="auth__right">
          
          <form class="sw-50 auth__form" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" id="loginForm" onsubmit="return validateLogin()">	
          <h2 class="pbtm-s sw-50">Login to continue</h2>
          <div class="ptop-xl">
          <form class="sw-50" action="<?=$_SERVER['SCRIPT_NAME']?>" method="POST" id="loginForm" onsubmit="return validateLogin()">
              <div class="form-group">
                <label for="InputEmail1">Email address</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="InputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="InputPassword" placeholder="Password">
              </div>
              <div class="pbtm-s">
                  <label>
                      <input type="checkbox" checked="checked" name="remember"> Remember me
                  </label>
                <span class="pull-r"><a href="#">forgot password?</a></span>
              </div>
              <input type="submit" name="signin" id="button" value="LOGIN" class="btn-black btn-lg btn-block">
          </form>
    </div>
    
    <script src="index.js"></script>
    <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
  
 </body>
</html>


