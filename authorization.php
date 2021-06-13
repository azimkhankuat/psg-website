<?php

header('Content-Type: application/json');

if(!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];

    require_once "db_connection/link.php";
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row != null && $row['username'] != null) {
        session_start();
        $_SESSION['user'] = $row['username'];
        setcookie('username', $row['username'], time() + (60*60*24*30));
        $return = array(
            'message' => "success"
        );
    } else {
        $return = array(
            'errorMessage' => "Incorrect username or/and password!"
        );
        http_response_code(401);
    }
    $stmt->close();
}
else{
    $return = array(
        'errorMessage' => "Both fields are required!"
    );
    http_response_code(403);
}
echo (json_encode($return));