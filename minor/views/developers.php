<?php session_start(); 
  if(!isset($_SESSION['name'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title> Reserve Now, Pay Later! </title>

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
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
    
      <!--logo start-->
      <a href="home.php" class="logo"> SHOE <span class="lite">GLAMOUR</span></a>
      <!--logo end-->


      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <li id="task_notificatoin_bar" class="home">
            <a class="homeBtn" href="home.php"> Home
                            
                  <ul class="dropdown-menu extended tasks-bar">
                </a>
            </ul>
          </li>

          <li id="mail_notificatoin_bar" class="about">
            <a class="aboutBtn" href="aboutus.php"> About Us
                
                <ul class="dropdown-menu extended inbox">                   </a>
                </a>
              </ul>
          </li>
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="developers">
            <a class="devBtn" href="developers.php"> The Developers

            <ul class="dropdown-menu extended notification">
             
                  </a>
            
            </ul>
          </li>
          <!-- alert notification end-->
          <!-- alert notification start-->
          <li id="alert_notificatoin_bar" class="developers">
          <a class="devBtn" href="index.php"> Sign In

          <ul class="dropdown-menu extended notification">
           
                </a>
          
          </ul>
        </li>
        <!-- alert notification end-->
        <!-- alert notification start-->
        <li id="alert_notificatoin_bar" class="developers">
          <a class="devBtn" href="sign_up.php"> Sign Up

          <ul class="dropdown-menu extended notification">
           
                </a>
          
          </ul>
        </li>
        <!-- alert notification end-->
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
            <h3 class="page-header"><i class="fa fa-android"></i> The Developers </h3>
          </div>  
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="body-content">
              <div class="jhon">
                <img class="img" src="img/jhon.jpg" height- "200" width="200" />
                <div class="des">
                  <b> Jhon Danielle L. Umbay </b>
                  <p> Jhon Danielle Lauderis Umbay, also known as <i> Deyn </i>.
                      He graduated at F. Bangoy National High School. He is the back end
                      developer of the system. He also suggests about the framework of the
                      system. </p>
                </div>
              </div>    
              <div class="che">
                <img class="img" src="img/che.jpg" height- "200" width="200" />
                <div class="des">
                  <b> Cherry Pearl F. Majadas </b>
                  <p> Cherry Pearl Fajardo Majadas, also known as <i> Che </i>.
                      She graduated at St. Mary's Academy of Sta. Cruz Inc.. She also
                      transferred  from Cor Jesu College. She made the documentation for the system.
                      She also gives idea about the queries and design of the system.
                </des>
              </div>
              <div class="che">
                <img class="img" src="img/sy.jpg" height- "200" width="200" />
                <div class="des">
                    <b> Syralynn A. Espeña </b>
                  <p> Syralynn Agustin Espeña, also known as <i> Sy </i>.
                      She studied at Caloocan High School until the first quarter of header
                      fourth year. She continued her studies and graduated at Davao City
                      National High. She is the front end developer of the system. She somehow
                      gives additional idea for some queries of the system. </p>
                </div>
              </div>                           
            </div>
          </div>
        </div>


    <!--main content end-->
  </section>
  <!-- container section start -->

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
  <?php } else {
    header("location:admin.php");
  }

  ?>
</body>

</html>
