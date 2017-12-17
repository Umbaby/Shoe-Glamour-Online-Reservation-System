<?php session_start();

	include "../controllers/view_cart_function.php"; 

	if(isset($_SESSION['name'])&&$_SESSION['usertype']=="customer"){

    $query = "SELECT * FROM cart";
	$result = $conn->query($query);

	$query2 = "SELECT DISTINCT category FROM products";
	$result2 = $conn->query($query2);

  $items = 0;
  $total = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shoe Glamour Online</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
		<meta name="author" content="GeeksLabs">
		<meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
		<link rel="shortcut icon" href="img/favicon.png">
	  
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- bootstrap theme -->
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<!--external css-->
		<!-- font icon -->
		<link href="css/elegant-icons-style.css" rel="stylesheet" />
		<link href="css/font-awesome.min.css" rel="stylesheet" />
		<!-- full calendar css-->
		<link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
		<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
		<!-- easy pie chart-->
		<link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
		<!-- owl carousel -->
		<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
		<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
		<!-- Custom styles -->
		<link rel="stylesheet" href="css/fullcalendar.css">
		<link href="css/widgets.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-responsive.css" rel="stylesheet" />
		<link href="css/xcharts.min.css" rel=" stylesheet">
		<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
		<!-- container section start -->
		<section id="container" class="">


    <header class="header dark-bg">
    
      <!--logo start-->
      <a href="customer.php" class="logo"> SHOE <span class="lite">GLAMOUR</span></a>
      <!--logo end-->


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="home">
            <a class="homeBtn" href="customer.php"> Home
                            
                  <ul class="dropdown-menu extended tasks-bar">
                </a>
            </ul>
          </li>

          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="account">
            <a data-toggle="dropdown" class="accountBtn" href="#">
                            <span class="username"><?php echo $_SESSION['name']; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="view_my_account.php"><i class="fa fa-user"></i> My Profile</a>
              </li>
              <li>
                <a href="add_to_cart.php"><i class="fa fa-shopping-cart"></i> My Cart</a>
              </li>
              <li>
                <a href="view_customer_reservation.php"><i class="fa fa-list-alt"></i> Reservations</a>
              </li>
              <li>
               <!-- <a href="home.php"><i class="fa fa-sign-out"></i> Log Out</a> -->
               <form action="<?php $_PHP_SELF; ?>" method="POST"><i class="fa fa-sign-out"></i>
                  <input type="submit" name="logout" value="Log Out"/>
               </form>
              </li>
              
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-list"></i> My Cart </h3>
            
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="body-content">
                <!-- LIST OF PRODUCTS IBUTANG DIRE -->

                <br>
                <div class="container">
                        <a href="add_to_cart.php">Add Products to Cart</a>
                        <a href="view_cart.php">Show Cart</a>
                        <a href="change_quantity.php">Change Product Quantity</a>
                        <a href="delete_from_cart.php">Delete Product from Cart</a>
                    </div>
                <br>
            
              <div class="container">
              <?php if ($result->num_rows>0) { ?>
                <form action="<?php $_PHP_SELF; ?>" method="POST">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product #</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php while($row=$result->fetch_array()){ ?>
                        <tr>
                          <td><?php echo $row['0']; ?></td>
                          <td><?php echo $row['1']; ?></td>
                          <td><?php echo "Php ".$row['2']; ?></td>
                          <td><?php echo $row['4']; ?></td>
                          <td><?php echo "Php ".$row['5']; ?></td>
                        </tr>
            
                        <?php  
                          $items = $items + $row['4'];
                          $total = $total + $row['5'];
                      }?>
            
                    </tbody>
                  </table><br>
                  <table>
                        <tr>
                          <td>Items:</td>
                          <td><input type="number" name="items" value="<?php echo $items; ?>" readonly/></td>
                        </tr>
                        <tr>
                          <td>Total: (Php)</td>
                          <td><input type="number" name="total" value="<?php echo $total; ?>" readonly/></td>
                        </tr>
                        <tr><td>&nbsp</td></tr>
                        <tr>
                          <td><input type="submit" name="void" value="Cancel Purchase" /></td>
                          <td><input type="submit" name="enter" value="Confirm" /></td>
                        </tr>	
                  </table>
                </form>
              </div>
              <div class="container">
                
              <?php	
                 
              } else { ?>
                <table class="table">
                <thead>
                  <tr>
                    <th>Product #</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><h4>------------------</h4></td>
                    <td><h4>------------------</h4></td>
                    <td><h4>------------------</h4></td>
                    <td><h4>------------------</h4></td>
                    <td><h4>------------------</h4></td>
                  </tr>
                </tbody>
                </table>
              <?php echo "<h3><br>No products added to the cart yet.</h3><br>"; } ?>
              </div><br>

            </div>
          </div>
        </div>


    <!--main content end-->
  </section>
  <!-- container section start -->

	<?php 
		if(isset($_POST['logout'])){
			unset($_SESSION['name']);
			unset($_SESSION['usertype']);
			session_destroy();
		}

		} else {
	        header('location:home.php');
        } ?>

<!-- javascripts -->
<script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

    </body>
</html>