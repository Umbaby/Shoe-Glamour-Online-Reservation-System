<?php
    include "../models/dbconnect.php";
    $Logged_In = null;

    if(isset($_POST['submit'])){    

        $login_username = mysqli_real_escape_string($conn, $_POST['login_username']);
        $login_password = mysqli_real_escape_string($conn, $_POST['login_password']);

        $query = "SELECT * FROM users WHERE username = '$login_username' AND password = '$login_password'";
        
        $result = $conn->query($query);
        $row = $result->fetch_array();

            if ($result->num_rows>0) {
                // user is successfully logged in
                $_SESSION['name'] =  $login_username;
                $Logged_In = TRUE;
                $_SESSION['usertype'] = $row['9'];
            } else {
                $Logged_In = false;
            }
    
        $conn->close();
    } 

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['usertype']);
        session_destroy();
    }

?>