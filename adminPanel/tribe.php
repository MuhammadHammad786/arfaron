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
</head>

<body>

        <?php 
            include("./sidebar_inc.php");
            if(isset($_POST['submit'])){
                $tribe_name = $_POST['tribe_name'];

                $sql = "INSERT INTO `tribe`(`tribe_name`) VALUES ('$tribe_name')";

                mysqli_query($con,$sql);
            }    
        ?>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add tribe</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div>
                                <label for="tribe">tribe</label>
                                <input type="text" placeholder="write tribe name here." name="tribe_name" class="input" required>
                            </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit" name="submit">+ Add tribe</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
                <div class="container-fluid sBw">
                    <h2 class="h5 no-margin-bottom">Tribe List</h2>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                        + Add tribe
                    </button>
                </div>
            </div>

            <section class="no-padding-top mt-3 tableMain">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block margin-bottom-sm">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>tribe Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(isset($_GET['delete_id'])){
                                                    // sql to delete a record
                                                    $id = $_GET['delete_id'];
                                                    $sql = "DELETE FROM `tribe` WHERE `tribe_id`='$id'";

                                                    if (mysqli_query($con, $sql)) {
                                                        echo "<script>window.location.assign('./tribe.php')</script>";
                                                        
                                                    }
                                                }
                                                $sn = 1;
                                                 $sql = "SELECT * FROM `tribe` ORDER BY `tribe_id` DESC";

                                                if ($result = mysqli_query($con, $sql)) {
                                                    
                                                  // Fetch one and one row
                                                  while ($row = mysqli_fetch_assoc($result)) {
                                                    
                                                    ?>
                                                        <tr>
                                                            <td scope="row"><?php echo $sn++;?></td>
                                                            <td><?php echo $row['tribe_name'];?></td>
                                                            <td>
                                                                <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row['tribe_id'];?>">
                                                                    Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <!-- Button trigger modal -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row['tribe_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h4>Are you sure to delete this tribe.?</h4>
                                <?php echo $row['tribe_name'];?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="?delete_id=<?php echo $row['tribe_id'];?>">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                                                    <?php

                                                  }
                                                }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
        <!-- JavaScript files-->
        <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/front.js"></script>

</body>

</html>