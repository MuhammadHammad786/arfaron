<?php

include("../../includes/dbcon.php");
session_start();
if ($_POST['type'] == 1) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass = password_hash($password, PASSWORD_BCRYPT);

    $duplicate = mysqli_query($con, "select * from merchants where mer_email='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo json_encode(array("statusCode" => 201));
    } else {
        $sql = "INSERT INTO `merchants`( `mer_name`, `mer_email`,`mer_pass`) 
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

    $email_search = "select * from merchants where mer_email = '$email'"; 
           

    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['mer_pass'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode) {
            $_SESSION['mer_name'] = $email_pass['mer_name'];
            $_SESSION['mer_id'] = $email_pass['mer_id'];
            $_SESSION['mer_email'] = $email_pass['mer_email'];
            $_SESSION['mer_auth'] = true;
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