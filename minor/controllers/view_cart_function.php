<?php include "../models/dbconnect.php";

$payment_check = null;

		if(isset($_POST['void'])){
			$void_query = "DELETE FROM cart;";
			$void_result = $conn->query($void_query);
			if($void_result){
				//echo "All purchase deleted";
			} else {
				echo "Error";
			}
		}
		
		if(isset($_POST['enter'])){
			$customer = $_SESSION['name'];
			$items = mysqli_real_escape_string($conn, $_POST['items']);
			$total = mysqli_real_escape_string($conn, $_POST['total']);
			$from = date("Y-m-d");
			$to = date("Y-m-d");
			$status = "unfinished";

			$date = new DateTime($to);
			$date->add(new DateInterval('P7D'));
			$to = $date->format('Y-m-d');
			//$payment = mysqli_real_escape_string($conn, $_POST['payment']);
			//$account = $_SESSION['name'];

			$cart_query = "SELECT * FROM cart";
			$cart_result = $conn->query($cart_query);

			//$product_query = "SELECT * FROM products";
			//$product_result = $conn->query($product_query);
		
				//for deducting the stock by the number of purchased item
				while($cart_row=$cart_result->fetch_array()){
					$cart_num = $cart_row['0'];
					$query = "SELECT * FROM products WHERE product_number = '$cart_num';";
					$product_result = $conn->query($query);

					while($product_row=$product_result->fetch_array()){

						if($cart_row['0']==$product_row['0']){
							//echo "if code";
							$prod = $product_row['0'];
							//echo "Prod: " . $prod . "<br>";
							$new_stock = $product_row['4'] - $cart_row['4'];
							//echo $prod . " " . $new_stock;
		
							$query3 = "UPDATE products SET stock = '$new_stock' WHERE product_number = '$prod' ;";
							$result3 = $conn->query($query3);
						} 
						if(!$product_row['4']>=1) {
							echo "No more stocks";
						}
					}
				}

			$enter_query = "SELECT * FROM cart";
			$enter_result = $conn->query($enter_query);
			if($enter_result->num_rows>0){
				$num = 0;
				while($row=$enter_result->fetch_array()){	
					$products[$num] = $row['p_name'];
					$price[$num] = $row['price'];
					//echo "Product: " . $products[$num];
					$quantity[$num] = $row['quantity'];
					//echo "Quantity: " . $quantity[$num];
					//$amount[$num] = $row['amount'];
					
					$num++;
				}
			}

			//to input more than one product, quantity, price to transactions
			$string_products = implode("<br>", $products);
			$string_quantity = implode("<br>", $quantity);
			$string_price = implode("<br>", $price);
			//$string_amount = implode("<br>", $amount);

			$reservation_query = "INSERT INTO reservations (r_customer, r_product, r_quantity, r_price, r_total, r_date_from, r_date_to, status)
										VALUES ('$customer', '$string_products', '$string_quantity', '$string_price', '$total', '$from', '$to', '$status');";

			$reservation_result = $conn->query($reservation_query);

			if($reservation_result){
				//echo "Transaction was successful";
			} else {
				echo "Error";
			}

			$done_query = "DELETE FROM cart;";
			$done_result = $conn->query($done_query);
			if($done_result){
				//echo "Transaction complete";
			} else {
				echo "Error";
			}

	}

	if(isset($_POST['done'])){
		$done_query = "DELETE FROM cart;";
		$done_result = $conn->query($done_query);
		if($done_result){
			//echo "Transaction complete";
		} else {
			echo "Error";
		}
	}

	if(isset($_POST['logout'])){
		unset($_SESSION['name']);
		unset($_SESSION['pass']);
		unset($_SESSION['usertype']);
		session_destroy();
		header("location:login.php");
	}
?>