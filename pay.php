<?php
require_once "db_connection/link.php";
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>

<?php
session_start();
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>PSG | Tickets</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/javascript.js"></script>

    <style>
        .column_ticket {
            float: left;
            width: 100%;
            padding: 0 10px;
            text-align: center;
            margin: 10px;
        }
        .row_ticket {
            margin: 0 -5px;
        }

        .row_ticket:after {
            content: "";
            display: table;
            clear: both;
        }

        @media screen and (max-width: 600px) {
            .column_ticket {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        h3{
            text-align: center;
        }

        .parallax {
            background-image: url("img/ligue1.jpg");
            min-height: 700px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .button{
            color: #fff;
            cursor: pointer;
            display: block;
            font-size:16px;
            font-weight: 400;
            line-height: 45px;
            margin: 0 auto;
            max-width: 160px;
            position: relative;
            text-decoration: none;
            text-transform: uppercase;
            width: 100%;
        }

        .pay-button{
            background-color: #d51e30;
            border: 0 solid;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0);
            outline: 1px solid;
            outline-color: rgba(255, 255, 255, 0.5);
            outline-offset: 0px;
            text-shadow: none;
            transition: all 1250ms cubic-bezier(0.19, 1, 0.22, 1);
        }

        .pay-button:hover {
            border: 1px solid;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, .5), 0 0 20px rgba(255, 255, 255, .2);
            outline-color: rgba(255, 255, 255, 0);
            outline-offset: 15px;
            text-shadow: 1px 1px 2px #427388;
    </style>
</head>
<body>

<!-- Header START-->
<div class="header">
    <a id="logo" class="logo" href="index.php"><img src='img/logo.png' width="85px" height="85px"></a>
    <div class="topnav" id="myTopnav">
        <a href="index.php">Home</a>
        <a href="history.php">History</a>
        <a href="players-page.php">Players</a>
        <a href="tickets.php">Buy tickets</a>
        <a href="about-us.php">About us</a>
        <?php
        if($_SESSION["user"] == "admin") {
            ?>
            <a href="admin-page.php">Admin page</a>
        <?php } ?>
        <?php
        if(empty($_SESSION["user"])) {
            ?>
            <form action="login.php"><a href="login.php">Login</a></form>
            <form action="signup.php"><a href="signup.php">Sign up</a></form>
        <?php }else { ?>
            <form action="cartshow.php"><a class="active" href="cartshow.php">Cart</a></form>
            <form action="exit.php"><a href="exit.php">Logout<?php echo " (". $_SESSION["user"] . ")" ?></a></form>
        <?php  } ?>
        <a href="javascript:void(0);" class="icon" onclick="responsive()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <span class="quote">ICI C'EST PARIS</span>
</div>
<!-- Header END-->


<div class="row">
    <div class="w3-white">
        <div class="parallax">

        </div>
        <div class="w3-container">
            <h3>PSG MATCHES</h3>
            <div class="row_ticket">
                <div class="column_ticket">
                    <form action="pay.php" method="post">
                        <label for="card_name">Card owner's fullname:</label>
                        <input type="text" name="card_name" id="card_name" required><br><br>
                        <label for="card_number">Card number:</label>
                        <input type="text" name="card_number" id="card_number" maxlength="16" required><br><br>
                        <label for="exp_year">Exp year:</label>
                        <input type="text" name="exp_year" id="exp_year" maxlength="4" required><br><br>
                        <label for="exp_month">Exp month:</label>
                        <input type="text" name="exp_month" id="exp_month" maxlength="2" required><br><br>
                        <label for="cvv">CVV:</label>
                        <input type="text" name="cvv" id="cvv" maxlength="3" required><br><br>
                        <input type="submit" class="button pay-button" name="pay" value="Pay">
                    </form>

                    <?php
                    include_once 'db_connection/link.php';
                    function checkCard_name($card_name) {
                        if(is_numeric($card_name)) {
                            throw new Exception("Card name should contain only letters!");
                        }else{
                            return true;
                        }
                    }

                    function checkCard_number($card_number) {
                        if(is_numeric($card_number)) {
                            return true;
                        }else{
                            throw new Exception("Card number should contain only numbers!");
                        }
                    }

                    function checkExp_year($exp_year) {
                        if(is_numeric($exp_year)) {
                            return true;
                        }else{
                            throw new Exception("Exp year should contain only numbers!");
                        }
                    }

                    function checkExp_month($exp_month) {
                        if(is_numeric($exp_month)) {
                            return true;
                        }else{
                            throw new Exception("Exp month should contain only numbers!");
                        }
                    }

                    function checkCvv($cvv) {
                        if(is_numeric($cvv)) {
                            return true;
                        }else{
                            throw new Exception("Exp month should contain only numbers!");
                        }
                    }

                    if(!((empty($_POST['card_name']) && empty($_POST['card_number']) && empty($_POST['exp_year']) && empty($_POST['exp_month']) && empty($_POST['cvv'])))){
                        try {
                            checkCard_name($_POST['card_name']);
                        }
                        catch(Exception $e) {
                            echo "Message: ".$e->getMessage()."<br>";
                        }

                        try {
                            checkCard_number($_POST['card_number']);
                        }
                        catch(Exception $e) {
                            echo "Message: ".$e->getMessage()."<br>";
                        }

                        try {
                            checkExp_year($_POST['exp_year']);
                        }
                        catch(Exception $e) {
                            echo "Message: ".$e->getMessage()."<br>";
                        }

                        try {
                            checkExp_month($_POST['exp_month']);
                        }
                        catch(Exception $e) {
                            echo "Message: ".$e->getMessage()."<br>";
                        }

                        try {
                            checkCvv($_POST['cvv']);
                        }
                        catch(Exception $e) {
                            echo "Message: ".$e->getMessage()."<br>";
                        }
                        $sql = mysqli_query($link,"UPDATE bookings
                        SET paid = '1'
                        WHERE username = '$user'");
                        mysqli_close($link);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Footer START-->
<div class="footer">
    <div class="footerimg">
        <img src="https://billetterie.psg.fr/sites/psg7.ap2s.fr/themes/psg7/images/logo-footer.png" style="text-align:center;">
    </div>
    <div class="footertext">
        <p>Author: Azimkhan Kuat &copy;</p>
        <p>Group: IT-1901</p>
    </div>
</div>
<!--Footer END-->
</body>
</html>
