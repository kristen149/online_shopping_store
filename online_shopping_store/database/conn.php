<?php

//connect to database
$conn = mysqli_connect('localhost','root','','test');
if (!$conn) {
    echo "Connect unsuccessfully!".mysqli_connect_error();
} else {
   // echo "Connect successfully!";
}


?>
