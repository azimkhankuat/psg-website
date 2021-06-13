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
    <title>PSG | Admin page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/javascript.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
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
            <a class="active" href="admin-page.php">Admin page</a>
        <?php } ?>
        <?php
        if(empty($_SESSION["user"])) {
            ?>
            <form action="login.php"><a href="login.php">Login</a></form>
            <form action="signup.php"><a href="signup.php">Sign up</a></form>
        <?php }else { ?>
            <form action="exit.php"><a href="exit.php">Logout<?php echo " (". $_SESSION["user"] . ")" ?></a></form>
        <?php  } ?>
        <a href="javascript:void(0);" class="icon" onclick="responsive()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <span class="quote">ICI C'EST PARIS</span>
</div>
<!-- Header END-->

<!-- Admin Page START -->
<div class="admin-wrapper">
    <div class="left-sidebar">
        <ul>
            <li><a href="admin-page.php">Manage Posts</a></li>
            <li><a href="manage_tickets.php">Manage Tickets</a></li>
            <li><a href="add_players.php">Manage Players</a></li>
        </ul>
    </div>

    <div class="admin-content">
        <div class="button-group">
            <a href="add_players.php" class="btn btn-big btn-primary">Add Player</a>
            <a href="delete_players.php" class="btn btn-big btn-primary">Delete Player</a>
        </div>

        <div class="content">
            <!-- Admin-UPDATE START-->
            <h2>Updating Player Info</h2>
            <form method="post">
                <div class="form-group">
                    <label for="player_name">Existing player's full name:</label>
                    <input type="text" name="player_name" id="player_name" placeholder="Existing player's full name...">
                </div>

                <div class="form-group">
                    <label for="birthdate">Birthdate:</label>
                    <input type="text" name="birthdate" id="birthdate" placeholder="Birthdate...">
                </div>

                <div class="form-group">
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality">
                </div>

                <div class="form-group">
                    <label for="profile">Profile:</label>
                    <input type="text" name="profile" id="profile" placeholder="Profile...">
                </div>

                <div class="form-group">
                    <label for="skills">Skills:</label>
                    <input type="text" name="skills" id="skills" placeholder="Skills...">
                </div>

                <div class="form-group">
                    <label for="signed_psg">Signed at PSG:</label>
                    <input type="date" name="signed_psg" id="signed_psg" placeholder="Signed at PSG...">
                </div>

                <div class="form-group">
                    <label for="image">Image URL:</label>
                    <input type="text" name="image" id="image" placeholder="Image URL...">
                </div>

                <div class="form-group">
                    <label for="games_played">Games played:</label>
                    <input type="text" name="games_played" id="games_played" placeholder="Games played...">
                </div>

                <div class="form-group">
                    <label for="minutes_played">Minutes played:</label>
                    <input type="text" name="minutes_played" id="minutes_played" placeholder="Minutes played...">
                </div>

                <div class="form-group">
                    <label for="starts">Starts:</label>
                    <input type="text" name="starts" id="starts" placeholder="Starts...">
                </div>
                <input type="submit" class="a-button admin-button" id="player_add" value="UPDATE">
            </form>

            <?php
            require_once "db_connection/link.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $player_name = $_POST['player_name'];
                $birthdate = $_POST['birthdate'];
                $nationality = $_POST['nationality'];
                $profile = $_POST['profile'];
                $skills = $_POST['skills'];
                $image = $_POST['image'];
                $signed_psg = $_POST['signed_psg'];
                $games_played = $_POST['games_played'];
                $minutes_played = $_POST['minutes_played'];
                $starts = $_POST['starts'];
                if (empty($player_name)) {
                    echo "<script type='text/javascript'>alert('Name can not be empty!')</script>";
                    return;
                }

                if(isset($_POST['player_name']) && isset($_POST['birthdate']) && isset($_POST['profile'])
                    && isset($_POST['skills']) && isset($_POST['signed_psg']) && isset($_POST['image'])
                    && isset($_POST['games_played']) && isset($_POST['minutes_played']) && isset($_POST['starts'])) {
                    $sql = "UPDATE players SET birthdate = '$_POST[birthdate]', profile = '$_POST[profile]', content = '$_POST[content]', skills = '$_POST[skills]', 
                    signed_psg = '$_POST[signed_psg]', image = '$_POST[image]', games_played = '$_POST[games_played]', minutes_played = '$_POST[minutes_played]',
                    starts = '$_POST[starts]' WHERE player_name = '$_POST[player_name]' ";
                }

                if ($link->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
                } else {
                    echo "<script type='text/javascript'>alert('Error updating record: . $link->error');</script>";
                }

                $link->close();
            }
            ?>
            <!-- Admin-UPDATE END-->
        </div>
    </div>
</div>
<!-- Admin Page END -->
</body>
</html>

