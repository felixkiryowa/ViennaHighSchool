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
    <link rel="icon" href="../images/vienna.jpg">

    <title>Class Teacher </title>

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
	
	
		
    <!-- Datatables -->
    <link href="../css/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../css/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
           <?php 
               require_once("sidebar.php");
           ?>

        <!-- top navigation -->
           <?php
               require_once("top_navigation.php");
           ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
                <!-- top tiles -->
                <?php 
                    require_once("top_tiles.php");
                ?>
                <!-- /top tiles -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
					   <div class="x_content">
							<table id="AllStudentsTable" class="table table-striped table-bordered">
								  <thead>
									<tr>
									  <th>No</th>
									  <th>Firstname</th>
									  <th>Lastname</th>
									  <th>Other names</th>
									  <th>Student Status</th>
									  <th>Registered On</th>
									  <th>Action</th>
									</tr>
								  </thead>
							</table>
						</div>						
					</div>
				</div>
				<br />

                <!-- end of weather widget -->
            </div>
            </div>
                </div>
           </div>
        <!-- /page content -->
		
			 <!-- edit student info modal -->
		<div class="modal fade" style="padding-top: 125px;" tabindex="-1" role="dialog" id="EditSudentInfo">
		   <div class="modal-dialog" role="document">
			  <div class="modal-content">
			 <div class="modal-header">
				 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 <h4 class="modal-title"><li class="fa fa-edit"></li>  Edit Student Data</h4>
			 </div>

			<form class="form-horizontal"  id="updateStudentForm">

			<div class="modal-body">
          <div class="edit-student-information"></div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="editfirstname">First Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="editfirstname" name="editfirstname" placeholder="Enter Student Firstname" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="editlastname">Last Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="editlastname" name="editlastname" placeholder="Enter Student Lastname"  class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="editothername">Other Name
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="editothername" placeholder="Enter Student Othernames" name="editothername" class="form-control col-md-7 col-xs-12">
            </div>
          </div> 
			</div>
			<div class="modal-footer EditSudentInfoModal">
				<button  onclick="SaveEditedData(event)" class="btn btn-primary">Save changes</button>
			</div>
		  </form>
		 </div><!-- /.modal-content -->
		 </div><!-- /.modal-dialog -->
		</div><!-- edit student info model -->
		
		
		
    <!-- remove modal -->
    <div class="modal fade"  style="padding-top: 125px;" tabindex="-1" role="dialog" id="discountinueStudentModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Discontinue Student</h4>
          </div>
          <div class="modal-body">
            <div class="DiscontinueStudentMessages"></div>
            <p>Do you really want to discontinue this student ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="Discontinue">Continue</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
    <script src="../css/vendors/skycons/skycons.js"></script>
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
	
	  <!-- Datatables -->
    <script src="../css/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../css/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../css/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../css/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../css/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../css/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../css/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../css/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../css/vendors/jszip/dist/jszip.min.js"></script>
    <script src="../css/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../css/vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <script src="../js/class_teacher/js/class_teacher.js"></script>


    <!-- Custom Theme Scripts -->
    <script src="../css/build/js/custom.min.js"></script>
	
  </body>
</html>
