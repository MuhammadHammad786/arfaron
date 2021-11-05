<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TrAfron | Admin Signin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Custom Font Icons CSS-->
  <link rel="stylesheet" href="../adminPanel/dashboard/font.css">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="../adminPanel/dashboard/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="../adminPanel/dashboard/custom.css">

  <script src="https://kit.fontawesome.com/03e233b384.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="login-page">
    <div class="container d-flex align-items-center">
      <div class="form-holder has-shadow">
        <div class="row">
          <!-- Logo & Information Panel-->
          <div class="col-lg-6">
            <div class="info d-flex align-items-center">
              <div class="content">
                <div class="logo">
                  <h1>Merchant Registration</h1>
                </div>
                <p>
                    Register as a merchant/seller and start selling your arts.
                </p>
                <a href="../">
                    <button class="btn btn-secondary" style="background-color: #27283C;">Go back to website</button>
                </a>
              </div>
            </div>
          </div>
          <!-- Form Panel    -->
          <div class="col-lg-6">
            <div class="form d-flex align-items-center">
              <div class="content">
                <form class="form-validate mb-2" id="register_form">
                <div class="alert alert-danger" id="error" role="alert">
                                
                                </div>
                                <div class="alert alert-success" id="success" role="alert">
                                    
                                </div>
                  <div class="form-group mb-2">
                    <label for="reg_username" class="label-material mb-0">Full Name</label>
                    <input id="reg_username" type="name" name="regUsername" required
                      data-msg="Please enter your full name" placeholder="Please enter your full name" class="input-material">
                  </div>
                  <div class="form-group mb-2">
                    <label for="reg_email" class="label-material mb-0">Email</label>
                    <input id="reg_email" type="email" name="regemail" required
                      placeholder="Please enter your email" class="input-material">
                  </div>
                  <div class="form-group mb-2">
                    <label for="reg_password" class="label-material mb-0">Password</label>
                    <input id="reg_password" type="password" name="regPassword" required
                      placeholder="Please enter your password" class="input-material">
                  </div>
                  <div class="form-group mb-2">
                    <label for="reg_password_c" class="label-material mb-0">Confirm Password</label>
                    <input id="reg_password_c" type="password" name="regPasswordC" required
                      placeholder="Please re-enter your password" class="input-material">
                  </div>
                  <button type="submit" id="signup_submit_btn" class="btn btn-primary mt-0">Register</button>
                  <p class="mt-3">
                      Already have an merchant account.? <a href="./login.php" style="text-decoration: underline;">Login</a> 
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- JavaScript files-->
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsd
elivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="./reg.login.action/index.js"></script>
</body>

</html>