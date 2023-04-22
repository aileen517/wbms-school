<!DOCTYPE html>
<html>
<head>
  <title>Commonwealth National High School</title>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="dist/css/login_style.css" rel="stylesheet" />
</head>
<!--Coded with love by Mutiullah Samim-->
<body class="bg-success">
  <div class="container h-100">
    <div class="d-flex justify-content-center h-100">
      <div class="user_card bg-warning">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container bg-white">
            <img src="img/logo.png" class="pmnhs_logo" alt="Logo" width="160">
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
          <form method="post" action="login-exec.php">
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text bg-danger"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" name="usern" class="form-control input_user" value="" placeholder="username" required>
            </div>
            <div class="input-group mb-2">
              <div class="input-group-append">
                <span class="input-group-text bg-danger"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" name="passw" class="form-control input_pass" value="" placeholder="password" required>
            </div>
              <div class="d-flex justify-content-center mt-3 login_container">
          <button type="submit" name="logmenow" class="btn login_btn bg-success">Login</button>
           </div>
          </form>
        </div>
        <div class="mt-4">
          <div class="d-flex justify-content-center links">
            Forgot your password? <a href="forgot-password">Click Here</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
