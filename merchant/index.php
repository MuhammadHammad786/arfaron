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
                    <form action="#">
                        <div>
                            <label for="Art Image">Art Image</label>
                            <input type="file" placeholder="Art Image" class="input">
                        </div>
                        <div>
                            <label for="Art Name">Art Name</label>
                            <input type="text" placeholder="Art Name" class="input">
                        </div>
                        <div>
                            <label for="Art Category">Art Category</label>
                            <input type="text" placeholder="Art Category" class="input">
                        </div>
                        <div>
                            <label for="Art Price">Art Price($)</label>
                            <input type="number" placeholder="Art Price" class="input">
                        </div>
                        <div>
                            <label for="Art Details">Art Details</label>
                            <input type="text" placeholder="Art Details" class="input">
                        </div>
                    </form>
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
                <h2 class="h5 no-margin-bottom">Art List</h2>
                <!-- Button to Open the Modal -->
                <a href="./add_art.php">
                    <button type="button" class="btn btn-primary">
                        + Add Art
                    </button>
                </a>

            </div>
        </div>

        <section class="admin">
            <div class="container-fluid">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Art Name</th>
                                <th>Art Image</th>
                                <th>View</th>
                                <th>Art Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "DELETE FROM arts WHERE art_status= 'payment_false'";

                                if (mysqli_query($con, $sql)) {
                                // echo "Record deleted successfully";
                                }
                                if(isset($_GET['delete_id'])){
                                    // sql to delete a record
                                    $id = $_GET['delete_id'];
                                    $sql = "DELETE FROM arts WHERE art_id='$id'";

                                    if (mysqli_query($con, $sql)) {
                                        echo "<script>window.location.assign('./')</script>";
                                        
                                    }
                                }
                                    $sn = 1;
                                    $sql = "SELECT * FROM `arts` ORDER BY `art_id` DESC";

                                if ($result = mysqli_query($con, $sql)) {
                                    
                                    // Fetch one and one row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $sn++;?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><img src="../uploads/arts/<?php echo $row['image1'];?>" alt="Art"></td>
                                
                                            <td>
                                                <a href="../art_detail.php?art_id=<?php echo $row['art_id'];?>" class="text-success">
                                                    View Art
                                                </a>
                                            </td>

                                            <td>
                                                <?php
                                                    if($row['art_status'] == 0){
                                                        ?>
                                                            <span class="badge badge-warning">Pending</span>
                                                        <?php
                                                    }elseif($row['art_status'] == 1){
                                                        ?>
                                                            <span class="badge badge-danger">Rejected</span>
                                                        <?php
                                                        
                                                    }else{
                                                        ?>
                                                            <span class="badge badge-success">Active</span>
                                                        <?php
                                                        
                                                    }
                                                ?>
                                            </td>

                                            <td>
                                                <a href="" data-toggle="modal" data-target="#exampleModal<?php echo $row['art_id'];?>">
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                                        <!-- Button trigger modal -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $row['art_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Modal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Are you sure to delete this merchant.?</h4>
                                            <?php echo $row['name'];?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="?delete_id=<?php echo $row['art_id'];?>">
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