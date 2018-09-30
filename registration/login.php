<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet"></link>
  </head>
  <body id="LoginForm">
    <div class="container">
      <div class="login-form">
        <div class="main-div">
          <div class="panel">
            <h2>Sign in</h2>
            <p>Please enter your email and password</p>
          </div>
          <form id="Login" method="post" action='login.php'>
            <?php include('errors.php'); ?>
            
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address" >
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" >
            </div>
            <p>
              Not yet a member? <a href="register.php">Sign up</a>
            </p>
            
            <button type="submit" class="btn btn-primary" name="login_user">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>