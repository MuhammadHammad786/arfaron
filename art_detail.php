<?php
    if(!$_GET['art_id']){
        header("location:./");
    }
?>
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
    <link rel="stylesheet" href="./assets/css/art_detail.css">
    <script src="https://kit.fontawesome.com/03e233b384.js" crossorigin="anonymous"></script>
</head>

<body>

    <main>
        <!-- dbcon -->
        <?php include("./includes/dbcon.php"); ?>
        <!-- nav bar start -->
        <?php include("./includes/nav.php"); ?>
        <!-- nav bar end -->

        <?php
            $art_id = $_GET['art_id'];
            $sql = "SELECT * FROM arts WHERE art_id = '$art_id'";

            $result = $con->query($sql);
            $row = $result->fetch_assoc();
        ?>

         <!-- signup Modal start -->
         <?php include("./includes/signup_modal.php"); ?>
        <!-- signup modal End-->

        <!-- login Modal start -->
        <?php include("./includes/login_modal.php"); ?>
        <!-- login modal End-->


        <!-- artdetails -->
        <section class="adDetail wrapper pt-5">
            <div class="row">
                <div class="col-sm-8">

                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="./uploads/arts/<?php echo $row['image1'];?>" alt="art_image">
                            </div>
                            <div class="carousel-item">
                                <img src="./uploads/arts/<?php echo $row['image2'];?>" alt="art_image">
                            </div>
                            <div class="carousel-item">
                                <img src="./uploads/arts/<?php echo $row['image3'];?>" alt="art_image">
                            </div>


                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>





                    <div class="borderDiv mt-3 pb-5 pt-4">
                        <p class="headline2">
                            Details
                        </p>
                        <div class="row mr-0 ml-0 mt-3 sBetween details">
                            <div class="col-sm-5 pa0">
                                <div class="sBetween flex-wrap">
                                    <div>
                                        <p class="light">
                                            Country:
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                        <?php echo $row['country'];?>
                                        </p>
                                    </div>
                                </div>
                                <div class="sBetween">
                                    <div>
                                        <p class="light">
                                            Tribe:
                                        </p>
                                    </div>
                                    <div>
                                        <p>

                                        <?php echo $row['tribe'];?>
                                        </p>
                                    </div>
                                </div>
                                <div class="sBetween">
                                    <div>
                                        <p class="light">
                                            Material:
                                        </p>
                                    </div>
                                    <div>
                                        <p>

                                        <?php echo $row['material'];?>
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-5 pa0">

                                <div class="sBetween">
                                    <div>
                                        <p class="light">
                                            Size:
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            <?php echo $row['size'];?> cm

                                        </p>
                                    </div>
                                </div>
                                <div class="sBetween">
                                    <div>
                                        <p class="light">
                                            Approximate age:
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                        <?php echo $row['approx_age'];?> years
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <p class="headline2 mt-4">
                            Description:
                        </p>
                        <p class="mt-2">
                        <?php echo $row['description'];?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="borderDiv" id="dNone">
                        <p class="headline2">
                        <?php echo $row['name'];?> - <?php echo $row['material'];?> - <?php echo $row['tribe'];?>
                        </p>
                        <p class="sMons bold adPrice mt-3">
                        <?php echo $row['price'];?>$
                        </p>
                        <div class="sBetween mt-3">
                            <div>
                                <p class="light mb0">
                                    <i class="fa fa-map-marker"></i>
                                    <?php echo $row['country'];?>
                                </p>
                            </div>
                            <div>
                                <p class="light mb0">
                                </p>
                            </div>
                        </div>
                    </div>

                    <?php include "./payment_modal.php";?>
                    <div class="borderDiv mt-3">
                        <p class="sMons bold">
                            Seller description
                        </p>
                        <?php
                            if(isset($_GET['info'])){
                                ?>
                                
                                <div class="d-flex mt-2" style="align-items: center;">
                                    <div class="profileImg">
                                        <img src="./assets/images/profile.png" alt="">
                                    </div>
                                    <p class="sMons bold ml-3">
                                        <b>
                                        <?php echo $row['mer_name'];?>
                                    </b>
                                </p>
                            </div>
                            <div>
                                <p class="mt-3">
                                    Phone No:
                                        <span>
                                            <?php echo $row['phone'];?>
                                            
                                        </span>
                                    </p>
                                    <p>
                                        Email:
                                        <span>
                                            <?php echo $row['email'];?>

                                        </span>
                                    </p>
                                </div>
                                <div class="d-flex sBetween callBtn">
                                    <a href="tel:97477990984"><button class="btn btn-primary mt-3">
                                            <i class="mr-1 fa fa-phone-alt"></i>
                                            Call
                                        </button></a>
                                    <!-- <a href="https://wa.me/97477990984">
                                        <button class="btn btn-success mt-3">
                                            <i class="mr-1 fa fa-whatsapp"></i>
                                            Whatsapp
                                        </button>
                                    </a> -->
                                </div>
                                <?php
                            }else{
                                ?>
                                    <button class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                                                <i class="mr-1 fa fa-info"></i>
                                                Get Seller Information
                                    </button>
                                
                                <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </section>


        <section class="related wrapper mt-0 pt-0">
            <h2 class="heading">
                Related Arts
            </h2>
            <div class="row">
            <?php
                      $sql = "SELECT * FROM arts WHERE art_status = 2 ORDER BY `art_id` DESC LIMIT 3";
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
    <script
        src="https://www.paypal.com/sdk/js?client-id=ASJfIDxANNSZkS-zH1nXYK4QDGKoqpvDJUQHsHRwr6rz25mB1LC6iUKDBqHG7L4CYRsiT2gnQeXwJa_T"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>
    <script src="./assets/js/index.js"></script>
    <script>

        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: 1
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
                window.location = "./art_detail.php?info=true&art_id=<?php echo $art_id;?>";
            });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.

    </script>

    <?php
       
        // if(isset($_GET['info'])){
        //     $info = $_GET['info'];
        //     if($info){
        //         $_SESSION['info_art'] = 'true';
        //         $_SESSION['info_art_id'] = $art_id;
        //         header('location:./detail.php');
        //     }
        // }
    ?>
</body>

</html>