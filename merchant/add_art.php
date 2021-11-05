<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TrAfaron | Merchant Dashboard</title>
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
    <!-- Favicon-->
</head>

<body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Art</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">+ Add Art</button>
                </div>

            </div>
        </div>
    </div>

    <?php include("./sidebar_inc.php");?>

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid sBw">
                <h2 class="h5 no-margin-bottom">Add Art</h2>
            </div>
        </div>

        <section class="admin">
            <div class="container-fluid">
                <form action="./add_art_action.php" method="POST" enctype="multipart/form-data">
                    <div class="block mb-3 mt-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="mb-0" for="Art Name">Name</label>
                                <input type="text" name="name" placeholder="Art Name" class="input" required>
                            </div>
                            <div class="col-sm-6">
                                <label class="mb-0" for="Art Price">Price($)</label>
                                <input type="number" name="price" placeholder="Art Price in USD" class="input">
                            </div>

                            <div class="col-sm-6">
                                <label class="mb-0 mt-3" for="Art Category">Category</label>
                                <select required class="input" name="category">
                                    <option disabled>Select Category </option>
                                    <?php
                                                $sql = "SELECT * FROM `category` ORDER BY `cat_id` DESC";

                                                if ($result = mysqli_query($con, $sql)) {
                                                    
                                                // Fetch one and one row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    
                                                    ?>
                                    <option value="<?php echo $row['cat_name'];?>">
                                        <?php echo $row['cat_name'];?>
                                    </option>

                                    <?php
                                                }
                                                }
                                            ?>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="mb-0 mt-3" for="Art Tribe">Tribe</label>
                                <select required id="" class="input" name="tribe">
                                    <option disabled>Select Tribe</option>
                                    <?php
                                                $sql = "SELECT * FROM `tribe` ORDER BY `tribe_id` DESC";

                                                if ($result = mysqli_query($con, $sql)) {
                                                    
                                                // Fetch one and one row
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    
                                                    ?>
                                    <option value="<?php echo $row['tribe_name'];?>">
                                        <?php echo $row['tribe_name'];?>
                                    </option>

                                    <?php
                                                }
                                                }
                                            ?>
                                    <option value="other">other</option>
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="mb-0 mt-3" for="Art Material">Material</label>
                                <select required id="" class="input" name="material">
                                    <option disabled>Select Material</option>
                                    <option value="Fabric">Fabric</option>
                                    <option value="Stone">Stone</option>
                                    <option value="wood">wood</option>
                                    <option value="metal">metal</option>
                                    <option value="Clay">Clay</option>
                                    <option value="Mixed-materials">Mixed-materials</option>
                                    <option value="other">other</option>
                                </select>

                            </div>

                            <div class="col-sm-6">
                                <label class="mb-0 mt-3" for="Art Size">Size in cm</label>
                                <input type="text" name="size" placeholder="H / W / L" class="input">
                            </div>

                            <div class="col-sm-6">
                                <label class="mb-0 mt-3" for="Art Approx Age">Estimated age</label>
                                <input type="number" name="approx_age" placeholder="Art Approx Age" class="input">
                            </div>

                            <div class="col-sm-6">
                                <label class="mb-0 mt-3" for="Country">Country of Origin</label>
                                <select required id="country" class="input" name="country">
                                    <option disabled>select country</option>
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
                                    <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic
                                        of the Congo</option>
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
                            <div class="col-sm-12">
                                <label class="mb-0 mt-3" for="Art Image">Image (max 3)</label>
                                <input type="file" name="art_img[]" placeholder="Art Image" multiple class="input">
                            </div>
                            <div class="col-sm-12">
                                <label class="mb-0 mt-3" for="Art description">Description</label>
                                <textarea name="description" class="input" placeholder="Art description"></textarea>
                            </div>
                            
                        </div>
                    </div>

                    <div class="block mb-2 mt-3">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="mb-0" for="Name">Merchant Name</label>
                                <input type="text" name="mer_name" placeholder="Name" class="input" value="<?php echo $_SESSION['mer_name'];?>" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="mb-0" for="Phone">Phone No.</label>
                                <input type="number" name="phone" placeholder="Phone No." class="input" required>
                            </div>
                            <div class="col-sm-4">
                                <label class="mb-0" for="email">Email</label>
                                <input type="email" name="email" placeholder="Email" class="input" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mb-5">
                            <button type="submit" name="submit" class="btn btn-success w-100 mt-2">Add +</button>
                        </div>
                    </div>
                </form>
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

    <script src="../adminPanel/vendor/jquery/jquery.min.js"></script>
    <script src="../adminPanel/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../adminPanel/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../adminPanel/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../adminPanel/vendor/chart.js/Chart.min.js"></script>
    <script src="../adminPanel/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../adminPanel/js/charts-home.js"></script>
    <script src="../adminPanel/js/front.js"></script>
</body>

</html>