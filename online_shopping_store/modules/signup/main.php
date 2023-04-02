<?php
  require_once ('../../lib/function.php'); 

  require 'validation_form.php';

 
 #Test if submit form is correct with username and password:

    if (isset($_POST['btn_signup'])){
       

        $error = array();
    #Validate fullname:
    if (empty($_POST['fullname']) ){
        $error['fullname'] = 'You did not enter fullname';
      } else {
        $fullname = $_POST['fullname'];
    }
    #Validate email:
    if (empty($_POST['email']) ){
        $error['email'] = 'You did not enter email';
      } else {
        if (!(strlen($_POST['email'])>=6&&strlen($_POST['email'])<=32)){
            $error['email'] = 'Your email must be between 6 and 32 characters long';
        } else {
            $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
            if (!preg_match($pattern, $_POST['email'])) {
                $error['email'] = 'Email form incorrect' ;
            } else{
                $email = $_POST['email'];
            }
      }
    }



    #Validate username:
 if (empty($_POST['username']) ){
  $error['username'] = 'You did not enter username';
 // echo $error['username'];
}
  else {
        if (!(strlen($_POST['username'])>=6&&strlen($_POST['username'])<=32)){
            $error['username'] = 'Your username must be between 6 and 32 characters long';
        } else {
      
        if (!is_username($_POST['username'])) {
            $error['username'] = ' Only letters(a-z). numbers(0-9) and special characters (_\.) are allowed' ;

        }

        else {
             $username = $_POST['username'];
             //echo "Username: {$username}<br>";
        }
    }
     
  }
    #Validate password:
   if (empty($_POST['password'])) {
 $error['password'] = 'You did not enter password';

} else{
    if (!(strlen($_POST['password'])>=6&&strlen($_POST['password'])<=32)) {
        $error['password'] = 'Your password must be between 6 and 32 characters long';

    } else{

        if (!is_password('password')){
            $error['password'] = 'Upper-case letters must be used as the first character' ;

        }
        else {
            $password = $_POST['password'];
          //  echo "Password: {$password}<br>";
       }
    }
}
   
        
      
    #solve GENDER
   // $error_gender = array();
    if (empty($_POST['gender'])) {
        $error['gender']="You must choose gender";
    } else {
        $gender = $_POST['gender'];
    } 
    
    #solve TERMS AND CONDITIONS
    if (empty($_POST['rules'])) {
        $error ['rules'] = "You need to agree to the Terms and Conditions";
        
    } else {
        $rules = $_POST['rules'];
       // echo "Rule: {$rules}";
    } 
    
        if(empty($error)) {
          // INSERT DATA TO MY SQL
          $conn = mysqli_connect('localhost','root','','test');
          $sql = "INSERT INTO `tbl_users` (`username`,`fullname`,`email`,`gender`,`password`)"
          . "VALUES ('$username','$fullname','$email','$gender',md5('$password'))";
            if (mysqli_query($conn, $sql)) {
            $signup= "SIGN UP SUCCESSFULLY!";

            redirect('../../modules/login/main.php');
            echo "<script>alert('$signup')</script>";

        }
       
        }



    }

//close all the program begin from login


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="../../public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="../../public/css/login.css" rel="stylesheet" type="text/css"/>

</head>

<body>
    <style>
            p.error{ color: red;}
    </style>

    <form id = "form-signup" method="POST"  action="" >
        <div id = "wp-form-signup" >
        <h1 class = "page_title"> CREATE YOUR ACCOUNT</h1>
        
        <div  class="form-group">
        <label for="fullname"><strong>Fullname</strong></label><br>
            <input type="text" id="fullname" name="fullname"
            placeholder=" Enter fullname" value = "">
            <p class = "error">
                
                <?php if (!empty($error['fullname'])) {
                echo $error['fullname'];
            }
            ?></p>
        </div>


        <div  class="form-group">
            <label for="username"><strong>Username</strong></label><br>
            <input type="text" id="username" name="username"
            placeholder=" Enter username" value = "">
            <p class = "error">
                
                <?php if (!empty($error['username'])) {
                echo $error['username'];
            }
            
            
            ?></p> 
        </div>

        <!-- #Email  -->
        <div  class="form-group">
            <label for="email"><strong>Email</strong></label><br>
            <input type="text" id="email" name="email"
            placeholder=" Enter email" value = "">
            <p class = "error">
                
                <?php if (!empty($error['email'])) {
                echo $error['email'];
            }
            
            
            ?></p> 


        </div>

        <div class = "form-group">
            <strong>Gender   </strong><br>
            
            <input type = "radio" name = "gender" value ="Male" <?php if(!empty($gender)&&$gender=="Male") echo "checked='checked'"  ?>  id ="male">
            <label for = "male">Male</label> 
            <input type = "radio" name = "gender" value ="Female" <?php if(!empty($gender)&&$gender=="Female") echo "checked='checked'"  ?>id ="female">
            <label for = "female">Female</label> 
            <input type = "radio" name = "gender" value ="Others" <?php if(!empty($gender)&&$gender=="Others") echo "checked='checked'"  ?> id ="other">
            <label for = "other">Others</label> 
            <p class = "error">
                <?php if (!empty($error['gender'])) {
                echo $error['gender'];
            }
            ?></p> 


        </div>
        <div class="form-group">

            <label for="password"><strong>Password</strong></label><br>
            <input type="password" id="password" name="password"
            placeholder=" Enter password" value = "">
    
            <p class = "error"><?php if (!empty($error['password'])) {
                echo $error['password'];
            }
            
            
            ?></p> 


        
        </div>
        <div class="form-group">

        <p class ="rules" style = "width: 415px; height: 100px; overflow-y: scroll; " id = "rules">
          User Account and registration
          A User Account is a prerequisite for placing orders in the Online Shop, using Digital Content or Services, and providing User content such as comments on websites operated by Springer Nature or its affiliated companies.
          Prerequisites for registering a User Account and registration process
          User must be of age and have full legal capacity.
          User must provide accurate and complete details upon registration and must keep them up to date.
          User must provide a valid email address. User warrants that they are entitled to receive email at such email address. Springer Nature is not obliged to use such email address for communication with User.
          User may review the data entered and correct any errors or terminate the registration process at any time before sending off the completed registration form. By clicking the confirmation button, User registers a User Account. Springer Nature will send User a confirmation of receipt of their registration. Springer Nature may reject registrations for any or no reason. The contract on using the user account will not be filed and will not be accessible to User.

    </p>
    <input type = "checkbox" name = "rules" value = "yes" id = "rules_check"  > 
    <label for = "rules_check" >I have read and understand the above Terms and Conditions</label><br>  
    <p class = "error">
    <?php if (!empty($error['rules'])) {
             echo $error['rules'] ;
    }
    ?>
    </p>
    </div>
    <br>
        <?php
            if (empty($error)) {}
        ?>
        <input id = "submit" type="submit" value="Sign up" name = "btn_signup" />
        <a href = "../login/main.php"  id = "lost_pass">Already have account?</a><br>
        <a href = "../../index.php"  id = "lost_pass">Back to Home Page</a>


        

        
        
                
    </div>
    </form>

</body>

</html>