<?php 
    include "../models/dbconnect.php";
    $password_check = null;
    $success_check = null;

    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $account_type = mysqli_real_escape_string($conn, $_POST['usertype']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm']); 

        if($password==$confirm_password){
            $password_check = true;
            $query = "INSERT INTO users (name,age,gender,email,mobile_number,address,username,user_type,password)
                    VALUES ('$name','$age','$gender','$email','$mobile','$address','$username','$account_type','$password');";

            $result = $conn->query($query);

            if($result){
                $success_check = true;
            } else {
                $success_check = false;
            }
        } else {
            $password_check = false;
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['usertype']);
        session_destroy();
    }

?>