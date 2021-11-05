<?php

include("../includes/dbcon.php");
session_start();
if ($_POST['type'] == 1) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = password_hash($password, PASSWORD_BCRYPT);

    $duplicate = mysqli_query($con, "select * from users where user_email='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo json_encode(array("statusCode" => 201));
    } else {
        $sql = "INSERT INTO `users`( `user_name`, `user_email`,`user_pass`) 
			VALUES ('$name','$email','$pass')";
        if (mysqli_query($con, $sql)) {
            echo json_encode(array("statusCode" => 200));
        } else {
            echo json_encode(array("statusCode" => 201));
        }
    }
}
if ($_POST['type'] == 2) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from users where user_email = '$email'"; 
           

    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['user_pass'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode) {
            $_SESSION['user_name'] = $email_pass['user_name'];
            $_SESSION['user_id'] = $email_pass['user_id'];
            $_SESSION['user_email'] = $email_pass['user_email'];
            $_SESSION['Auth'] = true;
            echo json_encode(array("statusCode" => 200));
        }
        else
        {
            echo json_encode(array("statusCode" => 201));
        }
    }else{
         $ie = true;
         echo json_encode(array("statusCode" => 202));
    }            

}
?>