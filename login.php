<?php
require_once "db_connection/link.php";
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>

<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>PSG | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css\font-awesome.min.css">
    <script src="js/javascript.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #131929;
        }

        .container{
            width: 500px;
            height: 450px;
            text-align: center;
            margin: 0 auto;
            background-color: rgba(44, 62, 80, 1);
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .container img{
            width: 150px;
            height: 150px;
            margin-top: -60px;
        }

        input[type="text"], input[type="password"]{
            margin-top: 10px;
            height: 45px;
            width: 300px;
            font-size: 18px;
            margin-bottom: 20px;
            background-color: #fff;
            padding-left: 10px;
        }

        label, h3{
            color: white;
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#submitbtn").click(function(){
                event.preventDefault();
                $.ajax('authorization.php', {
                    type: 'POST',  // http method
                    data: { username: $( "#exampleInputUsername" ).val(),
                        password:  $( "#exampleInputPassword" ).val()},
                    accepts: 'application/json; charset=utf-8',
                    success: function (data) {
                        if (data.message == 'success') {
                            window.location.href = "index.php";
                        }
                    },
                    error: function (errorData, textStatus, errorMessage) {
                        var msg = (errorData.responseJSON != null) ? errorData.responseJSON.errorMessage : '';
                        $("#errormsg").text('Error: ' + msg + ', ' + errorData.status);
                        $("#errormsg").show();
                    }
                });
            });
        });
    </script>
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
            <form class="active" action="login.php"><a href="login.php">Login</a></form>
            <form action="signup.php"><a href="signup.php">Sign up</a></form>
        <?php }else { ?>
            <form action="cartshow.php"><a href="cartshow.php">Cart</a></form>
            <form action="exit.php"><a href="exit.php">Logout<?php echo " (". $_SESSION["user"] . ")" ?></a></form>
        <?php  } ?>
        <a href="javascript:void(0);" class="icon" onclick="responsive()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <span class="quote">ICI C'EST PARIS</span>
</div>
<!-- Header END-->


<!--Sign in START-->
    <div class="container">
        <img src="img/login-ava.png">
        <h3>Login as USER</h3>
        <form>
            <span class="error text-danger" id="errormsg" style="display: none; color: red;" ></span>
            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <input type="text" id="exampleInputUsername" placeholder="Enter username" class="form-input">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" id="exampleInputPassword" placeholder="Enter password" class="form-input">
            </div>
            <div class="form-group">
                <a href="admin-login.php">Login as admin</a>
            </div>
            <button type="submit" class="btn btn-primary" id="submitbtn">LOGIN</button>
        </form>
    </div>
<!--Sign in END-->

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