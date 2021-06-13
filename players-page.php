<?php
require_once "db_connection/link.php";
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>PSG | Players</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body{
            background-color: #d51e30;
        }
        h2{
            text-align: center;
        }
        h3{
            padding: 10px;
        }

        .players-item img{
            width: 100%;
            height: auto;
        }

        .players-item .player_btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            background-color: #5592bb;
            color: white;
            font-size: 16px;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
        }

        .players-item .player_btn:hover {
            background-color: #d51e30;
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
        <a class="active" href="players-page.php">Players</a>
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


<!--Players START-->
<div class="row">
    <img src="img/cover-first-team.png" width="100%">
    <h2>PSG Squad</h2>
    <h3>Goalkeepers</h3>
    <div class="players">
            <div class="players-item">
            <img src="img/hero-1-navas.png" width="100%">
            <a href="players/player1.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-16-rico.png" width="100%">
            <a href="players/player2.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-bulka.png" width="100%">
            <a href="players/player3.php" class="player_btn">Show</a>
        </div>
    </div>
    <h3>Defenders</h3>
    <div class="players">
        <div class="players-item">
            <img src="img/hero-2-thiago-silva.png" width="100%">
            <a href="players/player4.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-3-kimpembe.png" width="100%">
            <a href="players/player5.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-4-kehrer.png" width="100%">
            <a href="players/player6.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-5-marquinhos.png" width="100%">
            <a href="players/player7.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-12-meunier.png" width="100%">
            <a href="players/player8.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-20-kurzawa.png" width="100%">
            <a href="players/player9.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-22-diallo.png" width="100%">
            <a href="players/player10.php" class="player_btn">Show</a>
        </div>
    </div>
    <h3>Midfielders</h3>
    <div class="players">
        <div class="players-item">
            <img src="img/hero-6-verratti.png" width="100%">
            <a href="players/player11.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-8-paredes.png" width="100%">
            <a href="players/player12.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-11-di-maria.png" width="100%">
            <a href="players/player13.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-19-sarabia.png" width="100%">
            <a href="players/player14.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-21-ander-herrera.png" width="100%">
            <a href="players/player15.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-23-draxler.png" width="100%">
            <a href="players/player16.php" class="player_btn">Show</a>
        </div>
    </div>
    <h3>Forwards</h3>
    <div class="players">
        <div class="players-item">
            <img src="img/hero-7-mbappe.png" width="100%">
            <a href="players/player17.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-9-cavani.png" width="100%">
            <a href="players/player18.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-10-neymar.png" width="100%">
            <a href="players/player19.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-17-choupo-moting.png" width="100%">
            <a href="players/player20.php" class="player_btn">Show</a>
        </div>
        <div class="players-item">
            <img src="img/hero-18-icardi.png" width="100%">
            <a href="players/player21.php" class="player_btn">Show</a>
        </div>
    </div>
</div>
<!--Players END-->
     
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
