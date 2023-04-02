
<?php      
 session_start();
 ob_start(); 
  #Function
require_once ('database/conn.php');
 require_once ('lib/function.php'); 
 require_once( 'data/users.php');
 require_once( 'data/pages.php');
 require_once( 'data/product.php');

 

  

?>

   <?php
    $mod = !empty($_GET['mod'])?$_GET['mod']:'home';
    $act = !empty($_GET['act'])?$_GET['act']:'main';


   // if (!empty($_GET['page'])) {
   //  $page = $_GET['page'];
   // } else {
   //  $page = 'home';
   // }
   $path = "modules/{$mod}/{$act}.php";
   
   //Check if user has already login on system (must login)
      // if (!is_login()&&$page!='login'){
      //    echo "<script>alert('PLEASE LOG IN')</script>";
      //    redirect('pages/login.php');

      // }



   //Page not found
    if (file_exists($path)) {
    require $path;
   } else {
    require 'inc/404 not found.php';
   }

   
   

?> 

        

