<?php
    require_once('main.php');
    
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect('main.php');

?>