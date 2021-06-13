<?php

header('Content-Type: application/json');

if(!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username_admin = $_POST["username"];
    $pass_admin = $_POST["password"];
    require_once "db_connection/link.php";
    $stmt_admin = $link->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt_admin->bind_param("ss", $username_admin, $pass_admin);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();
    $row_admin = $result_admin->fetch_assoc();

    if ($row_admin != null && $row_admin['username'] != null) {
        session_start();
        $_SESSION['user'] = $row_admin['username'];
        $return = array(
            'message' => "success"
        );
    } else {
        $return = array(
            'errorMessage' => "You are not an admin!"
        );
        http_response_code(401);
    }
    $stmt_admin->close();
}
else{
    $return = array(
        'errorMessage' => "Both fields are required!"
    );
    http_response_code(403);
}
echo (json_encode($return));