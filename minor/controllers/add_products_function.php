<?php 
    include "../models/dbconnect.php";

    if(isset($_POST['submit'])){
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);
        $stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
        
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
         $query = "INSERT INTO products (category,product_name,description,stock,price,image)
                    VALUES ('$category','$product_name','$description','$stock','$product_price','$name');";
         mysqli_query($conn,$query);
         
         // Upload file
         move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
       
        }
        
       }

    if(isset($_POST['logout'])){
        unset($_SESSION['name']);
        unset($_SESSION['usertype']);
        session_destroy();
    }
    
    /*$result = $conn->query($query);
    
            if($result){
                //echo "image:". $image;
                //echo "<br>imagetmp:". $imagetmp;
                echo "<br>Product added successfully";
            } else {
                echo "Error";
            } */
?>