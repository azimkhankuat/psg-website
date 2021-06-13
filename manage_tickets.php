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
            <a href="ticket_add.php" class="btn btn-big btn-primary">Add Ticket</a>
            <a href="ticket_update.php" class="btn btn-big btn-primary">Update Ticket Information</a>
            <a href="ticket_delete.php" class="btn btn-big btn-primary">Delete Ticket</a>
        </div>

        <div class="content">
            <h3>SOLD OUT</h3>
            <?php
            require_once 'db_connection/link.php';

            $sql = "SELECT * FROM bookings WHERE paid='1' ";
            if(! ($result = mysqli_query($link, $sql)))
            {

                echo "Errormessage: ".mysqli_error($link)."\n";
            }
            else
            {
                echo "<table class='ticket_table'>
                        <tr>
                            <th>ID</th>
                            <th>Match name</th>
                            <th>Category</th>
                            <th>Place number</th>
                            <th>Ticket cost</th>   
                            <th>Username</th>   
                            <th>Date of match</th>   
                            <th>Booking date</th>  
                            <th>Paid</th>           
                        </tr>";
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>
                                <td>".$row['id']."</td>
                                <td>".$row['matchname']."</td>
                                <td>".$row['ticket_type']."</td>
                                <td>".$row['place_number']."</td>
                                <td>".$row['ticket_cost']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['date_of_match']."</td>
                                <td>".$row['date_of_booking']."</td>
                                <td>YES</td>
                          </tr>";
                }
                echo "</table>";
            }
            mysqli_close($link);
            ?>
        </div>
    </div>
</div>
<!-- Admin Page END -->
</body>
</html>

