<?php 
    include "../models/dbconnect.php";
    $confirm_check = null;
    $password_check = null;

    if(isset($_POST['submit2'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        //$account_type = $_POST['usertype'];
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm']);

        if($password==$confirm_password){
            $password_check = true;
            $query = "UPDATE users SET name = '$name', age = '$age', gender = '$gender',
                        email = '$email', mobile_number = '$mobile', address = '$address', username = '$username', 
                        password = '$password'
                    WHERE user_id = '$id'";

            $result = $conn->query($query);

            if($result){
                $confirm_check = true;
            } else {
                $confirm_check = false;
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