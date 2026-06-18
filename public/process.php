<?php
require_once "../config/database.php";
require_once "../includes/auth.php";

$action = $_POST['action'] ?? '';

if ($action === "register") {
    $result = registerUser($conn, $_POST);

    if ($result == true) {
        header("Location:login.php");
        exit;
    }
    echo $result;
}

if ($action === "login") {
    $result = loginUser($conn, $_POST);
    if ($result == true) {
        header("Location:register.php");
        exit;
    }
    echo $result;
}
