<?php

require_once "Database.php";

$conn = new Database("localhost", "root", "123456", "project");$link = $conn->connect();