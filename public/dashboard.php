<?php
require_once "../includes/middleware.php";
auth();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Hello 
        <?php
            echo $_SESSION['username'];
        ?>
    </h2>
    <p>
        <?php
            echo $_SESSION['role'];
        ?>
    </p>

    <?php
        if($_SESSION['role']=== 'admin'):
    ?>
    <a href="admin.php">
        Admin Panel
    </a>
    <br><br>
    <?php endif;?>

    <a href="logout.php">Logout</a>

</body>

</html>