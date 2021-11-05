<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    ob_start();

    include "../includes/dbcon.php";
    $trans = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrAfaron</title>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
       label{
           font-weight:bold;
           font-size:18px;
       }
    </style>
</head>
<body>
    <div style="margin-top:10%">
        <div class="row">
            <div class="col-sm-6 m-auto">
                <h2 class="heading mb-5">
                    <b>
                    Select a payment plan
                    </b>
                </h2>
                <div class="mt-4">
                    <input type="radio" checked id="html" name="pay_plan" value="1">
                    <label for="html">1$ per Month (your ad will automatically expire in a month)</label><br>
                </div>
                <div class="mt-2 mb-4">
                    <input type="radio" id="css" name="pay_plan" value="3">
                    <label for="css">3$ for Three Months (your ad will automatically expire in 3 months)</label><br>
                </div>
                <div id="paypal-button-container"></div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script
        src="https://www.paypal.com/sdk/js?client-id=ASJfIDxANNSZkS-zH1nXYK4QDGKoqpvDJUQHsHRwr6rz25mB1LC6iUKDBqHG7L4CYRsiT2gnQeXwJa_T"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsd
elivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./assets/js/index.js"></script>
        

    <script>
        var payPlan = 1;
        $(document).ready(function () {
            
            $('input[type=radio][name=pay_plan]').on('change', function() {
            switch ($(this).val()) {
                case '1':
                payPlan = 1;
                break;
                case '3':
                payPlan = 3;
                break;
            }
            });
        });


        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: payPlan
                }
                }]
            });
            },
            onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                alert('Transaction completed by ' + details.payer.name.given_name);
                window.location = "./add_art_action.php?payment=true&payPlan="+payPlan;
            });
            }
        }).render('#paypal-button-container');
        //This function displays Smart Payment Buttons on your web page.

        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        // Callback
        window.onbeforeunload = function(e) {
            // Turning off the event
            e.preventDefault();
            alert('you cant refresh this page');
        }

    </script>
    <script>
    </script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $target='../uploads/arts/';
        // $uploadFile = $uploadDir.basename($_FILES['art_img']['name']);

        $count=0;
        
        foreach ($_FILES['art_img']['name'] as $filename) 
        {
            $temp=$target;
            $tmp=$_FILES['art_img']['tmp_name'][$count];
            $count=$count + 1;
            $temp=$temp.basename($filename);
            move_uploaded_file($tmp,$temp);
            $temp='';
            $tmp='';
        }


        $art_img = $_FILES['art_img']['name'][0];
        $art_img2 = @$_FILES['art_img']['name'][1];
        $art_img3 = @$_FILES['art_img']['name'][2];

        
        $name = $_POST['name'];
        $_SESSION['name'] = $name;
        $price = $_POST['price'];
        $category = $_POST['category'];
        $tribe = $_POST['tribe'];
        $material = $_POST['material'];
        $size = $_POST['size'];
        $approx_age = $_POST['approx_age'];
        $country = $_POST['country'];
        $description = mysqli_real_escape_string($con,$_POST['description']) ;
        $mer_id = $_SESSION['mer_id'];
        $mer_name = $_POST['mer_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        date_default_timezone_set('UTC');
        $date = date("m-d-y");
        $art_status = 'payment_false';
        $pay_plan = 0;

        $sql = "INSERT INTO `arts`(`name`, `price`, `category`, `tribe`, `material`, `size`, `approx_age`, `country`, `image1`, `image2`, `image3`, `description`, `date`, `mer_id`, `mer_name`, `phone`,`email`,`art_status`,`pay_plan`) VALUES ('$name','$price','$category','$tribe','$material','$size','$approx_age','$country','$art_img','$art_img2','$art_img3','$description','$date','$mer_id','$mer_name','$phone','$email','$art_status','$pay_plan')";

        $query=mysqli_query($con,$sql);

        if ($query) {
            // echo "New record created successfully";
            // header("location:./");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
        
    }
    
    if(!isset($_SESSION['name'])){
        header("location:./");
    }

    if(isset($_GET['payment'])){

        $pay_plan = $_GET['payPlan'];
        $name = $_SESSION['name'];
        $sql = "UPDATE arts SET art_status='0', pay_plan = '$pay_plan' WHERE name = '$name'";


        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
            header("location:./success.html");
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
        
    }
?>