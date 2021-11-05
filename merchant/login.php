<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TrAfron | Merchant Signin</title>
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
                  <h1>Merchant Login</h1>
                </div>
                <p class="mb-0">
                    Are you already have our merchant/seller.?
                </p>
                <p>
                    If not so please <a href="./signup.php" style="color: #fff;text-decoration: underline;">signup</a> as a merchant/seller and start selling your arts.
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
                <form id="login_form" class="form-validate mb-4">
                <div class="alert alert-danger" id="error_log" role="alert">
                                    
                                    </div>
                                    <div class="alert alert-success" id="success_log" role="alert">
                                        
                                    </div>
                  <div class="form-group mb-2">
                    <label for="log_email" class="label-material mb-0">Email</label>
                    <input id="log_email" type="email" name="log_email" required
                      data-msg="Please enter your email" placeholder="Please enter your email" class="input-material">
                  </div>
                  <div class="form-group mb-2">
                    <label for="log_password" class="label-material mb-0">Password</label>
                    <input id="log_password" type="password" name="loginPassword" required
                      data-msg="Please enter your password" placeholder="Please enter your password" class="input-material">
                  </div>
                  <button type="submit" id="login_submit_btn" class="btn btn-primary mt-0">Login</button>
                  <p class="mt-3">
                      Not have an merchant account.? <a href="./signup.php" style="text-decoration: underline;">Signup</a> 
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