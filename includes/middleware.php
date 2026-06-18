<?php
require_once __DIR__ . '/session.php';

// Logged in Required
function auth()
{
    if (!isset($_SESSION['id'])) {
        header("Location:login.php");
        exit;
    }
}

// Guest Only
function guest()
{
    if (isset($_SESSION['id'])) {
        header("Location:dashboard.php");
        exit;
    }
}

// Admin Only
function admin()
{
    auth();
    if ($_SESSION['role'] !== "admin") {
        die("Access Denied");
    }
}