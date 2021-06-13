<?php
require_once "db_connection/link.php";
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>PSG | Sign up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css\font-awesome.min.css">
    <script src="js/javascript.js"></script>
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

        input[type="text"], input[type="password"], input[type="date"], input[type="email"]{
            margin-top: 15px;
            height: 25px;
            width: 200px;
            font-size: 16px;
            margin-bottom: 5px;
            background-color: #fff;
            padding-left: 10px;
        }

        label, h3{
            color: white;
        }
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
            <form action="signup.php"><a class="active" href="signup.php">Sign up</a></form>
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
<div class="row">
    <div class="container">
        <img src="img/login-ava.png">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <label for="fname">First name:</label>
            <input type="text" name="fname" placeholder="First name..." required><br>

            <label for="lname">Last name:</label>
            <input type="text" name="lname" placeholder="Last name..." required><br>

            <label for="date_of_birth">Date of birth:</label>
            <input type="date" name="date_of_birth" placeholder="Date of birth..." required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="Email..." required><br>

            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Username..." required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password..." required><br><br>

            <input type="submit" name="Submit" value="SIGN UP" class="btn btn-primary">
        </form>
    </div>
</div>
<!--Sign in END-->

<?php
require_once "db_connection/link.php";
if(isset($_POST['Submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $date = $_POST['date_of_birth'];
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE username='$username'";

    $result = mysqli_query($link, $sql);

    if(mysqli_num_rows($result) == 1){
        echo '<script language="javascript">';
        echo 'alert("This username already exists!")';
        echo '</script>';
    }
    else{
        $reg = "INSERT INTO users(fname, lname, date_of_birth, email, username, password) VALUES ('$fname', '$lname', '$date', '$email', '$username', '$password')";
        mysqli_query($link, $reg);
        echo '<script language="javascript">';
        echo 'alert("You are registered successfully!")';
        echo '</script>';
    }
}
?>

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