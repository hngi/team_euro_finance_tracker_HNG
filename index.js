

const validate = () => {

    const form = document.querySelector('#sign-up-form');
    const fname = form.firstname;
    const lname = form.lastname;
    const email = form.email;
    const password = form.password;
    const confirmPassword = form.confirm;
    const button = form.submit;
    const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    const nameRegex = /^[A-Za-z ]+$/;
    const passwordRegex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    const display = document.getElementById('display');
   


    if ((fname.value == "") || (lname.value == "") || (email.value == "") || (password.value == "") || (confirmPassword.value == "")) { // checks if form values are empty
    
        display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">You are required to fill your details <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        name.focus()
        return false;
    }

    if ((fname.value.length < 4) || (lname.value.length < 4)) {

        display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Each of your names should not be less than four letters <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
       
        name.focus();

        return false;
    }

    if ((nameRegex.test(fname.value) === false) || (nameRegex.test(lname.value) === false)) {
      
        display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Your names Should Only Contain Alphabets<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
     
        name.focus();

        return false;
    }

     if (passwordRegex.test(password.value) === false) {
          
            display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Password Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
           
            password.focus();

            return false;
        }

    if (password.value !== confirmPassword.value) {
        display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Your Password does not match<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  
      
        confirmPassword.style.border = 'thin solid red';
        confirmPassword.focus();

        return false;
    }

    if (emailRegex.test(email.value) === false) {
        
        display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">Invalid Email Address<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
  
        email.focus();

        return false;
    }

 

    return true;
     
}

const validateLogin = () => {
    const form = document.querySelector('#loginForm');
    const email = form.email;
    const password = form.password;
    const display = document.getElementById('display');
    const button = document.getElementById('button');

    

     if ((email.value == "") || (password.value == "")) {
    
        display.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">You are required to fill your details<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        email.focus();
        
        return false;
    }
  

    
}



    

