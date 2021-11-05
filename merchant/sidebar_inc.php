<?php include("./merchant_restrict.php");?>
<?php include("../includes/dbcon.php");?>
<header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header--><a href="index.php" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong
                                class="text-primary">TrAfaron</strong></div>
                        <div class="brand-text brand-sm">
                            <strong class="text-primary">
                                TrAfaron
                            </strong>
                        </div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <div class="right-menu list-inline no-margin-bottom">

                    <!-- Log out-->
                    <div class="list-inline-item logout">
                        <a id="logout" href="./logout.php" class="nav-link">
                            <span class="d-none d-sm-inline">
                                Logout
                                <i class="fas fa-sign-out-alt"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="../assets/images/profile.png" alt="admin"
                        class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5">TrAfaron</h1>
                    <p>Vendor</p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus-->
            <ul class="list-unstyled">
                <li><a href="./"> <i class="fa fa-product-hunt"></i>All Arts</a></li>
                <li><a href="./add_art.php"> <i class="fa fa-plus"></i>Add Art</a></li>
                <li><a href="./logout.php"> <i class="fas fa-sign-out-alt"></i>Logout </a></li>

        </nav>