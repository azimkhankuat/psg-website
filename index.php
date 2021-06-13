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
<html lang="en">
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>PSG | Home</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/javascript.js"></script>
</head>
<body>

<!-- Header START-->
<div class="header">
    <a id="logo" class="logo" href="index.php"><img src='img/logo.png' width="85px" height="85px"></a>
    <div class="topnav" id="myTopnav">
        <a class="active" href="index.php">Home</a>
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
        <?php }else {if($_SESSION["user"] != "admin") { ?>
            <form action="cartshow.php"><a href="cartshow.php">Cart</a></form>
        <?php  } ?>
            <form action="exit.php"><a href="exit.php">Logout<?php echo " (". $_SESSION["user"] . ")" ?></a></form>
        <?php  } ?>
        <a href="javascript:void(0);" class="icon" onclick="responsive()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <span class="quote">ICI C'EST PARIS</span>
</div>
<!-- Header END-->

<!-- Main content START-->
<?php
require_once "db_connection/link.php";
$queryy = "SELECT * FROM posts ORDER BY published_at DESC;";
$resultt = mysqli_query($link, $queryy);
if ($resultt ===false){
    echo mysqli_error($link);
} else{
    $ittems = mysqli_fetch_all($resultt, MYSQLI_ASSOC);
}
?>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
        <?php foreach ($ittems as $item):?>
        <div class="w3-container w3-white w3-margin w3-padding-large">
            <div class="w3-center">
                <h3><?= $item['title'] ?></h3>
                <h5><?= $item['description'] ?></h5><span class="w3-opacity"><?= $item['published_at']?></span>
            </div>
            <div class="w3-justify">
                <img src="<?= $item['url'] ?>" style="width:100%" class="w3-padding-16">
                <p><?= $item['content']?></p>
                <p class="w3-left"><button class="w3-button w3-white w3-border" onclick="likeFunction(this)"><b><i class="fa fa-thumbs-up"></i> Like</b></button></p>
                <p class="w3-clear"></p>
            </div>
        </div>
            <hr>
        <?php endforeach; ?>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <h3 style="text-align: center;">Club Achievements</h3>
            <p><b>Request Size:</b> 29</p>
            <p><b>Average age:</b> 25.9</p>
            <p><b>Legionnaires:</b> 20 69.0%</p>
            <p><b>Active national team players:</b> 18</p>
            <p><b>Stadium:</b> Princes Park 49.691 seats</p>
            <p><b>Current transfer record:</b> +10.90 Mill. €</p>
    </div>
      
    <div class="card">
      <h3 style="text-align: center;">Facts and Numbers</h3>
        <p><b>Club Official Name:</b> Paris Saint-Germain</p>
        <p><b>Address:</b> 24 rue du Commandant-Guilbaud</p>
        <p><b>Tel:</b> +33 147 4371</p>
        <p><b>Fax:</b> +33 142 3050</p>
        <p><b>Website:</b> <a href="https://www.psg.fr/">www.psg.fr</a></p>
        <p><b>Founded:</b> Aug 12 1970 year</p>
    </div>
      
    <div class="card">
      <h3 style="text-align: center;">Follow Us</h3>
        <p><b>Google: </b><a>kuat.0111@gmail.com</a></p>
        <p><b>Instagram: </b><a>@kwhattime, </a><a>@k.what07</a></p>
        <p><b>VK: </b><a href="https://vk.com/k.azimkhan">https://vk.com/k.azimkhan</a></p>
    </div>
  </div>
</div>
<!-- Main content END-->

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
<!--Footer END -->
</body>
</html>
