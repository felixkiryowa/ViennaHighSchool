<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
        session_start();
        if(!$_SESSION['loggedin'])
        {
            header("Location: ../../../index.php?problem=notLoggedIn");
            exit;
        }
        $usertype = $_SESSION['usertype'];
        $user_id = $_SESSION['user_id'];
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/vienna.jpg">

    <title>Admin Dashboard </title>

    <!-- Bootstrap -->
    <link href="../css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../css/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../css/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../css/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../css/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../css/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
           <?php 
               require_once("layout/sidebar.php");
           ?>

        <!-- top navigation -->
           <?php
               require_once("layout/top_navigation.php");
           ?>
        <!-- /top navigation -->

        <!-- page content -->
           <?php
              require_once("layout/page_content/classes/add_class_content.php");
           ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
              Vienna High School &copy 2019 All Rights Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../css/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../css/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../css/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../css/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../css/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../css/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../css/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../css/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../css/vendors/Flot/jquery.flot.js"></script>
    <script src="../css/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../css/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../css/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../css/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../css/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../css/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../css/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../css/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../css/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../css/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../css/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../css/vendors/moment/min/moment.min.js"></script>
    <script src="../css/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../css/build/js/custom.min.js"></script>
    <script src="../js/class_teacher/add_class.js"></script>
  </body>
</html>
