<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style>
  .error {
    color: red;
  }
</style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <?php
                if(isset($_REQUEST['registeration'])){
                  if($_REQUEST['registeration']=='success'){
                    echo "<div class='alert alert-success'>
                        Registeration Succesfully
                    </div>";
                  }
                  elseif($_REQUEST['registeration']=='error'){
                    echo "<div class='alert alert-danger'>
                        Email already registered
                    </div>";
                  }
                  elseif($_REQUEST['registeration']=='warning'){
                    echo "<div class='alert alert-warning'>
                        Password Not Matched
                    </div>";
                  }
                }
            ?>
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form id="form" class="pt-3" method="POST" action="register-process.php"> 
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="confirmPassword" placeholder="Confirm Password" name="cfpassword" required>
                </div>
                
                <div class="mt-3">
                  <button type="submit"  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="http://code.jquery.com/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>
  <!-- endinject -->
  <script>
    
  </script>
</body>

</html>
