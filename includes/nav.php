<?php 
    session_start();
?>
<nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="./">
                <div class="logoImg">
                    <img src="./assets/images/logo.png" alt="">
                </div>
            </a>
            <button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="javascript:void(0)" id="close" class="md-none">
                        x
                    </a>
                    <a class="nav-link" href="./">Home</a>
                    <a class="nav-link" href="./#new_arrival">New Arrival</a>
                    <a class="nav-link" href="./all_arts.php">All Arts</a>
                    <a class="nav-link" href="./privacy_policy.php">Privacy Policy</a>
                    <div class="nav-right md-none">
                        <?php
                            if(isset($_SESSION['Auth'])){
                                ?>
                                    <div class="d-flex" style="align-items:center;">
                                        <p class="mb-0">
                                            Hello,
                                            <?php echo $_SESSION['user_name'];?>
                                        </p>
                                        <a href="./actions/logout.php">
                                            <button class="outlineBtn ml-3">
                                                Logout
                                            </button>
                                        </a>
                                    </div>
                                <?php
                            }else{
                                ?>
                                <button class="blueBtn" data-toggle="modal" data-target="#signup">
                                    Sign up
                                </button>
                                <button class="outlineBtn ml-2" data-toggle="modal" data-target="#login">
                                    Sign in
                                </button>
                                
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="nav-right sm-none">
                <?php
                    if(isset($_SESSION['Auth'])){
                        ?>
                            <div class="d-flex" style="align-items:center;">
                                <p class="mb-0">
                                    Hello,
                                    <?php echo $_SESSION['user_name'];?>
                                </p>
                                <a href="./actions/logout.php">
                                    <button class="outlineBtn ml-3">
                                        Logout
                                    </button>
                                </a>
                            </div>
                        <?php
                    }else{
                        ?>
                            <button class="blueBtn" data-toggle="modal" data-target="#signup">
                                Sign up
                            </button>
                            <button class="outlineBtn ml-2" data-toggle="modal" data-target="#login">
                                Sign in
                            </button>
                                
                        <?php
                    }
                ?>
            </div>
        </nav>