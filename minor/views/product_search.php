<?php include "../models/dbconnect.php";

    if (isset($_GET['term'])){
        $return_arr = array();
        $term = mysqli_real_escape_string($conn, $_GET['term']);

        $query = "SELECT * FROM products WHERE product_name LIKE '%$term%'";
        $result = $conn->query($query);

        if($result){
            while ($row = $result->fetch_array()){
                $return_arr[] = $row['product_name'];
            }
        } else {
            echo "Error";
        }
        echo json_encode($return_arr);
    }
?>
