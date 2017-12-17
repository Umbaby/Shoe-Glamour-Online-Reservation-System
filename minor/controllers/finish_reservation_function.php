<?php include "../models/dbconnect.php"; 

    if(isset($_POST['submit2'])){
        $r_number = mysqli_real_escape_string($conn, $_POST['r_num']);
        $date_finished = date("Y-m-d"); 
        $person_in_charge = $_SESSION['name'];

        $query = "UPDATE reservations SET status = 'finished' , date_finished = '$date_finished' , 
                    person_in_charge = '$person_in_charge'
                 WHERE r_number = '$r_number';";
                 
        $result = $conn->query($query);

        if(!$result){
            echo "Error<br>";
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['usertype']);
        session_destroy();
    }
?>