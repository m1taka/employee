<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet"></link>
  </head>
  <body id="LoginForm">
    <div class="container">
      <div class="login-form">
        <div class="main-div">
          <div class="panel">
            <h2>Registration</h2>
            <p>Please enter username, email and password</p>
          </div>
          <form  method="post" action="register.php" >
            <?php include('errors.php'); ?>
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password_1">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="inputPassword" placeholder="Confirm Password" name="password_2">
            </div>
            <p>
              Already a member? <a href="login.php">Sign in</a>
            </p>
            
            <button type="submit" class="btn btn-primary" name="reg_user">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>