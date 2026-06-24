<?php
require_once "../includes/middleware.php";
admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Admin Panel</h1>
    <h3>
        Welcome Admin : <?php echo $_SESSION['username']; ?>
    </h3>

    <a href="dashboard.php">Dashboard</a>
    <br><br>

    <a href="logout.php">Logout</a>


</body>

</html>