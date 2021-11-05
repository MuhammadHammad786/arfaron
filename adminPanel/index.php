<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TrAfaron | Dashboard</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Custom Font Icons CSS-->
  <link rel="stylesheet" href="./dashboard/font.css">
  <!-- Google fonts - Muli-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="./dashboard/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="./dashboard/custom.css">

  <script src="https://kit.fontawesome.com/03e233b384.js" crossorigin="anonymous"></script>
  <!-- Favicon-->
</head>

<body>
    <?php include("./sidebar_inc.php");?>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
      </div>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="fa fa-user"></i></div><strong>New Users</strong>
                  </div>
                  <div class="number dashtext-1">27</div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="fa fa-product-hunt"></i></div><strong> Arts</strong>
                  </div>
                  <div class="number dashtext-2">375</div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="fa fa-shopping-cart"></i></div><strong>Merchants</strong>
                  </div>
                  <div class="number dashtext-3">140</div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="fa fa-bar-chart"></i></div><strong>Categories</strong>
                  </div>
                  <div class="number dashtext-4">8</div>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                    class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="bar-chart block no-margin-bottom">
                <canvas id="barChartExample1"></canvas>
              </div>
              <div class="bar-chart block">
                <canvas id="barChartExample2"></canvas>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="line-cahrt block">
                <canvas id="lineCahrt"></canvas>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="stats-2-block block d-flex">
                <div class="stats-2 d-flex">
                  <div class="stats-2-arrow low"><i class="fa fa-caret-down"></i></div>
                  <div class="stats-2-content"><strong class="d-block">5.657</strong><span class="d-block">Standard
                      Scans</span>
                    <div class="progress progress-template progress-small">
                      <div role="progressbar" style="width: 60%;" aria-valuenow="30" aria-valuemin="0"
                        aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-2">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="stats-2 d-flex">
                  <div class="stats-2-arrow height"><i class="fa fa-caret-up"></i></div>
                  <div class="stats-2-content"><strong class="d-block">3.1459</strong><span class="d-block">Team
                      Scans</span>
                    <div class="progress progress-template progress-small">
                      <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0"
                        aria-valuemax="100" class="progress-bar progress-bar-template progress-bar-small dashbg-3">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="stats-3-block block d-flex">
                <div class="stats-3"><strong class="d-block">745</strong><span class="d-block">Total requests</span>
                  <div class="progress progress-template progress-small">
                    <div role="progressbar" style="width: 35%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"
                      class="progress-bar progress-bar-template progress-bar-small dashbg-1"></div>
                  </div>
                </div>
                <div class="stats-3 d-flex justify-content-between text-center">
                  <div class="item"><strong class="d-block strong-sm">4.124</strong><span
                      class="d-block span-sm">Threats</span>
                    <div class="line"></div><small>+246</small>
                  </div>
                  <div class="item"><strong class="d-block strong-sm">2.147</strong><span
                      class="d-block span-sm">Neutral</span>
                    <div class="line"></div><small>+416</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="drills-chart block">
                <canvas id="lineChart1"></canvas>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="stats-with-chart-2 block">
                <div class="title"><strong class="d-block">Credit Sales</strong><span class="d-block">Lorem ipsum dolor
                    sit</span></div>
                <div class="piechart chart">
                  <canvas id="pieChartHome1"></canvas>
                  <div class="text"><strong class="d-block">$2.145</strong><span class="d-block">Sales</span></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="stats-with-chart-2 block">
                <div class="title"><strong class="d-block">Channel Sales</strong><span class="d-block">Lorem ipsum dolor
                    sit</span></div>
                <div class="piechart chart">
                  <canvas id="pieChartHome2"></canvas>
                  <div class="text"><strong class="d-block">$7.784</strong><span class="d-block">Sales</span></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="stats-with-chart-2 block">
                <div class="title"><strong class="d-block">Direct Sales</strong><span class="d-block">Lorem ipsum dolor
                    sit</span></div>
                <div class="piechart chart">
                  <canvas id="pieChartHome3"></canvas>
                  <div class="text"><strong class="d-block">$4.957</strong><span class="d-block">Sales</span></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            <p class="no-margin-bottom">2021 &copy; TrAfaron.</p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="./vendor/jquery/jquery.min.js"></script>
  <script src="./vendor/popper.js/umd/popper.min.js"> </script>
  <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="./vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="./vendor/chart.js/Chart.min.js"></script>
  <script src="./vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="./js/charts-home.js"></script>
  <script src="./js/front.js"></script>
</body>

</html>