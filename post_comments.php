<?php
require_once "db_connection/link.php";

if(isset($_POST['user_comm']) && isset($_POST['user_firstname']) && isset($_POST['user_lastname']) && isset($_POST['user_country'])) {
    $comment = $_POST['user_comm'];
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $country = $_POST['user_country'];
    $user = $_COOKIE['username'];
    $insert = mysqli_query($link, "insert into comments (firstname, lastname, username, country, comment, post_time) 
    values('$firstname', '$lastname', '$user', '$country', '$comment', CURRENT_TIMESTAMP)");
    $id = mysqli_insert_id($link);
}
?>