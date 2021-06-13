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
<title>PSG | About Us</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/javascript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function post() {
            var comment = document.getElementById("comment").value;
            var firstname = document.getElementById("firstname").value;
            var lastname = document.getElementById("lastname").value;
            var country = document.getElementById("country").value;
            if(comment && firstname && lastname && country)
            {
                $.ajax
                ({
                    type: 'post',
                    url: 'post_comments.php',
                    data:
                        {
                            user_comm: comment,
                            user_firstname: firstname,
                            user_lastname: lastname,
                            user_country: country
                        },
                    success: function (response)
                    {
                        alert("Successfully added!");
                    }
                });
            }
            return false;
        }
    </script>
<style>
body {
    margin: 0;
}

html {
    box-sizing: border-box;
}

*, *:before, *:after {
    box-sizing: inherit;
}

.column {
    float: left;
    width: 100%;
    margin-bottom: 16px;
    padding: 0 8px;
    text-align: center;
}

.column1 {
    float: left;
    width: 50%;
    margin-top: 6px;
    padding: 20px;
}

@media screen and (max-width: 600px) {
    .column1{
        width: 100%;
    }
}
    
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    margin: 8px;
}

.about-section {
    background-image: url(img/about-us.jpg);
    background-size: cover;
    padding: 50px;
    text-align: center;
    background-color: #474e5d;
    color: white;
}

.container {
    padding: 0 16px;
}
    
.container::after, .row::after {
    content: "";
    clear: both;
    display: table;
}
    
.container1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}
    
.title {
    color: grey;
}
    
.row1:after {
  content: "";
  display: table;
  clear: both;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px; 
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}
    
input[type=text]:hover, select:hover, textarea:hover{
    border: 1px solid #ef3a40;
}

input[type=submit]:hover {
  background-color: #ef3a40;
}

    #all_comments{
        overflow: scroll;
        height: 300px;
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
        <a class="active" href="about-us.php">About us</a>
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

<!-- About Us START -->
<div class="about-section">
  <h1>About Us Page</h1>
  NEYMAR: <q>1% CHANCE, 99% FAITH</q> 
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="img/ava.JPG" alt="Kuat" width="25%" height="25%" class="w3-padding-4">
      <div class="container">
        <h2>Kuat Azimkhan</h2>
        <p class="title">Student of Astana IT University</p>
        <p>Big fan of Paris Saint-Germain FC</p>
        <p><b>Email: </b><a>k.azimkhan@astanait.edu.kz</a></p>
      </div>
    </div>
  </div>
</div>
<!-- About us END-->
    
<div class="container1">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Leave us a message:</p>
  </div>
  <div class="row1">
    <div class="column1">
        <div class="card">
            <h3>PSG TEAM</h3>
            <img src="img/contactus.jpg" width="100%" class="w3-padding-16">
        </div>
    </div>
    <div class="column1">
        <div class="card">
          <form action="" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="Your name...">
            <label for="lname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Your last name...">
            <label for="country">Country</label>
              <input type="text" id="country" name="country" placeholder="Your country...">
            <label for="subject">Comment</label>
            <textarea name="comment" id="comment" placeholder="Write something..." style="height:170px"></textarea>
            <input type="submit" value="Submit" onclick="return post();" class="showbutton">
          </form>
        </div>
    </div>
      <div class="column">
        <div class="card" id="all_comments">
            <h3>Comments of users:</h3>
            <?php
            require_once "db_connection/link.php";

            $comm = mysqli_query($link,"select * from comments");
            while($row=mysqli_fetch_array($comm))
            {
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $comment = $row['comment'];
                $country = $row['country'];
                $time = $row['post_time'];
                echo "<span style='text-align: right;'>".$time."</span>";
                echo "<p><b>Written by: </b>".$username."</p>";
                echo "<p><b>Firstname: </b>".$firstname."</p>";
                echo "<p><b>Lastname: </b>".$lastname."</p>";
                echo "<p><b>Country: </b>".$country."</p>";
                echo "<p><b>Comment: </b>".$comment."</p>";
                echo "<hr>";
            }
            ?>
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
