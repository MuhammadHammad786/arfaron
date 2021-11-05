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
    <link rel="stylesheet" href="./assets/css/all_arts.css">
    <script src="https://kit.fontawesome.com/03e233b384.js" crossorigin="anonymous"></script>
    <style>
        .artImg {
            height: 300px;
        }
    </style>
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


        <!-- all_arts start -->
        <section class="all_arts wrapper pt-3">
            <div class="row">
                <div class="col-md-3">
                    <div class="filterBox mt-5">
                        <div>
                            <label class="mb-0 mt-3" for="Country">Country of Origin</label>
                            <select id="country" class="input form-control" name="country">
                                        <option selected disabled>select country</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
                                        <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                        </div>
                        <div>
                            <label class="mb-0 mt-3" for="Art Material">Material</label>
                            <select id="" class="input form-control" name="material">
                                <option selected disabled>Select Material</option>
                                <option value="Fabric">Fabric</option> 
                                <option value="Stone">Stone</option> 
                                <option value="wood">wood</option> 
                                <option value="metal">metal</option> 
                                <option value="Clay">Clay</option> 
                                <option value="Mixed-materials">Mixed-materials</option>
                                <option value="other">other</option>
                            </select>
                

                        </div>
                        <div>
                            <label class="mb-0 mt-3" for="Art Tribe">Tribe</label>
                                    <select id="" class="input form-control" name="tribe">
                                        <option selected disabled>Select Tribe</option>
                                        <?php
                                            $sql = "SELECT * FROM `tribe` ORDER BY `tribe_id` DESC";

                                            if ($result = mysqli_query($con, $sql)) {
                                                
                                              // Fetch one and one row
                                              while ($row = mysqli_fetch_assoc($result)) {
                                                
                                                ?>
                                                <option value="<?php echo $row['tribe_name'];?>"><?php echo $row['tribe_name'];?></option>
                                                
                                                <?php
                                              }
                                            }
                                        ?>
                                        <option value="other">other</option>
                                    </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                    <?php
                      $sql = "SELECT * FROM arts WHERE art_status = 2";
                      $result = $con->query($sql);
                      if ($result->num_rows > 0) {
                      // output data of each row
                          while($row = $result->fetch_assoc()) {
                              ?>   
                                <div class="col-sm-4">
                                    <div class="artBox mt-5">
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
                </div>
            </div>
        </section>
        <!-- all_arts end -->


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