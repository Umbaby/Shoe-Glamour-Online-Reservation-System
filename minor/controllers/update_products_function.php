<?php include "../models/dbconnect.php";

    if(isset($_POST['submit2'])){
        $product_number = mysqli_real_escape_string($conn, $_POST['product_number']);
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $add_stock = mysqli_real_escape_string($conn, $_POST['add_product_stock']);
        
        if(isset($_FILES["file"]["name"])){
            $name = $_FILES['file']['name'];
            $target_dir = "C:/xampp/htdocs/minor/images/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
           
            // Select file type
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
           
            // Valid file extensions
            $extensions_arr = array("jpg","jpeg","png","gif");
           
            // Check extension
            if( in_array($imageFileType,$extensions_arr) ){
            
             // Insert record
             $query = "UPDATE products SET image = '$name' WHERE product_number = '$product_number'";
             mysqli_query($conn,$query);
             
             // Upload file
             move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
            }
        }
        //Insert the image name and image content in image_table
        //$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename')";
        
        //mysql_query($insert_image);

        $stock_query = "SELECT stock FROM products WHERE product_number = '$product_number';";
        $stock_result = $conn->query($stock_query);

        if($stock_result->num_rows>0){
            $row=$stock_result->fetch_array();
        }
        $current_stock = $row['0'];
        //echo "current: " . $current_stock;

        if($add_stock>0){
            $new_stock = $current_stock + $add_stock;
            //echo "new: ". $new_stock;
        } else {
            $new_stock = $current_stock;
            //echo "new: ". $new_stock;
        }
        
        $set_category = "UPDATE products SET category = '$category' WHERE product_number = '$product_number'";
        $set_pname = "UPDATE products SET product_name = '$product_name' WHERE product_number = '$product_number'";
        $set_description = "UPDATE products SET description = '$description' WHERE product_number = '$product_number'";
        $set_stock = "UPDATE products SET stock = '$new_stock' WHERE product_number = '$product_number'";
        $set_price = "UPDATE products SET price = '$product_price' WHERE product_number = '$product_number'";
        //if(isset($_FILES["file"]["name"])){$set_image = "UPDATE products SET image = '$name' WHERE product_number = '$product_number'";}
        
        $category_result = $conn->query($set_category);
        $pname_result = $conn->query($set_pname);
        $description_result = $conn->query($set_description);
        $stock_result = $conn->query($set_stock);
        $price_result = $conn->query($set_price);
        //if(isset($_FILES["file"]["name"])){$image_result = $conn->query($set_image);}

        if($category_result){
            //echo "Category updated successfully";
        } else {
            echo "Error";
        }
    }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['pass']);
        unset($_SESSION['usertype']);
        session_destroy();
    }

?>