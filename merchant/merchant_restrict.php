<?php
    session_start();
    if(!isset($_SESSION['mer_auth'])){
        header("location:./login.php");
    }
?>