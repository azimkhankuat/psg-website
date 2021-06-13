<?php
require_once "db_connection/link.php";
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>

<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}
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
            width: 100%;
            padding: 0 10px;
            text-align: center;
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

        .parallax {
            background-image: url("img/ligue1.jpg");
            min-height: 700px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .player_table{
            border-collapse: collapse;
            margin: 10px;
        }

        .player_table td, .player_table th{
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;
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
        <a class="active" href="tickets.php">Buy tickets</a>
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

<div class="row">
    <div class="w3-white">
        <div class="parallax">

        </div>
        <div class="w3-container">
            <h3>PSG MATCHES</h3>
            <div class="row_ticket">
                <div class="column_ticket">
                    <?php
                    require_once 'db_connection/link.php';

                    $sql = "SELECT * FROM tickets NATURAL LEFT JOIN bookings
                    WHERE bookings.matchname is NULL ORDER BY tickets.ticket_cost, tickets.place_number ASC";
                    $counter = 1;
                    if(! ($result = mysqli_query($link, $sql)))
                    {
                        echo "Errormessage: ".mysqli_error($link)."\n";
                    }
                    else
                    {
                        echo "<table class='player_table'>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Match name</th>  
                                                    <th>Date of match</th> 
                                                    <th>Category</th>
                                                    <th>Place number</th>
                                                    <th>Cost</th>         
                                                </tr>";
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<tr>
                                            <td>".$counter."</td>
                                            <td>".$row['matchname']."</td>
                                            <td>".$row['date_of_match']."</td>
                                            <td>".$row['ticket_type']."</td>
                                            <td>".$row['place_number']."</td>
                                            <td>".$row['ticket_cost']."</td>
                                            <td>".'<form action="cart.php" method="post">'.
                                '<input type="hidden" name="matchname" value="'.$row['matchname'].'">'.
                                '<input type="hidden" name="date_of_match" value="'.$row['date_of_match'].'">'.
                                '<input type="hidden" name="ticket_type" value="'.$row['ticket_type'].'">'.
                                '<input type="hidden" name="place_number" value="'.$row['place_number'].'">'.
                                '<input type="hidden" name="ticket_cost" value="'.$row['ticket_cost'].'">'.
                                '<input type="submit" name="Add_cart" value="Add to cart">'.
                                '</form>'."</td>
                                      </tr>";
                                $counter++;
                            }
                            echo "</table>";

                    }
                    mysqli_close($link);
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
