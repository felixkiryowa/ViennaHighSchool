    <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span style="font-size:20px;">Vienna High School</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo  $_SESSION['name'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Perform Operations</h3>
                <ul class="nav side-menu">
                  <li><a href="admin_dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                  <li><a><i class="fa fa-group"></i> Teachers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="add_teacher.php"><i class="fa fa-plus-circle"></i> Add Teacher</a></li>
                      <li><a href="view_teachers.php"><i class="fa fa-eye"></i> View Teachers</a></li>
                    </ul>
                  </li>

                  <!-- <li><a><i class="fa fa-group"></i> Students <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#"><i class="fa fa-plus-circle"></i> Add Student</a></li>
                      <li><a href="#"><i class="fa fa-eye"></i>View Students</a></li>
                    </ul>
                  </li> -->
                  <li><a><i class="fa fa-book"></i>Subjects<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_subject.php"><i class="fa fa-plus-circle"></i> Add Subject</a></li>
                      <li><a href="form_advanced.html"><i class="fa fa-eye"></i> View Subjects</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-group"></i>Classes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add_class.php"><i class="fa fa-plus-circle"></i> Add Class</a></li>
                      <li><a href="view_classes.php"><i class="fa fa-eye"></i>View Classes</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-file"></i> Results <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_advanced.html"><i class="fa fa-eye"></i> View Students Result</a></li>
                    </ul>
                  </li>
                 

                </ul>
              </div>
              
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>