<?php
#luu tru mang du lieu user

/* User info
*   Fullname
*   Username
*   Password
*   Email
*   ID
*/  

// EXPORT DATA FROM SQL

   $conn = mysqli_connect('localhost','root','','test');
    $list_users = array();
    $sql = "SELECT fullname, username, password  FROM tbl_users";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result)>0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $list_users[] = $row;

        }
    } else {
        echo "0 results";
    }
    
    // echo "<pre>";
    // print_r($list_users);
    // echo "<pre>";
   



?>