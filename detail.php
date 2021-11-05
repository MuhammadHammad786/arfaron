<?php
    session_start();
    if(!isset($_SESSION['info_art_id'])){
        // header("./");
        
    }else{
        echo $_SESSION['info_art_id'];
    }
?>