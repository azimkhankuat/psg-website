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
            <li><a href="add_players.php">Manage Posts</a></li>
        </ul>
    </div>

    <div class="admin-content">
        <div class="button-group">
            <a href="admin-update.php" class="btn btn-big btn-primary">Update Post</a>
            <a href="admin-delete.php" class="btn btn-big btn-primary">Delete Post</a>
        </div>

        <div class="content">
            <!-- Admin-ADD START-->
            <h2 class="page-title">Add Ticket</h2>
            <form method="post">
                <div class="form-group">
                    <label for="matchname">Match name:</label>
                    <input type="text" name="matchname" id="matchname" placeholder="Match name...">
                </div>

                <div class="form-group">
                    <label for="ticket_type">Ticket type:</label>
                    <input type="text" name="ticket_type" id="ticket_type" placeholder="Ticket type...">
                </div>

                <div class="form-group">
                    <label for="place_number">Place number:</label>
                    <input type="number" name="place_number" id="place_number" placeholder="Place number...">
                </div>

                <div class="form-group">
                    <label for="ticket_cost">Ticket cost</label>
                    <input type="number" id="ticket_cost" name="ticket_cost" placeholder="Ticket cost...">
                </div>

                <div class="form-group">
                    <label for="date_of_match">Date of match:</label>
                    <input type="datetime-local" name="date_of_match" id="date_of_match" placeholder="Date of match...">
                </div>
                <button class="admin-button">ADD</button>
            </form>


            <?php
            require_once "db_connection/link.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                $matchname = $_POST['matchname'];
                $ticket_type = $_POST['ticket_type'];
                $ticket_cost = $_POST['ticket_cost'];
                $place_number = $_POST['place_number'];
                $date_of_match = $_POST['date_of_match'];
                $sql = "INSERT INTO tickets (matchname, ticket_type, ticket_cost, place_number, date_of_match) VALUES (?, ?, ?, ?, ?)";

                $stmt = $link->prepare($sql);
                $stmt->bind_param("sssss", $matchname, $ticket_type, $ticket_cost, $place_number, $date_of_match);
                $results = $stmt->execute();

                if ($results === false){
                    echo $stmt->error;
                } else {
                    $id = $stmt->insert_id;
                    echo "<script type='text/javascript'>alert('Inserted record with ID: $id')</script>";
                }

                $stmt->close();
            }
            ?>
            <!-- Admin-ADD END-->
        </div>
    </div>
</div>
<!-- Admin Page END -->
</body>
</html>

