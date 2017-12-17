<?php include "../models/dbconnect.php"; 
    $checker = null;

    if(isset($_POST['submit2'])){
        $r_number = mysqli_real_escape_string($conn, $_POST['r_number']);

        $query = "SELECT * FROM reservations WHERE r_number ='$r_number'";
        $result = $conn->query($query);
        $row = $result->fetch_array();
        $pname = $row['2'];  // get the name of reserved product
        $r_stock = $row['3'];  // get the quantity of reserved product

        $query3 = "SELECT * FROM products WHERE product_name = '$pname'";
        $result3 = $conn->query($query3);
        $row3 = $result3->fetch_array();
        $p_stock = $row3['4'];

        $new_stock = $r_stock + $p_stock; // add the quantity of reserved product back to inventory

        $query4 = "UPDATE products SET stock = '$new_stock' WHERE product_name = '$pname'";
        $result4 = $conn->query($query4);
        
        //delete the reservation
        $query2 = "DELETE FROM reservations WHERE r_number = '$r_number'";
        $result2 = $conn->query($query2);

        if($result2){
            $checker = true;
            //echo "Product was deleted";
        } else {
            $checker = false;
            //echo "Error";
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['usertype']);
        session_destroy();
    }

?>