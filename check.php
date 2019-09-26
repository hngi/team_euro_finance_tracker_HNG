<?php
session_start();

function clean_input($data) { // cleans the form input 
  $data = trim($data); 
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data;
}


        // path and name of the file
    $user_file = 'user.json';
    $message = ''; // For storing error message
 
    
        if (isset($_POST['submit'])){
        // check if all form data are submited, else output error message
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm'])) {
        // if form fields are empty, outputs message, else, gets their data
        if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm'])) {
         
          $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**All fields are required**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        
        }
        else {
           $fname = clean_input($_POST["firstname"]);
           $lname = clean_input($_POST["lastname"]);
            $email = clean_input($_POST["email"]);
            $password = clean_input($_POST["password"]);
           
        // gets and adds form data into an array
        $data = array(
          'fname'=> $fname,
          'lname'=> $lname,
          'email'=> $email,
          'password'=> $password,
          
        );

        // path and name of the file
        $user_file = 'user.json';

        $arr_data = array();        // to store all form data

        // check if the file exists
        if(file_exists($user_file)) {
          // gets json-data from file
          $jsondata = file_get_contents($user_file);

          // converts json string into array
          $arr_data = json_decode($jsondata, true);

          foreach ($arr_data as $user_data) { // loop through the existing data 
              $retrieved_email = (string) ($user_data['email']);
              $email = (string) $email;
              if( strcasecmp($retrieved_email,$email) == 0){ // check if user with the same email already exists
       
                $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">This email already exists<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                
                return;
              }
          }
        }

        // appends the array with new form data
        $arr_data[] = $data;

        // encodes the array into a string in JSON format (JSON_PRETTY_PRINT - uses whitespace in json-string, for human readable)
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        // saves the json string in "user.json" 
        // outputs error message if data cannot be saved
        if(file_put_contents('user.json', $jsondata)) {
          
         $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">Sign Up Successfull! Login with your details.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        $_SESSION['msg'] = $message;
     
           header('location: index.php');
        
       }
        else echo "<script> alert('Data not saved!') </script>";
      }           
    } else {
     
     $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**Form fields are empty**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  
   }
  }

  if (isset($_POST['signin'])){
        // check if all form data are submited, else output error message
        if(isset($_POST['email']) && isset($_POST['password'])) {
        // if form fields are empty, outputs message, else, gets their data
        if(empty($_POST['email']) || empty($_POST['password'])) {
         
          $message =  '<div class="alert alert-warning alert-dismissible fade show" role="alert">**All fields are required**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        
        }
        else {
          
            $email = $_POST["email"];
            $password = $_POST["password"];
           
        // gets and adds form data into an array
        $data = array(
          
          'email'=> $email,
          'password'=> $password,
          
        );

        // path and name of the file
        $user_file = 'user.json';

        $arr_data = array();        // to store all form data

        // check if the file exists
        if(file_exists($user_file)) {
          // gets json-data from file
          $jsondata = file_get_contents($user_file);

          // converts json string into array
          $arr_data = json_decode($jsondata);
          
           

          
          foreach($arr_data as $user_data) { // loop through the array data
              $retrieved_email = (string) ($user_data -> email);
              $email = (string) $email;
              if( (strcasecmp($retrieved_email,$email) == 0) && ($user_data->password === $password)){ // check if password and email match existing ones
       
               $_SESSION['fname'] = $user_data->fname; // stores the name of the user in a session
                header('location: dashboard.php'); 

              
                
              } else {
                $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**Incorrect Email/Password**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
                
              }
          }
        }

      
      }
    } else  $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">**Form fields are empty**<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  }
    ?>
