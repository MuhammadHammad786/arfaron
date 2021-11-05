<?php
  session_start();
  include("../includes/dbcon.php");

  if (isset($_POST['type'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "select * from admin where admin_email = '$email'"; 
           

    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);

        $db_pass = $email_pass['admin_pass'];

        $pass_decode = password_verify($password,$db_pass);

        if($pass_decode) {
            $_SESSION['admin_email'] = $email_pass['admin_email'];
            $_SESSION['admin_auth'] = true;
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