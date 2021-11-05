
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>African Art</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/home.css">
    <link rel="stylesheet" href="./assets/css/modal.css">
    <script src="https://kit.fontawesome.com/03e233b384.js" crossorigin="anonymous"></script>
</head>

<body>

    <main>
        <!-- dbcon -->
        <?php include("./includes/dbcon.php"); ?>
        
        <!-- nav bar start -->
        <?php include("./includes/nav.php"); ?>
        <!-- nav bar start -->
         <!-- signup Modal start -->
         <?php include("./includes/signup_modal.php"); ?>
        <!-- signup modal End-->

        <!-- login Modal start -->
        <?php include("./includes/login_modal.php"); ?>
        <!-- login modal End-->



        <!-- banner start -->
        <div class="banner">

        </div>
        <!-- banner end -->

        <!-- new_arrival -->
        <section class="new_arrival wrapper" id="new_arrival">
            <div class="d-flex justify-sb">
                <h2 class="heading">
                    New Arrivals
                </h2>
                <a href="./all_arts.php" class="viewAll">
                    View All
                </a>
            </div>
            <div class="row">
                <?php
                      $sql = "SELECT * FROM arts WHERE art_status = 2  ORDER BY `art_id` DESC LIMIT 3";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                      // output data of each row
                          while($row = $result->fetch_assoc()) {
                              ?>   
                                <div class="col-sm-4">
                                    <div class="artBox mt-4">
                                        <a href="./art_detail.php?art_id=<?php echo $row['art_id'];?>">
                                            <div class="artImg">
                                                <img src="./uploads/arts/<?php echo $row['image1'];?>" alt="">
                                            </div>
                                            <div class="artDesc">
                                                <p class="mb-0 mt-2">
                                                    <b>
                                                    <?php echo $row['name'];?>
                                                    </b>
                                                </p>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <p class="mb-0 mt-2">
                                                    <?php echo $row['price'];?>$
                                                    </p>
                                                    <p class="mb-0 mt-2">
                                                    <?php echo $row['date'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                              <?php
                          }
                        }else{
                            ?>
                                <div class="mt-5 mb-5 text-center w-100">
                                    <h4 class="text-center mt-5">
                                        No Record Found !
                                    </h4>
                                </div>
                            <?php
                        }
                ?>

            </div>
        </section>

        <div class="hero wrapper">
            <div class="heroDesc">
                <h3 class="headline white">
                    Get Started with an
                    <br />
                    African Art
                </h3>
                <p class="ccc">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita dolores ipsa, autem architecto
                    tenetur nostrum consequatur voluptates, voluptatum aperiam veritatis cumque iste? Ut iure magni
                    molestias nobis, a rem repellat.
                </p>
            </div>
            <div class="heroImg">
                <img src="./assets/images/hero.png" alt="">
            </div>
        </div>

        <section class="grid wrapper">
            <div class="row">
                <div class="col-sm-4">
                    <div class="gridDiv">
                        <img src="./assets/images/artPeice.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="gridDiv">
                        <img src="./assets/images/events.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="gridDiv">
                        <img src="./assets/images/map.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="gridDiv">
                        <img src="./assets/images/tribe.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="gridDiv">
                        <img src="./assets/images/info_region.png" alt="">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="gridDiv">
                        <iframe src="https://www.youtube.com/embed/yYfGN-QtOKI" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer start -->
        <?php include("./includes/footer.php");?>
        <!-- footer end -->

    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsd
elivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./assets/js/index.js"></script>
        
</body>

</html>