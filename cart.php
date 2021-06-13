<?php
session_start();

include_once 'db_connection/link.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}else{
    $date_of_booking = date("Y-m-d h:i:s");
    $user = $_SESSION['user'];
    if(isset($_POST['Add_cart'])){
        $matchname = $_POST["matchname"];
        $ticket_type = $_POST["ticket_type"];
        $place_number = $_POST["place_number"];
        $ticket_cost = $_POST["ticket_cost"];
        $date_of_match = $_POST["date_of_match"];
    }
    $sql = "INSERT INTO bookings (matchname, ticket_type, place_number, ticket_cost, date_of_match, date_of_booking, username, paid) 
			VALUES ('$matchname', '$ticket_type', '$place_number', '$ticket_cost', '$date_of_match', '$date_of_booking', '$user', '0')";
    if ($link->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Successfully added to your cart!')</script>";
        header("Location: tickets.php");
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }

}
mysqli_close($link);
?>



