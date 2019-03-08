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

    <!-- Custom Theme Style -->
    <link href="app/views/css/build/css/custom.min.css" rel="stylesheet">
    <script src="app/views/js/jquery-1.11.0.min.js"></script>

  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login_form">
              <div class="messages"></div>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" id="username" placeholder="Username"/>
              </div>
              <div>
                <input type="password" class="form-control" id="password"  placeholder="Password"/>
              </div>
              <div>
                <a class="btn btn-default submit">Log in</a>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Report Manager!</h1>
                  <p>©2019 All Rights Reserved. Vienna High School!</p>
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
