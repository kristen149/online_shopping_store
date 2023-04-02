<?php
     session_start();

     require_once( '../../data/users.php');
     require_once ('../../lib/function.php'); 
 

   

   if(isset($_POST['btn_login'])){
            $error = array();
        
            #Check username:
            if (empty($_POST['username'])){
                $error['username'] = 'You did not enter Username ';
            } else {
                if (!(strlen($_POST['username'])>=6&&strlen($_POST['username'])<=32)){
                    $error['username'] = 'Your username must be between 6 and 32 characters long';
            } else {
                $pattern = '/^[A-Za-z0-9_\.]{6,32}$/';
                if(!preg_match($pattern,$_POST['username'])){
                    $error['username']= 'Username can have only letters from a-z, digit from 0-9 and special characters "_\.';

                } else {
                    $username = $_POST['username'];
                }
            }
    }


            #Check password:
            if (empty($_POST['password'])){
                $error['password'] = 'You did not enter Password';
            } else {
                if (!(strlen($_POST['password'])>=6&&strlen($_POST['password'])<=32)){
                    $error['password'] = 'Your password must be between 6 and 32 characters long';
                } else {
                $pattern = '/^[A-Za-z0-9_\.!@#$%^&*()]{6,32}$/';  //too simple
                if(!preg_match($pattern,$_POST['password'])){ 
                    $error['password']= 'Password format incorrect';

                } else {
                    $password = $_POST['password'];
                }
            }

        }
        

           # CONCLUSION:
           if (empty($error)){
                //LOGIN
                if (check_login($username, $password)){
                        //SAVE PASSWORD THROUGH COOKIES:
                    if (isset($_POST['remember_me'])){
                        setcookie('is_login', true, time()+ 3600);
                        setcookie('user_login', $username, time()+ 3600);

            
                     }
                    



                        //Luu tru phien dang nhap

                        $_SESSION['is_login']=true;
                        $_SESSION['user_login'] = $username;

                        //echo "<script>alert('LOGIN SUCCESSFUL!')</script>";

                        redirect ('../../index.php');
                        
                } else {
                    $error['account'] = "Your account is not valid. Please try again!";
                }
            }

           } 


    




?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="../../public/css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="../../public/css/login.css" rel="stylesheet" type="text/css"/>

</head>
    <body>
      

        <form id = "form-login" method = "POST" action = "">
       
        <div id = "wp-form-login">
        <h1 class = "page_title"> LOGIN TO YOUR ACCOUNT</h1>
         <input type= "text" id = "username" name = "username" value = "" placeholder="Please enter username"/>
        <?php 
                if (!empty($error['username'])) {
                    ?>
            <p class = "error"><?php echo $error['username'];  ?>   </p>

        <?php
                }
        ?>

            <input type= "password" id = "password" name = "password" value = "" placeholder="Please enter password"/>
            <?php 
                if (!empty($error['password'])) {
                    ?>
            <p class = "error"><?php echo $error['password'];  ?>   </p>

        
            
        <?php
                }
        ?>
        <input type = "checkbox" name = "remember_me" id = "remember_me">
             <label for = "remember_me">Remember me</label><br>



            <input type= "submit" id = "submit" name = "btn_login" value = "Login" />
            <?php 
                if (!empty($error['account'])) {
                    ?>
            <p class = "error"><?php echo $error['account'];  ?>   </p>

        <?php
                }
        ?>


        <a href = ""  id = "lost_pass">Forgot password</a><br>
        <a href = "../../index.php"  id = "lost_pass">Back to Home Page</a>


        </div>
</form>
    </body>
</html>