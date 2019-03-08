<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vienna High School | Login </title>

    <!-- Bootstrap -->
    <link href="app/views/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="app/views/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="app/views/css/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="app/views/css/vendors/animate.css/animate.min.css" rel="stylesheet">

    <link rel="icon" href="app/views/images/vienna.jpg">


    <!-- Custom Theme Style -->
    <link href="app/views/css/build/css/custom.min.css" rel="stylesheet">
    <script src="app/views/js/jquery-1.11.0.min.js"></script>

  </head>

  <body style="background-color:#2A3F54;padding-left: 30px;padding-right: 30px;">
    <div class="container" style="padding-top:10px;">
       <div class="row" style="border-style: double;">
	        <div class="col-sm-4"></div>
			<div class="col-sm-4" style="padding-left: 120px;">
			  <h3>Vienna High School</h3>
			</div>
			<div class="col-sm-4"></div>
		</div>
    </div>
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login_form">
              <div class="messages" style="text-align:center;color:red;text-decoration:none;"></div>
              <h1 align="center">Login <img src="app/views/images/modifiedImage.jpg" height="150px" width="150px" alt="modified badge image"/> Form</h1>
              <div>
                <input type="text" class="form-control" id="username" placeholder="Username"/>
              </div>
              <div>
                <input type="password" class="form-control" id="password"  placeholder="Password"/>
              </div>
              <div>
                <button class="btn btn-info btn-block btn-lg submit">Log in</button>
              </div>


              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <br />
                
                <div>
                  <p style="color:white;" align="center">©2019 All Rights Reserved. Vienna High School!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  <script type="text/javascript" src="app/views/js/login.js"></script>
  </body>
</html>
