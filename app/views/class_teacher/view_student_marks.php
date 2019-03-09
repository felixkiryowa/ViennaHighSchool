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
    <link href="../css/build/css/custom.min.css" rel="stylesheet">>
    <!-- o level report css -->
    <!-- <link rel="stylesheet" href="../css/build/css/report.css" /> -->
    <link rel="stylesheet" href="../css/build/css/alevelreport.css" />



    <style>
	      
        @media screen {
          #printSection {
            display: none;
          }
        }
    
        @media print {
          body * {
          visibility:hidden;
          }
          #printSection, #printSection * {
          visibility:visible;
          }
          #printSection {
          position:absolute;
          left:0;
          top:0;
          }
        }
      </style>



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
								<table id="datatable-buttons" class="table table-striped table-bordered" style="border:None; color:">
								  <thead>
									<tr>
									  <th>Firstname</th>
									  <th>Lastname</th>
									  <th>Physics</th>
                    <th>Edit Mark</th>
									</tr>
								  </thead>
								  <tbody>
									<tr>
									  <td>Jonnah</td>
									  <td>Kazibwe</td>
                    <td>72</td>
									  <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#PrintReport"><i class="fa fa-eye">Report Preview</button></td>
									</tr>
                  <tr>
									  <td>Julia</td>
									  <td>Nakyejwe</td>
                    <td>56</td>
									  <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#PrintAlevelReport"><i class="fa fa-eye">Report Preview</button></td>
									</tr>
								  </tbody>
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
        <!-- /page content -->

        <!-- olevel report  modal -->
        <div class="modal fade" style="padding-top: 5px;overflow:scroll;" tabindex="-1" role="dialog" id="PrintReport">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><li class="fa fa-print"></li>  Report For Jonnah Kazibwe</h4>
              </div>

              <div class="modal-body">
                  <?php require_once("./reportolevel.php"); ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"  id="btnPrint">Print</button>
              </div>
        
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /olevel report modal -->

          <!-- alevel report  modal -->
          <div class="modal fade" style="padding-top: 5px;overflow:scroll;" tabindex="-1" role="dialog" id="PrintAlevelReport">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><li class="fa fa-print"></li>  Report For Julia Nakyejwe</h4>
              </div>

              <div class="modal-body">
                  <?php require_once("./reportalevel.php"); ?>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"  id="btnPrint2">Print</button>
              </div>
        
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- alevel report modal -->

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
    <!-- iCheck -->
    <script src="../css/vendors/iCheck/icheck.min.js"></script>
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
  

    <script>
	   
		document.getElementById("btnPrint").onclick = function() {
			printElement(document.getElementById("printThisOlevelReport"));
			//printElement(document.getElementById("printThisToo"), true, "<hr />");
			window.print();
    }
    
    document.getElementById("btnPrint2").onclick = function() {
			printElement(document.getElementById("printThisAlevelReport"));
			//printElement(document.getElementById("printThisToo"), true, "<hr />");
			window.print();
    }
    

	   function printElement(elem, append, delimiter) {
			var domClone = elem.cloneNode(true);

			var $printSection = document.getElementById("printSection");

			if (!$printSection) {
				var $printSection = document.createElement("div");
				$printSection.id = "printSection";
				document.body.appendChild($printSection);
			}
			if (append !== true) {
				$printSection.innerHTML = "";
			}

			else if (append === true) {
				if (typeof(delimiter) === "string") {
					$printSection.innerHTML += delimiter;
				}
				else if (typeof(delimiter) === "object") {
					$printSection.appendChlid(delimiter);
				}
			}

			$printSection.appendChild(domClone);
		}
	</script>

    <!-- Custom Theme Scripts -->
    <script src="../css/build/js/custom.min.js"></script>
	
  </body>
</html>
