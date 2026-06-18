<?php
require_once __DIR__.'/session.php';

function registerUser($conn, $data)
{
    $username = trim($data['username']);
    $email = trim($data['email']);
    $password = trim($data['password']);

    if (empty($username) || empty($email) || empty($password)) {
        return "Missing Data";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid Email";
    }

    $check = $conn->prepare("SELECT id FROM users WHERE name = ? OR email = ?");
    $check->bind_param('ss', $username, $email);
    $check->execute();

    $result = $check->get_result();
    if ($result->num_rows > 0) {
        return "Username or email exist";
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Insert Query
    $stmt = $conn->prepare("INSERT INTO users (name,email,password) VALUES(?,?,?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if ($stmt->execute()) {
        return true;
    }

    return false;
}

function loginUser($conn, $data)
{
    $email = trim($data['email']);
    $password = trim($data['password']);


    if (empty($email) || empty($password)) {
        return "Missing Fields";
    }
    $stmt = $conn->prepare("SELECT * from users WHERE email = ?");

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        return "User not found";
    }

    $user = $result->fetch_assoc();

    if (!password_verify($password, $user['password'])) {
        return "Invalid Password";
    }

    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['name'];
    $_SESSION['role'] = $user['role'];

    return true;
}