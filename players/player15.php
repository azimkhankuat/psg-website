<?php
require_once "../db_connection/link.php";
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>

    </script>
    <style>
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

        .container1 {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .row1:after {
            content: "";
            display: table;
            clear: both;
        }

        .card img{
            width: 100%;
        }

        .player-info-table{
            border-collapse: collapse;
            margin: 0 auto;
            margin-top: 5px;
            text-align: center;
        }

        .player-info-table td{
            border: 1px solid #e6e6e6;
            padding: 15px;
        }

        .player-info-table td span{
            font-size: 25px;
            color: #ff0037;
        }
    </style>
</head>
<body>

<!-- Header START-->
<div class="header">
    <a id="logo" class="logo" href="../index.php"><img src='../img/logo.png' width="85px" height="85px"></a>
    <div class="topnav" id="myTopnav">
        <a href="../index.php">Home</a>
        <a href="../history.php">History</a>
        <a href="../players-page.php">Players</a>
        <a href="../tickets.php">Buy tickets</a>
        <a class="active" href="../about-us.php">About us</a>
        <?php
        if($_SESSION["user"] == "admin") {
            ?>
            <a href="../admin-page.php">Admin page</a>
        <?php } ?>
        <?php
        if(empty($_SESSION["user"])) {
            ?>
            <form action="../login.php"><a href="../login.php">Login</a></form>
            <form action="../signup.php"><a href="../signup.php">Sign up</a></form>
        <?php }else { ?>
            <form action="../exit.php"><a href="../exit.php">Logout<?php echo " (". $_COOKIE["username"] . ")" ?></a></form>
        <?php  } ?>
        <a href="javascript:void(0);" class="icon" onclick="responsive()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <span class="quote">ICI C'EST PARIS</span>
</div>
<!-- Header END-->

<div class="container1">
    <div style="text-align:center">
        <h2>PSG SQUAD</h2>
        <p>Information about this player:</p>
    </div>
    <div class="row1">
        <div class="column1">
            <div class="card">
                <?php
                require_once "../db_connection/link.php";
                $sql = "SELECT * FROM players WHERE id='16' ";
                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $image = $row['image'];
                    }
                }
                echo "<img src=".$image.">";
                ?>
            </div>
        </div>
        <div class="column1">
            <div class="card">
                <?php
                require_once("Player.php");
                class player15 extends Player{
                    function player15_info($player_name, $birthdate, $nationality, $profile, $skills, $signed_psg, $games_played, $minutes_played, $starts){
                        echo "<h3>" . $this->player_name = $player_name . "</h3>".
                                "<b>Birthdate: </b>" . $this->birthdate = $birthdate .
                                    "<br><b>Nationality: </b>" . $this->nationality = $nationality .
                                        "<br><b>Profile: </b>" . $this->profile = $profile .
                                            "<br><b>Skills: </b>" . $this->skills = $skills .
                                                "<br><b>Signed at PSG: </b>" . $this->signed_psg = $signed_psg;
                        echo "<br>";
                        echo "<table class='player-info-table'>
                            <tr>
                            <td><span>$games_played</span><p>Games played</p></td>
                            <td><span>$minutes_played</span><p>Minutes played</p></td>
                            <td><span>$starts</span><p>Starts</p></td>
                            </tr>";
                        echo "</table>";

                    }
                }
                require_once "../db_connection/link.php";
                $sql = "SELECT * FROM players WHERE id='16' ";
                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $player_name = $row['player_name'];
                        $birthdate = $row['birthdate'];
                        $nationality = $row['nationality'];
                        $profile = $row['profile'];
                        $skills = $row['skills'];
                        $signed_psg = $row['signed_psg'];
                        $games_played = $row['games_played'];
                        $minutes_played = $row['minutes_played'];
                        $starts = $row['starts'];
                    }
                }
                $player15 = new player15();
                $player15->player15_info($player_name, $birthdate, $nationality, $profile, $skills, $signed_psg, $games_played, $minutes_played, $starts);
                $player15->same_for_all_players();
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
