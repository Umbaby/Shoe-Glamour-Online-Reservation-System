<?php session_start(); 
    include "../controllers/edit_my_account_function.php";

    if(isset($_SESSION['name'])&&$_SESSION['usertype']=="customer"){
        $name = $_SESSION['name'];

        $query = "SELECT * FROM users WHERE username = '$name' ";
        $result = $conn->query($query);

?>
<!DOCTYPE html>
    <html>
        <head>
            <title>My Account</title>
            <meta charset="utf-8"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
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
             <a href="view_cart.php"><i class="fa fa-shopping-cart"></i> My Cart</a>
           </li>
           <li>
             <a href="view_customer_reservation.php"><i class="fa fa-list-alt"></i> Reservations</a>
           </li>
           <li>
             <!--<a href="home.php"><i class="fa fa-sign-out"></i> Log Out</a>-->
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
            <h3 class="page-header"><i class="fa fa-user"></i> My Profile </h3>
          </div>  
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ol class="breadcrumb">
              <a href="view_my_account.php"  class="form-control">View My Profile</a>  
             <!-- <form action="edit_my_account.php" class="navbar-form">
              <input type="submit" class="form-control" placeholder="Edit My Profile" />
              </form> -->
            </ol>
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="body-content">
                <!-- LIST OF PRODUCTS IBUTANG DIRE -->
            <br>
            <div class="container">
            <?php while ($row=$result->fetch_array()) { ?>
                <form action="<?php $_PHP_SELF; ?>" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $row['0']; ?>"/>
                    Name<br>
                    <input type="text" name="name" size="20" value="<?php echo $row['1']; ?>" required/><br>
                    Age&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspGender<br>
                    <input type="number" name="age" min="18" max="65" value="<?php echo $row['2']; ?>" required/>
                    <select id="gender" name="gender" required>
                        <?php if($row['3']=="male"){ ?>
                            <option id="male" name="male">Male</option>
                            <option id="female" name="female">Female</option>
                            <option id="others" name="others">Others</option>
                        <?php } else if($row['3']=="female"){ ?>
                            <option id="female" name="female">Female</option>
                            <option id="male" name="male">Male</option>
                            <option id="others" name="others">Others</option>
                        <?php } else { ?>
                            <option id="others" name="others">Others</option>
                            <option id="male" name="male">Male</option>
                            <option id="female" name="female">Female</option>
                        <?php } ?>
                    </select><br>
                    Email<br>
                    <input type="email" name="email" size="20" value="<?php echo $row['4']; ?>" required/><br>
                    Mobile Number<br>
                    <input type="number" name="mobile" value="<?php echo $row['5']; ?>" required/><br>
                    Address<br>
                    <input type="text" name="address" size="20" value="<?php echo $row['6']; ?>" required/><br>
                    <input type="hidden" name="usertype" value="customer"/>
                    Username<br>
                    <input type="text" name="username" size="20" value="<?php echo $row['7']; ?>" required /><br>
                    Password<br>
                    <input type="password" name="password" size="20" minlength="8" value="<?php echo $row['8']; ?>" required/><br>
                    Confirm Password<br>
                    <input type="password" name="confirm" size="20" minlength="8" value="<?php echo $row['8']; ?>" required/><br><br>

                    <input type="submit" name="submit" value="Save Changes">
                    <a href="view_my_account.php">Cancel</a>

                </form>
            <?php } 
                    if(isset($password_check)&&!$password_check){
                        echo "<h4>Confirm password not match</h4>";
                        //header("location:view_my_account.php");
                    } 
                    if(isset($password_check)&&$password_check) {
                        echo "<h4>Your changes were successfully changed.</h4>";
                        header("location:view_my_account.php");
                    }
                    if(isset($success_check)&&!$success_check){
                        echo "Error";
                        //header("location:view_my_account.php");
                    }
            ?>
            </div><br>

            </div>
          </div>
        </div>


    <!--main content end-->
  </section>
  <!-- container section start -->

           
    <?php 
    
    } else {
        header("location:home.php");
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